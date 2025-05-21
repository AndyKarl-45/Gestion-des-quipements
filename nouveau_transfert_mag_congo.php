<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Nouveau transfert d'équipement</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme XXX, il est <?=date("G:i");?> en ce jour du <?=dateToFrench("now","l j F Y");?>.
                    </li>
                </ol>
                <!--                Main Body-->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card mb-4">
                            <form class="form-horizontal" action="save_transfert_mag.php" method="POST">
                                <div class="card-header">
                                   <!--  <ul class="nav nav-pills">
                                    <li class="nav-item">
                                       <button type="submit" style=" width:150px;"  name="submit_salle"  class="btn btn-primary" >Enregistrer</button>
                                    </li>                                    
                                </ul> -->
                                </div>
                                <div class="card-body">
                                    <fieldset>
                                        <div class="table-responsive">
                                            <table class="table  table-hover table-condensed" id="myTable">
                                                <tbody>
                                                <tr>
                                                    <td style="width: 50%">
                                                        <input type="hidden" name="emetteur" value="O">
                                                        <span class="help-block small-font" >Magasins:</span>
                                                        <div class="col">

                                                                                <select name="magasin" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                                    <option value="" selected="N">...</option>
                                                                                    <option value="E" >Mag d'enregistrement</option>
                                                                                    <option value="C" >Mag centrale</option>
                                                                                    <option value="M" >Mag Maintenance</option>
                                                                                 </select>

                                                                        
                                                                                    </div>
                                                    </td>
                                                
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
                                            

                         <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-scroll"></i>
                                <b>Liste des équipements </b>
                            </div>
                            
                        </div>
                                            
                                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                                        <thead>
                                                        <tr class="bg-primary">
                                                            <!-- <th><p align="center" style="color: white">Réferences</p></th> -->
                                                            <th><p align="center" style="color: white">Désignations</p></th>
                                                            <th><p align="center" style="color: white">Catégorie de matériaux</p></th>
                                                            <th><p align="center" style="color: white">Quantités</p></th>
                                                            <th><p align="center" style="color: white">Options</p></th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                     <?php

                                                        $query = "SELECT * from materiel where open_close!='1' and id_salles='0' and mag='O' ";
                                                        $q = $db->query($query);
                                                        while($row = $q->fetch())
                                                        {
                                                            $id_materiel = $row['id_materiel'];
                                                            $ref_materiel = $row['ref_materiel'];
                                                            $designation = $row['designation'];
                                                            $id_cat_materiel = $row['id_cat_materiel'];
                                                            $prix_total=$row['prix_total'];
                                                            $quantite =$row['quantite'];

                                                            ?>

                                                            <tr>
                                                                <input name="prix" type="hidden" value="<?php echo $prix_total;?>" />

                                                        <!-- <td align="center"> <?php echo $ref_materiel; ?>   </td> -->
                                                        <td align="center"> <?php echo $designation; ?>   </td>
                                                        <td align="center">
                                                         <?php
                                                         $sql = "SELECT DISTINCT * from categorie_materiel where id_cat_materiel = '$id_cat_materiel'";

                                                                $stmt = $db->prepare($sql);
                                                                $stmt->execute();

                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                foreach($tables as $table)
                                                                {
                                                                    echo $table['nom'];
                                                                }

                                                                ?>
                                                               </td>


                <td align="center"><input type="number"  style=" width: 50px; height: 25px" name="quantite[]" value="<?=$quantite?>" min="1" max="<?=$quantite?>" ></td>
                <td align="center" style="width: 18%">
                <div class="btn-group mr-2" role="group" aria-label="First group">
                                  <input type="checkbox"  style=" width: 25px; height: 25px" name="id_mat[]" value="<?=$id_materiel?>" >
                            
                        </div>              
                                    
                            
                        
                 </td>  

                                                              
                                                            </tr>

                                                        <?php } ?> 
                                                    </tbody>

                                                        <tfoot>
                                                            <tr class="bg-primary">
                                                            <!-- <th><p align="center" style="color: white">Réferences</p></th> -->
                                                            <th><p align="center" style="color: white">Désignations</p></th>
                                                            <th><p align="center" style="color: white">Catégorie de matériaux</p></th>
                                                            <th><p align="center" style="color: white">Quantités</p></th>
                                                            <th><p align="center" style="color: white">Options</p></th>
                                                        </tr>
                                                        </tfoot>
                                                        <tbody></tbody>
                                                    </table>
                                               
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="card-footer">
                                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups" style="float: right;">
                                        <div class="btn-group mr-2" role="group" aria-label="First group">
                                            <button type="submit" name="submit_etat_civil" class="btn btn-primary" >Enregistrer</button>
                                        </div>
                                        <div class="btn-group mr-2" role="group" aria-label="Second group">
                                            
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
                                
                            </div>
                            <div class="card-body">
                                <div class="well bs-component">
                                    <form class="form-horizontal">
                                        <fieldset>
                                            <div class="table-responsive">
                                                <form method="post" action="" >
                                                   
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