for ($j = 0; $j <$id; $j++) {

 if($id_materiel[$j]!=""){

 echo 'id_materiel :'.$id_materiel[$j].'</br>';


    $sql = "SELECT * FROM materiel where id_materiel='$id_materiel[$j]' and mag='$mag' ";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($tables as $table) {
       echo 'quantit_stock: '.$quantite_mat = $table['quantite'].'<br>';
        $prix_unitaire = $table['prix_unitaire'];
    }

    echo 'quantit_ask: '.$quantite[$j].'<br>';
    echo 'quantit_restant: '.$quantite_reste=$quantite_mat-$quantite[$j].'<br>';

if ($quantite_reste>=0){


            $sql="SELECT * FROM salles where id_salles='$id_salles' ";
                            $stmt = $db->prepare($sql);
                            $stmt->execute();

                             $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach($tables as $table)
                                        {
                                            $nom_salle=$table['nom'];
                                        }

    $emetteur=$mag;
    $receveur='S';                                  
    $etat=0;
    $date_valide='N/A';
    $query = " INSERT INTO demande_equipement (id_salles,nom_salle,date_debut,date_valide,etat,emetteur,receveur,responsable) 
                     VALUES (:id_salles,:nom_salle,:date_debut,:date_valide,:etat,:emetteur,:receveur,:resp)";

                 $sql = $db->prepare($query);

     // Bind parameters to statement
            $sql->bindParam(':id_salles', $id_salles);
            $sql->bindParam(':nom_salle', $nom_salle);
            $sql->bindParam(':date_debut', $date_debut);
            $sql->bindParam(':date_valide', $date_valide);
            $sql->bindParam(':etat', $etat);
            $sql->bindParam(':emetteur', $emetteur);
            $sql->bindParam(':receveur', $receveur);
            $sql->bindParam(':resp', $user);
            $sql->execute();


      $sql="SELECT id_ask_eq as total FROM demande_equipement  ";
                            $stmt = $db->prepare($sql);
                            $stmt->execute();

                             $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach($tables as $table)
                                        {
                                            $to=$table['total'];
                                        }
                                        $total=$to;


    // $prix_total_f=$quantite_reste*$prix_unitaire;
    $etat=0;
    echo $quantite[$j];

      $sql = "INSERT INTO demande_materiel (id_salles, id_materiel,nom_salle,date_debut_mat,id_ask_eq,quantite,etat,emetteur,receveur,responsable)
                                VALUES(:id_salles,:id_materiel,:nom_salle,:date_debut,:id_ask_eq,:quantite,:etat,:emetteur,:receveur,:resp)";
                                    $req = $db->prepare($sql);

                                    // Bind parameters to statement
                                    $req->bindParam(':id_salles', $id_salles);
                                    $req->bindParam(':id_materiel', $id_materiel[$j]);
                                    $req->bindParam(':nom_salle', $nom_salle);
                                    $req->bindParam(':date_debut', $date_debut);
                                    $req->bindParam(':id_ask_eq', $total);
                                    $req->bindParam(':quantite', $quantite[$j]);
                                    $req->bindParam(':etat', $etat);
                                    $req->bindParam(':emetteur', $emetteur);
                                    $req->bindParam(':receveur', $receveur);
                                    $req->bindParam(':resp', $user);
                                    $req->execute();


        //     $query1 = "UPDATE materiel SET quantite=:quantite, prix_total=:prix_total where id_materiel = '$id_materiel[$j]' ";
  
        // $sql1 = $db->prepare($query1);

        //      // Bind parameters to statement
        //     $sql1->bindParam(':quantite', $quantite_reste);
        //     $sql1->bindParam(':prix_total', $prix_total_f);
        //     $sql1->execute();

        if($sql)
                                            {
                                                $mailler = new mailsenderclass();

                                                $subject = "Demande de d'equipement";
                                                $body = "Demande d'equipement effectuee par "
                                                        .strtoupper($user)." le "
                                                        .date("d/m/Y"). " A "
                                                        .date("G:i")." pour la salle "
                                                        .strtoupper($nom_salle)
                                                        ."<br/>
                                                         <a href='campresjonlline.net'>Voir les details</a>";

                                                $from= 'supergoal@campresjonlline.net';
                                                $from_name='CAMPREJ EQUIEPEMENT';
                                                $sql = $db->query("select * from users where secteur = $id_secteur_user and (lvl = 4 or lvl = 3 or lvl = 8 or lvl = 7)");
                                                while($row = $sql->fetch()){
                                                    $to = $row['email'];
                                                    $mailler->mailsenderclass($to, $from, $from_name, $subject, $body);
                                                }
                                                
                                                $sql = $db->query("select * from users where (lvl = 5 or lvl = 6 )");
                                                while($row = $sql->fetch()){
                                                    $to = $row['email'];
                                                    $mailler->mailsenderclass($to, $from, $from_name, $subject, $body);
                                                }
                                                
                                                $mailler->mailsenderclass($email_user, $from, $from_name, $subject, $body);
                                                ?>
                                                <script>
                                                    alert('Opération effectuée.');
                                                    // window.location.href='liste_demande_eq.php?witness=1';
                                                </script>
                                                <?php
                                            }

                                            else
                                            {       
                                              ?>
                                                <script>
                                                   alert('Erreur lors du chargement.');
                                                      //  window.location.href='liste_demande_eq.php?witness=-1';
                                                </script>
                                                <?php
                                               
                                            }


}else{

    ?>
                                                <script>
                                                   alert(' Stock Insuffisant !!!');
                                                    //   window.location.href='liste_demande_eq.php?witness=-1';
                                                </script>
                                                <?php


}
         




//             $query = "SELECT * from materiel where id_materiel = '$id_materiel[$j]' ";
//             $q = $db->query($query);
//             while($row = $q->fetch()) {
//                 $ref_materiel = $row['ref_materiel'];
//                 $designation = $row['designation'];
//             }
//             $items[] = [$ref_materiel, $designation];
 }

            }