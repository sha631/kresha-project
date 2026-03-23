<?php

    function sanitizeNames($nameInput) {

        $name = trim($nameInput);
        $name = strip_tags($name);

        $name = htmlspecialchars($name, ENT_QUOTES, "UTF-8");

        $name = preg_replace("/[^a-zA-Z-' ]/", "", $name);

        $name = preg_replace('/\s+/', ' ', $name);

        return $name;
    }

    function sanitizeInputs($inputData) {
        $inputData = trim($inputData);
        $inputData = strip_tags($inputData);
     
        $inputData = htmlspecialchars($inputData, ENT_QUOTES, 'UTF-8');

        $inputData = str_replace(' ', '', $inputData);

        return $inputData;
    }

    /*
        Username must have:
        1. At least 1 Uppercase letter
        2. At least 1 Lowercase letter
        3. At least 1 digit
        3. At least 1 special character (!@#$%^&*)
        4. 8-6 Characters long
    */

    function validatePassword($password) {
        $pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,16}$/";

        return preg_match($pattern, $password) === 1;
    }

    function validateGender($gender) {
        $allowedGenders = ["Male", "Female", "Others"];

        return in_array($gender, $allowedGenders);
    }

    function validateFileType($fileExtension) {
        $allowedFileExtensions = ["jpg", "jpeg", "png", "gif"];

        return in_array($fileExtension, $allowedFileExtensions);
    }

    function validatePhoneNumber($phoneNumber) {
        $pattern = "/^(\+63\d{10}|09\d{9})$/";

        return preg_match($pattern, $phoneNumber);
    }

    function validatePrice($productPrice) {
        return is_numeric($productPrice) && (float)$productPrice >= 1.0;
    }

    function validateAmount($amount) {
        return ctype_digit($amount) && (int)$amount >= 1;
    }
?>