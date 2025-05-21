 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php")
?>

<?php

if($_POST)
{               


        /*--------------------------------- ETAT HOLIDAY -------------------------------------*/
         $id = $_POST['id_formation'];
        $id_personnel= $_POST['id_personnel'];
        $date_formation = $_POST['date_formation'];
        $statut = $_POST['statut'];
        $observation = $_POST['observation'];


         // echo $id.'</br>';
         // echo $nom.'</br>';
         // echo $numero_secteur.'</br>';
         // echo $tel.'</br>';
         // echo $responsable.'</br>';


        /*--------------------------------- SAVE DATA HOLIDAY ---------------------------*/

        $query1 = "UPDATE formation SET id_personnel=:id_personnel, date_formation=:date_formation, statut=:statut, observation=:observation where id_formation = '$id' ";

        $sql1 = $db->prepare($query1);

             // Bind parameters to statement
            $sql1->bindParam(':id_personnel', $id_personnel);
            $sql1->bindParam(':date_formation', $date_formation);
            $sql1->bindParam(':statut', $statut);
            $sql1->bindParam(':observation', $observation);
            $sql1->execute();



                                    if($sql1)
                                    {   
                                        
                                      ?>
                                        <script>
                                            alert('Formation a été bien modifiée.');
                                                  window.location.href='<?=$formation['option2_link']?>';
                                        </script>
                                        <?php

                                        

                                    }

                                    else
                                    {       
                                      ?>
                                        <script>
                                            alert('Formation n\'a pas été  modifiée.');
                                            window.location.href='modifier_formation.php?id=<?=$id?>';
                                        </script>
                                        <?php
                                       
                                    }


}
?>
