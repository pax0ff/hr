<?php
require 'core/init.php';
$id = $_GET['id'];
$user = $_GET['user'];
$angajat = new Angajat();

if(Input::exists() && isset($_POST['update'])) {
    try {
        $angajat->update($id, array(
            'username' => Input::get('username'),
            'nume' => Input::get('nume'),
            'prenume' => Input::get('prenume'),
            'email' => Input::get('email'),
            'varsta' => Input::get('varsta'),
            'oras' => Input::get('oras'),
            'group_id' => Input::get('departSelect'),
            'join_date' => Input::get('data_angajare'),
            'departament' => Input::get('departSelect'),
            'functie' => Input::get('functieSelect')
        ));
        /*$angajat->updateUser($id, array(
            'username' => Input::get('username'),
            'name' => Input::get('nume'),
            'prenume' => Input::get('prenume'),
            'email' => Input::get('email'),
            'group' => Input::get('departSelect'),
            'varsta' => Input::get('varsta'),
            'oras' => Input::get('oras'),
            'joined' => Input::get('data_angajare'),
            'departament' => Input::get('departSelect'),
            'functie' => Input::get('functieSelect')
        ));*/
        Session::flash('updateAngajatSuccess', 'Toate datele au fost updatate cu success!');
        //Redirect::to('index.php');

    } catch(Exception $e) {
        die($e->getMessage());
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ANGAJAT::editare</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <?php require "templates/sidebar.php"; ?>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <button class="btn btn-primary" id="menu-toggle"><<</button>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Acasa <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Optiuni
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="profile?user=<?php echo $username; ?>">Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout">LOG OUT</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container col-lg-5 col-md-5 col-sm-5">
            <div class="col-md-12 col-lg-12 justify-content-center">
                <?php
                $angajati = $angajat->getAngajatDataById($id);
                ?>
                <h4 style="text-align: center">Editare angajat</h4>
                <?php
                if(Session::exists('updateAngajatSuccess') && isset($_SESSION['updateAngajatSuccess']))
                {
                    echo "<div class='alert alert-success'>".Session::get('updateAngajatSuccess')."</div>";
                }
                ?>
                <form class="text-center border border-light p-5" method="post">
                    <div class="form-group mx-sm-3 mb-2">
                    <?php


                    foreach($angajati as $c)
                    {
                        echo 'ID:'.$c->id.'<br>';
                        echo '<label for="Username">Username</label><input class="form-control" name="username" type="text" value="'.$c->username.'"><br>';
                        echo '<label for="Nume">Nume</label><input class="form-control" name="nume" type="text" value="'.$c->nume.'"><br>';
                        echo '<label for="Prenume">Prenume</label><input class="form-control" name="prenume" type="text" value="'.$c->prenume.'"><br>';
                        echo '<label for="Varsta">Varsta</label><input class="form-control" name="varsta" type="text" value="'.$c->varsta.'"><br>';
                        echo '<label for="Oras">Oras</label><input class="form-control" name="oras" type="text" value="'.$c->oras.'"><br>';
                        echo '<label for="Email">E-mail</label><input class="form-control" name="email" type="text" value="'.$c->email.'"><br>';
                        //<input class="form-control" name="motiv"  type="text" value="'.$c->departament.'"><br>';
                       // echo '<label for="Functie">Functie</label><input name="motiv"  type="text" value="'.$c->functie.'"><br>';
                    }
                    //DEPARTAMENT
                    echo '<label for="Departament">Departament</label><select class="browser-default custom-select" name="departSelect">';
                    $departament = new Departament();
                    $departamente = $departament->getData();
                    foreach ($departamente as $item) {
                        echo '<option value="'.$item->id.'" name="departament">'.$item->nume.'</option>';
                    }
                    echo '</select>';
                    //FUNCTIE
                   echo '<label for="Functie">Functie</label><select class="browser-default custom-select" name="functieSelect">';
                        $functie = new Functie();
                        $functii = $functie->getData();
                        foreach($functii as $m)
                        {
                            echo '<option value="'.$m->nume_functie.'" name="functie">'.$m->nume_functie.'</option>';
                        }
                    echo '</select>';


                        //DATA ANGAJARII
                    foreach($angajati as $c)
                    {

                        echo '<label for="Data angajarii">Data angajare</label><input class="form-control" name="data_angajare"  type="date" value="'.$c->join_date.'"><br>';

                    }
                    ?>
                    <input class="btn btn-primary" type="submit" value="Update" name="update">
                </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->

</div>
<div class="container">

</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

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
