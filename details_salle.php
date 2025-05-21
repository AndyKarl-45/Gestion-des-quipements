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
                                            Infos Génerale
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#menu2">
                                            <i class="fas fa-cubes"></i>
                                            <?php

                                            $query = "SELECT DISTINCT count(id_materiel) as total from materiel where   id_salles='$id_salles' and quantite!=0 ";
                                            $q = $db->query($query);
                                            while($row = $q->fetch())
                                            {

                                            echo ' Anciens Equipements['.$row['total'].']';
                                            }

                                            ?>

                                        </a>
                                    </li>
                                     <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#menu3">
                                            <i class="fas fa-cubes"></i>
                                            <?php

                                            $query = "SELECT DISTINCT count(id_materiel) as total from demande_materiel_sal where   id_salles_dst='$id_salles' ";
                                            $q = $db->query($query);
                                            while($row = $q->fetch())
                                            {

                                            echo ' Equipements-Salles-Salles['.$row['total'].']';
                                            }

                                            ?>

                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="liste_salle_mag.php?id=<?=$id_salles?>">
                                            <i class="fas fa-cubes"></i>
                                            <?php
                                                $cnts=0;
                                            $query = "SELECT * from demande_equipement where  etat=1 and id_salles='$id_salles'";
                                                                                $q = $db->query($query);
                                                                                while($row = $q->fetch())
                                                                                {
                                                                                    
                                                                                    $id_ask_eq = $row['id_ask_eq'];
                                                                                    $sql = "SELECT DISTINCT * from demande_materiel where  id_ask_eq='$id_ask_eq'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach($tables as $table)
                                                                                            {
                                                                                                $id = $table['id_materiel'];
                                                                                                
                                                                                               
                                                                                                }
                                                                                                $sql = "SELECT DISTINCT * from materiel where id_materiel = '$id'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach($tables as $table)
                                                                                            {
                                                                                                $cnts+=1;
                                                                                            }
                                                                                                
                                                                                }
                                                 echo ' Equipements-Mag->Salles['.$cnts.']';

                                            ?>
                                          
                                            
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="liste_salle_input.php?id=<?=$id_salles?>">
                                            <i class="fas fa-cubes"></i>
                                            Mouuvement d'entrée
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="liste_salle_output.php?id=<?=$id_salles?>">
                                            <i class="fas fa-cubes"></i>
                                            Mouuvement de sortie
                                        </a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#menu5">
                                            <i class="fas fa-cubes"></i>
                                            Services
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
                                                                                <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="responsable"  value="<?=$responsable?>" readonly >                 
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
                                                    <b>L'ensemble des matériaux.</b>
                                                    <!-- <b>

                                                        
                                                        <ul class="nav nav-pills"   style="float: right;">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" href="<?=$materiaux['option2_link']?>">
                                                                    <i class="fas fa-plus"></i>
                                                                    Ajouter Matériel
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </b> -->
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
                                                                                <!-- <th><p align="center" style="color: white">Numéro de serie</p></th> -->
                                                                                <th><p align="center" style="color: white">Désignations</p></th>
                                                                                <th><p align="center" style="color: white">Quantites</p></th>
                                                                                <th><p align="center" style="color: white">Catégorie de matériaux</p></th> 
                                                                                <th><p align="center" style="color: white">Prix unitaire</p></th>
                                                                                <th><p align="center" style="color: white">Prix total</p></th>
                                                                                <th><p align="center" style="color: white">Etat de transfert</p></th>
                                                                                <th><p align="center" style="color: white">Transferts</p></th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            <?php



                                                                                // $query = "SELECT * from demande_materiel where id_salles = '$id_salles' and etat=1 ";
                                                                                // $q = $db->query($query);
                                                                                // while($row = $q->fetch())
                                                                                // {
                                                                                //     $id = $row['id_materiel'];


                                                                                   $sql = "SELECT DISTINCT * from materiel where id_salles = '$id_salles' and quantite!=0";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach($tables as $table)
                                                                                            {

                                                                                                 $ref_materiel = $table['ref_materiel'];
                                                                                                $designation = $table['designation'];
                                                                                                $quantite = $table['quantite'];
                                                                                                $id_cat_materiel = $table['id_cat_materiel'];
                                                                                                $prix_unitaire = $table['prix_unitaire'];
                                                                                                $prix_total = $table['prix_total'];
                                                                                                $statut = $table['statut'];
                                                                                                 $id_materiel = $table['id_materiel'];
                                                                                        

                                                                                        

                                                                                    ?>

                                                                                    <tr>
                                                                                        <input name="id" type="hidden" value="<?php //echo $row['id'];?>" />

                                                                                        <!-- <td align="center"> <?php echo $ref_materiel; ?>   </td> -->
                                                                                        <td align="center"> <?php echo $designation; ?>   </td>
                                                                                        <td align="center"> <?php echo $quantite; ?>   </td>
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

                                                                                        <td align="center"> <?php echo number_format($prix_unitaire); ?>  </td>
                                                                                    <td align="center"> <?php $prix_total=$quantite*$prix_unitaire ;echo number_format($prix_total); ?>  </td>
                                                                                    <td align="center" style="width: 17%;"> <?php 
                                                                                    
                                if (isset($_GET['statut']) and isset($_GET['idms'])){
                                    $idms = $_GET['idms'];
                                    if($idms==$id){
                                        $statut = $_GET['statut'];
                                    }
                                 }

                            if($statut==0){

                                echo' <a class="btn btn-primary" href="refuser_reception.php?ids='.$id_salles.'&idm='.$id_materiel.'">
                                <i class="fa fa-trash"></i></a>||<a class="btn btn-primary" href="valider_reception.php?ids='.$id_salles.'&idm='.$id_materiel.'"><i class="fa fa-check"></i></a>';

                            }elseif($statut==1){
                                echo'<a class="btn btn-success" href="details_salle.php?id='.$id_salles.'&statut=0&idms='.$id_materiel.'"><i class="fa fa-handshake"></i></a>';
                            }elseif($statut==-1){
                                 echo'<a class="btn btn-danger" href="details_salle.php?id='.$id_salles.'&statut=0&idms='.$id_materiel.'"><i class="fas fa-handshake-slash"></i></a>';
                            }      
                   
                        
              

                ?>  </td>

                                                                                        
                                                                                        <td align="center">   <div class="btn-group mr-2" role="group" aria-label="First group">
                                                                                            <?php if( $lvl > 2  && $lvl < 9){?>
                                                                                            <a class="btn btn-primary" href="transfert_all_materiel.php?id_materiel=<?=$id_materiel;?>&ids=<?=$id_salles?>&qt=<?=$quantite?>" title="Modifier"
                                                                                               style="background-color: transparent">
                                                                                                <i style="color: green" class="fas fa-random"></i>
                                                                                            </a>
                                                                                            <?php } ?>
                                                                                        </div>
                                                                                        </td>


                                                                                    </tr>

                                                                                <?php }
                                                                            // }
                                                                             ?>
                                                                            </tbody>




                                                                            <tfoot>
                                                                             <tr class="bg-primary">
                                                           <!--  <th><p align="center" style="color: white">Numéro de serie</p></th> -->
                                                                                <th><p align="center" style="color: white">Désignations</p></th>
                                                                                <th><p align="center" style="color: white">Quantites</p></th>
                                                                                <th><p align="center" style="color: white">Catégorie de matériaux</p></th>
                                                                                <th><p align="center" style="color: white">Prix unitaire</p></th>
                                                                                <th><p align="center" style="color: white">Prix total</p></th>
                                                                                <th><p align="center" style="color: white">Etat de transfert</p></th>
                                                                                <th><p align="center" style="color: white">Transferts</p></th>
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

<!--********************************************INFO RH************************************************* -->



                                <div class="tab-pane container" id="menu3">
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
                                                    <b>L'ensemble des matériaux.</b>
                                                    <!-- <b>

                                                        
                                                        <ul class="nav nav-pills"   style="float: right;">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" href="<?=$materiaux['option2_link']?>">
                                                                    <i class="fas fa-plus"></i>
                                                                    Ajouter Matériel
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </b> -->
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
                                                                              <!--   <th><p align="center" style="color: white">Numéro de serie</p></th> -->
                                                                                <th><p align="center" style="color: white">Désignations</p></th>
                                                                                <th><p align="center" style="color: white">Quantites</p></th>
                                                                                <th><p align="center" style="color: white">Catégorie de matériaux</p></th>
                                                                                <th><p align="center" style="color: white">Prix unitaire</p></th>
                                                                                <th><p align="center" style="color: white">Prix total</p></th>
                                                                                <th><p align="center" style="color: white">Etat de transfert</p></th>
                                                                                <th><p align="center" style="color: white">Transferts</p></th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            <?php



                                                                                // $query = "SELECT * from demande_materiel where id_salles = '$id_salles' and etat=1 ";
                                                                                // $q = $db->query($query);
                                                                                // while($row = $q->fetch())
                                                                                // {
                                                                                //     $id = $row['id_materiel'];


                                                                                   $sql = "SELECT DISTINCT * from demande_materiel_sal where id_salles_dst = '$id_salles'   ";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach($tables as $table)
                                                                                            {

                                                                                                
                                                                                                
                                                                                                $statut = $table['etat'];
                                                                                                $id_materiel = $table['id_materiel'];
                                                                                                $id_ask_eq_sal = $table['id_ask_eq_sal'];
                                                                                                $id_ask_mat_sal = $table['id_ask_mat_sal'];
                                                                                                $id_ask_mat = $table['id_ask_mat'];
                                                                                                $quantite = $table['quantite'];

                                                                                            $sql = "SELECT DISTINCT * from materiel where id_materiel = '$id_materiel'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach($tables as $table)
                                                                                            {
                                                                                                $ref_materiel = $table['ref_materiel'];
                                                                                                $designation = $table['designation'];
                                                                                               
                                                                                                $id_cat_materiel = $table['id_cat_materiel'];
                                                                                                $prix_unitaire = $table['prix_unitaire'];
                                                                                                $prix_total = $table['prix_total']; 
                                                                                            }
                                                                                                    


                                                                                    ?>

                                                                                    <tr>
                                                                                        <input name="id" type="hidden" value="<?php //echo $row['id'];?>" />

                                                                                      <!--   <td align="center"> <?php echo $ref_materiel; ?>   </td> -->
                                                                                        <td align="center"> <?php echo $designation; ?>   </td>
                                                                                        <td align="center"> <?php echo $quantite; ?>   </td>
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

                                                                                        <td align="center"> <?php echo number_format($prix_unitaire); ?>  </td>
                                                                                        <td align="center">  <?php $prix_total=$quantite*$prix_unitaire;
                                                                                        echo number_format($prix_total); ?>  </td>
                                                                                    <td align="center" style="width: 17%;"> <?php 
                                                                                    
                                if (isset($_GET['statut']) and isset($_GET['idms'])){
                                    $idms = $_GET['idms'];
                                    if($idms==$id){
                                        $statut = $_GET['statut'];
                                    }
                                 }

                            if($statut==0){

                                echo' <a class="btn btn-primary" href="refuser_reception_salle.php?ids='.$id_salles.'&idm='.$id_materiel.'&id_ask_mat_sal='.$id_ask_mat_sal.'&id_ask_mat='.$id_ask_mat.'&id_ask_eq_sal='.$id_ask_eq_sal.'">
                                <i class="fa fa-trash"></i></a>||<a class="btn btn-primary" href="valider_reception_salle.php?ids='.$id_salles.'&idm='.$id_materiel.'&id_ask_mat_sal='.$id_ask_mat_sal.'&id_ask_eq_sal='.$id_ask_eq_sal.'"><i class="fa fa-check"></i></a>';

                            }elseif($statut==1){
                                echo'<a class="btn btn-success" href="details_salle.php?id='.$id_salles.'&statut=0&idms='.$id_materiel.'"><i class="fa fa-handshake"></i></a>';
                            }elseif($statut==-1){
                                 echo'<a class="btn btn-danger" href="details_salle.php?id='.$id_salles.'&statut=0&idms='.$id_materiel.'"><i class="fas fa-handshake-slash"></i></a>';
                            }      
                   
                        
              

                ?>  </td>

                                                                                        
                                                                                        <td align="center">   <div class="btn-group mr-2" role="group" aria-label="First group">
                                                                                            <?php if( $lvl > 2  && $lvl < 9){?>
                                                                                            <a class="btn btn-primary" href="transfert_all_materiel_salle.php?id_materiel=<?=$id_materiel;?>&ids=<?=$id_salles?>&qt=<?=$quantite?>&ideq=<?=$id_ask_eq_sal?>&idmat=<?=$id_ask_mat_sal?>" title="Modifier"
                                                                                               style="background-color: transparent">
                                                                                                <i style="color: green" class="fas fa-random"></i>
                                                                                            </a>
                                                                                            <?php } ?>
                                                                                        </div>
                                                                                        </td>


                                                                                    </tr>

                                                                                <?php }
                                                                            // }
                                                                             ?>
                                                                            </tbody>




                                                                            <tfoot>
                                                                             <tr class="bg-primary">
                                                            <!-- <th><p align="center" style="color: white">Numéro de serie</p></th> -->
                                                                                <th><p align="center" style="color: white">Désignations</p></th>
                                                                                <th><p align="center" style="color: white">Quantites</p></th>
                                                                                <th><p align="center" style="color: white">Catégorie de matériaux</p></th>
                                                                                <th><p align="center" style="color: white">Prix unitaire</p></th>
                                                                                <th><p align="center" style="color: white">Prix total</p></th>
                                                                                <th><p align="center" style="color: white">Etat de transfert</p></th>
                                                                                <th><p align="center" style="color: white">Transferts</p></th>
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


<!--****************************************** ............************************************************ -->
                                <div class="tab-pane container" id="menu5">
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
                                                    <b>Liste des services</b>
                                                </div>
                                                <div class="card-body">
                                                    <div class="well bs-component">
                                                        <form class="form-horizontal">
                                                            <fieldset>
                                                                <div class="table-responsive">
                                                                    <form method="post" action="" >
                                                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                                            <thead>
                                                                            <tr class="bg-primary">
                                                                                <th><p align="center">Titre</p></th>
                                                                                <th><p align="center">Début</p></th>
                                                                                <th><p align="center">Fin</p></th>
                                                                                <th><p align="center">Redacteur</p></th>
                                                                                <th><p align="center">Salle</p></th>
                                                                                <th><p align="center">Coût</p></th>
                                                                                <th><p align="center">Action</p></th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            <?php

                                                                            $query = "SELECT * FROM agenda WHERE salle = $id_salles";
                                                                            $q = $db->query($query);
                                                                            while($row = $q->fetch()) {
                                                                                $id = $row['id_agenda'];
                                                                                $titre = $row['event_nom'];
                                                                                $date_debut = $row['date_debut'];
                                                                                $date_fin = $row['date_fin'];
                                                                                $redacteur = $row['redacteur'];
                                                                                $event_description = $row['event_description'];
                                                                                $statut = $row['statut'];
                                                                                $salle = $row['salle'];
                                                                                $prix = $row['prix'];


                                                                                if(!empty($salle)){
                                                                                    $iResult = $db->query("SELECT * FROM salles WHERE id_salles = ".$salle);
                                                                                    while($data = $iResult->fetch()){
                                                                                        $salle = $data['nom'];
                                                                                    }
                                                                                }else{
                                                                                    $salle = "N/A";
                                                                                }


                                                                                $hour_s = date("H:i",strtotime($date_debut));
                                                                                $date_s = date("d-m-Y",strtotime($date_debut));

                                                                                $hour_e = date("H:i",strtotime($date_fin));
                                                                                $date_e = date("d-m-Y",strtotime($date_fin));

//                                        if($statut == "Cloturer"){
//                                            $action = '<button type="button" class="btn btn-outline-success" >Cloturé</button>';
//                                        }elseif ($statut == "Classer"){
//                                            $action = '<button type="button" class="btn btn-secondary btn-sm" >Classé</button>';
//                                        }

                                                                                $style = "default";
                                                                                $dateDiff = "";
                                                                                $delais = "$dateDiff";

                                                                                if($date_debut != ""){
                                                                                    // start date
                                                                                    $start_date = date("Y-m-d");

                                                                                    // end date
                                                                                    //$end_date = $delais_traitement;

                                                                                    // call dateDifference() function to find the number of days between two dates
                                                                                    $dateDiff = dateDifference($start_date, date("Y-m-d",strtotime($date_fin)));
                                                                                    $delais = $dateDiff.' Jour.s';
                                                                                    if (0 < $dateDiff AND $dateDiff < 8)
                                                                                        $style = "table-warning";

                                                                                    if (1 < $dateDiff AND $dateDiff < 8)
                                                                                        $delais = $dateDiff.' Jour.s';

                                                                                    if ($dateDiff > 29)
                                                                                        $style = "table-success";

                                                                                    if (6 < $dateDiff && $dateDiff < 30)
                                                                                        $style = "table-warning";

                                                                                    if ($dateDiff < 8)
                                                                                        $style = "table-danger";

                                                                                    if ($dateDiff > 0)
                                                                                        if($statut == "D")
                                                                                            $style = "table-success";

                                                                                    if ($dateDiff == 0)
                                                                                        if($statut == "N")
                                                                                            $style = "table-danger";

                                                                                    if ($dateDiff == 0)
                                                                                        if($statut == "D")
                                                                                            $style = "table-success";

                                                                                    if ($dateDiff < 1)
                                                                                        if($statut == "D")
                                                                                            $style = "table-success";

                                                                                    if ($dateDiff > 0)
                                                                                        if($statut == "D")
                                                                                            $delais = 'honoré !';

                                                                                    if ($dateDiff < 0)
                                                                                        if($statut == "D")
                                                                                            $delais = 'honoré !';

                                                                                    if ($dateDiff < 1)
                                                                                        if($statut == "N")
                                                                                            $style = "table-danger";

                                                                                    if ($dateDiff == 0)
                                                                                        if($statut == "N")
                                                                                            $delais = 'Aujourd\'hui !';

                                                                                    if ($dateDiff < 0)
                                                                                        if($statut == "N")
                                                                                            $delais = 'dépassé !';
                                                                                }


                                                                                if($redacteur == strtoupper($user) OR $redacteur == $user)
                                                                                    $action = '<a class="btn btn-primary" href="modifier_event.php?id='.$id.'"><i class="fa fa-pencil-alt"></i></a>||<a class="btn btn-primary" href="done_event.php?id='.$id.'"><i class="fa fa-check"></i></a>';

                                                                                if($redacteur != strtoupper($user) AND $redacteur != $user)
                                                                                    $action = '<a class="btn btn-primary" href="details_event.php?id='.$id.'"><i class="fa fa-eye"></i></a>';

                                                                                if($redacteur == strtoupper($user) OR $redacteur == $user)
                                                                                    if($delais == "honoré !")
                                                                                        $action = '<a class="btn btn-success" href="#"><i class="fa fa-handshake"></i></a>';

                                                                                if($redacteur != strtoupper($user) AND $redacteur != $user)
                                                                                    if($delais == "honoré !")
                                                                                        $action = '<a class="btn btn-success" href="#"><i class="fa fa-handshake"></i></a>';

                                                                                if($redacteur == strtoupper($user) OR $redacteur == $user)
                                                                                    if($delais == "dépassé !")
                                                                                        $action = '<a class="btn btn-danger" href="modifier_event.php?id=' . $id . '"><i class="fa fa-pencil-alt"></i></a>||<a class="btn btn-danger" href="done_event.php?id=' . $id . '"><i class="fa fa-check"></i></a>';

                                                                                if($redacteur != strtoupper($user) AND $redacteur != $user)
                                                                                    if($delais == "dépassé !")
                                                                                        $action = '<a class="btn btn-danger" href="details_event.php?id=' . $id . '"><i class="fa fa-eye"></i></a>';


                                                                                if($redacteur == strtoupper($user) OR $redacteur == $user)
                                                                                    if($delais == 'Aujourd\'hui !')
                                                                                        $action = '<a class="btn btn-info" href="modifier_event.php?id=' . $id . '"><i class="fa fa-pencil-alt"></i></a>||<a class="btn btn-info" href="done_event.php?id=' . $id . '"><i class="fa fa-check"></i></a>';

                                                                                if($redacteur != strtoupper($user) AND $redacteur != $user)
                                                                                    if($delais == 'Aujourd\'hui !')
                                                                                        $action = '<a class="btn btn-info" href="details_event.php?id=' . $id . '"><i class="fa fa-eye"></i></a>';


                                                                                if($delais == 'Aujourd\'hui !')
                                                                                    $style = "table-danger";


//                                        if($delais == "honoré !")
//                                            $action = '<a class="btn btn-success" href="#"><i class="fa fa-handshake"></i></a>';
//                                        elseif($delais == "dépassé !") {
//                                            if ($redacteur == strtoupper($user) OR $redacteur == $user)
//                                                $action = '<a class="btn btn-danger" href="modifier_event.php?id=' . $id . '"><i class="fa fa-pencil-alt"></i></a>||<a class="btn btn-danger" href="done_event.php?id=' . $id . '"><i class="fa fa-check"></i></a>';
//                                            else
//                                                $action = '<a class="btn btn-danger" href="details_event.php?id=' . $id . '"><i class="fa fa-eye"></i></a>';
//                                        }



                                                                                ?>

                                                                                <tr>

                                                                                    <input name="id_agenda" type="hidden" value="<?php echo $row['id_agenda'];?>" />
                                                                                    <td align="center"><a href="details_event.php?id=<?php echo $row['id_agenda']; ?>" title="Détails"><i class="fas fa-bullhorn"></i> <?= $titre; ?></a></td>
                                                                                    <td align="center" class="<?=$style;?>"><?=$date_s;?> (<?=$hour_s;?>) <br/> Délais <?= $delais;?></td>
                                                                                    <td align="center" class="<?=$style;?>"><?=$date_e;?> (<?=$hour_e;?>)</td>
                                                                                    <td align="center"><?= strtoupper($redacteur); ?></td>
                                                                                    <td align="center"><?= strtoupper($salle); ?></td>
                                                                                    <td align="center"><?= number_format($prix); ?></td>
                                                                                    <td align="center" width="200">
                                                                                        <?php
                                                                                        echo $action;
                                                                                        ?>
                                                                                    </td>
                                                                                </tr>
                                                                            <?php } ?>
                                                                            </tbody>

                                                                            <tr class="bg-primary">
                                                                                <th><p align="center">Titre</p></th>
                                                                                <th><p align="center">Début</p></th>
                                                                                <th><p align="center">Fin</p></th>
                                                                                <th><p align="center">Redacteur</p></th>
                                                                                <th><p align="center">Salle</p></th>
                                                                                <th><p align="center">Coût</p></th>
                                                                                <th><p align="center">Action</p></th>
                                                                            </tr>
                                                                        </table>
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
<!--                                ***********************************************************************-->

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