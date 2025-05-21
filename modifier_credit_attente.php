<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

?>
<?php
$id=$_REQUEST['id'];

$query  = "SELECT * from credit where id_credit='".$id."'";
$q = $db->query($query);
while($row = $q->fetch())
{ 
    $nom=$row['nom'];
    $type_conger=$row['type_conger'];
    $start_time=$row['start_time'];
    $modalite=$row['modalite'];
    $montant=$row['montant'];
    $motif=$row['motif'];
    $observation=$row['observation'];


?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Crédits </h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme XXX, il est <?=date("G:i");?> en ce jour du <?=dateToFrench("now","l j F Y");?>.
                    </li>
                </ol>
                <!--                Main Body-->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card mb-4">
                            <form class="form-horizontal" action="update_traiter_credit.php" method="POST">
                                <div class="card-header">
                                    Etat de la demande de credit.
                                </div>
                                <div class="card-body">
                                    <fieldset>
                                        <div class="table-responsive">
                                            <table class="table  table-hover table-condensed" id="myTable">
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <input type="hidden" name="id_credit" value="<?=$id?>">
                                                        <span class="help-block small-font" >Utilisateur</span>
                                                        <div class="col">
                                                                                <select name="nom" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required >
                                                                                <?php

                                                                $sql = "SELECT DISTINCT * from personnel where id_personnel = '$nom'";

                                                                $stmt = $db->prepare($sql);
                                                                $stmt->execute();

                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                foreach($tables as $table)
                                                                {
                                                                    
                                                                    $i = $table['id_personnel'];
                                                                    echo '<option value ="'.$i.'">';
                                                                        echo $table['nom'].' '.$table['prenom'];
                                                                                echo '</option>';
                                                                }

                                                                ?>
                                                                                    
                                                                                     <?php

                                                $iResult = $db->query('SELECT * FROM personnel');

                                                                            while($data = $iResult->fetch()){

                                                                                $i = $data['id_personnel'];
                                                                             echo '<option value ="'.$i.'">';
                                                                                echo $data['nom'].' '.$data['prenom'];
                                                                                echo '</option>';
                                                        
                                                                            }
                                                    ?>
                                                                                </select>
                                                                               
                                                                               
                                                                                    </div>
                                                    </td>
                                                    <td>
                                                        <span class="help-block small-font" >Nature du crédit</span>
                                                        <div class="col">
                                                            <select name="type_conger" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required="">
                                                                <option value="<?=$type_conger?>" selected=""><?=$type_conger?></option>
                                                                <option value="AVANCE SUR SALAIRE">AVANCE SUR SALAIRE</option>
                                                                <option value="PRÊT D'ARGENT">PRÊT D'ARGENT</option>
                                                                <option value="SUBVENSION">SUBVENSION</option>
                                                                <option value="AUTRE">AUTRE</option>
                                                                
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span class="help-block small-font" >Date de versement désirée</span>
                                                        <div class="col">
                                                            <input type="date" style="width:75%;border-top: 0; border-left: 0;
                                                                border-right: 0;
                                                                background: transparent;" name="start_time" value="<?=$start_time?>" required >
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="help-block small-font" >Modèle de recouvrement</span>
                                                        <div class="col">
                                                            <select name="modalite" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                <option value="<?=$modalite?>" selected=""><?=$modalite?></option>
                                                                <option value="1 MOIS">1 MOIS</option>
                                                                <option value="2 MOIS">2 MOIS</option>
                                                                <option value="3 MOIS">3 MOIS</option>
                                                                <option value="4 MOIS">4 MOIS</option>
                                                                <option value="5 MOIS">5 MOIS</option>
                                                                <option value="6 MOIS">6 MOIS</option>
                                                                <option value="AUTRE">AUTRE</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    <span class="help-block small-font" >Etat du Credit</span>
                                                        <div class="col">
                                                            <select name="etat" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                <option value="1" >Approuver</option>
                                                                <option value="2" >Refuser</option>
                                                                <option value="3" selected>En Attente</option>
                                                                
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td>
                                                    </td>

                                                </tr>
                                                </tbody>
                                            </table>
                                            <table class="table table-bordered table-hover table-condensed" id="myTable">
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="form-group input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Montant</span>
                                                            </div>
                                                            <input type="number" class="form-control" name="montant"  value="<?=$montant?>"  required />
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Fcfa</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <table class="table table-bordered table-hover table-condensed" id="myTable">
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <span class="help-block small-font" >Motif</span>
                                                        <div class="col">
                                                            <input   name="motif" class="form-control" style="width: 100%"  required value="<?=$motif?>"/>
                                                            
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <table class="table table-bordered table-hover table-condensed" id="myTable">
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <span class="help-block small-font" >Observation</span>
                                                        <div class="col">
                                                            <input   name="observation" class="form-control" style="width: 100%"  required value="<?=$observation?>"/>
                                                            
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="card-footer">
                                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups" style="float: right;">
                                        <div class="btn-group mr-2" role="group" aria-label="First group">
                                            <button type="submit" name="approuver"  value="1" class="btn btn-primary" style=" width:120px;" >Enregistrer</button>
                                        </div>
                                        <div class="btn-group mr-2" role="group" aria-label="First group">
                                            <a href="<?=$credit['option1_link']?>" style=" width:120px;" class="btn btn-primary" ><font>Annuler</font></a>
                                        </div>
                                        <div class="btn-group mr-2" role="group" aria-label="Second group">
                                            <!--                                                                <a href="liste_personnels.php" class="btn btn-primary" style="float: right; padding-top: 10px; padding-bottom: 10px; margin-right: 20px"><i class="fas fa-angle-double-down"></i> Annuler</a>-->
                                        </div>
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