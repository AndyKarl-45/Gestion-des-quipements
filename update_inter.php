 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php");
?>
<?php
  
    $id_inter=$_POST['id_inter'];
    $id_salles=$_POST['id_salles'];
    echo $id_salles;
    $cout=$_POST['cout'];
    $technicien=$_POST['technicien'];
    $date_debut=$_POST['date_debut'];
    $date_fin=$_POST['date_fin'];
    $h_debut=$_POST['h_debut'];
    $conclusion=$_POST['conclusion'];
    $nature=$_POST['nature'];
    



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


if($cout>=0){
  $query1  = " UPDATE intervenant SET  technicien=:technicien, date_debut=:date_debut, 
                    date_fin=:date_fin, h_debut=:h_debut, conclusion=:conclusion, nature=:nature, cout=:cout, id_salles=:id_salles, nom_salle=:nom_salle    
                    WHERE id_inter = '$id_inter' and id_salles = '$id_salles' ";

                

        $sql1 = $db->prepare($query1);

             // Bind parameters to statement
            $sql1->bindParam(':technicien', $technicien);
            $sql1->bindParam(':date_debut', $date_debut);
            $sql1->bindParam(':date_fin', $date_fin);
            $sql1->bindParam(':h_debut', $h_debut);
            $sql1->bindParam(':conclusion', $conclusion);
            $sql1->bindParam(':nature', $nature);
            $sql1->bindParam(':cout', $cout);
            $sql1->bindParam(':id_salles', $id_salles);
            $sql1->bindParam(':nom_salle', $nom_salle);
            $sql1->execute();
}else{
        ?>
                                                <script>
                                                    alert('Coût est incorrect.');
                                                               window.location.href='modifier_intervenant.php?id=<?=$id_inter?>';
                                                </script>
                                                <?php
}

 
  


  

 

 if($sql1)
                                            {
                                                ?>
                                                <script>
                                                    //alert('Intervention a été bien ajouté.');
                                                             //  window.location.href='modifier_intervenant.php?id=<?=$id_inter?>';
                                                </script>
                                                <?php
                                            }

                                            else
                                            {       
                                              ?>
                                                <script>
                                                   // alert('Intervention n\'a pas été ajouté.');
                                                       window.location.href='modifier_intervenant.php?id=<?=$id_inter?>';
                                                </script>
                                                <?php
                                               
                                            }
?>
