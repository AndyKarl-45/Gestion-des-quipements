 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php");
?>
<?php
  
 
    $id_salles=$_REQUEST['ids'];
    $id_materiel=$_REQUEST['idm'];
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



                $statut=-1;
                $query1  = " UPDATE materiel  SET   statut=:statut    
                                     WHERE id_salles='$id_salles'  and id_materiel='$id_materiel' ";

                        $sql1 = $db->prepare($query1);

                                 // Bind parameters to statement
                                $sql1->bindParam(':statut', $statut);
                                $sql1->execute();


                if(isset($_REQUEST['ideq'])){
            $id_ask_eq=$_REQUEST['ideq'];

                 $etat=-1;
                 $query  = " UPDATE demande_materiel  SET   etat=:etat WHERE id_materiel='$id_materiel' and id_salles='$id_salles' and id_ask_eq='$id_ask_eq'";

                         $sql = $db->prepare($query);

                                 // Bind parameters to statement
                                $sql->bindParam(':etat', $etat);
                                $sql->execute();

                $etat=-1;
                $query  = " UPDATE demande_equipement  SET   etat=:etat    
                                     WHERE id_salles='$id_salles'  and id_ask_eq='$id_ask_eq' and emetteur='$emetteur' ";

                

                         $sql = $db->prepare($query);

                                 // Bind parameters to statement
                                $sql->bindParam(':etat', $etat);
                                $sql->execute();
                            }


 if($sql1)
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
