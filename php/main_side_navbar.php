<?php
include('navbar_links.php');

?>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <!--     <div class="sb-sidenav-menu-heading">Acceuil</div> -->
                    <a class="nav-link " href="index.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Tableau de Bord
                    </a>



                    <!--***************Materiaux***********************-->
                    <?php
                    if($lvl == 5 || $lvl == 4 || $lvl == 6){
                        ?>
                        <a class="nav-link collapsed" href="<?=$fournisseur['option2_link']?>"    aria-expanded="false" aria-controls="pagesCollapseError">
                            <div class="sb-nav-link-icon"><i class="<?=$fournisseur['icon']?>"></i></div>
                            <?=$fournisseur['title']?>
                        </a>
                        <?php
                    }
                    if($lvl == 2 || $lvl == 3 || $lvl == 5 || $lvl == 7 || $lvl == 8 || $lvl == 4 || $lvl == 0 || $lvl == 6){
                        
                        if ($lvl != 4) {
                        ?>
                        <a class="nav-link collapsed" href="<?=$intervention['option2_link']?>" aria-expanded="false" aria-controls="pagesCollapseError">
                            <div class="sb-nav-link-icon"><i class="<?=$intervention['icon']?>"></i></div>
                            <?=$intervention['title']?>
                        </a>
                        <a class="nav-link collapsed" href="<?=$demande_in['option2_link']?>"
                           aria-expanded="false" aria-controls="pagesCollapseError">
                            <div class="sb-nav-link-icon"><i class="<?=$demande_in['icon']?>"></i></div>
                            <?=$demande_in['title']?>
                        </a>
                        <?php
                        }
                        if ($lvl != 7 && $lvl != 2) {
                            ?>
                        <a class="nav-link collapsed" href="<?=$demande_eq['option2_link']?>"
                           aria-expanded="false" aria-controls="pagesCollapseError">
                            <div class="sb-nav-link-icon"><i class="<?=$demande_eq['icon']?>"></i></div>
                            <?=$demande_eq['title']?>
                        </a>
                        <?php
                        }
                        if ($lvl != 3 && $lvl != 7 && $lvl != 8 && $lvl != 4 && $lvl != 2 ) {
                            ?>
                        <!--<a class="nav-link collapsed" href="<?=$magasin_main['option2_link']?>"-->
                        <!--   aria-expanded="false" aria-controls="pagesCollapseError">-->
                        <!--    <div class="sb-nav-link-icon"><i class="<?=$magasin_main['icon']?>"></i></div>-->
                        <!--    <?=$magasin_main['title']?>-->
                        <!--</a>-->
                        <a class="nav-link collapsed" href="<?=$magasin_def['option2_link']?>"
                           aria-expanded="false" aria-controls="pagesCollapseError">
                            <div class="sb-nav-link-icon"><i class="<?=$magasin_def['icon']?>"></i></div>
                            <?=$magasin_def['title']?>
                        </a>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAgenda1" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="<?=$magasin_main['icon']?>"></i></div>
                            <?=$magasin_main['title']?>
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseAgenda1" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?=$magasin_main['option1_link']?>"><?=$magasin_main['option1_name']?></a>
                                 <a class="nav-link" href="<?=$magasin_main['option2_link']?>"><?=$magasin_main['option2_name']?></a>
                                  <a class="nav-link" href="<?=$magasin_main['option3_link']?>"><?=$magasin_main['option3_name']?></a>
                                   <a class="nav-link" href="<?=$magasin_main['option4_link']?>"><?=$magasin_main['option4_name']?></a>
                            </nav>
                        </div>
                        
                        

                        <?php
                        }
                    }
                    if($lvl == 5 || $lvl == 4 || $lvl == 6){
                        ?>
                        <!--<a class="nav-link collapsed" href="<?=$materiaux['option2_link']?>" aria-expanded="false" aria-controls="pagesCollapseError">-->
                        <!--    <div class="sb-nav-link-icon"><i class="<?=$materiaux['icon']?>"></i></div>-->
                        <!--    <?=$materiaux['title']?>-->
                        <!--</a>-->

                         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages7" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="<?=$magasin['icon']?>"></i></div>
                            <?=$magasin['title']?>
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages7" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError1" aria-expanded="false" aria-controls="pagesCollapseError">
                                    <div class="sb-nav-link-icon"><i class="<?=$magasin_centrale['icon']?>"></i></div>
                                    <?=$magasin_centrale['title']?>
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseError1" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">

                                        <a  href="<?=$magasin_centrale['option1_link']?>" class="nav-link" ><?=$magasin_centrale['option1_name']?></a>
                                    
                                        <a  href="<?=$magasin_centrale['option2_link']?>" class="nav-link" ><?=$magasin_centrale['option2_name']?></a>
                                        <a  href="<?=$magasin_centrale['option3_link']?>" class="nav-link" ><?=$magasin_centrale['option3_name']?></a>
                                        <a  href="<?=$magasin_centrale['option4_link']?>" class="nav-link" ><?=$magasin_centrale['option4_name']?></a>
                                    

                                    </nav>
                                </div>
                            </nav>

                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError2" aria-expanded="false" aria-controls="pagesCollapseError">
                                    <div class="sb-nav-link-icon"><i class="<?=$magasin_save['icon']?>"></i></div>
                                    <?=$magasin_save['title']?>
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseError2" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">

                                        <a  href="<?=$magasin_save['option1_link']?>" class="nav-link" ><?=$magasin_save['option1_name']?></a>
                                       
                                        <a  href="<?=$magasin_save['option2_link']?>" class="nav-link" ><?=$magasin_save['option2_name']?></a>
                                        <a  href="<?=$magasin_save['option3_link']?>" class="nav-link" ><?=$magasin_save['option3_name']?></a>
                                        <a  href="<?=$magasin_save['option4_link']?>" class="nav-link" ><?=$magasin_save['option4_name']?></a>
                                   

                                    </nav>
                                </div>
                            </nav>

                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError3" aria-expanded="false" aria-controls="pagesCollapseError">
                                    <div class="sb-nav-link-icon"><i class="<?=$magasin_congo['icon']?>"></i></div>
                                    <?=$magasin_congo['title']?>
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseError3" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">

                                         <a  href="<?=$magasin_congo['option1_link']?>" class="nav-link" ><?=$magasin_congo['option1_name']?></a>
                                  
                                        <a  href="<?=$magasin_congo['option2_link']?>" class="nav-link" ><?=$magasin_congo['option2_name']?></a>
                                        <a  href="<?=$magasin_congo['option3_link']?>" class="nav-link" ><?=$magasin_congo['option3_name']?></a>
                                        <a  href="<?=$magasin_congo['option4_link']?>" class="nav-link" ><?=$magasin_congo['option4_name']?></a>
                                  


                                    </nav>
                                </div>
                            </nav>


                        </div> 

                        <?php
                    }
                    if($lvl == 5 || $lvl == 3 || $lvl == 7 || $lvl == 8  || $lvl == 0 ||  $lvl == 6){
                        ?>
                        <a class="nav-link collapsed" href="<?=$salle['option2_link']?>"
                           aria-expanded="false" aria-controls="pagesCollapseError">
                            <div class="sb-nav-link-icon"><i class="<?=$salle['icon']?>"></i></div>
                            <?=$salle['title']?>
                        </a>
                        <?php
                    }
                    if($lvl == 5 || $lvl == 3 || $lvl == 7 || $lvl == 8 || $lvl == 0 || $lvl == 6){
                        ?>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAgenda" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="<?=$agenda['icon']?>"></i></div>
                            <?=$agenda['title']?>
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseAgenda" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?=$agenda['link']?>"><?=$agenda['name']?></a>
                            </nav>
                        </div>
                        <?php
                    }
                    ?>



                    <!--**************************Config***************************-->
                    <?php
                    if($lvl == 5 || $lvl == 6){
                        ?>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages3" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="<?=$conf['icon']?>"></i></div>
                            <?=$conf['title']?>
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages3" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
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

                                        <a  href="<?=$liste['option6_link']?>" class="nav-link" ></i><?=$liste['option6_name']?></a>
                                        <a  href="<?=$liste['option10_link']?>" class="nav-link" ></i><?=$liste['option10_name']?></a>
                                        <a  href="<?=$region['option2_link']?>" class="nav-link" ></i><?=$region['title']?></a>
                                        <a  href="<?=$liste['option11_link']?>" class="nav-link" ></i><?=$liste['option11_name']?></a>
                                        <a class="nav-link collapsed" href="<?=$secteur['option2_link']?>"
                                           aria-expanded="false" aria-controls="pagesCollapseError"> <?=$secteur['title']?>
                                        </a>
                                        <a  href="<?=$quartier['option2_link']?>" class="nav-link" ></i><?=$quartier['title']?></a>


                                    </nav>
                                </div>
                            </nav>
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
