<?php


include('first.php');
include('php/main_side_navbar.php');

$today = date("Y-m-d");

$debut_utilisateur  ="";
$utilisateur  ="";
$id_pointage  ="";
$debut_utilisateur = "";
$fin_utilisateur  = "";



$start_time = date("G:i");
$end_time = date("G:i");


$query = "SELECT * from pointage where utilisateur = '$nom_user' AND date_emission = '$today'";
$q = $db->query($query);
while($row = $q->fetch())
{
    $debut_utilisateur  =$row['debut_utilisateur'];
    $utilisateur  =$row['utilisateur'];
    $id_pointage  =$row['id_pointage'];
    $debut_utilisateur  =$row['debut_utilisateur'];
    $fin_utilisateur  =$row['fin_utilisateur'];
}

?>
    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Mes Pointages</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme <?=$nom_user?>, il est <?=date("G:i");?> en ce jour du <?=dateToFrench("now","l j F Y");?>.
                    </li>
                </ol>
                <!--                Main Body-->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card mb-4">
                            <div class="card-header">

                            </div>

                            <div class="card-body">

                                <div class="row">
                                    <hr/>
                                </div>

                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="card mb-4">
                                            <?php
                                            $form = "save_pointage.php";
                                            if($debut_utilisateur != ""){
                                                $form = "update_pointage.php";
                                            }
                                            ?>
                                            <form class="form-horizontal" action="<?= $form?>" method="POST" enctype="multipart/form-data">
                                                <div class="card-header">
                                                    <i class="fas fa-table"></i>
                                                    Formulaire de pointe
                                                </div>

                                                <input type="hidden" name="id_pointage" value="<?=$id_pointage?>">
                                                <input type="hidden" name="debut_utilisateur" value="<?=$debut_utilisateur?>">
                                                <input type="hidden" name="id_perso" value="<?=$id_perso?>">
                                                <input type="hidden" name="type" value="m">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-hover table-condensed" id="myTable">
                                                            <tbody>
                                                            <tr>
                                                                <td>
                                                                    <label>Date du jour  </label>
                                                                    <?php $now = dateToFrench("now","l j F Y");$time = date("G:i");?>
                                                                    <div class="col">
                                                                        <input  class="form-control" type="text" value="<?=$now?>" style="width:75%" readonly>
                                                                        <input type="hidden" name="date_emission" value="<?=date("Y-m-d")?>" readonly>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <label>Utilisateur </label>
                                                                    <div class="col">
                                                                        <?php

                                                                        if($utilisateur != ""){

                                                                            ?>
                                                                            <input  class="form-control" type="text" name="nom" value="<?=$utilisateur?>" style="width:75%" readonly>
                                                                            <?php
                                                                        }else{
                                                                            ?>
                                                                            <input  class="form-control" type="text" name="nom" value="<?=$nom_user?>" style="width:75%" readonly>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <label>Heure d'arrivée </label>
                                                                    <div class="col">
                                                                        <?php
                                                                        if($debut_utilisateur == ""){
                                                                            ?>
                                                                            <input type="time" name="debut_utilisateur"  value="<?=$time?>" min="07:00" class="form-date" required>
                                                                            <input type="hidden" name="debut_systeme"  value="<?=$start_time?>">
                                                                            <?php
                                                                        }else{
                                                                            ?>
                                                                            <input name="debut_utilisateur"  value="<?=$debut_utilisateur?>"  class="form-date" readonly>
                                                                            <?php
                                                                        }
                                                                        ?>

                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <label >Heure de Sortie </label>
                                                                    <div class="col">
                                                                        <?php
                                                                        if($debut_utilisateur == ""){
                                                                            ?>
                                                                            <input  class="form-control" type="text" value="Veillez d'abord enregistrer l'heure d'arrivée"" style="width:75%" readonly>
                                                                            <?php
                                                                        }else{
                                                                            if($fin_utilisateur == ""){
                                                                                $time = date("H:i");
                                                                                ?>
                                                                                <input type="time" name="fin_utilisateur"  value="<?=$time?>" min="07:00" max="<?=$time?>" class="form-date" required>
                                                                                <input type="hidden" name="fin_systeme"  value="<?=$end_time?>">
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
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <?php
                                                    if($fin_utilisateur == ""){
                                                        ?>
                                                        <div class="btn-group mr-2" role="group" aria-label="First group">
                                                            <button type="submit" name="submit_pointage" class="btn btn-primary" >Enregistrer</button>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if($fin_utilisateur != ""){
                                                        ?>
                                                        <div class="bg-warning"> Votre Pointage a déjà été enregistré pour ce jour, Merci</div>
                                                        <?php
                                                    }
                                                    ?>
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
                                                <b>Historique des pointages</b>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <input class="form-control" id="myInput" type="text" placeholder="Filtrer...">
                                                    <br>
                                                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                                        <thead>
                                                        <tr class="bg-primary">
                                                            <th><p align="center">Utilisateur</p></th>
                                                            <th><p align="center">Date d'émission</p></th>
                                                            <th><p align="center">Début Système</p></th>
                                                            <th><p align="center">Début Utilisateur</p></th>
                                                            <th><p align="center">Début Sup. Manager</p></th>
                                                            <th><p align="center">Fin Système</p></th>
                                                            <th><p align="center">Fin Utilisateur</p></th>
                                                            <th><p align="center">FIn Sup. Manager</p></th>
                                                            <th><p align="center">Durée Journée</p></th>
                                                            <?php
                                                            if($lvl != 5){
                                                                ?>
                                                                <th><p align="center">Observation</p></th>
                                                                <?php
                                                            }else{
                                                                ?>
                                                                <th><p align="center">Observation</p></th>
                                                                <th><p align="center">Action</p></th>
                                                                <?php
                                                            }
                                                            ?>
                                                        </tr>
                                                        </thead>
                                                        <tfoot>
                                                        <tr class="bg-primary">
                                                            <th><p align="center">Utilisateur</p></th>
                                                            <th><p align="center">Date d'émission</p></th>
                                                            <th><p align="center">Début Système</p></th>
                                                            <th><p align="center">Début Utilisateur</p></th>
                                                            <th><p align="center">Début Sup. Manager</p></th>
                                                            <th><p align="center">Fin Système</p></th>
                                                            <th><p align="center">Fin Utilisateur</p></th>
                                                            <th><p align="center">FIn Sup. Manager</p></th>
                                                            <th><p align="center">Durée Journée</p></th>
                                                            <?php
                                                            if($lvl != 5){
                                                                ?>
                                                                <th><p align="center">Observation</p></th>
                                                                <?php
                                                            }else{
                                                                ?>
                                                                <th><p align="center">Observation</p></th>
                                                                <th><p align="center">Action</p></th>
                                                                <?php
                                                            }
                                                            ?>
                                                        </tr>
                                                        </tfoot>
                                                        <tbody id="myTable">
                                                        <?php

                                                        $query = "SELECT * from pointage where utilisateur = '$nom_user'";
                                                        if($lvl == 5)
                                                            $query = "SELECT * from pointage";

                                                        $q = $db->query($query);
                                                        while($row = $q->fetch())
                                                        {
                                                            $style = "";

                                                            $id_pointage = $row['id_pointage'];
                                                            $utilisateur  =$row['utilisateur'];
                                                            $date_emission  =$row['date_emission'];
                                                            $today = date("Y-m-d");
                                                            if($date_emission == $today){
                                                                $date_emission = dateToFrench("$date_emission","l j F Y");
                                                                $style = "table-warning";
                                                            }else
                                                                $date_emission = dateToFrench("$date_emission","l j F Y");

                                                            $debut_systeme  =$row['debut_systeme'];
                                                            $debut_utilisateur  =$row['debut_utilisateur'];
                                                            $debut_manager  =$row['debut_manager'];
                                                            $fin_system  =$row['fin_systeme'];
                                                            $fin_utilisateur  =$row['fin_utilisateur'];
                                                            $fin_manager  =$row['fin_manager'];
                                                            $duree_journee  =$row['duree_journee'];
                                                            $observation  =$row['observation'];
                                                            ?>

                                                            <tr>
                                                                <td align="center"><?=$utilisateur?></td>
                                                                <td align="center" class="<?= $style?>"><?=$date_emission?></td>
                                                                <td align="center"><?=$debut_systeme?></td>
                                                                <td align="center"><?=$debut_utilisateur?></td>
                                                                <td align="center"><?=$debut_manager?></td>
                                                                <td align="center"><?=$fin_system?></td>
                                                                <td align="center"><?=$fin_utilisateur?></td>
                                                                <td align="center"><?=$fin_manager?></td>
                                                                <td align="center"><?=$duree_journee?></td>
                                                                <td align="center"><?=$observation?></td>
                                                                <?php
                                                                if($lvl == 5){
                                                                    ?>
                                                                    <td align="center"><a class="btn btn-primary" href="drh_pointage.php?id=<?=$id_pointage?>"><i class="fas fa-edit"></i></a></td>
                                                                    <?php
                                                                }
                                                                ?>
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

                            </div>

                            <div class="card-footer">

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <!--//Footer-->

    <script>
        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
<?php
include('foot.php');
?>