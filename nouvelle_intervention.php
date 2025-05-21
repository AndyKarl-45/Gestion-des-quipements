<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');
if (isset($_REQUEST['ids'])){
    $ids = $_REQUEST['ids'];
     $required='required';
}else{
    $ids=0;
     $required='disabled';
}
?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Nouvelle Intervention</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme XXX, il est <?=date("G:i");?> en ce jour du <?=dateToFrench("now","l j F Y");?>.
                    </li>
                </ol>
                <!--                Main Body-->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card mb-4">
                            <form class="form-horizontal" action="save_intervenant.php" method="POST">
                                <div class="card-header">
                                    <?php
                                if($ids==0){
                                echo '<b style="color: red;"> Veillez choisir la salle et validez avant de remplir le formilaire !!! </b>';
                            }else{
                                echo '<b style="color: green;"> Salle choisie !!! </b>';
                            }
                            ?>
                                </div>
                                <div class="card-body">
                                    <fieldset>
                                        <div class="table-responsive">
                                            <table class="table  table-hover table-condensed" id="myTable">
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        
                                                        <span class="help-block small-font" >SALLE:</span>
                                                        <div class="col">

                                                        <select id="mySelect" onchange="myFunction()" name="id_salles" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                                    
                                                                                    <?php
                                                                    if($ids!=0){
                                                                         $sql = "SELECT DISTINCT * from salles where id_salles= '$ids'";

                                                                $stmt = $db->prepare($sql);
                                                                $stmt->execute();

                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                foreach($tables as $table)
                                                                {    
                                                                    $i = $table['id_salles'];
                                                                    echo '<option value ="'.$i.'">';
                                                                    echo strtoupper($table['nom']);
                                                                    echo '</option>';
                                                                }
                                                                    }else{


                                                                          echo '<option value="" selected="">...</option>';
                                                $iResult = $db->query("SELECT * FROM salles");

                                                                            while($data = $iResult->fetch()){

                                                                                $i = $data['id_salles'];
                                                                                $nom = $data['nom'];
                                                                             echo '<option value ="'.$i.'">';
                                                                                echo strtoupper($data['nom']);
                                                                                echo '</option>';
                                                                            
                                                        
                                                                            }

                                                                    }
                                                      
                                                    ?>

                                                                    
                                                                                </select>
                                                    <?php 
                                                    if($ids==0){
                                                        echo '  <button type="button" id="sum" data-toggle="modal"   style="background-color: transparent">';
                                                            
                                                            echo '</button>';
                                                    }

                                                    ?>
                                            </div>
                                                    </td>
                                                
                                                    <td>
                                                        <span class="help-block small-font" >NOM DE L'INTERVENANT:</span>
                                                        <div class="col">
                                                            <input name="technicien" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"  <?=$required?>>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span class="help-block small-font" >DATE DE DEBUT:</span>
                                                        <div class="col">
                                                            <input type="date" name="date_debut" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"  <?=$required?>>
                                                        </div>
                                                    <td>
                                                        <span class="help-block small-font" >DATE DE FIN:</span>
                                                        <div class="col">
                                                            <input type="date" name="date_fin" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"  <?=$required?>>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span class="help-block small-font" >NATURE:</span>
                                                        <div class="col">
                                                            <input type="text" name="nature" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"  <?=$required?>>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="help-block small-font" >HEURE DE DE DEBUT:</span>
                                                        <div class="col">
                                                            <input type="time" name="h_debut" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" value="00:00" <?=$required?>>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                     <td>
                                                        <span class="help-block small-font" >COÛT:</span>
                                                        <div class="col">
                                                            <input type="number" name="cout" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" value="0" <?=$required?> >
                                                        </div>
                                                    </td>
                                                </tr>
                                                    
                                                </tbody>
                                            </table>
                                            <table class="table table-bordered table-hover table-condensed" id="myTable">
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <span class="help-block small-font" >CONLUSION:</span>
                                                        <div class="col">
                                                            <textarea name="conclusion" class="form-control" style="width: 100%" <?=$required?>></textarea>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>

                         <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-scroll"></i>
                                <b>Liste des salles</b>
                            </div>
                            
                        </div>
                                            
                                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                                        <thead>
                                                        <tr class="bg-primary">
                                                            <th><p align="center" style="color: white">Réferences</p></th>
                                                            <th><p align="center" style="color: white">Désignations</p></th>
                                                            <th><p align="center" style="color: white">Catégorie de matériaux</p></th>
                                                            <th><p align="center" style="color: white">Options</p></td></th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                     <?php

                                                        if($ids!=0){
                                                                 $query = "SELECT * from materiel where open_close!='1' and statut!='0' and id_salles='$ids' ";
                                                            }else{
                                                                 $query = "SELECT * from materiel where open_close!='1' ";
                                                            }

                                                        $q = $db->query($query);
                                                        while($row = $q->fetch())
                                                        {
                                                            $id_materiel = $row['id_materiel'];
                                                            $ref_materiel = $row['ref_materiel'];
                                                            $designation = $row['designation'];
                                                            $id_cat_materiel = $row['id_cat_materiel'];
                                                            ?>

                                                            <tr>
                                                                <input name="id" type="hidden" value="<?php echo $id_materiel;?>" />

                                                        <td align="center"> <?php echo $ref_materiel; ?>   </td>
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



                <td align="center" style="width: 18%">
                <div class="btn-group mr-2" role="group" aria-label="First group">
                                  <input type="checkbox"  style=" width: 25px; height: 25px" name="id_mat[]" value="<?=$id_materiel?>"  >
                            
                        </div>              
                                    
                            
                        
                 </td>  

                                                              
                                                            </tr>

                                                        <?php } ?> 
                                                    </tbody>

                                                        <tfoot>
                                                            <tr class="bg-primary">
                                                            <th><p align="center" style="color: white">Réferences</p></th>
                                                            <th><p align="center" style="color: white">Désignations</p></th>
                                                            <th><p align="center" style="color: white">Catégorie de matériaux</p></th>
                                                            <th><p align="center" style="color: white">Options</p></td></th>
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
                                           <?php if($ids!=0){
                                            echo '<button type="submit" name="submit_etat_civil" class="btn btn-primary" >Enregistrer</button>';
                                        } ?>
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
<script> 
                                                                function myFunction() {
                                  var x = document.getElementById("mySelect").value;
                                  document.getElementById("sum").innerHTML='<a href="save_salle_in.php?id='+x+'"><i class="fas fa-check"></i></a>';
                                                                        }

                                                             </script>
<?php
include('foot.php');
?>