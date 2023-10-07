 <?php
    $db_host = "127.0.0.1";
    $db_username = "root";
    $db_password = "root";
    $db_name = "db_edusogno";

    $conn = new mysqli($db_host, $db_username, $db_password, $db_name);

    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }
