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
            <h1 class="mt-4">Liste des Salles</h1>
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
                                <b>L'ensemble des salles de campresj.</b>
                                                            <b> 
                                
                                <!-- Nav pills -->
                                <?php if ($lvl == 5 || $lvl == 6){ ?>
                                <ul class="nav nav-pills"   style="float: right;">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="<?=$salle['option1_link']?>">
                                            <i class="fas fa-cubes"></i>
                                            Nouvelle salle
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
                                                            <th><p align="center" style="color: white">Nom</p></th>
                                                            <th><p align="center" style="color: white">ville</p></th>
                                                            <th><p align="center" style="color: white">secteur</p></th>
                                                            <th><p align="center" style="color: white">Région</p></th>
                                                            <th><p align="center" style="color: white">Responsable</p></th>
                                                            <th><p align="center" style="color: white">Coût de la salle</p></th>
                                                            <th><p align="center" style="color: white">Options</p></th>

                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                    <?php

                                                        
                                                        if ($lvl == 3){
                                                            $query = "SELECT * from salles WHERE id_salles ='$id_salle_user'";
                                                        }else
                                                            $query = "SELECT * from salles";
                                                        $q = $db->query($query);
                                                        while($row = $q->fetch())
                                                        {
                                                            $id = $row['id_salles']; 
                                                            $code = $row['code'];
                                                            $nom = $row['nom'];
                                                            $tel = $row['tel'];
                                                            $ville = $row['ville'];
                                                            // $quartier = $row['quartier'];
                                                            $secteur = $row['secteur'];
                                                            $responsable = $row['responsable'];


                                                            ?>

                                                            <tr>
                                                                <input name="nom" type="hidden" value="<?php echo $row['nom'];?>" />
                                                            <td align="center"><?php echo $nom; ?>   </td>
                                                            <td align="center"><?php echo $ville; ?>  </td>
                                                            <td align="center" style="width: 10%"><?php echo $secteur; ?>  </td>
                                                                <td align="center" style="width: 10%">
                                                                    <?php

                                                                    $sql = "SELECT DISTINCT * from ville where nom = '$ville'";

                                                                    $stmt = $db->prepare($sql);
                                                                    $stmt->execute();

                                                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                    foreach($tables as $table)
                                                                    {
                                                                        $id_region = $table['id_region'];

                                                                        $sql1 = "SELECT DISTINCT * from region where id_region = '$id_region'";

                                                                        $stmt1 = $db->prepare($sql1);
                                                                        $stmt1->execute();

                                                                        $tables1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
                                                                        foreach($tables1 as $table1)
                                                                        {
                                                                            echo $table1['nom'];
                                                                        }

                                                                    }

                                                                    ?>
                                                                </td>
                                                            <td align="center" style="width: 18%"><?=$responsable?>
                                                            </td>
                                                            <td align="center" style="width: 10%"><?php
                                                                                            $prix=0;
                                                                                            $i=0;


                                                                     $sql = "SELECT * from materiel where  id_salles='$id' and statut='1'";

                                                                    $stmt = $db->prepare($sql);
                                                                    $stmt->execute();

                                                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                    foreach($tables as $table)
                                                                    {
                                                                        $prix_total = $table['prix_total'];
                                                                        $prix=$prix+$prix_total;
                                                                    }
                                                                    $prix1=0;
                                                                      $sql = "SELECT DISTINCT * from demande_materiel where  etat=1  and id_salles='$id'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach($tables as $table)
                                                                                            {
                                                                                                $id_materiel = $table['id_materiel'];
                                                                                                $quantite = $table['quantite'];
                                                                                            $sql = "SELECT DISTINCT * from materiel where id_materiel = '$id_materiel'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach($tables as $table)
                                                                                            {
                                                                                                $prix_unitaire = $table['prix_unitaire'];

                                                                                            }
                                                                                            $prix_total = $quantite*$prix_unitaire;
                                                                                            $prix1=$prix1+$prix_total;
                                                                                                }




                                                                $prix_sal=0;
                                                                $sql = "SELECT quantite, id_materiel from demande_materiel_sal where etat!=0 and id_salles_dst='$id'";

                                                                $stmt = $db->prepare($sql);
                                                                $stmt->execute();

                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                foreach($tables as $table)
                                                                {
                                                                    $id_materiel = $table['id_materiel'];
                                                                    $quantite = $table['quantite'];
                                                                    $sql = "SELECT DISTINCT * from materiel where id_materiel = '$id_materiel'";

                                                                    $stmt = $db->prepare($sql);
                                                                    $stmt->execute();

                                                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                    foreach($tables as $table)
                                                                    {
                                                                        $prix_unitaire = $table['prix_unitaire'];

                                                                    }

                                                                    $prix_total=$quantite*$prix_unitaire;
                                                                    $prix_sal=$prix_sal+$prix_total;
                                                                }
                                                                echo number_format($prix+$prix1+$prix_sal);
                                                                //echo'Mat: '.$prix.'Sal: '.$prix_sal.'Mag: '.$prix1;

                                                                    $totaux[$i]=$prix+$prix1+$prix_sal;
//                                                                    $sal[$i]=$nom;
                                                                $i=$i+1;

                                                                                            ?>
                                                            </td>


                <td align="center" style="width: 18%;">
                    <div class="btn-group mr-2" role="group" aria-label="First group">
                         <a class="btn btn-primary"  href="details_salle.php?id=<?= $id; ?>" title="view"
                            style="background-color: transparent">
                                <i  style="color: green" class="fas fa-eye"></i> 
                            </a>
                        </div>
                    <?php if ($lvl == 5 || $lvl == 6 ){ ?>
                 <div class="btn-group mr-2" role="group" aria-label="First group">
                         <a class="btn btn-warning" href="modifier_salle.php?id=<?=$id;?>" title="Modifier"
                            style="background-color: transparent">
                                <i style="color: orange" class="fas fa-pen"></i> 
                            </a>
                       </div>
                     <div class="btn-group mr-2" role="group" aria-label="First group">
                             <a class="btn btn-danger" type="button" data-toggle="modal" data-target="#verifier_delete_salle<?= $id; ?>" title="supprimer"  style="background-color: transparent">
                                  <i style="color: red" class="fas fa-trash"></i>
                            </a>
                        </div>
                       
                    <?php 
                        include("verifier_delete_salle.php");
                            ?>
                                    
                            
                        
                 </td>  

                                                              
                                                            </tr>

                                                        <?php
                    }
                    } ?>
                                                    </tbody>

                                                        <tfoot>
                                                            <tr class="bg-primary">
                                                            <th><p align="center" style="color: white">Nom</p></th>
                                                            <th><p align="center" style="color: white">ville</p></th>
                                                            <th><p align="center" style="color: white">secteur</p></th>
                                                                <th><p align="center" style="color: white">Région</p></th>
                                                            <th><p align="center" style="color: white">Responsable</p></th>
                                                            <th class="bg-secondary"><p align="center" style="color: white">
                                                                <?php
//                                                                $sum=0;
//                                                              $n=count($totaux);
////                                                              echo '</br>';
//                                                                for($i=0; $i<$n; $i++){
//                                                                    $sum=$sum+$totaux[$i];
////                                                                    echo $totaux[$i].'-'.$i.'-'.$sal[$i].'</br>';
//
//                                                                }
//                                                                echo number_format($sum);

                                                                                            ?>
                                                            </p></th>
                                                            <th><p align="center" style="color: white">Options</p></th>
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