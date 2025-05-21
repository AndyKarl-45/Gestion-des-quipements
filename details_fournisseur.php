<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

?>
<?php
$id_fournisseur=$_REQUEST['id'];

$query  = "SELECT * from fournisseur where id_fournisseur='".$id_fournisseur."'";
$q = $db->query($query);
while($row = $q->fetch())
{ 
         $id_fournisseur = $row['id_fournisseur'];

     /*-------------------- DETAILS FOURNISSEURS  --------------------*/
        $ref_four = $row['ref_four'];
        $raison_social_four = $row['raison_social_four'];
        $pays_four = $row['pays_four'];
        $ville_four = $row['ville_four'];
        $tel_four = $row['tel_four'];
        $email_four = $row['email_four'];
        $pers_contact_four = $row['pers_contact_four'];
        $tel_contact_four = $row['tel_contact_four'];


?>

<!--Content-->

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Détails du Fournisseur :  <?=$ref_four ?> </h1>
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
                                        <a class="nav-link active" href="<?=$fournisseur['option2_link']?>">
                                            Retour
                                        </a>
                                    </li>                              
                                </ul>
                                <!-- Nav pills -->
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#home">
                                            <i class="fas fa-cubes"></i>
                                            Détails<!-- <?=$id_personnel?> -->
                                        </a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#menu1">
                                            <i class="fas fa-users"></i>
                                             Etat de paiements[]                                        </a>
                                    </li> -->
                             <!--  <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#menu2">
                                            <i class="fas fa-cubes"></i>
                                            <?php

                                            // $query = "SELECT DISTINCT count(id_materiel) as total from fournisseur_materiel where   id_fournisseur='$id_fournisseur'  ";
                                            // $q = $db->query($query);
                                            // while($row = $q->fetch())
                                            // {

                                            //     echo ' Achats des équipements['.$row['total'].']';
                                            // }

                                            ?>
                                            
                                        </a>
                                    </li>            -->                   
                                </ul>
                            </b>
                        </div>

                        <div class="card-body">
                            <!-- Tab panes -->
                            <div class="tab-content">
<!--********************************************DETAILS************************************************* -->
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
                                                              <table  border="0" class="table  table-hover table-condensed" width="100%" cellspacing="0" id="myTable">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <span class="help-block small-font" >RÉFERENCE:</span>
                                                                            <div class="col">
                                                                                <input  style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="ref_four" value="<?php  echo $ref_four?>" disabled>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >RAISON SOCIALE:</span>

                                                                            <div class="col">
                                                                                <input  style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="raison_social_four" value="<?php  echo $raison_social_four?>" disabled>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>

                                                                        <td>
                                                                            <span class="help-block small-font" >PAYS:</span>
                                                                            <div class="col">
                                                                                <select name="pays_four" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" disabled>
                                                                                    <option value="<?=$pays_four?>" selected=""><?=$pays_four?></option>           
                                                                             </select>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                        <span class="help-block small-font" >VILLE:</span>
                                                                            <div class="col">
                                                                                <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="ville_four"  value="<?php  echo $ville_four?>" disabled>
                                                                            </div>
                                                                            </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <span class="help-block small-font" >TEL:</span>
                                                                            <div class="col">
                                                                                <input  style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="tel_four" value="<?php  echo $tel_four?>" disabled>
                                                                            </div>

                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >EMAIL:</span>
                                                                            <div class="col">
                                                                                <input type="email" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray" name="email_four" value="<?php  echo $email_four?>" disabled>
                                                                            </button> 
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <span class="help-block small-font" >PERSONNE À CONTACTER:</span>
                                                                            <div class="col">
                                                                                <input  style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="pers_contact_four" value="<?php  echo $pers_contact_four?>" disabled>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                                <span class="help-block small-font" >TEL DE LA PERSONNE:</span>
                                                                                <div class="col">

                                                                                    <input  style="width:75%;
                                                                                    border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="tel_contact_four" value="<?php  echo $tel_contact_four?>" disabled>
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

<!--********************************************CLIENT************************************************* -->
                                

<!--********************************************MATERIAUX************************************************* -->
                                                           <div class="tab-pane container" id="menu2">
                                    <!-- infos civile-->

                                   <!--  <h5><b><u>NB:</u></b> Veillez saisir vos informations concernant le traitement de ressource humaine</h5> -->

            


                                    <div class="row">
                                        <hr/>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-12" >
                                            <div class="card mb-4"v>
                             <div class="card-header">
                                <i class="fas fa-scroll"></i>
                                <b>L'ensemble des équipements fournis.</b>
                                <b> 
                                
                                <!-- Nav pills -->
                                <ul class="nav nav-pills"   style="float: right;">
                                    <li class="nav-item">
                                         <a class="nav-link active" href="ajouter_quantite.php?id=<?=$id_fournisseur?>">
                                            <i class="fas fa-cubes"></i>
                                            Ajouter équipement
                                        </a> 
                                    </li>                                    
                                </ul>
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
                                                            <!-- <th><p align="center">Matricule </p></th> -->
                                                            <th><p align="center" style="color: white">Numéro de serie</p></th>
                                                            <th><p align="center" style="color: white">Désignations</p></th>
                                                            <th><p align="center" style="color: white">Quantites</p></th>
                                                            <th><p align="center" style="color: white">Catégorie de matériaux</p></th>
                                                            <th><p align="center" style="color: white">Prix unitaire</p></th>
                                                            <th><p align="center" style="color: white">Options</p></td> 
                                                        </tr>
                                                        </thead>
                                                     <tbody>
                                                     <?php

                                                 $sql = "SELECT DISTINCT * from fournisseur_materiel where id_fournisseur = '$id_fournisseur'";

                                                                $stmt = $db->prepare($sql);
                                                                $stmt->execute();

                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                foreach($tables as $table)
                                                                {
                                                                    $id_four_mat= $table['id_four_mat'];
                                                                    $id_materiel= $table['id_materiel'];
                                                                    $quantite_four= $table['quantite_four'];
                                                                    $prix_unitaire_four= $table['prix_unitaire_four'];
                                                                   
                                                                    
                                                                


                                                        $query = "SELECT * from materiel where id_materiel = '$id_materiel' ";
                                                        $q = $db->query($query);
                                                        while($row = $q->fetch())
                                                        {
                                                            $id = $row['id_materiel'];
                                                            $ref_materiel = $row['ref_materiel'];
                                                            $designation = $row['designation'];
                                                            $id_cat_materiel = $row['id_cat_materiel'];
                                                        


                                                            ?> 

                                                            <tr>
                                                                <input name="id" type="hidden" value="<?php //echo $row['id'];?>" />

                                                        <td align="center"> <?php echo $ref_materiel; ?>  </td>
                                                        <td align="center"> <?php echo $designation; ?>   </td>
                                                        <td align="center"> <?php echo $quantite_four; ?>   </td>
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

                                                    <td align="center"> <?php echo $prix_unitaire_four; ?>  </td>

                <td align="center" style="width: 25%">  
                    <div class="btn-group mr-2" role="group" aria-label="First group">
                         <a class="btn btn-primary"   href="ajouter_four_mat.php?id_materiel=<?=$id_materiel?>&id_fournisseur=<?=$id_fournisseur?>" title="view"
                            style="background-color: transparent">
                                <i  style="color: green" class="fas fa-plus"></i> 
                            </a>
                        </div>
                 <div class="btn-group mr-2" role="group" aria-label="First group">
                         <a class="btn btn-danger"  href="reduire_four_mat.php?id_materiel=<?=$id_materiel?>&id_fournisseur=<?=$id_fournisseur?>" title="Modifier"
                            style="background-color: transparent">
                                <i style="color: orange" class="fas fa-minus"></i> 
                            </a>
                       </div>
                 <div class="btn-group mr-2" role="group" aria-label="First group">
                             <a class="btn btn-danger"  href="delete_four_mat.php?id=<?=$id_four_mat?>&id_four=<?=$id_fournisseur?>"  style="background-color: transparent">
                                  <i style="color: red" class="fas fa-trash"></i>
                            </a>
                        </div>
                        
                        
                 </td>  

                                                              
                                                            </tr>

                                                         <?php }
                                                     } ?>
                                                    </tbody>




                                                        <tfoot>
                                                            <tr class="bg-primary">
                                                            <!-- <th><p align="center">Matricule </p></th> -->
                                                            <th><p align="center" style="color: white">Numéro de serie</p></th>
                                                            <th><p align="center" style="color: white">Désignations</p></th>
                                                            <th><p align="center" style="color: white">Quantites</p></th>
                                                            <th><p align="center" style="color: white">Catégorie de matériaux</p></th>
                                                            <th><p align="center" style="color: white">Prix unitaire</p></th>
                                                            <th><p align="center" style="color: white">Options</p></td>
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