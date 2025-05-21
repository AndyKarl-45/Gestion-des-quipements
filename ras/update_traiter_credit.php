 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php")
?>

<?php

if($_POST)
{               


        /*--------------------------------- ETAT HOLIDAY -------------------------------------*/
         $id = $_POST['id_credit'];
        $nom= $_POST['nom'];
        $type_conger = $_POST['type_conger'];
        $start_time = $_POST['start_time'];
        $modalite = $_POST['modalite'];
        $montant = $_POST['montant'];
        $motif = $_POST['motif'];
        $etat = $_POST['etat'];
         $observation = $_POST['observation'];


        // echo $nom.'</br>';
        // echo $type_conger.'</br>';
        // echo $start_time.'</br>';
        // echo $end_time.'</br>';
        // echo $motif.'</br>';


        /*--------------------------------- SAVE DATA HOLIDAY ---------------------------*/

        $query1 = "UPDATE credit SET nom=:nom, type_conger=:type_conger, start_time=:start_time, modalite=:modalite, montant=:montant, motif=:motif, etat=:etat, observation=:observation where id_credit = '$id' ";

        $sql1 = $db->prepare($query1);

             // Bind parameters to statement
            $sql1->bindParam(':nom', $nom);
            $sql1->bindParam(':type_conger', $type_conger);
            $sql1->bindParam(':start_time', $start_time);
            $sql1->bindParam(':modalite', $modalite);
            $sql1->bindParam(':montant', $montant);
            $sql1->bindParam(':motif', $motif);
            $sql1->bindParam(':etat', $etat);
            $sql1->bindParam(':observation', $observation);
            $sql1->execute();



                                    if($sql1)
                                    {
                                        ?>
                                        <script>
                                            alert('Credit a été bien enregistrée.');
                                                 window.location.href='<?=$credit['option2_link']?>';
                                        </script>
                                        <?php
                                    }

                                    else
                                    {       
                                      ?>
                                        <script>
                                            alert('Credit existe déjà.');
                                            window.location.href='<?=$credit['option2_link']?>';
                                        </script>
                                        <?php
                                       
                                    }


}
?>
