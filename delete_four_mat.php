<?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php");

if ($_REQUEST) {
    $id = $_REQUEST['id'];
     $id_f = $_REQUEST['id_four'];


    $query = "DELETE FROM fournisseur_materiel WHERE id_four_mat='$id'";
    $sql = $conn->query($query);


    if ($sql)
    {
        echo "<script>
                    alert(' Equipement supprimé.');
                window.location.href='details_fournisseur.php?id=$id_f';
            </script>";
    }
    else
    {

        echo "<script>
                    alert('Equiepement n\'a pas été supprimé.');
                window.location.href='details_fournisseur.php?id=$id_f';
            </script>";
    }
}






?>
