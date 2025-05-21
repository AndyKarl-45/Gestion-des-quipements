<?php
include ('first.php');
?>

<?php

$id=$_REQUEST['id'];


    echo $id;

    $sql = $conn->query("UPDATE agenda SET statut='D'
                                    WHERE id_agenda='$id'");

    if($sql)
    {
        ?>
        <script>
            // alert('Evenement ajouté mis à jour.');
            window.location.href='agenda.php';
        </script>
        <?php
    }

    else
    {
        ?>
        <script>
            // alert('Erreur.');
            window.location.href='agenda.php';
        </script>
        <?php
    }

?>
