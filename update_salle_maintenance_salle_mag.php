<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php");

?>
<?php
if($_POST) {


    /*--------------------------------- ETAT HOLIDAY -------------------------------------*/
    $ids_s = $_POST['ids_source'];
    $ids_c = 0;

    $id_salles_src = $_POST['ids_source'];
    $id_salles_dst = 0;
    $id_materiel = $_POST['id_materiel'];
    $id_ask_mat = $_POST['id_ask_mat'];

    $id_m = $_POST['id_materiel'];
    $quantite = $_POST['quantite'];
    $statut = 2;
}
?>
