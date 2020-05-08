<?php

require_once 'core/init.php';
$usera = $_GET['user'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Concedii</title>

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
            <button class="btn btn-primary" id="menu-toggle">Close menu</button>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Options
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

        <div class="container-fluid">
            <div class="col-md-12 col-lg-12 justify-content-center">
                <?php
                    $angajat = new Angajat();
                    $angajati = $angajat->getData();
                ?>
                <h4 style="text-align: center">Cereri concediu</h4>
                <div class="pontariTable">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nume</th>
                            <th scope="col">Prenume</th>
                            <th scope="col">Varsta</th>
                            <th scope="col">Oras</th>
                            <th scope="col">Departament</th>
                            <th scope="col">Functie</th>
                            <th scope="col">Titlu</th>
                            <th scope="col">Data angajarii</th>
                            <th scope="col">Editeaza</th>
                            <th scope="col">Sterge</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($angajati as $employee)
                                {
                                    echo '<tr>';
                                    echo '<th>'.$employee->id.'</th>';
                                    echo '<th>'.$employee->nume.'</th>';
                                    echo '<th>'.$employee->prenume.'</th>';
                                    echo '<th>'.$employee->varsta.'</th>';
                                    echo '<th>'.$employee->oras.'</th>';
                                    echo '<th>'.$employee->departament.'</th>';
                                    echo '<th>'.$employee->functie.'</th>';
                                    echo '<th>'.$employee->group_id.'</th>';
                                    echo '<th>'.$employee->join_date.'</th>';

                                    echo "<th>
                                                <a href='editare_concediu?user={$usera}&id={$employee->id}' class='btn btn-warning'>Editeaza</a></th>
                                                <th><a href='stergere_cerere?user={$usera}&id={$employee->id}' class='btn btn-danger' style='margin-left: 1rem;'>Sterge cerere</a>
                                          </th>";


                                    echo '</tr>';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
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
            $("#menu-toggle").text("Open menu");
        }
        else {
            $("#menu-toggle").text("Close menu");
        }

    });


</script>
</body>
</html>


