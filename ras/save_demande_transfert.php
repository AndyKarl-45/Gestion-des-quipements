<?php
include("first.php");
include('php/main_side_navbar.php');

?>

<?php
if(isset($_POST['submit'])!="")
{


    $auteur = $_POST['auteur'];
    $username = $user;
    $date  = date("Y-m-d");
    $motif  =$_POST['motif'];
    $montant  =$_POST['montant'];

//    echo 'user '.$utilisateur.'<br/>';
//    echo 'date '.$date_emission.'<br/>';
//    echo 'debut user '.$debut_utilisateur.'<br/>';
//    echo 'debut systeme '.$debut_systeme.'<br/>';

    try{
        // Create prepared statement
        $sql = "INSERT INTO demandes_transferts (auteur, montant_voulu, motif, date_e, username) 
                VALUES (:auteur,:montant_v,:motif,:date,:username)";

        $req = $db->prepare($sql);

        // Bind parameters to statement
        $req->bindParam(':auteur', $auteur);
        $req->bindParam(':montant_v', $montant);
        $req->bindParam(':motif', $motif);
        $req->bindParam(':date', $date);
        $req->bindParam(':username', $username);

        $req->execute();
        //echo $nom_pays.'<br/>';

        if($req)
        {
            ?>
            <script>
                alert('Demande bien enregistrée.');
                window.location.href="<?=$comptabilite['option4_link']?>";
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
                alert('Erreur.');
                window.location.href="<?=$comptabilite['option4_link']?>";
            </script>
            <?php
        }

    } catch(PDOException $e){
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }
}
?>
