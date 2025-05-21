<?php
include('first.php');
include('php/main_side_navbar.php');

$last_pay_day = date("Y",strtotime($monthPay)).'-'.(date("m",strtotime($monthPay))-1).'-'.($payDay);
$next_pay_day = (date("Y",strtotime($monthPay))).'-'.date("m",strtotime($monthPay)).'-'.($payDay);
?>

<!--Content-->

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Liste des états de Pointages en cours</h1>
            <a class="btn btn-primary" href="etat_mesuel.php" target="_blank">états mensuels</a>
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
                                <b>Historique des pointages</b>
                                <i>(Jour de paie dernier : <?= dateToFrench("$last_pay_day","l j F Y")?>
                                    //
                                Prochain jour de paie : <?= dateToFrench("$next_pay_day","l j F Y")?>)</i>
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
                                                            <th><p align="center">NOM</p></th>
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
                                                                <th><p align="center">NOM</p></th>
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


                                                        $last_pay_day_1 = date("Y",strtotime($monthPay)).'-'.(date("m",strtotime($monthPay))-1).'-'.($payDay-1);
                                                        $prime = 0;
                                                        $horaire_mensuel = 0;
                                                        $sal_horaire = 0;
                                                        $month = date("Y-m");
                                                        $today = date("Y-m-d");
                                                        $sanction = 0;
                                                        $dette = 0;
                                                        $salaire = 0;

                                                        $query = "SELECT * FROM personnel";
                                                        $q = $db->query($query);
                                                        while($row = $q->fetch())
                                                        {
                                                            $prime = 0;
                                                            $sal_horaire = 0;

                                                            $id_perso = $row['id_personnel'];
                                                            $personnel = $row['nom'].' '.$row['prenom'];
                                                            $prime = $row['prime'];
                                                            $sal_horaire = $row['sal_horaire'];

                                                            $horaire_mensuel = 0;
                                                            $query1 = "SELECT * FROM pointage WHERE id_perso = $id_perso AND date_emission > '$last_pay_day'";
                                                            $q1 = $db->query($query1);
                                                            while($row1 = $q1->fetch())
                                                            {
                                                                $horaire_mensuel += $row1['duree_journee'];
                                                            }

                                                            $echelle = 0;
                                                            $dette = 0;
                                                            $statut = 0;
                                                            $query3 = "SELECT * FROM credit WHERE nom = $id_perso AND modalite <> credit.statut";
                                                            $q3 = $db->query($query3);
                                                            while($row3 = $q3->fetch())
                                                            {
                                                                $dette += $row3['montant'];
                                                                $echelle = $row3['modalite'];
                                                                $statut = $row3['statut'];
                                                            }

                                                            $sanction = 0;
                                                            $query2 = "SELECT * FROM sanction WHERE id_personnel = $id_perso AND date_sanction LIKE '%$month%'";
                                                            $q2 = $db->query($query2);
                                                            while($row2 = $q2->fetch())
                                                            {
                                                                $sanction += $row2['montant'];
                                                            }

                                                            $dettes = 0;
                                                            if($echelle != "" && $echelle != 0)
                                                                $dettes = $dette/$echelle;
                                                            else
                                                                $dettes = $dette;

                                                            $salaire = $prime + ($sal_horaire * $horaire_mensuel ) - $sanction - $dettes;

//                                                            echo 'personnel :'.$personnel.' > '.gettype($personnel).'<br/>';
//
//                                                            echo 'prime :'.$prime.' > '.gettype($prime).'<br/>';
//                                                            echo 'sal_horaire :'.$sal_horaire.' > '.gettype($sal_horaire).'<br/>';
//                                                            echo 'Horaire mensuel :'.$horaire_mensuel.' > '.gettype($horaire_mensuel).'<br/>';
//                                                            echo 'sanction :'.$sanction.' > '.gettype($sanction).'<br/>';
//
//                                                            echo 'salaire :'.number_format($salaire).'<br/>';
//
//                                                            echo '********************** <br/>';


                                                                ?>

                                                                <tr>
                                                                    <td align="center"><?=$personnel?></td>
                                                                    <td align="center" class=""><?=dateToFrench("$month","F Y")?></td>
                                                                    <td align="center"><?=$horaire_mensuel?></td>
                                                                    <td align="center"><?=number_format($sal_horaire)?></td>
                                                                    <td align="center"><?=number_format($sanction)?></td>
                                                                    <td align="center"><?=number_format($dettes)?><br/>(sur <?=$statut.'/'.$echelle?> mois)</td>
                                                                    <td align="center"><?=number_format($prime)?></td>
                                                                    <td align="center"><?=number_format($salaire)?></td>
                                                                </tr>
                                                                <?php

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