<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

// $query  = "SELECT id_personnel as total from personnel";
// $q = $conn->query($query);
// while($row = $q->fetch_assoc())
// {
//     $total = $row["total"];
// }
// $id_personnel = $total;

?>
<?php
//$ido=$_REQUEST['id'];
//$query  = "SELECT count(id_personnel) as total from personnel where salle=\"SALLE MIMBOMAN\"";
//$q = $conn->query($query);
//while($row = $q->fetch_assoc())
//{
//    $total = $row["total"];
//}
//$totat_personnel = $total;

?>


<!--Content-->

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Gestions de versements/ retraits  </h1>
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
                                 <ul class="nav nav-pills" style="float: right;">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="<?=$demande_eq['option2_link']?>">
                                            Retour
                                        </a>
                                    </li>                              
                                </ul>
                                <!-- Nav pills -->
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#home">
                                            <i class="fas fa-cubes"></i>
                                            Dépôts
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#menu2">
                                            <i class="fas fa-cubes"></i>
                                            Virements

                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#menu3">
                                            <i class="fas fa-cubes"></i>
                                            Retraits

                                        </a>
                                    </li>

                                </ul>
                            </b>
                        </div>

                        <div class="card-body">
                            <!-- Tab panes -->
                            <div class="tab-content">
<!--********************************************ETAT CIVILE************************************************* -->
                                <!-- Etat Civile-->
                                <div class="tab-pane container active" id="home">
                                    <!-- infos civile-->

                                    <!-- <h5><b><u>NB:</u></b> Aucune information ne peut être modifier.</h5> -->

                                    <div class="row">
                                        <hr/>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="card mb-4">
                                                <form class="form-horizontal" action="#" method="POST">
                                                    <div class="card-header">
                                                       <!--  <i class="fas fa-scroll"></i>
                                <b>L'ensemble des salles de campresj.</b>
                                                             -->

                                                    </div>
                                                    <div class="card-body">
                                                        <fieldset>
                                                            <div class="table-responsive">
                                                                <table class="table  table-hover table-condensed" id="myTable">
                                                                    <tbody>
                                                            <tr> 
                                                                        <td style="width: 50%">
                                                                        <span class="help-block small-font" >Numéeo de compte:</span>
                                                            <div class="col">
                                                               <div class="col">
                                                                                <input style="width:75%; border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                " name="compte"  >
                                                                            </div>
                                                                    </div>
                                                                         </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >MONTANT:</span>
                                                                            <div class="col">
                                                                                 <div class="col">
                                                                                <input type="number" style="width:75%; border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                " name="code"  >FCFA
                                                                            </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                </tbody>
                                            </table>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="card-footer">
                                                         <center> <!-- <button type="submit" style=" width:150px;"   class="btn btn-primary" >Enregistrer</button> -->
                                                            <a class="btn btn-primary" type="button" data-toggle="modal" 
                                                            style=" width:150px;" data-target="#verifier_versement" title="supprimer">
                                                                Enregistrer
                                                        </a>
                                    
                                                        <a href="liste_demande_in.php" style=" width:150px;" class="btn btn-primary" ><font>Annuler</font></a>
                                                        </center>
                                                        
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

<!--********************************************INFO RH************************************************* -->



                                <div class="tab-pane container" id="menu2">
                                    <!-- infos civile-->

                                    <!--  <h5><b><u>NB:</u></b> Veillez saisir vos informations concernant le traitement de ressource humaine</h5> -->




                                    <div class="row">
                                        <hr/>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="card mb-4">
                                                <form class="form-horizontal" action="#" method="POST">
                                                    <div class="card-header">
                                                       <!--  <i class="fas fa-scroll"></i>
                                <b>L'ensemble des salles de campresj.</b>
                                                             -->

                                                    </div>
                                                    <div class="card-body">
                                                        <fieldset>
                                                            <div class="table-responsive">
                                                                <table class="table  table-hover table-condensed" id="myTable">
                                                                    <tbody>
                                                            <tr> 
                                                                        <td style="width: 50%">
                                                                        <span class="help-block small-font" >Numéeo de compte:</span>
                                                            <div class="col">
                                                               <div class="col">
                                                                                <input style="width:75%; border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                " name="compte"  >
                                                                            </div>
                                                                    </div>
                                                                         </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >MONTANTS:</span>
                                                                            <div class="col">
                                                                                 <div class="col">
                                                                                <input type="number" style="width:75%; border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                " name="code"  >FCFA
                                                                            </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                </tbody>
                                            </table>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="card-footer">
                                                         <center> <!-- <button type="submit" style=" width:150px;"   class="btn btn-primary" data-toggle="modal" data-target="#verifier_versement">Enregistrer</button> -->
                                                            <a class="btn btn-primary" type="button" data-toggle="modal" 
                                                            style=" width:150px;" data-target="#verifier_versement" title="supprimer">
                                                                Enregistrer
                                                        </a>

                                                      
                                    
                                                        <a href="liste_demande_in.php" style=" width:150px;" class="btn btn-primary" ><font>Annuler</font></a>
                                                        </center>
                                                        
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--****************************************** ............************************************************ -->


 <div class="tab-pane container" id="menu3">
                                    <!-- infos civile-->

                                    <!--  <h5><b><u>NB:</u></b> Veillez saisir vos informations concernant le traitement de ressource humaine</h5> -->




                                    <div class="row">
                                        <hr/>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="card mb-4">
                                                <form class="form-horizontal" action="#" method="POST">
                                                    <div class="card-header">
                                                       <!--  <i class="fas fa-scroll"></i>
                                <b>L'ensemble des salles de campresj.</b>
                                                             -->

                                                    </div>
                                                    <div class="card-body">
                                                        <fieldset>
                                                            <div class="table-responsive">
                                                                <table class="table  table-hover table-condensed" id="myTable">
                                                                    <tbody>
                                                            <tr> 
                                                                        <td style="width: 50%">
                                                                        <span class="help-block small-font" >Nom:</span>
                                                            <div class="col">
                                                               <div class="col">
                                                                                <input style="width:75%; border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                " name="nom"  >
                                                                            </div>
                                                                    </div>
                                                                         </td>
                                                                         <td style="width: 50%">
                                                                        <span class="help-block small-font" >Prenom:</span>
                                                            <div class="col">
                                                               <div class="col">
                                                                                <input style="width:75%; border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                " name="prenom"  >
                                                                            </div>
                                                                    </div>
                                                                         </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width: 50%">
                                                                        <span class="help-block small-font" >Numéeo de compte:</span>
                                                            <div class="col">
                                                               <div class="col">
                                                                                <input style="width:75%; border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                " name="compte"  >
                                                                            </div>
                                                                    </div>
                                                                         </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >MONTANTS:</span>
                                                                            <div class="col">
                                                                                 <div class="col">
                                                                                <input type="number" style="width:75%; border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                " name="code"  >FCFA
                                                                            </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                </tbody>
                                            </table>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="card-footer">
                                                         <center> <!-- <button type="submit" style=" width:150px;"   class="btn btn-primary" data-toggle="modal" data-target="#verifier_versement">Enregistrer</button> -->
                                                            <a class="btn btn-primary" type="button" data-toggle="modal" 
                                                            style=" width:150px;" data-target="#verifier_versement" title="supprimer">
                                                                Enregistrer
                                                        </a>

                                                      
                                    
                                                        <a href="liste_demande_in.php" style=" width:150px;" class="btn btn-primary" ><font>Annuler</font></a>
                                                        </center>
                                                        
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                
<!--****************************************** ............************************************************ -->

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
                        include("verifier_versement.php");
                            ?>



    <!--//Footer-->
<?php
include('foot.php');
?>