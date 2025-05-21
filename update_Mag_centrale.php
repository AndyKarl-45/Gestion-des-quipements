 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php")
?>

<?php

if($_POST)
{               


        /*--------------------------------- ETAT HOLIDAY -------------------------------------*/
         $ids_s = $_POST['ids_source'];
        $ids_c=0;
        $id_m = $_POST['id_materiel'];
        $statut=0; //en maintenance
        // echo $nom.'</br>';
        // echo $type_conger.'</br>';
        // echo $start_time.'</br>';
        // echo $end_time.'</br>';
        // echo $motif.'</br>';


        /*--------------------------------- SAVE DATA HOLIDAY ---------------------------*/

        $query1 = "UPDATE materiel SET id_salles=:ids_c, statut=:statut where id_salles = '$ids_s' and id_materiel='$id_m' ";

        $sql1 = $db->prepare($query1);

             // Bind parameters to statement
            $sql1->bindParam(':ids_c', $ids_c);
            $sql1->bindParam(':statut', $statut);
            $sql1->execute();



                                    if($sql1)
                                    {   
                                        
                                      ?>
                                        <script>
                                            alert('Equipement  a été bien transférer au Magasin Centrale.');
                                                 window.location.href='details_salle.php?id=<?php echo $ids_s?>';
                                        </script>
                                        <?php

                                        

                                    }

                                    else
                                    {       
                                      ?>
                                        <script>
                                            alert('Error.');
                                            window.location.href='details_salle.php?id=<?php echo $ids_s?>';
                                        </script>
                                        <?php
                                       
                                    }


}
?>
