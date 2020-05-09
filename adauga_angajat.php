<?php
require_once 'core/init.php';


if (Input::exists()) {
    $validate = new Validate();
    $validate->check($_POST, array(
        'username' => array(
            'username' => 'username',
            'required' => true,
            'min' => 2,
            'max' => 50
        ),
        'password' => array(
            'password' => "password",
            'required' => true,
            'min' => 3,
            'max'=> 50
        ),
        'nume' => array(
            'nume' => 'nume',
            'required' => true,
            'min' => 2,
            'max' => 50
        ),
        'prenume' => array(
            'prenume' => 'prenume',
            'required' => true,
            'min' => 2,
            'max' => 50
        ),
        'departSelect' => array(
            'departSelect' => 'departSelect',
            'required' => true
        ),
        'functieSelect' => array(
            'functieSelect' => 'functieSelect',
            'required' => true
        ),
        'join_date' => array(
            'join_date' => 'join_date',
            'required' => true
        ),
        'varsta' => array(
            'varsta' => 'varsta',
            'required' => true
        ),
        'oras' => array(
            'oras' => 'oras',
            'required' => true
        )
    ));

    if ($validate->passed()) {
        $angajat = new Angajat();
        $user = new User();
        $path = "Documente angajati/";
        $nume = Input::get('nume');
        $prenume = Input::get('prenume');
        if(!file_exists($path.$nume.$prenume))
        {
            $newPath = $path.$nume.' '.$prenume;
            mkdir("{$newPath}", 0777, true);
        }

        try {
            $angajat->createAngajat(array(
                'username' => Input::get('username'),
                'password' => md5(Input::get('password')),
                'nume' => Input::get('nume'),
                'prenume'=>Input::get('prenume'),
                'departament' => Input::get('departSelect'),
                'functie' => Input::get('functieSelect'),
                'group_id' => 3,
                'join_date' => Input::get('join_date'),
                'email' => Input::get('email'),
                'varsta' => Input::get('varsta'),
                'oras' => Input::get('oras'),
            ));

            $user->create(array(
                'name' => Input::get('nume'),
                'prenume' => Input::get('prenume'),
                'varsta' => Input::get('varsta'),
                'oras' => Input::get('oras'),
                'email' => Input::get('email'),
                'username' => Input::get('username'),
                'password' => Hash::make(Input::get('password')),
                'joined' => date('Y-m-d H:i:s'),
                'group' => 3,
                'departament' => Input::get('departSelect'),
                'functie' => Input::get('functieSelect')
            ));

            Session::flash('angajatSuccess', 'Angajatul a fost adaugat, contul a fost creat, folderul a fost creat!');
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

    <title>Adaugare angajat</title>

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
            <button class="btn btn-primary" id="menu-toggle">Open menu</button>

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
                    <p class="h4 mb-4">Adaugare angajat</p>
                    <?php if(Session::exists('angajatSuccess')) { ?>
                        <div class="text-center alert alert-success">
                            <?php echo '<p>' . Session::flash('angajatSuccess'). '</p>'; ?>
                        </div>
                    <?php } ?>
                    <!-- Nume -->
                    <label for='username'>Username</label>
                    <input type="text" name="username" id="username" class="form-control mb-6" placeholder="Username">

                    <label for='password'>Parola</label>
                    <input type="password" name="password" id="password" class="form-control mb-6" placeholder="Parola">

                    <label for='nume'>Nume</label>
                    <input type="text" name="nume" id="nume" class="form-control mb-6" placeholder="Nume">

                    <!-- Prenume -->
                    <label for='prenume'>Prenume</label>
                    <input type="text" name="prenume" id="prenume" class="form-control mb-6" placeholder="Prenume">

                    <label for='email'>Email</label>
                    <input type="email" name="email" id="email" class="form-control mb-6" placeholder="E-mail">

                    <label for='varsta'>Varsta</label>
                    <input type="text" name="varsta" id="varsta" class="form-control mb-6" placeholder="Varsta">

                    <label for='Oras'>Oras</label>
                    <input type="text" name="oras" id="oras" class="form-control mb-6" placeholder="Oras">

                    <!-- Oras -->
                    <label for='manager'>Departament</label>
                    <select class="browser-default custom-select" name="departSelect">

                        <?php
                        $departament = new Departament();
                        $departamente = $departament->getData();
                        foreach($departamente as $m)
                        {
                            echo '<option value="'.$m->id.'" name="manager">'.$m->nume.'</option>';
                        }
                        ?>
                    </select>

                    <!-- Email -->
                    <label for='manager'>Functie</label>
                    <select class="browser-default custom-select" name="functieSelect">

                        <?php
                        $functie = new Functie();
                        $functii = $functie->getData();
                        foreach($functii as $m)
                        {
                            echo '<option value="'.$m->nume_functie.'" name="manager">'.$m->nume_functie.'</option>';
                        }
                        ?>
                    </select>

                    <!-- Data inceput -->
                    <label for='dateStart'>Data angajare</label>
                    <input type="date" name="join_date" id="join_date" class="form-control mb-6">


                    <input class="btn btn-info btn-block my-4" type="submit" value="Adauga angajat">


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