<?php

include('first.php');
include('php/main_side_navbar.php');



//Count request
// Count projets
$total_personnel = 0;
$total_salles =0;
$total_secteurs = 0;
$total_employes = 0;
$total_prestataires = 0;
$total_postulants =0;
$today = date("Y-m-d");
$today = date("t",strtotime($today));

$query = "SELECT count(id_personnel) as total from personnel WHERE statut <> 'PRESTATAIRE'";
$q = $conn->query($query);
while ($row = $q->fetch_assoc()) {
    $total_personnel = $row["total"];
}

$query = "SELECT count(id_personnel) as total from personnel WHERE statut = 'EMPLOYÉ'";

$q = $db->query($query);
while($row = $q->fetch())
{
    $total_employes = $row["total"];
}

$query = "SELECT count(id_personnel) as total from personnel WHERE statut = 'POSTULANT'";
$q = $conn->query($query);
while ($row = $q->fetch_assoc()) {
    $total_postulants = $row["total"];
}

$query = "SELECT count(id_personnel) as total from personnel WHERE statut = 'STAGIAIRE'";
$q = $conn->query($query);
while ($row = $q->fetch_assoc()) {
    $total_stagiaire = $row["total"];
}

$total_conge = 0;
$query = "SELECT count(id_conger) as total from conger_manager WHERE etat = 1";
$q = $conn->query($query);
while ($row = $q->fetch_assoc()) {
    $total_conge = $row["total"];
}

$query = "SELECT count(id_salles) as total from salles";
$q = $conn->query($query);
while ($row = $q->fetch_assoc()) {
    $total_salles = $row["total"];
}

$query = "SELECT count(id_secteur) as total from secteur";
$q = $conn->query($query);
while ($row = $q->fetch_assoc()) {
    $total_secteurs = $row["total"];
}

$total_entree = 0;
$query = "SELECT montant from operations_compta WHERE type_oc = 'entree' AND auteur <> 'special'";
$q = $db->query($query);
while($row = $q->fetch())
{
    $total_entree += $row["montant"];
}

$total_dette = 0;
$query = "SELECT montant from credit WHERE modalite <> statut ";
$q = $db->query($query);
while($row = $q->fetch())
{
    $total_dette += $row["montant"];
}

$total_sortie = 0;
$query = "SELECT montant from operations_compta WHERE type_oc = 'sortie' AND auteur <> 'special'";
$q = $db->query($query);
while($row = $q->fetch())
{
    $total_sortie += $row["montant"];
}



?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Tableau de Bord</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme <?=strtoupper($user);?>, il est <?=date("G:i");?> en ce jour du <?=dateToFrench("now","l j F Y");?>.
                    </li>
                </ol>
                <!--                Quelques états-->
                <label>
                    <i class="far fa-newspaper"></i>
                    Ressource Humaine
                </label>
                <div class="row">
                    <div class="col-xl-3 col-md-3">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">
                                <div class="text-center">
                                    <h1><?= $total_personnel?></h1>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="liste_personnel.php">Personnel Total</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-2">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">
                                <div class="text-center">
                                    <h1>
                                        <?= $total_employes?>
                                    </h1>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="liste_personnel.php">Employés</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-2">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">
                                <div class="text-center">
                                    <h1><?= $total_stagiaire?></h1>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="liste_personnel.php">Stagiaires</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-2">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">
                                <div class="text-center">
                                    <h1><?= $total_postulants?></h1>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="liste_personnel.php">Postulants</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-3">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">
                                <div class="text-center">
                                    <h1><?= $total_conge?></h1>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">Congés en cours</a>
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

                <!--               Etat-->
                <label>
                    <i class="far fa-newspaper"></i>
                    Quelques états structurels
                </label>
                <div class="row">
                    <div class="col-xl-2 col-md-2">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">
                                <div class="text-center">
                                    <h1><?= $total_salles?></h1>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="liste_salle.php">Salles</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-2">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">
                                <div class="text-center">
                                    <h1>
                                        <?= $total_secteurs?>
                                    </h1>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="liste_secteur.php">Secteurs</a>
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

                <!--               Etat-->
                <label>
                    <i class="far fa-newspaper"></i>
                    Quelques états finanacières
                </label>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">
                                <div class="text-center">
                                    <h1><?= number_format($total_entree)?></h1>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="">Entreés dans le Sytème</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">
                                <div class="text-center">
                                    <h1>
                                        <?= number_format($total_sortie)?>
                                    </h1>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="">Sorties dans le Sytème</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">
                                <div class="text-center">
                                    <h1>
                                        <?= number_format($total_entree - $total_sortie)?>
                                    </h1>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="">Balance dans le Sytème</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">
                                <div class="text-center">
                                    <h1>
                                        <?= number_format($total_dette)?>
                                    </h1>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="">Dettes dans le Sytème</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <!--//Footer-->
<?php
include('foot.php');
?>