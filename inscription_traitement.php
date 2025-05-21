<?php
echo 'First <br/>';
    include 'first.php';
    echo 'Start <br/>';
    echo $_POST['username'].'<br/>';
echo $_POST['email'].'<br/>';
echo $_POST['password'].'<br/>';
echo $_POST['lvl'].'<br/>';
echo $_POST['secteur'].'<br/>';
echo 'Fin <br/>';

$id_session = $_SESSION['rainbo_id_perso'];
$user = $_SESSION['rainbo_name'];
$email_user = $_SESSION['rainbo_email'];

    if (isset($_POST['pseudo']) && isset($_POST['password'])){

            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $pseudo = $_POST['pseudo'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $lvl = $_POST['lvl'];
            $secteur = $_POST['secteur'];
            
            $query = "SELECT nom  FROM secteur WHERE id_secteur = '$secteur'";
             $q = $conn->query($query);
             while ($row = $q->fetch_assoc()) {
                 $secteur_nom = $row['nom'];
             }

            $query = "SELECT COUNT(pseudo) AS total FROM users WHERE pseudo = '$pseudo'";
            $q = $conn->query($query);
            while ($row = $q->fetch_assoc()) {
                $total = $row["total"];
            }

            $query = "SELECT id_personnel FROM personnel";
            $q = $conn->query($query);
            while ($row = $q->fetch_assoc()) {
                $id_personnel = $row["id_personnel"];
            }
            $id_personnel++;

//            echo $total.'<br/>';

            if ($total == 0) {

                if (strlen($pseudo) <= 100) {
//            echo $pseudo.'<br/>';
                    $password = hash('sha256', $password);
                    $ip = $_SERVER['REMOTE_ADDR'];
//                                $date_inscription = datetime("Y-m-d");
//            echo $password.'<br/>';
//            if($secteur == null)
//                $secteur = 0;
//            if($salle == null)
//                $salle = 0;

                    $sql = $conn->query("INSERT INTO users(id_perso, pseudo, password, email, lvl, secteur, ip, date)
                                                VALUES($id_personnel,'$pseudo', '$password', '$email', $lvl, $secteur, '$ip', SYSDATE())");

                   

//            echo 'id_person: '.$id_personnel.' '.gettype($id_personnel).'<br/>';
//            echo 'Nom: '.$nom.'<br/>';
//            echo 'Prenom: '.$prenom.'<br/>';
//            echo 'sql: '.$sql.'<br/>';
//            echo 'secteur: '.$secteur.'<br/>';
                    if ($sql) {
                        $mailler = new mailsenderclass();

                        $subject = "Creation Utilisateur";
                        $body = "Administrateur : "
                            .strtoupper($user)
                            ." a cree l\' utilisateur "
                            .strtoupper($pseudo)." le "
                            .date("d/m/Y"). " à "
                            .date("G:i")
                            ." dans le secteur : "
                            .strtoupper($secteur_nom)
                            ."<br/> <a href='campresjonlline.net'>Voir les details</a>";

                        $from= 'supergoal@campresjonlline.net';
                        $from_name='CAMPREJ EQUIEPEMENT';
                        $sql = $db->query("select * from users where (lvl = 5 or lvl = 6 )");
                        while($row = $sql->fetch()){
                            $to = $row['email'];
                            $mailler->mailsenderclass($to, $from, $from_name, $subject, $body);
                        }
                                                
                        $mailler->mailsenderclass($email_user, $from, $from_name, $subject, $body);
                        
//                                    echo $role_lvl.'<br/>';
//                                    echo gettype($role_lvl);
                        header('Location: nouveau_utilisateur.php?reg_err=success');
                    }
                } else header('Location: nouveau_utilisateur.php?reg_err=pseudo_lenght');
            } else header('Location: nouveau_utilisateur.php?reg_err=already');
    } else header('Location: nouveau_utilisateur.php');
?>