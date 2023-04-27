<?php
require 'core/init.php';
$demisie= new Demisie();
$demisieID = $_GET['id'];
$user = $_GET['user'];
$aproba = $_GET['aproba'];
$dezaproba = $_GET['dezaproba'];
if(isset($demisieID) && isset($aproba) && $aproba == 1)
{
    try {
        $demisie->update($demisieID,array(
            'aprobat' => 1
        ));
        Redirect::to('demisii?user='.$user);
    } catch (Exception $e)
    {
        die($e->getMessage());
    }
}
else {
    try {
        $demisie->update($demisieID,array(
            'aprobat' => 0
        ));
        Redirect::to('demisii?user='.$user);
    } catch (Exception $e)
    {
        die($e->getMessage());
    }
}