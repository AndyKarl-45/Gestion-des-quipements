 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php")
?>

<?php

if($_POST)
{               


        /*--------------------------------- ETAT INFOS RH -------------------------------------*/
        $id = $_POST['id_personnel'];
        $statut = $_POST['statut'];


        // echo $id.'</br>';
        //  echo $type_contrat.'</br>';
          // echo $statut.'</br>';
        // echo $sal_base.'</br>';
        // echo $sal_horaire.'</br>';
        // echo $matricule.'</br>';
        // echo $number_cnps.'</br>';
        // echo $nom_banque.'</br>';
        // echo $number_card_bancaire.'</br>';
        // echo $day_anciennete.'</br>';
        // echo $month_anciennete.'</br>';
        // echo $year_anciennete.'</br>';
        // echo $garant.'</br>';
        // echo $parrain_interne.'</br>';
        // echo $parrain_externe.'</br>';


        /*--------------------------------- SAVE DATA INFOS RH ---------------------------*/

        // $query1 = " INSERT INTO personnel (poste,date_embauche,type_contrat,statut,sal_base,sal_horaire,matricule,number_cnps,nom_banque,number_card_bancaire,day_anciennete,month_anciennete,year_anciennete) 
        // VALUES 
        // (:poste,:date_embauche,:type_contrat,:statut,:sal_base,:sal_horaire,:matricule,:number_cnps,:nom_banque,:number_card_bancaire,:day_anciennete,:month_anciennete,:year_anciennete)";

         $query1  = " UPDATE personnel SET statut=:statut   WHERE id_personnel = '$id' ";

                

        $sql1 = $db->prepare($query1);

             // Bind parameters to statement
            $sql1->bindParam(':statut', $statut);
            $sql1->execute();




                        if($sql1)
                                    {
                                        ?>
                                        <script>
                                            alert('Postulant a été bien mis à jour.');
                                                  // window.location.href='modifier_personnel.php?id=<?=$id?>';
                                        </script>
                                        <?php
                                    }

                                    else
                                    {       
                                      ?>
                                        <script>
                                            alert('Postulant n\'a pas été mis à jour.');
                                            window.location.href='modifier_personnel.php?id=<?=$id?>';
                                        </script>
                                        <?php
                                       
                                    }


}
?>
