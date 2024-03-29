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

    <title>CONCEDIU::Cereri</title>

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
                            Menu
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
        <div class="container">
            <div class="row">
                <label for='departament'>Departament</label>
                <select class="browser-default custom-select" name="departSelect">
                    <?php
                    $departament = new Departament();
                    $departamente = $departament->getData();
                    foreach ($departamente as $d)
                    {
                        echo "<option value='$d->id'>".$d->nume."</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="container-fluid">
            <div class="col-md-12 col-lg-12 justify-content-center">
                <?php
                    $concediu = new Concediu();
                    $concedii = $concediu->getData();
                ?>
                <h4 style="text-align: center">Cereri concediu</h4>
                <div class="pontariTable">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nume</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Motiv</th>
                            <th scope="col">Data inceput</th>
                            <th scope="col">Data revenire</th>
                            <th scope="col">Adaugat de</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actiuni</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($concedii as $c)
                                {
                                    echo '<tr>';
                                    echo '<th>'.$c->id.'</th>';
                                    echo '<th>'.$c->nume.'</th>';
                                    echo '<th>'.$c->email.'</th>';
                                    echo '<th>'.$c->motiv.'</th>';
                                    echo '<th>'.$c->data_inceput.'</th>';
                                    echo '<th>'.$c->data_sfarsit.'</th>';
                                    echo '<th>'.$c->adaugat_de.'</th>';


                                    if($c->aprobat == 0 && $c->anulat == 0)
                                    {
                                        echo "<th><a class='btn btn-default disabled'>In asteptare</a></th>";
                                    }
                                    else if($c->aprobat == 1 && $c->anulat ==0 )
                                    {
                                        echo "<th><a class='btn btn-success disabled'>Aprobat</a></th>";
                                    }
                                    else {
                                        echo "<th><a class='btn btn-secondary disabled' aria-disabled='true'>Neaprobat</a></th>";
                                    }
                                   // echo "<th>";
                                    if($c->aprobat == 0 && $c->anulat == 0)
                                {
                                    echo "<th><a href='aprobare_concediu?user={$usera}&id={$c->id}&aproba=1&anulat=0' class='btn btn-success'>Aproba</a>
                                            <a href='aprobare_concediu?user={$usera}&id={$c->id}&aproba=0&anulat=1' class='btn btn-dark'>Dezaproba</a>
                                            <a href='editare_concediu?user={$usera}&id={$c->id}' class='btn btn-warning' style='margin-left: 1rem;'>Editeaza</a>
                                             <a href='stergere_cerere?user={$usera}&id={$c->id}' class='btn btn-danger' style='margin-left: 1rem;'>Sterge cerere</a>
                                          </th>";
                                }
                                    else if($c->aprobat == 1 && $c->anulat == 0 )
                                    {
                                        echo "<th><a href='aprobare_concediu?user={$usera}&id={$c->id}&aproba=0&anulat=0' class='btn btn-info'>Modifica</a>
                                                <!--<a href='editare_concediu?user={$usera}&id={$c->id}' class='btn btn-warning' style='margin-left: 1rem;'>Editeaza</a>-->
                                               <a href='stergere_cerere?user={$usera}&id={$c->id}' class='btn btn-danger' style='margin-left: 1rem;'>Sterge cerere</a>
                                          </th>";
                                    }
                                    else {
                                        echo "<th><a href='aprobare_concediu?user={$usera}&id={$c->id}&aproba=0&anulat=0' class='btn btn-info'>Modifica</a>
                                                <!--<a href='editare_concediu?user={$usera}&id={$c->id}' class='btn btn-warning' style='margin-left: 1rem;'>Editeaza</a>-->
                                               <a href='stergere_cerere?user={$usera}&id={$c->id}' class='btn btn-danger' style='margin-left: 1rem;'>Sterge cerere</a>
                                          </th>";
                                    }




                                    echo '</tr>';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <style type="text/css">
            .grid {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(8rem, 1fr));
                grid-auto-rows: 1fr;
            }

            .grid::before {
                content: '';
                width: 0;
                padding-bottom: 100%;
                grid-row: 1 / 1;
                grid-column: 1 / 1;
            }

            .grid > *:first-child {
                grid-row: 1 / 1;
                grid-column: 1 / 1;
            }

            /* Just to make the grid visible */

            .grid > * {
                background: rgba(0,0,0,0.2);
                border: 1px solid black;
            }
            #day {
                padding-left: 10px;
                padding-top: 5px;
            }

        </style>
        <div class="container" style="margin-top:30px;margin-bottom: 30px;">
            <div class="calendar">
                <div class="grid">
                    <?php
                    $currentMonth = date("n");
                    $currentYear = date("Y");
                    $daysOfCurrentMonth = cal_days_in_month(1,$currentMonth,$currentYear);
                    for($i=1;$i<=$daysOfCurrentMonth;$i++)
                    {
                        echo '<span id="day">'.$i.'</span>';
                    }
                    ?>
                </div>
            </div>
            <?php
            echo "<pre>";
            foreach($concedii as $c)
            {
                //echo $c->data_inceput."<br>";
                $inceput  = strtotime($c->data_inceput);
                $sfarsit = strtotime($c->data_sfarsit);
                $dataInceput = date("d-n-Y",$inceput);
                $dataSfarsit = date("d-n-Y",$sfarsit);
                echo $dataInceput."-----".$dataSfarsit."<br>";
            }
            ?>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->

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


