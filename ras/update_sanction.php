 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php")
?>

<?php

if($_POST)
{               


        /*--------------------------------- ETAT HOLIDAY -------------------------------------*/
         $id = $_POST['id_sanction'];
        $id_personnel= $_POST['id_personnel'];
        $nature = $_POST['nature'];
        $motif = $_POST['motif'];
        $date_sanction = $_POST['date_sanction'];
        $montant = $_POST['montant'];


         // echo $id.'</br>';
         // echo $id_personnel.'</br>';
         //  echo $nature.'</br>';
         //  echo $motif.'</br>';
         //  echo $date_sanction.'</br>';
         //   echo $montant.'</br>';


        /*--------------------------------- SAVE DATA HOLIDAY ---------------------------*/

        $query1 = "UPDATE sanction SET id_personnel=:id_personnel, nature=:nature, motif=:motif, date_sanction=:date_sanction, montant=:montant where id_sanction = '$id' ";

        $sql1 = $db->prepare($query1);

             // Bind parameters to statement
            $sql1->bindParam(':id_personnel', $id_personnel);
            $sql1->bindParam(':nature', $nature);
            $sql1->bindParam(':motif', $motif);
            $sql1->bindParam(':date_sanction', $date_sanction);
            $sql1->bindParam(':montant', $montant);
            $sql1->execute();



                                    if($sql1)
                                    {   
                                        
                                      ?>
                                        <script>
                                            alert('sanction a été bien modifiée.');
                                                   window.location.href='<?=$sanction['option2_link']?>';
                                        </script>
                                        <?php

                                        

                                    }

                                    else
                                    {       
                                      ?>
                                        <script>
                                            alert('Sanction n\'a pas été  modifiée.');
                                            window.location.href='<?=$sanction['option2_link']?>';
                                        </script>
                                        <?php
                                       
                                    }


}
?>
