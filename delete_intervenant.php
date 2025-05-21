<?php

include ("php/dbconnect.php");


if (isset($_REQUEST['idi']) and isset($_REQUEST['ids']) and isset($_REQUEST['idm'])) {
    $id_inter = $_REQUEST['idi'];
    $id_salles = $_REQUEST['ids'];
    $id_materiel = $_REQUEST['idm'];
    // echo $id_personnel;

    $query = "DELETE FROM intervention_materiel WHERE id_salles='$id_salles' and id_inter='$id_inter' and id_materiel='$id_materiel' ";
    $sql = $conn->query($query);


    if ($sql)
    {
        ?>
                                                <script>
                                                    alert('Intervention a été bien modifié.');
                                                              window.location.href='modifier_intervenant.php?id=<?=$id_inter?>';
                                                </script>
                                                <?php
    }
    else
    {

       ?>
                                                <script>
                                                    alert('Intervention a été bien modifié.');
                                                              window.location.href='modifier_intervenant.php?id=<?=$id_inter?>';
                                                </script>
                                                <?php
    }
}


?>
