<?php

include('first.php');
include("php/db.php");
include('php/navbar_links.php');
include('php/main_side_navbar.php');

$query  = "SELECT count(id_sanction) as total from sanction";
$q = $conn->query($query);
while($row = $q->fetch_assoc())
{
    $total = $row["total"];
}
$id_sanction = $total + 1;

?>

<!--Content-->

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Nouvelle Sanction</h1>
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
                                                <form class="form-horizontal" action="save_sanction.php" method="POST">
                                                    <div class="card-header">
                                                        <?php
                                                echo '<input name="id" type="hidden" value="'.$id_sanction.'">';
                                                ?>

                                                    </div>
                                                    <div class="card-body">
                                                        <fieldset>
                                                            <div class="table-responsive">
                                                                <table  border="0" class="table  table-hover table-condensed" id="myTable">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <span class="help-block small-font" >NOM DE L'EMPLOYE:</span>
                                                                            
                                                                            <div class="col">
                                                                                <select name="personnel" style="width:75%; border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                                    <option value="1" selected="">...</option>
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
                                                                        <td>
                                                                            <span class="help-block small-font" >NATURE:</span>

                                                                            <div class="col">
                                                                                <select name="nature" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                                    <option value="" selected="">...</option>
                                                                                    <?php

                                        $iResult = $db->query('SELECT * FROM nature_sanction');

                                                                    while($data = $iResult->fetch()){

                                                                        $i = $data['nom'];
                                                                        echo '<option value ="'.$i.'">';
                                                                        echo $data['nom'];
                                                                        echo '</option>';
                                                
                                                                    }
                                                    ?>
                                                                                </select>                                                                            <button type="button" data-toggle="modal" data-target="#ajouterNature_sanction"  style="background-color: transparent">
                                                                                <i class="fas fa-plus"></i>
                                                                            </button>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                                    <tr>
                                                                        
                                                                         <td>
                                                        <div class="form-group input-group" style="width: 75%">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Montant</span>
                                                            </div>
                                                            <input type="number" class="form-control" name="montant"   required/>
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Fcfa</span>
                                                            </div>
                                                        </div>
                                                    </td>

                                                                        <td>

                                                                            <span class="help-block small-font" >DATE:</span>
                                                                            <div class="col">
                                                                                <input type="date" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="date1" required>
                                                                            </div>

                                                                        </td>
                                                                    </tr>
                                                                    <tr>
<!--                                                                         <td>
                                                                            <span class="help-block small-font" >PIECE(S) JOINTE(S):</span>
                                                                            <div class="col">
                                                                                <input id="fichier"  type="file" name="fichier1" style="width:75%;; border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" class="form-control">
                                                                            </div>
                                                                        </td> -->
                                                                                                                                           
                                                                        
                                                                    </tr>       
                                                                    </tbody>
                                                                </table>
                                                                <table class="table table-bordered table-hover table-condensed" id="myTable">
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <span class="help-block small-font" >MOTIF:</span>
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
                                                             
                                                       
                                                    </div>


                                            </div>
                                        </div>
                                    </div>
                                                          <center> <button type="submit" style=" width:150px;"  name="submit_salle" class="btn btn-primary" >Enregistrer</button>
                                    
                                                        <a href="liste_sanction.php" style=" width:150px;" class="btn btn-primary" ><font>Annuler</font></a>
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
    <?php 

                    include("ajouter_nature_sanction.php");
                      ?>






    <!--//Footer-->
<?php
include('foot.php');
?>