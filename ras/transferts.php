<?php

include('first.php');
include('php/main_side_navbar.php');

$id_secteur ="";

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Mes Transferts</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme <?=$nom_user?>, il est <?=date("G:i");?> en ce jour du <?=dateToFrench("now","l j F Y");?>.
                    </li>
                </ol>
                <?php
                if($lvl == 4 || $lvl == 6){
                    ?>
                    <!--                Main Body-->
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card mb-4">
                                <form class="form-horizontal" action="save_transfert.php" method="POST" enctype="multipart/form-data">
                                    <div class="card-header">
                                        <i class="fas fa-table"></i>
                                        Formulaire
                                    </div>

                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-condensed" id="myTable">
                                                <?php $now = dateToFrench("now","l j F Y");$time = date("G:i");?>
                                                <input type="hidden" name="date_emission" value="<?=date("Y-m-d")?>" readonly>
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <label>Auteur</label>
                                                        <div class="col">
                                                            <input  class="form-control" name="auteur" value="<?=$nom_user?>" style="width:75%;
                                                        border-top: 0; border-left: 0;
                                                        border-right: 0;
                                                        background: transparent" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label>Destination  </label>
                                                        <div class="col">
                                                            <select name="destination" style="width:75%;
                                                            border-top: 0; border-left: 0;
                                                            border-right: 0;
                                                            background: transparent;" required>
                                                                <option value="" selected="">...</option>
                                                                <?php

                                                                $secteur="";
                                                                $iResult = $db->query('SELECT * FROM users WHERE groupe_role = 3');

                                                                while($data = $iResult->fetch()){

                                                                    $id_secteur = $data['secteur'];
                                                                    $pseudo = $data['pseudo'];

                                                                    $query = "SELECT * from secteur WHERE id_secteur = $id_secteur";
                                                                    $q = $db->query($query);
                                                                    while($row = $q->fetch()) {
                                                                        $secteur = $row['nom'];
                                                                    }

                                                                    $ps = $data['pseudo'].' ('.$secteur.')';

                                                                    echo '<option value ="'.$pseudo.'">';
                                                                    echo $ps;
                                                                    echo '</option>';

                                                                }

                                                                ?>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>Heure d'enregistrement </label>
                                                        <div class="col">
                                                            <input name="heure" class="form-control" value="<?=$time?>" style="width:75%; >
                                                        border-top: 0; border-left: 0;
                                                        border-right: 0;
                                                        background: transparent" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label >Montant </label>
                                                        <div class="col">
                                                            <input  class="form-control" type="number" name="montant" value="0" style="width:75%; >
                                                        border-top: 0; border-left: 0;
                                                        border-right: 0;
                                                        background: transparent" required>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <table class="table table-bordered table-hover table-condensed" id="myTable">
                                                </tbody>
                                                <tr>
                                                    <td>
                                                        <label>Motif du transfert </label>
                                                        <div class="col">
                                                            <textarea name="motif" class="form-control" style="width:100%; >
                                                            border-top: 0; border-left: 0;
                                                            border-right: 0;
                                                            background: transparent"></textarea>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="btn-group mr-2" role="group" aria-label="First group">
                                            <button type="submit" name="submit" class="btn btn-primary" >Enregistrer</button>
                                        </div>
                                        <div class="btn-group mr-2" role="group" aria-label="Second group">
                                            <a class="btn btn-primary" href="demandes_transferts.php">Voir les demandes</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <hr/>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-scroll"></i>
                                    <b>Historique des Transferts</b>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                            <tr class="bg-primary">
                                                <th><p align="center">DATE</p></th>
                                                <th><p align="center">MONTANT</p></th>
                                                <th><p align="center">AUTEUR</p></th>
                                                <th><p align="center">DESTINATION</p></th>
                                                <th><p align="center">SECTEUR</p></th>
                                                <th><p align="center">MOTIF</p></th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                                <tr class="bg-primary">
                                                    <th><p align="center">DATE</p></th>
                                                    <th><p align="center">MONTANT</p></th>
                                                    <th><p align="center">AUTEUR</p></th>
                                                    <th><p align="center">DESTINATION</p></th>
                                                    <th><p align="center">SECTEUR</p></th>
                                                    <th><p align="center">MOTIF</p></th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                            <?php
                                            $secteur = "";
                                            $query = "SELECT * FROM transferts WHERE auteur = '$nom_user'";

                                            $q = $db->query($query);
                                            while($row = $q->fetch())
                                            {
                                                $id = $row['id'];
                                                $date = $row['date'];
                                                $date  = dateToFrench("$date","l j F Y");
                                                $secteur = $row['id_secteur'];

                                                $montant  = number_format($row['montant']);
                                                $destination  =$row['destination'];
                                                $auteur  =$row['auteur'];
                                                $motif  =$row['motif'];

                                            $query1 = "SELECT * FROM secteur WHERE id_secteur = $secteur ";

                                            $q1 = $db->query($query1);
                                            while($row1 = $q1->fetch())
                                            {
                                                $secteur  =$row1['nom'];
                                            }

                                                ?>
                                                <tr>
                                                    <td><?=$date?></td>
                                                    <td align="center"><?=$montant?></td>
                                                    <td align="center"><?=$auteur?></td>
                                                    <td align="center"><?=$destination?></td>
                                                    <td align="center"><?=$secteur?></td>
                                                    <td align="center"><?=$motif?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer">

                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                }else{
                    ?>
                    <div class="bg-warning"> Accès non autorisé</div>
                    <?php
                }
                ?>
            </div>
        </main>
    </div>

    <!--//Footer-->

    <!--    Modal pour ajouter nouvelle Nature-->
    <div class="modal fade" id="ajouterNature" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:20px 50px;">
                    <h3 align="center"><b>Nouvelle Nature d'Opération</b></h3>
                    <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
                </div>
                <div class="modal-body" style="padding:40px 50px;">

                    <form class="form-horizontal" action="save_nature_oc.php" name="form" method="post">
                        <div class="form-group">
                            <label>Intitulé</label>
                            <div class="col-sm-12">
                                <input type="text" name="nom_nature" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="submit" name="submit_nature" class="btn btn-primary" value="Créer">
                                <input type="reset" name="" class="btn btn-warning" value="Effacer Formulaire">
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
        case '1';
            ?>
            <script>
                Swal.fire(
                    'Succès',
                    'Opération enregistrée avec succès !',
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
        case '0';
            ?>
            <script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Solde Insuffisant',
                    showConfirmButton: false,
                    timer: 1500
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