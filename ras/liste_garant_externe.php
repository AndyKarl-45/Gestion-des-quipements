<?php

include('first.php');
 include("php/db.php");
include('php/navbar_links.php');
include('php/main_side_navbar.php');

?>

<!--Content-->

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Liste des Garants</h1>
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
                                <b>L'ensemble des garants de campresj.</b>
                                                            <b> 
                                
                                <!-- Nav pills -->
                                <ul class="nav nav-pills"   style="float: right;">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="<?=$garant['option1_link']?>">
                                            <i class="fas fa-cubes"></i>
                                            Nouveau garant
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
                                                            <th><p align="center">NOM</p></th>
                                                            <th><p align="center">N°CNI</p></th>
                                                            <th><p align="center">PROFESSION</p></th>
                                                            <th><p align="center">VILLE</p></th>
                                                    <th><p align="center">PROPRIETAIRE DU LOCAL </p></th>
                                                            <th><p align="center">OPTIONS</p></th>

                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                    <?php

                                                        $query = "SELECT * from garant_externe";
                                                        $q = $db->query($query);
                                                        while($row = $q->fetch())
                                                        {
                                                          $id = $row['id_garant_ex']; 
                                                            $nom = $row['nom'];
                                                            $prenom = $row['prenom'];
                                                            $id_card_number = $row['id_card_number'];
                                                            $profession = $row['profession'];
                                                            $ville = $row['ville'];
                                                            $quartier = $row['quartier'];
                                                            $proprietaire_local = $row['proprietaire_local'];
                                                            $tel_proprietaire = $row['tel_proprietaire'];


                                                            ?>

                                                            <tr>
                                                                <input name="id_garant_ex" type="hidden" value="<?php echo $row['id_garant_ex'];?>" />

                                                            <td align="center">
                                                                <?php echo $nom.' '.$prenom; ?>
                                                            </td>
                                                            <td align="center"><?php echo $id_card_number; ?>   </td>
                                                            <td align="center"><?php echo $profession; ?>  </td>
                                                            <td align="center"><?php echo $ville; ?> </td>
                                                             <td align="center"><?php echo $proprietaire_local; ?>  </td>
                                                            <!-- <td align="center"><?php echo $tel_proprietaire; ?> -->  </td>


                <td align="center">
                   
                    <div class="btn-group mr-2" role="group" aria-label="First group">
                         <a class="btn btn-primary"  href="details_garant_externe.php?id=<?= $id; ?>" title="view"
                            style="background-color: transparent">
                                <i  style="color: green" class="fas fa-eye"></i> 
                            </a>
                        </div>
                    <div class="btn-group mr-2" role="group" aria-label="First group">
                         <a class="btn btn-warning" href="modifier_garant_externe.php?id=<?=$id;?>" title="Modifier"
                            style="background-color: transparent">
                                <i style="color: orange" class="fas fa-pen"></i> 
                            </a>
                       </div>
<!--                      <div class="btn-group mr-2" role="group" aria-label="First group">
                             <a class="btn btn-danger" type="button" data-toggle="modal" data-target="#verifier_delete_garant_externe<?= $id; ?>" title="supprimer"  style="background-color: transparent">
                                  <i style="color: red" class="fas fa-trash"></i>
                            </a>
                        </div>  -->
                       
                    <?php 
                      //  include("verifier_delete_garant_externe.php");
                            ?>        
                 </td>  

                                                              
                                                            </tr>

                                                        <?php } ?>
                                                    </tbody>

                                                        <tfoot>
                                                            <tr class="bg-primary">
                                                            <th><p align="center">NOM</p></th>
                                                            <th><p align="center">N°CNI</p></th>
                                                            <th><p align="center">PROFESSION</p></th>
                                                            <th><p align="center">VILLE</p></th>
                                                    <th><p align="center">PROPRIETAIRE DU LOCAL</p></th>
                                                            <th><p align="center">OPTIONS</p></th>
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