<?php
require 'core/init.php';
$id = $_GET['id'];
$user = $_GET['user'];
$concediu = new Concediu();
$concediu->delete($id);
Redirect::to('cereri_concediu?user='.$user);


