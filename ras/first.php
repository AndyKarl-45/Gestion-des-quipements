<?php
include("php/dbconnect.php");
 include("php/db.php");
include("check_login.php");
global $siteName;
$siteName = " SYGES - RH ";
global $payDay;
global $monthPay;
$payDay = 0;

$query = "SELECT * FROM parametres WHERE id = 1" ;
$q = $db->query($query);
while($row = $q->fetch()) {
    $payDay = $row['payDay'];
    $monthPay = $row['month'];
}
 
//
setlocale(LC_TIME, "fr_FR");

$user = $_SESSION['rainbo_name'];

$id_perso = "";
$id_perso = $_SESSION['rainbo_id_perso'];

$nom_user = "";
$query = "SELECT * from personnel where id_personnel = $id_perso";
$q = $db->query($query);
while($row = $q->fetch()) {
    $nom_user = $row['prenom'] .' '.$row['nom'];
}

?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?=$siteName?></title>

<!--All modukes'Links-->
    <?php
    include("php/mainlinks.php");
    ?>

<!--Functions-->
    <?php
//    Function for date delais
        function dateDifference($start_date, $end_date)
    {
        // calulating the difference in timestamps
        $diff = strtotime($start_date) - strtotime($end_date);

        $start_y = date("Y",strtotime($start_date));
        $start_m  = date("m",strtotime($start_date));
        $start_d  = date("d",strtotime($start_date));

        $end_y = date("Y",strtotime($end_date));
        $end_m = date("m",strtotime($end_date));
        $end_d = date("d",strtotime($end_date));

        if($start_y == $end_y AND $start_m == $end_m AND $start_d > $end_d){
            return -1;
        }
        if($start_y == $end_y AND $start_m > $end_m){
            return -1;
        }
        if($start_y > $end_y){
            return -1;
        }

        // 1 day = 24 hours
        // 24 * 60 * 60 = 86400 seconds
        return ceil(abs($diff / 86400));
    }

//    Function which converts date from English to French

        function dateToFrench($date, $format){
            $english_days = array('Monday', 'Tuesday', 'Wednesday','Thursday','Friday', 'Saturday','Sunday');
            $french_days = array('Lundi', 'Mardi', 'Mercredi', 'jeudi', 'Vendredi', 'Samedi', 'Dimanche');
            $english_months = array('January', 'February', 'March','April','May', 'June','July','August', 'September','October', 'November', 'December');
            $french_months = array('Janvier', 'Février', 'Mars','Avril','Mai', 'Juin','Juillet','Aout', 'Septembre','Octobre', 'Novembre', 'Décembre');
            return str_replace($english_months, $french_months, str_replace($english_days, $french_days, date($format, strtotime($date))));
        }

        $day = date("d");
        $month = date("Y-m");

        if($day == ($payDay - 1) && $month != $monthPay){



            $prime = 0;
            $horaire_mensuel = 0;
            $sal_horaire = 0;
            $month = date("Y-m");
            $today = date("Y-m-d");
            $sanction = 0;
            $dette = 0;
            $salaire = 0;

            $query = "SELECT * FROM personnel";
            $q = $db->query($query);
            while($row = $q->fetch()) {
                $prime = 0;
                $sal_horaire = 0;

                $id_perso = $row['id_personnel'];
                $personnel = $row['nom'] . ' ' . $row['prenom'];
                $prime = $row['prime'];
                $sal_horaire = $row['sal_horaire'];

                $horaire_mensuel = 0;
                $query1 = "SELECT * FROM pointage WHERE id_perso = $id_perso AND month = '$month'";
                $q1 = $db->query($query1);
                while ($row1 = $q1->fetch()) {
                    $horaire_mensuel += $row1['duree_journee'];
                }

                $echelle = 0;
                $dette = 0;
                $statut = 0;
                $query3 = "SELECT * FROM credit WHERE nom = $id_perso AND modalite <> credit.statut";
                $q3 = $db->query($query3);
                while ($row3 = $q3->fetch()) {
                    $dette += $row3['montant'];
                    $echelle = $row3['modalite'];
                    $statut = $row3['statut'];
                }

                $sanction = 0;
                $query2 = "SELECT * FROM sanction WHERE id_personnel = $id_perso AND date_sanction LIKE '%$month%'";
                $q2 = $db->query($query2);
                while ($row2 = $q2->fetch()) {
                    $sanction += $row2['montant'];
                }

                $dettes = 0;
                if ($echelle != "" && $echelle != 0)
                    $dettes = $dette / $echelle;
                else
                    $dettes = $dette;

                $salaire = $prime + ($sal_horaire * $horaire_mensuel) - $sanction - $dettes;

                try {
                    // Create prepared statement
                    $sql = "INSERT INTO etat_salarial_mensuel (id_personnel, date, month, total_heure, taux_horaire, dette_total, prime, sanction, salaire) 
                            VALUES (:id_personnel, :date, :month, :total_heure, :taux_horaire, :dette_total, :prime, :sanction, :salaire)";
                    $req = $db->prepare($sql);

                    // Bind parameters to statement
                    $req->bindParam(':id_personnel', $id_perso);
                    $req->bindParam(':date', $today);
                    $req->bindParam(':month', $month);
                    $req->bindParam(':total_heure', $horaire_mensuel);
                    $req->bindParam(':taux_horaire', $sal_horaire);
                    $req->bindParam(':dette_total', $dettes);
                    $req->bindParam(':prime', $prime);
                    $req->bindParam(':sanction', $sanction);
                    $req->bindParam(':salaire', $salaire);

                    $req->execute();

                } catch (PDOException $e) {
                    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
                }

                if($dettes != 0){
                    $type = "DEDUCTION DE SALAIRE";
                    $modalite = 0;
                    $montant_dette = -1 * $dettes;
                    $etat = 1;
                    $observation = "Déduction du crédit sur salaire";

                    $sql = "INSERT INTO  credit (nom, type_conger, modalite, montant, etat, observation, month) 
                                VALUES (:id_perso,:type,:modalite,:salaire,:etat,:observation,:month)";
                    $req = $db->prepare($sql);

                    // Bind parameters to statement
                    $req->bindParam(':id_perso', $id_perso);
                    $req->bindParam(':type', $type);
                    $req->bindParam(':modalite', $modalite);
                    $req->bindParam(':salaire', $montant_dette);
                    $req->bindParam(':etat', $etat);
                    $req->bindParam(':observation', $observation);
                    $req->bindParam(':month', $month);

                    $req->execute();
                    }

                if ($salaire < 0) {
                    $type = "SALAIRE NÉGATIF";
                    $modalite = 5;
                    $montant_sal = -1 * $salaire;
                    $etat = 1;
                    $observation = "Salaire Négatif";

                    $sql = "INSERT INTO  credit (nom, type_conger, modalite, montant, etat, observation, month) 
                            VALUES (:id_perso,:type,:modalite,:salaire,:etat,:observation,:month)";
                    $req = $db->prepare($sql);

                    // Bind parameters to statement
                    $req->bindParam(':id_perso', $id_perso);
                    $req->bindParam(':type', $type);
                    $req->bindParam(':modalite', $modalite);
                    $req->bindParam(':salaire', $montant_sal);
                    $req->bindParam(':etat', $etat);
                    $req->bindParam(':observation', $observation);
                    $req->bindParam(':month', $month);

                    $req->execute();
//                    $sql = $conn->query("INSERT INTO  credit (nom, type_conger, modalite, montant, etat, observation, month)
//                        VALUES ($id_perso,'$type',$modalite,$salaire,$etat,'$observation','$month') ");
                }

                $sql = $conn->query("UPDATE parametres SET month='$month' WHERE id=1");

                $statut ++;
                $sql = $conn->query("UPDATE credit SET statut= $statut WHERE nom =$id_perso");

            }

        }
    ?>





</head>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
</script>

<?php
include ('php/main_top_navbar.php');
?>