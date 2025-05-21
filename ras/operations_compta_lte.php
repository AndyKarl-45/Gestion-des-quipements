<?php

include('first.php');
include('php/main_side_navbar.php');
?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Mes Opérations (Comptablilité Simplifiées)</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme <?=$nom_user?>, il est <?=date("G:i");?> en ce jour du <?=dateToFrench("now","l j F Y");?>.
                    </li>
                </ol>
<?php
if($lvl == 4 || $lvl == 3 || $lvl == 6 ){
    ?>
                <!--                Main Body-->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card mb-4">
                            <form class="form-horizontal" action="save_operation_compta.php" method="POST" enctype="multipart/form-data">
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
                                                    <label>Type d'opération </label>
                                                    <div class="col">
                                                        <?php
                                                        if($lvl == 4 || $lvl == 6){
                                                        ?>
                                                        <select name="type_oc" style="width:75%; >
                                                            border-top: 0; border-left: 0;
                                                            border-right: 0;
                                                            background: transparent;" required class="form-control">
                                                            <option value="" selected="">...</option>
                                                            <option value="entree">ENTRÉE</option>
                                                            <option value="sortie">SORTIE</option>
                                                        </select>
                                                        <?php
                                                        }else{
                                                        ?>
                                                        <input class="form-control" value="SORTIE" style="width:75%;
                                                        border-top: 0; border-left: 0;
                                                        border-right: 0;
                                                        background: transparent" readonly>
                                                        <input type="hidden" name="type_oc" value="sortie">
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <label>Nature de l'opération  </label>
                                                    <div class="col">
                                                        <select name="nature_oc" style="width:75%;
                                                            border-top: 0; border-left: 0;
                                                            border-right: 0;
                                                            background: transparent;" required>
                                                            <option value="" selected="">...</option>
                                                            <option value="divers">DIVERS</option>
                                                            <?php

                                                            $iResult = $db->query('SELECT * FROM nature_oc');

                                                            while($data = $iResult->fetch()){

                                                                $i = $data['intitule'];
                                                                echo '<option value ="'.$i.'">';
                                                                echo $i;
                                                                echo '</option>';

                                                            }
                                                            ?>
                                                        </select>
                                                        <button type="button" data-toggle="modal"  data-target="#ajouterNature" style="background-color: transparent"><i class="fas fa-plus"></i>

                                                        </button>
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
                                                        <label>Motif de l'opération </label>
                                                        <div class="col">
                                                            <textarea name="motif_oc" class="form-control" style="width:100%; >
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
                                        <button type="submit" name="submit_oc" class="btn btn-primary" >Enregistrer</button>
                                    </div>
                                    <div class="btn-group mr-2" role="group" aria-label="Second group">
                                        <a class="btn btn-primary" href="#etats">Voir les états</a>
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
                                <b>Historique des Opérations</b>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr class="bg-primary">
                                            <th><p align="center">DATE</p></th>
                                            <th><p align="center">NATURE</p></th>
                                            <th><p align="center">ENTRÉE</p></th>
                                            <th><p align="center">SORTIE</p></th>
                                            <th><p align="center">VISUALISER</p></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $total_entree = 0;
                                        $total_sortie = 0;
                                        $balance = 0;
                                        $entree = "";
                                        $sortie = "";


                                        $query = "SELECT * FROM operations_compta WHERE auteur = '$user' ";

                                        $q = $db->query($query);
                                        while($row = $q->fetch())
                                        {

                                            $type_oc  = "table-warning";

                                            $id_oc = $row['id_oc'];
                                            $date_emis = $row['date_emis'];
                                            $date_emis  = dateToFrench("$date_emis","l j F Y");
                                            $type_oc  =$row['type_oc'];
                                            $montant  =$row['montant'];
                                            if($type_oc == "entree"){
                                                $type_oc = "ENTRÉE";
                                                $style = "table-primary";
                                                $total_entree += $montant;
                                                $entree = number_format($montant);
                                            }
                                            if($type_oc == "sortie"){
                                                $type_oc = "SORTIE";
                                                $style = "table-warning";
                                                $total_sortie += $montant;
                                                $sortie = number_format($montant);
                                            }

                                            $nature_oc  =$row['nature_oc'];
                                            $motif_oc  =$row['motif_oc'];

                                            ?>
                                            <tr>
                                                <td align="center" class="<?= $style?>"><?=$date_emis?></td>
                                                <td align="center"><?=$nature_oc?></td>
                                                <td align="center"><?=$entree?></td>
                                                <td align="center"><?=$sortie?></td>
                                                <td align="center"><a class="text-primary" href="details_operation.php?id=<?=$id_oc?>"><i class="fas fa-eye"></i></a></td>
                                            </tr>
                                            <?php
                                            $entree = "";
                                            $sortie = "";
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

                <div class="row" id="etats">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">
                                <div class="text-center">
                                    <h1>ENTREES</h1>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#"><?=number_format($total_entree)?> Fcfa</a>
                                <div class="small text-white"><i class="fas fa-angle-up"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">
                                <div class="text-center">
                                    <h1>
                                        SORTIES
                                    </h1>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#"><?=number_format($total_sortie)?> Fcfa</a>
                                <div class="small text-white"><i class="fas fa-angle-up"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">
                                <div class="text-center">
                                    <h1>
                                        BALANCE
                                    </h1>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#"><?=number_format($total_entree - $total_sortie) ?> Fcfa</a>
                                <div class="small text-white"><i class="fas fa-angle-up"></i></div>
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