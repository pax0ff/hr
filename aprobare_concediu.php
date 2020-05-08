<?php
require 'core/init.php';
$concediu = new Concediu();
$concediuID = $_GET['id'];
$user = $_GET['user'];
$aproba = $_GET['aproba'];
$dezaproba = $_GET['dezaproba'];
if(isset($concediuID) && isset($aproba) && $aproba == 1)
{
    try {
        $concediu->update($concediuID,array(
            'aprobat' => 1
        ));
        Redirect::to('cereri_concediu?user='.$user);
    } catch (Exception $e)
    {
        die($e->getMessage());
    }
}
else {
    try {
        $concediu->update($concediuID,array(
            'aprobat' => 0
        ));
        Redirect::to('cereri_concediu?user='.$user);
    } catch (Exception $e)
    {
        die($e->getMessage());
    }
}