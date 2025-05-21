<?php

include('first.php');
include("php/db.php");
include('php/main_side_navbar.php');

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Liste des équipements du magasin centrale</h1>
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
                                <b>L'ensemble des équipements du magasin centrale.</b>
                                <b>

                                    <!-- Nav pills -->
                                    <ul class="nav nav-pills"   style="float: right;">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="<?=$materiaux['option1_link']?>">
                                                <i class="fas fa-cubes"></i>
                                                Nouveau équipement
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
                                                    <table class="tablemanager table-bordered table-hover">
                                                        <thead>
                                                        <tr class="bg-primary">
                                                            <th><p align="center" style="color: white">Numéro de serie</p></th>
                                                            <th><p align="center" style="color: white">Désignations</p></th>
                                                            <th><p align="center" style="color: white">Quantites</p></th>
                                                            <!--   <th><p align="center" style="color: white">Catégorie de matériaux</p></th> -->
                                                            <th><p align="center" style="color: white">Prix unitaire</p></th>
                                                            <th><p align="center" style="color: white">Prix total</p></th>
                                                            <th><p align="center" style="color: white">Options</p></td>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php

                                                        $query = "SELECT * from materiel where  statut=0  and mag='C' and open_close!='1' ";
                                                        // $q = $db->query($query);
                                                        // while($row = $q->fetch())
                                                        // {
                                                        // $sql = "SELECT DISTINCT * from materiel where mag='O' and  open_close!='1'";

                                                        $stmt = $db->prepare($query);
                                                        $stmt->execute();

                                                        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                        foreach($tables as $table)
                                                        {
                                                        $id_materiel = $table['id_materiel'];
                                                        $ref_materiel = $table['ref_materiel'];
                                                        $designation = $table['designation'];
                                                        $quantite = $table['quantite'];
                                                        // $id_cat_materiel = $row['id_cat_materiel'];
                                                        $prix_unitaire = $table['prix_unitaire'];
                                                        $prix_total = $table['prix_total'];


                                                        ?>
                                                        <tr>
                                                            <input name="id" type="hidden" value="<?php echo $id_materiel;?>" />

                                                            <td align="center"><a href="details_materiel.php?id=<?php echo $id_materiel; ?>" style="color: black"> <?php echo $ref_materiel; ?>  </a> </td>
                                                            <td align="center"><a href="details_materiel.php?id=<?php echo $id_materiel; ?>" style="color: black"> <?php echo $designation; ?> </a>  </td>





                                                            <td align="center"><a href="details_materiel.php?id=<?php echo $id_materiel; ?>"style="color: black"> <?php echo number_format($quantite)?> </a></td>

                                                            <td align="center"><a href="details_materiel.php?id=<?php echo $id_materiel; ?>" style="color: black"> <?php echo number_format($prix_unitaire); ?> </a> </td>
                                                            <td align="center"><a href="details_materiel.php?id=<?php echo $id_materiel; ?>" style="color: black"> <?php echo number_format($prix_total); ?> </a> </td>

                                                            <td align="center" style="width: 18%">              <a class="btn btn-primary"  href="details_materiel.php?id=<?php echo $id_materiel; ?>" title="view"
                                                                                                                   style="background-color: transparent">
                                                                    <i  style="color: green" class="fas fa-eye"></i>
                                                                </a>

                                                                <?php
                                                                if($lvl == 5){
                                                                    ?>
                                                                    <a class="btn btn-warning" href="modifier_materiaux.php?id=<?=$id_materiel;?>" title="Modifier"
                                                                       style="background-color: transparent">
                                                                        <i style="color: orange" class="fas fa-pen"></i>
                                                                    </a>


                                                                    <?php
                                                                }
                                                                if($lvl == 6 or $lvl==5){
                                                                    ?>
                                                                    <!-- <a class="btn btn-danger" type="button" data-toggle="modal" data-target="#verifier_delete_materiaux<?= $id_materiel; ?>" title="supprimer"  style="background-color: transparent">-->
                                                                    <!--      <i style="color: red" class="fas fa-trash"></i>-->
                                                                    <!--</a>  -->
                                                                    <a class="btn btn-danger" href="delete_materiaux.php?id_materiel=<?=$id_materiel?>" onclick="Supp(this.href); return(false);"  style="background-color: transparent" > <i style="color: red" class="fas fa-trash"></i></a>



                                                                    <?php
                                                                }
                                                                //   include("verifier_delete_materiaux.php");
                                                                ?>



                                                            </td>


                                                        </tr>
                                                        <?php } ?>
                                                        </tbody>
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

    <script type="text/javascript">
        function Supp(link){
            if(confirm('Confirmer  la suppression du Matériel ?')){
                document.location.href = link;
            }
        }
    </script>




    <!--//Footer-->
<?php
include('foot.php');
?>