<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

include('../db/database.php');

$email = $_SESSION['email'];

//User Name query

$sql = "SELECT nome FROM utenti WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($nome);
$stmt->fetch();
$stmt->close();

//Events query

$sql = "SELECT nome_evento, data_evento FROM eventi";
$stmt = $conn->prepare($sql);
$stmt->execute();
$stmt->bind_result($nome_evento, $data_evento);

$eventi = [];

while ($stmt->fetch()) {
    $oggetto = new stdClass();
    $oggetto->nome_evento = $nome_evento;
    $oggetto->data_evento = $data_evento;
    $eventi[] = $oggetto;
};

$stmt->close();

// var_dump($eventi);

$title = "Edusogno - Dashboard";
ob_start();
?>

<div class="form_container position-relative d-flex w-100  align-items-center flex-column ">
    <h1 class="pt-5 pb-2 text-center weight_700"> Ciao
        <?php echo $nome ?>
        ecco i tuoi eventi
    </h1>
    <div class="d-flex flex-wrap w-100">
        <?php foreach ($eventi as $evento) : ?>
            <div class="custom_card col-12 col-md-6 col-lg-4 p-4">
                <div class="single_event bg-white p-4 mb-3">
                    <h2><?php echo $evento->nome_evento; ?></h2>
                    <div class="py-2 fs-5 cl_gray"><?php echo $evento->data_evento; ?></div>
                    <div class="w-100">
                        <button class="w-100 btn btn-primary">
                            JOIN
                        </button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<?php
$content = ob_get_clean();
include('../../layout.php');
?>