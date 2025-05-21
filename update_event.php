<?php
    include ('first.php');
include('php/agenda_side_navbar.php');
?>

<?php

if($_POST)
{
    $id = $_POST['id'];
    $event_nom = $_POST['event_nom'];
    $type_event = strtoupper($_POST['type_event']);
    $date_debut = $_POST['date_debut_actuelle'];
    $date_fin = $_POST['date_fin_actuelle'];

//    echo 'debut actuel: '.$date_debut.'<br/>';
//    echo 'fin actuel: '.$date_fin.'<br/>';

    if($_POST['date_debut'] != ""){
        $date_debut = $_POST['date_debut'];
    }
    if($_POST['date_fin'] != ""){
        $date_fin = $_POST['date_fin'];
    }

//    echo $id.'<br/>';
//    echo $event_nom.'<br/>';
//    echo 'debut : '.$date_debut.'<br/>';
//    echo 'fin : '.$date_fin.'<br/>';
//
    $event_description = $_POST['event_description'];
//    echo 'Description : '.$event_description.'<br/>';

//    $sql = $conn->query("UPDATE agenda SET event_nom='$event_nom', event_description='$event_description', date_debut='$date_debut', date_fin='$date_fin', type_event='$type_event'
//                                    WHERE id_agenda='$id'");

    try{
        // Create prepared statement
        $sql = "UPDATE agenda SET event_nom=:event_nom, event_description=:event_description, date_debut=:date_debut, date_fin=:date_fin, type_event=:type_event
                                    WHERE id_agenda=:id";
        $req = $db->prepare($sql);

// Bind parameters to statement
        $req->bindParam(':event_nom', $event_nom);
        $req->bindParam(':event_description', $event_description);
        $req->bindParam(':date_debut', $date_debut);
        $req->bindParam(':date_fin', $date_fin);
        $req->bindParam(':type_event', $type_event);
        $req->bindParam(':id', $id);

        $req->execute();

        echo '<script>
                window.location.href=\'details_event.php?id='.$id.'witness=1\';
            </script>';

    } catch(PDOException $e){
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }
}
?>
