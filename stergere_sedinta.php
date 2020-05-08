<?php
require 'core/init.php';
$id = $_GET['id'];
$user = $_GET['user'];
$sedinta = new Sedinta();
$sedinta->delete($id);
Redirect::to('sedinte?user='.$user);


