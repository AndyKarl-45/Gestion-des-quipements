<?php
include('navbar_links.php');

?>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                <!--     <div class="sb-sidenav-menu-heading">Acceuil</div> -->
                    <a class="nav-link" href="index.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Tableau de Bord
                    </a>

                    <?php
                    if($lvl == 4 || $lvl == 5){
                    ?>
                    <div class="sb-sidenav-menu-heading">RESSOURCE HUMAINE</div>

                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="bi bi-nut"></i></div>
                        DRH
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages1" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">

                            <a class="nav-link collapsed" href="<?=$personnel['option2_link']?>"    aria-expanded="false" aria-controls="pagesCollapseError">
                                <div class="sb-nav-link-icon"><i class="<?=$personnel['icon']?>"></i></div>
                                <?=$personnel['title']?>
                            </a>

                            <a class="nav-link collapsed" href="<?=$formation['option2_link']?>"    aria-expanded="false" aria-controls="pagesCollapseError">
                                <div class="sb-nav-link-icon"><i class="<?=$formation['icon']?>"></i></div>
                                <?=$formation['title']?>
                            </a>

                            <a class="nav-link collapsed" href="<?=$litige['option2_link']?>"    aria-expanded="false" aria-controls="pagesCollapseError">
                                <div class="sb-nav-link-icon"><i class="<?=$litige['icon']?>"></i></div>
                                <?=$litige['title']?>
                            </a>

                            <a class="nav-link collapsed" href="<?=$sanction['option2_link']?>"    aria-expanded="false" aria-controls="pagesCollapseError">
                                <div class="sb-nav-link-icon"><i class="<?=$sanction['icon']?>"></i></div>
                                <?=$sanction['title']?>
                            </a>

                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                <div class="sb-nav-link-icon"><i class="<?=$parrain['icon']?>"></i></div>
                                <?=$parrain['title']?>
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?=$parrain_ex['option2_link']?>"><div class="sb-nav-link-icon"><i class="<?=$parrain_ex['icon']?>"></i></div><?=$parrain_ex['title']?></a>
                                    <a class="nav-link" href="<?=$parrain_in['option2_link']?>"><div class="sb-nav-link-icon"><i class="<?=$parrain_in['icon']?>"></i></div><?=$parrain_in['title']?></a>
                                </nav>
                            </div>
                        </nav>
                    </div>
                    <?php
                    }
                    ?>
                    <?php
                    if($lvl != 4){
                    ?>
                    <!--                    Mon Espace-->
                     <div class="sb-sidenav-menu-heading">Mon Espace</div>

                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProjets" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="<?=$activite['icon']?>"></i></div>
                        <?=$activite['title']?>
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseProjets" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?=$activite['option1_link']?>"><?=$activite['option1_name']?></a>
                            <?php
                            if($lvl == 2){
                            ?>
                            <a class="nav-link" href="<?=$activite['option0_link']?>"><?=$activite['option0_name']?></a>
                            <?php
                            }
                            ?>
                            <a class="nav-link" href="<?=$activite['option2_link']?>"><?=$activite['option2_name']?></a>
                            <a class="nav-link" href="<?=$activite['option3_link']?>"><?=$activite['option3_name']?></a>
                        </nav>
                    </div>
                    <!--                    ! Mon Espace-->
                    <?php
                    }
                    ?>

                    <?php
                    if($lvl == 3 || $lvl == 4 || $lvl == 6){
                    ?>
                     <div class="sb-sidenav-menu-heading">FINANCES</div>

                    <!--                    Ma comptabilité-->
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCompta" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="<?=$comptabilite['icon']?>"></i></div>
                        <?=$comptabilite['title']?>
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseCompta" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?=$comptabilite['option1_link']?>"><?=$comptabilite['option1_name']?></a>
                            <?php
                            if($lvl == 4 || $lvl == 6){
                                ?>
                            <a class="nav-link" href="<?=$comptabilite['option2_link']?>"><?=$comptabilite['option2_name']?></a>
                            <?php
                            }
                            ?>
                            <a class="nav-link" href="<?=$comptabilite['option4_link']?>"><?=$comptabilite['option4_name']?></a>
                            <?php
                            if($lvl == 4){
                            ?>
                            <a class="nav-link" href="<?=$comptabilite['option3_link']?>"><?=$comptabilite['option3_name']?></a>
                            <?php
                            }
                            ?>
                        </nav>
                    </div>
                    <?php
                    }
                    ?>
                    <?php
                    if($lvl == 4 || $lvl == 5){
                    ?>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="bi bi-wallet2"></i></div>
                        Salaire
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?=$conger['option1_link']?>"><?=$conger['option1_name']?></a>
                            <a class="nav-link" href="<?=$conger['option2_link']?>"><?=$conger['option2_name']?></a>
                            <a class="nav-link" href="<?=$credit['option1_link']?>"><?=$credit['option1_name']?></a>
                            <a class="nav-link" href="<?=$credit['option2_link']?>"><?=$credit['option2_name']?></a>
                            <a class="nav-link" href="<?=$credit['option3_link']?>"><?=$credit['option3_name']?></a>
                        </nav>
                    </div>
                    <?php
                    }
                    ?>
                   <!--  <div class="sb-sidenav-menu-heading"></div> -->
<!--                    Param-->


                    <?php
                    if($lvl != 1 && $lvl != 3){
                    ?>
                     <div class="sb-sidenav-menu-heading">PARAMETRES</div>
                    <!--                    Config-->
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
                        Configuration
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">

                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link" href="<?=$utilisateur['option1_link']?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                <?=$utilisateur['title']?>
                            </a>
                        </nav>

                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError1" aria-expanded="false" aria-controls="pagesCollapseError">
                                <div class="sb-nav-link-icon"><i class="<?=$liste['icon']?>"></i></div>
                                <?=$liste['title']?>
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseError1" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a  href="<?=$liste['option1_link']?>" class="nav-link" ></i><?=$liste['option1_name']?></a>
                                    <a  href="<?=$region['option2_link']?>" class="nav-link" ></i><?=$region['title']?></a>
                                    <a  href="<?=$ville['option2_link']?>" class="nav-link" ></i><?=$ville['title']?></a>
                                    <a class="nav-link collapsed" href="<?=$secteur['option2_link']?>"    aria-expanded="false" aria-controls="pagesCollapseError">
                                        <div class="sb-nav-link-icon"><i class="<?=$secteur['icon']?>"></i></div>
                                        <?=$secteur['title']?>
                                    </a>
                                    <a  href="<?=$quartier['option2_link']?>" class="nav-link" ></i><?=$quartier['title']?></a>
                                    <a class="nav-link collapsed" href="<?=$salle['option2_link']?>"    aria-expanded="false" aria-controls="pagesCollapseError">
                                        <div class="sb-nav-link-icon"><i class="<?=$salle['icon']?>"></i></div>
                                        <?=$salle['title']?>
                                    </a>

                                    <a  href="<?=$liste['option2_link']?>" class="nav-link" ></i><?=$liste['option2_name']?></a>
                                    <a  href="<?=$liste['option3_link']?>" class="nav-link" ></i><?=$liste['option3_name']?></a>
                                    <a  href="<?=$liste['option4_link']?>" class="nav-link" ></i><?=$liste['option4_name']?></a>
                                    <a  href="<?=$liste['option6_link']?>" class="nav-link" ></i><?=$liste['option6_name']?></a>


<!--                                    <a  href="--><?//=$liste['option7_link']?><!--" class="nav-link" ></i>--><?//=$liste['option7_name']?><!--</a>-->
                                </nav>
                            </div>
                        </nav>

                        <?php
                        if($lvl == 4){
                        ?>
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link" href="<?=$liste['option7_link']?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                                <?=$liste['option7_name']?>
                            </a>
                        </nav>
                        <?php
                        }
                        ?>
                    </div>
                    <?php
                    }
                    ?>

                </div>
            </div>


            <div class="sb-sidenav-footer">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-center">- Copyright &copy; 2020 - SYGES </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
