<?php
require 'core/init.php';
$sedinta = new Sedinta();
$sedintaID = $_GET['id'];
$user = $_GET['user'];
$aproba = $_GET['aproba'];
$dezaproba = $_GET['dezaproba'];
if(isset($sedintaID) && isset($aproba) && $aproba == 1)
{
    try {
        $sedinta->update($sedintaID,array(
            'aprobat' => 1
        ));
        Redirect::to('sedinte?user='.$user);
    } catch (Exception $e)
    {
        die($e->getMessage());
    }
}
else {
    try {
        $sedinta->update($sedintaID,array(
            'aprobat' => 0
        ));
        Redirect::to('sedinte?user='.$user);
    } catch (Exception $e)
    {
        die($e->getMessage());
    }
}