 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php");
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
  
 
    $id_ask_inter=$_REQUEST['ids'];
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
    

$q = $db->query("select * from demande_inter WHERE id_ask_inter='$id_ask_inter'");
    while($row = $q->fetch()){
        $date_debut = $row['date_debut'];
        $nom_salle = $row['nom_salle'];
        $nature = $row['nature'];
    }

                $statut=1;
                $date_valide=date('Y-m-d');
                $heure=date("G:i");
                $query1  = " UPDATE demande_inter  SET   statut=:statut, date_valide=:date_valide, heure=:heure    
                                     WHERE id_ask_inter='$id_ask_inter' ";

                        echo $statut;
                

                         $sql1 = $db->prepare($query1);

                                 // Bind parameters to statement
                                $sql1->bindParam(':statut', $statut);
                                $sql1->bindParam(':date_valide', $date_valide);
                                 $sql1->bindParam(':heure', $heure);
                                $sql1->execute();


 if($sql1)
                                            {
                                                $mailler = new mailsenderclass();

                                                $subject = "Validation de demande de d'intervention";

                                                $body = "Demande d'intervention effectuee le "
                                                    .date("d/m/Y",strtotime($date_debut))
                                                    ." pour la salle "
                                                    .strtoupper($nom_salle)
                                                    ." de nature <b>"
                                                    .$nature
                                                    ."</b> a ete valide par"
                                                    .strtoupper($user)
                                                    ."<br/>
                                                         <a href='campresjonlline.net'>Voir les details</a>";

                                                $from= 'supergoal@campresjonlline.net';
                                                $from_name='CAMPREJ EQUIEPEMENT';
                                                $sql = $db->query("select * from users where secteur = $id_secteur_user and (lvl = 4 or lvl = 3 or lvl = 8)");
                                                while($row = $sql->fetch()){
                                                    $to = $row['email'];
                                                    $mailler->mailsenderclass($to, $from, $from_name, $subject, $body);
                                                }
                                                
                                                $sql = $db->query("select * from users where (lvl = 5 or lvl = 6 )");
                                                while($row = $sql->fetch()){
                                                    $to = $row['email'];
                                                    $mailler->mailsenderclass($to, $from, $from_name, $subject, $body);
                                                }
                                                
                                                ?>
                                                <script>
                                                   // alert('Equipement pas recue.');
                                                           window.location.href='liste_demande_in.php?&witness=1';
                                                </script>
                                                <?php
                                            }

                                            else
                                            {       
                                              ?>
                                                <script>
                                                   alert('Error.');
                                                       window.location.href='liste_demande_in.php?&witness=-1';
                                                </script>
                                                <?php
                                               
                                            }
?>
