 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php");
?>

<?php

if($_POST)
{               
        //test email
            // $result="";
            // require 'phpmailer/PHPMailerAutoload.php';
            // $mail = new PHPMailer;
            
            // $mail->Host='mail.campresjonlline.net';
            // $mail->Port=587;
            // $mail->SMTPAuth=true;
            // $mail->SMTPSecure='tls';
            // $mail->Username='supergoal@campresjonlline.net';
            // $mail->Password='Y@)W@LPSDLaP';
            
            // $mail->setFrom($_POST['email'],$_POST['prenom']);
            // $mail->addAddress('mboningjokungandykarl43@gmail.com');
            // $mail->addReplyTo($_POST['email'],$_POST['prenom']);
            
            // $mail->isHTML(true);
            // $mail->Subjet='Form submission: ' .$_POST['prenom'];
            // $mail->Body='<h1 align=center>Name: ' .$_POST['prenom']. '<br>Email: ' .$_POST['email']. '<br>Message: ' .$_POST['prenom']. '</h1>';
            
            // echo $_POST['prenom'];
            // echo $_POST['email'];
            
            // if(!$mail->send()){
            //  echo  $result="Something went wrong. Please try again.";
            // }else{
            //  echo  $result="Thanks ".$_POST['prenom']." for contacting us!";
            // }
        //  fin test email 
        
        
            $result="";
        require "PHPMailer/PHPMailerAutoload.php";
        
         $to ='mboningjokungandykarl@yahoo.fr';
               $from= 'supergoal@campresjonlline.net';
               $from_name='CAMPREJ EQUIEPEMENT';
               $subject='OBJET TEST';
               

             $mail = new PHPMailer();
             $mail->IsSMTP();
             $mail->SMTPAuth = true;
             
             $mail->SMTPSecure = 'ssl';
             $mail->Host = 'mail.campresjonlline.net';
             $mail->Port= '465';
             $mail->Username = 'supergoal@campresjonlline.net';
             $mail->Password = 'Y@)W@LPSDLaP';

             $mail->IsHTML(true);
             $mail->From="supergoal@campresjonlline.net";
             $mail->FromName=$from_name; 
             $mail->Sender=$from;
             $mail->AddReplyTo($from, $from_name); 
             $mail->Subject = $subject; 
             $mail->Body = '<h1 align=center>Name: ' .$from_name. '<br>Email: ' .$from. '<br>Message: ' .$subject. '</h1>'; 
             $mail->AddAddress($to); 
             if(!$mail->Send())
                 {
                     $result= "Please try later";
                         echo $result;
                  }else{
                    $result="Thanks you!!";
                           echo $result;
                 }
             
            

        
        $nom = strtoupper($_POST['nom']);
        $id_region = $_POST['id_region'];
         $open_close=0;

        // echo $nom;
        // echo $id_pays;
        $query = "INSERT INTO ville (nom,id_region,open_close) VALUES (:nom,:id_region,:open_close)";

                 $sql = $db->prepare($query);

     // Bind parameters to statement
            $sql->bindParam(':nom', $nom);
            $sql->bindParam(':id_region', $id_region);
             $sql->bindParam(':open_close', $open_close);
            $sql->execute();

                                    if($sql)
                                    {
                                        ?>
                                        <script>
                                            alert('Ville a été bien enregistrée.');
                                        //   window.location.href='liste_ville.php';
                                        </script>
                                        <?php
                                    }

                                    else
                                    {       
                                      ?>
                                        <script>
                                            alert('Error.');
                                            // window.location.href='liste_ville.php';
                                        </script>
                                        <?php
                                       
                                    }


}
?>
