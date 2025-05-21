 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php");
    
    
    
$email_user = $_SESSION['rainbo_email'];

$id_session = $_SESSION['rainbo_id_perso'];

$query = "SELECT * from personnel where id_personnel = $id_session";
$q = $db->query($query);
while($row = $q->fetch()) {
    $nom_session = $row['prenom'].' '.$row['nom'];
    $email_user_session = $row['email'];
}
    
   
   
?>
<?php
  
    
    $magasin=$_POST['magasin'];
   // $cout=$_POST['cout'];
    $date_debut=$_POST['date_debut'];
   //  $cout=$_POST['prix'];

    if(isset($_POST['id_mat']) and  isset($_POST['quantite'])){
      $id_materiel=$_POST['id_mat'];
      $quantite=$_POST['quantite'];
    }else{
      $id_materiel[0]=0;
    }


   
//                                        echo $total;

 


//                                        $items = [];
$designation = "";
$ref_materiel = "";

$id = count($id_materiel);
//    echo $id.'</br>';

if($id_materiel[0]!=0 and abs($quantite[0])!=0){
    if($id!=0){

 for ($j = 0; $j <$id; $j++) {

 if($id_materiel[$j]!=""){

     $etat=0;
    $id_salles=0;
    $nom_salle='N/A';
    $date_valide='N/A';
    $emetteur=$_POST['emetteur'];
    $receveur=$magasin;
    $query = " INSERT INTO demande_equipement (id_salles,nom_salle,date_debut,date_valide,etat,emetteur,receveur) 
                     VALUES (:id_salles,:nom_salle,:date_debut,:date_valide,:etat,:emetteur,:receveur)";

                 $sql = $db->prepare($query);

     // Bind parameters to statement
            $sql->bindParam(':id_salles', $id_salles);
            $sql->bindParam(':nom_salle', $nom_salle);
            $sql->bindParam(':date_debut', $date_debut);
            $sql->bindParam(':date_valide', $date_valide);
            $sql->bindParam(':etat', $etat);
            $sql->bindParam(':emetteur', $emetteur);
            $sql->bindParam(':receveur', $receveur);
            $sql->execute();


      $sql="SELECT max(id_ask_eq) as total FROM demande_equipement  ";
                            $stmt = $db->prepare($sql);
                            $stmt->execute();

                             $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach($tables as $table)
                                        {
                                            $to=$table['total'];
                                        }
                                        $total=$to;


    $sql = "SELECT * FROM materiel where id_materiel='$id_materiel[$j]' "; 
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($tables as $table) {
        $quantite_mat = $table['quantite'];
        $prix_unitaire = $table['prix_unitaire'];
    }

    $quantite_reste=$quantite_mat-$quantite[$j];

if ($quantite_reste>=0){

    // $prix_total_f=$quantite_reste*$prix_unitaire;
    $etat=0;


      $sql = "INSERT INTO demande_materiel (id_salles, id_materiel,nom_salle,date_debut_mat,id_ask_eq,quantite,etat,emetteur,receveur)
                                VALUES(:id_salles,:id_materiel,:nom_salle,:date_debut,:id_ask_eq,:quantite,:etat,:emetteur,:receveur)";
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
                                    $req->execute();


        //     $query1 = "UPDATE materiel SET quantite=:quantite, prix_total=:prix_total where id_materiel = '$id_materiel[$j]' ";
  
        // $sql1 = $db->prepare($query1);

        //      // Bind parameters to statement
        //     $sql1->bindParam(':quantite', $quantite_reste);
        //     $sql1->bindParam(':prix_total', $prix_total_f);
        //     $sql1->execute();

}else{

    
            switch ($emetteur){
                                                            case 'C';
                                                               ?>
                                                                <script>
                                                                    alert(' Stock Insuffisant !!!');
                                                                    window.location.href='liste_transfert_mag.php?witness=-1';
                                                                </script>
                                                                <?php
                                                                break;
                                                            case 'E';
                                                               ?>
                                                                <script>
                                                                    alert(' Stock Insuffisant !!!');
                                                                    window.location.href='liste_transfert_mag_save.php?witness=-1';
                                                                </script>
                                                                <?php
                                                                break;
                                                            case 'D';
                                                               ?>
                                                                <script>
                                                                    alert(' Stock Insuffisant !!!');
                                                                    window.location.href='liste_transfert_mag_def.php?witness=-1';
                                                                </script>
                                                                <?php
                                                                break;
                                                             case 'M';
                                                               ?>
                                                                <script>
                                                                    alert(' Stock Insuffisant !!!');
                                                                    indow.location.href='liste_transfert_mag_main.php?witness=-1';
                                                                </script>
                                                                <?php
                                                                break;
                                                            case 'O';
                                                               ?>
                                                                <script>
                                                                   alert(' Stock Insuffisant !!!');
                                                                     window.location.href='liste_transfert_mag_congo.php?witness=-1';
                                                                </script>
                                                                <?php
                                                                break;

                                                        }


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
        }
      }else{
                

                switch ($emetteur){
                                                            case 'C';
                                                               ?>
                                                                <script>
                                                                    alert('Incorrect : Une des quantités vaut 0.');
                                                                    window.location.href='liste_transfert_mag.php?witness=-1';
                                                                </script>
                                                                <?php
                                                                break;
                                                            case 'E';
                                                               ?>
                                                                <script>
                                                                    alert('Incorrect : Une des quantités vaut 0.');
                                                                    window.location.href='liste_transfert_mag_save.php?witness=-1';
                                                                </script>
                                                                <?php
                                                                break;
                                                            case 'D';
                                                               ?>
                                                                <script>
                                                                    alert('Incorrect : Une des quantités vaut 0.');
                                                                    window.location.href='liste_transfert_mag_def.php?witness=-1';
                                                                </script>
                                                                <?php
                                                                break;
                                                             case 'M';
                                                               ?>
                                                                <script>
                                                                    alert('Incorrect : Une des quantités vaut 0.');
                                                                    indow.location.href='liste_transfert_mag_main.php?witness=-1';
                                                                </script>
                                                                <?php
                                                                break;
                                                            case 'O';
                                                               ?>
                                                                <script>
                                                                   alert('Incorrect : Une des quantités vaut 0.');
                                                                     window.location.href='liste_transfert_mag_congo.php?witness=-1';
                                                                </script>
                                                                <?php
                                                                break;

                                                        }

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

 

 if($sql)
                                            {
                                                $mailler = new mailsenderclass();

                                                $subject = "Demande de transfert d'equipement";
                                                $body = "Demande de transfert d'equipement effectuee par "
                                                        .strtoupper($_SESSION['rainbo_name'])." le "
                                                        .date("d/m/Y"). " à "
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
                                                
                                                $sql = $db->query("select * from users where  (lvl = 5 or lvl = 6 )");
                                                while($row = $sql->fetch()){
                                                    $to = $row['email'];
                                                    $mailler->mailsenderclass($to, $from, $from_name, $subject, $body);
                                                }
                                                $mailler->mailsenderclass($email_user, $from, $from_name, $subject, $body);
                                                

                                                
                                                switch ($emetteur){
                                                            case 'C';
                                                               ?>
                                                                <script>
                                                                    alert('Opération effectuée.');
                                                                    window.location.href='liste_transfert_mag.php?witness=1';
                                                                </script>
                                                                <?php
                                                                break;
                                                            case 'E';
                                                               ?>
                                                                <script>
                                                                    alert('Opération effectuée.');
                                                                    window.location.href='liste_transfert_mag_save.php?witness=1';
                                                                </script>
                                                                <?php
                                                                break;
                                                            case 'D';
                                                               ?>
                                                                <script>
                                                                    alert('Opération effectuée.');
                                                                    window.location.href='liste_transfert_mag_def.php?witness=1';
                                                                </script>
                                                                <?php
                                                                break;
                                                             case 'M';
                                                               ?>
                                                                <script>
                                                                    alert('Opération effectuée.');
                                                                    window.location.href='liste_transfert_mag_main.php?witness=1';
                                                                </script>
                                                                <?php
                                                                break;
                                                            case 'O';
                                                               ?>
                                                                <script>
                                                                    alert('Opération effectuée.');
                                                                    window.location.href='liste_transfert_mag_congo.php?witness=1';
                                                                </script>
                                                                <?php
                                                                break;

                                                        }
                                            }

                                            else
                                            {       

                                                switch ($emetteur){
                                                            case 'C';
                                                               ?>
                                                                <script>
                                                                    alert('Erreur lors du chargement.');
                                                                    window.location.href='liste_transfert_mag.php?witness=-1';
                                                                </script>
                                                                <?php
                                                                break;
                                                            case 'E';
                                                               ?>
                                                                <script>
                                                                    alert('Erreur lors du chargement.');
                                                                    window.location.href='liste_transfert_mag_save.php?witness=-1';
                                                                </script>
                                                                <?php
                                                                break;
                                                            case 'D';
                                                               ?>
                                                                <script>
                                                                    alert('Erreur lors du chargement.');
                                                                    window.location.href='liste_transfert_mag_def.php?witness=-1';
                                                                </script>
                                                                <?php
                                                                break;
                                                             case 'M';
                                                               ?>
                                                                <script>
                                                                    alert('Erreur lors du chargement.');
                                                                    indow.location.href='liste_transfert_mag_main.php?witness=-1';
                                                                </script>
                                                                <?php
                                                                break;
                                                            case 'O';
                                                               ?>
                                                                <script>
                                                                    alert('Erreur lors du chargement.');
                                                                     window.location.href='liste_transfert_mag_congo.php?witness=-1';
                                                                </script>
                                                                <?php
                                                                break;

                                                        }

                                               
                                              
                                               
                                            }
?>
