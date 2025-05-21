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
$ido=$_REQUEST['id'];
$query  = "SELECT count(id_personnel) as total from personnel where salle=\"SALLE MIMBOMAN\"";
$q = $conn->query($query);
while($row = $q->fetch_assoc())
{
    $total = $row["total"];
}
$totat_personnel = $total;

?>
<?php
$id=$_REQUEST['id'];

$query  = "SELECT * from salles where id_salles='".$id."'";
$q = $db->query($query);
while($row = $q->fetch())
{ 
    $id_salles = $row['id_salles'];
    /*-------------------- ETAT CIVILE --------------------*/
    $code = $row['code'];
    $nom = $row['nom'];
    $tel=$row['tel'];
    $secteur=$row['secteur'];
    $responsable=$row['responsable'];
    $ville=$row['ville'];
    $quartier=$row['quartier'];
    $pays=$row['pays'];
?>

<!--Content-->

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Détails de la Salle : <?= $nom?></h1>
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
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#home">
                                            <i class="fas fa-cubes"></i>
                                            Infos Génerale<!-- <?=$id_personnel?> -->
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#menu1">
                                            <i class="fas fa-users"></i>
                                            Personnels [<?=$totat_personnel?>]
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
                                                                            <span class="help-block small-font" >CODE:</span>
                                                                            <div class="col">
                                                                                <input style="width:75%; border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                " name="code" value="<?=$code?>" readonly>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >SECTEUR:</span>

                                                                            <div class="col">
                                                                                <select name="secteur" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" readonly>
                                                                                    <option value="<?=$secteur?>" selected=""><?=$secteur?></option>   

                                                                                </select>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>

                                                                        <td>
                                                                            <span class="help-block small-font" >NOM:</span>
                                                                            <div class="col">
                                                                                <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="nom" value="<?=$nom?>" readonly>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                        <span class="help-block small-font" >PAYS:</span>
                                                                            <div class="col">
                                                                                <select name="pays" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" readonly >
                                                                                    <option value="<?=$pays?>" selected=""><?=$pays?></option>  
                                                                                </select>
                                                                             </div> 
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <span class="help-block small-font" >VILLE:</span>
                                                                            <div class="col">
                                                                                <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="ville" value="<?=$ville?>" readonly >
                                                                            </div>

                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >QUARTIER:</span>
                                                                            <div class="col">
                                                                                <input  style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="quartier" value="<?=$quartier?>" readonly >
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <span class="help-block small-font" >TEL:</span>
                                                                            <div class="col">
                                                                                <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="tel"  value="<?=$tel?>" readonly >
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >NOM DU RESPONSABLE:</span>

                                                                            <div class="col">
                                                                                <select name="responsable" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"readonly >
                                                                                    <option value="<?=$responsable?>" selected="">   <?php

                                                                $sql = "SELECT DISTINCT * from personnel where id_personnel = '$responsable'";

                                                                $stmt = $db->prepare($sql);
                                                                $stmt->execute();

                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                foreach($tables as $table)
                                                                {
                                                                    echo $table['nom'].' '.$table['prenom'];
                                                                }

                                                                ?>
                                                                                        

                                                                                    </option>
                                                                                </select>                     
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
                                  <div class="tab-pane container" id="menu1">
                                    <!-- infos civile-->

                                   <!--  <h5><b><u>NB:</u></b> Veillez saisir vos informations concernant le traitement de ressource humaine</h5> -->

                                    <div class="row">
                                        <hr/>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="card mb-4">
                                                <form class="form-horizontal" action="save_infos_pers.php" method="POST">
                                                    <div class="card-header">
                                                
                                                    </div>
                                                    <div class="card-body">
                                                        <fieldset>
                                                            <div class="table-responsive">
                                                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                                        <thead>
                                                        <tr class="bg-primary">
                                                            <!-- <th><p align="center">Matricule </p></th> -->
                                                            <th><p align="center">Nom</p></th>
                                                            <th><p align="center">Prenom</p></th>
                                                            <th><p align="center">Poste </p></th>
                                                            <th><p align="center">Secteur </p></th> 
                                                            <th><p align="center">Salle</p></th>
                                                            <th><p align="center">Options</p></th> 
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                    <?php

                                                    $query = "SELECT * from personnel where salle=\"SALLE MIMBOMAN\"";
                                                        $q = $db->query($query);
                                                        while($row = $q->fetch())
                                                        {
                                                            $id = $row['id_personnel'];
                                                            $nom = $row['nom'];
                                                            $prenom = $row['prenom'];
                                                            $profession = $row['profession'];
                                                            $secteur = $row['secteur'];
                                                            $salle = $row['salle'];

                                                     ?>

            <tr>
                <input name="id" type="hidden" value="<?php echo $id?>" />
                <td align="center"><a href="details_personnel.php?id=<?php echo $id; ?>" title="<?=$nom; ?>" style="color: black"><?=$nom; ?></a>  </td>
                <td align="center"><a href="details_personnel.php?id=<?php echo $id; ?>" title="<?=$prenom; ?>" style="color: black"><?=$prenom; ?></a>   </td>
                <td align="center"><a href="details_personnel.php?id=<?php echo $id; ?>" title="<?= $profession; ?>" style="color: black"><?= $profession; ?></a>   </td>       
                <td align="center"><a href="details_personnel.php?id=<?php echo $id; ?>" title="<?=$secteur; ?>" style="color: black"><?=$secteur; ?> </a>  </td> 
                <td align="center"><a href="details_personnel.php?id=<?php echo $id; ?>" title="<?=$salle; ?>" style="color: black"><?=$salle; ?></a>   </td>

                <td align="center">
                   
                    <div class="btn-group mr-2" role="group" aria-label="First group">
                         <a class="btn btn-primary"  href="details_personnel.php?id=<?= $id; ?>" title="view"
                            style="background-color: transparent">
                                <i  style="color: green" class="fas fa-eye"></i> 
                            </a>
                        </div>
                    <div class="btn-group mr-2" role="group" aria-label="First group">
                         <a class="btn btn-warning" href="modifier_personnel.php?id=<?=$id;?>" title="Modifier"
                            style="background-color: transparent">
                                <i style="color: orange" class="fas fa-pen"></i> 
                            </a>
                       </div>

                       

                                    
                            
                        
                 </td>          
              </tr>

<?php } ?>
            
                                                    </tbody>




                                                        <tfoot>
                                                            <tr class="bg-primary">
                                                            <!-- <th><p align="center">Matricule </p></th> -->
                                                            <th><p align="center">Nom</p></th>
                                                            <th><p align="center">Prenom</p></th>
                                                            <th><p align="center">Poste </p></th>
                                                            <th><p align="center">Secteur </p></th>
                                                            <th><p align="center">Salle</p></th>
                                                            <th><p align="center">Options</p></th>
                                                            </tr>
                                                        </tfoot>
                                                        <tbody></tbody>
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