<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php");
?>
<?php



//echo $id_salles;
//$cout=$_POST['cout'];
// $date_debut=$_POST['date_debut'];

$id_salles=$_REQUEST['ids'];
$id_materiel=$_REQUEST['idm'];
$id_ask_eq=$_REQUEST['ideqs'];
$emetteur=$_REQUEST['ide'];




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





    $sql="SELECT * FROM demande_materiel where id_salles='$id_salles'  and id_ask_eq='$id_ask_eq' and emetteur='$emetteur' ";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($tables as $table)
    {
        $id_materiel=$table['id_materiel'];
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

        echo $quantite_reste=$quantite_mat-$quantite_ask;
        $prix_total_f=$quantite_reste*$prix_unitaire;


        if($quantite_reste>=0){
            $query1  = " UPDATE materiel  SET    quantite=:quantite, prix_total=:prix_total WHERE id_materiel = '$id_materiel' ";



            $sql1 = $db->prepare($query1);

            // Bind parameters to statement
            $sql1->bindParam(':quantite', $quantite_reste);
            $sql1->bindParam(':prix_total', $prix_total_f);
            $sql1->execute();


            $statut=1;
            $query1  = " UPDATE demande_materiel  SET   etat=:statut    
                                     WHERE id_salles='$id_salles'  and id_materiel='$id_materiel' and id_ask_eq='$id_ask_eq'";



            $sql1 = $db->prepare($query1);

            // Bind parameters to statement
            $sql1->bindParam(':statut', $statut);
            $sql1->execute();

            $etat=1;
            $date_valide=date('y-m-d');
            $heure=date("G:i");
            $query  = " UPDATE demande_equipement  SET   etat=:etat, date_valide=:date_valide, heure=:heure    
                                     WHERE id_salles='$id_salles'   and id_ask_eq='$id_ask_eq' ";



            $sql = $db->prepare($query);

            // Bind parameters to statement
            $sql->bindParam(':etat', $etat);
            $sql->bindParam(':date_valide', $date_valide);
            $sql->bindParam(':heure', $heure);
            $sql->execute();

            if($quantite_reste==0){
                $query1  = " UPDATE materiel  SET    mag=:mag  WHERE id_materiel = '$id_materiel' ";
                $receveur="S";

                         $sql1 = $db->prepare($query1);

                                 // Bind parameters to statement
                                $sql1->bindParam(':mag', $receveur);
                                $sql1->execute();
            }

            if($sql)
{//                                                $mailler = new mailsenderclass();
//
//                                                $subject = "Validation de demande de d'equipement";
//                                                $body = "Demande d'equipement effectuee le "
//                                                    .date("d/m/Y",strtotime($date_valide))
//                                                    ." pour la salle "
//                                                    .strtoupper($nom_salle)
//                                                    ." a ete valide par "
//                                                    .strtoupper($nom_user)
//                                                    ."<br/>
//                                                          <a href='campresjonlline.net'>Voir les details</a>";
//
//                                                $from= 'supergoal@campresjonlline.net';
//                                                $from_name='CAMPREJ EQUIEPEMENT';
//                                                $sql = $db->query("select * from users where secteur = $id_secteur_user and lvl = 5 ");
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
            }else
            {
                ?>
                <script>
                    alert('Error.');
                    window.location.href='details_salle.php?id=<?=$id_salles?>';
                </script>
                <?php

            }



        }else{

//                $query1  = " UPDATE materiel  SET    mag=:mag  WHERE id_materiel = '$id_materiel' ";
//
//
//
//                $sql1 = $db->prepare($query1);
//
//                // Bind parameters to statement
//                $sql1->bindParam(':mag', $receveur);
//                $sql1->execute();
            $etat=-1;
            $query  = " UPDATE demande_materiel  SET   etat=:etat WHERE id_materiel='$id_materiel' and id_salles='$id_salles'  and id_ask_eq='$id_ask_eq'";

            $sql = $db->prepare($query);

            // Bind parameters to statement
            $sql->bindParam(':etat', $etat);
            $sql->execute();
            ?>
            <script>
                alert('Stock Insuffisant au Magasin');
                window.location.href='details_salle.php?id=<?=$id_salles?>';
            </script>
            <?php



        }

    }






?>
