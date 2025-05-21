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

$query  = "SELECT * from intervenant where id_inter='".$id."'";
$q = $db->query($query);
while($row = $q->fetch())
{ 
    $id_inter = $row['id_inter'];
    /*-------------------- ETAT CIVILE --------------------*/
    $technicien = $row['technicien'];
    $date_debut = $row['date_debut'];
    $date_fin=$row['date_fin'];
    $id_salles=$row['id_salles'];
    $nom_salle=$row['nom_salle'];
    $nature=$row['nature'];
    $h_debut=$row['h_debut'];
    $conclusion=$row['conclusion'];
    $cout=$row['cout'];
?>

<!--Content-->

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Détails des intervenants : Salle: <?php $sql = "SELECT DISTINCT * from salles where id_salles= '$id_salles'";

                                                                $stmt = $db->prepare($sql);
                                                                $stmt->execute();

                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                foreach($tables as $table)
                                                                {
                                                                    echo $table['nom'];
                                                                }?> - Nom: <?=$technicien?> </h1>
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
                                        <a class="nav-link active" href="<?=$intervention['option2_link']?>">
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

                                            $query = "SELECT DISTINCT count(id_materiel) as total from intervention_materiel where   id_inter='$id_inter' and id_salles='$id_salles' ";
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
                                                <form class="form-horizontal" action="#" method="POST">
                                                    <div class="card-header">
                                                       <!--  <i class="fas fa-scroll"></i>
                                <b>L'ensemble des salles de campresj.</b>
                                                             -->

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
                                                                <select name="id_salles" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" readonly>
                                                                                    <option value="<?=$id_salles?>"selected="">
                                                      <?php  
                                                    $sql = "SELECT DISTINCT * from salles where id_salles= '$id_salles'";

                                                                $stmt = $db->prepare($sql);
                                                                $stmt->execute();

                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                foreach($tables as $table)
                                                                {
                                                                    echo strtoupper($table['nom']);
                                                                }

                                                                ?>

                                                                                    </option>           
                                                                             </select>
                                                                         </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >NOM DE L'INTERVENANT:</span>

                                                                            <div class="col">
                                                                                <select name="technicien" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" readonly>
                                                                                    <option value="<?=$technicien?>" selected=""><?=$technicien?></option>   

                                                                                </select>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>

                                                                        <td>
                                                                            <span class="help-block small-font" >DATE DE DEBUT:</span>
                                                                            <div class="col">
                                                                                 <?php  echo'<input  style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="date_debut" value="'.date("d-m-Y",strtotime($date_debut)).'"disabled>';
                                                                                ?>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                        <span class="help-block small-font" >DATE DE FIN:</span>
                                                                            <div class="col">
                                                                                <?php  echo'<input  style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="date_fin" value="'.date("d-m-Y",strtotime($date_fin)).'"disabled>';
                                                                                ?>
                                                                             </div> 
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <span class="help-block small-font" >NATURE:</span>
                                                        <div class="col">
                                                            <input type="text" name="nature" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" value="<?=$nature?>" readonly>
                                                        </div>

                                                                        </td>
                                                                       <td>
                                                        <span class="help-block small-font" >HEURE DE DE DEBUT:</span>
                                                        <div class="col">
                                                            <input type="text" name="h_debut" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" value="<?=$h_debut?>" readonly>
                                                        </div>
                                                    </td>
                                                                    </tr>
                                                                    <tr>
                                                     <td>
                                                        <span class="help-block small-font" >COÛT:</span>
                                                        <div class="col">
                                                            <input type="number" name="cout" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" value="<?=$cout?>" readonly>
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
                                                            <input name="conclusion" class="form-control" style="width: 100%" value="<?=$conclusion?>" readonly />
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
                                                                                <th><p align="center" style="color: white">Numéro de serie</p></th>
                                                                                <th><p align="center" style="color: white">Désignations</p></th>
                                                                                <th><p align="center" style="color: white">Salles</p></th>
                                                                                <th><p align="center" style="color: white">Catégorie de matériaux</p></th>
                                                                                
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            <?php

                                                                            $sql = "SELECT DISTINCT * from intervention_materiel where id_inter = '$id_inter' and id_salles='$id_salles' ";

                                                                            $stmt = $db->prepare($sql);
                                                                            $stmt->execute();

                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                            foreach($tables as $table)
                                                                            {
                                                                                $id_materiel= $table['id_materiel'];
                                                                                



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
                                                                                        <td align="center"> <?php echo $nom_salle; ?>   </td>
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
                                                                                    </tr>

                                                                                <?php }
                                                                            } ?>
                                                                            </tbody>




                                                                            <tfoot>
                                                                             <tr class="bg-primary">
                                                            <th><p align="center" style="color: white">Numéro de serie</p></th>
                                                                                <th><p align="center" style="color: white">Désignations</p></th>
                                                                                <th><p align="center" style="color: white">Salles</p></th>
                                                                                <th><p align="center" style="color: white">Catégorie de matériaux</p></th>
                                                                                
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