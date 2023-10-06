<?php
$title = "Edusogno - Dashboard";
ob_start();
?>

<div class="form_container position-relative d-flex w-100  align-items-center flex-column ">
    <h1 class="pt-5 pb-2 text-center weight_700">Ciao NOME ecco i tuoi eventi</h1>
    <div class="d-flex flex-wrap w-100">
        <div class="custom_card col-12 col-md-6 col-lg-4 p-4">
            <div class="single_event bg-white p-4 mb-3">
                <h2>Nome evento</h2>
                <div class="py-2 fs-5 cl_gray">15-10-2022 15.00</div>
                <div class="w-100">
                    <button class="w-100 btn btn-primary">
                        JOIN
                    </button>
                </div>
            </div>
        </div>
        <div class="custom_card col-12 col-md-6 col-lg-4 p-4">
            <div class="single_event bg-white p-4 mb-3">
                <h2>Nome evento</h2>
                <div class="py-2 fs-5 cl_gray">15-10-2022 15.00</div>
                <div class="w-100">
                    <button class="w-100 btn btn-primary">
                        JOIN
                    </button>
                </div>
            </div>
        </div>
        <div class="custom_card col-12 col-md-6 col-lg-4 p-4">
            <div class="single_event bg-white p-4 mb-3">
                <h2>Nome evento</h2>
                <div class="py-2 fs-5 cl_gray">15-10-2022 15.00</div>
                <div class="w-100">
                    <button class="w-100 btn btn-primary">
                        JOIN
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
$content = ob_get_clean();
include('../../layout.php');
?>