<?php
require_once 'core/init.php';
$id = $_GET['id'];
$angajat = new Angajat();
$angajatEmail = $angajat->getAngajatEmail($id)[0]->email;
echo $angajatEmail;
