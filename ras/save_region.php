<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php");
?>

<?php

if($_POST)
{



    $nom = $_POST['nom'];
    $id_pays = $_POST['id_pays'];

    // echo $nom;
    // echo $id_pays;
    $query = "INSERT INTO region (nom,id_pays) VALUES (:nom,:id_pays)";

    $sql = $db->prepare($query);

    // Bind parameters to statement
    $sql->bindParam(':nom', $nom);
    $sql->bindParam(':id_pays', $id_pays);
    $sql->execute();

    if($sql)
    {
        ?>
        <script>
            alert('Région a été bien enregistrée.');
            window.location.href='liste_region.php';
        </script>
        <?php
    }

    else
    {
        ?>
        <script>
            alert('Error.');
            window.location.href='liste_region.php';
        </script>
        <?php

    }


}
?>
