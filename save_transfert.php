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
if(isset($_POST['submit'])!="")
{

    $auteur ="";
    $auteur =$_POST['auteur'];
    $destination =$_POST['destination'];
    $id_secteur = "";
    $montant  =$_POST['montant'];
    $date  = date("Y-m-d");
    $heure  = date("G:i");
    $motif  =$_POST['motif'];
    $secteur = "";

    $iResult = $db->query("SELECT * FROM users WHERE pseudo = '".$destination."'");

    while($data = $iResult->fetch()){

        $id_secteur = $data['secteur'];

        $query = "SELECT * from secteur WHERE id_secteur = $id_secteur";
        $q = $db->query($query);
        while($row = $q->fetch()) {
            $secteur = $row['nom'];
        }
    }

    $motif_oc = 'Transfert de '.$nom_user.' vers '.$destination.' ('.$secteur.')';


if($montant > $balance_boss)
    {
        ?>
        <script>
            window.location.href="<?=$comptabilite['option2_link']?>?witness=0";
        </script>
        <?php
    }else{

    try{
        // Create prepared statement
        $sql = "INSERT INTO transferts (date, montant, auteur, id_secteur, destination, motif)  
                VALUES (:date, :montant, :auteur, :id_secteur, :destination, :motif)";

//        echo $sql;
        $req = $db->prepare($sql);

        // Bind parameters to statement
        $req->bindParam(':date', $date);
        $req->bindParam(':montant', $montant);
        $req->bindParam(':auteur', $auteur);
        $req->bindParam(':id_secteur', $id_secteur);
        $req->bindParam(':destination', $destination);
        $req->bindParam(':motif', $motif);

        $req->execute();

        if($req)
        {
            ?>
            <script>
                window.location.href="<?=$comptabilite['option2_link']?>?witness=1";
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
                alert('Erreur.');
                window.location.href="<?=$comptabilite['option2_link']?>?witness=1";
            </script>
            <?php
        }

        $type_oc = 'sortie';
        $nature_oc = 'TRANSFERT';

        $sql = "INSERT INTO operations_compta (date_emis, heure_emis, type_oc, nature_oc, motif_oc, montant, auteur) 
                VALUES (:date, :heure, :type_oc, :nature_oc, :motif_oc, :montant, :auteur)";

//        echo $sql;
        $req = $db->prepare($sql);

        // Bind parameters to statement
        $req->bindParam(':date', $date);
        $req->bindParam(':heure', $heure);
        $req->bindParam(':montant', $montant);
        $req->bindParam(':type_oc', $type_oc);
        $req->bindParam(':nature_oc', $nature_oc);
        $req->bindParam(':motif_oc', $motif_oc);
        $req->bindParam(':auteur', $user);

        $req->execute();


        $type_oc = 'entree';
        $nature_oc = 'TRANSFERT';

        $sql = "INSERT INTO operations_compta (date_emis, heure_emis, type_oc, nature_oc, motif_oc, montant, auteur) 
                VALUES (:date, :heure, :type_oc, :nature_oc, :motif_oc, :montant, :auteur)";

//        echo $sql;
        $req = $db->prepare($sql);

        // Bind parameters to statement
        $req->bindParam(':date', $date);
        $req->bindParam(':heure', $heure);
        $req->bindParam(':montant', $montant);
        $req->bindParam(':type_oc', $type_oc);
        $req->bindParam(':nature_oc', $nature_oc);
        $req->bindParam(':motif_oc', $motif_oc);
        $req->bindParam(':auteur', $destination);

        $req->execute();

    } catch(PDOException $e){
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }

    }

}
?>
