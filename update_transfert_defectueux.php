 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php")
?>

<?php

if($_POST)
{               



        $id_chantier = $_POST['id_chantier'];
        $id_materiel = $_POST['id_materiel'];
        $quantite_etape = $_POST['quantite_etape'];
        $date_mag_etape = $_POST['date_mag_etape'];

        
        // echo $id_materiel.'</br>';
        // echo $quantite_etape.'</br>';
        // echo $date_mag_etape.'</br>';

if($quantite_etape>=0){
     $query = "SELECT * from magasin_chantier where id_materiel= '$id_materiel' and id_chantier='$id_chantier' ";
                                                        $q = $db->query($query);
                                                        while($row = $q->fetch())
                                                        {
                                                            // $id = $row['id_materiel'];
                                                            // $ref_materiel = $row['ref_materiel'];
                                                            // $designation = $row['designation'];
                                                            $quantite_chantier = $row['quantite_chantier'];
                                                            // $id_cat_materiel = $row['id_cat_materiel'];
                                                            $prix_uni_mag = $row['prix_unitaire_mag_chantier'];
                                                             // $prix_total = $row['prix_total'];


                                                            $quantite_total=$quantite_chantier-$quantite_etape;
                                                            echo $quantite_total.'</br>';

                        
     if($quantite_total>=0){

            $prix_total_f=$quantite_total*$prix_uni_mag;

        $query1 = "UPDATE magasin_chantier SET quantite_chantier=:quantite, prix_total_mag_chantier=:prix_total where id_materiel = '$id_materiel' and id_chantier= '$id_chantier' ";
  
        $sql1 = $db->prepare($query1);

             // Bind parameters to statement
            $sql1->bindParam(':quantite', $quantite_total);
            $sql1->bindParam(':prix_total', $prix_total_f);
            $sql1->execute();



                            $prix_total=$quantite_etape*$prix_uni_mag;
                             echo $prix_total.'</br>';










         $sql3 = "SELECT DISTINCT count(id_materiel) as total from magasin_etape where id_chantier = '$id_chantier' and id_materiel='$id_materiel'";

                                                                $stmt3 = $db->prepare($sql3);
                                                                $stmt3->execute();

                                                                $tables3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);

                                                                foreach($tables3 as $tables)
                                                                {

                                                                    $total = $tables['total'];

                    if($total!=1){

             $query = " INSERT INTO magasin_etape (id_chantier,id_materiel,quantite_etape,date_mag_etape,prix_unitaire_mag_etape,prix_total_mag_etape) 
                    VALUES (:id_chantier,:id_materiel,:quantite_etape,:date_mag_etape,:prix_unitaire,:prix_total)";


        $sql = $db->prepare($query);

             // Bind parameters to statement
            $sql->bindParam(':id_chantier', $id_chantier);
            $sql->bindParam(':id_materiel', $id_materiel);
            $sql->bindParam(':quantite_etape', $quantite_etape);
            $sql->bindParam(':date_mag_etape', $date_mag_etape);
            $sql->bindParam(':prix_unitaire', $prix_uni_mag);
            $sql->bindParam(':prix_total', $prix_total);
            $sql->execute();

            if($quantite_total>0)
                                    {
                                        ?>
                                        <script>
                                            alert('materiel a été bien transférer.');
                                                  window.location.href='details_salle.php?id=<?=$id_chantier?>&witness=1';
                                        </script>
                                        <?php
                                    }

                                    else
                                    {       
                                      ?>
                                        <script>
                                            alert('Stock est épuisé.');
                                              window.location.href='details_salle.php?id=<?=$id_chantier?>&witness=-1';
                                        </script>
                                        <?php
                                       
                                    }

                    }else{

                         $sql = "SELECT DISTINCT * from magasin_etape where id_chantier = '$id_chantier' and id_materiel='$id_materiel' ";

                                                                $stmt = $db->prepare($sql);
                                                                $stmt->execute();

                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                foreach($tables as $table)
                                                                {
                                                                    // valaur initial
                                                                    $quant_inital=$table['quantite_etape'];
                                                                    $date_initial=$table['date_mag_etape'];
                                                                    $prix_total_initial=$table['prix_total_mag_etape'];

                                                                    //valeur final
                                                                    $quant_final=$quant_inital+$quantite_etape;
                                                                    // echo $quant_inital.'<br/>';
                                                                    $date_final=$date_mag_etape;
                                                                    // echo $date_final.'<br/>';
                                                                    $prix_total_final=$prix_total_initial+$prix_total;
                                                                    // echo $prix_total_final.'<br/>';


         $query = "UPDATE magasin_etape SET  quantite_etape=:quantite_etape, date_mag_etape=:date_mag_etape, prix_total_mag_etape=:prix_total_final where id_materiel = '$id_materiel' and id_chantier = '$id_chantier' ";

                $sql = $db->prepare($query);

                    // Bind parameters to statement;
                        $sql->bindParam(':quantite_etape', $quant_final);
                        $sql->bindParam(':date_mag_etape', $date_final);
                        $sql->bindParam(':prix_total_final', $prix_total_final);
                        $sql->execute();

                            if($quantite_total>0)
                                                    {
                                                        ?>
                                                        <script>
                                                            alert('materiel a été bien transférer.');
                                                                  window.location.href='details_salle.php?id=<?=$id_chantier?>&witness=1';
                                                        </script>
                                                        <?php
                                                    }

                                                    else
                                                    {       
                                                      ?>
                                                        <script>
                                                            alert('Stock est épuisé.');
                                                              window.location.href='details_salle.php?id=<?=$id_chantier?>&witness=-1';
                                                        </script>
                                                        <?php
                                                       
                                                    }


                            }

                  }



        }





        }else{

           
                                        ?>
                                        <script>
                                            alert('stock insuffisant.');
                                               window.location.href='details_salle.php?id=<?=$id_chantier?>&witness=-2';
                                        </script>
                                        <?php
                                    

        
                                   
                                                                
        }


                                                          }
}else{

        ?>
                                        <script>
                                            alert('Valeur incorrect.');
                                               window.location.href='details_salle.php?id=<?=$id_chantier?>&witness=2';
                                        </script>
                                        <?php

}












        

                          



}
?>
