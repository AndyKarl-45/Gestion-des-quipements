<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');;

?>

<!--Content-->
<?php
$id=$_REQUEST['id'];

$query  = "SELECT * from secteur where id_secteur='".$id."'";
$q = $db->query($query);
while($row = $q->fetch())
{ 
    /*-------------------- ETAT CIVILE --------------------*/
    $nom = $row['nom'];
    $numero_secteur=$row['numero_secteur'];
    $tel=$row['tel'];
    $responsable=$row['responsable'];
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Secteur: <?=$nom ?></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">
                    Hello M/Mme XXX, il est <?=date("G:i");?> en ce jour du <?=dateToFrench("now","l j F Y");?>.
                </li>
            </ol>
            <!--                Main Body-->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <b>
                                <!-- Nav pills -->
                                <ul class="nav nav-pills">

                                </ul>
                            </b>
                        </div>

                        <div class="card-body">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!-- Etat Civile-->
                                <div class="tab-pane container active" id="home">
                                    <!-- infos civile-->



                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="card mb-4">
                                                <form class="form-horizontal" action="update_secteur.php" method="POST">
                                                    <div class="card-header">

                                                    </div>
                                                    <div class="card-body">
                                                        <fieldset>
                                                            <div class="table-responsive">
                                                                <table  border="0" class="table  table-hover table-condensed" id="myTable">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <input type="hidden" name="id_secteur" value="<?=$id ?>">
                                                                            <span class="help-block small-font" >N° DU SECTEUR:</span>
                                                                            <div class="col">
                                                                                <input type="text" style="width:75%; border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                " name="numero_secteur" value="<?=$numero_secteur?>" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >NOM:</span>

                                                                            <div class="col">
                                                                                <input type="text" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="nom" value="<?=$nom?>" required>
                                                                            </div>                   
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                              <td>
                                                                        <span class="help-block small-font" >NOM DU RESPONSABLE:</span>
                                                                            <div class="col">
                                                                                <select name="responsable" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" >
                                                                                    <option value="<?=$responsable?>" selected=""><?php

                                                                $sql = "SELECT DISTINCT * from personnel where id_personnel = '$responsable'";

                                                                $stmt = $db->prepare($sql);
                                                                $stmt->execute();

                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                foreach($tables as $table)
                                                                {
                                                                    echo $table['nom'].' '.$table['prenom'];
                                                                }

                                                                ?>
                                                              </option>
                                                                                    <?php

                                                $iResult = $db->query('SELECT * FROM personnel');

                                                                            while($data = $iResult->fetch()){

                                                                                $i = $data['id_personnel'];
                                                                             echo '<option value ="'.$i.'">';
                                                                                echo $data['nom'].' '.$data['prenom'];
                                                                                echo '</option>';
                                                        
                                                                            }
                                                    ?>
                                                                                </select>                                                                          <button type="button" data-toggle="modal"   style="background-color: transparent"><a href="nouveau_personnel.php"><i class="fas fa-plus"></i></a>
                                                                                
                                                                            </button>
                                                                        </td>                                                   

                                                                        <td>
                                                                            <span class="help-block small-font" >TEL:</span>
                                                                            <div class="col">
                                                                                <input style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="tel" value="<?=$tel?>" required>
                                                                            </div>
                                                                        </td>

                                                                    </tr>
                                                                        
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </fieldset>
                                                    </div>

                                                    <div class="card-footer">
                                                       
                                                    </div>

                                            </div>
                                        </div>
                                    </div>
                                                                                        
                                                      <center> <button type="submit" style=" width:150px;"   class="btn btn-primary" >Enregistrer</button>
                                    
                                                        <a href="liste_secteur.php" style=" width:150px;" class="btn btn-primary" ><font>Annuler</font></a>
                                                        </center>
                                                          </form> 
                                </div>

                              </div>
                        </div>
                        <div class="card-footer">

                        </div>
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

<!--    Modal pour ajouter Situation Matrimoniale-->
<div class="modal fade" id="ajouterSecteur" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
                <h3 align="center"><b>Nouveau Secteur</b></h3>
                <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <form class="form-horizontal" action="#" name="form" method="post">
                    <div class="form-group">
                        <label>Intitulé:</label>
                        <div class="col-sm-12">
                            <input type="text" name="secteur" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="submit" name="submit_sm" class="btn btn-primary" value="Créer">
                            <input type="reset" name="" class="btn btn-warning" value="Effacer Formulaire">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--    Modal pour ajouter Poste-->
<div class="modal fade" id="ajouterPoste" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
                <h3 align="center"><b>Nouveau Poste</b></h3>
                <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <form class="form-horizontal" action="#" name="form" method="post">
                    <div class="form-group">
                        <label>Intitulé</label>
                        <div class="col-sm-12">
                            <input type="text" name="poste" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="submit" name="submit_poste" class="btn btn-primary" value="Créer">
                            <input type="reset" name="" class="btn btn-warning" value="Effacer Formulaire">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--    Modal pour ajouter Statut-->
<div class="modal fade" id="ajouterPays" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
                <h3 align="center"><b>Nouveau Pays</b></h3>
                <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <form class="form-horizontal" action="#" name="form" method="post">
                    <div class="form-group">
                        <label>Nom du pays:</label>
                        <div class="col-sm-12">
                            <input type="text" name="pays" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="submit" name="submit_statut" class="btn btn-primary" value="Créer">
                            <input type="reset" name="" class="btn btn-warning" value="Effacer Formulaire">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--    Modal pour ajouter Categorie Contrat-->
<div class="modal fade" id="ajouterCc" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
                <h3 align="center"><b>Nouvelle Categorie Contrat</b></h3>
                <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <form class="form-horizontal" action="#" name="form" method="post">
                    <div class="form-group">
                        <label>Intitulé</label>
                        <div class="col-sm-12">
                            <input type="text" name="intitule" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="submit" name="submit_cs" class="btn btn-primary" value="Créer">
                            <input type="reset" name="" class="btn btn-warning" value="Effacer Formulaire">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <!--//Footer-->
<?php
include('foot.php');
?>