<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

 $query  = "SELECT id_garant_ex as total, count(nom) as i from garant_externe";
$q = $db->query($query);
while($row = $q->fetch())
{   $i= $row["i"];
    if($i==0){$total=0;}else{$total = $row["total"];}
}
echo $total.' ';
echo $i;
 $id_garant_ex = $total; 


?>


<!--Content-->

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Fiche d'Inscription des Garants Externes</h1>
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

                                    <h5><b><u>NB:</u></b> Veillez saisir vos informations d'état civil comme sur vos pièces d'identité</h5>

                                    <div class="row">
                                        <hr/>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="card mb-4">
                                                <form class="form-horizontal" action="save_garant_externe.php" method="POST">
                                                    <div class="card-header">

                                                    </div>
                                                    <div class="card-body">
                                                        <fieldset>
                                                            <div class="table-responsive">
                                                                <table class="table  table-hover table-condensed" id="myTable">
                                                                    <tbody>

                                                                    <tr>

                                                                        <td>
                                                                            <span class="help-block small-font" >NOM</span>
                                                                            <div class="col">
                                                                                <input style="width:75%;border-top: 0; 
                                                                                border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"  name="nom" >
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >PRENOM</span>
                                                                            <div class="col">
                                                                                <input style="width:75%;border-top: 0; 
                                                                                border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="prenom" >
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
                                                                                background: transparent;" name="id_card_number" >
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >DATE D'EXPIRATION CNI</span>
                                                                            <div class="col">
                                                                                <input type="date" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="id_card_validity" >
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
                                                                                background: transparent;" name="tel" >
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >EMAIL</span>
                                                                            <div class="col">
                                                                                <input style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" type="email" name="email">
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
                                                                                background: transparent;" name="date_naissance" >
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >LIEU DE NAISSANCE</span>
                                                                            <div class="col">
                                                                                <input style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="lieu_naissance">
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
                                                                                background: transparent;" name="profession">
                                                                                
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >SITUATION MATRIMONIALE</span>
                                                                            
                                                                            <div class="col">
                                                                                <select name="situation_matrimoniale" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" 
                                                                                >
                                                                                    <option value="" selected="">...</option>
                                                                                    <option value="CELIBATAIRE">CELIBATAIRE</option>
                                                                                    <option value="MARIÉ(E)">MARIÉ(E)</option>
                                                                                    <option value="VEUF(VE)">VEUF(VE)</option>
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
                                                                                background: transparent;"  name="nombre_enfants" >
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >GENRE</span>
                                                                            <div class="col">
                                                                                <select name="genre" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" >
                                                                                    <option value="" selected="">...</option>
                                                                                    <option value="MASCULIN">MASCULIN</option>
                                                                                    <option value="FEMININ">FEMININ</option>
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
                                                                                background: transparent;" name="proprietaire_local" >
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >TEL DU PROPRIETAIRE</span>
                                                                            <div class="col">
                                                                                <input style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="tel_proprietaire" >
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                             <span class="help-block small-font" >PAYS:</span>
                                                                            <div class="col">
                                                                                <select name="pays" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" >
                                                                                    <option value="N/A" selected="">...</option>
                                                                                    <?php

                                        $iResult = $db->query('SELECT * FROM pays');

                                                                    while($data = $iResult->fetch()){

                                                                        $i = $data['nom'];
                                                                        echo '<option value ="'.$i.'">';
                                                                        echo $data['nom'];
                                                                        echo '</option>';
                                                
                                                                    }
                                                    ?>
                                    

                                                                                </select>
                                                                            </div> 
                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >VILLE</span>
                                                                            <div class="col">
                                                                                <input style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="ville">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>                                              <td>
                                                                            <span class="help-block small-font" >QUARTIER</span>
                                                                            <div class="col">
                                                                                <input style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="quartier">
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
                                                     <center> <button type="submit" style=" width:150px;"  name="submit_salle"  class="btn btn-primary" >Enregistrer</button>
                                    
                                                        <a href="<?=$garant['option2_link']?>" style=" width:150px;" class="btn btn-primary" ><font>Annuler</font></a>
                                                        </center>
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

                    
                    include("ajouter_profession.php");


                    ?>
    <!--//Footer-->
<?php
include('foot.php');
?>