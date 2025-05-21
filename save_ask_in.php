 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php");

//strtolower(); ecrire en miniscule
//strtouppor(); ecrire en majiscule
?>

<?php

  $user = $_SESSION['rainbo_name'];
$email_user = $_SESSION['rainbo_email'];

$id_session = $_SESSION['rainbo_id_perso'];

$query = "SELECT * from personnel where id_personnel = $id_session";
$q = $db->query($query);
while($row = $q->fetch()) {
    $nom_session = $row['prenom'].' '.$row['nom'];
    $email_user_session = $row['email'];
}

if($_POST)
{               


        
        $id_salles = $_POST['id_salles'];
        $date_debut = $_POST['date_debut'];
        $nature = $_POST['nature'];
        $statut=0;

        // echo $id_salles;
        // echo $date_debut;
        // echo $nature;
        
        $sql="SELECT * FROM salles where id_salles='$id_salles' ";
                            $stmt = $db->prepare($sql);
                            $stmt->execute();

                             $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach($tables as $table)
                                        {
                                            $nom_salle=$table['nom'];
                                        }
                                        // echo $nom_salle;

        // echo $nom;
        // echo $id_ville;
        $date_valide='N/A';
        
        $query = "INSERT INTO demande_inter (id_salles,nom_salle,date_debut,date_valide,nature,statut) VALUES (:id_salles,:nom_salle,:date_debut,:date_valide,:nature,:statut)";

                 $sql = $db->prepare($query);

     // Bind parameters to statement
            $sql->bindParam(':id_salles', $id_salles);
            $sql->bindParam(':nom_salle', $nom_salle);
            $sql->bindParam(':date_debut', $date_debut);
            $sql->bindParam(':date_valide', $date_valide);
            $sql->bindParam(':nature', $nature);
            $sql->bindParam(':statut', $statut);
            $sql->execute();

                                    if($sql)
                                    {
                                                $mailler = new mailsenderclass();

                                                $subject = "Demande d'intervention ";
                                                $body = "Demande d'intervention effectuee le "
                                                    .date("d/m/Y",strtotime($date_debut))
                                                    ." pour la salle "
                                                    .strtoupper($nom_salle)
                                                    ." a ete valide par"
                                                    .strtoupper($user)
                                                    ."<br/>
                                                         <a href='campresjonlline.net'>Voir les details</a>";

                                                $from= 'supergoal@campresjonlline.net';
                                                $from_name='CAMPREJ EQUIEPEMENT';
                                                $sql = $db->query("select * from users where secteur = $id_secteur_user and (lvl = 4 or lvl = 3 or lvl = 8 or lvl = 7)");
                                                while($row = $sql->fetch()){
                                                    $to = $row['email'];
                                                    $mailler->mailsenderclass($to, $from, $from_name, $subject, $body);
                                                }
                                                
                                                $sql = $db->query("select * from users where (lvl = 5 or lvl = 6)");
                                                while($row = $sql->fetch()){
                                                    $to = $row['email'];
                                                    $mailler->mailsenderclass($to, $from, $from_name, $subject, $body);
                                                }
                                                
                                                $mailler->mailsenderclass($email_user, $from, $from_name, $subject, $body);
                                        
                                        ?>
                                        <script>
                                        //   alert('Demande d\'intervention a été bien enregistrée.');
                                         window.location.href='liste_demande_in.php?witness=1';
                                        </script>
                                        <?php
                                    }

                                    else
                                    {       
                                      ?>
                                        <script>
                                            // alert('Error.');
                                            window.location.href='liste_demande_in.php?witness=-1';
                                        </script>
                                        <?php
                                       
                                    }


}
?>
