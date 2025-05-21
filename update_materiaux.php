 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php")
?>

<?php

if($_POST)
{               


        /*--------------------------------- ETAT INFOS RH -------------------------------------*/
        $id = $_POST['id_materiel'];
        $ref_materiel = $_POST['ref_materiel'];
        $designation = $_POST['designation'];
        $quantite = abs($_POST['quantite']);
        $id_cat_materiel = $_POST['id_cat_materiel'];
        $prix_unitaire = $_POST['prix_unitaire'];
       



          // echo $id.'</br>';
        // echo $ref_materiel.'</br>';
        // echo $designation.'</br>';
        //  echo $quantite.'</br>';
          // echo $id_cat_materiel.'</br>';
        // echo $prix_unitaire.'</br>';
        // echo $prix_total.'</br>';
        // echo $alert.'</br>';

    $prix_total=$prix_unitaire*$quantite;
        



//--------------------------------- insertion un materiel -----------------------------------------//
                if( $prix_unitaire>=0) {


         $query1  = " UPDATE materiel SET  ref_materiel=:ref_materiel, designation=:designation, 
                    quantite=:quantite, id_cat_materiel=:id_cat_materiel, prix_unitaire=:prix_unitaire, prix_total=:prix_total    
                    WHERE id_materiel = '$id' ";

                

        $sql1 = $db->prepare($query1);

             // Bind parameters to statement
            $sql1->bindParam(':ref_materiel', $ref_materiel);
            $sql1->bindParam(':designation', $designation);
            $sql1->bindParam(':quantite', $quantite);
            $sql1->bindParam(':id_cat_materiel', $id_cat_materiel);
            $sql1->bindParam(':prix_unitaire', $prix_unitaire);
            $sql1->bindParam(':prix_total', $prix_total);
            $sql1->execute();



                        if($sql1)
                                    {
                                        ?>
                                        <script>
                                            alert('Equipement a été bien mis à jour.');
                                                    window.location.href='<?=$materiaux['option2_link']?>?witness=1';
                                        </script>
                                        <?php
                                    }

                                    else
                                    {       
                                      ?>
                                        <script>
                                            alert('Equipement n\'a pas été mis à jour.');
                                            window.location.href='<?=$materiaux['option2_link']?>?witness=-1';
                                        </script>
                                        <?php
                                       
                                    }


                    }else{

                            ?>
                                        <script>
                                            alert('Le prix unitaire est négatif.');
                                            window.location.href='<?=$materiaux['option2_link']?>?witness=-1';
                                        </script>
                                        <?php
                         }


}
?>
