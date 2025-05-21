 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php");
?>
<?php
  
    
    $id_inter=$_POST['id_inter'];
    $id_materiel=$_POST['id_mat'];
    $id_salles=$_POST['id_salles'];




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

$id = count($id_materiel);
   // echo $id.'</br>';

    if($id!=0){

 for ($j = 0; $j <$id; $j++) {

    // echo $id_fournisseur.'</br>';
    //  echo $id_materiel[$j].'</br>';
  //----------comparer deux dates -----------------//
  // $tmstp1 = strtotime($d1);
  //           $tmstp2 = strtotime($d2);
            
  //           $dfr1 = strftime('%A %d %B %Y', $tmstp1);
  //           $dfr2 = strftime('%A %d %B %Y', $tmstp2);
  //            if($tmstp1 < $tmstp2){
  //               echo 'Le ' .$dfr1. ' est avant le ' .$dfr2;
  //           }elseif($tmstp1 == $tmstp2){
  //               echo 'Les deux dates sont les mêmes';
  //           }else{
  //                echo 'Le ' .$dfr2. ' est avant le ' .$dfr1;
  //           }

 

 if($id_materiel[$j]!=""){

         
  // $sql = "UPDATE  intervention_materiel SET id_materiel=:id_materiel WHERE id_inter = '$id_inter' and id_materiel' = '$id_materiel' ";
  //                                   $req = $db->prepare($sql);

  //                                   // Bind parameters to statement
  //                                   $req->bindParam(':id_materiel', $id_materiel);
  //                                   $req->execute();
         $sql3 = "SELECT DISTINCT count(id_materiel) as total from intervention_materiel where id_materiel = '$id_materiel[$j]' and id_inter='$id_inter' and id_salles = '$id_salles' ";

                                                                $stmt3 = $db->prepare($sql3);
                                                                $stmt3->execute();

                                                                $tables3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);

                                                                foreach($tables3 as $tables)
                                                                {

                                                                    $total = $tables['total'];

                    if($total!=1){ 

                      // echo $id_materiel[$j].'</br>';
                      // echo $id_inter.'</br>';
                      // echo $id_salles.'</br>';

                          $sql="SELECT * FROM salles where id_salles='$id_salles' ";
                            $stmt = $db->prepare($sql);
                            $stmt->execute();

                             $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach($tables as $table)
                                        {
                                            $nom_salle=$table['nom'];
                                        }

                                      //  echo $nom_salle;
                                        $cout=0;
                                        $date_now=date('y-m-d');


         $sql = "INSERT INTO intervention_materiel (id_inter, id_materiel,date_debut_mat,id_salles,nom_salle,cout)
                                VALUES(:id_inter,:id_materiel,:dat,:id_salles,:nom_salle,:cout)";
                                    $req = $db->prepare($sql);

                                    // Bind parameters to statement
                                    $req->bindParam(':id_inter', $id_inter);
                                    $req->bindParam(':id_materiel', $id_materiel[$j]);
                                    $req->bindParam(':dat', $date_now);
                                    $req->bindParam(':id_salles', $id_salles);
                                    $req->bindParam(':nom_salle', $nom_salle);
                                    $req->bindParam(':cout', $cout);
                                    $req->execute();


                                


                                }

                            }

                        }
                    
                

            }
        }


 

 if($req)
                                            {
                                                ?>
                                                <script>
                                                    alert('Intervention a été bien modifié.');
                                                              window.location.href='modifier_intervenant.php?id=<?=$id_inter?>';
                                                </script>
                                                <?php
                                            }

                                            else
                                            {       
                                              ?>
                                                <script>
                                                    alert('Intervention n\'a pas été modifié.');
                                                    window.location.href='ajouter_inter_materiel.php?idi=<?=$id_inter?>&ids=<?=$id_salles?>';
                                                </script>
                                                <?php
                                               
                                            }
?>
