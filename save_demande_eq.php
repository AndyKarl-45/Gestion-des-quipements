 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php");
?>
<?php
  $user = $_SESSION['rainbo_name'];
$email_user = $_SESSION['rainbo_email'];

$id_session = $_SESSION['rainbo_id_perso'];

$query = "SELECT * from personnel where id_personnel = $id_session";
$q = $db->query($query);
while($row = $q->fetch()) {
    $nom_session = $row['prenom'].' '.$row['nom'];
    $email_user_session = $row['email'];
}
    
    $id_salles=$_POST['id_salles'];

   // $cout=$_POST['cout'];
    $date_debut=$_POST['date_debut'];
   //  $cout=$_POST['prix'];

    if(isset($_POST['id_mat']) and  isset($_POST['quantite']) and isset($_POST['mag']) ){
      $id_materiel=$_POST['id_mat'];
      $quantite=$_POST['quantite'];
      $mag=$_POST['mag'];
    }else{
      $id_materiel[0]=0;
      ?>
                                                <script>
                                                   alert('Erreur lors du chargement.');
                                                       window.location.href='liste_demande_eq.php?witness=-1';
                                                </script>
                                                <?php

    }
    

//                                        echo $total;

 


//                                        $items = [];
$designation = "";
$ref_materiel = "";





$id = count($id_materiel);
//    echo $id.'</br>';

if($id_materiel[0]!=0 and abs($quantite[0])!=0){
    if($id!=0){

 //for ($j = 0; $j <$id; $j++) {

 // if($id_materiel[$j]!=""){
        foreach($id_materiel as $cle => $data_item)
        {

            echo $cle .' => '.$data_item;

            if($id_materiel[$cle]!=0){

                $sql = "SELECT * FROM materiel where id_materiel='$id_materiel[$cle]' and mag='$mag' ";
                $stmt = $db->prepare($sql);
                $stmt->execute();

                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($tables as $table) {
                    $quantite_mat = $table['quantite'];
                    $prix_unitaire = $table['prix_unitaire'];
                }


                $quantite_reste=$quantite_mat-$quantite[$cle];

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

                    $sql = "INSERT INTO demande_materiel (id_salles, id_materiel,nom_salle,date_debut_mat,id_ask_eq,quantite,etat,emetteur,receveur,responsable)
                                VALUES(:id_salles,:id_materiel,:nom_salle,:date_debut,:id_ask_eq,:quantite,:etat,:emetteur,:receveur,:resp)";
                    $req = $db->prepare($sql);

                    // Bind parameters to statement
                    $req->bindParam(':id_salles', $id_salles);
                    $req->bindParam(':id_materiel', $id_materiel[$cle]);
                    $req->bindParam(':nom_salle', $nom_salle);
                    $req->bindParam(':date_debut', $date_debut);
                    $req->bindParam(':id_ask_eq', $total);
                    $req->bindParam(':quantite', $quantite[$cle]);
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
                            window.location.href='liste_demande_eq.php?witness=1';
                        </script>
                        <?php
                    }

                    else
                    {
                        ?>
                        <script>
                            alert('Erreur lors du chargement.');
                            window.location.href='liste_demande_eq.php?witness=-1';
                        </script>
                        <?php

                    }


                }else{

                    ?>
                    <script>
                        alert(' Stock Insuffisant !!!');
                        window.location.href='liste_demande_eq.php?witness=-1';
                    </script>
                    <?php


                }

            }
        }







         




//             $query = "SELECT * from materiel where id_materiel = '$id_materiel[$j]' ";
//             $q = $db->query($query);
//             while($row = $q->fetch()) {
//                 $ref_materiel = $row['ref_materiel'];
//                 $designation = $row['designation'];
//             }
//             $items[] = [$ref_materiel, $designation];
 // if materiel }

       // pour la boucle for     }
        }
      }else{
                ?>
                                                <script>
                                                   alert('Incorrect : Une des quantités vaut 0.');
                                                        window.location.href='liste_demande_eq.php?witness=-1';
                                                </script>
                                                <?php

      }
//echo '<b>Items list</b> <br/>';
//echo print_r($items).'<br/>';
//echo '<hr/>';
//echo $items[0][0].'<br/>';
//echo $items[0][1].'<br/>';
//echo '<hr/>';
//echo count($items).'<br/>';
//echo '<hr/>';
////table
//
//$bodyHTML = '<html>
//
//            <table border="3"  align="center">
//            <thead style="text-align: center">
//            <tr>
//
//            <th>
//            Num.
//            </th>
//
//            <th>
//            Ref.
//            </th>
//
//            <th>
//            Désignation
//            </th>
//
//            </tr>
//
//            </thead>
//            <tbody>' +
//
//for($k=0; $k<count($items); $k++){
//
//        +  '<tr>
//
//            <td>'
//            .($k+1).
//    echo \'</td>\'\;
//
//    echo \'<td>\'\;
//    echo $items[$k][0]\;
//    echo \'</td>\'\;
//
//    echo \'<td>\'\;
//    echo $items[$k][1]\;
//    echo \'</td>\'\;
//
//    echo \'</tr>\'\;
//}
//echo \'</tbody>
//        </table>\'\;
//        </html>';

 

 
?>
