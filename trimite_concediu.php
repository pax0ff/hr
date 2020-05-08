<?php
require 'core/init.php';
$concediu =  new Concediu();
$id = $_GET['id'];
print_r($concediu->getDataById($id)[0]);
