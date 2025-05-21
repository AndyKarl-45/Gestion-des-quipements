 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php")
?>

<?php

if($_POST)
{               


        /*--------------------------------- ETAT HOLIDAY -------------------------------------*/
        // $id = $_POST['id_personnel'];
        $nom= $_POST['nom'];
        $type_conger = $_POST['type_conger'];
        $start_time = $_POST['start_time'];
        $end_time = $_POST['end_time'];
        $motif = $_POST['motif'];
        $etat = 0;       
        $observation ="N/A";

        // echo $nom.'</br>';
        // echo $type_conger.'</br>';
        // echo $start_time.'</br>';
        // echo $end_time.'</br>';
        // echo $motif.'</br>';

        /*--------------------------------- SAVE DATA HOLIDAY ---------------------------*/

        $query1 = " INSERT INTO conger_manager (nom,type_conger,start_time,end_time,motif,etat,observation) 
        VALUES 
        (:nom,:type_conger,:start_time,:end_time,:motif,:etat,:observation)";

        $sql1 = $db->prepare($query1);

             // Bind parameters to statement
            $sql1->bindParam(':nom', $nom);
            $sql1->bindParam(':type_conger', $type_conger);
            $sql1->bindParam(':start_time', $start_time);
            $sql1->bindParam(':end_time', $end_time);
            $sql1->bindParam(':motif', $motif);
            $sql1->bindParam(':etat', $etat);
            $sql1->bindParam(':observation', $observation);
            $sql1->execute();



                                    if($sql1)
                                    {
                                        ?>
                                        <script>
                                            alert('Congé a été bien enregistrée.');
                                                 window.location.href='<?=$activite['option2_link']?>';
                                        </script>
                                        <?php
                                    }

                                    else
                                    {       
                                      ?>
                                        <script>
                                            alert('Congé existe déjà.');
                                            window.location.href='<?=$activite['option2_link']?>';
                                        </script>
                                        <?php
                                       
                                    }


}
?>
