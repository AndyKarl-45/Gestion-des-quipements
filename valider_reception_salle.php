<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php");
// require 'MailSender/mailsenderclass.php';
?>
<?php



//echo $id_salles;
//$cout=$_POST['cout'];
// $date_debut=$_POST['date_debut'];

$id_salles=$_REQUEST['ids'];
$id_materiel=$_REQUEST['idm'];
$id_ask_mat_sal=$_REQUEST['id_ask_mat_sal'];



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

if(isset($_REQUEST['id_ask_mat_sal'])){
    $id_ask_mat_sal=$_REQUEST['id_ask_mat_sal'];
    
//     $sql="SELECT DISTINCT  date_debut FROM demande_equipement_sal where id_salles_dst='$id_salles'  and id_ask_eq_sal='$id_ask_eq_sal' and etat=0 ";
//                            $stmt = $db->prepare($sql);
//                            $stmt->execute();
//
//                             $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);
//
//                                    foreach($tables as $table)
//                                        {
//
//                                            $date_debut_mat=$table['date_debut'];
//
//                                        }

//
//    $sql="SELECT id_salles_src,nom_salle_dst, id_salles_dst  FROM demande_materiel_sal where id_ask_eq_sal='$id_ask_eq_sal' ";
//    $stmt = $db->prepare($sql);
//    $stmt->execute();
//
//    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);
//
//    foreach($tables as $table)
//    {
//        echo '</br>'.  $id_src=$table['id_salles_src'];
//        echo '</br>'.  $id_dst=$table['id_salles_dst'];
//        echo '</br>'.  $nom_salle=$table['nom_salle_dst'];
//    }




    $statut=1;
    $query1  = " UPDATE demande_materiel_sal  SET   etat=:statut    
                                     WHERE id_salles_dst='$id_salles'  and id_materiel='$id_materiel' and id_ask_mat_sal='$id_ask_mat_sal'";



    $sql1 = $db->prepare($query1);

    // Bind parameters to statement
    $sql1->bindParam(':statut', $statut);
    $sql1->execute();

    $etat=1;
    $date_valide=date('y-m-d');
    $heure=date("G:i");
    $query  = " UPDATE demande_equipement_sal  SET   etat=:etat, date_valide=:date_valide, heure=:heure    
                                     WHERE id_salles_dst='$id_salles'  and id_ask_eq_sal='$id_ask_eq_sal' ";



    $sql = $db->prepare($query);

    // Bind parameters to statement
    $sql->bindParam(':etat', $etat);
    $sql->bindParam(':date_valide', $date_valide);
    $sql->bindParam(':heure', $heure);
    $sql->execute();




}


if($sql1)
{
//                                                $mailler = new mailsenderclass();
//
//                                                $subject = "Validation de demande de d'equipement";
//                                                $body = "Demande d'equipement effectuee le "
//                                                    .date("d/m/Y",strtotime($date_debut_mat))
//                                                    ." pour la salle "
//                                                    .strtoupper($nom_salle)
//                                                    ." a ete valide par"
//                                                    .strtoupper($nom_user)
//                                                    ."<br/>
//                                                         <a href='campresjonlline.net'>Voir les details</a>";
//
//                                                $from= 'supergoal@campresjonlline.net';
//                                                $from_name='CAMPREJ EQUIEPEMENT';
//                                                $sql = $db->query("select * from users where secteur = $id_secteur_user and (lvl = 4 or lvl = 3 or lvl = 8 or lvl = 7)");
//                                                while($row = $sql->fetch()){
//                                                    $to = $row['email'];
//                                                    $mailler->mailsenderclass($to, $from, $from_name, $subject, $body);
//
//                                                $sql = $db->query("select * from users where (lvl = 5 or lvl = 6)");
//                                                while($row = $sql->fetch()){
//                                                    $to = $row['email'];
//                                                    $mailler->mailsenderclass($to, $from, $from_name, $subject, $body);
//                                                }
    ?>
    <script>
        alert('Equipement Récue.');
        window.location.href='details_salle.php?id=<?=$id_salles?>';
    </script>
    <?php
}

else
{
    ?>
    <script>
        alert('Error.');
        window.location.href='details_salle.php?id=<?=$id_salles?>';
    </script>
    <?php

}
?>
