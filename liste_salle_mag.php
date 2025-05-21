<?php

include('first.php');
 include("php/db.php");
include('php/main_side_navbar.php');

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
            <h1 class="mt-4">Détails de la Salle : <?= $nom?> : Mag->Salles</h1>
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
                                <ul class="nav nav-pills"   style="float: right;">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="details_salle.php?id=<?=$id?>">
                                           <!--  <i class="fas fa-cubes"></i> -->
                                           Retour 
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
                                                            <th><p align="center" style="color: white">Numéro de serie</p></th>
                                                            <th><p align="center" style="color: white">Désignations</p></th>
                                                            <th><p align="center" style="color: white">Quantites</p></th>
                                                            <th><p align="center" style="color: white">Catégorie de matériaux</p></th>
                                                             <th><p align="center" style="color: white">Date</p></th>
                                                            <th><p align="center" style="color: white">Prix unitaire</p></th>
                                                            <th><p align="center" style="color: white">Prix total</p></th>
                                                            <th><p align="center" style="color: white">Options</p></th>
                                                            <th><p align="center" style="color: white">Transfert</p></th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                     <?php

                                                     $query = "SELECT * from demande_equipement where  etat=1 and id_salles='$id'";
                                                                                $q = $db->query($query);
                                                                                while($row = $q->fetch())
                                                                                {
                                                                                    
                                                                                    $id_ask_eq = $row['id_ask_eq'];
                                                                                    $statut = $row['etat'];
                                                                                    $date_valide = $row['date_valide'];
                                                                                    $heure = $row['heure'];
                                                                                    $emetteur = $row['emetteur'];

                                                                                    $sql = "SELECT DISTINCT * from demande_materiel where  id_ask_eq='$id_ask_eq'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach($tables as $table)
                                                                                            {
                                                                                                $id = $table['id_materiel'];
                                                                                                $quantite = $table['quantite'];
                                                                                                $id_ask_eq = $table['id_ask_eq'];
                                                                                                $id_ask_mat = $table['id_ask_mat'];
                                                                                                $statute = $table['etat'];
                                                                                               
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
                                                    <td align="center"><a href="details_materiel.php?id=<?php echo $id_materiel; ?>" style="color: black"> <?php echo date("d-m-Y",strtotime($date_valide)); echo ' ('.$heure.')'; ?> </a> </td>
                                                    <td align="center"><a href="details_materiel.php?id=<?php echo $id_materiel; ?>" style="color: black"> <?php echo number_format($prix_unitaire); ?> </a> </td>
                                                    <td align="center"><a href="details_materiel.php?id=<?php echo $id_materiel; ?>" style="color: black"> <?php echo number_format($prix_total=$prix_unitaire*$quantite); ?> </a> </td>

                <td align="center" style="width: 18%"> 

                    <?php
//                   if (isset($_GET['statut']) and isset($_GET['idms'])){
//                                    $idms = $_GET['idms'];
//                                    if($idms==$id){
//                                        $statut = $_GET['statut'];
//                                    }
//                                 }

                            if($statute==0){

                                echo' <a class="btn btn-primary" href="refuser_reception.php?ids='.$id_salles.'&idm='.$id_materiel.'&ideq='.$id_ask_eq.'&ide='.$emetteur.'">
                                <i class="fa fa-trash"></i></a>||<a class="btn btn-primary" href="valider_reception_mag.php?ids='.$id_salles.'&idm='.$id_materiel.'&ideqs='.$id_ask_eq.'&ide='.$emetteur.'"><i class="fa fa-check"></i></a>';

                            }elseif($statute==1){
                                echo'<a class="btn btn-success" href="details_salle.php?id='.$id_salles.'&statut=0&idms='.$id_materiel.'"><i class="fa fa-handshake"></i></a>';
                            }elseif($statute==-1){
                                 echo'<a class="btn btn-danger" href="details_salle.php?id='.$id_salles.'&statut=0&idms='.$id_materiel.'"><i class="fas fa-handshake-slash"></i></a>';
                            }  
                    ?>
                        
                                    
                            
                        
                 </td>
                <td align="center">   <div class="btn-group mr-2" role="group" aria-label="First group">
                        <?php if( $lvl > 2  && $lvl < 9){?>
                            <a class="btn btn-primary" href="transfert_all_materiel_salle_mag.php?id_materiel=<?=$id_materiel;?>&ids=<?=$id_salles?>&qt=<?=$quantite?>&id_ask_mat=<?=$id_ask_mat?>" title="Modifier"
                               style="background-color: transparent">
                                <i style="color: green" class="fas fa-random"></i>
                            </a>
                        <?php } ?>
                    </div>
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
                                                                    $query = "SELECT * from demande_materiel where  etat=1 and id_salles=0 and receveur='M' ";
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
                                                                    $query = "SELECT * from demande_materiel where receveur='M' and etat=1  and id_salles=0";
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
                                                                    $query = "SELECT * from demande_materiel where  etat=1  and id_salles='$id_salles'";
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

                                                                    ?>

                                                                </p></th>
                                                            <th><p align="center" style="color: white">Options</p></th>
                                                                <th><p align="center" style="color: white">Transfert</p></th>
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
    }
?>
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