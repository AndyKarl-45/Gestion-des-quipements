 <?php
include("first.php");
 include('php/main_side_navbar.php');
?>

<!--Content-->

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Liste des Pays</h1>
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
                                
                                <!-- Nav pills -->
                            
                            <b> 
                                
                                <!-- Nav pills -->
                                <ul class="nav nav-pills"   style="float: right;">
                                    <li class="nav-item">
                                        <a class="nav-link active"  data-toggle="modal" data-target="#ajouterPays" href="#home">
                                            <i class="fas fa-cubes"></i>
                                            Nouveau Pays
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
                                                        <th><p align="center">Pays</p></th>
                                                        <th><p align="center">Options</p></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                    <?php

                                                        $query = "SELECT * from pays where open_close!='1' ";
                                                        $q = $db->query($query);
                                                        while($row = $q->fetch())
                                                        {
                                                            $nom  =strtoupper($row['nom']);
                                                            $id_pays= $row['id_pays'];
                                                            ?>

                                                            <tr>
                                                                <input name="nom" type="hidden" value="<?php echo $row['nom'];?>" />
                                                                <td align="center"><b><?php echo $nom; ?></b></td>
                                                                <td align="center"><a class="btn btn-danger" type="button" data-toggle="modal" data-target="#verifier_delete_pays<?=$id_pays; ?>" title="supprimer"  style="background-color: transparent">
                                                                <i style="color: red" class="fas fa-trash"></i>
                                                        </a></td>
                                                                             <?php 
                        include("verifier_delete_pays.php");
                            ?> 
                                                            </tr>

                                                        <?php } ?>
                                                    </tbody>
                                                        <tfoot>
                                                            <tr class="bg-primary">
                                                        <th><p align="center"> Pays</p></th>
                                                        <th><p align="center">Options</p></th>
                                                            </tr>
                                                        </tfoot>
                                                        
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

                    
                    include("ajouter_pays.php");


                    ?>





    <!--//Footer-->
<?php
include('foot.php');
?>