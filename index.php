<?php

require_once 'core/init.php';

if(Session::exists('home')) {
    echo '<p>' . Session::flash('home'). '</p>';
}

$user = new User(); //Current

if($user->isLoggedIn()) {
?>

    <p>Hello, <a href="profile?user=<?php echo escape($user->data()->username);?>"><?php echo escape($user->data()->username); ?></p>

    <ul>
        <li><a href="update">Update Profile</a></li>
        <li><a href="changepassword">Change Password</a></li>
        <li><a href="logout">Log out</a></li>
    </ul>
<?php

    if($user->hasPermission('admin')) {
        echo '<p>You are a Administrator!</p>';
    }

} else { ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 d-flex justify-content-center">
                <h6>Logare ca <a href="login">ANGAJAT</a> sau ca <a href="register">VIZITATOR</a></h6>
            </div>
        </div>
    </div>
<?php
}
?>

<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
<div></div>
    <header>

    </header>

    <footer>

    </footer>
</body>
</html>

