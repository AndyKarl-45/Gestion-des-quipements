<?php

include('first.php');
include('php/main_side_navbar.php');

if (isset($_GET['id'])) {
    $id_oc = $_GET['id'];
}

$today = date("Y-m-d");
$query = "SELECT * from operations_compta where id_oc = $id_oc";
$q = $db->query($query);
while($row = $q->fetch())
{
    $pseudo  =$row['auteur'];
    $date_emis  =$row['date_emis'];
    $heure_emis  =$row['heure_emis'];
    $type_oc  =$row['type_oc'];
    if($type_oc == "entree"){
        $type_oc = "ENTRÉE";
    }
    if($type_oc == "sortie"){
        $type_oc = "SORTIE";
    }
    $nature_oc  =$row['nature_oc'];
    $motif_oc  =$row['motif_oc'];
    $montant  =$row['montant'];
}
?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Mon Opération du <?=dateToFrench("$date_emis","l j F Y")?></h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme <?=$nom_user?>, il est <?=date("G:i");?> en ce jour du <?=dateToFrench("now","l j F Y");?>.
                    </li>
                </ol>
                <?php
                if($lvl == 4 ){
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
                                                <input type="hidden" name="date_emission" value="<?=date("Y-m-d")?>" readonly>
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <label>Type d'opération </label>
                                                        <div class="col">
                                                            <input name="heure" class="form-control" value="<?=$type_oc?>" style="width:75%; >
                                                        border-top: 0; border-left: 0;
                                                        border-right: 0;
                                                        background: transparent" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label>Nature de l'opération  </label>
                                                        <div class="col">
                                                            <input name="heure" class="form-control" value="<?=$nature_oc?>" style="width:75%; >
                                                        border-top: 0; border-left: 0;
                                                        border-right: 0;
                                                        background: transparent" readonly>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>Heure d'enregistrement </label>
                                                        <div class="col">
                                                            <input name="heure" class="form-control" value="<?=$heure_emis?>" style="width:75%; >
                                                        border-top: 0; border-left: 0;
                                                        border-right: 0;
                                                        background: transparent" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label >Montant </label>
                                                        <div class="col">
                                                            <input  class="form-control" value="<?=$montant?> Fcfa" style="width:75%; >
                                                        border-top: 0; border-left: 0;
                                                        border-right: 0;
                                                        background: transparent" readonly>
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
                                                            <textarea name="motif" class="form-control" style="width:100%; >
                                                            border-top: 0; border-left: 0;
                                                            border-right: 0;
                                                            background: transparent" readonly><?=$motif_oc?></textarea>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="btn-group mr-2" role="group" aria-label="First group">
                                            <a class="btn btn-primary" href="etats_tresor.php?pseudo=<?=$pseudo?>"><i class="fas fa-angle-left"></i> Retour</a>
                                        </div>
                                    </div>
                                </form>
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

                    <form class="form-horizontal" action="#" name="form" method="post">
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

<?php
include('foot.php');
?>