<?php
include("first.php");
include('php/main_side_navbar.php');
?>

<?php

if(isset($_POST['submit_pointage'])!="")
{

    $id_pointage = $_POST['id_pointage'];
    $debut_manager  =$_POST['debut_manager'];
    $fin_manager  =$_POST['fin_manager'];
//    $fin_manager  = $fin_systeme;

//    echo 'id '.$id_pointage.'<br/>';
//    echo 'debut user '.$debut_utilisateur.'<br/>';
//    echo 'fin user '.$fin_utilisateur.'<br/>';
//    echo 'fin systeme '.$fin_systeme.'<br/>';

    function dureeJournee( $debut, $fin){

        if($debut != "") {
            $start_h = date("G", strtotime($debut));
            $start_m = date("i", strtotime($debut));
        }else{
            $start_h = 0;
            $start_m = 0;
        }

        if($fin != ""){
            $end_h = date("G", strtotime($fin));
            $end_m = date("i", strtotime($fin));
        }else{
            $time_now = TIME();
            $end_h = date("G", strtotime($time_now));
            $end_m = date("i", strtotime($time_now));
        }

        $start = ($start_h*60) + $start_m;
        $end = ($end_h*60) + $end_m;
//
//        echo 'star '.$start.'<br/>';
//        echo 'end '.$end.'<br/>';

        $duree_heure  = ($end - $start)/60 ;

        return $duree_heure;
    }

    $duree_journee = dureeJournee($debut_manager,$fin_manager);

    if($duree_journee > 8)
        $duree_journee = 8;


//    echo 'Durée '.$duree_journee.'<br/>';

    $observation = "Durée validée par le manager ".$duree_journee;

    try{


        // Create prepared statement
        $sql = "UPDATE pointage SET fin_manager=:fin_manager, observation=:observation
                WHERE id_pointage=:id";
        $req = $db->prepare($sql);

        // Bind parameters to statement
        $req->bindParam(':fin_manager', $fin_manager);
        $req->bindParam(':observation', $observation);
        $req->bindParam(':id', $id_pointage);

        $req->execute();
        //echo $nom_pays.'<br/>';

        if($req)
        {
            ?>
            <script>
                alert('Pointage a été bien enregistrée.');
                window.location.href='<?=$activite['option1_link']?>';
            </script>
            <?php
        }

        else
        {
            ?>
            <script>
                alert('Pointage failed ...');
                window.location.href='<?=$activite['option1_link']?>';
            </script>
            <?php
        }

    } catch(PDOException $e){
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }

}
?>
