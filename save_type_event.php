<?php


if(isset($_POST['submit'])!="" AND isset($_POST['create_type_event'])!="")
{
    $type = strtoupper($_POST['create_type_event']);

//    $sql = $conn->query("INSERT INTO type_event(type_event)
//                                VALUES('$type')");

    try{
        // Create prepared statement
        $sql = "INSERT INTO type_event (type_event)
                                VALUES(:type_event)";
        $req = $db->prepare($sql);

// Bind parameters to statement
        $req->bindParam(':type_event', $type);

        $req->execute();
//echo $nom_pays.'<br/>';

        if($req)
        {
            ?>
            <script>
                alert('Ajouté avec succès.');
            </script>
            <?php
        }

        else
        {
            ?>
            <script>
                alert('Erreur lors de l\'ajout.');
            </script>
            <?php
        }

    } catch(PDOException $e){
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }
}
?>
