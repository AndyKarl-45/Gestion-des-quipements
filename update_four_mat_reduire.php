 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php")
?>

<?php

if($_POST)
{               


        
     
        $id_materiel = $_POST['id_materiel'];
        $id_fournisseur = $_POST['id_fournisseur'];
        $quantite_chantier = $_POST['quantite_chantier'];
        $date_four = $_POST['date_mag_chantier'];

       
        echo $id_materiel.'</br>';
        echo $quantite_chantier.'</br>';


if($quantite_chantier>=0){

     $query = "SELECT * from materiel where id_materiel= '$id_materiel' ";
                                                        $q = $db->query($query);
                                                        while($row = $q->fetch())
                                                        {
                                                            // $id = $row['id_materiel'];
                                                            // $ref_materiel = $row['ref_materiel'];
                                                            // $designation = $row['designation'];
                                                            $quantite = $row['quantite'];
                                                            // $id_cat_materiel = $row['id_cat_materiel'];
                                                            $prix_unitaire = $row['prix_unitaire'];
                                                             // $prix_total = $row['prix_total'];


                                                            $quantite_total=$quantite-$quantite_chantier;
                                                            echo $quantite_total.'</br>';

 $sql3 = "SELECT * from fournisseur_materiel where id_fournisseur = '$id_fournisseur' and id_materiel='$id_materiel' ";

                                                                $stmt3 = $db->prepare($sql3);
                                                                $stmt3->execute();

                                                                $tables3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);

                                                                foreach($tables3 as $tables)
                                                                {

                                                                    $quantite_four = $tables['quantite_four'];

                                                            $quant=$quantite_four-$quantite_chantier;
                                                            echo $quant.'</br>';
                                                            

                        
     if($quantite_total>=0 and $quant>=0){

       
            //-------------- reduire des équipemnts dans la table materiel 

            $prix_total_f=$quantite_total*$prix_unitaire;

        $query1 = "UPDATE materiel SET quantite=:quantite, prix_total=:prix_total where id_materiel = '$id_materiel' ";
  
        $sql1 = $db->prepare($query1);

             // Bind parameters to statement
            $sql1->bindParam(':quantite', $quantite_total);
            $sql1->bindParam(':prix_total', $prix_total_f);
            $sql1->execute();

        //-------------- reduire des équipemnts dans la table fournissur materiel 
            $prix = $quant*$prix_unitaire;

        $query1 = "UPDATE fournisseur_materiel SET quantite_four=:quantite, prix_total_four=:prix_total, date_four=:date_four where id_materiel = '$id_materiel' and id_fournisseur = '$id_fournisseur' ";
  
        $sql1 = $db->prepare($query1);

             // Bind parameters to statement
            $sql1->bindParam(':quantite', $quant);
            $sql1->bindParam(':prix_total', $prix);
            $sql1->bindParam(':date_four', $date_four);
            $sql1->execute();

                if($quantite_total>0 and $quant>0)
                                    {
                                        ?>
                                        <script>
                                            alert('materiel a été bien transférer.');
                                                  window.location.href='details_fournisseur.php?id=<?=$id_fournisseur?>';
                                        </script>
                                        <?php
                                    }

                                    else
                                    {       
                                      ?>
                                        <script>
                                            alert('Stock épuisé.');
                                              window.location.href='details_fournisseur.php?id=<?=$id_fournisseur?>';
                                        </script>
                                        <?php
                                    }
                                       
                 


        }else{

                 ?>
                                        <script>
                                            alert('stock insuffisant.');
                                               window.location.href='ajouter_four_mat.php?id_materiel=<?=$id_materiel?>&id_fournisseur=<?=$id_fournisseur?>';
                                        </script>
                                        <?php



             }
    }

 }

}else{
            ?>
                                        <script>
                                            alert('Valeur Incorrect.');
                                               window.location.href='ajouter_four_mat.php?id_materiel=<?=$id_materiel?>&id_fournisseur=<?=$id_fournisseur?>';
                                        </script>
                                        <?php

}








        

                          



}
?>
