<?php

include('first.php');
 include("php/db.php");
include('php/main_side_navbar.php');

?>

<!--Content-->

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Liste des mouvements des sorties</h1>
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
                                <b>L'ensemble des équipements.</b>
                                <b>
                                
                                <!-- Nav pills -->
                                <!-- <ul class="nav nav-pills"   style="float: right;">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="<?=$materiaux['option1_link']?>">
                                            <i class="fas fa-cubes"></i>
                                            Nouveau équipement
                                        </a>
                                    </li>                                    
                                </ul> -->
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
                                                            <th><p align="center" style="color: white">Numéro de serie</p></th>
                                                            <th><p align="center" style="color: white">Désignations</p></th>
                                                            <th><p align="center" style="color: white">Quantites</p></th>
                                                            <th><p align="center" style="color: white">Catégorie de matériaux</p></th>
                                                            <th><p align="center" style="color: white">Date</p></th>
                                                            <th><p align="center" style="color: white">Prix unitaire</p></th>
                                                            <th><p align="center" style="color: white">Prix total</p></th>
                                                            <th><p align="center" style="color: white">Options</p></th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                     <?php

                                                     $query = "SELECT * from demande_materiel where emetteur='C' and etat=1  and id_salles=0 ";
                                                                                $q = $db->query($query);
                                                                                while($row = $q->fetch())
                                                                                {
                                                                                    $id = $row['id_materiel'];
                                                                                    $quantite = $row['quantite'];
                                                                                    $id_ask_eq = $row['id_ask_eq'];

                                                                                    $sql = "SELECT DISTINCT * from demande_equipement where emetteur='C' and etat=1 and id_ask_eq='$id_ask_eq'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach($tables as $table)
                                                                                            {
                                                                                               $date_valide = $table['date_valide'];
                                                                                               $heure = $table['heure'];
                                                                                                }


                                                                                   $sql = "SELECT DISTINCT * from materiel where id_materiel = '$id'";

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
                                                                                                $statut = $table['statut'];
                                                                                                $id_materiel = $table['id_materiel'];

                                                       

                                                            ?>

                                                            <tr>
                                                                <input name="id" type="hidden" value="<?php echo $id_materiel;?>" />

                                                       <td align="center"><a href="details_materiel.php?id=<?php echo $id_materiel; ?>" style="color: black"> <?php echo $ref_materiel; ?>  </a> </td>
                                                        <td align="center"><a href="details_materiel.php?id=<?php echo $id_materiel; ?>" style="color: black"> <?php echo $designation; ?> </a>  </td>


                                                     
                                                     

                                                        <td align="center"><a href="details_materiel.php?id=<?php echo $id_materiel; ?>"style="color: black"> <?php echo number_format($quantite)?> </a></td>
                                                        <td align="center"><a href="details_materiel.php?id=<?php echo $id_materiel; ?>" style="color: black">
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
                                                            </a>
                                                               </td>
                                                    <td align="center"><a href="details_materiel.php?id=<?php echo $id_materiel; ?>" style="color: black"> <?php if(isset($date_valide)){
                                                     echo date("d-m-Y",strtotime($date_valide)); 
                                                     echo  ' ('.$heure.')';
                                                    }else{
                                                        echo 'N/A';
                                                    } ?> </a> </td>

                                                    <td align="center"><a href="details_materiel.php?id=<?php echo $id_materiel; ?>" style="color: black"> <?php echo number_format($prix_unitaire); ?> </a> </td>
                                                    <td align="center"><a href="details_materiel.php?id=<?php echo $id_materiel; ?>" style="color: black"> <?php echo number_format($prix_total=$prix_unitaire*$quantite); ?> </a> </td>

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
                    if($lvl == 6){
                    ?>
                             <a class="btn btn-danger" type="button" data-toggle="modal" data-target="#verifier_delete_materiaux<?= $id_materiel; ?>" title="supprimer"  style="background-color: transparent">
                                  <i style="color: red" class="fas fa-trash"></i>
                            </a>  
                   
            
                                                
                     <?php
                    }
                        include("verifier_delete_materiaux.php");
                            ?>
                                    
                            
                        
                 </td>  

                                                              
                                                            </tr>

                                                        <?php }
                                                    }
                                                         ?> 
                                                    </tbody>

                                                        <tfoot>
                                                            <tr class="bg-primary">
                                                            <th><p align="center" style="color: white">TOTAUX :</p></th>
                                                            <th class="bg-secondary"><p align="center" style="color: white">-</p></th>
                                                            <th class="bg-secondary"><p align="center" style="color: white">
                                                                   <?php
                                                                    $sum=0;
                                                                    $query = "SELECT * from demande_materiel where emetteur='C' and etat=1  and id_salles=0 ";
                                                                    $q = $db->query($query);
                                                                    while($row = $q->fetch()) {
                                                                        $quantite = $row['quantite'];
                                                                        $sum=$sum+$quantite;
                                                                    }
                                                                    echo number_format($sum);

                                                                    ?>
                                                                </p></th>
                                                            <th class="bg-secondary"><p align="center" style="color: white">-</p></th>
                                                             <th class="bg-secondary"><p align="center" style="color: white">-</p></th>
                                                            <th class="bg-secondary"><p align="center" style="color: white"><?php
                                                                    $p=0;
                                                                    $query = "SELECT * from demande_materiel where emetteur='C'and etat=1  and id_salles=0";
                                                                    $q = $db->query($query);
                                                                    while($row = $q->fetch()) {
                                                                        $id = $row['id_materiel'];
                                                                        

                                                                        $sql = "SELECT DISTINCT * from materiel where id_materiel = '$id'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach($tables as $table)
                                                                                            {
                                                                                                $prix_unitaire = $table['prix_unitaire'];
                                                                                                $p=$p+$prix_unitaire;
                                                                                            }
                                                                    }
                                                                    echo number_format($p);

                                                                    ?></p></th>
                                                            <th class="bg-secondary"><p align="center" style="color: white"><?php
                                                                    $pt=0;
                                                                    $query = "SELECT * from demande_materiel where emetteur='C' and etat=1  and id_salles=0";
                                                                    $q = $db->query($query);
                                                                    while($row = $q->fetch()) {
                                                                        $id = $row['id_materiel'];
                                                                        $quantite = $row['quantite'];
                                                                        

                                                                        $sql = "SELECT DISTINCT * from materiel where id_materiel = '$id'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach($tables as $table)
                                                                                            {
                                                                                                $prix_total = $table['prix_unitaire']*$quantite;
                                                                                                $pt=$pt+$prix_total;
                                                                                            }
                                                                    }
                                                                    echo number_format($pt);

                                                                    ?></p></th>
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