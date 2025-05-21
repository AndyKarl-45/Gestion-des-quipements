<?php

include('first.php');
include('php/main_side_navbar.php');

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Liste des demandes d'équipements en echec </h1>
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
                                <b>L'ensemble des demandes d'équipements.</b>
                                <b>
                                    <?php if ($lvl != 4){ ?>
                                        <!-- Nav pills -->
                                        <ul class="nav nav-pills"   style="float: right;">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="nouvelle_demande_eq.php">
                                                    <i class="fas fa-cubes"></i>
                                                    Nouvelle demande
                                                </a>
                                            </li>
                                        </ul>
                                    <?php } ?>
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
                                                            <th><p align="center" style="color: white">Date de demande </p></th>
                                                            <th><p align="center" style="color: white">Date de validation </p></th>
                                                            <th><p align="center" style="color: white">Equipements</p></th>
                                                            <th><p align="center" style="color: white">Options</p></th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        <?php

                                                        if($lvl == 3)
                                                            $query = "SELECT * from demande_materiel WHERE id_salles = $id_salle_user and etat=-1 and id_salles!=0  order by id_ask_eq desc";
                                                        else
                                                            $query = "SELECT * from demande_materiel where etat=-1 and id_salles!=0  order by id_ask_eq desc";

                                                        $q = $db->query($query);
                                                        while($row = $q->fetch())
                                                        {
                                                            $id_ask_eq = $row['id_ask_eq'];
                                                            $id_salles = $row['id_salles'];
                                                            $nom_salle = $row['nom_salle'];
                                                            $etat = $row['etat'];
                                                            $emetteur = $row['emetteur'];

                                                            $sql = "SELECT DISTINCT * from demande_equipement where id_ask_eq = '$id_ask_eq'";

                                                            $stmt = $db->prepare($sql);
                                                            $stmt->execute();

                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                            foreach($tables as $table)
                                                            {

                                                                $date_debut = $table['date_debut'];
                                                                $date_valide = $table['date_valide'];
                                                                $heure = $table['heure'];
                                                            }

                                                            ?>

                                                            <tr>



                                                                <td align="center"><a href="details_demande_eq.php?id=<?php echo $id_ask_eq; ?>" style="color: black"> <?php echo $nom_salle; ?>  </a></td>
                                                                <td align="center"><a href="details_demande_eq.php?id=<?php echo $id_ask_eq; ?>" style="color: black"> <?php echo date("d-m-Y",strtotime($date_debut)); ?>  </a></td>
                                                                <td align="center"><a href="details_demande_eq.php?id=<?php echo $id_ask_eq; ?>" style="color: black"> <?php if($date_valide=='N/A'){echo 'N/A';}else{echo date("d-m-Y",strtotime($date_valide)); echo ' ('.$heure.')';} ?>  </a></td>


                                                                <td align="center" style="width: 18%">
                                                                    <a class="btn btn-primary"  href="details_demande_eq.php?id=<?php echo $id_ask_eq; ?>" title="view"
                                                                       style="background-color: transparent">
                                                                        <i  style="color: green" class="fas fa-eye"></i>
                                                                    </a>


                                                                    <!-- <a class="btn btn-warning" href="modifier_demande_eq.php?id=<?php echo $id_ask_eq;?>" title="Modifier"
                            style="background-color: transparent">
                                <i style="color: orange" class="fas fa-pen"></i>  -->
                                                                </td>

                                                                <td align="center" style="width: 18%">
                                                                    <?php
                                                                    if($lvl == 4 || $lvl == 5 || $lvl == 6 || $lvl==3){
                                                                        if($etat!=1){
                                                                            if($lvl==3){
                                                                                echo' <a class="btn btn-primary" href="modifier_demande_eq.php?id='.$id_ask_eq.'"><i class="fa fa-pencil-alt"></i></a>';
                                                                            }else{
                                                                                echo' <a class="btn btn-primary" href="modifier_demande_eq.php?id='.$id_ask_eq.'"><i class="fa fa-pencil-alt"></i></a>||<a class="btn btn-primary" href="valider_demande.php?idi='.$id_ask_eq.'&ids='.$id_salles.'&ide='.$emetteur.'&idr=S"><i class="fa fa-check"></i></a>';
                                                                            }
                                                                        }else{
                                                                            echo'<a class="btn btn-success" href="#"><i class="fa fa-handshake"></i></a>';
                                                                        }

                                                                    }


                                                                    ?>
                                                                </td>


                                                            </tr>

                                                        <?php } ?>
                                                        </tbody>

                                                        <tfoot>
                                                        <tr class="bg-primary">
                                                            <th><p align="center" style="color: white">Salles</p></th>
                                                            <th><p align="center" style="color: white">Date de demande </p></th>
                                                            <th><p align="center" style="color: white">Date de validation </p></th>
                                                            <th><p align="center" style="color: white">Equipements</p></td></th>
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
                    text: 'Vous n\'avez pas selectionné d\'équipements !',
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