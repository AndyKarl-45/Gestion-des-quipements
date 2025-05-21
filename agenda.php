<?php
include('first.php');
include('php/main_side_navbar.php');
include("save_type_event.php");
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">AGENDA</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">
                    Hello M/Mme, il est <?=date("G:i");?> en ce jour du <?=dateToFrench("now","l j F Y");?>.
                </li>
            </ol>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-scroll"></i>
                            <b>Liste des services</b>
                            <a class="btn btn-primary" href="#addNew" style="float: right"><i class="fas fa-plus"></i> Nouveau Service</a>
                        </div>
                        <div class="card-body">
                            <div class="well bs-component">
                                <form class="form-horizontal">
                                    <fieldset>
                                        <div class="table-responsive">
                                            <form method="post" action="" >
                                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                    <tr class="bg-primary">
                                                        <th><p align="center">Titre</p></th>
                                                        <th><p align="center">Début</p></th>
                                                        <th><p align="center">Fin</p></th>
                                                        <th><p align="center">Redacteur</p></th>
                                                        <th><p align="center">Salle</p></th>
                                                        <th><p align="center">Coût</p></th>
                                                        <th><p align="center">Action</p></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    if($lvl == 3)
                                                        $query = "SELECT * FROM agenda WHERE salle = $id_salle_user";
                                                    else
                                                        $query = "SELECT * FROM agenda";

                                                    $q = $db->query($query);
                                                    while($row = $q->fetch()) {
                                                        $id = $row['id_agenda'];
                                                        $titre = $row['event_nom'];
                                                        $date_debut = $row['date_debut'];
                                                        $date_fin = $row['date_fin'];
                                                        $redacteur = $row['redacteur'];
                                                        $event_description = $row['event_description'];
                                                        $statut = $row['statut'];
                                                        $salle = $row['salle'];
                                                        $prix = $row['prix'];


                                                        if(!empty($salle)){
                                                            $iResult = $db->query("SELECT * FROM salles WHERE id_salles = ".$salle);
                                                            while($data = $iResult->fetch()){
                                                                $salle = $data['nom'];
                                                            }
                                                        }else{
                                                            $salle = "N/A";
                                                        }


                                                        $hour_s = date("H:i",strtotime($date_debut));
                                                        $date_s = date("d-m-Y",strtotime($date_debut));

                                                        $hour_e = date("H:i",strtotime($date_fin));
                                                        $date_e = date("d-m-Y",strtotime($date_fin));

//                                        if($statut == "Cloturer"){
//                                            $action = '<button type="button" class="btn btn-outline-success" >Cloturé</button>';
//                                        }elseif ($statut == "Classer"){
//                                            $action = '<button type="button" class="btn btn-secondary btn-sm" >Classé</button>';
//                                        }

                                                        $style = "default";
                                                        $dateDiff = "";
                                                        $delais = "$dateDiff";

                                                        if($date_debut != ""){
                                                            // start date
                                                            $start_date = date("Y-m-d");

                                                            // end date
                                                            //$end_date = $delais_traitement;

                                                            // call dateDifference() function to find the number of days between two dates
                                                            $dateDiff = dateDifference($start_date, date("Y-m-d",strtotime($date_fin)));
                                                            $delais = $dateDiff.' Jour.s';
                                                            if (0 < $dateDiff AND $dateDiff < 8)
                                                                $style = "table-warning";

                                                            if (1 < $dateDiff AND $dateDiff < 8)
                                                                $delais = $dateDiff.' Jour.s';

                                                            if ($dateDiff > 29)
                                                                $style = "table-success";

                                                            if (6 < $dateDiff && $dateDiff < 30)
                                                                $style = "table-warning";

                                                            if ($dateDiff < 8)
                                                                $style = "table-danger";

                                                            if ($dateDiff > 0)
                                                                if($statut == "D")
                                                                    $style = "table-success";

                                                            if ($dateDiff == 0)
                                                                if($statut == "N")
                                                                    $style = "table-danger";

                                                            if ($dateDiff == 0)
                                                                if($statut == "D")
                                                                    $style = "table-success";

                                                            if ($dateDiff < 1)
                                                                if($statut == "D")
                                                                    $style = "table-success";

                                                            if ($dateDiff > 0)
                                                                if($statut == "D")
                                                                    $delais = 'honoré !';

                                                            if ($dateDiff < 0)
                                                                if($statut == "D")
                                                                    $delais = 'honoré !';

                                                            if ($dateDiff < 1)
                                                                if($statut == "N")
                                                                    $style = "table-danger";

                                                            if ($dateDiff == 0)
                                                                if($statut == "N")
                                                                    $delais = 'Aujourd\'hui !';

                                                            if ($dateDiff < 0)
                                                                if($statut == "N")
                                                                    $delais = 'dépassé !';
                                                        }


                                                        if($redacteur == strtoupper($user) OR $redacteur == $user)
                                                            $action = '<a class="btn btn-primary" href="modifier_event.php?id='.$id.'"><i class="fa fa-pencil-alt"></i></a>||<a class="btn btn-primary" href="done_event.php?id='.$id.'"><i class="fa fa-check"></i></a>';

                                                        if($redacteur != strtoupper($user) AND $redacteur != $user)
                                                            $action = '<a class="btn btn-primary" href="details_event.php?id='.$id.'"><i class="fa fa-eye"></i></a>';

                                                        if($redacteur == strtoupper($user) OR $redacteur == $user)
                                                            if($delais == "honoré !")
                                                                $action = '<a class="btn btn-success" href="#"><i class="fa fa-handshake"></i></a>';

                                                        if($redacteur != strtoupper($user) AND $redacteur != $user)
                                                            if($delais == "honoré !")
                                                                $action = '<a class="btn btn-success" href="#"><i class="fa fa-handshake"></i></a>';

                                                        if($redacteur == strtoupper($user) OR $redacteur == $user)
                                                            if($delais == "dépassé !")
                                                                $action = '<a class="btn btn-danger" href="modifier_event.php?id=' . $id . '"><i class="fa fa-pencil-alt"></i></a>||<a class="btn btn-danger" href="done_event.php?id=' . $id . '"><i class="fa fa-check"></i></a>';

                                                        if($redacteur != strtoupper($user) AND $redacteur != $user)
                                                            if($delais == "dépassé !")
                                                                $action = '<a class="btn btn-danger" href="details_event.php?id=' . $id . '"><i class="fa fa-eye"></i></a>';


                                                        if($redacteur == strtoupper($user) OR $redacteur == $user)
                                                            if($delais == 'Aujourd\'hui !')
                                                                $action = '<a class="btn btn-info" href="modifier_event.php?id=' . $id . '"><i class="fa fa-pencil-alt"></i></a>||<a class="btn btn-info" href="done_event.php?id=' . $id . '"><i class="fa fa-check"></i></a>';

                                                        if($redacteur != strtoupper($user) AND $redacteur != $user)
                                                            if($delais == 'Aujourd\'hui !')
                                                                $action = '<a class="btn btn-info" href="details_event.php?id=' . $id . '"><i class="fa fa-eye"></i></a>';


                                                        if($delais == 'Aujourd\'hui !')
                                                            $style = "table-danger";


//                                        if($delais == "honoré !")
//                                            $action = '<a class="btn btn-success" href="#"><i class="fa fa-handshake"></i></a>';
//                                        elseif($delais == "dépassé !") {
//                                            if ($redacteur == strtoupper($user) OR $redacteur == $user)
//                                                $action = '<a class="btn btn-danger" href="modifier_event.php?id=' . $id . '"><i class="fa fa-pencil-alt"></i></a>||<a class="btn btn-danger" href="done_event.php?id=' . $id . '"><i class="fa fa-check"></i></a>';
//                                            else
//                                                $action = '<a class="btn btn-danger" href="details_event.php?id=' . $id . '"><i class="fa fa-eye"></i></a>';
//                                        }



                                                        ?>

                                                        <tr>

                                                            <input name="id_agenda" type="hidden" value="<?php echo $row['id_agenda'];?>" />
                                                            <td align="center"><a href="details_event.php?id=<?php echo $row['id_agenda']; ?>" title="Détails"><i class="fas fa-bullhorn"></i> <?= $titre; ?></a></td>
                                                            <td align="center" class="<?=$style;?>"><?=$date_s;?> (<?=$hour_s;?>) <br/> Délais <?= $delais;?></td>
                                                            <td align="center" class="<?=$style;?>"><?=$date_e;?> (<?=$hour_e;?>)</td>
                                                            <td align="center"><?= strtoupper($redacteur); ?></td>
                                                            <td align="center"><?= strtoupper($salle); ?></td>
                                                            <td align="center"><?= number_format($prix); ?></td>
                                                            <td align="center" width="200">
                                                                <?php
                                                                echo $action;
                                                                ?>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                    </tbody>

                                                    <tr class="bg-primary">
                                                        <th><p align="center">Titre</p></th>
                                                        <th><p align="center">Début</p></th>
                                                        <th><p align="center">Fin</p></th>
                                                        <th><p align="center">Redacteur</p></th>
                                                        <th><p align="center">Salle</p></th>
                                                        <th><p align="center">Coût</p></th>
                                                        <th><p align="center">Action</p></th>
                                                    </tr>
                                                </table>
                                            </form>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                        <div class="card-footer">

                        </div>
                    </div>
                </div>
            </div>

            <!--        Ajouter Agenda  -->
            <div class="row" id="addNew">
                <div class="col-xl-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="	far fa-clipboard"></i>
                            <b>Nouveau Service</b>
                        </div>
                        <div class="well bs-component">
                            <form class="form-horizontal" action="save_event.php" method="POST" enctype="multipart/form-data">
                                <fieldset>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-condensed" id="myTable">
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <label>Nom du service </label>
                                                    <div class="col">
                                                        <input type="text" name="event_nom" style="width:75%" required>
                                                    </div>
                                                </td>

                                                <?php
                                                echo '<input type="hidden" name="redacteur" style="width:75%" class="form-control form-control-lg" value="'.$user.'">';
                                                ?>

                                                <td>
                                                    <label>Type de service</label>
                                                    <button type="button" data-toggle="modal" data-target="#ajouterType"  style="background-color: transparent">
                                                        <i class="fa fa-plus-square" aria-hidden="true"></i>
                                                    </button>
                                                    <div class="col">
                                                        <select name="type_event" style="width:75%" required>
                                                            <option value="" selected="selected">Selectionner</option>
                                                            <?php
                                                            $iResult = $db->query('SELECT * FROM type_event');
                                                            while($data = $iResult->fetch()){
                                                                $type = $data['type_event'];
                                                                echo '<option value ="'.$type.'">';
                                                                echo $type;
                                                                echo '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <label>Coût</label>
                                                    <div class="col">
                                                        <input type="number" name="prix" style="width:75%">
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-bordered table-hover table-condensed" id="myTable">
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <label>Salle</label>
                                                    <div class="col">
                                                        <select name="salle" style="width:75%">
                                                            <option value="" selected="selected">Selectionner</option>
                                                            <?php
                                                            $iResult = $db->query('SELECT * FROM salles');
                                                            while($data = $iResult->fetch()){
                                                                $type = $data['id_salles'];
                                                                echo '<option value ="'.$type.'">';
                                                                echo $data['nom'];
                                                                echo '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <label>Date de début </label>
                                                    <div class="col">
                                                        <input type="datetime-local" name="date_debut" style="width:75%" required>
                                                    </div>
                                                </td>
                                                <td>
                                                    <label>Date de fin </label>
                                                    <div class="col">
                                                        <input type="datetime-local" name="date_fin" style="width:75%" required>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-bordered table-hover table-condensed" id="myTable">
                                            <tbody
                                            <tr>
                                                <td>
                                                    <label>Description sur l'événement </label>
                                                    <div class="col">
                                                        <textarea class="col-sm-12" name="event_description"></textarea>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </fieldset>
                                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups" style="float: right;">
                                    <div class="btn-group mr-2" role="group" aria-label="First group">
                                        <button class="btn btn-primary" type="submit" name="add_event">Enregistrer</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>




<!--    Modal pour ajouter nouveau type evenement-->
<div class="modal fade" id="ajouterType" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
                <h3 align="center"><b>Nouveau Type de Service</b></h3>
                <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
            </div>
            <div class="modal-body" style="padding:40px 50px;">

                <form class="form-horizontal" action="" method="post">
                    <div class="form-group">
                        <label>Nom </label>
                        <div class="col-sm-12">
                            <input type="text" name="create_type_event" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label></label>
                        <div class="col-sm-8">
                            <input type="submit" name="submit" class="btn btn-primary" value="Créer">
                            <input type="reset" name="" class="btn btn-outline-warning" value="Effacer Formulaire">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!--Modal Operation Notification-->
<?php
if (isset($_GET['witness'])){
    $witness = $_GET['witness'];

    switch ($witness){
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
<?php
include('foot.php');
?>

