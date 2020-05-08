<?php

require_once 'core/init.php';

if (Input::exists()) {
    if(Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validate->check($_POST, array(
            'nume' => array(
                'nume' => 'Nume',
                'required' => true,
                'min' => 2,
                'max' => 50
            ),
            'username' => array(
                'name' => 'Username',
                'required' => true,
                'min' => 1,
                'max' => 20,
                'unique' => 'users'
            ),
            'password' => array(
                'name' => 'Password',
                'required' => true,
                'min' => 6
            ),
            'password_again' => array(
                'required' => true,
                'matches' => 'password'
            ),
            'prenume' => array(
                'prenume' => 'Prenume',
                'required' => true,
                'min' => 2,
                'max' => 50
            ),
            'varsta' => array(
                'varsta' => 'Varsta',
                'required' => true,
                'min' => 2,
                'max' => 50
            ),
            'oras' => array(
                'oras' => 'Oras',
                'required' => true,
                'min' => 2,
                'max' => 50
            ),
            'email' => array(
                'email' => 'E-mail',
                'required' => true,
                'min' => 2,
                'max' => 50
            )
        ));

        if ($validate->passed()) {
            $user = new User();
            //$salt = Hash::salt(32);

            try {
                $user->create(array(
                    'name' => Input::get('nume'),
                    'prenume' => Input::get('prenume'),
                    'varsta' => Input::get('varsta'),
                    'oras' => Input::get('oras'),
                    'email' => Input::get('email'),
                    'username' => Input::get('username'),
                    'password' => Hash::make(Input::get('password')),
                    'joined' => date('Y-m-d H:i:s'),
                    'group' => 1
                ));

                Session::flash('home', 'Bine ai venit ' . Input::get('username') . '! Ai fost inregistrat cu succes');
                Redirect::to('index.php');
            } catch(Exception $e) {
                echo $e->getTraceAsString(), '<br>';
            }
        } else {
            foreach ($validate->errors() as $error) {
                echo $error . "<br>";
            }
        }
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Register</title>
</head>
<body>
<div class="container">
    <div class="row angajatRow">
        <div class="col-md-12 col-lg-12 d-flex justify-content-center">
            <!-- Default form login -->

            <form class="text-center border border-light p-5" action="" method="post">
                <p class="h4 mb-4">Register</p>

                <!-- Nume -->
                <label for='nume'>Nume</label>
                <input type="text" name="nume" id="nume" class="form-control mb-6" placeholder="Nume">

                <!-- Prenume -->
                <label for='prenume'>Prenume</label>
                <input type="text" name="prenume" id="prenume" class="form-control mb-6" placeholder="Prenume">

                <!-- Oras -->
                <label for='oras'>Oras</label>
                <input type="text" name="oras" id="oras" class="form-control mb-6" placeholder="Oras">

                <!-- Varsta -->
                <label for='varsta'>Varsta</label>
                <input type="text" name="varsta" id="varsta" class="form-control mb-6" placeholder="Varsta">

                <!-- Username -->
                <label for='email'>E-mail</label>
                <input type="email" name="email" id="email" class="form-control mb-6" placeholder="E-mail">

                <!-- Username -->
                <label for='username'>Username</label>
                <input type="text" name="username" id="username" class="form-control mb-6" placeholder="Username">

                <!-- Password -->
                <label for='password'>Password</label>
                <input type="password" name="password" id="password" class="form-control mb-6" placeholder="Password">
                <label for='password_again'>Password</label>
                <input type="password" name="password_again" id="password_again" class="form-control mb-6" placeholder="Password Again">

                <!-- Register button -->
                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                <input class="btn btn-info btn-block my-4" type="submit" value="Inregistrare">

                <!-- Register -->
                <p>Ai deja cont?
                    <a href="login">Login</a>
                </p>

                <!-- Social login -->
            </form>
            <!-- Default form login -->
        </div>
    </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

