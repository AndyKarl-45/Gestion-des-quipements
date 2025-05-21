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

if($_REQUEST)
{  
    



        /*--------------------------------- ETAT INFOS RH -------------------------------------*/
        $id = $_REQUEST['id_materiel'];
        // echo $id;

        $open_close=1;

         $query1  = " UPDATE materiel SET  open_close=:open_close    
                    WHERE id_materiel= '$id' ";

                

        $sql1 = $db->prepare($query1);

             // Bind parameters to statement
            $sql1->bindParam(':open_close', $open_close);
            $sql1->execute();

    $sql = "SELECT designation FROM materiel where id_materiel='$id_materiel' "; 
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($tables as $table) {
        $designation = $table['designation'];
    }


                        if($sql1)
                                    {
                                        
                                                $mailler = new mailsenderclass();

                                                $subject = "Suppression d'un equipement en stock";
                                                $body = "L'equipement :"
                                                        .strtoupper($designation)
                                                        ." a ete supprimer dans le stock par "
                                                        .strtoupper($user)." le "
                                                        .date("d/m/Y"). " à "
                                                        .date("G:i")." dans le "
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
                                                
                                        ?>
                                        <script>
                                            alert('materiel a été supprimé.');
                                               window.location.href='<?=$materiaux['option2_link']?>?witness=1';
                                        </script>
                                        <?php
                                    }

                                    else
                                    {       
                                      ?>
                                        <script>
                                            alert('Error.');
                                            window.location.href='<?=$materiaux['option2_link']?>?witness=-1';
                                        </script>
                                        <?php
                                       
                                    }


}
?>
