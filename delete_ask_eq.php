<?php

include ("php/dbconnect.php");


if (isset($_REQUEST['idi']) and isset($_REQUEST['ids']) and isset($_REQUEST['idm'])) {
    $id_ask_eq = $_REQUEST['idi'];
    $id_salles = $_REQUEST['ids'];
    $id_materiel = $_REQUEST['idm'];
    // echo $id_personnel;

    $query = "DELETE FROM demande_materiel WHERE id_salles='$id_salles' and id_ask_eq='$id_ask_eq' and id_materiel='$id_materiel' ";
    $sql = $conn->query($query);


    if ($sql)
    {
        ?>
                                                <script>
                                                    alert('Demande d\'équipement a été bien modifié.');
                                                              window.location.href='modifier_demande_eq.php?id=<?=$id_ask_eq?>';
                                                </script>
                                                <?php
    }
    else
    {

       ?>
                                                <script>
                                                    alert('Demande d\'équipement a été bien modifié.');
                                                              window.location.href='modifier_demande_eq.php?id=<?=$id_ask_eq?>';
                                                </script>
                                                <?php
    }
}


?>
