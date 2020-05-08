<?php
require_once 'core/init.php';


if (Input::exists()) {
    $validate = new Validate();
    $validate->check($_POST, array(
        'motiv' => array(
            'motiv' => 'motiv',
            'required' => true,
            'min' => 2,
            'max' => 50
        ),
        'departament' => array(
            'departament' => "departament",
            'required' => true,
            'min' => 2,
            'max'=> 50
        ),
        'locatie' => array(
            'locatie' => 'locatie',
            'required' => true,
            'min' => 2,
            'max' => 50
        ),
        'dataSedinta' => array(
            'dataSedinta' => 'dataSedinta',
            'required' => true
        )
    ));

    if ($validate->passed()) {
        $sedinta = new Sedinta();

        try {
            $sedinta->createSedinta(array(
                'motiv' => Input::get('motiv'),
                'departament' => Input::get('departament'),
                'locatie' => Input::get('locatie'),
                'organizator' => Input::get('organizator'),
                'data' => Input::get('dataSedinta')
            ));

            Session::flash('sedintaSuccess', 'Sedinta a fost adaugata cu succes.');
            Redirect::to($_SERVER['PHP_SELF'].'?user='.$_GET['user']);

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

    <title>Simple Sidebar - Start Bootstrap Template</title>

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
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container col-lg-5 col-md-5 col-sm-5">
            <div class="col-md-12 col-lg-12 justify-content-center" id="formmm">
                <form class="text-center border border-light p-5" action="" method="post">
                    <p class="h4 mb-4">Sedinte</p>
                    <?php if(Session::exists('sedintaSuccess')) { ?>
                        <div class="text-center alert alert-success">
                            <?php echo '<p>' . Session::flash('sedintaSuccess'). '</p>'; ?>
                        </div>
                    <?php } ?>
                    <!-- Motiv -->
                    <label for='nume'>Motiv</label>
                    <input type="text" name="motiv" id="motiv" class="form-control mb-6" placeholder="Motiv">

                    <!-- Departament -->
                    <label for='prenume'>Departament</label>
                    <input type="text" name="departament" id="departament" class="form-control mb-6" placeholder="departament">

                    <!-- Locatie -->
                    <label for='motiv'>Locatie</label>
                    <input type="text" name="locatie" id="locatie" class="form-control mb-6" placeholder="locatie">

                    <!-- Data  -->
                    <label for='dateStart'>Data sedinta</label>
                    <input type="datetime-local" name="dataSedinta" id="dataSedinta" class="form-control mb-6">

                    <input type="hidden" name="organizator" id="adaugat_de" value="<?php echo $_GET['user'] ?>">

                    <input class="btn btn-info btn-block my-4" type="submit" value="Programareaza sedinta">

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