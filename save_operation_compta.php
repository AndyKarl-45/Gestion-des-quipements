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
if(isset($_POST['submit_oc'])!="")
{

//    $id_pointage = $_POST['id'];
    $date_emis  = date("Y-m-d");
    $heure_emis  = date("G:i");;
    $type_oc  =$_POST['type_oc'];
    $nature_oc  =$_POST['nature_oc'];
    $motif_oc  =$_POST['motif_oc'];
    $montant  =$_POST['montant'];
//    $debut_manager  = $debut_utilisateur;



//    echo 'user '.$utilisateur.'<br/>';
//    echo 'date '.$date_emission.'<br/>';
//    echo 'debut user '.$debut_utilisateur.'<br/>';
//    echo 'debut systeme '.$debut_systeme.'<br/>';


if($type_oc == "sortie" && $montant > $balance_boss)
{
    ?>
    <script>
        window.location.href="<?=$comptabilite['option1_link']?>?witness=0";
    </script>
    <?php
}else{
    try{
        // Create prepared statement
        $sql = "INSERT INTO operations_compta (date_emis, heure_emis, type_oc, nature_oc, motif_oc, montant, auteur) 
                VALUES (:date_emis, :heure_emis, :type_oc, :nature_oc, :motif_oc, :montant, :auteur)";
        $req = $db->prepare($sql);

        // Bind parameters to statement
        $req->bindParam(':date_emis', $date_emis);
        $req->bindParam(':heure_emis', $heure_emis);
        $req->bindParam(':type_oc', $type_oc);
        $req->bindParam(':nature_oc', $nature_oc);
        $req->bindParam(':motif_oc', $motif_oc);
        $req->bindParam(':montant', $montant);
        $req->bindParam(':auteur', $user);

        $req->execute();
        //echo $nom_pays.'<br/>';

        if($req)
        {
            ?>
            <script>
                alert('Operation bien enregistrée.');
                window.location.href="<?=$comptabilite['option1_link']?>";
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
                alert('Erreur.');
                window.location.href="<?=$comptabilite['option1_link']?>";
            </script>
            <?php
        }

    } catch(PDOException $e){
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }
}
}
?>
