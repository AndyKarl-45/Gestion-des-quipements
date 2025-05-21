 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php")
?>

<?php

if($_POST)
{               


        /*--------------------------------- ETAT HOLIDAY -------------------------------------*/
         $id = $_POST['id_litige'];
        $id_personnel= $_POST['id_personnel'];
        $date_litige = $_POST['date_litige'];
        $nature = $_POST['nature'];
        $motif = $_POST['motif'];


         // echo $id.'</br>';
         // echo $nom.'</br>';
         // echo $numero_secteur.'</br>';
         // echo $tel.'</br>';
         // echo $responsable.'</br>';


        /*--------------------------------- SAVE DATA HOLIDAY ---------------------------*/

        $query1 = "UPDATE litige SET id_personnel=:id_personnel, date_litige=:date_litige, nature=:nature, motif=:motif where id_litige = '$id' ";

        $sql1 = $db->prepare($query1);

             // Bind parameters to statement
            $sql1->bindParam(':id_personnel', $id_personnel);
            $sql1->bindParam(':date_litige', $date_litige);
            $sql1->bindParam(':nature', $nature);
            $sql1->bindParam(':motif', $motif);
            $sql1->execute();



                                    if($sql1)
                                    {   
                                        
                                      ?>
                                        <script>
                                            alert('Litige a été bien modifiée.');
                                                window.location.href='<?=$litige['option2_link']?>';
                                        </script>
                                        <?php

                                        

                                    }

                                    else
                                    {       
                                      ?>
                                        <script>
                                            alert('Litige n\'a pas été  modifiée.');
                                            window.location.href='modifier_litige.php?id=<?=$id?>';
                                        </script>
                                        <?php
                                       
                                    }


}
?>
