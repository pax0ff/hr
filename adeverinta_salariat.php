<?php
require_once 'core/init.php';


if (Input::exists()) {
    $validate = new Validate();
    $validate->check($_POST, array(
        'nume' => array(
            'nume' => 'nume',
            'required' => true
        ),
        'prenume' => array(
            'prenume' => "prenume",
            'required' => true
        ),
        'judet' => array(
            'judet' => "judet",
            'required' => true
        ),
        'strada' => array(
            'strada' => "strada",
            'required' => true
        ),
        'numar' => array(
            'numar' => "numar",
            'required' => true
        ),
        'bloc' => array(
            'bloc' => "bloc",
            'required' => true
        ),
        'scara' => array(
            'scara' => "scara",
            'required' => true
        ),
        'apartament' => array(
            'apartament' => "apartament",
            'required' => true
        ),
        'sector' => array(
            'sector' => "sector",
            'required' => true
        ),
        'cnp' => array(
            'cnp' => "cnp",
            'required' => true,
            'min' => 13,
            'max' => 13
        ),
        'tip_act_identitate' => array(
            'tip_act_identitate' => "tip_act_identitate",
            'required' => true
        ),
        'serie_ad' => array(
            'serie_ad' => "serie_ad",
            'required' => true
        ),
        'numar_ad' => array(
            'numar_ad' => "numar_ad",
            'required' => true
        ),
        'eliberat' => array(
            'eliberat' => "eliberat",
            'required' => true
        ),
        'data_eliberare' => array(
            'data_eliberare' => "data_eliberare",
            'required' => true
        ),
        'perioada_angajarii' => array(
            'perioada_angajarii' => "perioada_angajarii",
            'required' => true
        ),
        'functie' => array(
            'functie' => "functie",
            'required' => true
        ),
        'salariu' => array(
            'salariu' => "salariu",
            'required' => true
        ),
        'nr_contract' => array(
            'nr_contract' => "nr_contract",
            'required' => true
        ),
        'data_contract' => array(
            'data_contract' => "data_contract",
            'required' => true
        ),
        'motiv' => array(
            'motiv' => "motiv",
            'required' => true
        )
    ));

    if ($validate->passed()) {
        $adeverinta = new Adeverinta();
        try {
            /*$adeverinta->createAdeverintaSalariat(array(
                'nume' => Input::get('nume'),
                'prenume' => Input::get('prenume'),
                'judet' => Input::get('judet'),
                'strada' => Input::get('strada'),
                'numar' => Input::get('numar'),
                'bloc' => Input::get('bloc'),
                'scara' => Input::get('scara'),
                'apartament' => Input::get('apartament'),
                'sector' => Input::get('sector'),
                'cnp' => Input::get('cnp'),
                'tip_act_identitate' => Input::get('judtip_act_identitateet'),
                'serie_ad' => Input::get('serie_ad'),
                'numar_ad' => Input::get('numar_ad'),
                'eliberat' => Input::get('eliberat'),
                'data_eliberare' => Input::get('judet'),
                'perioada_angajarii' => Input::get('perioada_angajarii'),
                'functie' => Input::get('functie'),
                'salariu' => Input::get('salariu'),
                'nr_contract' => Input::get('nr_contract'),
                'data_contract' => Input::get('data_contract'),
                'motiv' => Input::get('motiv'),
                'demisie' => Input::get('demisie')
            ));*/

            $pdf = new PDFGenerator();
            $pdf->AddPage('P','A4');
            $pdf->venitHeader();


        } catch(Exception $e) {
            echo $e->getTraceAsString(), '<br>';
        }
    } else {
        foreach ($validate->errors() as $error) {
            echo $error . "<br>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Adeverinta salariat</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>

<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <?php require 'templates/sidebar.php';?>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="logout.php" href="#">LOG OUT</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container col-lg-5 col-md-5 col-sm-5">
            <div class="col-md-12 col-lg-12 justify-content-center" id="formmm">
                <form class="text-center border border-light p-5" action="" method="post">
                    <p class="h4 mb-4">Adeverinta salariat</p>
                    <div id="formular_adeverinta_salariat">
                        <label for='nume'>Nume</label>
                        <input type="text" name="nume" id="nume" class="form-control mb-6" placeholder="Nume">
                        <label for='prenume'>Prenume</label>
                        <input type="text" name="prenume" id="prenume" class="form-control mb-6" placeholder="Prenume">
                        <label for='judet'>Judet</label>
                        <input type="text" name="judet" id="judet" class="form-control mb-6" placeholder="Judet">
                        <label for='strada'>Strada</label>
                        <input type="text" name="strada" id="strada" class="form-control mb-6" placeholder="Strada">
                        <label for='numar'>Numar</label>
                        <input type="text" name="numar" id="numar" class="form-control mb-6" placeholder="Numar">
                        <label for='bloc'>Bloc</label>
                        <input type="text" name="bloc" id="bloc" class="form-control mb-6" placeholder="Bloc">
                        <label for='scara'>Scara</label>
                        <input type="text" name="scara" id="scara" class="form-control mb-6" placeholder="Scara">
                        <label for='apartament'>Apartament</label>
                        <input type="text" name="apartament" id="apartament" class="form-control mb-6" placeholder="Apartament">
                        <label for='sector'>Sector</label>
                        <input type="text" name="sector" id="sector" class="form-control mb-6" placeholder="Sector">
                        <label for='cnp'>CNP</label>
                        <input type="text" name="cnp" id="cnp" class="form-control mb-6" placeholder="CNP">
                        <label for='tip_act_identitate'>Tip Act Identitate</label>
                        <input type="text" name="tip_act_identitate" id="tip_act_identitate" class="form-control mb-6" placeholder="Tip Act Identitate">
                        <label for='serie_ad'>Serie Act Identitate</label>
                        <input type="text" name="serie_ad" id="serie_ad" class="form-control mb-6" placeholder="Serie Act Identitate">
                        <label for='numar_ad'>Numar Act Identitate</label>
                        <input type="text" name="numar_ad" id="numar_ad" class="form-control mb-6" placeholder="Numar Act Identitate">
                        <label for='eliberat'>Eliberat de:</label>
                        <input type="text" name="eliberat" id="eliberat" class="form-control mb-6" placeholder="ex: Brasov DRPCIV">
                        <label for='data_eliberare'>Data eliberare a actului de identitate:</label>
                        <input type="text" name="data_eliberare" id="data_eliberare" class="form-control mb-6" placeholder="Data Eliberare">
                        <label for='perioada_angajarii'>Perioada angajarii</label>
                        <input type="text" name="perioada_angajarii" id="perioada_angajarii" class="form-control mb-6" placeholder="Perioada angajarii">
                        <label for='functie'>Functie</label>
                        <input type="text" name="functie" id="functie" class="form-control mb-6" placeholder="Functie">
                        <label for='salariu'>Salariu</label>
                        <input type="text" name="salariu" id="salariu" class="form-control mb-6" placeholder="Salariu">

                        <label for='nr_contract'>Numar Contract</label>
                        <input type="text" name="nr_contract" id="nr_contract" class="form-control mb-6" placeholder="Numar contract">

                        <label for='data_contract'>Data Contract</label>
                        <input type="text" name="data_contract" id="data_contract" class="form-control mb-6" placeholder="Data contact">

                        <label for='motiv'>Motiv</label>
                        <input type="text" name="motiv" id="motiv" class="form-control mb-6" placeholder="Motiv">

                        <label for='data'>Data</label>
                        <input type="date" name="data_demisie" id="data_demisie" class="form-control mb-6">

                        <input class="btn btn-info btn-block my-4" type="submit" value="Adauga demisie & genereaza PDF">

                    </div>
                </form>

            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->


    <!-- Bootstrap core JavaScript -->


    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
            if($(".d-flex").hasClass("toggled"))
            {
                $("#menu-toggle").text(">>");
            }
            else {
                $("#menu-toggle").text("<<");
            }
        });

    </script>

</body>

</html>