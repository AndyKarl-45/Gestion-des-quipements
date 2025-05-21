 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php");
 //require 'MailSender/mailsenderclass.php';
 
$user = $_SESSION['rainbo_name'];
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
  
    $id_ask_eq=$_REQUEST['idi'];
    $receveur=$_REQUEST['ids'];
    $emetteur=$_REQUEST['ide'];

    //echo $id_salles;
    //$cout=$_POST['cout'];
    // $date_debut=$_POST['date_debut'];
    



      //--------------------------code pour email ------------------------------//
  // $result="";
  //       require "PHPMailer/PHPMailerAutoload.php";
        
  //              $to ='mboningdany@gmail.com';
  //              $from= 'supergoal@campresjonlline.net';
  //              $from_name='CAMPREJ EQUIEPEMENT';
  //              $subject='OBJET TEST';
               

  //            $mail = new PHPMailer();
  //            $mail->IsSMTP();
  //            $mail->SMTPAuth = true;
             
  //            $mail->SMTPSecure = 'ssl';
  //            $mail->Host = 'mail.campresjonlline.net';
  //            $mail->Port= '465';
  //            $mail->Username = 'supergoal@campresjonlline.net';
  //            $mail->Password = 'Y@)W@LPSDLaP';

  //            $mail->IsHTML(true);
  //            $mail->From="supergoal@campresjonlline.net";
  //            $mail->FromName=$from_name; 
  //            $mail->Sender=$from;
  //            $mail->AddReplyTo($from, $from_name); 
  //            $mail->Subject = $subject; 
  //            $mail->Body = '<h1 align=center>Name: ' .$from_name. '<br>Email: ' .$from. '<br>Message: ' .$subject. '</h1>'; 
  //            $mail->AddAddress($to); 
  //            if(!$mail->Send())
  //                {
  //                    $result= "Please try later";
  //                        // echo $result;
  //                 }else{
  //                   $result="Thanks you!!";
  //                          // echo $result;
  //                }

    //-----------------------------------------------------------------------//
      

        $sql="SELECT * FROM demande_materiel where receveur='$receveur'  and id_ask_eq='$id_ask_eq' "; 
                            $stmt = $db->prepare($sql);
                            $stmt->execute();

                             $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach($tables as $table)
                                        {
                                           echo $id_materiel=$table['id_materiel'];
                                            $date_debut_mat=$table['date_debut_mat'];
                                            $nom_salle=$table['nom_salle'];
                                            $quantite_ask=$table['quantite'];
                                            // echo $id_materiel.'</br>';


                                            $sql = "SELECT * FROM materiel where id_materiel='$id_materiel' ";
                                                $stmt = $db->prepare($sql);
                                                $stmt->execute();

                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                foreach ($tables as $table) {
                                                    $quantite_mat = $table['quantite'];
                                                    $prix_unitaire = $table['prix_unitaire'];
                                                }

                                  $quantite_reste=$quantite_mat-$quantite_ask;
                                $prix_total_f=$quantite_reste*$prix_unitaire;

                    if($quantite_reste>0){
                        $id_sal=0;
                    $query1  = " UPDATE materiel  SET    quantite=:quantite, prix_total=:prix_total WHERE id_materiel = '$id_materiel' ";

                

                         $sql1 = $db->prepare($query1);

                                 // Bind parameters to statement
                                $sql1->bindParam(':quantite', $quantite_reste);
                                $sql1->bindParam(':prix_total', $prix_total_f);
                                $sql1->execute();

                    }else{

                    $query1  = " UPDATE materiel  SET    mag=:mag  WHERE id_materiel = '$id_materiel' ";

                

                         $sql1 = $db->prepare($query1);

                                 // Bind parameters to statement
                                $sql1->bindParam(':mag', $receveur);
                                $sql1->execute();



                    }
                                    
                                    
                   }



                $etat=1;
                $date_valide=date('y-m-d');
                $heure=date("G:i");
                $query  = " UPDATE demande_equipement  SET   etat=:etat, date_valide=:date_valide, heure=:heure    
                                     WHERE receveur='$receveur'  and id_ask_eq='$id_ask_eq' ";

                

                         $sql = $db->prepare($query);

                                 // Bind parameters to statement
                                $sql->bindParam(':etat', $etat);
                                $sql->bindParam(':date_valide', $date_valide);
                                $sql->bindParam(':heure', $heure);
                                $sql->execute();


                 $query  = " UPDATE demande_materiel  SET   etat=:etat WHERE receveur='$receveur'  and id_ask_eq='$id_ask_eq'";

                         $sql = $db->prepare($query);

                                 // Bind parameters to statement
                                $sql->bindParam(':etat', $etat);
                                $sql->execute();



 if($sql)
                                            {
                                                $mailler = new mailsenderclass();

                                                $subject = "Validation de transfert  d'equipement";
                                                $body = "Demande de transfert d'equipement effectuee le "
                                                    .date("d/m/Y",strtotime($date_debut_mat))
                                                    ." pour la salle "
                                                    .strtoupper($nom_salle)
                                                    ." a ete valide par "
                                                    .strtoupper($user)
                                                    ."<br/>
                                                         <a href='campresjonlline.net'>Voir les details</a>";

                                                $from= 'supergoal@campresjonlline.net';
                                                $from_name='CAMPREJ EQUIEPEMENT';
                                                $sql = $db->query("select * from users where secteur = $id_secteur_user and (lvl = 4 or lvl = 3 or lvl = 8 or lvl = 7)");
                                                while($row = $sql->fetch()){
                                                    $to = $row['email'];
                                                    $mailler->mailsenderclass($to, $from, $from_name, $subject, $body);
                                                }
                                                
                                                $sql = $db->query("select * from users where (lvl = 5 or lvl = 6)");
                                                while($row = $sql->fetch()){
                                                    $to = $row['email'];
                                                    $mailler->mailsenderclass($to, $from, $from_name, $subject, $body);
                                                }
                                                 $mailler->mailsenderclass($email_user, $from, $from_name, $subject, $body);
                                               
                                               
                                                switch ($emetteur){
                                                            case 'C';
                                                               ?>
                                                                <script>
                                                                    alert('Demande valider.');
                                                                    window.location.href='liste_transfert_mag.php?witness=1';
                                                                </script>
                                                                <?php
                                                                break;
                                                            case 'E';
                                                               ?>
                                                                <script>
                                                                   alert('Demande valider.');
                                                                   window.location.href='liste_transfert_mag_save.php?witness=1';
                                                                </script>
                                                                <?php
                                                                break;
                                                            case 'D';
                                                               ?>
                                                                <script>
                                                                    alert('Demande valider.');
                                                                    window.location.href='liste_transfert_mag_def.php?witness=1';
                                                                </script>
                                                                <?php
                                                                break;
                                                             case 'M';
                                                               ?>
                                                                <script>
                                                                   alert('Demande valider.');
                                                                    window.location.href='liste_transfert_mag_main.php?witness=1';
                                                                </script>
                                                                <?php
                                                                break;
                                                            case 'O';
                                                               ?>
                                                                <script>
                                                                    alert('Demande valider.');
                                                                    window.location.href='liste_transfert_mag_congo.php?witness=1';
                                                                </script>
                                                                <?php
                                                                break;
                                                        }
                                                alert('Demande n\'a pas été valider.');
                                                
                                            }

                                            else
                                            {       

                                                       switch ($emetteur){
                                                            case 'C';
                                                               ?>
                                                                <script>
                                                                    alert('Demande n\'a pas été valider.');
                                                                    window.location.href='liste_transfert_mag.php?witness=-1';
                                                                </script>
                                                                <?php
                                                                break;
                                                            case 'E';
                                                               ?>
                                                                <script>
                                                                  alert('Demande n\'a pas été valider.');
                                                                   window.location.href='liste_transfert_mag_save.php?witness=-1';
                                                                </script>
                                                                <?php
                                                                break;
                                                            case 'D';
                                                               ?>
                                                                <script>
                                                                    alert('Demande n\'a pas été valider.');
                                                                    window.location.href='liste_transfert_mag_def.php?witness=-1';
                                                                </script>
                                                                <?php
                                                                break;
                                                             case 'M';
                                                               ?>
                                                                <script>
                                                                   alert('Demande n\'a pas été valider.');
                                                                    window.location.href='liste_transfert_mag_main.php?witness=-1';
                                                                </script>
                                                                <?php
                                                                break;
                                                            case 'O';
                                                               ?>
                                                                <script>
                                                                    alert('Demande n\'a pas été valider.');
                                                                    window.location.href='liste_transfert_mag_congo.php?witness=-1';
                                                                </script>
                                                                <?php
                                                                break;
                                                        }
                                            }
?>
