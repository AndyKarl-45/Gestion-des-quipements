<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

?>

<!--Content-->

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Nouvelle Salle</h1>
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
                                                <form class="form-horizontal" action="save_salle.php" method="POST">
                                                    <div class="card-header">

                                                    </div>
                                                    <div class="card-body">
                                                        <fieldset>
                                                            <div class="table-responsive">
                                                                <table  border="0" class="table  table-hover table-condensed" width="100%" cellspacing="0" id="myTable">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <span class="help-block small-font" >CODE:</span>
                                                                            <div class="col">
                                                                                <input style="width:75%; border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                " name="code" >
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >SECTEUR:</span>

                                                                            <div class="col">
                                                                                <select name="secteur" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" >
                                                                                    <option value="" selected="">...</option>
                                                                                    <?php

                                        $iResult = $db->query('SELECT * FROM secteur');

                                                                    while($data = $iResult->fetch()){

                                                                        $i = $data['numero_secteur'];
                                                                        echo '<option value ="'.$i.'">';
                                                                        echo $data['numero_secteur'];
                                                                        echo '</option>';
                                                
                                                                    }
                                                    ?>

                                                                                </select>                                                                           <button type="button" data-toggle="modal"  style="background-color: transparent"><a href="nouveau_secteur.php"><i class="fas fa-plus"></i></a>
                                                                                
                                                                            </button>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>

                                                                        <td>
                                                                            <span class="help-block small-font" >NOM:</span>
                                                                            <div class="col">
                                                                                <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="nom" >
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                        <span class="help-block small-font" >PAYS:</span>
                                                                            <div class="col">
                                                                                <select name="pays" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" >
                                                                                    <option value="" selected="">...</option>
                                                                                    <?php

                                        $iResult = $db->query('SELECT * FROM pays');

                                                                                while($data = $iResult->fetch()){

                                                                                    $i = $data['nom'];
                                                                                    echo '<option value ="'.$i.'">';
                                                                                    echo $data['nom'];
                                                                                    echo '</option>';
                                                            
                                                                                }
                                                    ?>
                                    

                                                                                </select>
                                                                                <button type="button" data-toggle="modal" data-target="#ajouterPays"  style="background-color: transparent">
                                                                                <i class="fas fa-plus"></i>
                                                                            </button>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <span class="help-block small-font" >VILLE:</span>
                                                                            <div class="col">
                                                                                <select name="ville" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" >
                                                                                    <option value="" selected="">...</option>
                                                                                    <?php

                                                                                    $iResult = $db->query('SELECT * FROM ville');

                                                                                    while($data = $iResult->fetch()){

                                                                                        $i = $data['nom'];
                                                                                        echo '<option value ="'.$i.'">';
                                                                                        echo $data['nom'];
                                                                                        echo '</option>';

                                                                                    }
                                                                                    ?>


                                                                                </select>
                                                                            </div>

                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >QUARTIER:</span>
                                                                            <div class="col">
                                                                                <select name="quartier" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" >
                                                                                    <option value="" selected="">...</option>
                                                                                    <?php

                                                                                    $iResult = $db->query('SELECT * FROM quartier');

                                                                                    while($data = $iResult->fetch()){

                                                                                        $i = $data['nom'];
                                                                                        echo '<option value ="'.$i.'">';
                                                                                        echo $data['nom'];
                                                                                        echo '</option>';

                                                                                    }
                                                                                    ?>


                                                                                </select>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <span class="help-block small-font" >TEL:</span>
                                                                            <div class="col">
                                                                                <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="tel" >
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >NOM DU RESPONSABLE:</span>

                                                                            <div class="col">
                                                                                <select name="responsable" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" >
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
                                                                                </select>                                                                            <button type="button" data-toggle="modal"   style="background-color: transparent"><a href="nouveau_personnel.php"><i class="fas fa-plus"></i></a>
                                                                                
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
                                                                                        
                                                      <center> <button type="submit" style=" width:150px;"  name="submit_salle"  class="btn btn-primary" >Enregistrer</button>
                                    
                                                        <a href="liste_salle.php" style=" width:150px;" class="btn btn-primary" ><font>Annuler</font></a>
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



<!--    Modal pour ajouter Categorie Contrat-->
<?php 
 include("ajouter_pays.php");
?>


    <!--//Footer-->
<?php
include('foot.php');
?>