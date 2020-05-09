<?php
require 'core/init.php';
$id = $_GET['id'];
$user = $_GET['user'];
$concediu = new Concediu();
if(Input::exists()) {

        try {
            $concediu->update($id, array(
                'nume' => Input::get('nume'),
                'email' => Input::get('email'),
                'motiv' => Input::get('motiv'),
                'data_inceput' => Input::get('data_inceput'),
                'data_sfarsit' => Input::get('data_sfarsit'),
            ));
            Session::flash('updateConcediuSuccess', 'Toate datele au fost updatate cu success!');
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

        <div class="container col-lg-5 col-md-5 col-sm-5">
            <div class="col-md-12 col-lg-12 justify-content-center">
                <?php
                $concedii = $concediu->getDataById($id);
                ?>
                <h4 style="text-align: center">Editare concediu</h4>
                    <?php
                        if(Session::exists('updateConcediuSuccess'))
                        {
                            echo "<div class='alert alert-success'>".Session::get('updateConcediuSuccess')."</div>";
                        }
                    ?>
                    <form class="text-center border border-light p-5" method="post">

                        <?php
                        foreach($concedii as $c)
                        {
                            echo 'ID:'.$c->id.'<br>';
                            echo '<label for="Nume">Nume</label><input class="form-control"  name="nume" type="text" value="'.$c->nume.'"><br>';
                           // echo '<label for="Prenume">Prenume</label><input class="form-control"  name="prenume" type="text" value="'.$c->prenume.'"><br>';
                            echo '<label for="Email">E-mail</label><input class="form-control"  name="email" type="text" value="'.$c->email.'"><br>';
                            echo '<label for="Motiv">Motiv</label><input class="form-control"  name="motiv"  type="text" value="'.$c->motiv.'"><br>';
                            echo '<label for="Data inceput">Data inceput</label><input class="form-control"  name="data_inceput"  type="date" value="'.$c->data_inceput.'"><br>';
                            echo '<label for="Data sfarsit">Data revenire</label><input class="form-control"  name="data_sfarsit"  type="date" value="'.$c->data_sfarsit.'"><br>';
                        }
                        ?>
                        <input class="btn btn-primary" type="submit" value="Update">
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
            $("#menu-toggle").text("Open menu");
        }
        else {
            $("#menu-toggle").text("Close menu");
        }

    });


</script>
</body>
</html>
