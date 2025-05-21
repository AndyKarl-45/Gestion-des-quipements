 <?php

include('first.php');
include('php/main_side_navbar.php');

?>

<!--Content-->

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Liste des Permissions</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">
                    Hello M/Mme XXX, il est <?=date("G:i");?> en ce jour du <?=dateToFrench("now","l j F Y");?>.
                </li>
            </ol>
            <!--                Main Body-->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <b>
                                <!-- Nav pills -->
                                <ul class="nav nav-pills">

                                </ul>
                            </b>
                        </div>

                        <div class="card-body">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!-- Etat Civile-->
                                <div class="tab-pane container active" id="home">
                                    <!-- infos civile-->


        <fieldset>
        <p align="center"><big><b>Détails des permissons : </b></big></p>            

                <div class="table-responsive">
                    <form method="post" action="" >
                    <table class="table table-bordered table-hover table-condensed" id="myTables">

                        <thead>
                            <tr class="info">
                                <th><p align="center">Nom du Personnel</p></th>
                                <!-- <th><p align="center">prenom</p></th> -->
                                <th><p align="center">Nature</p></th>
                                <th><p align="center">Secteur</p></th>
                                <th><p align="center">Poste</p></th>
                                <th><p align="center">Motif</p></th>
                                <th><p align="center">Date mis en congé</p></th>
                                 <th><p align="center">Date retour en congé</p></th>
                            </tr>
                        </thead>
                  <tbody>
                          



                                 
                   </tbody>

                            <tr class="info">
                                <th><p align="center">Nom du Personnel</p></th>
                                <!-- <th><p align="center">prenom</p></th> -->
                                <th><p align="center">Nature</p></th>
                                <th><p align="center">Secteur</p></th>
                                <th><p align="center">Poste</p></th>
                                <th><p align="center">Motif</p></th>
                                <th><p align="center">Date mis en congé</p></th>
                                 <th><p align="center">Date retour en congé</p></th>
                            </tr>
                        </table>
                    </form>
                </div>
                    
        </fieldset>
                                   
                                                                                        
                                                      <!-- <center> <button type="submit" style=" width:150px;"  name="submit_secteur" class="btn btn-primary" >Enregistrer</button>
                                    
                                                        <a href="liste_secteur.php" style=" width:150px;" class="btn btn-primary" ><font>Annuler</font></a>
                                                        </center> -->
                                                          
                                </div>

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