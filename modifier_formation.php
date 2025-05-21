<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

?>
<?php
$id=$_REQUEST['id'];

$query  = "SELECT * from formation where id_formation='".$id."'";
$q = $db->query($query);
while($row = $q->fetch())
{ 
    /*-------------------- ETAT CIVILE --------------------*/
   
    $id_personnel = $row['id_personnel'];
    $date_formation = $row['date_formation'];
    $statut = $row['statut'];
    $observation = $row['observation'];
?>

<!--Content-->

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Formation: <?php  $sql = "SELECT DISTINCT * from personnel where id_personnel = '$id_personnel'";

                                                                $stmt = $db->prepare($sql);
                                                                $stmt->execute();

                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                foreach($tables as $table)
                                                                {
                                                                    echo $table['nom'].' '.$table['prenom'];
                                                                }

                                                                ?></h1>
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
                                                <form class="form-horizontal" action="update_formation.php" method="POST">
                                                    <div class="card-header">

                                                    </div>
                                                    <div class="card-body">
                                                        <fieldset>
                                                            <div class="table-responsive">
                                                                <table  border="0" class="table  table-hover table-condensed" width="100%" cellspacing="0" id="myTable">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <input type="hidden" name="id_formation" value="<?=$id?>">
                                                                            <span class="help-block small-font" >NOM DU POSTULANT:</span>

                                                                            <div class="col">
                                                                                <select name="id_personnel" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" >
                                                                                    <option value="<?=$id_personnel?>" selected="">
                                                        <?php  $sql = "SELECT DISTINCT * from personnel where id_personnel = '$id_personnel'";

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

                                                $iResult = $db->query('SELECT * FROM personnel where statut="POSTULANT"');

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
                                                                            <span class="help-block small-font" >STATUT:</span>

                                                                            <div class="col">
                                                                                <select name="statut" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" >
                                                                                    <option value="<?=$statut?>" ><?php 
                                                                                    if($statut==1){
                                                                                        echo'Valider';
                                                                                    }elseif ($statut==2) {
                                                                                        echo'Refuser';
                                                                                    }else{
                                                                                        echo'En cours...';
                                                                                    }
                                                                                    ?>
                                                                                     </option>
                                                                                    <option value="1">Valider</option>
                                                                                    <option value="2">Refuser</option>
                                                                                    <option value="3" selected>En cours...</option>         
                                                                                </select>                  
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>

                                                                        <td>
                                                                            <span class="help-block small-font" >DATE_FORMATION:</span>
                                                                            <div class="col">
                                                                                <input type="date" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="date_formation" value="<?=$date_formation?>" required>
                                                                            </div>
                                                                        </td>
                                                                        <td></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                <table class="table table-bordered table-hover table-condensed" id="myTable">
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <span class="help-block small-font" >OBSERVATION:</span>
                                                        <div class="col">
                                                            <input type="text" style="width: 100%" name="observation" value="<?=$observation?>"  required>
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
                                    
                                                        <a href="liste_formation.php" style=" width:150px;" class="btn btn-primary" ><font>Annuler</font></a>
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



<!--    Modal pour ajouter Categorie Contrat-->
<?php 
 include("ajouter_pays.php");
?>


    <!--//Footer-->
<?php
include('foot.php');
?>