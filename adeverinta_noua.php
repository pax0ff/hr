<?php
require_once 'core/init.php';


if (Input::exists()) {
    $validate = new Validate();
    $validate->check($_POST, array(
        'nume' => array(
            'nume' => 'nume',
            'required' => true,
            'min' => 2,
            'max' => 50
        ),
        'prenume' => array(
            'departament' => "departament",
            'required' => true,
            'min' => 2,
            'max'=> 50
        )
    ));

    if ($validate->passed()) {
        $demisie = new Demisie();
        try {
            $demisie->createDemisie(array(
                'nume' => Input::get('nume'),
                'prenume' => Input::get('prenume'),
                'email' => Input::get('email'),
                'aprobat' => 0,
                'data' => Input::get('data_demisie'),
                'adaugat_de' => $_GET['user']
            ));
            $length = count($demisie->getUserEmail());
            $data = $demisie->getUserEmail()[$length-1]->data;

            $emailDemisie = $demisie->getUserEmail()[$length-1]->email;
            $dataForPDF = $demisie->getDataFromEmployee($emailDemisie)[0];
            $pdf = new PDFGenerator();
            $pdf->AddPage('P','A4');
            $pdf->demisieHeader();
            $pdf->demsieContent($dataForPDF->nume,$dataForPDF->prenume,$dataForPDF->functie,$data);
            $pdf->demisieFooter();
            $pdf->genereazaDemisiePDF();


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

    <title>Adeverinta noua</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

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
                    <p class="h4 mb-4">Adeverinta</p>
                    <select class="browser-default custom-select" name="adevSelect">
                        <option selected>Alege tipul de adeverinta</option>
                        <option value="adeverinta_salariat">Adeverinta salariat</option>
                        <option value="adeverinta_vechime">Adeverinta vechime</option>
                        <option value="adeverinta_venit">Adeverinta venit</option>
                    </select>
                    <script>

                    </script>
                    <!-- Motiv -->
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
                    <label for='email'>Email</label>
                    <input type="email" name="email" id="email" class="form-control mb-6" placeholder="Email">
                    <label for='email'>Email</label>
                    <input type="email" name="email" id="email" class="form-control mb-6" placeholder="Email">
                    <label for='email'>Email</label>
                    <input type="email" name="email" id="email" class="form-control mb-6" placeholder="Email">
                    <label for='email'>Email</label>
                    <input type="email" name="email" id="email" class="form-control mb-6" placeholder="Email">
                    <label for='email'>Email</label>
                    <input type="email" name="email" id="email" class="form-control mb-6" placeholder="Email">
                    <label for='email'>Email</label>
                    <input type="email" name="email" id="email" class="form-control mb-6" placeholder="Email">
                    <label for='email'>Email</label>
                    <input type="email" name="email" id="email" class="form-control mb-6" placeholder="Email">
                    <label for='email'>Email</label>
                    <input type="email" name="email" id="email" class="form-control mb-6" placeholder="Email">
                    <label for='email'>Email</label>
                    <input type="email" name="email" id="email" class="form-control mb-6" placeholder="Email">
                    <label for='email'>Email</label>
                    <input type="email" name="email" id="email" class="form-control mb-6" placeholder="Email">
                    <!-- Locatie -->
                    <label for='email'>Email</label>
                    <input type="email" name="email" id="email" class="form-control mb-6" placeholder="Email">

                    <label for='email'>Email</label>
                    <input type="email" name="email" id="email" class="form-control mb-6" placeholder="Email">

                    <label for='data'>Data</label>
                    <input type="date" name="data_demisie" id="data_demisie" class="form-control mb-6">


                    <input type="hidden" name="adaugat_de" id="adaugat_de" value="<?php echo $_GET['user'] ?>">


                    <input class="btn btn-info btn-block my-4" type="submit" value="Adauga demisie & genereaza PDF">

                </form>

            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
            if($(".d-flex").hasClass("toggled"))
            {
                $("#menu-toggle").text("Open menu");
            }
            else {
                $("#menu-toggle").text("Close menu");
            }
        });

    </script>

</body>

</html>