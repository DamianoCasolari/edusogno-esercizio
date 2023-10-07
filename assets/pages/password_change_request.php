<!-- MANCA L'INVIO DELL'EMAIL QUINDI SOLO DIMOSTRATIVO PER LE RESTANTI FUNZIONI  -->

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

unset($_SESSION['logged_in']);

if (isset($_SESSION['email'])) {
    header('Location: ./dashboard.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    if (empty($email)) {
        $form_warning = "Campo email obbligatorio.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $form_warning = "Formato email non valido.";
    } else {


        include('../db/database.php');

        //I check that the email is registered in the database

        $sql = "SELECT * FROM utenti WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();


        if ($result->num_rows == 1) {
            $_SESSION['pasword_reset_email'] = $_POST['email'];

            header("Location: reset_password.php");
        } else {
            $form_warning = "Oops! Sembra che questa email non sia associata a nessun profilo. <br> Controlla l'email e riprova oppure crea un nuovo account se non ne hai uno.";
        }
        $stmt->close();
        $conn->close();
    }
}


$title = "Edusogno - Reset Password";
ob_start();
?>
<div class="form_container position-relative d-flex w-100  align-items-center flex-column p-md-3">
    <h1 class="pt-5 pb-2 weight_700">Inserisci email</h1>
    <form action="" method="POST" class="bg-white col-12 col-md-8 col-lg-6">
        <div class="w-100">
            <label for="email">Inserisci l'email associata al tuo profilo</label>
            <input id="email" type="email" name="email" placeholder="name@examplw.com">
        </div>

        <small class="w-100 text-start text-danger fw-bold">
            <?php
            echo isset($form_warning) ?  $form_warning : '';
            $form_warning = "";
            ?>
        </small>

        <div class="w-100 mt-2 mb-4">
            <button type="submit" class="w-100 btn btn-primary">
                RICHIEDI NUOVA PASSWORD
            </button>
        </div>
        <a class="btn btn-link text-decoration-none" href="./register.php">
            Crea un nuovo <strong>Contatto</strong>
        </a>
    </form>
</div>

<?php
$content = ob_get_clean();
include('../../layout.php');

?>