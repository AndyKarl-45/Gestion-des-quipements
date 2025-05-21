 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php");
    $user = $_SESSION['rainbo_name'];
$email_user = $_SESSION['rainbo_email'];

 $id_session = $_SESSION['rainbo_id_perso'];

$query = "SELECT * from personnel where id_personnel = $id_session";
$q = $db->query($query);
while($row = $q->fetch()) {
    $nom_session = $row['prenom'].' '.$row['nom'];
    $email_user_session = $row['email'];
}
    
?>

<?php 

if($_POST)
{



        
        $ref_materiel = $_POST['ref_materiel'];
        $designation = strtoupper($_POST['designation']);
        $quantite = abs($_POST['quantite']);
        $id_cat_materiel = $_POST['id_cat_materiel'];
        $prix_unitaire = $_POST['prix_unitaire'];
        $mag=$_POST['mag'];
        $id_salles=0;
        $open_close=0;
        $statut=0;
        

        $prix_total=$prix_unitaire*$quantite;
        
if($prix_unitaire>=0 ){
   

//--------------------------------- insertion un materiel -----------------------------------------//
                

         $query = " INSERT INTO materiel (ref_materiel,designation,quantite,id_cat_materiel,prix_unitaire,prix_total,open_close,id_salles,statut,mag) 
                     VALUES (:ref_materiel,:designation,:quantite,:id_cat_materiel,:prix_unitaire,:prix_total,:open_close,:id_salles,:statut,:mag)";

                 $sql = $db->prepare($query);

     // Bind parameters to statement
            $sql->bindParam(':ref_materiel', $ref_materiel);
            $sql->bindParam(':designation', $designation);
            $sql->bindParam(':quantite', $quantite);
            $sql->bindParam(':id_cat_materiel', $id_cat_materiel);
            $sql->bindParam(':prix_unitaire', $prix_unitaire);
            $sql->bindParam(':prix_total', $prix_total);
            $sql->bindParam(':open_close', $open_close);
            $sql->bindParam(':id_salles', $id_salles);
            $sql->bindParam(':statut', $statut);
            $sql->bindParam(':mag', $mag);
            $sql->execute();

       
       // $magasin='S';
       // $query1 = "UPDATE materiel SET mag=:mag where statut=1 ";
  
       //  $req = $db->prepare($query1);

       //       // Bind parameters to statement
       //      $req->bindParam(':mag', $magasin);
       //      $req->execute();



// $sql = "SELECT  Max(id_materiel) as total from materiel";

//             $stmt = $db->prepare($sql);
//             $stmt->execute();

//             $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

//             foreach ($tables as $table) {
//                 $total = $table['total'];
//             }


      //   $id_salles=0;
      //   $id_materiel=$total;
      //   $nom_salle='N/A';
      //   $id_ask_eq=0;
      //   $etat=1;
      //   $emetteur='N/A';
      //   $receveur=$_POST['prix_unitaire'];
      //   $date_valide=date('y-m-d');

      // $sql = "INSERT INTO demande_materiel (id_salles, id_materiel,nom_salle,date_debut_mat,id_ask_eq,quantite,etat,emetteur,receveur)
      //                           VALUES(:id_salles,:id_materiel,:nom_salle,:date_debut,:id_ask_eq,:quantite,:etat,:emetteur,:receveur)";
      //                               $req = $db->prepare($sql);

      //                               // Bind parameters to statement
      //                               $req->bindParam(':id_salles', $id_salles);
      //                               $req->bindParam(':id_materiel', $id_materiel);
      //                               $req->bindParam(':nom_salle', $nom_salle);
      //                               $req->bindParam(':date_debut', $date_valide);
      //                               $req->bindParam(':id_ask_eq', $total);
      //                               $req->bindParam(':quantite', $quantite);
      //                               $req->bindParam(':etat', $etat);
      //                               $req->bindParam(':emetteur', $emetteur);
      //                               $req->bindParam(':receveur', $receveur);
      //                               $req->execute();




                                    if($sql)
                                    {
                                        switch ($mag){
                                                case 'C';
                                                   $magas="Magasin Centrale";
                                                    break;
                                                case 'E';
                                                   $magas="Magasin d'enregistrement";
                                                    break;
                                                case 'O';
                                                   $magas="Magasin Congo";
                                                    break;
                                                 

                                            }
                                        
                                        $mailler = new mailsenderclass();

                                                $subject = "Nouveau equipement en stock";
                                                $body = "Nouveau equipement inserer dans le stock par "
                                                        .strtoupper($user)." le "
                                                        .date("d/m/Y"). " à "
                                                        .date("G:i")." dans le "
                                                        .strtoupper($magas)
                                                        ."<br/>
                                                         <a href='campresjonlline.net'>Voir les details</a>";

                                                $from= 'supergoal@campresjonlline.net';
                                                $from_name='CAMPREJ EQUIEPEMENT';
                                                $sql = $db->query("select * from users where secteur = $id_secteur_user and (lvl = 4 or lvl = 3 or lvl = 8 or lvl = 7)");
                                                while($row = $sql->fetch()){
                                                    $to = $row['email'];
                                                    $mailler->mailsenderclass($to, $from, $from_name, $subject, $body);
                                                }
                                                
                                                $sql = $db->query("select * from users where  (lvl = 5 or lvl = 6 )");
                                                while($row = $sql->fetch()){
                                                    $to = $row['email'];
                                                    $mailler->mailsenderclass($to, $from, $from_name, $subject, $body);
                                                }
                                                $mailler->mailsenderclass($email_user, $from, $from_name, $subject, $body);
                                        
                                        switch ($mag){
                                                case 'C';
                                                   ?>
                                                    <script>
                                                        alert('materiel a été bien enregistrée.');
                                                         window.location.href='<?=$materiaux['option2_link']?>?witness=1';
                                                    </script>
                                                    <?php
                                                    break;
                                                case 'E';
                                                   ?>
                                                    <script>
                                                        alert('materiel a été bien enregistrée.');
                                                         window.location.href='liste_materiaux_save.php?witness=1';
                                                    </script>
                                                    <?php
                                                    break;
                                                case 'O';
                                                   ?>
                                                    <script>
                                                        alert('materiel a été bien enregistrée.');
                                                         window.location.href='liste_materiaux_congo.php?witness=1';
                                                    </script>
                                                    <?php
                                                    break;
                                                 

                                            }
                                    }

                                    else
                                    {       
                                      

                                    switch ($mag){
                                                case 'C';
                                                  ?>
                                                    <script>
                                                        alert('Error.');
                                                        window.location.href='<?=$materiaux['option2_link']?>?witness=-1';
                                                    </script>
                                                    <?php
                                                    break;
                                                case 'E';
                                                  ?>
                                                    <script>
                                                        alert('Error.');
                                                        window.location.href='liste_materiaux_save.php?witness=-1';
                                                    </script>
                                                    <?php
                                                    break;
                                                case 'O';
                                                   ?>
                                                <script>
                                                    alert('Error.');
                                                    window.location.href='liste_materiaux_congo.php?witness=-1';
                                                </script>
                                                <?php
                                                    break;
                                                 

                                            }
                                       
                                    }






    
}else{
    ?>
    <script>
        alert(' Vous avez entrer une valeur négative!');
        window.location.href='<?=$materiaux['option2_link']?>?witness=-1';
    </script>
    <?php

}


}
?>
