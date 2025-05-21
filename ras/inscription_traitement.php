<?php
    include 'first.php';

    if (isset($_POST['id_person']) && isset($_POST['password'])){

            $id_person = $_POST['id_person'];
            $pseudo = $_POST['pseudo'];
            $secteur = $_POST['secteur'];
            $password = $_POST['password'];
            $lvl_user = $_POST['lvl'];
//            $password_retype = $_POST['password_retype'];
            $statut = "A";
            if($secteur == "")
                $secteur = 0;



            $query = "SELECT COUNT(pseudo) AS total FROM users WHERE pseudo = '$pseudo'";
            $q = $conn->query($query);
            while ($row = $q->fetch_assoc()) {
                $total = $row["total"];
            }
            // echo $total.'<br/>';

            if ($total == 0) {

                if (strlen($pseudo) <= 100) {
            echo $pseudo.'<br/>';
                    $password = hash('sha256', $password);
                    $ip = $_SERVER['REMOTE_ADDR'];
//                                $date_inscription = datetime("Y-m-d");
            // echo $password.'<br/>';
                    $sql = $conn->query("INSERT INTO users(id_perso, pseudo, password, lvl, secteur, ip, date, statut)
                                                VALUES($id_person,'$pseudo', '$password', $lvl_user, $secteur,'$ip', SYSDATE(), '$statut')");

// echo 'secteur: '.$secteur.' '.gettype($secteur).'<br/>';
            // echo 'id_person: '.$id_person.' '.gettype($id_person).'<br/>';
            // echo 'sql: '.$sql.'<br/>';
                    if ($sql) {
//                                    echo $role_lvl.'<br/>';
//                                    echo gettype($role_lvl);
                        header('Location: nouveau_utilisateur.php?reg_err=success');
                    }
                } else header('Location: nouveau_utilisateur.php?reg_err=pseudo_lenght');
            } else header('Location: nouveau_utilisateur.php?reg_err=already');
    } else header('Location: nouveau_utilisateur.php');
?>