<?php

include('first.php');
include('php/main_side_navbar.php');

?>

<!--Content-->

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Nouvelle Permission</h1>
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
                                                <form class="form-horizontal" action="save_permission.php" method="POST">
                                                    <div class="card-header">

                                                    </div>
                                                    <div class="card-body">
                                                        <fieldset>
                                                            <div class="table-responsive">
                                                                <table  border="0" class="table  table-hover table-condensed" id="myTable">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <span class="help-block small-font" >NOM DU PERSONNEL:</span>
                                                                            <div class="col">
                                                                                <select name="id_personnel" style="width:75%" required>
                                                                                    <option value="" selected="">...</option>
                                                                                </select>                                                                            <button type="button" data-toggle="modal" data-target="#ajouterPersonnel"  style="background-color: transparent"><a href="nouveau_personnel.php"><i class="fas fa-plus"></i></a>
                                                                                
                                                                            </button>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >Nature:</span>

                                                                            <div class="col">
                                                                                <select name="nature" style="width:75%" required>
                                                                                    <option value="" selected="">...</option>
                                                                                </select>                                                                            <button type="button" data-toggle="modal" data-target="#ajouterNature"  style="background-color: transparent">
                                                                                <i class="fas fa-plus"></i>
                                                                            </button>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>

                                                                        <td>
                                                                            <span class="help-block small-font" >Secteur:</span>
                                                                            <div class="col">
                                                                                <select name="secteur" style="width:75%" required>
                                                                                    <option value="" selected="">...</option>
                                                                                </select>                                                                            <button type="button" data-toggle="modal" data-target="#ajouterSecteur"  style="background-color: transparent">
                                                                                <i class="fas fa-plus"></i>
                                                                            </button>
                                                                        </td>
                                                                        <td>
                                                                        <span class="help-block small-font" >Poste:</span>
                                                                            <div class="col">
                                                                                <select name="poste" style="width:75%" required>
                                                                                    <option value="" selected="">...</option>
                                                                                </select>                                                                            <button type="button" data-toggle="modal" data-target="#ajouterPoste"  style="background-color: transparent">
                                                                                <i class="fas fa-plus"></i>
                                                                            </button>  </div> 
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                           <span class="help-block small-font" >Date de mis en congé:</span>
                                                                            <div class="col">
                                                                                <input type="date" style="width:75%" name="date_debut_conge" required>
                                                                            </div>
<!--                                                                                    <button type="button" data-toggle="modal" data-target="#ajouterFonction"  style="background-color: transparent">-->
<!--                                                                                        <i class="fas fa-plus"></i>-->
<!--                                                                                    </button>-->
<!--                                                                                    <div class="col">-->
<!--                                                                                        <select name="fonction" style="width:75%" required>>-->
<!--                                                                                            <option value="" selected="">...</option>-->
<!--                                                                                            --><?php
//
//                                                                                            $iResult = $conn->query("SELECT * FROM fonctions");
//
//                                                                                            while($data = $iResult->fetch_assoc()){
//                                                                                                $id = $data['intitule'];
//                                                                                                echo '<option value ="'.$id.'">';
//                                                                                                echo $id;
//                                                                                                echo '</option>';
//                                                                                            }
//                                                                                            ?>
<!--                                                                                        </select>-->
<!--                                                                                    </div>-->
                                                                        </td>
                                                                        <td>
                                                                           <span class="help-block small-font" >Date de retour en congé:</span>
                                                                            <div class="col">
                                                                                <input type="date" style="width:75%" name="date_retour_conge" required>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <span class="help-block small-font" >Motif:</span>

                                                                            <div class="col">
                                                                                <select name="motif" style="width:75%" required>
                                                                                    <option value="" selected="">...</option>
                                                                                </select>                                                                            <button type="button" data-toggle="modal" data-target="#ajouterMotif"  style="background-color: transparent">
                                                                                <i class="fas fa-plus"></i>
                                                                            </button>
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
                                                                                        
                                                      <center> <button type="submit" style=" width:150px;"  name="submit_permission" class="btn btn-primary" >Enregistrer</button>
                                    
                                                        <a href="liste_permission.php" style=" width:150px;" class="btn btn-primary" ><font>Annuler</font></a>
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
                        <label>Intitulé:</label>
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
<div class="modal fade" id="ajouterNature" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
                <h3 align="center"><b>Nouvelle Nature de Permission</b></h3>
                <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <form class="form-horizontal" action="#" name="form" method="post">
                    <div class="form-group">
                        <label>Intitulé:</label>
                        <div class="col-sm-12">
                            <input type="text" name="nature_permission" class="form-control">
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
<div class="modal fade" id="ajouterMotif" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
                <h3 align="center"><b>Nouveau Motif</b></h3>
                <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <form class="form-horizontal" action="#" name="form" method="post">
                    <div class="form-group">
                        <label>Intitulé:</label>
                        <div class="col-sm-12">
                            <input type="text" name="motif" class="form-control">
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