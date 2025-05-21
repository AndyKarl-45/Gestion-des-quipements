<?php
//    session_start();
    include 'php/dbconnect.php';

    if(isset($_POST['username']) && isset($_POST['password'])){

        $pseudo = $_POST['username'];
        $password = $_POST['password'];

//        echo $pseudo.'<br/>';
//        echo $password.'<br/>';

        $query  = "SELECT count(*) as total from users WHERE pseudo='$pseudo'";
        $q = $conn->query($query);
        while($row = $q->fetch_assoc())
        {
            $total = $row["total"];
        }

//        echo $total;
        $statut = "D";
        if($total == 1){
            $query  = "SELECT * from users WHERE pseudo='$pseudo'";
            $q = $conn->query($query);
            while($row = $q->fetch_assoc())
            {
                $true_password = $row["password"];
                $lvl = $row['lvl'];
                $id_perso = $row['id_perso'];
                $secteur_user = $row['secteur'];
                $salle_user = $row['salle'];
                $statut = $row['statut'];
                $email = $row['email'];
//                echo $lvl.'<br/>';
            }
//            global $lvl;
            $password = hash('sha256', $password);
//            echo 'True PW :'.$true_password.'<br/>';
//            echo 'PW :'.$password.'<br/>';

            if ($true_password === $password){
                if($statut === "A"){

                    $_SESSION['rainbo_name'] = $pseudo;
                    $_SESSION['rainbo_lvl'] = $lvl;
                    $_SESSION['rainbo_id_perso'] = $id_perso;
                    $_SESSION['rainbo_secteur'] = $secteur_user;
                    $_SESSION['rainbo_salle'] = $salle_user;
                    $_SESSION['rainbo_email'] = $email;

    //                $_SESSION['msg'] = 'bienvenue '.$pseudo.' !';
    //                echo $lvl;
                    header('Location: index.php');
                }else header('Location: connexion.php?login_err=desactived');
            }else header('Location: connexion.php?login_err=password');
        }else header('Location: connexion.php?login_err=already');
    } else header('Location: connexion.php');
?>
