<?php

include('first.php');
 include("php/db.php");
include('php/main_side_navbar.php');

?> 
<?php
 $id_ask_eq=$_REQUEST['idi'];
  $receveur=$_REQUEST['ids'];

$query  = "SELECT * from demande_equipement where id_ask_eq='".$id_ask_eq."'";
$q = $db->query($query);
while($row = $q->fetch())
{ 
   
    // /*-------------------- DETAILS --------------------*/
        // ------------ infos sur le marché
        $id_ask_eq = $row['id_ask_eq'];
        $emetteur = $row['emetteur'];

    // $prime=$row['prime'];
  

?>
<!--Content-->

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Modifier la demande d'équipement </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">
                    Hello M/Mme XXX, il est <?=date("G:i");?> en ce jour du <?=dateToFrench("now","l j F Y");?>.
                </li>
            </ol>
            <!--                Main Body-->
                            <div class="row">
                    <div class="col-xl-12">
                        <div class="card mb-4">
                            <form action="update_ask_materiel_mag.php" method="post">
                            <div class="card-header">
                                <input type="hidden" name="id_ask_eq" value="<?=$id_ask_eq?>">
                                <input type="hidden" name="receveur" value="<?=$receveur?>">
                                <input type="hidden" name="emetteur" value="<?=$emetteur?>">
                                                            <b> 
                                <ul class="nav nav-pills"   style="float: right;">
                                <li class="nav-item">
                                    <?php
                                   
                                     switch ($emetteur){
                                        case 'C';
                                          echo '<a class="nav-link active" href="modifier_transfert_mag.php?id='.$id_ask_eq.'">
                        
                                                Retour
                                            </a>';
                                            break;
                                        case 'E';
                                          echo '<a class="nav-link active" href="modifier_transfert_mag_save.php?id='.$id_ask_eq.'">
                        
                                                Retour
                                            </a>';
                                            break;
                                        case 'D';
                                          echo '<a class="nav-link active" href="modifier_transfert_mag_def.php?id='.$id_ask_eq.'">
                        
                                                Retour
                                            </a>';
                                            break;
                                         case 'M';
                                          echo '<a class="nav-link active" href="modifier_transfert_mag_main.php?id='.$id_ask_eq.'">
                        
                                                Retour
                                            </a>';
                                            break;
                                        case 'O';
                                          echo '<a class="nav-link active" href="modifier_transfert_mag_congo.php?id='.$id_ask_eq.'">
                        
                                                Retour
                                            </a>';
                                            break;

                                     }
                                    ?>
                                    </li>                                    
                                </ul>
                                <ul class="nav nav-pills" >
                                    <li class="nav-item">
                                        <button type="submit" style=" width:150px;"  name="submit_salle"  class="btn btn-primary" >Enregistrer</button>
                                    </li>                                    
                                </ul>
                                
                                <!-- Nav pills -->
                                
                                
                            </b>
                            </div>
                            <div class="card-body">
                                <div class="well bs-component">
                                    <form class="form-horizontal">
                                        <fieldset>
                                            <div class="table-responsive">
                                                <form method="post" action="" >
                                                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                                        <thead>
                                                        <tr class="bg-primary">
                                                            <th><p align="center" style="color: white">Numéro de serie</p></th>
                                                            <th><p align="center" style="color: white">Désignations</p></th>
                                                            <th><p align="center" style="color: white">Catégorie de matériaux</p></th>
                                                            <th><p align="center" style="color: white">Quantités</p></th>
                                                            <th><p align="center" style="color: white">Options</p></td></th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                     <?php

                                                        $query = "SELECT * from materiel where open_close!='1' and statut='0' and id_salles='0' and mag='$emetteur' ";
                                                        $q = $db->query($query);
                                                        while($row = $q->fetch())
                                                        {
                                                            $id_materiel = $row['id_materiel'];
                                                            $ref_materiel = $row['ref_materiel'];
                                                            $designation = $row['designation'];
                                                            $id_cat_materiel = $row['id_cat_materiel'];
                                                            $quantite = $row['quantite'];
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

                <td align="center"><input type="number"  style=" width: 50px; height: 25px" name="quantite[]" value="<?=$quantite?>" min="1" max="<?=$quantite?>" ></td>

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
                                                            <th><p align="center" style="color: white">Numéro de serie</p></th>
                                                            <th><p align="center" style="color: white">Désignations</p></th>
                                                            <th><p align="center" style="color: white">Catégorie de matériaux</p></th>
                                                            <th><p align="center" style="color: white">Quantités</p></th>
                                                            <th><p align="center" style="color: white">Options</p></td></th>
                                                        </tr>
                                                        </tfoot>
                                                        <tbody></tbody>
                                                    </table>
                                                </form>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                            <div class="card-footer">

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

        </div>
    </main>
</div>
<?php
    }
?>
<?php
if (isset($_GET['witness'])){
    $witness = $_GET['witness'];

    switch ($witness){
        case '1';
            ?>
            <script>
                Swal.fire(
                    'Succès',
                    'Opération effectuée avec succès !',
                    'success'
                )
            </script>
            <?php
            break;
        case '-1';
            ?>
            <script>
                Swal.fire({
                    icon: 'Erreur',
                    title: 'Oops...',
                    text: 'Une erreur s\'est produite !',
                    footer: 'Reéssayez encore'
                })
            </script>
            <?php
            break;

    }
}
?>






    <!--//Footer-->
<?php
include('foot.php');
?>