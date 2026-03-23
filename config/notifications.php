<?php
    function displayNotification($icon, $title, $message) {
        return $_SESSION["notification-status"] = json_encode([
                "icon" => $icon,
                "title" => $title,
                "message" => $message
        ]);
    }
?>