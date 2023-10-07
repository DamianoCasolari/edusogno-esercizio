<?php

session_start();


if (isset($_SESSION['user_id'])) {
    header("Location: ./assets/pages/dashboard.php");
    exit();
} else {
    header("Location: ./assets/pages/login.php");
    exit();
}
