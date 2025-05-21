 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php");
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
    

                $statut=-1;
                $query1  = " UPDATE demande_inter  SET   statut=:statut    
                                     WHERE id_ask_inter='$id_ask_inter' ";

                        echo $statut;
                

                         $sql1 = $db->prepare($query1);

                                 // Bind parameters to statement
                                $sql1->bindParam(':statut', $statut);
                                $sql1->execute();


 if($sql1)
                                            {
                                                ?>
                                                <script>
                                                  // alert('Error.');
                                                       window.location.href='liste_demande_in.php?id=<?=$id_salles?>&witness=-1';
                                                </script>
                                                <?php
                                            }

                                            else
                                            {       
                                              ?>
                                                <script>
                                                   alert('Error.');
                                                      // window.location.href='liste_demande_in.php?id=<?=$id_salles?>&witness=-1';
                                                </script>
                                                <?php
                                               
                                            }
?>
