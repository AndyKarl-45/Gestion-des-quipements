<?php

include('first.php');
include('php/main_side_navbar.php');

if(isset($_GET['pseudo']) != ""){

    $pseudo = $_GET['pseudo'];

    ?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">États du trésorier <?=strtoupper($pseudo)?></h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme <?=$nom_user?>, il est <?=date("G:i");?> en ce jour du <?=dateToFrench("now","l j F Y");?>.
                    </li>
                </ol>
                <?php
                if($lvl == 4 || $lvl == 6){
                    ?>
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


                                            $query = "SELECT * FROM operations_compta WHERE auteur = '$pseudo' ";

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
                                                    <td align="center"><a class="text-primary" href="details_operations.php?id=<?=$id_oc?>"><i class="fas fa-eye"></i></a></td>
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
                        <div class="card-footer">
                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                <a class="btn btn-primary" href="etats_managers.php"><i class="fas fa-angle-left"></i> Retour</a>
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
    <?php
}
?>
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