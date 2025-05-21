<?php 

include('first.php');
include('php/main_side_navbar.php');

if ($lvl == 5 || $lvl == 6 || $lvl == 8 || $lvl == 7){
    
    
$query = "SELECT DISTINCT count(id_materiel) as total from materiel where  quantite!=0 and open_close!='1'";
                                            $q = $db->query($query);
                                            while($row = $q->fetch())
                                            {
                                                $ancien_eq=$row['total'];
                                            }

$query = "SELECT DISTINCT count(id_materiel) as total from demande_materiel_sal where  etat=1 ";
$q = $db->query($query);
while($row = $q->fetch())
{
    $total_sal=$row['total'];
}



$totale=0;
                                            $query = "SELECT * from demande_equipement where  etat=1 ";
                                            $q = $db->query($query);
                                            while($row = $q->fetch())
                                            {
                                                $id_ask_eq = $row['id_ask_eq'];

                                           
                                            
                                            $sql = "SELECT DISTINCT count(id_materiel) as total from demande_materiel where  etat=1 and id_ask_eq='$id_ask_eq'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach($tables as $table)
                                                                                            {
                                                                                                 $totale+=1;
                                                                                               
                                                                                            }
                                                            
                                            }
                                           
$total_materiel= $totale + $total_sal + $ancien_eq;


// $total_materiel = 0;
// $prix_total_materiel = 0;
// $query = "SELECT count(id_materiel) as total from materiel where open_close!='1'";
// $q = $conn->query($query);
// while ($row = $q->fetch_assoc()) {
//     $total_materiel = $row["total"];
// }

$total_fournisseur = 0;
$query = "SELECT count(id_fournisseur) as total from fournisseur where open_close!='1'";
$q = $conn->query($query);
while ($row = $q->fetch_assoc()) {
    $total_fournisseur = $row["total"];
}
    $prix_total_materiel=0;
$query = "SELECT prix_total from materiel where open_close!='1'";
$q = $conn->query($query);
while ($row = $q->fetch_assoc()) {
    $prix_total_materiel += $row["prix_total"];
}

$total_salles = 0;
$query = "SELECT count(id_salles) as total from salles";
$q = $conn->query($query);
while ($row = $q->fetch_assoc()) {
    $total_salles = $row["total"];
}

//------------------- Intervention ----------------------

$total_intervention = 0;
$query = "SELECT count(id_ask_inter) as total from demande_inter";
$q = $conn->query($query);
while ($row = $q->fetch_assoc()) {
    $total_intervention = $row["total"];
}

$total_inter_finish = 0;
$query = "SELECT count(id_ask_inter) as total from demande_inter where statut=1";
$q = $conn->query($query);
while ($row = $q->fetch_assoc()) {
    $total_inter_finish = $row["total"];
}

$total_inter_next = 0;
$query = "SELECT count(id_ask_inter) as total from demande_inter where statut=0";
$q = $conn->query($query);
while ($row = $q->fetch_assoc()) {
   $total_inter_next = $row["total"];
}

$total_inter_fail = 0;
$query = "SELECT count(id_ask_inter) as total from demande_inter where statut=-1";
$q = $conn->query($query);
while ($row = $q->fetch_assoc()) {
    $total_inter_fail = $row["total"];
}




//------------------- Demande Equipement ----------------------

// $total_demande_mag_sal = 0;
// $query = "SELECT count(id_ask_eq) as total from demande_equipement where  (round( DATEDIFF( now(), convert(date_debut, date))) <=1 and etat=0) or etat=1 ";
// $q = $conn->query($query);
// while ($row = $q->fetch_assoc()) {
//     $total_demande_mag_sal = $row["total"];
// }

// $total_demande_mag_sal = 0;
// $query = "SELECT count(id_ask_eq) as total from demande_equipement ";
// $q = $conn->query($query);
// while ($row = $q->fetch_assoc()) {
//     $total_demande_mag_sal =  = $row["total"];
// }


 $query = "SELECT round( DATEDIFF( now(), :date_aniv) / 365) as ager";
 $sql = $db->prepare($query);
 $sql->bindParam(':date_aniv', $date_aniv);
 $sql->execute();
 while ($row = $sql->fetch()) {
     $ager = $row["ager"];
}

//Liste des demandes valable moins de 24h = 1 jour

// $total_demande_mag_sal_next = 0;
// $query = "SELECT count(id_ask_eq) as total from demande_equipement where etat=0 and round( DATEDIFF( now(), convert(date_debut, date))) <=1 ";
// $q = $conn->query($query);
// while ($row = $q->fetch_assoc()) {
//     $total_demande_mag_sal_next = $row["total"];
// }


$query = "SELECT DISTINCT count(id_ask_eq) as total from demande_materiel where etat=0 and id_salles!=0  ";
$q = $db->query($query);
while($row = $q->fetch())
{
   $total_demande_mag_sal_next =$row['total'];
    
}


$total_demande_mag_sal_finish = 0;
$query = "SELECT count(id_ask_eq) as total from demande_equipement where etat=1 ";
$q = $conn->query($query);
while ($row = $q->fetch_assoc()) {
    $total_demande_mag_sal_finish = $row["total"];
}

$total_demande_mag_sal = $total_demande_mag_sal_finish + $total_demande_mag_sal_next;



}else{

$query = "SELECT DISTINCT count(id_materiel) as total from materiel where   id_salles='$id_salle_user' and quantite!=0 and open_close!='1' ";
                                            $q = $db->query($query);
                                            while($row = $q->fetch())
                                            {
                                                $ancien_eq=$row['total'];
                                            }

$query = "SELECT DISTINCT count(id_materiel) as total from demande_materiel_sal where   id_salles_dst='$id_salle_user' and etat=1 ";
$q = $db->query($query);
while($row = $q->fetch())
{
    $total_sal=$row['total'];
}



$totale=0;
                                            $query = "SELECT * from demande_equipement where  etat=1 and id_salles='$id_salle_user'";
                                            $q = $db->query($query);
                                            while($row = $q->fetch())
                                            {
                                                $id_ask_eq = $row['id_ask_eq'];

                                           
                                            
                                            $sql = "SELECT DISTINCT count(id_materiel) as total from demande_materiel where  etat=1 and id_ask_eq='$id_ask_eq'";

                                                                                            $stmt = $db->prepare($sql);
                                                                                            $stmt->execute();

                                                                                            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                            foreach($tables as $table)
                                                                                            {
                                                                                                 $totale+=1;
                                                                                               
                                                                                            }
                                                            
                                            }
                                           
$total_materiel= $totale + $total_sal + $ancien_eq;

    
//     $total_materiel = 0;
// $prix_total_materiel = 0;
// $query = "SELECT count(id_materiel) as total from materiel where id_salles ='$id_salle_user' AND open_close!='1'";
// $q = $conn->query($query);
// while ($row = $q->fetch_assoc()) {
//     $total_materiel = $row["total"];
// }

$total_fournisseur = 0;
$query = "SELECT count(id_fournisseur) as total from fournisseur where open_close!='1'";
$q = $conn->query($query);
while ($row = $q->fetch_assoc()) {
    $total_fournisseur = $row["total"];
}

// $query = "SELECT prix_total FROM materiel WHERE id_salles ='$id_salle_user' and open_close!='1'";
// $q = $conn->query($query);
// while ($row = $q->fetch_assoc()) {
//     $prix_total_materiel += $row["prix_total"];
// }
//---------------------------------------------------------------------------------------------------------------

                                                            $query = "SELECT * from salles WHERE id_salles ='$id_salle_user'";
                                                        $q = $db->query($query);
                                                        while($row = $q->fetch())
                                                        {
                                                                                            $prix=0;
                                                                                            $i=0;
                                                                                            

                                                                     $sql = "SELECT * from materiel where  id_salles='$id_salle_user' and statut='1'";

                                                                    $stmt = $db->prepare($sql);
                                                                    $stmt->execute();

                                                                    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                    foreach($tables as $table)
                                                                    { 
                                                                        $prix_total = $table['prix_total'];
                                                                        $prix=$prix+$prix_total;
                                                                    }
                                                                    $prix1=0;

                                                                                    

                                                                                    $sql = "SELECT DISTINCT * from demande_materiel where  etat=1 and id_salles='$id_salle_user'";

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
                                                                $sql = "SELECT quantite, id_materiel from demande_materiel_sal where  id_salles_dst='$id_salle_user'";

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
                                                               

                                                                    $totaux[$i]=$prix+$prix1+$prix_sal;
//                                                                    $sal[$i]=$nom;
                                                                $i=$i+1;
                                                        }
                                                
                                                                $prix_total_materiel=0;
                                                              $n=count($totaux);
//                                                              echo '</br>';
                                                                for($i=0; $i<$n; $i++){
                                                                    $prix_total_materiel+=$totaux[$i];

                                                                }
                                                              
//--------------------------------------------------------------------------------------------------------------

$total_salles = $salle_user;


//------------------- Intervention ----------------------

$total_intervention = 0;
$query = "SELECT count(id_ask_inter) as total from demande_inter where id_salles ='$id_salle_user'";
$q = $conn->query($query);
while ($row = $q->fetch_assoc()) {
    $total_intervention = $row["total"];
}

$total_inter_finish = 0;
$query = "SELECT count(id_ask_inter) as total from demande_inter where statut=1 and  id_salles ='$id_salle_user'";
$q = $conn->query($query);
while ($row = $q->fetch_assoc()) {
    $total_inter_finish = $row["total"];
}

$total_inter_next = 0;
$query = "SELECT count(id_ask_inter) as total from demande_inter where statut=0 and  id_salles ='$id_salle_user'";
$q = $conn->query($query);
while ($row = $q->fetch_assoc()) {
   $total_inter_next = $row["total"];
}

$total_inter_fail = 0;
$query = "SELECT count(id_ask_inter) as total from demande_inter where statut=-1 and id_salles ='$id_salle_user'";
$q = $conn->query($query);
while ($row = $q->fetch_assoc()) {
    $total_inter_fail = $row["total"];
}



//------------------- Demande Equipement ----------------------

// $total_demande_mag_sal = 0;
// $query = "SELECT count(id_ask_eq) as total from demande_equipement where id_salles ='$id_salle_user'  ";
// $q = $conn->query($query);
// while ($row = $q->fetch_assoc()) {
//     $total_demande_mag_sal = $row["total"];
// }

$total_demande_mag_sal_next = 0;
//$query = "SELECT count(id_ask_eq) as total from demande_equipement where etat=0 and id_salles ='$id_salle_user' and round( DATEDIFF( now(), convert(date_debut, date))) <=1";
$query = "SELECT DISTINCT count(id_ask_eq) as total from demande_materiel WHERE id_salles = $id_salle_user and etat=0 and id_salles!=0";
$q = $conn->query($query);
while ($row = $q->fetch_assoc()) {
    $total_demande_mag_sal_next = $row["total"];
}

$total_demande_mag_sal_finish = 0;
$query = "SELECT count(id_ask_eq) as total from demande_equipement where etat=1 and id_salles ='$id_salle_user' ";
$q = $conn->query($query);
while ($row = $q->fetch_assoc()) {
    $total_demande_mag_sal_finish = $row["total"];
}

$total_demande_mag_sal = $total_demande_mag_sal_finish + $total_demande_mag_sal_next;



}
?>

<!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Tableau de Bord</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme, il est <?=date("G:i");?> en ce jour du <?=dateToFrench("now","l j F Y");?>.
                    </li>
                </ol>

                <!--                Quelques états-->
                <div class="row">
                    <div class="col-md-12">
                        <hr/>
                    </div>
                </div>
<?php
if($lvl != 3 && $lvl != 7){
?>
                <label>
                    <i class="far fa-newspaper"></i>
                    Ressources matérielles et fournisseurs
                </label>

                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <?php
                                if($lvl == 4 || $lvl == 2 || $lvl == 5 ){
                                ?>
                                <a href="liste_equipement.php" style="text-decoration: none; ">
                                    <div class="dash-widget" style="background-color: #D6DBDF ">
                                        <span class="dash-widget-bg3"><i class="fas fa-cubes"
                                                                 aria-hidden="true"></i></span>
                                        <div class="dash-widget-info text-right">
                                            <h3 style="color:#14089F"><?=  number_format($total_materiel)?></h3>
                                            <span class="widget-title3">Equipements <i class="fa fa-check" aria-hidden="true"></i></span>
                                         </div>
                                    </div>
                                 </a>
                                <?php
                                }else{
                                ?>
                                <a href="#" style="text-decoration: none; ">
                                    <div class="dash-widget" style="background-color: #D6DBDF ">
                                        <span class="dash-widget-bg3"><i class="fas fa-cubes"
                                                                 aria-hidden="true"></i></span>
                                     <div class="dash-widget-info text-right">
                                         <h3 style="color:#14089F"><?= number_format($total_materiel) ?></h3>
                                        <span class="widget-title3">Equiepements <i class="fa fa-check" aria-hidden="true"></i></span>
                                     </div>
                                 </div>
                                 </a>
                                <?php
                                }
                                ?>
                        
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <?php
                                if($lvl == 3 || $lvl == 5 || $lvl == 7 || $lvl == 8){
                                    ?>
                                    <a href="liste_laboratin.php" style="text-decoration: none; ">
                                    <div class="dash-widget" style="background-color: #D6DBDF ">
                                        <span class="dash-widget-bg6"><i class="fas fa-school" aria-hidden="true"></i></span>
                                        <div class="dash-widget-info text-right">
                                            <h3 style="color:#14089F" ><?= $total_salles ?></h3>
                                            <span class="widget-title6">Salles <i class="fa fa-check"
                                                                                      aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                    </a>
                                    <?php
                                }else{
                                    ?>
                                     <a href="liste_laboratin.php" style="text-decoration: none; ">
                                    <div class="dash-widget" style="background-color: #D6DBDF ">
                                        <span class="dash-widget-bg6"><i class="fas fa-school" aria-hidden="true"></i></span>
                                        <div class="dash-widget-info text-right">
                                            <h3 style="color:#14089F"><?= $total_salles ?></h3>
                                            <span class="widget-title6">Salles <i class="fa fa-check"
                                                                                      aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                 </a>
                                    <?php
                                }
                                ?>
                        
                    </div>
                    
                   
                    
                </div>

<?php
}
?>
                <div class="row">
                    <div class="col-md-12">
                        <hr/>
                    </div>
                </div>

                <!--               Etat-->
                <label>
                    <i class="far fa-newspaper"></i>
                    Etats des demandes d'équiepements
                </label>

                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <?php
                                if($lvl == 4 || $lvl == 2 || $lvl == 5 ){
                                ?>
                                <a href="liste_equipement.php" style="text-decoration: none; ">
                                    <div class="dash-widget" style="background-color: #D6DBDF ">
                                        <span class="dash-widget-bg1"><i class="fas fa-random"
                                                                 aria-hidden="true"></i></span>
                                        <div class="dash-widget-info text-right">
                                            <h3 style="color:#14089F"><?= number_format($total_demande_mag_sal)?></h3>
                                            <span class="widget-title1">Demandes matériel <i class="fa fa-check" aria-hidden="true"></i></span>
                                         </div>
                                    </div>
                                 </a>
                                <?php
                                }else{
                                ?>
                                <a href="#" style="text-decoration: none; ">
                                    <div class="dash-widget" style="background-color: #D6DBDF ">
                                        <span class="dash-widget-bg1"><i class="fas fa-random"
                                                                 aria-hidden="true"></i></span>
                                     <div class="dash-widget-info text-right">
                                         <h3 style="color:#14089F"><?= number_format($total_demande_mag_sal)?></h3>
                                        <span class="widget-title1">Demandes matériel <i class="fa fa-check" aria-hidden="true"></i></span>
                                     </div>
                                 </div>
                                 </a>
                                <?php
                                }
                                ?>
                        
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                         <?php
                            if($lvl == 4 || $lvl == 5){
                                ?>
                            <a href="liste_nurse.php" style="text-decoration: none; ">
                            <div class="dash-widget" style="background-color: #D6DBDF ">
                                <span class="dash-widget-bg5"><i class="far fa-edit" aria-hidden="true"></i>
                                    <!-- <i class="fa fa-heartbeat fas fa-user-nurse" aria-hidden="true"></i> --></span>
                                <div class="dash-widget-info text-right">
                                    <h3 style="color:#14089F" ><?= number_format($total_demande_mag_sal_next)?></h3>
                                    <span class="widget-title5">Demande en cours <i class="fa fa-check"
                                                                                    aria-hidden="true"></i></span>
                                </div>
                            </div>
                        </a>
                            <?php
                            }else{
                            ?>
                        <a href="#" style="text-decoration: none; ">
                            <div class="dash-widget" style="background-color: #D6DBDF ">
                                <span class="dash-widget-bg5"><i class="far fa-edit" aria-hidden="true"></i>
                                    <!-- <i class="fa fa-heartbeat fas fa-user-nurse" aria-hidden="true"></i> --></span>
                                <div class="dash-widget-info text-right">
                                    <h3 style="color:#14089F" ><?= number_format($total_demande_mag_sal_next)?></h3>
                                    <span class="widget-title5">Demande en cours <i class="fa fa-check"
                                                                                    aria-hidden="true"></i></span>
                                </div>
                            </div>
                        </a>
                            <?php
                            }
                            ?>
                        
                    </div>
                    
                   
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <?php
                                if($lvl == 3 || $lvl == 5 || $lvl == 7 || $lvl == 8){
                                    ?>
                                    <a href="liste_laboratin.php" style="text-decoration: none; ">
                                    <div class="dash-widget" style="background-color: #D6DBDF ">
                                        <span class="dash-widget-bg2"><i class="fas fa-handshake" aria-hidden="true"></i></span>
                                        <div class="dash-widget-info text-right">
                                            <h3 style="color:#14089F" ><?= number_format($total_demande_mag_sal_finish)?></h3>
                                            <span class="widget-title2">Demande  Succès <i class="fa fa-check"
                                                                                      aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                    </a>
                                    <?php
                                }else{
                                    ?>
                                     <a href="liste_laboratin.php" style="text-decoration: none; ">
                                    <div class="dash-widget" style="background-color: #D6DBDF ">
                                        <span class="dash-widget-bg2"><i class="fas fa-handshake" aria-hidden="true"></i></span>
                                        <div class="dash-widget-info text-right">
                                            <h3 style="color:#14089F" ><?= number_format($total_demande_mag_sal_finish)?></h3>
                                            <span class="widget-title2">Demande  Succès <i class="fa fa-check"
                                                                                      aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                 </a>
                                    <?php
                                }
                                ?>
                        
                    </div>

                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                         <?php
                            if($lvl == 4 || $lvl == 5){
                                ?>
                            <a href="liste_nurse.php" style="text-decoration: none; ">
                            <div class="dash-widget" style="background-color: #D6DBDF ">
                                <span class="dash-widget-bg4"><i class=" fas fa-shipping-fast" aria-hidden="true"></i>
                                    <!-- <i class="fa fa-heartbeat fas fa-user-nurse" aria-hidden="true"></i> --></span>
                                <div class="dash-widget-info text-right">
                                    <h3 style="color:#14089F" ><?= number_format($total_fournisseur) ?></h3>
                                    <span class="widget-title4">Fournisseurs <i class="fa fa-check"
                                                                                    aria-hidden="true"></i></span>
                                </div>
                            </div>
                        </a>
                            <?php
                            }else{
                            ?>
                        <a href="#" style="text-decoration: none; ">
                            <div class="dash-widget" style="background-color: #D6DBDF ">
                                <span class="dash-widget-bg4"><i class=" fas fa-shipping-fast" aria-hidden="true"></i>
                                    <!-- <i class="fa fa-heartbeat fas fa-user-nurse" aria-hidden="true"></i> --></span>
                                <div class="dash-widget-info text-right">
                                    <h3 style="color:#14089F" ><?= number_format($total_fournisseur) ?></h3>
                                    <span class="widget-title4">Fournisseurs <i class="fa fa-check"
                                                                                    aria-hidden="true"></i></span>
                                </div>
                            </div>
                        </a>
                            <?php
                            }
                            ?>
                        
                    </div>
                    
                    
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <hr/>
                    </div>
                </div>

                <!--               Etat-->
                <label>
                    <i class="far fa-newspaper"></i>
                    Etats des interventions
                </label>

                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <?php
                                if($lvl == 4 || $lvl == 2 || $lvl == 5 ){
                                ?>
                                <a href="liste_equipement.php" style="text-decoration: none; ">
                                    <div class="dash-widget" style="background-color: #D6DBDF ">
                                        <span class="dash-widget-bg6"><i class="fas fa-tools"
                                                                 aria-hidden="true"></i></span>
                                        <div class="dash-widget-info text-right">
                                            <h3 style="color:#14089F"><?= number_format($total_intervention)?></h3>
                                            <span class="widget-title6">Interventions <i class="fa fa-check" aria-hidden="true"></i></span>
                                         </div>
                                    </div>
                                 </a>
                                <?php
                                }else{
                                ?>
                                <a href="#" style="text-decoration: none; ">
                                    <div class="dash-widget" style="background-color: #D6DBDF ">
                                        <span class="dash-widget-bg6"><i class="fas fa-tools"
                                                                 aria-hidden="true"></i></span>
                                     <div class="dash-widget-info text-right">
                                         <h3 style="color:#14089F"><?= number_format($total_intervention)?></h3>
                                        <span class="widget-title6">Interventions <i class="fa fa-check" aria-hidden="true"></i></span>
                                     </div>
                                 </div>
                                 </a>
                                <?php
                                }
                                ?>
                        
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                         <?php
                            if($lvl == 4 || $lvl == 5){
                                ?>
                            <a href="liste_nurse.php" style="text-decoration: none; ">
                            <div class="dash-widget" style="background-color: #D6DBDF ">
                                <span class="dash-widget-bg5"><i class=" fas fa-business-time" aria-hidden="true"></i>
                                    <!-- <i class="fa fa-heartbeat fas fa-user-nurse" aria-hidden="true"></i> --></span>
                                <div class="dash-widget-info text-right">
                                    <h3 style="color:#14089F" ><?= number_format($total_inter_next)?></h3>
                                    <span class="widget-title5">Interventions en cours <i class="fa fa-check"
                                                                                    aria-hidden="true"></i></span>
                                </div>
                            </div>
                        </a>
                            <?php
                            }else{
                            ?>
                        <a href="#" style="text-decoration: none; ">
                            <div class="dash-widget" style="background-color: #D6DBDF ">
                                <span class="dash-widget-bg5"><i class=" fas fa-business-time" aria-hidden="true"></i>
                                    <!-- <i class="fa fa-heartbeat fas fa-user-nurse" aria-hidden="true"></i> --></span>
                                <div class="dash-widget-info text-right">
                                    <h3 style="color:#14089F" ><?= number_format($total_inter_next)?></h3>
                                    <span class="widget-title5">Interventions en cours <i class="fa fa-check"
                                                                                    aria-hidden="true"></i></span>
                                </div>
                            </div>
                        </a>
                            <?php
                            }
                            ?>
                        
                    </div>
                    
                   
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <?php
                                if($lvl == 3 || $lvl == 5 || $lvl == 7 || $lvl == 8){
                                    ?>
                                    <a href="liste_laboratin.php" style="text-decoration: none; ">
                                    <div class="dash-widget" style="background-color: #D6DBDF ">
                                        <span class="dash-widget-bg2"><i class="fas fa-toolbox" aria-hidden="true"></i></span>
                                        <div class="dash-widget-info text-right">
                                            <h3 style="color:#14089F" ><?= number_format($total_inter_finish)?></h3>
                                            <span class="widget-title2">Interventions Succès <i class="fa fa-check"
                                                                                      aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                    </a>
                                    <?php
                                }else{
                                    ?>
                                     <a href="liste_laboratin.php" style="text-decoration: none; ">
                                    <div class="dash-widget" style="background-color: #D6DBDF ">
                                        <span class="dash-widget-bg2"><i class="fas fa-toolbox" aria-hidden="true"></i></span>
                                        <div class="dash-widget-info text-right">
                                            <h3 style="color:#14089F" ><?= number_format($total_inter_finish)?></h3>
                                            <span class="widget-title2">Interventions Succès <i class="fa fa-check"
                                                                                      aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                 </a>
                                    <?php
                                }
                                ?>
                        
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <?php
                                if($lvl == 3 || $lvl == 5 || $lvl == 7 || $lvl == 8){
                                    ?>
                                    <a href="liste_laboratin.php" style="text-decoration: none; ">
                                    <div class="dash-widget" style="background-color: #D6DBDF ">
                                        <span class="dash-widget-bg3"><i class="fas fa-wrench" aria-hidden="true"></i></span>
                                        <div class="dash-widget-info text-right">
                                            <h3 style="color:#14089F" ><?= $total_inter_fail?></h3>
                                            <span class="widget-title3">Interventions échecs <i class="fa fa-check"
                                                                                      aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                    </a>
                                    <?php
                                }else{
                                    ?>
                                     <a href="liste_laboratin.php" style="text-decoration: none; ">
                                    <div class="dash-widget" style="background-color: #D6DBDF ">
                                        <span class="dash-widget-bg3"><i class="fas fa-wrench" aria-hidden="true"></i></span>
                                        <div class="dash-widget-info text-right">
                                            <h3 style="color:#14089F" ><?= $total_inter_fail ?></h3>
                                            <span class="widget-title3">Interventions échecs <i class="fa fa-check"
                                                                                      aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                 </a>
                                    <?php
                                }
                                ?>
                        
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <hr/>
                    </div>
                </div>

                <!--               Etat-->
                <label>
                    <i class="far fa-newspaper"></i>
                    Coût Général d'Investissement
                </label>

                <div class="row">
                    <div class="col-xl-12 col-md-12">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">
                                <div class="text-center">
                                    <h1><?=number_format($prix_total_materiel)?></h1>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <?php
                                if($lvl == 4 || $lvl == 2 || $lvl == 5){
                                    ?>
                                    <a class="small text-white stretched-link" href="liste_materiaux.php">Coût Général d'Investissement</a>
                                    <?php
                                }else{
                                    ?>
                                    <a class="small text-white stretched-link" href="">Coût Général d'Investissement</a>
                                    <?php
                                }
                                ?>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <hr/>
                    </div>
                </div>

                <!--                évènement du jour-->
                <div class="row">
                    <div class="col-md-12">
                        <label>
                            <i class="fas fa-calendar"></i>
                            ÉVÈNEMENTS DU JOUR
                        </label>
                        <fieldset>
                            <div class="table-responsive">
                                <form method="post" action="" >
                                    <table class="table table-bordered table-hover table-condensed" id="myTable">
                                        <thead>
                                        <tr class="bg-primary">
                                            <th><p align="center">Titre</p></th>
                                            <th><p align="center">Début</p></th>
                                            <th><p align="center">Fin</p></th>
                                            <th><p align="center">Redacteur</p></th>
                                            <th><p align="center">Action</p></th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr class="bg-primary">
                                            <th><p align="center">Titre</p></th>
                                            <th><p align="center">Début</p></th>
                                            <th><p align="center">Fin</p></th>
                                            <th><p align="center">Redacteur</p></th>
                                            <th><p align="center">Action</p></th>
                                        </tr>
                                        </tfoot>

                                        <?php
                                        $yes_today = 0;

                                        if($lvl == 3)
                                            $query = "SELECT * FROM agenda WHERE salle = $id_salle_user";
                                        else
                                            $query = "SELECT * FROM agenda";

                                        $q = $conn->query($query);
                                        while($row = $q->fetch_assoc()) {
                                        $id = $row['id_agenda'];
                                        $titre = $row['event_nom'];
                                        $id_salle = $row['salle'];
                                        $date_debut = $row['date_debut'];
                                        $date_fin = $row['date_fin'];
                                        $redacteur = $row['redacteur'];
                                        $event_description = $row['event_description'];
                                        $statut = $row['statut'];
                                        $notif = $row['notif'];


                                        $hour_s = date("H:i",strtotime($date_debut));
                                        $date_s = date("d-m-Y",strtotime($date_debut));

                                        $hour_e = date("H:i",strtotime($date_fin));
                                        $date_e = date("d-m-Y",strtotime($date_fin));

                                        //                                        if($statut == "Cloturer"){
                                        //                                            $action = '<button type="button" class="btn btn-outline-success" >Cloturé</button>';
                                        //                                        }elseif ($statut == "Classer"){
                                        //                                            $action = '<button type="button" class="btn btn-secondary btn-sm" >Classé</button>';
                                        //                                        }

                                        $style = "default";
                                        $dateDiff = "";
                                        $delais = "$dateDiff";

                                        if(!empty($id_salle)){
                                            $iResult = $db->query("SELECT * FROM salles WHERE id_salles = ".$id_salle);
                                            while($data = $iResult->fetch()){
                                                $salle = $data['nom'];
                                            }
                                        }else{
                                            $salle = "N/A";
                                        }

                                        if($date_debut != ""){
                                            // start date
                                            $start_date = date("Y-m-d");

                                            // end date
                                            //$end_date = $delais_traitement;

                                            // call dateDifference() function to find the number of days between two dates
                                            $dateDiff = dateDifference($start_date, date("Y-m-d",strtotime($date_debut)));
                                            $delais = $dateDiff.' Jour.s';
                                            if (0 < $dateDiff AND $dateDiff < 8) {
                                                $style = "table-warning";

//                                                if($start_date == $notif) {
                                                    $mailler = new mailsenderclass();

                                                    $subject = "Agenda de Service CamPresJ";
                                                    $body = "Bonjour! <br/> N'oubliez pas que vous avez un service à renouveller <br/>
                                                            <b>Echeance : </b> dans " . $dateDiff . " jour-s<br/>
                                                            <b>Titre : </b>" . strtoupper($titre) . "<br/>
                                                            <b>Salle : </b>" . strtoupper($salle) . "<br/>"

                                                        . " par "
                                                        . strtoupper($redacteur)
                                                        . "<br/>
                                                             <a href='campresjonlline.net'>Voir les details</a>";

                                                    $from = 'supergoal@campresjonlline.net';
                                                    $from_name = 'CAMPRESJ EQUIEPEMENT';
                                                    $sql = $db->query("select * from users where lvl = 7 or lvl = 5 or lvl = 3");
                                                    while ($row = $sql->fetch()) {
                                                        $to = $row['email'];
                                                        $mailler->mailsenderclass($to, $from, $from_name, $subject, $body);
                                                    }

                                                    $update = $db->query("update agenda set notif='$start_date' where id_agenda = '$id'");
//
//                                                }
                                            }

                                            if (1 < $dateDiff AND $dateDiff < 8)
                                                $delais = $dateDiff.' Jour.s';

                                            if ($dateDiff > 0)
                                                if($statut == "D")
                                                    $style = "table-success";

                                            if ($dateDiff == 0)
                                                if($statut == "N")
                                                    $style = "table-info";

                                            if ($dateDiff == 0)
                                                if($statut == "D")
                                                    $style = "table-success";

                                            if ($dateDiff < 1)
                                                if($statut == "D")
                                                    $style = "table-success";

                                            if ($dateDiff > 0)
                                                if($statut == "D")
                                                    $delais = 'honoré !';

                                            if ($dateDiff < 0)
                                                if($statut == "D")
                                                    $delais = 'honoré !';

                                            if ($dateDiff < 1)
                                                if($statut == "N")
                                                    $style = "table-danger";

                                            if ($dateDiff == 0)
                                                if($statut == "N")
                                                    $delais = 'Aujourd\'hui !';


                                            if ($dateDiff < 0)
                                                if($statut == "N")
                                                    $delais = 'dépassé !';
                                        }


                                        if($redacteur == strtoupper($user))
                                            $action = '<a class="btn btn-primary" href="modifier_event.php?id='.$id.'"><i class="fa fa-pencil-alt"></i></a>||<a class="btn btn-primary" href="done_event.php?id='.$id.'"><i class="fa fa-check"></i></a>';

                                        if($redacteur != strtoupper($user))
                                            $action = '<a class="btn btn-primary" href="details_event.php?id='.$id.'"><i class="fa fa-eye"></i></a>';

                                        if($redacteur == strtoupper($user))
                                            if($delais == "honoré !")
                                                $action = '<a class="btn btn-success" href="#"><i class="fa fa-handshake"></i></a>';

                                        if($redacteur != strtoupper($user))
                                            if($delais == "honoré !")
                                                $action = '<a class="btn btn-success" href="#"><i class="fa fa-handshake"></i></a>';

                                        if($redacteur == strtoupper($user))
                                            if($delais == "dépassé !")
                                                $action = '<a class="btn btn-danger" href="modifier_event.php?id=' . $id . '"><i class="fa fa-pencil-alt"></i></a>||<a class="btn btn-danger" href="done_event.php?id=' . $id . '"><i class="fa fa-check"></i></a>';

                                        if($redacteur != strtoupper($user))
                                            if($delais == "dépassé !")
                                                $action = '<a class="btn btn-danger" href="details_event.php?id=' . $id . '"><i class="fa fa-eye"></i></a>';


                                        if($redacteur == strtoupper($user))
                                            if($delais == 'Aujourd\'hui !')
                                                $action = '<a class="btn btn-info" href="modifier_event.php?id=' . $id . '"><i class="fa fa-pencil-alt"></i></a>||<a class="btn btn-info" href="done_event.php?id=' . $id . '"><i class="fa fa-check"></i></a>';

                                        if($redacteur != strtoupper($user))
                                            if($delais == 'Aujourd\'hui !')
                                                $action = '<a class="btn btn-info" href="details_event.php?id=' . $id . '"><i class="fa fa-eye"></i></a>';


                                        if($delais == 'Aujourd\'hui !')
                                            $style = "table-info";


                                        //                                        if($delais == "honoré !")
                                        //                                            $action = '<a class="btn btn-success" href="#"><i class="fa fa-handshake"></i></a>';
                                        //                                        elseif($delais == "dépassé !") {
                                        //                                            if ($redacteur == strtoupper($user))
                                        //                                                $action = '<a class="btn btn-danger" href="modifier_event.php?id=' . $id . '"><i class="fa fa-pencil-alt"></i></a>||<a class="btn btn-danger" href="done_event.php?id=' . $id . '"><i class="fa fa-check"></i></a>';
                                        //                                            else
                                        //                                                $action = '<a class="btn btn-danger" href="details_event.php?id=' . $id . '"><i class="fa fa-eye"></i></a>';
                                        //                                        }
                                        ?>


                                        <?php
                                        if($delais == 'Aujourd\'hui !'){
                                        $yes_today ++;
                                        ?>

                                        <tbody>
                                        <tr>
                                            <input name="id_agenda" type="hidden" value="<?php echo $row['id_agenda'];?>" />
                                            <td align="center"><a href="details_event.php?id=<?php echo $row['id_agenda']; ?>" title="Détails"><i class="fas fa-bullhorn"></i> <?= $titre; ?></a></td>
                                            <td align="center" class="<?=$style;?>"><?=$date_s;?> (<?=$hour_s;?>) <br/> Délais <?= $delais;?></td>
                                            <td align="center"><?=$date_e;?> (<?=$hour_e;?>)</td>
                                            <td align="center"><?= $redacteur; ?></td>
                                            <td align="center" width="200">
                                                <?php
                                                echo $action;
                                                ?>
                                                <!--                                            <a class="btn btn-primary" href="traitement_courrier.php?id=--><?php //echo $id; ?><!--">Traiter</a>-->
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                        }
                                        if($yes_today == 0) {
                                            echo '<tr>';
                                            echo '<td align="center" colspan="5">';
                                            echo '<div class="bg-warning">  Aucune activité en ce jour <i class="fas fa-question"></i></div>';
                                            echo '</td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </fieldset>
                    </div>
                </div>

            </div>
        </main>
    </div>

<!--//Footer-->
<?php
include('foot.php');
?>