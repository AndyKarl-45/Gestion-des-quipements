<?php

include('first.php');
include('php/main_side_navbar.php');

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">États des trésoriers</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme <?=strtoupper($user);?>, il est <?=date("G:i");?> en ce jour du <?=dateToFrench("now","l j F Y");?>.
                    </li>
                </ol>
                <!--                Quelques états-->
                <?php



                $id_perso = "";
                $id_secteur = "";
                $secteur = "";
                $pseudo = "";

                $query = "SELECT * FROM users WHERE groupe_role = 3 ";
                $q = $db->query($query);
                while($row = $q->fetch())
                {
                    $id_perso = $row['id_perso'];
                    $id_secteur = $row['secteur'];
                    $pseudo = $row['pseudo'];

                    $query2 = "SELECT * FROM secteur WHERE id_secteur = $id_secteur ";
                    $q2 = $db->query($query2);
                    while($row2 = $q2->fetch())
                    {
                        $secteur = $row2['nom'];
                    }

                    $total_entree = 0;
                    $total_sortie = 0;
                    $balance = 0;
                    $entree = "";
                    $sortie = "";



                    $query1 = "SELECT * FROM operations_compta WHERE auteur = '$pseudo' ";

                    $q1 = $db->query($query1);
                    while($row1 = $q1->fetch()) {

                        $type_oc = "table-warning";

                        $id_oc = $row1['id_oc'];
                        $type_oc = $row1['type_oc'];
                        $montant = $row1['montant'];
                        if ($type_oc == "entree") {
                            $type_oc = "ENTRÉE";
                            $style = "table-primary";
                            $total_entree += $montant;
                            $entree = number_format($montant);
                        }
                        if ($type_oc == "sortie") {
                            $type_oc = "SORTIE";
                            $style = "table-warning";
                            $total_sortie += $montant;
                            $sortie = number_format($montant);
                        }
                    }

                ?>

                        <div class="row">
                            <div class="col-md-12">
                                <hr/>
                            </div>
                        </div>
                        <label>
                            <h3>
                                <?=strtoupper($pseudo)?> (<?=strtoupper($secteur)?>)
                            </h3>
                        </label>

                        <div class="row" id="etats">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <h1>ENTREES</h1>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="etats_tresor.php?pseudo=<?=$pseudo?>"><?=number_format($total_entree)?> Fcfa</a>
                                        <div class="small text-white"><i class="fas fa-angle-up"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <h1>
                                                SORTIES
                                            </h1>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="etats_tresor.php?pseudo=<?=$pseudo?>"><?=number_format($total_sortie)?> Fcfa</a>
                                        <div class="small text-white"><i class="fas fa-angle-up"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <h1>
                                                BALANCE
                                            </h1>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="etats_tresor.php?pseudo=<?=$pseudo?>"><?=number_format($total_entree - $total_sortie) ?> Fcfa</a>
                                        <div class="small text-white"><i class="fas fa-angle-up"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php

                }
                        ?>
            </div>
        </main>
    </div>

    <!--//Footer-->
<?php
include('foot.php');
?>