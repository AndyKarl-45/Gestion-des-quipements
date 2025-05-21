<?php
include ('first.php');
?>

<?php

if((isset($_POST['add_event'])!=""))
{
    $event_nom = $_POST['event_nom'];
    $redacteur = $_POST['redacteur'];
    $salle = $_POST['salle'];
    $type_event = strtoupper($_POST['type_event']);
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $event_description = $_POST['event_description'];
    $statut = "N";
    $prix = $_POST['prix'];

//    echo 'nom: '.$event_nom.'<br/>';
//    echo 'auteur: '.$redacteur.'<br/>';
//    echo 'type: '.$type_event.'<br/>';
//    echo 'desc: '.$event_description.'<br/>';
//    echo 'start : '.$date_debut.'<br/>';
//    echo 'fin : '.$date_fin.'<br/>';
//    echo 'Statut: '.$statut.'<br/>';

//    $sql = $conn->query("INSERT INTO agenda(redacteur, event_nom, event_description, date_debut, date_fin, statut, type_event)
//                                    VALUES('$redacteur','$event_nom','$event_description','$date_debut','$date_fin','$statut','$type_event')");



    try{
        // Create prepared statement
        $sql = "INSERT INTO agenda(redacteur, event_nom, event_description, date_debut, date_fin, statut, type_event, salle, prix)
                                    VALUES(:redacteur,:event_nom,:event_description,:date_debut,:date_fin,:statut,:type_event, :salle, :prix)";
        $req = $db->prepare($sql);

// Bind parameters to statement
        $req->bindParam(':redacteur', $redacteur);
        $req->bindParam(':event_nom', $event_nom);
        $req->bindParam(':event_description', $event_description);
        $req->bindParam(':date_debut', $date_debut);
        $req->bindParam(':date_fin', $date_fin);
        $req->bindParam(':statut', $statut);
        $req->bindParam(':type_event', $type_event);
        $req->bindParam(':salle', $salle);
        $req->bindParam(':prix', $prix);

        $req->execute();

        if($req)
        {
            ?>
            <script>
                window.location.href='agenda.php?witness=1';
            </script>
            <?php
        }

        else
        {
            ?>
            <script>
                window.location.href='agenda.php?witness=-1';
            </script>
            <?php
        }

    } catch(PDOException $e){
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }
}
?>
