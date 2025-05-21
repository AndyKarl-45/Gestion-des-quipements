<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

// $query  = "SELECT id_personnel as total from personnel";
// $q = $conn->query($query);
// while($row = $q->fetch_assoc())
// {
//     $total = $row["total"];
// }
// $id_personnel = $total;

?>
<?php
//$ido=$_REQUEST['id'];
//$query  = "SELECT count(id_personnel) as total from personnel where salle=\"SALLE MIMBOMAN\"";
//$q = $conn->query($query);
//while($row = $q->fetch_assoc())
//{
//    $total = $row["total"];
//}
//$totat_personnel = $total;

?>
<?php
$id=$_REQUEST['id'];

$query  = "SELECT * from demande_equipement where id_ask_eq='".$id."'";
$q = $db->query($query);
while($row = $q->fetch())
{ 
    $id_ask_eq = $row['id_ask_eq'];
    /*-------------------- ETAT CIVILE --------------------*/
    
    $date_debut = $row['date_debut'];
        $id_salles=$row['id_salles'];
    $nom_salle=$row['nom_salle'];
    $receveur=$row['receveur'];
    $emetteur=$row['emetteur'];
    // $cout=$row['cout'];
?>

<!--Content-->

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Modifier la demande d'équipement : Salle: <?php $sql = "SELECT DISTINCT * from salles where id_salles= '$id_salles'";

                                                                $stmt = $db->prepare($sql);
                                                                $stmt->execute();

                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                foreach($tables as $table)
                                                                {
                                                                    echo $table['nom'];
                                                                }?>  </h1>
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
                                 <ul class="nav nav-pills" style="float: right;">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="liste_transfert_mag_main.php">
                                            Retour
                                        </a>
                                    </li>                              
                                </ul>
                                <!-- Nav pills -->
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#home">
                                            <i class="fas fa-cubes"></i>
                                            Détails
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#menu2">
                                            <i class="fas fa-cubes"></i>
                                            <?php

                                            $query = "SELECT DISTINCT count(id_materiel) as total from demande_materiel where     receveur='$receveur'  and id_ask_eq='$id_ask_eq'";
                                            $q = $db->query($query);
                                            while($row = $q->fetch())
                                            {

                                            echo ' Equipements['.$row['total'].']';
                                            }

                                            ?>

                                        </a>
                                    </li>

                                </ul>
                            </b>
                        </div>

                        <div class="card-body">
                            <!-- Tab panes -->
                            <div class="tab-content">
<!--********************************************ETAT CIVILE************************************************* -->
                                <!-- Etat Civile-->
                                <div class="tab-pane container active" id="home">
                                    <!-- infos civile-->

                                    <!-- <h5><b><u>NB:</u></b> Aucune information ne peut être modifier.</h5> -->

                                    <div class="row">
                                        <hr/>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="card mb-4">
                                                <form class="form-horizontal" action="update_ask_eq_mag.php" method="POST">
                                                    <div class="card-header">
                                                       <!--  <i class="fas fa-scroll"></i>
                                <b>L'ensemble des salles de campresj.</b>
                                                             -->
                                    <input type="hidden" name="id_ask_eq" value="<?=$id_ask_eq?>">
                                                             <ul class="nav nav-pills"  >
                                    <li class="nav-item">
                                        <button type="submit" style=" width:150px;"  name="submit_salle"  class="btn btn-primary" >Enregistrer</button>
                                    </li>                                    
                                </ul>

                                                    </div>
                                                    <div class="card-body">
                                                        <fieldset>
                                                            <div class="table-responsive">
                                                                <table class="table  table-hover table-condensed" id="myTable">
                                                                    <tbody>
                                                            <tr> 
                                                                        <td>
                                                                        <span class="help-block small-font" >Magasin:</span>
                                                            <div class="col">
                                                                <select name="reveveur" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" >
                                                                                    <option value="<?=$receveur?>"selected="">
                                                                                        <?php  
                                                  
                                                                                switch ($receveur){
                                                                                            case 'C';
                                                                                               echo "Mag  central";
                                                                                                break;
                                                                                            case 'E';
                                                                                               echo "Mag d' enregistrement";
                                                                                                break;
                                                                                            case 'D';
                                                                                               echo 'Mag défectueux';
                                                                                                break;
                                                                                             case 'M';
                                                                                               echo 'Mag maintenance';
                                                                                                break;
                                                                                            case 'O';
                                                                                               echo "Mag congo";
                                                                                                break;

                                                                                    }

                                                                ?>
                                                                                    </option>

                                                                                    <option value="C" >Mag centrale</option> 
                                                                                    <option value="E" >Mag d'enregistrement</option> 
                                                                                    <option value="O" >Mag du congo</option> 
                                                                                    <option value="D" >Mag défectueux</option> 
                                                                             </select>
                                                                         </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >DATE DE DEMANDE:</span>
                                                                            <div class="col">
                                                                                  <input type="date" value="<?php echo $date_debut?>" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray" name="date_debut" value="<?=$date_debut?>"  >
                                                                
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
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

<!--********************************************INFO RH************************************************* -->



                                <div class="tab-pane container" id="menu2">
                                    <!-- infos civile-->

                                    <!--  <h5><b><u>NB:</u></b> Veillez saisir vos informations concernant le traitement de ressource humaine</h5> -->




                                    <div class="row">
                                        <hr/>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="card mb-4">
                                                <div class="card-header">
                                                    <i class="fas fa-scroll"></i>
                                                    <b>L'ensemble des équiepements.</b>
                                                    <!-- Nav pills -->
                                <ul class="nav nav-pills"   style="float: right;">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="ajouter_ask_mag.php?idi=<?=$id_ask_eq?>&ids=<?=$receveur?>">
                                            <i class="fas fa-cubes"></i>
                                            Ajouter éqquipement
                                        </a>
                                    </li>                                    
                                </ul>
                                                    
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
                                                                                <!-- <th><p align="center">Matricule </p></th> -->
                                                                                <th><p align="center" style="color: white">Réferences</p></th>
                                                                                <th><p align="center" style="color: white">Désignations</p></th>
                                                                                <th><p align="center" style="color: white">Quantités</p></th>
                                                                                <th><p align="center" style="color: white">Catégorie de matériaux</p></th>
                                                                                <th><p align="center" style="color: white">Options</p></th>
                                                                                
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            <?php

                                                                            $sql = "SELECT DISTINCT * from demande_materiel where receveur='$receveur' and id_ask_eq='$id_ask_eq' ";

                                                                            $stmt = $db->prepare($sql);
                                                                            $stmt->execute();

                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                            foreach($tables as $table)
                                                                            {
                                                                                $id_materiel= $table['id_materiel'];
                                                                                $quantite= $table['quantite'];
                                                                                $receveur= $table['receveur'];
                                                                                



                                                                                $query = "SELECT * from materiel where id_materiel = '$id_materiel' ";
                                                                                $q = $db->query($query);
                                                                                while($row = $q->fetch())
                                                                                {
                                                                                    $id = $row['id_materiel'];
                                                                                    $ref_materiel = $row['ref_materiel'];
                                                                                    $designation = $row['designation'];
                                                                                    $id_cat_materiel= $row['id_cat_materiel'];
                                                                                    


                                                                                    ?>

                                                                                    <tr>
                                                                                        <input name="id" type="hidden" value="<?php //echo $row['id'];?>" />

                                                                                        <td align="center"> <?php echo $ref_materiel; ?>   </td>
                                                                                        <td align="center"> <?php echo $designation; ?>   </td>
                                                                                        <td align="center"><?php echo number_format($quantite) ; ?></td>
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
                    <a class="btn btn-danger"  href="delete_ask_mag.php?idi=<?php echo $id_ask_eq; ?>&ids=<?php echo $receveur?>&idm=<?=$id_materiel?>&ide=<?=$emetteur?>" title="view"
                            style="background-color: transparent">
                                <i  style="color: red" class="fas fa-trash"></i> 
                            </a>
                         
                </td> 
                                                                                    </tr>

                                                                                <?php }
                                                                            } ?>
                                                                            </tbody>




                                                                            <tfoot>
                                                                             <tr class="bg-primary">
                                                            <th><p align="center" style="color: white">Réferences</p></th>
                                                                                <th><p align="center" style="color: white">Désignations</p></th>
                                                                                <th><p align="center" style="color: white">Quantités</p></th>
                                                                                <th><p align="center" style="color: white">Catégorie de matériaux</p></th>
                                                                                <th><p align="center" style="color: white">Options</p></th>
                                                                                
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

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--****************************************** ............************************************************ -->





                                
<!--****************************************** ............************************************************ -->

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


    <!--//Footer-->
<?php
include('foot.php');
?>