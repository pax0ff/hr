<?php

require_once 'core/init.php';

if(Input::exists()) {
    if(Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validate->check($_POST, array(
            'username' => array('required' => true),
            'password' => array('required' => true)
        ));
        if($validate->passed()) {
            $user = new User((Input::get('username')));
            $data = $user->data();
            $remember = (Input::get('remember') === 'on') ? true : false;
            $login = $user->login(Input::get('username'), Input::get('password'), $remember);
            $selectedval = $_POST['grade'];
            if($login) {
                if($user->hasPermission('angajat'))
                {
                    Redirect::to('dashboard_angajat?user='.$data->username);
                }
                else if($user->hasPermission('hr'))
                {
                    Redirect::to('dashboard_hr?user='.$data->username);
                }
                else if($user->hasPermission('manager'))
                {
                    Redirect::to('dashboard_manager?user='.$data->username);
                }
                else if($user->hasPermission('ceo'))
                {
                    Redirect::to('dashboard_ceo?user='.$data->username);
                }
                else if($user->hasPermission('paza'))
                {
                    Redirect::to('dashboard_paza?user='.$data->username);
                }
                else {
                    Redirect::to('index.php');
                }

            }
            else {
                echo '<p>Incorrect username or password</p>';
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
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
<div class="container">
    <div class="row angajatRow">
        <div class="col-md-12 col-lg-12 d-flex justify-content-center">
            <!-- Default form login -->

            <form class="text-center border border-light p-5" action="" method="post">
                <div class="alert alert-success"><h6>Daca esti doar un vizitator te rugam sa intrii </h6><a href="vizitator.php">AICI</a></div>
                <p class="h4 mb-4">Sign in</p>

                <!-- Email -->
                <label for='username'>Username</label>
                <input type="text" name="username" id="username" class="form-control mb-4" placeholder="Username">

                <!-- Password -->
                <label for='password'>Password</label>
                <input type="password" name="password" id="password" class="form-control mb-4" placeholder="Password">

                <div class="d-flex justify-content-around">
                    <div>
                        <!-- Remember me -->
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="remember" name="remember">
                            <label class="custom-control-label" for="remember">Remember me</label>
                        </div>
                    </div>
                    <div>
                        <!-- Forgot password -->
                        <a href="">Forgot password?</a>
                    </div>
                </div>

                <!-- Sign in button -->
                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                <input class="btn btn-info btn-block my-4" type="submit" value="Login">

                <!-- Register -->
                <p>Not a member?
                    <a href="register">Register</a>
                </p>

                <!-- Social login -->
                <p>or sign in with:</p>

                <a href="#" class="mx-2" role="button"><i class="fab fa-facebook-f light-blue-text"></i></a>
                <a href="#" class="mx-2" role="button"><i class="fab fa-twitter light-blue-text"></i></a>
                <a href="#" class="mx-2" role="button"><i class="fab fa-linkedin-in light-blue-text"></i></a>
                <a href="#" class="mx-2" role="button"><i class="fab fa-github light-blue-text"></i></a>

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
<script type="text/javascript">
    $(document).ready(function(){
        $("select.rol").change(function(){
            var selectedRol = $(this).children("option:selected").val();
            if(selectedRol=='vizitator')
            {
                $('#vizitator_check').css({'display':'block','margin-bottom':'2rem'})
                $('.angajatRow').css('display','none');
            }
            else
            {
                $('#vizitator_check').css('display','none');
                $('.angajatRow').css('display','block');
            }
        });
    });
</script>
</body>
</html>

