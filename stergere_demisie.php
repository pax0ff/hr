<?php
require 'core/init.php';
$id = $_GET['id'];
$user = $_GET['user'];
$demisie = new Demisie();
$demisie->delete($id);
Redirect::to('demisii?user='.$user);


