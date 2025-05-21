 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php");
?>
<?php
  
    $id_ask_eq=$_POST['id_ask_eq'];
    $id_salles=$_POST['id_salles'];
    //echo $id_salles;
    //$cout=$_POST['cout'];
    $date_debut=$_POST['date_debut'];
    



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


        $sql="SELECT * FROM salles where id_salles='$id_salles' ";
                            $stmt = $db->prepare($sql);
                            $stmt->execute();

                             $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach($tables as $table)
                                        {
                                            $nom_salle=$table['nom'];
                                        }

                                        echo $nom_salle;



  $query1  = " UPDATE demande_equipement  SET   date_debut=:date_debut, id_salles=:id_salles, nom_salle=:nom_salle    
                    WHERE id_ask_eq = '$id_ask_eq' and id_salles = '$id_salles' ";

                

        $sql1 = $db->prepare($query1);

             // Bind parameters to statement
            $sql1->bindParam(':date_debut', $date_debut);
            $sql1->bindParam(':id_salles', $id_salles);
            $sql1->bindParam(':nom_salle', $nom_salle);
            $sql1->execute();

 
  


  

 

 if($sql1)
                                            {
                                                ?>
                                                <script>
                                                    //alert('Intervention a été bien ajouté.');
                                                               window.location.href='modifier_demande_eq.php?id=<?=$id_ask_eq?>';
                                                </script>
                                                <?php
                                            }

                                            else
                                            {       
                                              ?>
                                                <script>
                                                   // alert('Intervention n\'a pas été ajouté.');
                                                       window.location.href='modifier_demande_eq.php?id=<?=$id_ask_eq?>';
                                                </script>
                                                <?php
                                               
                                            }
?>
