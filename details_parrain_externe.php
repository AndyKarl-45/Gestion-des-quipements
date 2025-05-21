<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');
?>

<?php
$id=$_REQUEST['id'];

$query  = "SELECT * from parrain_externe where id_parrain_ex='".$id."'";
$q = $db->query($query);
while($row = $q->fetch())
{ 
    /*-------------------- ETAT CIVILE --------------------*/
   
    $nom = $row['nom'];
    $prenom = $row['prenom'];
    $id_card_number = $row['id_card_number'];
    $id_card_validity = $row['id_card_validity'];
    $tel=$row['tel'];
    $email=$row['email'];
    $proprietaire_local=$row['proprietaire_local'];
    $tel_proprietaire=$row['tel_proprietaire'];
    $date_naissance=$row['date_naissance'];
    $lieu_naissance=$row['lieu_naissance'];
    $profession=$row['profession'];
    $situation_matrimoniale=$row['situation_matrimoniale'];
    $nombre_enfants=$row['nombre_enfants'];
    $genre=$row['genre'];
    $pays=$row['pays'];
    $ville=$row['ville'];
    $quartier=$row['quartier'];

?>

<!--Content-->

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">NOM DE L'EMPLOYE: <?=$nom.' '.$prenom?></h1>
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
                                        <a class="nav-link active"  href="<?=$parrain_ex['option2_link']?>">
                                            
                                            Retour<!-- <?=$id_personnel?> -->
                                        </a>
                                    </li>
                                  </ul>
                                <!-- Nav pills -->
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#home">
                                            <i class="fas fa-cubes"></i>
                                            Etat Civile<!-- <?=$id_personnel?> -->
                                        </a>
                                    </li>
<!--                                     <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#menu1">
                                            <i class="fas fa-university"></i>
                                            Etat Academique
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#menu2">
                                            <i class="fas fa-envelope"></i>
                                            Etat Professionnel
                                        </a>
                                    </li> -->
                                    <!-- <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#menu3">
                                            <i class="fas fa-user"></i>
                                            Information RH
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#menu4">
                                            <i class="fas fa-plus"></i>
                                            Primes
                                        </a>
                                    </li>     -->                                
                                </ul>
                            </b>
                        </div>

                        <div class="card-body">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!-- Etat Civile-->
                                <div class="tab-pane container active" id="home">
                                    <!-- infos civile-->

                                    <h5><b><u>NB:</u></b>Informations d'état civil comme sur vos pièces d'identité</h5>

                                    <div class="row">
                                        <hr/>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="card mb-4">
                                                <form class="form-horizontal" action="update_parrain_externe.php" method="POST">
                                                    <div class="card-header">

                                                    </div>
                                                    <div class="card-body">
                                                        <fieldset>
                                                            <div class="table-responsive">
                                                                <table class="table  table-hover table-condensed" id="myTable">
                                                                    <tbody>

                                                                    <tr>

                                                                        <td>
                                                    <input type="hidden" name="id_garant_ex" value="<?=$id?>">

                                                                            <span class="help-block small-font" >NOM</span>
                                                                            <div class="col">
                                                                                <input style="width:75%;border-top: 0; 
                                                                                border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"  name="nom"  value="<?=$nom?>" readonly >
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >PRENOM</span>
                                                                            <div class="col">
                                                                                <input style="width:75%;border-top: 0; 
                                                                                border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="prenom" value="<?=$prenom?>" readonly>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <span class="help-block small-font" >N° CNI ou PASSPORT</span>
                                                                            <div class="col">
                                                                                <input style="width:75%;
                                                                                border-top: 0;
                                                                                 border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="id_card_number" value="<?=$id_card_number?>" readonly>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >DATE D'EXPIRATION CNI</span>
                                                                            <div class="col">
                                                                                <input type="date" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="id_card_validity" value="<?=$id_card_validity?>" readonly>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <span class="help-block small-font" >TEL</span>
                                                                            <div class="col">
                                                                                <input style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="tel" value="<?=$tel?>" readonly>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >EMAIL</span>
                                                                            <div class="col">
                                                                                <input style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" type="email" value="<?=$email?>" name="email">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <span class="help-block small-font" >DATE DE NAISSANCE</span>
                                                                            <div class="col">
                                                                                <input type="date" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="date_naissance" value="<?=$date_naissance?>" readonly>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >LIEU DE NAISSANCE</span>
                                                                            <div class="col">
                                                                                <input style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="lieu_naissance" value="<?=$lieu_naissance?>" readonly>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <span class="help-block small-font" >PROFESSION</span>
                                                                            <div class="col">
                                                                        <input style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="profession" value="<?=$profession?>" readonly>
                                                                                
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >SITUATION MATRIMONIALE</span>
                                                                            
                                                                            <div class="col">
                                                                                <select name="situation_matrimoniale" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" readonly>
                                                                                    <option value="<?=$situation_matrimoniale?>" selected=""><?=$situation_matrimoniale?></option>
                                                                                </select>
                                                                               <!--  <button type="button" data-toggle="modal" data-target="#ajouterS_m"  style="background-color: transparent">
                                                                                <i class="fas fa-plus"></i>
                                                                            </button> -->
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <span class="help-block small-font" >NOMBRE D'ENFANTS</span>
                                                                            <div class="col">
                                                                                <input style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"  name="nombre_enfants" value="<?=$nombre_enfants?>" readonly>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >GENRE</span>
                                                                            <div class="col">
                                                                                <select name="genre" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" readonly>
                                                                                    <option value="<?=$genre?>" selected=""><?=$genre?></option>
                                                                                </select>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <span class="help-block small-font" >PROPRIETAIRE DU LOCAL OCCUPE</span>
                                                                            <div class="col">
                                                                                <input style="width:75%;border-top: 0; 
                                                                                border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="proprietaire_local" value="<?=$proprietaire_local?>" readonly>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >TEL DU PROPRIETAIRE</span>
                                                                            <div class="col">
                                                                                <input style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="tel_proprietaire" value="<?=$tel_proprietaire?>" readonly>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                             <span class="help-block small-font" >PAYS:</span>
                                                                            <div class="col">
                                                                                <select name="pays" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" readonly>
                                                                                    <option value="<?=$pays?>" selected=""><?=$pays?></option>
                                                                                </select>
                                                                            </div> 
                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >VILLE</span>
                                                                            <div class="col">
                                                                                <input style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="ville" value="<?=$ville?>" readonly>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>                                              <td>
                                                                            <span class="help-block small-font" >QUARTIER</span>
                                                                            <div class="col">
                                                                                <input style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="quartier" value="<?=$quartier?>" readonly>
                                                                            </div>
                                                                        </td>
                                                                        <td></td>

                                                                    </tr>

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="card-footer">

                                                    </div>
                                                    </div>
                                                    
                                                          </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--ETAT ACADEMIQUE -->
                                

                                <!--ETAT PROFESSIONNEL-->


                                <!-- INFORMATION RH -->
                               

                                <!-- infos Paie -->
                                

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

                    
                    include("ajouter_profession.php");


                    ?>
    <!--//Footer-->
<?php
include('foot.php');
?>