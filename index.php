<?php

session_start();

// $_SESSION["user_id"] = "esempio";
// unset($_SESSION["user_id"]);

if (isset($_SESSION['user_id'])) {
    header("Location: ./assets/pages/dashboard.php");
    exit();
} else {
    header("Location: ./assets/pages/login.php");
    exit();
}
