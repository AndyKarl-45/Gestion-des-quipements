

<?php
include("first.php");
include('php/main_side_navbar.php');
?>

<?php
$id=$_REQUEST['id'];

$query  = "SELECT * from agenda where id_agenda='".$id."'";
$q = $conn->query($query);
while($row = $q->fetch_assoc())
{
    $event_nom = $row['event_nom'];
    $redacteur = $row['redacteur'];
    $event_description = $row['event_description'];
    $date_debut = $row['date_debut'];
    $date_fin = $row['date_fin'];
    $type_event = $row['type_event'];
    $prix = $row['prix'];
    $salle = $row['salle'];
    $sql = $db->query("SELECT * FROM salles WHERE id_salles = $salle");
    while($row1 = $sql->fetch()){
        $salle = $row1['nom'];
    }

    ?>
    <div id="layoutSidenav_content">
        <main>
            <fieldset class="container-fluid">
                <h1 class="mt-4">DÉTAILS ÉVÈNEMENT
                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups" style="float: right;">
                        <div class="btn-group mr-2" role="group" aria-label="First group">
                            <?php
                            if($redacteur == strtoupper($user) OR $redacteur == $user)
                                echo '<a class="btn btn-primary" href="modifier_event.php?id=' . $id . '" style="float: right; padding-top: 10px; padding-bottom: 10px; margin-right: 20px"><i class="fa fa-pencil-alt"></i> Modifier</a>';
                            ?>
                        </div>
                        <div class="btn-group mr-2" role="group" aria-label="Second group">
                            <a href="agenda.php" class="btn btn-primary" style="float: right; padding-top: 10px; padding-bottom: 10px; margin-right: 20px"><i class="fas fa-angle-double-left"></i> Retour</a>
                        </div>
                    </div>
                </h1>

                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme <?=strtoupper($user);?>, il est <?=date("G:i");?> en ce jour du <?=dateToFrench("now","l j F Y");?>.
                    </li>
                </ol>

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-info"></i>
                                <b>Informations Primaires</b>
                            </div>

                            <div class="well bs-component">
                                <form class="form-horizontal" action="#" method="POST">
                                    <fieldset>
                                        <div class="table-responsive">
                                            <form>
                                                <table class="table table-bordered table-hover table-condensed" id="myTable">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <label>Titre de l'évenement </label>
                                                                <div class="col">
                                                                    <input type="text"  value="<?=$event_nom;?>"  name="event_nom" style="width:75%" readonly>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <label>Type d'évènement</label>
                                                                <div class="col">
                                                                    <input type="text"  value="<?=$type_event;?>"  name="type_event" style="width:75%" readonly>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <?php
                                                                $hour_s = date("H:i",strtotime($date_debut));
                                                                $date_s = date("d-m-Y",strtotime($date_debut));
                                                                ?>
                                                                <label>Date de début : <?=$date_s;?> Heure : <?=$hour_s;?></label>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $hour_e = date("H:i",strtotime($date_fin));
                                                                $date_e = date("d-m-Y",strtotime($date_fin));
                                                                ?>
                                                                <label>Date de fin : <?=$date_e;?> Heure : <?=$hour_e;?></label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label>Salle</label>
                                                                <div class="col">
                                                                    <input value="<?=$salle;?>" style="width:75%" disabled />
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <label>Coût</label>
                                                                <div class="col">
                                                                    <input value="<?=number_format($prix);?>" style="width:75%" disabled/>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table class="table table-bordered table-hover table-condensed" id="myTable">
                                                    <tbody
                                                    <tr>
                                                        <td>
                                                            <label>Description sur l'évènement </label>
                                                            <div class="col">
                                                                <textarea class="col-sm-12" name="event_description" readonly><?=$event_description;?></textarea>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                        </div>
                                    </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups" style="float: right;">
                        <div class="btn-group mr-2" role="group" aria-label="First group">
                            <?php
                            if($redacteur == strtoupper($user) OR $redacteur == $user)
                                echo '<a class="btn btn-primary" href="modifier_event.php?id=' . $id . '" style="float: right; padding-top: 10px; padding-bottom: 10px; margin-right: 20px"><i class="fa fa-pencil-alt"></i> Modifier</a>';
                            ?>
                        </div>
                        <div class="btn-group mr-2" role="group" aria-label="Second group">
                            <a href="agenda.php" class="btn btn-primary" style="float: right; padding-top: 10px; padding-bottom: 10px; margin-right: 20px"><i class="fas fa-angle-double-left"></i> Retour</a>
                        </div>
                    </div>
                    </form>
                </div>
    </div>
    </div>
    </div>
    </fieldset>
    </main>
    </div>


    <!--Modal Operation Notification-->
    <?php
    if (isset($_GET['witness'])){
        $witness = $_GET['witness'];

        switch ($witness){
            case '1';
                ?>
                <script>
                    Swal.fire(
                        'Succès',
                        'Opération effectuée avec succès !',
                        'success'
                    )
                </script>
                <?php
                break;
            case '-1';
                ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Une erreur s\'est produite !',
                        footer: 'Reéssayez encore'
                    })
                </script>
                <?php
                break;

        }
    }
    ?>


    <!-- FOR DataTable -->
    <script>
        {
            $(document).ready(function()
            {
                $('#myTable').DataTable();
            });
        }
    </script>

    <!-- this function is for modal -->
    <script>
        $(document).ready(function()
        {
            $("#myBtn").click(function()
            {
                $("#myModal").modal();
            });
        });
    </script>

    <!--Show autor button modify-->
    <script>
        function auteurShow(auteur) {
            Swal.fire('Seul "'+ auteur +'" peut mener cette action');
        }
    </script>

    <?php
}

include('foot.php');
?>