<?php
require 'core/init.php';
$concediu = new Concediu();
$concediuID = $_GET['id'];
$user = $_GET['user'];
$aproba = $_GET['aproba'];
$anulat = $_GET['anulat'];
if(isset($concediuID) && isset($aproba) && isset($anulat) && $aproba == 1 && $anulat == 0)
{
    try {
        $concediu->update($concediuID,array(
            'aprobat' => 1,
            'anulat' => 0
        ));
        Redirect::to('cereri_concediu?user='.$user);
    } catch (Exception $e)
    {
        die($e->getMessage());
    }
}
else if(isset($concediuID) && isset($aproba) && isset($anulat) && $aproba == 0 && $anulat == 1)
{
    try {
        $concediu->update($concediuID,array(
            'aprobat' => 0,
            'anulat' => 1
        ));
        Redirect::to('cereri_concediu?user='.$user);
    } catch (Exception $e)
    {
        die($e->getMessage());
    }
}
else if(isset($concediuID) && isset($aproba) && isset($anulat) && $aproba == 0 && $anulat == 0)
{
    try {
        $concediu->update($concediuID,array(
            'aprobat' => 0,
            'anulat' => 0
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