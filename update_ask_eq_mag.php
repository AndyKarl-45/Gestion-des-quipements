 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php");
?>
<?php
  
    $id_ask_eq=$_POST['id_ask_eq'];
    $receveur=$_POST['receveur'];
    $emetteur=$_POST['emetteur'];
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


    $id_salles=0;
    $nom_salle='N/A';



  $query1  = " UPDATE demande_equipement  SET   date_debut=:date_debut, receveur=:receveur, nom_salle=:nom_salle    
                    WHERE id_ask_eq = '$id_ask_eq' and receveur = '$receveur' ";

                

        $sql1 = $db->prepare($query1);

             // Bind parameters to statement
            $sql1->bindParam(':date_debut', $date_debut);
            $sql1->bindParam(':receveur', $receveur);
            $sql1->bindParam(':nom_salle', $nom_salle);
            $sql1->execute();

 
  


  

 

 if($sql1)
                                            {

                                                

                                                switch ($emetteur){
                                                            case 'C';
                                                               ?>
                                                                <script>
                                                                    //alert('Intervention a été bien ajouté.');
                                                                               window.location.href='modifier_demande_mag.php?id=<?=$id_ask_eq?>';
                                                                </script>
                                                                <?php
                                                                break;
                                                            case 'E';
                                                               ?>
                                                                <script>
                                                                    //alert('Intervention a été bien ajouté.');
                                                                               window.location.href='modifier_demande_mag_save.php?id=<?=$id_ask_eq?>';
                                                                </script>
                                                                <?php
                                                                break;
                                                            case 'D';
                                                               ?>
                                                                <script>
                                                                    //alert('Intervention a été bien ajouté.');
                                                                               window.location.href='modifier_demande_mag_def.php?id=<?=$id_ask_eq?>';
                                                                </script>
                                                                <?php
                                                                break;
                                                             case 'M';
                                                               ?>
                                                                <script>
                                                                    //alert('Intervention a été bien ajouté.');
                                                                               window.location.href='modifier_demande_mag_main.php?id=<?=$id_ask_eq?>';
                                                                </script>
                                                                <?php
                                                                break;
                                                            case 'O';
                                                               ?>
                                                                <script>
                                                                    //alert('Intervention a été bien ajouté.');
                                                                               window.location.href='modifier_demande_mag_congo.php?id=<?=$id_ask_eq?>';
                                                                </script>
                                                                <?php
                                                                break;

                                                        }
                                                
                                            }

                                            else
                                            {       
                                              switch ($emetteur){
                                                            case 'C';
                                                               ?>
                                                                <script>
                                                                    //alert('Intervention a été bien ajouté.');
                                                                               window.location.href='modifier_demande_mag.php?id=<?=$id_ask_eq?>';
                                                                </script>
                                                                <?php
                                                                break;
                                                            case 'E';
                                                               ?>
                                                                <script>
                                                                    //alert('Intervention a été bien ajouté.');
                                                                               window.location.href='modifier_demande_mag_save.php?id=<?=$id_ask_eq?>';
                                                                </script>
                                                                <?php
                                                                break;
                                                            case 'D';
                                                               ?>
                                                                <script>
                                                                    //alert('Intervention a été bien ajouté.');
                                                                               window.location.href='modifier_demande_mag_def.php?id=<?=$id_ask_eq?>';
                                                                </script>
                                                                <?php
                                                                break;
                                                             case 'M';
                                                               ?>
                                                                <script>
                                                                    //alert('Intervention a été bien ajouté.');
                                                                               window.location.href='modifier_demande_mag_main.php?id=<?=$id_ask_eq?>';
                                                                </script>
                                                                <?php
                                                                break;
                                                            case 'O';
                                                               ?>
                                                                <script>
                                                                    //alert('Intervention a été bien ajouté.');
                                                                               window.location.href='modifier_demande_mag_congo.php?id=<?=$id_ask_eq?>';
                                                                </script>
                                                                <?php
                                                                break;

                                               
                                            }
?>
