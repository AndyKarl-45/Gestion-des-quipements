 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php")
?>
<?php

 $id_fournisseur= $_POST['id_fournisseur'];
        $id_materiel= $_POST['id_materiel'];
        

$id = count($id_materiel);
    echo $id.'</br>';

 for ($j = 0; $j <$id; $j++) {

    // echo $id_fournisseur.'</br>';
    //  echo $id_materiel[$j].'</br>';

 

 if($id_materiel[$j]!=""){

         $sql3 = "SELECT DISTINCT count(id_materiel) as total from fournisseur_materiel where id_materiel = '$id_materiel[$j]' and id_fournisseur='$id_fournisseur' ";

                                                                $stmt3 = $db->prepare($sql3);
                                                                $stmt3->execute();

                                                                $tables3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);

                                                                foreach($tables3 as $tables)
                                                                {

                                                                    $total = $tables['total'];

                    if($total!=1){ 

                                     $sql="SELECT * FROM materiel where id_materiel='$id_materiel[$j]' ";
                                                                        $stmt = $db->prepare($sql);
                                                                        $stmt->execute();

                                                                         $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                        foreach($tables as $table)
                                                                         {
                                                                             $prix_unitaire=$table['prix_unitaire'];
                 $prix_total=0;                                                          
                 $quantite=0;
                $date_four=date('y-m-d');



                               $sql = "INSERT INTO fournisseur_materiel (id_fournisseur, id_materiel,quantite_four,prix_unitaire_four,prix_total_four,date_four)
                                VALUES(:id_fournisseur,:id_materiel,:quantite_four,:prix_unitaire,:prix_total,:date_four)";
                                    $req = $db->prepare($sql);

                                    // Bind parameters to statement
                                    $req->bindParam(':id_fournisseur', $id_fournisseur);
                                    $req->bindParam(':id_materiel', $id_materiel[$j]);
                                    $req->bindParam(':quantite_four', $quantite);
                                    $req->bindParam(':prix_unitaire', $prix_unitaire);
                                    $req->bindParam(':prix_total', $prix_total);
                                     $req->bindParam(':date_four', $date_four);
                                    $req->execute();

                        }
                    }
                }

            }
 }

 if($id_fournisseur)
                                            {
                                                ?>
                                                <script>
                                                    alert('Matériel a été bien ajouté.');
                                                               window.location.href='details_fournisseur.php?id=<?=$id_fournisseur?>';
                                                </script>
                                                <?php
                                            }

                                            else
                                            {       
                                              ?>
                                                <script>
                                                    alert('Matériel n\'a pas été ajouté.');
                                                       window.location.href='details_fournisseur.php?id=<?=$id_fournisseur?>';
                                                </script>
                                                <?php
                                               
                                            }
?>
