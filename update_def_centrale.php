 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php")
?>

<?php

if($_POST)
{               


        /*--------------------------------- ETAT HOLIDAY -------------------------------------*/
        $ids_c=0;
        $id_m = $_POST['id_materiel'];
        $statut=0; //en maintenance
        // echo $nom.'</br>';
        // echo $type_conger.'</br>';
        // echo $start_time.'</br>';
        // echo $end_time.'</br>';
        // echo $motif.'</br>';


        /*--------------------------------- SAVE DATA HOLIDAY ---------------------------*/

        $query1 = "UPDATE materiel SET id_salles=:ids_c, statut=:statut where  id_materiel='$id_m' ";

        $sql1 = $db->prepare($query1);

             // Bind parameters to statement
            $sql1->bindParam(':ids_c', $ids_c);
            $sql1->bindParam(':statut', $statut);
            $sql1->execute();



                                    if($sql1)
                                    {   
                                        
                                      ?>
                                        <script>
                                            alert('Equipement a été bien transférer dans le magasin_centrale.');
                                                 window.location.href='liste_mag_def.php?witness=1';
                                        </script>
                                        <?php

                                        

                                    }

                                    else
                                    {       
                                      ?>
                                        <script>
                                            alert('Error.');
                                            window.location.href='liste_mag_def.php?witness=-1';
                                        </script>
                                        <?php
                                       
                                    }


}
?>
