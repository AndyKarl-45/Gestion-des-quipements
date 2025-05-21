<?php


include('first.php');
include('php/main_side_navbar.php');

$today = date("Y-m-d");

$utilisateur_0 = "";
$id_pointage_0  ="";
$debut_utilisateur_0 = "";
$fin_utilisateur_0  = "";
$id_0 = "";
$secteur = "";
if(isset($_POST['submit_search'])!="")
{
    $id_0  =$_POST['id_0'];
//    echo 'id : '.$id_0.'<br/>';

    $query = "SELECT * from personnel where id_personnel = '$id_0'";
    $q = $db->query($query);
    while($row = $q->fetch()) {
        $utilisateur_0 = $row['prenom'].' '.$row['nom'];
        $secteur = $row['secteur'];
    }

//    echo 'nom: '.$utilisateur_0.'<br/>';
    $query = "SELECT * from pointage where id_perso = '$id_0' AND date_emission = '$today'";
    $q = $db->query($query);
    while($row = $q->fetch()) {
        $id_pointage_0 = $row['id_pointage'];

        $debut_utilisateur_0 = $row['debut_utilisateur'];
        $fin_utilisateur_0  = $row['fin_utilisateur'];
        $utilisateur_0  = $row['utilisateur'];
        $auteur_0  = $row['auteur'];

//        echo 'id : '.$id_0.'<br/>';
//        echo 'id_pointage_0: '.$id_pointage_0.'<br/>';
//        echo 'debut_utilisateur_0: '.$debut_utilisateur_0.'<br/>';
//        echo 'fin_utilisateur_0: '.$fin_utilisateur_0.'<br/>';
//        echo 'utilisateur_0: '.$utilisateur_0.'<br/>';
    }
//    echo 'id : '.$id_0.'<br/>';


}
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
                <h1 class="mt-4">Leurs Pointages</h1>
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

                                <h5><b><u>NB:</u></b> Veillez saisir le pointage de vos collègues</h5>

                                <div class="row">
                                    <hr/>
                                </div>

                                <form class="form-horizontal" action="" method="POST">

                                    <select name="id_0" style="width:75%;
                                                        border-top: 0; border-left: 0;
                                                        border-right: 0;
                                                        background: transparent;" required>
                                        <option value="" selected="">...</option>
                                        <?php

                                        $iResult = $db->query("SELECT * FROM personnel WHERE secteur = '$secteur_user'");

                                        while($data = $iResult->fetch()){
                                            $i_0 = $data['id_personnel'];
                                            $i = $data['prenom'].' '.$data['nom'];
                                            echo '<option value ="'.$i_0.'">';
                                            echo $i;
                                            echo '</option>';

                                        }
                                        ?>
                                    </select>
                                    <button type="submit" name="submit_search" class="btn btn-primary">Selectionner</button>
                                </form>

                                <div class="row">
                                    <hr/>
                                </div>

                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="card mb-4">
                                            <?php
                                            $form = "save_pointage.php";
                                            if($debut_utilisateur_0 != ""){
                                                $form = "update_pointage.php";
                                            }
                                            ?>
                                            <form class="form-horizontal" action="<?= $form?>" method="POST">
                                                <div class="card-header">
                                                    <i class="fas fa-table"></i>
                                                    Formulaire de pointe
                                                </div>
                                                <input type="hidden" name="id_pointage" value="<?=$id_pointage_0?>">
                                                <input type="hidden" name="debut_utilisateur" value="<?=$debut_utilisateur_0?>">
                                                <input type="hidden" name="id_perso" value="<?=$id_0?>">
                                                <input type="hidden" name="secteur" value="<?=$secteur?>">
                                                <input type="hidden" name="indic" value="leur">
                                                <input type="hidden" name="type" value="l">
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
                                                                        if($utilisateur_0 == ""){

                                                                            ?>
                                                                            <input  class="form-control" value="Veillez selectionner un personnel" style="width:75%" disabled>
                                                                            <?php
                                                                        }else{
                                                                            ?>
                                                                            <input  class="form-control" name="nom" value="<?=$utilisateur_0?>" style="width:75%" readonly>
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
                                                                        if($debut_utilisateur_0 == ""){
                                                                            ?>
                                                                            <input type="time" name="debut_utilisateur"  value="<?=$time?>" min="07:00" max="<?=$time?>" class="form-date" required>
                                                                            <input type="hidden" name="debut_systeme"  value="<?=$start_time?>">
                                                                            <?php
                                                                        }else{
                                                                            ?>
                                                                            <input name="debut_utilisateur"  value="<?=$debut_utilisateur_0?>"  class="form-date" readonly>
                                                                            <?php
                                                                        }
                                                                        ?>

                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <label >Heure de Sortie </label>
                                                                    <div class="col">
                                                                        <?php
                                                                        if($debut_utilisateur_0 == ""){
                                                                            ?>
                                                                            <input  class="form-control" type="text" value="Veillez d'abord enregistrer l'heure d'arrivée"" style="width:75%" readonly>
                                                                            <?php
                                                                        }else{
                                                                            if($fin_utilisateur_0 == ""){
                                                                                $now = dateToFrench("now", "l j F Y");
                                                                                $time = date("G:i");
                                                                                ?>
                                                                                <input type="time" name="fin_utilisateur"  value="<?=$time?>" min="07:00" max="<?=$time?>" class="form-date" required>
                                                                                <input type="hidden" name="fin_systeme"  value="<?=$end_time?>">
                                                                                <?php
                                                                            }else{
                                                                                ?>
                                                                                <input  name="fin_utilisateur"  value="<?=$fin_utilisateur_0?>"  class="form-date" readonly>
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
                                                    if($fin_utilisateur_0 == ""){
                                                        ?>
                                                        <div class="btn-group mr-2" role="group" aria-label="First group">
                                                            <button type="submit" name="submit_pointage" class="btn btn-primary" >Enregistrer</button>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if($fin_utilisateur_0 != ""){
                                                        ?>
                                                        <div class="bg-warning"> Ce Pointage a déjà été enregistré pour ce jour, Merci</div>
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
                                                            if($lvl != 7){
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
                                                            if($lvl != 7){
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
                                                        <tbody>
                                                        <?php

                                                        $query = "SELECT * from pointage where utilisateur <> '$nom_user' AND secteur ='$secteur_user' ";

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
                                                                if($lvl == 7){
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