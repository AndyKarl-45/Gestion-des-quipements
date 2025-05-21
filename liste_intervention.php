<?php

include('first.php');
include('php/main_side_navbar.php');

?> 

<!--Content-->

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Liste des interventions </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">
                    Hello M/Mme, il est <?=date("G:i");?> en ce jour du <?=dateToFrench("now","l j F Y");?>.
                </li>
            </ol>
            <!--                Main Body-->
                            <div class="row">
                    <div class="col-xl-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-scroll"></i>
                                <b>L'ensemble des interventions.</b>
                                                            <b> 
                                                                <?php
                                                                if($lvl != 3 && $lvl != 7 && $lvl != 0){
                                                                ?>
                                <!-- Nav pills -->
                                <ul class="nav nav-pills"   style="float: right;">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="<?=$intervention['option1_link']?>">
                                            <i class="fas fa-cubes"></i>
                                            Nouvelle intervention
                                        </a>
                                    </li>                                    
                                </ul>
                                                                <?php
                                                                }
                                                                ?>
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
                                                            <th><p align="center" style="color: white">Salles</p></th>
                                                            <th><p align="center" style="color: white">Nom</p></th>
                                                            <th><p align="center" style="color: white">Date de debut</p></th>
                                                            <th><p align="center" style="color: white">Date de fin</p></th>
                                                            <th><p align="center" style="color: white">Coût</p></th>
                                                            <th><p align="center" style="color: white">Options</p></td></th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                     <?php

                                                     if ($lvl == 7)
                                                         $query = "SELECT * from intervenant WHERE id_salles = (SELECT id_salles FROM salles WHERE secteur = $num_secteur_user)";

                                                     if($lvl == 3)
                                                         $query = "SELECT * from intervenant WHERE id_salles = $id_salle_user";
                                                     else
                                                         $query = "SELECT * from intervenant";

                                                        $q = $db->query($query);
                                                        while($row = $q->fetch())
                                                        {
                                                            $id_inter = $row['id_inter'];
                                                            $technicien = $row['technicien'];
                                                            $date_debut = $row['date_debut'];
                                                            $date_fin = $row['date_fin'];
                                                            $id_salles = $row['id_salles'];
                                                            $nom_salle = $row['nom_salle'];
                                                            $cout = $row['cout'];
                                                            


                                                            ?>

                                                            <tr>
                                                               


                                                    <td align="center"><a href="details_intervenant.php?id=<?php echo $id_inter; ?>" style="color: black"> <?php echo $nom_salle; ?>  </a></td>
                                                    <td align="center"><a href="details_intervenant.php?id=<?php echo $id_inter; ?>" style="color: black"> <?php echo $technicien; ?> </a></td>
                                                    <td align="center"><a href="details_intervenant.php?id=<?php echo $id_inter; ?>" style="color: black"> <?php echo date("d-m-Y",strtotime($date_debut)); ?> </a></td>
                                                    <td align="center"><a href="details_intervenant.php?id=<?php echo $id_inter; ?>" style="color: black"> <?php echo date("d-m-Y",strtotime($date_fin)); ?>  </a></td>
                                                    <td align="center"><a href="details_intervenant.php?id=<?php echo $id_inter; ?>" style="color: black"> <?php echo  number_format($cout) ?>  </a></td>
                                                    

                <td align="center" style="width: 18%">              
                    <a class="btn btn-primary"  href="details_intervenant.php?id=<?php echo $id_inter; ?>" title="view"
                            style="background-color: transparent">
                                <i  style="color: green" class="fas fa-eye"></i> 
                            </a>
                        
                    <?php
                    if($lvl != 3 && $lvl != 7 && $lvl != 8 && $lvl != 0)
                    {
                    ?>
                         <a class="btn btn-warning" href="modifier_intervenant.php?id=<?php echo $id_inter;?>" title="Modifier"
                            style="background-color: transparent">
                                <i style="color: orange" class="fas fa-pen"></i>
                         </a>
                    <?php
                    }
                    ?>
                </td>  

                                                              
                                                            </tr>

                                                         <?php } ?>
                                                    </tbody>

                                                        <tfoot>
                                                            <tr class="bg-primary">
                                                            <th><p align="center" style="color: white">Salles</p></th>
                                                            <th><p align="center" style="color: white">Nom</p></th>
                                                            <th><p align="center" style="color: white">Date de debut</p></th>
                                                            <th><p align="center" style="color: white">Date de fin</p></th>
                                                            <th><p align="center" style="color: white"><?php
                                                                    $totat_int=0;
                                                                    if ($lvl == 7)
                                                                        $query = "SELECT cout from intervenant WHERE id_salles = (SELECT id_salles FROM salles WHERE secteur = $num_secteur_user)";

                                                                    if($lvl == 3)
                                                                        $query = "SELECT cout from intervenant WHERE id_salles = $id_salle_user";
                                                                    else
                                                                        $query = "SELECT cout from intervenant";
                                                                    $q = $db->query($query);
                                                                    while($row = $q->fetch())
                                                                    {
                                                                        $totat_int+=$cout;
                                                                    }
                                                                    echo number_format($totat_int);
                                                                    ?></p></th>
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