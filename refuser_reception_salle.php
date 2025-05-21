<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php");
?>
<?php


$id_salles=$_REQUEST['ids'];
$id_materiel=$_REQUEST['idm'];
$id_ask_mat_sal=$_REQUEST['id_ask_mat_sal'];
$id_ask_mat=$_REQUEST['id_ask_mat'];
$id_ask_eq_sal=$_REQUEST['id_ask_eq_sal'];
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





    if(isset($_REQUEST['id_ask_mat_sal'])) {
        $id_ask_mat_sal = $_REQUEST['id_ask_mat_sal'];
        $quant_totale=0;

        $sql="SELECT id_salles_src, id_salles_dst, quantite  FROM demande_materiel_sal where id_ask_mat_sal='$id_ask_mat_sal' and id_ask_mat='$id_ask_mat' ";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($tables as $table)
        {
            echo '</br>'.  $id_salles_dst=$table['id_salles_src'];
            echo '</br>'.  $id_salles_src=$table['id_salles_dst'];
            $quantite_ajout=$table['quantite'];
        }

        $sql="SELECT  quantite  FROM demande_materiel where id_ask_mat='$id_ask_mat' ";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($tables as $table)
        {
            $quantite_initiale=$table['quantite'];
        }

     echo'</br>'.   $quant_totale=$quantite_ajout+$quantite_initiale;


//        $query1 = " UPDATE demande_materiel_sal  SET   etat=:statut
//                                         WHERE id_salles_dst='$id_salles'  and id_materiel='$id_materiel' and id_ask_eq_sal='$id_ask_eq_sal'";
//        $sql1 = $db->prepare($query1);
//
//    // Bind parameters to statement
//        $sql1->bindParam(':statut', $statut);
//        $sql1->execute();


        $query1 = " UPDATE demande_materiel  SET   quantite=:quantite    
                                         WHERE id_ask_mat='$id_ask_mat'";
        $sql1 = $db->prepare($query1);

        // Bind parameters to statement
        $sql1->bindParam(':quantite', $quant_totale);
        $sql1->execute();

        $etat=-1;
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


        $query = "DELETE FROM demande_materiel_sal WHERE id_ask_mat_sal='$id_ask_mat_sal'";
        $sql = $conn->query($query);

//        $sql="SELECT id_salles_src, id_salles_dst, quantite  FROM demande_materiel_sal where id_ask_eq_sal='$id_ask_eq_sal' ";
//        $stmt = $db->prepare($sql);
//        $stmt->execute();
//
//        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);
//
//        foreach($tables as $table)
//        {
//            echo '</br>'.  $id_salles_dst=$table['id_salles_src'];
//            echo '</br>'.  $id_salles_src=$table['id_salles_dst'];
//            $quantite=$table['quantite'];
//        }
//
//        $sql="SELECT * FROM salles where id_salles='$id_salles_src' ";
//        $stmt = $db->prepare($sql);
//        $stmt->execute();
//
//        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);
//
//        foreach($tables as $table)
//        {
//            $nom_salle_src=$table['nom'];
////                                         echo $nom_salle_src.'</br>';
//        }
//
//        $sql="SELECT * FROM salles where id_salles='$id_salles_dst' ";
//        $stmt = $db->prepare($sql);
//        $stmt->execute();
//
//        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);
//
//        foreach($tables as $table)
//        {
//            $nom_salle_dst=$table['nom'];
////                                          echo $nom_salle_dst.'</br>';
//        }


//        $etat=0;
//        $date_debut= date("Y-m-d");
//        $date_valide='N/A';
//        $query = " INSERT INTO demande_equipement_sal (id_salles_src,nom_salle_src,id_salles_dst,nom_salle_dst,date_debut,date_valide,etat)
//                     VALUES (:id_salles_src,:nom_salle_src,:id_salles_dst,:nom_salle_dst,:date_debut,:date_valide,:etat)";
//
//        $sql = $db->prepare($query);
//
//        // Bind parameters to statement
//        $sql->bindParam(':id_salles_src', $id_salles_src);
//        $sql->bindParam(':nom_salle_src', $nom_salle_src);
//        $sql->bindParam(':id_salles_dst', $id_salles_dst);
//        $sql->bindParam(':nom_salle_dst', $nom_salle_dst);
//        $sql->bindParam(':date_debut', $date_debut);
//        $sql->bindParam(':date_valide', $date_valide);
//        $sql->bindParam(':etat', $etat);
//        $sql->execute();
//
//
//        $sql="SELECT id_ask_eq_sal as total FROM demande_equipement_sal  ";
//        $stmt = $db->prepare($sql);
//        $stmt->execute();
//
//        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);
//
//        foreach($tables as $table)
//        {
//            $to=$table['total'];
//        }
//        $total=$to;
//
//
//        $sql = "INSERT INTO demande_materiel_sal (id_salles_src,id_materiel,nom_salle_src,id_salles_dst,nom_salle_dst,date_debut_mat,id_ask_eq_sal,quantite,etat)
//        VALUES(:id_salles_src,:id_materiel,:nom_salle_src,:id_salles_dst,:nom_salle_dst,:date_debut,:id_ask_eq_sal,:quantite,:etat)";
//        $req = $db->prepare($sql);
//
//        // Bind parameters to statement
//        $req->bindParam(':id_salles_src', $id_salles_src);
//        $req->bindParam(':id_materiel', $id_materiel);
//        $req->bindParam(':nom_salle_src', $nom_salle_src);
//        $req->bindParam(':id_salles_dst', $id_salles_dst);
//        $req->bindParam(':nom_salle_dst', $nom_salle_dst);
//        $req->bindParam(':date_debut', $date_debut);
//        $req->bindParam(':id_ask_eq_sal', $total);
//        $req->bindParam(':quantite', $quantite);
//        $req->bindParam(':etat', $etat);
//        $req->execute();


    }



if($sql)
{
    ?>
    <script>
        alert('Equipement pas recue.');
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
