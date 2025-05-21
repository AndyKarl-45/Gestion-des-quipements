<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Mes Credits</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme XXX, il est <?=date("G:i");?> en ce jour du <?=dateToFrench("now","l j F Y");?>.
                    </li>
                </ol>
                <!--                Main Body-->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card mb-4">
                            <form class="form-horizontal" action="save_credit.php" method="POST">
                                <div class="card-header">
                                    Formulaire de demande Financière
                                </div>
                                <div class="card-body">
                                    <fieldset>
                                        <div class="table-responsive">
                                            <table class="table  table-hover table-condensed" id="myTable">
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <span class="help-block small-font" >Utilisateur</span>
                                                        <div class="col">
                                                                                <select name="nom" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                                    <option value="" selected="">...</option>
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
                                                                                <button type="button" data-toggle="modal"   style="background-color: transparent"><a href="nouveau_personnel.php"><i class="fas fa-plus"></i></a>
                                                                                
                                                                            </button>
                                                                                    </div>
                                                    </td>
                                                    <td>
                                                        <span class="help-block small-font" >Nature du crédit</span>
                                                        <div class="col">
                                                            <select name="type_conger" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>>
                                                                <option value="" selected="">...</option>
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
                                                                                background: transparent;" name="start_time" required>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="help-block small-font" >Modèle de recouvrement</span>
                                                        <div class="col">
                                                 <input type="number" style="width:35%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="modalite" required>moi(s)

                                                        </div>
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
                                                            <input type="number" class="form-control" name="montant" required/>
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
                                                            <textarea name="motif" class="form-control" style="width: 100%" required></textarea>
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
                                            <button type="submit" name="submit_etat_civil" class="btn btn-primary" >Engager la demande</button>
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

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-scroll"></i>
                                <b>Historique des demandes crédits</b>
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
                                                            <th><p align="center">Utilisateur</p></th>
                                                            <!-- <th><p align="center">Date d'émission</p></th> -->
                                                            <th><p align="center">Nature crédit</p></th>
                                                            <th><p align="center">Date voulue</p></th>
                                                            <th><p align="center">Modèle Recouvrement</p></th>
                                                            <th><p align="center">Montant</p></th>
                                                            <th><p align="center">Motif</p></th>
                                                             <th><p align="center">Observation Manager</p></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php

                                                    $query = "SELECT * from credit ";
                                                        $q = $db->query($query);
                                                        while($row = $q->fetch())
                                                        {
                                                            $nom = $row['nom'];
                                                            $type_conger = $row['type_conger'];
                                                            $start_time = $row['start_time'];
                                                            $modalite = $row['modalite'];
                                                            $montant = $row['montant'];
                                                            $motif = $row['motif'];
                                                            $observation = $row['observation'];
                                                            $etat = $row['etat'];

                                                     ?>
                                                     <tr>
                                                                
                                                            <td align="center">
                                                                <?php

                                                                $sql = "SELECT DISTINCT * from personnel where id_personnel = '$nom'";

                                                                $stmt = $db->prepare($sql);
                                                                $stmt->execute();

                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                foreach($tables as $table)
                                                                {
                                                                    echo $table['nom'].' '.$table['prenom'];
                                                                }

                                                                ?>
                                                            </td>
                                                            <td align="center"><?php echo $type_conger; ?>  </td>
                                                            <td align="center"><?php echo $start_time; ?>  </td>       
                                                            <td align="center"><?php echo $modalite; ?>  </td> 
                                                            <td align="center"><?php echo $montant; ?>  </td>
                                                            <td align="center"><?php echo $motif; ?>  </td>
 <?php 
                                                            if($etat==1){
                                                               echo'<td align="center" style="color: green"><b>'.$observation.'</b></td>'; 
                                                           }elseif($etat==2){
                                                            echo'<td align="center" style="color: red"><b>'.$observation.'</b></td>';
                                                            }elseif($etat==3){
                                                                   echo'<td align="center"><input style=" width:120px;"    class="btn btn-warning" value="En attente"/></td>';
                                                               }else{
                                                                echo'<td align="center">'.$observation.'</td>';
                                                               }
                                                             ?>  

                                                        <?php } ?>
                                                    </tbody>
                                                        <tfoot>
                                                        <tr class="bg-primary">
                                                            <th><p align="center">Utilisateur</p></th>
                                                            <!-- <th><p align="center">Date d'émission</p></th> -->
                                                            <th><p align="center">Nature crédits</p></th>
                                                            <th><p align="center">Date voulue</p></th>
                                                            <th><p align="center">Modèle Recouvrement</p></th>
                                                            <th><p align="center">Montant</p></th>
                                                            <th><p align="center">motif</p></th>
                                                            <th><p align="center">Observation Manager</p></th>
                                                        </tr>
                                                        </tfoot>
                                                        <tbody></tbody>
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

            </div>
        </main>
    </div>


    <!--//Footer-->
<?php
include('foot.php');
?>