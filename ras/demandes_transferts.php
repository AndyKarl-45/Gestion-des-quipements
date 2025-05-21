<?php

include('first.php');
include('php/main_side_navbar.php');
?>
<?php
$action = "";
$id = "";
if(isset($_GET['action']) && isset($_GET['id'])){
    $action = $_GET['action'];
    $id = $_GET['id'];
}
?>
    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Demandes de Transferts</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme <?=$nom_user?>, il est <?=date("G:i");?> en ce jour du <?=dateToFrench("now","l j F Y");?>.
                    </li>
                </ol>
                <?php
                if($lvl == 4 || $lvl == 3 || $lvl == 6){
                    if ($lvl == 4 || $lvl == 6) {
                        if($action == "traiter" && $id != ""){

                            $query = "SELECT * FROM demandes_transferts WHERE id = $id";

                            $q = $db->query($query);
                            while($row = $q->fetch())
                            {
                                $id_d = $row['id'];
                                $date = $row['date_e'];
                                $date  = dateToFrench("$date","l j F Y");
                                $montant_v  = number_format($row['montant_voulu']);
                                $montant_p  = number_format($row['montant_percu']);

                                $auteur  =$row['auteur'];
                                $username  =$row['username'];
                                $motif  =$row['motif'];


                                ?>
                                <!--                Main Body-->
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="card mb-4">
                                            <form class="form-horizontal" action="valider_demande_transfert.php" method="POST" enctype="multipart/form-data">
                                                <div class="card-header">
                                                    <i class="fas fa-table"></i>
                                                    Formulaire d'ajustement de demande de transfert
                                                </div>

                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-hover table-condensed" id="myTable">
                                                            <input type="hidden" name="id_demande" value="<?=$id_d?>">
                                                            <input type="hidden" name="username" value="<?=$username?>">
                                                            <tbody>
                                                            <tr>
                                                                <td>
                                                                    <label>Auteur</label>
                                                                    <div class="col">
                                                                        <input  class="form-control" value="<?=$auteur?>" style="width:75%;
                                                            border-top: 0; border-left: 0;
                                                            border-right: 0;
                                                            background: transparent" readonly>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <label >Date </label>
                                                                    <div class="col">
                                                                        <input  class="form-control" value="<?=$date?>" style="width:75%; >
                                                            border-top: 0; border-left: 0;
                                                            border-right: 0;
                                                            background: transparent" readonly>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <label>Montant Souhaité</label>
                                                                    <div class="col">
                                                                        <input  class="form-control" value="<?=$montant_v?>" style="width:75%;
                                                            border-top: 0; border-left: 0;
                                                            border-right: 0;
                                                            background: transparent" readonly>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <label >Montant à Accorder</label>
                                                                    <div class="col">
                                                                        <input  class="form-control" type="number" name="montant_p" value="0" style="width:75%; >
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
                                                                    <label>Motif de la demande </label>
                                                                    <div class="col">
                                                                <textarea name="motif" class="form-control" style="width:100%; >
                                                                border-top: 0; border-left: 0;
                                                                border-right: 0;
                                                                background: transparent" readonly></textarea>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="btn-group mr-2" role="group" aria-label="First group">
                                                        <button type="submit" name="submit_traiter" class="btn btn-primary" >Valider</button>
                                                    </div>
                                                    <!--                                        <div class="btn-group mr-2" role="group" aria-label="Second group">-->
                                                    <!--                                            <a class="btn btn-primary" href="#demandes">Voir les demandes</a>-->
                                                    <!--                                        </div>-->
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }

                        if($action == "valider" && $id != ""){
                            $total_sortie =0;
                            $total_entree =0;


//                            Verifier solde payeur
                            $query = "SELECT * FROM operations_compta WHERE auteur = '$user'";

                            $q = $db->query($query);
                            while($row = $q->fetch()) {
                                $type_oc = $row['type_oc'];
                                $montant = $row['montant'];
                                if ($type_oc == "entree") {
                                    $total_entree += $montant;
                                }
                                if ($type_oc == "sortie") {
                                    $total_sortie += $montant;
                                }
                            }

                            $balance_boss = $total_entree - $total_sortie;
//                            Fin vérification solde payeur

//                            Chargement des données de la demande

                            $query = "SELECT * FROM demandes_transferts WHERE id = $id";

                            $q = $db->query($query);
                            while($row = $q->fetch()) {
                                $id_d = $row['id'];
                                $date = date("Y-m-d");
                                $montant_v = $row['montant_voulu'];
                                $montant_p = $montant_v;
                                $username = $row['username'];
                            }

                            if($montant_p > $balance_boss)
                            {
                            ?>
                                <script>
                                    window.location.href="<?=$comptabilite['option4_link']?>?witness=0";
                                </script>
                            <?php
                            }else{

                                try{
                                // Create prepared statement
                                $sql = "UPDATE demandes_transferts SET montant_percu =:montant_p, date_r=:date
                                        WHERE id =:id_d";

                                $req = $db->prepare($sql);

                                // Bind parameters to statement
                                $req->bindParam(':montant_p', $montant_p);
                                $req->bindParam(':date', $date);
                                $req->bindParam(':id_d', $id_d);

                                $req->execute();
                                //echo $nom_pays.'<br/>';

                                $type_oc = 'entree';
                                $nature_oc = 'TRANSFERT';
                                $motif_oc = 'Transfert de '.$nom_user.' à la demande vers '.$username;

                                $sql = "INSERT INTO operations_compta (date_emis, type_oc, nature_oc, motif_oc, montant, auteur) 
                                        VALUES (:date,:type_oc, :nature_oc, :motif_oc, :montant, :auteur)";

                                //        echo $sql;
                                $req = $db->prepare($sql);

                                // Bind parameters to statement
                                $req->bindParam(':date', $date);
                                $req->bindParam(':montant', $montant_p);
                                $req->bindParam(':type_oc', $type_oc);
                                $req->bindParam(':nature_oc', $nature_oc);
                                $req->bindParam(':motif_oc', $motif_oc);
                                $req->bindParam(':auteur', $username);

                                $req->execute();


                                $type_oc = 'sortie';
                                $nature_oc = 'TRANSFERT';
                                $motif_oc = 'Transfert de '.$nom_user.' à la demande vers '.$username;

                                $sql = "INSERT INTO operations_compta (date_emis, type_oc, nature_oc, motif_oc, montant, auteur) 
                                        VALUES (:date,:type_oc, :nature_oc, :motif_oc, :montant, :auteur)";

                                //        echo $sql;
                                $req = $db->prepare($sql);

                                // Bind parameters to statement
                                $req->bindParam(':date', $date);
                                $req->bindParam(':montant', $montant_p);
                                $req->bindParam(':type_oc', $type_oc);
                                $req->bindParam(':nature_oc', $nature_oc);
                                $req->bindParam(':motif_oc', $motif_oc);
                                $req->bindParam(':auteur', $user);

                                $req->execute();

                                if($req)
                                {
                                ?>
                                    <script>
                                        window.location.href="<?=$comptabilite['option4_link']?>?witness=1";
                                    </script>
                                <?php
                                }
                                else
                                {
                                ?>
                                    <script>
                                        window.location.href="<?=$comptabilite['option4_link']?>?witness=-1";
                                    </script>
                                <?php
                                }

                                } catch(PDOException $e){
                                    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
                                }
                            }



                        }
                                }
                    ?>

                    <?php
                    if ($lvl == 3) {
                        ?>
                        <!--                Main Body-->
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card mb-4">
                                    <form class="form-horizontal" action="save_demande_transfert.php" method="POST" enctype="multipart/form-data">
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
                                                                <input  class="form-control" name="auteur" value="<?=$user?> (<?=$secteur_user?>)" style="width:75%;
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
                                                            <label>Motif de la demande </label>
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
                                            <!--                                        <div class="btn-group mr-2" role="group" aria-label="Second group">-->
                                            <!--                                            <a class="btn btn-primary" href="#demandes">Voir les demandes</a>-->
                                            <!--                                        </div>-->
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>


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
                                    <b>Demandes de transferts</b>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                            <tr class="bg-primary">
                                                <th><p align="center">DATE</p></th>
                                                <th><p align="center">AUTEUR</p></th>
                                                <th><p align="center">MONTANT DEMANDÉ</p></th>
                                                <th><p align="center">MONTANT REÇU</p></th>
                                                <th><p align="center">MOTIF</p></th>
                                                <?php
                                                if($lvl == 4 || $lvl == 6){
                                                    ?>
                                                    <th><p align="center">ACTION</p></th>
                                                    <?php
                                                }
                                                ?>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr class="bg-primary">
                                                <th><p align="center">DATE</p></th>
                                                <th><p align="center">AUTEUR</p></th>
                                                <th><p align="center">MONTANT DEMANDÉ</p></th>
                                                <th><p align="center">MONTANT REÇU</p></th>
                                                <th><p align="center">MOTIF</p></th>
                                                <?php
                                                if($lvl == 4 || $lvl == 6){
                                                    ?>
                                                    <th><p align="center">ACTION</p></th>
                                                    <?php
                                                }
                                                ?>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            <?php
                                            $action = "";
                                            if($lvl == 4 || $lvl == 6)
                                                $query = "SELECT * FROM demandes_transferts ";
                                            else
                                                $query = "SELECT * FROM demandes_transferts WHERE username = '$user'";

                                            $q = $db->query($query);
                                            while($row = $q->fetch())
                                            {
                                                $id_demande = $row['id'];
                                                $date = $row['date_e'];
                                                $date  = dateToFrench("$date","l j F Y");
                                                $heure  = dateToFrench("$date","G:i");
                                                $montant_v  = number_format($row['montant_voulu']);
                                                $montant_p  = number_format($row['montant_percu']);
                                                if($montant_p == "" || $montant_p == 0)
                                                    $action = "<a href='demandes_transferts.php?action=traiter&id=$id_demande' class='btn btn-primary'><i class='fas fa-edit'></i></a>&nbsp;&nbsp;<a href='demandes_transferts.php?action=valider&id=$id_demande' class='btn btn-primary'><i class='fas fa-check'></i></a>";
                                                if($montant_p != "" && $montant_p != 0)
                                                    $action = "<p class='btn btn-primary'><i>traité</i></p>";

                                                $auteur  =$row['auteur'];
                                                $motif  =$row['motif'];

                                                ?>
                                                <tr>
                                                    <td><?=$date?></td>
                                                    <td align="center"><?=$auteur?></td>
                                                    <td align="center"><?=$montant_v?></td>
                                                    <td align="center"><?=$montant_p?></td>
                                                    <td align="center"><?=$motif?></td>
                                                    <?php
                                                    if($lvl == 4 || $lvl == 6){
                                                        ?>
                                                        <td align="center"><?=$action?></td>
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