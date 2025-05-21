 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php")
?>

<?php

if($_POST)
{               


        /*--------------------------------- ETAT CIVILE -------------------------------------*/
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $id_card_number = $_POST['id_card_number'];
        $id_card_validity =  $_POST['id_card_validity'];
         $tel = $_POST['tel'];
         $email = $_POST['email'];
         $proprietaire_local = $_POST['proprietaire_local'];
         $tel_proprietaire = $_POST['tel_proprietaire'];
         $date_naissance = $_POST['date_naissance'];
         $lieu_naissance = $_POST['lieu_naissance'];
         $profession = $_POST['profession'];
         $situation_matrimoniale = $_POST['situation_matrimoniale'];
         $nombre_enfants = $_POST['nombre_enfants'];
         $genre = $_POST['genre'];
         $ville = $_POST['ville'];
         $quartier = $_POST['quartier'];
         $pays=$_POST['pays'];

        // echo $nom.'</br>';
        // echo $prenom.'</br>';
        // echo $id_card_number.'</br>';
        // echo $id_card_validity.'</br>';
        // echo $tel.'</br>';
        // echo $email.'</br>';
        //  echo $nom_pere.'</br>';
        //  echo $nom_mere.'</br>';
        // echo $date_naissance.'</br>';
        // echo $lieu_naissance.'</br>';
        // echo $profession.'</br>';
        // echo $situation_matrimoniale.'</br>';
        // echo $nombre_enfants.'</br>';
        // echo $genre.'</br>';


        /*--------------------------------- SAVE DATA CIVIL STATE ---------------------------*/

        $query1 = " INSERT INTO parrain_externe (nom,prenom,id_card_number,id_card_validity,tel,email,proprietaire_local,tel_proprietaire,date_naissance,lieu_naissance,profession,situation_matrimoniale,nombre_enfants,genre,ville,quartier,pays) 
        VALUES 
     (:nom,:prenom,:id_card_number,:id_card_validity,:tel,:email,:proprietaire_local,:tel_proprietaire,:date_naissance,:lieu_naissance,:profession,:situation_matrimoniale,:nombre_enfants,:genre,:ville,:quartier,:pays)";

                

        $sql1 = $db->prepare($query1);

             // Bind parameters to statement
            $sql1->bindParam(':nom', $nom);
            $sql1->bindParam(':prenom', $prenom);
            $sql1->bindParam(':id_card_number', $id_card_number);
            $sql1->bindParam(':id_card_validity', $id_card_validity);
            $sql1->bindParam(':tel', $tel);
            $sql1->bindParam(':email', $email);
            $sql1->bindParam(':proprietaire_local', $proprietaire_local);
            $sql1->bindParam(':tel_proprietaire', $tel_proprietaire);
            $sql1->bindParam(':date_naissance', $date_naissance);
            $sql1->bindParam(':lieu_naissance', $lieu_naissance);
            $sql1->bindParam(':profession', $profession);
            $sql1->bindParam(':situation_matrimoniale', $situation_matrimoniale);
            $sql1->bindParam(':nombre_enfants', $nombre_enfants);
            $sql1->bindParam(':genre', $genre);
            $sql1->bindParam(':ville', $ville);
            $sql1->bindParam(':quartier', $quartier);
            $sql1->bindParam(':pays', $pays);
            $sql1->execute();



                                    if($sql1)
                                    {
                                        ?>
                                        <script>
                                            alert('Parrain externe a été bien enregistré.');
                                                 window.location.href='<?=$parrain['option2_link']?>';
                                        </script>
                                        <?php
                                    }

                                    else
                                    {       
                                      ?>
                                        <script>
                                            alert('Parrain externe n\'a pas été enregistré.');
                                            window.location.href='<?=$parrain['option2_link']?>';
                                        </script>
                                        <?php
                                       
                                    }


}
?>
