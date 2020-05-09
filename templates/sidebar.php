<?php
require_once './core/init.php';
$username = $_GET['user'];
$user = new User($username);
$data = $user->data();
?>

<?php
if($user->hasPermission('hr'))
{
?>
<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading">Bine ai venit - <?php echo $username;?></div>
    <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="pontaj_nou?user=<?php echo $username;?>" class="list-group-item list-group-item-action bg-light" ">Pontaj nou</a>
        <a href="vezi_pontaj?user=<?php echo $username;?>" class="list-group-item list-group-item-action bg-light">Vezi pontaje</a>
        <a href="cereri_concediu?user=<?php echo $username;?>" class="list-group-item list-group-item-action bg-light">Cereri concediu</a>
        <a href="adaugare_concediu?user=<?php echo $username;?>" class="list-group-item list-group-item-action bg-light">Adaugare concediu</a>
        <a href="angajati?user=<?php echo $username;?>" class="list-group-item list-group-item-action bg-light">Angajati</a>
        <a href="adauga_angajat?user=<?php echo $username;?>" class="list-group-item list-group-item-action bg-light">Adauga angajat</a>
        <a href="sedinte?user=<?php echo $username;?>" class="list-group-item list-group-item-action bg-light">Sedinte</a>
        <a href="adauga_sedinta?user=<?php echo $username;?>" class="list-group-item list-group-item-action bg-light">Sedinta noua</a>
        <a href="demisii?user=<?php echo $username;?>" class="list-group-item list-group-item-action bg-light">Demisii</a>
        <a href="adauga_demisie?user=<?php echo $username;?>" class="list-group-item list-group-item-action bg-light">Demisie noua</a>
        <a href="departamente?user=<?php echo $username;?>" class="list-group-item list-group-item-action bg-light">Departamente</a>
        <a href="adauga_departament?user=<?php echo $username;?>" class="list-group-item list-group-item-action bg-light">Departament nou</a>
        <a href="adauga_functie?user=<?php echo $username;?>" class="list-group-item list-group-item-action bg-light">Adauga functie</a>
    </div>
</div>
<?php } else if($user->hasPermission('manager')) { ?>
<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading">MANAGER </div>
    <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <!--<a href="pontaje?user=<?php echo $username; ?>" class="list-group-item list-group-item-action bg-light">Pontaje</a>-->
        <a href="vezi_pontaj?user=<?php echo $username;?>" class="list-group-item list-group-item-action bg-light">Vezi pontaje</a>
        <a href="cereri_concediu?user=<?php echo $username;?>" class="list-group-item list-group-item-action bg-light">Cereri concediu</a>
        <a href="angajati?user=<?php echo $username;?>" class="list-group-item list-group-item-action bg-light">Angajati</a>
        <a href="adauga_angajat?user=<?php echo $username;?>" class="list-group-item list-group-item-action bg-light">Adauga angajat</a>
        <a href="sedinte?user=<?php echo $username;?>" class="list-group-item list-group-item-action bg-light">Sedinte</a>
        <a href="adauga_sedinta?user=<?php echo $username;?>" class="list-group-item list-group-item-action bg-light">Sedinta noua</a>
        <a href="demisii?user=<?php echo $username;?>" class="list-group-item list-group-item-action bg-light">Demisii</a>
    </div>
</div>
<?php } else if($user->hasPermission('ceo')) { ?>
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">CEO</div>
        <div class="list-group list-group-flush">
            <a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>
            <!--<a href="pontaje?user=<?php echo $username; ?>" class="list-group-item list-group-item-action bg-light">Pontaje</a>-->
            <a href="vezi_pontaj?user=<?php echo $username;?>" class="list-group-item list-group-item-action bg-light">Vezi pontaje</a>
            <a href="cereri_concediu?user=<?php echo $username;?>" class="list-group-item list-group-item-action bg-light">Cereri concediu</a>
            <a href="adaugare_concediu?user=<?php echo $username;?>" class="list-group-item list-group-item-action bg-light">Adaugare concediu</a>
            <a href="angajati?user=<?php echo $username;?>" class="list-group-item list-group-item-action bg-light">Angajati</a>
            <a href="sedinte?user=<?php echo $username;?>" class="list-group-item list-group-item-action bg-light">Sedinte</a>
            <a href="adauga_sedinta?user=<?php echo $username;?>" class="list-group-item list-group-item-action bg-light">Sedinta noua</a>
            <a href="demisii?user=<?php echo $username;?>" class="list-group-item list-group-item-action bg-light">Demisii</a>
            <a href="adauga_demisie?user=<?php echo $username;?>" class="list-group-item list-group-item-action bg-light">Demisie noua</a>
            <a href="adauga_functie?user=<?php echo $username;?>" class="list-group-item list-group-item-action bg-light">Adauga functie</a>
        </div>
    </div>
    <?php } else if($user->hasPermission('paza')) { ?>
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">Paza - <?php echo $username; ?></div>
        <div class="list-group list-group-flush">
            <a href="adauga_pontaj_paza?user=<?php echo $username;?>" class="list-group-item list-group-item-action bg-light" ">Pontaj nou</a>
            <a href="vezi_pontaj?user=<?php echo $username;?>" class="list-group-item list-group-item-action bg-light">Vezi pontaje</a>
        </div>
    </div>
<?php } else { ?>
<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading">ANGAJAT - <?php echo $username; ?></div>
    <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="cereri_concediu_personale?user=<?php echo $username; ?>" class="list-group-item list-group-item-action bg-light">Cererile mele de concediu</a>
        <a href="solicita_concediu?user=<?php echo $username;?>" class="list-group-item list-group-item-action bg-light">Solicita concediu</a>
        <a href="sedinte_angajat?user=<?php echo $username;?>" class="list-group-item list-group-item-action bg-light">Sedinte</a>
    </div>
</div>
<?php } ?>