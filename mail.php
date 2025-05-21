<?php
require "PHPMailer/PHPMailerAutoload.php";

function smtpmailer($to, $from, $from_name, $subject, $body)
   {
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
             $mail->Body = $body; 
             $mail->AddAddress($to); 
             if(!$smail->Send())
                 {
                     $result= "Please try later";
                         return $result;
                  }else{
                     $result="Thanks you!!";
                           return $result;
                 }
       }

             
               $to ='mboningjokungandykarl43@gmail.com';
               $from= 'supergoal@campresjonlline.net';
               $name='andy';
               $subj='test subj';
               $msg = 'this is mail good! ';
               
              $result=smtpmailer($to, $from, $name, $subj, $msg);
?>