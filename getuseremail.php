<?php
require_once 'core/init.php';
$nume = $_GET['nume'];
$angajat = new Angajat();
$angajatEmail = $angajat->getAngajatEmail($nume)[0]->email;
echo $angajatEmail;
