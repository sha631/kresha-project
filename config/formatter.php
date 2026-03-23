<?php
    function formatTimestamp($timestamp) {
        return date("M. d, Y, h:i A", strtotime($timestamp));
    }

    function formatDate($date) {
        return date("M. d, Y", strtotime($date));
    }

    function formatTime($time) {
        return date("h:i A", strtotime($time));
    }

    function amountFormatter($amount) {
        return number_format($amount, 2, '.', ',');
    }

    function shortenText($text, $maxLength = 100) {
        if (strlen($text) <= $maxLength) {
            return $text;
        }

        return substr($text, 0, $maxLength) . "...";
    }
?>