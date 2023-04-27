<?php

require_once 'core/init.php';
$username = $_GET['user'];
if(Input::exists()) {
    if(Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validate->check($_POST, array(
            'nume' => array('required' => true)
        ));
        if($validate->passed()) {
            $nume = $_POST['nume'];
            $pontaj = new Pontaj();
            $userFound = $pontaj->check($nume);
            if($pontaj->check($nume))
            {
                $pontaj->getCheckedUser($nume);
            }


    
        } else {
            foreach($validate->errors() as $error) {
                echo $error, '<br>';
            }
        }
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

    <title>PONTAJ::Vezi pontaje</title>

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
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">Start Bootstrap </div>
        <div class="list-group list-group-flush">
            <a href="dashboard_angajat" class="list-group-item list-group-item-action bg-light">Dashboard</a>
            <a href="pontaj?user=<?php echo $username; ?>" class="list-group-item list-group-item-action bg-light">Pontaj</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Overview</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Events</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Status</a>
        </div>
    </div>
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

        <div class="container">
            <div class="row angajatRow">
                <div class="col-md-12 col-lg-12 d-flex justify-content-center">
                    <!-- Default form login -->

                    <form class="text-center border border-light p-5" action="" method="post">
                        <p class="h4 mb-4">Ponteaza</p>

                        <!-- Email -->
                        <label for='username'>Nume</label>
                        <input type="text" name="nume" id="nume" class="form-control mb-4" placeholder="Nume">



                        <!-- Sign in button -->
                        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                        <input class="btn btn-info btn-block my-4" type="submit" value="Ponteaza" onclick="showData(this.value);">


                    </form>
                    <!-- Default form login -->
                </div>
                <div id="vizitatorData">
                
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12 justify-content-center">
                    <?php
                    //Doar daca esti admin sau angajat poti vedea tabelul , altfel nu - TO DO
                    $user = new User($username);
                    $data = $user->data();
                    $userID = $data->id;
                    $pontaj = new Pontaj($username);
                    $pontatorName = $pontaj->getPontatorName("users","pontaj",array("name","prenume"),array("ID","=","pontatorID"));
                    $pontatorNameData = $pontatorName->results();
                    foreach($pontatorNameData as $key=>$value)
                    {
                        $fullName = $value->name;
                        $fullName .= " ".$value->prenume;
                    }
                    $role = $pontaj->getRole("groups","pontaj",array("name"),array("id","=","rolID"));
                    $roleName = $role->first()->name;
                    $dataTable = $pontaj->getPersonalPonting($userID);
                    $finalData = $dataTable->results();
                    ?>
                    <h4 style="text-align: center">Ultimele pontari personale</h4>
                    <div clas="pontariTable">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nume</th>
                                <th scope="col">Prenume</th>
                                <th scope="col">Data</th>
                                <th scope="col">Pontator</th>
                                <th scope="col">Rol</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($finalData as $key=>$value)
                            {
                                echo "<tr>
                                <th>$value->ID</th>
                                <td>$value->nume</td>
                                <td>$value->prenume</td>
                                <td>$value->data</td>
                                <td>$fullName</td>
                                <td>$roleName</td>
                                </tr>";
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

