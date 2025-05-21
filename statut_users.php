<?php
include('first.php');
include('php/main_side_navbar.php');

$id_session = $_SESSION['rainbo_id_perso'];
$user = $_SESSION['rainbo_name'];
$email_user = $_SESSION['rainbo_email'];


if (isset($_GET['id_user'])) {
    $id_user = $_GET['id_user'];
    $statut = "";
    

    $query = "SELECT * FROM users WHERE id_users = $id_user";
        $q = $conn->query($query);
        while($row = $q->fetch_assoc())
        {
            $statut = $row['statut'];
            $salle = $row['salle'];
            $secteur = $row['secteur'];
            $username = $row['pseudo'];
            $email = $row['email'];
        }
        
        $query = "SELECT nom  FROM salles WHERE id_salles = '$salle'";
        $q = $conn->query($query);
        while ($row = $q->fetch_assoc()) {
            $nom_salle = $row['nom'];
        }
    
        $query = "SELECT nom FROM secteur WHERE id_secteur = '$secteur'";
        $q = $conn->query($query);
        while ($row = $q->fetch_assoc()) {
            $secteur_nom = $row['nom'];
        }

//echo $statut;

    
    if($statut === "A")
        $statut = "D";
    else
        $statut = "A";
        
        echo $statut;
        
    try{
        // Create prepared statement info project
        $query  = "UPDATE users SET statut=:statut WHERE id_users =:id";

        $req = $db->prepare($query);

        // Bind parameters to statement
        $req->bindParam(':statut', $statut);
        $req->bindParam(':id', $id_user);

        $req->execute();

        if ($req)
        {
            $mailler = new mailsenderclass();

            $subject = "Desactiver Utilisateur";
            $body = "Utilisateur : "
                .strtoupper($username)
                ." du secteur "
                .strtoupper($secteur_nom)
                ."de la salle "
                .strtoupper($nom_salle)
                ." a ete desactive par "
                .strtoupper($user)." le "
                .date("d/m/Y"). " à "
                .date("G:i")
                ."<br/> <a href='campresjonlline.net'>Voir les details</a>";

            $from= 'supergoal@campresjonlline.net';
            $from_name='CAMPREJ EQUIEPEMENT';
            $sql = $db->query("select * from users where (lvl = 5 or lvl = 6 )");
            while($row = $sql->fetch()){
                $to = $row['email'];
                $mailler->mailsenderclass($to, $from, $from_name, $subject, $body);
            }
                                    
            $mailler->mailsenderclass($email_user, $from, $from_name, $subject, $body);
            
            echo "<script>
                window.location.href='liste_utilisateurs.php';
            </script>";

        }

        else
        {

            echo "<script>
                window.location.href='liste_utilisateurs.php';
            </script>";
        }


    } catch(PDOException $e){
        die("ERROR: Could not able to execute. " . $e->getMessage());
    }
}


?>
