<?php

if (isset($_POST['submit_update_user']) != "") {
    $id_user = $_POST['id_user'];
    $salle = $_POST['salle'];
    $secteur = $_POST['secteur'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    
        $id_session = $_SESSION['rainbo_id_perso'];
    $user = $_SESSION['rainbo_name'];
    $email_user = $_SESSION['rainbo_email'];

        $sql = "SELECT  * from salles where id_salles = '$salle'";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($tables as $table) {
            $nom_salle = $table['nom'];
        }

        $sql = "SELECT  * from secteur where id_secteur = '$secteur'";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($tables as $table) {
            $secteur_nom = $table['nom'];
        }

//    echo $_POST['submit_update_user'].'<br/>';
//    echo $id_user.'<br/>';
//    echo $salle.'<br/>';
//    echo $secteur.'<br/>';
//    echo $username.'<br/>';
//    echo $email.'<br/>';

    $query = "UPDATE users SET salle=:salle, secteur=:secteur, pseudo=:username, email=:email WHERE id_users =:id_user";

    $req = $db->prepare($query);

    // Bind parameters to statement
    $req->bindParam(':salle', $salle);
    $req->bindParam(':secteur', $secteur);
    $req->bindParam(':username', $username);
    $req->bindParam(':email', $email);
    $req->bindParam(':id_user', $id_user);

    $req->execute();

    if ($req) {
        
        $mailler = new mailsenderclass();

        $subject = "Modifier Utilisateur";
        $body = "Utilisateur : "
            .strtoupper($username)
            ." du secteur "
            .strtoupper($secteur_nom)
            ."de la salle "
            .strtoupper($nom_salle)
            ." a ete modifier par "
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
        
        ?>
        <script>
            Toast.fire({
                icon: 'success',
                title: 'Opération effectuée avec succès'
            })
        </script>
        <?php
    } else {
        ?>
        <script>
            Toast.fire({
                icon: 'error',
                title: 'Error lors de l\'enregistrement'
            })
        </script>
        <?php
    }
}
?>
