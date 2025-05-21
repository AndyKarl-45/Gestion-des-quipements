 <?php

include('first.php');
include('php/main_side_navbar.php');

?>

<!--Content-->

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Liste du Personnels</h1>
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
                                <i class="fas fa-scroll"></i>
                                <b>L'ensemble du personnel de campresj.</b>
                                 <b> 
                                
                                <!-- Nav pills -->
                                <ul class="nav nav-pills"   style="float: right;">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="<?=$personnel['option1_link']?>">
                                            <i class="fas fa-user"></i>
                                            Nouveau personnel
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
                                                            <th><p align="center">Photo</p></th>
                                                            <th><p align="center">Nom</p></th>
                                                            <th><p align="center">Prenom</p></th>
                                                            <th><p align="center">Poste </p></th>
                                                            <th><p align="center">Secteur </p></th> 
                                                            <th><p align="center">Salle</p></th>
                                                            <th><p align="center">Statut</p></th>
                                                            <th><p align="center">Options</p></th> 
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                    <?php

                                                    $lien = "";
                                                    $size = 0;
                                                    $query = "SELECT * from personnel order by nom asc";
                                                        $q = $db->query($query);
                                                        while($row = $q->fetch())
                                                        {
                                                            $lien = "";
                                                            $size = 0;
                                                            $id = $row['id_personnel'];
                                                            $nom = $row['nom'];
                                                            $prenom = $row['prenom'];
                                                            $profession = $row['profession'];
                                                            $secteur = $row['secteur'];
                                                            $salle = $row['salle'];
                                                            $statut = $row['statut'];

                                                            /*-------------------- PHOTO --------------------*/
                                                            $query1  = "SELECT * from photo_profile where id_personnel='".$id."'";
                                                            $q1 = $db->query($query1);
                                                            while($row1 = $q1->fetch())
                                                            {
                                                                $lien = $row1['lien'];
                                                                $size = $row1['taille'];
                                                            }

                                                     ?>

            <tr>
                <input name="id" type="hidden" value="<?php echo $id?>" />
                <td align="center" style="width : 10%; height: 10%">
                    <div class="text-center">
                        <a href="details_personnel.php?id=<?php echo $id; ?>">
                            <img src="<?=$lien?>" class="img-thumbnail" style="width : 100px; height: 100px" alt="<?='photo de '.$prenom.' '.$nom?>" >
                        </a>
                    </div>
                </td>
                <td align="center"><a href="details_personnel.php?id=<?php echo $id; ?>" title="<?=$nom; ?>" style="color: black"><?=$nom; ?></a>  </td>
                <td align="center"><a href="details_personnel.php?id=<?php echo $id; ?>" title="<?=$prenom; ?>" style="color: black"><?=$prenom; ?></a>   </td>
                <td align="center"><a href="details_personnel.php?id=<?php echo $id; ?>" title="<?= $profession; ?>" style="color: black"><?= $profession; ?></a>   </td>       
                <td align="center"><a href="details_personnel.php?id=<?php echo $id; ?>" title="<?=$secteur; ?>" style="color: black"><?=$secteur; ?> </a>  </td> 
                <td align="center"><a href="details_personnel.php?id=<?php echo $id; ?>" title="<?=$salle; ?>" style="color: black"><?=$salle; ?></a>   </td>
                <td align="center"><a href="details_personnel.php?id=<?php echo $id; ?>" title="<?=$statut; ?>" style="color: black"><?=$statut; ?></a>   </td>

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
                     <div class="btn-group mr-2" role="group" aria-label="First group">
                             <a class="btn btn-danger" type="button" data-toggle="modal" data-target="#verifier_delete_pers<?= $id; ?>" title="supprimer"  style="background-color: transparent">
                                  <i style="color: red" class="fas fa-trash"></i>
                            </a>
                        </div> 
                       
                    <?php 
                        include("verifier_delete_pers.php");
                            ?>
                                    
                            
                        
                 </td>          
              </tr>

<?php } ?>
            
                                                    </tbody>




                                                        <tfoot>
                                                            <tr class="bg-primary">
                                                            <!-- <th><p align="center">Matricule </p></th> -->
                                                            <th><p align="center">Photo</p></th>
                                                            <th><p align="center">Nom</p></th>
                                                            <th><p align="center">Prenom</p></th>
                                                            <th><p align="center">Poste </p></th>
                                                            <th><p align="center">Secteur </p></th>
                                                            <th><p align="center">Salle</p></th>
                                                            <th><p align="center">Statut</p></th>
                                                            <th><p align="center">Options</p></th>
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