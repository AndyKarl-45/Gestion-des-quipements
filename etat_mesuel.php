<?php
include('first.php');
include('php/main_side_navbar.php');

//if(isset($_GET['id_perso']) != ""){
//    $id_perso = $_GET['id_perso'];
//}
$prime = 0;
$horaire_mensuel = 0;
$sal_horaire = 0;
$month = date("Y-m");
$today = date("Y-m-d");
$sanction = 0;
$dette = 0;
$salaire = 0;

$query = "SELECT * FROM personnel WHERE id_personnel = $id_perso";
$q = $db->query($query);
while($row = $q->fetch()) {
    $prime = 0;
    $sal_horaire = 0;

    $id_perso = $row['id_personnel'];
    $personnel = $row['nom'] . ' ' . $row['prenom'];
    $prime = $row['prime'];
    $sal_horaire = $row['sal_horaire'];
}

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">État Salarial Mensuel</h1>
                <a href="etat_pointages.php" class="btn btn-primary"> RETOUR</a>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme <?=$nom_user?>, il est <?=date("G:i");?> en ce jour du <?=dateToFrench("now","l j F Y");?>.
                    </li>
                </ol>
                <!--                Main Body-->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-scroll"></i>
                                <b>Relevé Mensuel</b>
                            </div>
                            <div class="card-body">
                                <div class="well bs-component">
                                    <form class="form-horizontal">
                                        <fieldset>
                                            <div class="table-responsive">
                                                <form method="post" action="" >
                                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                        <thead>
                                                        <tr class="bg-primary">
                                                            <th><p align="center">PERSONNE</p></th>
                                                            <th><p align="center">MOIS</p></th>
                                                            <th><p align="center">TOTAL HORAIRE</p></th>
                                                            <th><p align="center">TAUX HORAIRE</p></th>
                                                            <th><p align="center">SANCTIONS</p></th>
                                                            <th><p align="center">DETTES</p></th>
                                                            <th><p align="center">PRIMES</p></th>
                                                            <th><p align="center">SALAIRE</p></th>
                                                        </tr>
                                                        </thead>
                                                        <tfoot>
                                                        <tr class="bg-primary">
                                                            <th><p align="center">PERSONNE</p></th>
                                                            <th><p align="center">MOIS</p></th>
                                                            <th><p align="center">TOTAL HORAIRE</p></th>
                                                            <th><p align="center">TAUX HORAIRE</p></th>
                                                            <th><p align="center">SANCTIONS</p></th>
                                                            <th><p align="center">DETTES</p></th>
                                                            <th><p align="center">PRIMES</p></th>
                                                            <th><p align="center">SALAIRE</p></th>
                                                        </tr>
                                                        </tfoot>
                                                        <tbody>
                                                        <?php

                                                        $personnel = "";
                                                            $total_dette = 0;
                                                            $query3 = "SELECT montant from credit WHERE nom = $id_perso AND modalite <> statut ";
                                                            $q3 = $db->query($query3);
                                                            while($row3 = $q3->fetch())
                                                            {
                                                                $total_dette += $row3["montant"];
                                                            }

                                                            $echelle = 0;
                                                            $dette = 0;
                                                            $statut = 0;
                                                            $cpt_personnel = 0;


                                                            $style = "";
                                                            $horaire_mensuel = 0;
                                                            $query1 = "SELECT * FROM etat_salarial_mensuel WHERE id_personnel <> 20";
                                                            $q1 = $db->query($query1);
                                                            while($row1 = $q1->fetch())
                                                            {
                                                                $personnel = "";

                                                                $id_personnel = $row1['id_personnel'];



                                                                $queryx = "SELECT * FROM personnel WHERE id_personnel = $id_personnel";
                                                                $qx = $db->query($queryx);
                                                                while($rowx = $qx->fetch())
                                                                {
                                                                    $personnel = $rowx['nom'].' '.$rowx['prenom'];
                                                                }


                                                                $month = $row1['month'];
                                                                $horaire_mensuel = $row1['total_heure'];
                                                                $taux_horaire = $row1['taux_horaire'];
                                                                $dette_total = $row1['dette_total'];
                                                                $prime = $row1['prime'];
                                                                $sanction = $row1['sanction'];
                                                                $salaire = $row1['salaire'];

                                                            ?>

                                                            <tr>
                                                                <td align="center"><a class="text-primary" href="etat_mensuel_uni.php?id_perso=<?=$id_personnel?>"><?=$personnel?></a></td>
                                                                <td align="center"><?=dateToFrench("$month","F Y")?></td>
                                                                <td align="center"><?=$horaire_mensuel?></td>
                                                                <td align="center"><?=number_format($sal_horaire)?></td>
                                                                <td align="center"><?=number_format($sanction)?></td>
                                                                <td align="center"><?=number_format($dette_total)?></td>
                                                                <td align="center"><?=number_format($prime)?></td>
                                                                <td align="center"><?=number_format($salaire)?></td>
                                                            </tr>
                                                            <?php
                                                                $personnel = "";
                                                            }
                                                        ?>

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
    <!--//Footer-->
<?php
include('foot.php');
?>