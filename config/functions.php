<?php
    function generateVerificationToken($length = 16) {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomToken = '';

        for ($i = 0; $i < $length; $i++) {
            $randomToken .= $characters[random_int(0, $charactersLength - 1)];
        }
    
        return $randomToken;
    }

    function generateExpiryTime($minutes) {
         $expiry_time = date("Y-m-d H:i:s", strtotime("+$minutes minutes"));

         return $expiry_time;
    }

    function statusBackgroundColor($status) {
        switch($status) {
            case "Pending":
                $badgeBg = "bg-warning text-dark";
                break;
            case "Confirmed":
                $badgeBg = "bg-info text-dark";
                break;
            case "Preparing Order":
                $badgeBg = "bg-info text-white";
                break;
            case "Out for Delivery":
                $badgeBg = "bg-primary text-white";
                break;
            case "Delivered":
                $badgeBg = "bg-success text-white";
                break;
            case "Cancelled":
                $badgeBg = "bg-danger text-white";
                break;
            default:
                $badgeBg = "bg-light text-dark";
                break;       
        }

        return $badgeBg;
    }
?>