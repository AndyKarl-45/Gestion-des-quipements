<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

?>
<?php
$id_materiel=$_REQUEST['id'];

$query  = "SELECT * from materiel where id_materiel='".$id_materiel."'";
$q = $db->query($query);
while($row = $q->fetch())
{ 
    $id_materiel = $row['id_materiel'];
    /*-------------------- ETAT CIVILE --------------------*/
    $ref_materiel = $row['ref_materiel'];
    $designation = $row['designation'];
    $quantite = $row['quantite'];
    $id_cat_materiel = $row['id_cat_materiel'];
    $prix_unitaire=$row['prix_unitaire'];
    $prix_total=$row['prix_total'];
?>
<!--Content-->

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Modifier équipement: <?=$designation?> </h1>
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
                                                <form class="form-horizontal" action="update_materiaux.php" method="POST">
                                                    <div class="card-header">
                                                        <input type="hidden" name="id_materiel" value="<?=$id_materiel?>">
                                                    </div>
                                                    <div class="card-body">
                                                        <fieldset>
                                                            <div class="table-responsive">
                                                                <table  border="0" class="table  table-hover table-condensed" width="100%" cellspacing="0" id="myTable">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td style="width: 50%">
                                                                            <span class="help-block small-font" >NUMÉRO DE SÉRIE:</span>
                                                                            <div class="col">
                                                                                <input  style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="ref_materiel" value="<?=$ref_materiel?>" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >DESIGNATION:</span>
                                                                     <div class="col">
                                                                                <input  style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="designation"  value="<?=$designation?>" required>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                         <td>
                                                                            <span class="help-block small-font" >QUANTITÉ(S):</span>
                                                                            <div class="col">
                                                                                <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="quantite" value="<?=$quantite?>" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                        <span class="help-block small-font" >CATEGORIE MATÉRIAUX:</span>
                                                            <div class="col">
                                                                <select name="id_cat_materiel" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                                    <option value="<?=$id_cat_materiel?>" selected="">
                                                        <?php
                                                         $sql = "SELECT DISTINCT * from categorie_materiel where id_cat_materiel = '$id_cat_materiel' ";

                                                                $stmt = $db->prepare($sql);
                                                                $stmt->execute();

                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                foreach($tables as $table)
                                                                {
                                                                    echo $table['nom'];
                                                                }

                                                                ?>
                                                                                    </option>
                                                                                    <?php

                                                                                         $iResult = $db->query("SELECT * FROM categorie_materiel  where open_close!='1' ");

                                                                                            while($data = $iResult->fetch()){

                                                                                                $i = $data['id_cat_materiel'];
                                                                                                echo '<option value ="'.$i.'">';
                                                                                                echo $data['nom'];
                                                                                                echo '</option>';
                                                            
                                                                                                     }
                                                                                     ?>               
                                                                             </select>                                                                 <button type="button"   style="background-color: transparent; border-radius: 20px; border-color: black; border-bottom-color: yellow; border-top-color: red;
                                                                    border-right-color: blue;
                                                                    border-left-color: orange;">
                                                                    <a href="liste_cat_materiel.php"><i class="fas fa-plus"></i></a>
                                                                    </button>


                                                                            </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <span class="help-block small-font" >PRIX UNITAIRE:</span>
                                                                            <div class="col">
                                                                                <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray" name="prix_unitaire" value="<?=$prix_unitaire?>" required>
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
                                    
                                                        <a href="liste_materiaux.php" style=" width:150px;" class="btn btn-primary" ><font>Annuler</font></a>
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



    <!--//Footer-->
<?php
include('foot.php');
?>