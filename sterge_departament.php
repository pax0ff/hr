<?php
require 'core/init.php';
$id = $_GET['id'];
$user = $_GET['user'];
$departament = new Departament();
$departament>delete($id);
Redirect::to('cereri_concediu?user='.$user);


