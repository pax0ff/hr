<?php
require_once 'core/init.php';
$username = $_GET['user'];

if (Input::exists()) {
    $validate = new Validate();
    $validate->check($_POST, array(
        'nume' => array(
            'nume' => 'nume',
            'required' => true,
            'min' => 2,
            'max' => 50
        ),
        'motiv' => array(
            'motiv' => "motiv",
            'required' => true,
            'min' => 3,
            'max'=> 50
        ),
        'prenume' => array(
            'prenume' => 'prenume',
            'required' => true,
            'min' => 2,
            'max' => 50
        ),
        'email' => array(
            'email' => 'E-mail',
            'required' => true,
            'min' => 2,
            'max' => 50
        ),
        'dateStart' => array(
            'dateStart' => 'dateStart',
            'required' => true
        ),
        'dateEnd' => array(
            'dateEnd' => 'dateEnd',
            'required' => true
        )
    ));

    if ($validate->passed()) {
        $concediu = new Concediu();
        try {
            $concediu->createConcediu(array(
                'nume' => Input::get('nume'),
                'prenume' => Input::get('prenume'),
                'email' => Input::get('email'),
                'motiv' => Input::get('motiv'),
                'data_inceput' => Input::get('dateStart'),
                'data_sfarsit' => Input::get('dateEnd'),
                'adaugat_de' => Input::get('adaugat_de'),
                'aprobat' => 0
            ));

            Session::flash('concediuSuccess', 'Concediul a fost inregistrat cu succes.Veti primi un email pe adresa '.Input::get('email').' in cel mai scurt timp cu detaliile aferente.');
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
                    <p class="h4 mb-4">Concediu</p>
                    <?php if(Session::exists('concediuSuccess')) { ?>
                        <div class="text-center alert alert-success">
                            <?php echo '<p>' . Session::flash('concediuSuccess'). '</p>'; ?>
                        </div>
                    <?php } ?>

                    <?php
                    $user = new User($username);
                    $data = $user->data();
                    ?>
                    <!-- Nume -->
                    <label for='nume'>Nume</label>
                    <input type="text" name="nume" id="nume" class="form-control mb-6 disabled"  value="<?php echo $data->name; ?>" readonly>

                    <!-- Prenume -->
                    <label for='prenume'>Prenume</label>
                    <input type="text" name="prenume" id="prenume" class="form-control mb-6" placeholder="prenume"value="<?php echo $data->prenume; ?>" readonly>


                    <label for='email'>E-mail</label>
                    <input type="email" name="email" id="email" class="form-control mb-6" placeholder="email"value="<?php echo $data->email; ?>" readonly>

                    <label for='motiv'>Motiv</label>
                    <input type="text" name="motiv" id="motiv" class="form-control mb-6" placeholder="motiv">



                    <!-- Data inceput -->
                    <label for='dateStart'>Data inceput</label>
                    <input type="date" name="dateStart" id="dateStart" class="form-control mb-6">

                    <!-- Data sfarsit -->
                    <label for='dateEnd'>Data sfarsit</label>
                    <input type="date" name="dateEnd" id="dateEnd" class="form-control mb-6">



                    <input type="hidden" name="adaugat_de" id="adaugat_de" value="<?php echo $_GET['user'] ?>">

                    <input class="btn btn-info btn-block my-4" type="submit" value="Adauga concediu">


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