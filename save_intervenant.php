 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php");
?>
<?php
  
    
    $id_salles=$_POST['id_salles'];
    $cout=$_POST['cout'];
    $technicien=$_POST['technicien'];
    $date_debut=$_POST['date_debut'];
    $date_fin=$_POST['date_fin'];
    $h_debut=$_POST['h_debut'];
    $conclusion=$_POST['conclusion'];
    $nature=$_POST['nature'];

    if(isset($_POST['id_mat'])){
      $id_materiel=$_POST['id_mat'];
    }else{
      $id_materiel[0]=0;
    }
    
        $sql="SELECT * FROM salles where id_salles='$id_salles' ";
                            $stmt = $db->prepare($sql);
                            $stmt->execute();

                             $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach($tables as $table)
                                        {
                                            $nom_salle=$table['nom'];
                                        }

                                       // echo $nom_salle;



      //--------------------------code pour email ------------------------------//
//   $result="";
//         require "PHPMailer/PHPMailerAutoload.php";
        
//               $to ="mboningdany@gmail.com";
//               $to1 ="info@syges.cm";
//               $from= 'supergoal@campresjonlline.net';
//               $from_name='CAMPREJ EQUIEPEMENT';
//               $subject=$nature;
               

//              $mail = new PHPMailer();
//              $mail->IsSMTP();
//              $mail->SMTPAuth = true;
             
//              $mail->SMTPSecure = 'ssl';
//              $mail->Host = 'mail.campresjonlline.net';
//              $mail->Port= '465';
//              $mail->Username = 'supergoal@campresjonlline.net';
//              $mail->Password = 'Y@)W@LPSDLaP';

//              $mail->IsHTML(true);
//              $mail->From="supergoal@campresjonlline.net";
//              $mail->FromName=$from_name; 
//              $mail->Sender=$from;
//              $mail->AddReplyTo($from, $from_name); 
//              $mail->Subject = $subject; 
//              $mail->Body = '<h1 align=center> Nouvelle Intervention</h1></br><h3 align=center> Salle: '.$nom_salle.' </h3> </br><h3 align=center> Intervenant:</br> '.strtoupper($technicien).' </h3></br><p align=center> Conclusion:</br> '.strtolower($conclusion).' </p>'; 
//              $mail->AddAddress($to,$to1);  
//              if(!$mail->Send())
//                  {
//                      $result= "Please try later";
//                          // echo $result;
//                   }else{
//                     $result="Thanks you!!";
//                           //   echo $result;
//                  }

    //-----------------------------------------------------------------------//




  




    $query = " INSERT INTO intervenant (id_salles,nom_salle,technicien,date_debut,date_fin,nature,conclusion,h_debut,cout) 
                     VALUES (:id_salles,:nom_salle,:technicien,:date_debut,:date_fin,:nature,:conclusion,:h_debut,:cout)";

                 $sql = $db->prepare($query);

     // Bind parameters to statement
            $sql->bindParam(':id_salles', $id_salles);
            $sql->bindParam(':nom_salle', $nom_salle);
            $sql->bindParam(':technicien', $technicien);
            $sql->bindParam(':date_debut', $date_debut);
            $sql->bindParam(':date_fin', $date_fin);
            $sql->bindParam(':nature', $nature);
            $sql->bindParam(':conclusion', $conclusion);
            $sql->bindParam(':h_debut', $h_debut);
            $sql->bindParam(':cout', $cout);
            $sql->execute();

  $sql="SELECT id_inter as total FROM intervenant  ";
                            $stmt = $db->prepare($sql);
                            $stmt->execute();

                             $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach($tables as $table)
                                        {
                                            $to=$table['total'];
                                        }
                                        $total=$to;

$id = count($id_materiel);
    echo $id.'</br>';

if($id_materiel[0]!=0){
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

         
  $sql = "INSERT INTO intervention_materiel (id_inter, id_materiel,id_salles,nom_salle,date_debut_mat,cout)
                                VALUES(:id_inter,:id_materiel,:id_salles,:nom_salle,:date_debut,:cout)";
                                    $req = $db->prepare($sql);

                                    // Bind parameters to statement
                                    $req->bindParam(':id_inter', $total);
                                    $req->bindParam(':id_materiel', $id_materiel[$j]);
                                    $req->bindParam(':date_debut', $date_debut);
                                    $req->bindParam(':id_salles', $id_salles);
                                    $req->bindParam(':nom_salle', $nom_salle);
                                    $req->bindParam(':cout', $cout);
                                    $req->execute();

                        }
                    
                

            }
        }
      }


 

 if($sql)
                                            {
                                                ?>
                                                <script>
                                                    //alert('Intervention a été bien ajouté.');
                                                                window.location.href='liste_intervention.php?witness=1';
                                                </script>
                                                <?php
                                            }

                                            else
                                            {       
                                              ?>
                                                <script>
                                                   // alert('Intervention n\'a pas été ajouté.');
                                                       window.location.href='liste_intervention.php?witness=-1';
                                                </script>
                                                <?php
                                               
                                            }
?>
