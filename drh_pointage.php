<?php

include('first.php');
include('php/main_side_navbar.php');

$id=$_REQUEST['id'];
$id_pointage = $id;

$debut_utilisateur  ="";
$utilisateur  ="";
$debut_utilisateur = "";
$debut_manager  = "";
$fin_utilisateur  = "";
$fin_manager  = "";

$start_time = date("G:i");
$end_time = date("G:i");

$today = dateToFrench("now","l j F Y");
$query = "SELECT * from pointage where id_pointage = '$id_pointage'";
$q = $db->query($query);
while($row = $q->fetch())
{
    $debut_utilisateur  =$row['debut_utilisateur'];
    $utilisateur  =$row['utilisateur'];
    $debut_utilisateur  =$row['debut_utilisateur'];
    $debut_manager  =$row['debut_manager'];
    $fin_utilisateur  =$row['fin_utilisateur'];
    $fin_manager  =$row['fin_manager'];

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Mon Pointage</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme <?=$nom_user?>, il est <?=date("G:i");?> en ce jour du <?=dateToFrench("now","l j F Y");?>.
                    </li>
                </ol>
                <!--                Main Body-->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card mb-4">
                            <?php
                            $form = "save_start_pointage.php";
                            if($debut_manager != ""){
                                $form = "save_end_pointage.php";
                            }
                            ?>
                            <form class="form-horizontal" action="<?= $form?>" method="POST" enctype="multipart/form-data">
                                <div class="card-header">
                                    <i class="fas fa-table"></i>
                                    Formulaire de pointe
                                </div>

                                <input type="hidden" name="id_pointage" value="<?=$id_pointage?>">
                                <input type="hidden" name="debut_manager" value="<?=$debut_manager?>">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-condensed" id="myTable">
                                            <?php $now = dateToFrench("now","l j F Y");$time = date("G:i");?>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <label>Personnel </label>
                                                    <div class="col">
                                                        <input  class="form-control" type="text" name="nom" value="<?=$utilisateur?>" style="width:75%" readonly>
                                                    </div>
                                                </td>
                                                <td>
                                                    <label>DRH </label>
                                                    <div class="col">
                                                        <input  class="form-control" type="text" name="nom" value="<?=$nom_user?>" style="width:75%" readonly>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>Heure d'arrivée enregistrée par <?=$utilisateur?></label>
                                                    <div class="col">
                                                        <?php
                                                        if($debut_utilisateur != ""){
                                                            ?>
                                                            <input name="debut_utilisateur"  value="<?=$debut_utilisateur?>"  class="form-date" readonly>
                                                            <?php
                                                        }
                                                        ?>

                                                    </div>
                                                </td>
                                                <td>
                                                    <label>Heure d'arrivée confirmé par vous (<?=$nom_user?>)</label>
                                                    <div class="col">
                                                        <?php
                                                        if($debut_manager == ""){
                                                            ?>
                                                            <input type="time" name="debut_manager"  value="<?=$time?>" min="07:00" max="<?=$time?>" class="form-date" required>
                                                            <?php
                                                        }else{
                                                            ?>
                                                            <input name="debut_manager"  value="<?=$debut_manager?>"  class="form-date" readonly>
                                                            <?php
                                                        }
                                                        ?>

                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label >Heure de Sortie enregistrée par <?=$utilisateur?></label>
                                                    <div class="col">
                                                        <?php
                                                        if($debut_utilisateur == ""){
                                                            ?>
                                                            <input  class="form-control" type="text" value="Veillez d'abord enregistrer l'heure d'arrivée"" style="width:75%" readonly>
                                                            <?php
                                                        }else{
                                                            if($fin_utilisateur == ""){
                                                                ?>
                                                                <input name="fin_utilisateur"  value="N/A" min="07:00" max="<?=$time?>" class="form-date">
                                                                <?php
                                                            }else{
                                                                ?>
                                                                <input  name="fin_utilisateur"  value="<?=$fin_utilisateur?>"  class="form-date" readonly>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <label >Heure de Sortie enregistrée par vous (<?=$nom_user?>)</label>
                                                    <div class="col">
                                                        <?php
                                                        if($debut_manager == ""){
                                                            ?>
                                                            <input  class="form-control" type="text" value="Veillez d'abord enregistrer l'heure d'arrivée"" style="width:75%" readonly>
                                                            <?php
                                                        }else{
                                                            if($fin_utilisateur == ""){
                                                                ?>
                                                                <input name="fin_manager"  value="N/A" class="form-date" readonly>
                                                                <?php
                                                            }else{
                                                                ?>
                                                                <input  name="fin_manager"  value="<?=$fin_utilisateur?>"  class="form-date" readonly>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <?php
                                    if($fin_manager == ""){
                                        ?>
                                        <div class="btn-group mr-2" role="group" aria-label="First group">
                                            <button type="submit" name="submit_pointage" class="btn btn-primary" >Valider</button>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if($fin_manager != ""){
                                        ?>
                                        <div class="bg-warning"> Vous avez déjà validé ce pointage, Merci</div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
<?php
}
?>
    <!--//Footer-->
<?php
include('foot.php');
?>