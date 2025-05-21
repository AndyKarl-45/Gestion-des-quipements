<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');;

?>

<!--Content-->
<?php
$id=$_REQUEST['id'];

$query  = "SELECT * from sanction where id_sanction='".$id."'";
$q = $db->query($query);
while($row = $q->fetch())
{ 
    /*-------------------- ETAT CIVILE --------------------*/
    $id_personnel = $row['id_personnel'];
    $nature=$row['nature'];
    $motif=$row['motif'];
    $date_sanction=$row['date_sanction'];
    $montant=$row['montant'];
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Sanction: <?=$nature?></h1>
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
                                                <form class="form-horizontal" action="update_sanction.php" method="POST">
                                                    <div class="card-header">

                                                    </div>
                                                    <div class="card-body">
                                                        <fieldset>
                                                            <div class="table-responsive">
                                                                <table  border="0" class="table  table-hover table-condensed" id="myTable">
                                                                    <tbody>
                                                                    <tr>
                                                                         <td>
                                                <input type="hidden" name="id_sanction" value="<?=$id ?>">
                                                                            <span class="help-block small-font" >NOM DE L'EMPLOYE:</span>

                                                                            <div class="col">
                                                                                <select name="id_personnel" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" >
                                                                                    <option value="<?=$id_personnel ?>" selected=""><?php

                                                                $sql = "SELECT DISTINCT * from personnel where id_personnel = '$id_personnel'";

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
                                                                                </select>                                                                            <button type="button" data-toggle="modal"   style="background-color: transparent"><a href="nouveau_personnel.php"><i class="fas fa-plus"></i></a>
                                                                                
                                                                            </button>
                                                                            </div>
                                                                        </td>
                                                                        <td>

                                                                            <span class="help-block small-font" >DATE:</span>
                                                                            <div class="col">
                                                                                <input type="date" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="date_sanction" value="<?=$date_sanction?>" required>
                                                                            </div>

                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                              <td>
                                                                            <span class="help-block small-font" >NATURE:</span>

                                                                            <div class="col">
                                                                                <select name="nature" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                                    <option value="<?=$nature?>" selected=""><?=$nature?></option>
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

                                                                         <td>
                                                                             <span class="help-block small-font" >.</span>
                                                        <div class="form-group input-group" style="width: 75%">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Montant</span>
                                                            </div>
                                                            <input type="number" class="form-control" name="montant"  value="<?=$montant?>" required/>
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
                                                        <span class="help-block small-font" >MOTIF:</span>
                                                        <div class="col">
                                                           <!--  <textarea name="motif" class="form-control" style="width: 100%" required></textarea> -->
                                                           <input type="text" name="motif" class="form-control" style="width: 100%" value="<?=$motif?>" required>
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
<?php
    }
    ?>
  <?php 

                    include("ajouter_nature_sanction.php");
                      ?>


    <!--//Footer-->
<?php
include('foot.php');
?>