<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php");

?>

<?php

if($_POST)
{


    /*--------------------------------- ETAT HOLIDAY -------------------------------------*/
    $ids_s = $_POST['ids_source'];
    $ids_c= $_POST['ids_cible'];

    $id_salles_src=$_POST['ids_source'];
    $id_salles_dst=$_POST['ids_cible'];
    $id_materiel = $_POST['id_materiel'];

    $id_m = $_POST['id_materiel'];
    $quantite = $_POST['quantite'];
    $id_ask_eq_sal = $_POST['ideq'];
    $id_ask_mat_sal = $_POST['idmat'];

    $statut=0;
    echo $ids_s.'</br>';
    echo $ids_c.'</br>';
    echo $id_salles_src.'</br>';
    echo $id_salles_dst.'</br>';
    echo $id_materiel.'</br>';

    /*--------------------------------- SALLE SRC ET DEST---------------------------*/

    $sql="SELECT * FROM salles where id_salles='$id_salles_src' ";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($tables as $table)
    {
        $nom_salle_src=$table['nom'];
        echo $nom_salle_src.'</br>';
    }

    $sql="SELECT * FROM salles where id_salles='$id_salles_dst' ";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($tables as $table)
    {
        $nom_salle_dst=$table['nom'];
        echo $nom_salle_dst.'</br>';
    }

    /*--------------------------------- MATERIEL ---------------------------*/

    $query = "SELECT * from demande_materiel_sal where id_ask_mat_sal= '$id_ask_mat_sal' ";
    $stmt = $db->prepare($query);
    $stmt->execute();

    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($tables as $table)
    {
        // $id = $row['id_materiel'];
        // $ref_materiel = $row['ref_materiel'];
        // $designation = $row['designation'];
        $quantite_in = $table['quantite'];


        $quantite_init=$quantite_in;


        $quantite_total=$quantite_init-$quantite;
        echo $quantite_total.'</br>';



            if($quantite_total==0){


                $cnt=0;

                $sql="SELECT id_ask_eq_sal FROM demande_equipement_sal where id_salles_src='$id_salles_src' and id_salles_dst='$id_salles_dst' and id_materiel='$id_materiel' ";
                $stmt = $db->prepare($sql);
                $stmt->execute();

                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach($tables as $table)
                {
                    echo '</br>'. $cnt++;
                }

                if($cnt==0){

                    $etat=0;
                    $date_debut= date("Y-m-d");
                    $date_valide='N/A';
                    $query = " INSERT INTO demande_equipement_sal (id_salles_src,nom_salle_src,id_salles_dst,nom_salle_dst,date_debut,date_valide,etat) 
                     VALUES (:id_salles_src,:nom_salle_src,:id_salles_dst,:nom_salle_dst,:date_debut,:date_valide,:etat)";

                    $sql = $db->prepare($query);

                    // Bind parameters to statement
                    $sql->bindParam(':id_salles_src', $id_salles_src);
                    $sql->bindParam(':nom_salle_src', $nom_salle_src);
                    $sql->bindParam(':id_salles_dst', $id_salles_dst);
                    $sql->bindParam(':nom_salle_dst', $nom_salle_dst);
                    $sql->bindParam(':date_debut', $date_debut);
                    $sql->bindParam(':date_valide', $date_valide);
                    $sql->bindParam(':etat', $etat);
                    $sql->execute();


                    $sql="SELECT id_ask_eq_sal as total FROM demande_equipement_sal  ";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();

                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    foreach($tables as $table)
                    {
                        $to=$table['total'];
                    }
                    $total=$to;


                    $sql = "INSERT INTO demande_materiel_sal (id_salles_src,id_materiel,nom_salle_src,id_salles_dst,nom_salle_dst,date_debut_mat,id_ask_eq_sal,quantite,etat)
        VALUES(:id_salles_src,:id_materiel,:nom_salle_src,:id_salles_dst,:nom_salle_dst,:date_debut,:id_ask_eq_sal,:quantite,:etat)";
                    $req = $db->prepare($sql);

                    // Bind parameters to statement
                    $req->bindParam(':id_salles_src', $id_salles_src);
                    $req->bindParam(':id_materiel', $id_materiel);
                    $req->bindParam(':nom_salle_src', $nom_salle_src);
                    $req->bindParam(':id_salles_dst', $id_salles_dst);
                    $req->bindParam(':nom_salle_dst', $nom_salle_dst);
                    $req->bindParam(':date_debut', $date_debut);
                    $req->bindParam(':id_ask_eq_sal', $total);
                    $req->bindParam(':quantite', $quantite);
                    $req->bindParam(':etat', $etat);
                    $req->execute();


                    $query = "DELETE FROM demande_materiel_sal  WHERE id_ask_mat_sal= '$id_ask_mat_sal'   ";
                    $sql1 = $conn->query($query);

//                    $etat=2;
//                    $query1 = "UPDATE demande_equipement_sal SET etat=:etat where  id_ask_eq_sal='$id_ask_eq_sal'";
//
//                    $req = $db->prepare($query1);
//
//                    // Bind parameters to statement
//                    $req->bindParam(':etat', $etat);
//                    $req->execute();
//
//                    $etat=2;
//                    $query1 = "UPDATE demande_materiel_sal SET etat=:etat where  id_ask_mat_sal='$id_ask_mat_sal'";
//
//                    $req = $db->prepare($query1);
//
//                    // Bind parameters to statement
//                    $req->bindParam(':etat', $etat);
//                    $req->execute();

                }else{

                    $sql="SELECT quantite FROM demande_materiel_sal where id_salles_src='$id_salles_src' and id_salles_dst='$id_salles_dst' and id_materiel='$id_materiel'  ";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();

                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    foreach($tables as $table)
                    {
                        $quantite_now=$table['quantite'];
                    }

                    $quantite_finish=$quantite_now+$quantite;


                    $query1 = "UPDATE demande_materiel_sal SET quantite=:quantite where  id_salles_src='$id_salles_src' and id_salles_dst='$id_salles_dst' and id_materiel='$id_materiel'";

                    $req = $db->prepare($query1);

                    // Bind parameters to statement
                    $req->bindParam(':quantite', $quantite_finish);
                    $req->execute();


//                    $etat=2;
//                    $query1 = "UPDATE demande_equipement_sal SET etat=:etat where  id_ask_eq_sal='$id_ask_eq_sal'";
//
//                    $req = $db->prepare($query1);
//
//                    // Bind parameters to statement
//                    $req->bindParam(':etat', $etat);
//                    $req->execute();
//
//                    $etat=2;
//                    $query1 = "UPDATE demande_materiel_sal SET etat=:etat where  id_ask_mat_sal='$id_ask_mat_sal'";
//
//                    $req = $db->prepare($query1);
//
//                    // Bind parameters to statement
//                    $req->bindParam(':etat', $etat);
//                    $req->execute();

                }





            }elseif($quantite_total<0){
                /*--------------------------------- SAVE DATA HOLIDAY ---------------------------*/
                ?>
                <script>
                    alert('Quantité insuffisante !!!');
                    window.location.href='details_salle.php?id=<?=$id_salles_src?>';
                </script>
                <?php

                // $nom_s="";
                // $nom_c="";
                // $designation="";

                // $q = $db->query("select * from salles where id_salles='$ids_s'");
                // while($row = $q->fetch()){
                //     $nom_s = $row['nom'];
                // }
                // $q = $db->query("select * from salles where id_salles='$ids_c'");
                // while($row = $q->fetch()){
                //     $nom_c = $row['nom'];
                // }
                // $q = $db->query("select * from materiel where id_materiel='$id_m'");
                // while($row = $q->fetch()){
                //     $designation = $row['designation'];
                // }
            }else{

                $cnt=0;

                $sql="SELECT id_ask_eq_sal FROM demande_equipement_sal where id_salles_src='$id_salles_src' and id_salles_dst='$id_salles_dst' and id_materiel='$id_materiel' ";
                $stmt = $db->prepare($sql);
                $stmt->execute();

                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach($tables as $table)
                {
                    echo '</br>'. $cnt++;
                }


                if($cnt==0){



                    $etat=0;
                    $date_debut= date("Y-m-d");
                    $date_valide='N/A';
                    $query = " INSERT INTO demande_equipement_sal (id_salles_src,nom_salle_src,id_salles_dst,nom_salle_dst,date_debut,date_valide,etat) 
                     VALUES (:id_salles_src,:nom_salle_src,:id_salles_dst,:nom_salle_dst,:date_debut,:date_valide,:etat)";

                    $sql = $db->prepare($query);

                    // Bind parameters to statement
                    $sql->bindParam(':id_salles_src', $id_salles_src);
                    $sql->bindParam(':nom_salle_src', $nom_salle_src);
                    $sql->bindParam(':id_salles_dst', $id_salles_dst);
                    $sql->bindParam(':nom_salle_dst', $nom_salle_dst);
                    $sql->bindParam(':date_debut', $date_debut);
                    $sql->bindParam(':date_valide', $date_valide);
                    $sql->bindParam(':etat', $etat);
                    $sql->execute();

                    $sql="SELECT id_ask_eq_sal as total FROM demande_equipement_sal  ";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();

                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    foreach($tables as $table)
                    {
                        $to=$table['total'];
                    }
                    $total=$to;


                    $sql = "INSERT INTO demande_materiel_sal (id_salles_src,id_materiel,nom_salle_src,id_salles_dst,nom_salle_dst,date_debut_mat,id_ask_eq_sal,quantite,etat)
        VALUES(:id_salles_src,:id_materiel,:nom_salle_src,:id_salles_dst,:nom_salle_dst,:date_debut,:id_ask_eq_sal,:quantite,:etat)";
                    $req = $db->prepare($sql);

                    // Bind parameters to statement
                    $req->bindParam(':id_salles_src', $id_salles_src);
                    $req->bindParam(':id_materiel', $id_materiel);
                    $req->bindParam(':nom_salle_src', $nom_salle_src);
                    $req->bindParam(':id_salles_dst', $id_salles_dst);
                    $req->bindParam(':nom_salle_dst', $nom_salle_dst);
                    $req->bindParam(':date_debut', $date_debut);
                    $req->bindParam(':id_ask_eq_sal', $total);
                    $req->bindParam(':quantite', $quantite);
                    $req->bindParam(':etat', $etat);
                    $req->execute();



//                    $etat=2;
//                    $query1 = "UPDATE demande_equipement_sal SET etat=:etat where  id_ask_eq_sal='$id_ask_eq_sal'";
//
//                    $req = $db->prepare($query1);
//
//                    // Bind parameters to statement
//                    $req->bindParam(':etat', $etat);
//                    $req->execute();

//                    $etat=2;
                    $query1 = "UPDATE demande_materiel_sal SET  quantite=:quantite where  id_ask_mat_sal='$id_ask_mat_sal'";

                    $req = $db->prepare($query1);

                    // Bind parameters to statement
//                    $req->bindParam(':etat', $etat);
                    $req->bindParam(':quantite', $quantite_total);
                    $req->execute();




                }else{
                    $sql="SELECT quantite FROM demande_materiel_sal where id_salles_src='$id_salles_src' and id_salles_dst='$id_salles_dst' and id_materiel='$id_materiel'  ";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();

                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    foreach($tables as $table)
                    {
                        $quantite_now=$table['quantite'];
                    }

                    $quantite_finish=$quantite_now+$quantite;


                    $query1 = "UPDATE demande_materiel_sal SET quantite=:quantite where  id_salles_src='$id_salles_src' and id_salles_dst='$id_salles_dst' and id_materiel='$id_materiel'";

                    $req = $db->prepare($query1);

                    // Bind parameters to statement
                    $req->bindParam(':quantite', $quantite_finish);
                    $req->execute();


//                    $etat=2;
//                    $query1 = "UPDATE demande_equipement_sal SET etat=:etat where  id_ask_eq_sal='$id_ask_eq_sal'";
//
//                    $req = $db->prepare($query1);
//
//                    // Bind parameters to statement
//                    $req->bindParam(':etat', $etat);
//                    $req->execute();

//                    $etat=2;
                    $query1 = "UPDATE demande_materiel_sal SET  quantite=:quantite where  id_ask_mat_sal='$id_ask_mat_sal'";

                    $req = $db->prepare($query1);

                    // Bind parameters to statement
//                    $req->bindParam(':etat', $etat);
                    $req->bindParam(':quantite', $quantite_total);
                    $req->execute();


                }

            }





//            echo 'id source '.$ids_s.'<br/>';
//            echo 'source '.$nom_s.'<br/>';
//
//            echo 'id cible '.$ids_c.'<br/>';
//            echo 'cible '.$nom_c.'<br/>';
//
//            echo 'id item '.$id_m.'<br/>';
//            echo 'item '.$designation.'<br/>';



        if($req)
        {


            // $mailler = new mailsenderclass();

            // $subject = "Transfert d'equipement";
            // $body = "Le materiel <b>"
            //     .$designation."</b> a ete transfere de la salle <b>"
            //     .$nom_s."</b> vers la salle <b>"
            //     .$nom_c."</b> le "
            //     .date("d/m/Y")
            //     ." à "
            //     .date("G:i")
            //     ." par "
            //     .strtoupper($nom_user)
            //     ."<br/>
            //                  <a href='campresjonlline.net'>Voir les details</a>";

            // $from= 'supergoal@campresjonlline.net';
            // $from_name='CAMPREJ EQUIEPEMENT';
            // $sql = $db->query("select * from users where secteur = $id_secteur_user and (lvl = 3 or lvl = 8)");
            // while($row = $sql->fetch()){
            //     $to = $row['email'];
            //     $mailler->mailsenderclass($to, $from, $from_name, $subject, $body);
            // }

            ?>
            <script>
                alert('Equipement  a été bien transférer.');
                     window.location.href='details_salle.php?id=<?php echo $ids_s?>';
            </script>
            <?php



        }

        else
        {
            ?>
            <script>
                alert('Error.');
                window.location.href='details_salle.php?id=<?php echo $ids_s?>';
            </script>
            <?php

        }
    }

}
?>
