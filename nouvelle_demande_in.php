<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');;

?>

<!--Content-->

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Nouvelle demande</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">
                    Hello M/Mme, il est <?=date("G:i");?> en ce jour du <?=dateToFrench("now","l j F Y");?>.
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
                                                <form class="form-horizontal" action="save_ask_in.php" method="POST">
                                                    <div class="card-header">

                                                    </div>
                                                    <div class="card-body">
                                                        <fieldset>
                                                            <div class="table-responsive">
                                                                <table  border="0" class="table  table-hover table-condensed" id="myTable">
                                                                    <tbody>
                                                                    <tr>
                                                                        <?php
                                                                        if($lvl == 5 || $lvl == 6 || $lvl == 8 || $lvl == 7){
                                                                        ?>
                                                                        <td>
                                                        
                                                        <span class="help-block small-font" >SALLE:</span>
                                                        <div class="col">
                                                                                <select name="id_salles" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                                    <option value="" selected="">...</option>
                                                                                    <?php
                                                                                    if($lvl == 7)
                                                                                        $query = "SELECT * FROM salles WHERE secteur = '$num_secteur_user'";
                                                                                    if($lvl == 3)
                                                                                        $query = "SELECT * FROM salles WHERE id_salles = $id_salle_user";
                                                                                    else
                                                                                        $query = "SELECT * FROM salles";

                                                                                $iResult = $db->query($query);

                                                                            while($data = $iResult->fetch()){

                                                                                $i = $data['id_salles'];
                                                                                $nom = $data['nom'];
                                                                             echo '<option value ="'.$i.'">';
                                                                                echo strtoupper($data['nom']);
                                                                                echo '</option>';
                                                                            
                                                        
                                                                            }
                                                    ?>

                                                                    
                                                                                </select>

                                                                        <button type="button" data-toggle="modal"   style="background-color: transparent"><a href="liste_salle.php"><i class="fas fa-plus"></i></a>
                                                                                
                                                                            </button>
                                                                                    </div>
                                                    </td>
                                                    <?php }else{ ?>
                                                    <td>
                                                        
                                                        <span class="help-block small-font" >SALLE:</span>
                                                        <div class="col">
                                                            <input name="id_salles" type="hidden" value="<?=$id_salle_user?>">
                                                            <input value="<?=$salle_user?>"  style="width:75%;
                                                                        border-top: 0; border-left: 0;
                                                                        border-right: 0;
                                                                        background: transparent;" disabled>
                                                                                    
                                                        </div>
                                                    </td>
                                                    <?php } ?>
                                                    
                                                    
                                                                        <td style="width: 50%"> 
                                                        <span class="help-block small-font" >DATE DE DEMANDE:</span>
                                                        <div class="col">
                                                            <input type="date" name="date_debut" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"  required>
                                                        </div>
                                                    <td>
                                                    </tr>
                                                                        
                                                                    </tbody>
                                                                </table>
                                                                <table class="table table-bordered table-hover table-condensed" id="myTable">
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <span class="help-block small-font" >NATURE DU PROBLEME:</span>
                                                        <div class="col">
                                                            <textarea name="nature" class="form-control" style="width: 100%" required></textarea>
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
                                    
                                                        <a href="liste_demande_in.php" style=" width:150px;" class="btn btn-primary" ><font>Annuler</font></a>
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




    <!--//Footer-->
<?php
include('foot.php');
?>