<?php
include("first.php");
include('php/main_side_navbar.php');

$total_entree=0;
$total_sortie=0;

$query = "SELECT * FROM operations_compta WHERE auteur = '$user'";

$q = $db->query($query);
while($row = $q->fetch()) {
    $type_oc = $row['type_oc'];
    $montant = $row['montant'];
    if ($type_oc == "entree") {
        $total_entree += $montant;
    }
    if ($type_oc == "sortie") {
        $total_sortie += $montant;
    }
}

$balance_boss = $total_entree - $total_sortie;
?>

<?php
if(isset($_POST['submit_traiter'])!="")
{

    $montant_p  =$_POST['montant_p'];
    $id_d  =$_POST['id_demande'];
    $date  = date("Y-m-d");
    $username  = $_POST['username'];

//    echo 'balance '.$balance_boss.'<br/>';
//    echo 'date '.$date_emission.'<br/>';
//    echo 'debut user '.$debut_utilisateur.'<br/>';
//    echo 'debut systeme '.$debut_systeme.'<br/>';

if($montant_p > $balance_boss)
{
    ?>
    <script>
        window.location.href="<?=$comptabilite['option4_link']?>?witness=0";
    </script>
    <?php
}else{

    try{
        // Create prepared statement
        $sql = "UPDATE demandes_transferts SET montant_percu =:montant_p, date_r=:date
                WHERE id =:id_d";

        $req = $db->prepare($sql);

        // Bind parameters to statement
        $req->bindParam(':montant_p', $montant_p);
        $req->bindParam(':date', $date);
        $req->bindParam(':id_d', $id_d);

        $req->execute();
        //echo $nom_pays.'<br/>';

        $type_oc = 'entree';
        $nature_oc = 'TRANSFERT';
        $motif_oc = 'Transfert de '.$nom_user.' à la demande vers '.$username;

        $sql = "INSERT INTO operations_compta (date_emis, type_oc, nature_oc, motif_oc, montant, auteur) 
                VALUES (:date,:type_oc, :nature_oc, :motif_oc, :montant, :auteur)";

//        echo $sql;
        $req = $db->prepare($sql);

        // Bind parameters to statement
        $req->bindParam(':date', $date);
        $req->bindParam(':montant', $montant_p);
        $req->bindParam(':type_oc', $type_oc);
        $req->bindParam(':nature_oc', $nature_oc);
        $req->bindParam(':motif_oc', $motif_oc);
        $req->bindParam(':auteur', $username);

        $req->execute();


        $type_oc = 'sortie';
        $nature_oc = 'TRANSFERT';
        $motif_oc = 'Transfert de '.$nom_user.' à la demande vers '.$username;

        $sql = "INSERT INTO operations_compta (date_emis, type_oc, nature_oc, motif_oc, montant, auteur) 
                VALUES (:date,:type_oc, :nature_oc, :motif_oc, :montant, :auteur)";

//        echo $sql;
        $req = $db->prepare($sql);

        // Bind parameters to statement
        $req->bindParam(':date', $date);
        $req->bindParam(':montant', $montant_p);
        $req->bindParam(':type_oc', $type_oc);
        $req->bindParam(':nature_oc', $nature_oc);
        $req->bindParam(':motif_oc', $motif_oc);
        $req->bindParam(':auteur', $user);

        $req->execute();

        if($req)
        {
            ?>
            <script>
                window.location.href="<?=$comptabilite['option4_link']?>?witness=1";
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
                window.location.href="<?=$comptabilite['option4_link']?>?witness=-1";
            </script>
            <?php
        }

    } catch(PDOException $e){
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }
}
}
?>
