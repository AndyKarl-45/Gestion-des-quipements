<?php
include("first.php");
include('php/main_side_navbar.php');
?>

<?php

if(isset($_POST['submit_pointage'])!="")
{

    $id_pointage = $_POST['id_pointage'];
    $debut_manager  =$_POST['debut_manager'];
    $observation  = "heure d'arrivéé validée ".$debut_manager ;

    echo 'id '.$id_pointage.'<br/>';
    echo 'debut manager '.$debut_manager.'<br/>';
    echo 'observation '.$observation.'<br/>';
//

    try{


        // Create prepared statement
        $sql = "UPDATE pointage SET debut_manager=:debut_manager
                WHERE id_pointage=:id";
        $req = $db->prepare($sql);

        // Bind parameters to statement
        $req->bindParam(':debut_manager', $debut_manager);
        $req->bindParam(':id', $id_pointage);
        $req->execute();

        echo 'sql : '.$sql.'<br/>';

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
                window.location.href='--><?=$activite['option1_link']?>';
            </script>
            <?php
        }

    } catch(PDOException $e){
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }

}
?>
