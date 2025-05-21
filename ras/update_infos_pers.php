 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php")
?>

<?php

if($_POST)
{               


        /*--------------------------------- ETAT INFOS RH -------------------------------------*/
        $id = $_POST['id_personnels'];
        $cat_salariale = $_POST['cat_salariale'];
        $secteur = $_POST['secteur'];
        $salle = $_POST['salle'];
        $poste = $_POST['poste'];
        $date_embauche = $_POST['date_embauche'];
        $type_contrat = $_POST['type_contrat'];
        $statut =  $_POST['statut'];
         $sal_base = $_POST['sal_base'];
         $sal_horaire = $_POST['sal_horaire'];
         $matricule = $_POST['matricule'];
         $number_cnps = $_POST['number_cnps'];
         $nom_banque = $_POST['nom_banque'];
         $number_card_bancaire = $_POST['number_card_bancaire'];
         $day_anciennete = $_POST['day_anciennete'];
         $month_anciennete = $_POST['month_anciennete'];
         $year_anciennete = $_POST['year_anciennete'];
         $garant = $_POST['garant'];
         $parrain_interne = $_POST['parrain_interne'];
         $parrain_externe = $_POST['parrain_externe'];


        //  echo $id.'</br>';
        //  echo $cat_salariale.'</br>';
        // echo $secteur.'</br>';
        // echo $salle.'</br>';
        // echo $poste.'</br>';
        // echo $date_embauche.'</br>';
        //  echo $type_contrat.'</br>';
        //  echo $statut.'</br>';
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

         $query1  = " UPDATE personnel SET cat_salariale=:cat_salariale, secteur=:secteur, salle=:salle, poste=:poste, date_embauche=:date_embauche, 
                    type_contrat=:type_contrat, statut=:statut, sal_base=:sal_base, sal_horaire=:sal_horaire, matricule=:matricule, number_cnps=:number_cnps, nom_banque=:nom_banque, number_card_bancaire=:number_card_bancaire, day_anciennete=:day_anciennete, month_anciennete=:month_anciennete, year_anciennete=:year_anciennete, garant=:garant, parrain_interne=:parrain_interne, parrain_externe=:parrain_externe    WHERE id_personnel = '$id' ";

                

        $sql1 = $db->prepare($query1);

             // Bind parameters to statement
            $sql1->bindParam(':cat_salariale', $cat_salariale);
            $sql1->bindParam(':secteur', $secteur);
            $sql1->bindParam(':salle', $salle);
            $sql1->bindParam(':poste', $poste);
            $sql1->bindParam(':date_embauche', $date_embauche);
            $sql1->bindParam(':type_contrat', $type_contrat);
            $sql1->bindParam(':statut', $statut);
            $sql1->bindParam(':sal_base', $sal_base);
            $sql1->bindParam(':sal_horaire', $sal_horaire);
            $sql1->bindParam(':matricule', $matricule);
            $sql1->bindParam(':number_cnps', $number_cnps);
            $sql1->bindParam(':nom_banque', $nom_banque);
            $sql1->bindParam(':number_card_bancaire', $number_card_bancaire);
            $sql1->bindParam(':day_anciennete', $day_anciennete);
            $sql1->bindParam(':month_anciennete', $month_anciennete);
            $sql1->bindParam(':year_anciennete', $year_anciennete);
            $sql1->bindParam(':garant', $garant);
            $sql1->bindParam(':parrain_interne', $parrain_interne);
            $sql1->bindParam(':parrain_externe', $parrain_externe);
            $sql1->execute();



                        if($sql1)
                                    {
                                        ?>
                                        <script>
                                            alert('Personnel a été bien mis à jour.');
                                                  // window.location.href='modifier_personnel.php?id=<?=$id?>';
                                        </script>
                                        <?php
                                    }

                                    else
                                    {       
                                      ?>
                                        <script>
                                            alert('Personnel n\'a pas été mis à jour.');
                                            window.location.href='modifier_personnel.php?id=<?=$id?>';
                                        </script>
                                        <?php
                                       
                                    }


}
?>
