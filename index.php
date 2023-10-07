<?php

session_start();


if (isset($_SESSION['email'])) {

    if ($_SESSION['email'] == 'damianocasolari@gmail.com') {

        header("Location: ./assets/pages/administrator.php");
    } else {

        header("Location: ./assets/pages/dashboard.php");
    }
    exit();
} else {
    header("Location: ./assets/pages/login.php");
    exit();
}
