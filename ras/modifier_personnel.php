<?php

include('first.php');
include('php/main_side_navbar.php');
include('save_photo.php');
include('update_photo.php');

?>

<?php
$id=$_REQUEST['id'];
$id_perso = $id;
$size = 0;

$query  = "SELECT * from personnel where id_personnel='".$id."'";
$q = $db->query($query);
while($row = $q->fetch())
{ 
    /*-------------------- ETAT CIVILE --------------------*/
    $id_personnel = $row['id_personnel'];
    $matricule = $row['matricule'];
    $nom = $row['nom'];
    $prenom = $row['prenom'];
    $id_card_number = $row['id_card_number'];
    $id_card_validity = $row['id_card_validity'];
    $tel=$row['tel'];
    $email=$row['email'];
    $nom_pere=$row['nom_pere'];
    $nom_mere=$row['nom_mere'];
    $date_naissance=$row['date_naissance'];
    $lieu_naissance=$row['lieu_naissance'];
    $profession=$row['profession'];
    $situation_matrimoniale=$row['situation_matrimoniale'];
    $nombre_enfants=$row['nombre_enfants'];
    $genre=$row['genre'];
    $id_quartier=$row['id_quartier'];
    $id_ville=$row['id_ville'];

    /*-------------------- INFOS RH --------------------*/

    $cat_salariale=$row['cat_salariale'];
    $secteur=$row['secteur'];
    $salle=$row['salle'];
    $poste=$row['poste'];
    $date_embauche=$row['date_embauche'];
    $type_contrat=$row['type_contrat'];
    $statut=$row['statut'];
    $sal_base=$row['sal_base'];
    $sal_horaire=$row['sal_horaire'];
    $matricule=$row['matricule'];
    $number_cnps=$row['number_cnps'];
    $nom_banque=$row['nom_banque'];
    $number_card_bancaire=$row['number_card_bancaire'];
    $day_anciennete=$row['day_anciennete'];
    $month_anciennete=$row['month_anciennete'];
    $year_anciennete=$row['year_anciennete'];
    $garant=$row['garant'];
    $parrain_interne=$row['parrain_interne'];
    $parrain_externe=$row['parrain_externe'];

    /*-------------------- INFOS PAIE --------------------*/

    $prime=$row['prime'];

    /*-------------------- PHOTO --------------------*/
    $query1  = "SELECT * from photo_profile where id_personnel='".$id."'";
    $q1 = $db->query($query1);
    while($row1 = $q1->fetch())
    {
        $lien = $row1['lien'];
        $size = $row1['taille'];
    }
        ?>

<!--Content-->

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">NOM DE L'EMPLOYE: <?=$nom.' '.$prenom.' ('.$matricule.')'?> </h1>
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
                         <ul class="nav nav-pills"   style="float: right;">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="<?=$personnel['option2_link']?>">
                                            
                                            Annuler
                                        </a>
                                    </li>                                    
                                </ul>
                            <b>
                                <!-- Nav pills -->
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#home">
                                            <i class="fas fa-cubes"></i>
                                            Etat Civile
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#menu5">
                                            <i class="fas fa-camera"></i>
                                            Photo
                                        </a>
                                    </li>
                                    <li class="nav-item">
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
                                    </li> 
                                    <li class="nav-item">
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
                                    </li> 
                                    
                                </ul>

                            </b>

                        </div>

                        <div class="card-body">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!-- Etat Civile-->
                                <div class="tab-pane container active" id="home">
                                    <!-- infos civile-->

                                    <h5><b><u>NB:</u></b> Informations d'état civil </h5>

                                    <div class="row">
                                        <hr/>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="card mb-4">
                                                <form class="form-horizontal" action="update_civil_pers.php" method="POST">
                                                    <div class="card-header">

                                                    </div>
                                                    <div class="card-body">
                                                        <fieldset>
                                                            <div class="table-responsive">
                                                                <table class="table  table-hover table-condensed" id="myTable">
                                                                    <tbody>

                                                                    <tr>

                                                                        <td>
                                                                            <input type="hidden" name="id_personnel" value="<?=$id?>">
                                                                            <span class="help-block small-font" >NOM</span>
                                                                            <div class="col">
                                                                                <input style="width:75%;border-top: 0; 
                                                                                border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"  name="nom" value="<?=$nom?>" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >PRENOM</span>
                                                                            <div class="col">
                                                                                <input style="width:75%;border-top: 0; 
                                                                                border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="prenom" value="<?=$prenom?>" required>
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
                                                                                background: transparent;" name="id_card_number" value="<?=$id_card_number?>" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >DATE D'EXPIRATION CNI</span>
                                                                            <div class="col">
                                                                                <input type="date" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="id_card_validity" value="<?=$id_card_validity?>" required>
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
                                                                                background: transparent;" name="tel"  value="<?=$tel?>" required>
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
                                                                            <span class="help-block small-font" >NOM DU PERE</span>
                                                                            <div class="col">
                                                                                <input style="width:75%;border-top: 0; 
                                                                                border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="nom_pere" value="<?=$nom_pere?>" >
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >NOM DE LA MERE</span>
                                                                            <div class="col">
                                                                                <input style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="nom_mere" value="<?=$nom_mere?>">
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
                                                                                background: transparent;" name="date_naissance" value="<?=$date_naissance?>" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >LIEU DE NAISSANCE</span>
                                                                            <div class="col">
                                                                                <input style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="lieu_naissance" value="<?=$lieu_naissance?>" required>
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                <tr>
                                                                         <td>
                                                                        <span class="help-block small-font" >VILLE</span>
                                                                            <div class="col">
                                                                                <select name="id_ville" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                                    <option value="<?=$id_ville?>" selected>
                                                                 <?php

                                                                     $sql="SELECT * FROM ville where id_ville='$id_ville' ";
                                                                        $stmt = $db->prepare($sql);
                                                                        $stmt->execute();

                                                                         $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                foreach($tables as $table)
                                                                                    {
                                                                                        echo $table['nom'];
                                                                                   }
                                                                          ?>
                                                                                    </option>
                                                                  <?php

                                                                        $iResult = $db->query('SELECT * FROM ville');

                                                                                                    while($data = $iResult->fetch()){

                                                                                                        $i = $data['id_ville'];
                                                                                                    echo '<option value ="'.$i.'">';
                                                                                                        echo $data['nom'];
                                                                                                        echo '</option>';
                                                                                
                                                                                                    }
                                                                            ?>

                                                                                </select>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                           <span class="help-block small-font" >QUARTIER</span>
                                                                            <div class="col">
                                                                                <select name="id_quartier" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                                    <option value="<?=$id_quartier?>" selected>
                                                             <?php

                                                                     $sql="SELECT * FROM quartier where id_quat='$id_quartier' ";
                                                                        $stmt = $db->prepare($sql);
                                                                        $stmt->execute();

                                                                         $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                foreach($tables as $table)
                                                                                    {
                                                                                        echo $table['nom'];
                                                                                   }
                                                                          ?>                           

                                                                                    </option>
                                                                                    <?php

                                                                    $iResult = $db->query('SELECT * FROM quartier');

                                                                                                while($data = $iResult->fetch()){

                                                                                                    $i = $data['id_quat'];
                                                                                                echo '<option value ="'.$i.'">';
                                                                                                    echo $data['nom'];
                                                                                                    echo '</option>';
                                                                            
                                                                                                }
                                                                        ?>
                                                                            </select>
                                                                            </div>
                                                                        </td>

                                                                    </tr>

                                                                    <tr>
                                                                        <td>
                                                                            <span class="help-block small-font" >PROFESSION</span>
                                                                            <div class="col">
                                                                                <select name="profession" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                                    <option value="<?=$profession?>" selected=""><?=$profession?></option>
                                                                                    <?php

                                                $iResult = $db->query('SELECT * FROM profession');

                                                                            while($data = $iResult->fetch()){

                                                                                $i = $data['nom'];
                                                                            echo '<option value ="'.$i.'">';
                                                                                echo $data['nom'];
                                                                                echo '</option>';
                                                        
                                                                            }
                                                    ?>

                                                                    
                                                                                </select>
                                                                                <button type="button" data-toggle="modal" data-target="#ajouterProfession"  style="background-color: transparent">
                                                                                <i class="fas fa-plus"></i>
                                                                            </button>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >SITUATION MATRIMONIALE</span>
                                                                            
                                                                            <div class="col">
                                                                                <select name="situation_matrimoniale" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                                    <option value="<?=$situation_matrimoniale?>" selected=""><?=$situation_matrimoniale?></option>
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
                                                                                background: transparent;"  name="nombre_enfants" value="<?=$nombre_enfants?>" required>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >GENRE</span>
                                                                            <div class="col">
                                                                                <select name="genre" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                                    <option value="<?=$genre?>" selected=""><?=$genre?></option>
                                                                                    <option value="MASCULIN">MASCULIN</option>
                                                                                    <option value="FEMININ">FEMININ</option>
                                                                                </select>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="card-footer">
                                                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups" style="float: right;">
                                                        <div class="btn-group mr-2" role="group" aria-label="First group">
                                                            <h5 class="bg-warning"><b><u>NB:</u></b> Veillez enregistrer avant de passer à l'étape suivante ! </h5>
                                                        </div>
                                                        <div class="btn-group mr-2" role="group" aria-label="First group">
                                                            <button type="submit" name="submit_etat_civil" class="btn btn-primary" >Enregistrer</button>
                                                        </div>
                                                        <div class="btn-group mr-2" role="group" aria-label="Second group">
<!--                                                                <a href="liste_personnels.php" class="btn btn-primary" style="float: right; padding-top: 10px; padding-bottom: 10px; margin-right: 20px"><i class="fas fa-angle-double-down"></i> Annuler</a>-->
                                                        </div>
                                                    </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

<!--                                Photo-->
                                <div class="tab-pane container active" id="menu5">


                                    <h5><b><u>NB:</u></b> Veillez charger une photo en png, jpeg ou jpg (taille max 3Mo) </h5>

                                    <div class="row">
                                        <hr/>
                                    </div>

                                    <div class="row">
                                        <?php
                                        if($size != "" AND $size != 0){
                                        ?>
                                        <div class="col-md-12">
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <div class="col">
                                                                <input class="form-control" type="file" name="new_photo" />
                                                                <input type="hidden" name="id_perso" value="<?=$id_perso?>" />
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="col">
                                                                <input type="submit" name="update_photo" class="btn btn-primary" value="Remplacer" />
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </form>
                                        </div>
                                            <div class="col-md-12">
                                                <br/>
                                                <hr/>

                                            </div>
                                        <div class="col-md-12">
                                            <div class="text-center">
                                                <img src="<?=$lien?>" class="img-thumbnail" alt="Logo SYGES RH">
                                            </div>
                                        </div>
                                            <?php
                                        }else{
                                            ?>
                                            <div class="col-md-12">
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <div class="col">
                                                                    <input class="form-control" type="file" name="photo" />
                                                                    <input type="hidden" name="id_perso" value="<?=$id_perso?>" />
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="col">
                                                                    <input type="submit" name="submit_photo" class="btn btn-primary" value="Enregistrer" />
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </form>
                                            </div>
                                            <?php
                                        }
                                            ?>
                                    </div>
                                </div>

                                <!--ETAT ACADEMIQUE -->
                                <div class="tab-pane container" id="menu1">
                                    <!-- infos civile-->

                                    <h5><b><u>NB:</u></b> Veillez saisir vos informations consernant vos 5 dernieres années d'études</h5>

                                    <div class="row">
                                        <hr/>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="card mb-4">
                                                <form class="form-horizontal" action="update_personnel_school.php" method="POST" enctype="multipart/form-data">
                                                    <div class="card-header">
                                                        <input type="hidden" name="id_personnel" value="<?=$id?>">

                                                    </div>
                                                    <div class="card-body">
                                                        <fieldset>
                                                            <div class="table-responsive">
                                                                <table class="table table-bordered" width="100%" cellspacing="0">
                                                                    <thead>
                                                                        <tr class="bg-primary">
                                                                            <th>Dilplôme<?=$id?></th>
                                                                            <th>Session</th>
                                                                            <th>École</th>
                                                                            <th>Mention</th>
                                                                         <!--    <th>PJ (scan du diplome)</th> -->
                                                                        </tr>
                                                                    </thead>
                                                                    <tfoot>
                                                                        <tr class="bg-primary">
                                                                            <th>Dilplôme</th>
                                                                            <th>Session</th>
                                                                            <th>École</th>
                                                                            <th>Mention</th>
                                                                            <!-- <th>PJ (scan du diplome)</th> -->
                                                                        </tr>
                                                                    </tfoot>
                                                                    <tbody>
<?php

                                                    $query = "SELECT * from etat_academique where id_perso='".$id."' ";
                                                                $stmt = $db->prepare($query);
                                                                $stmt->execute();

                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                        foreach($tables as $table)
                                                            {
                                                            $id= $table['id_etat_academique'];
                                                            $diplome= $table['diplome'];
                                                            $session = $table['session'];
                                                            $ecole = $table['ecole'];
                                                            $mention = $table['mention'];
                                                            // echo $table['diplome'];

                                                     

                                                                       echo '
                                                                       <input type="hidden" name="id_etat[]" value="'.$id.'">

                                                                       <tr>
                                                                           
                                                                            <td>
                                                                                <input name="diplome[]" style="width:100%" class="form-control" value="'.$diplome.'">
                                                                            </td>
                                                                            <td>
                                                                                <input type="month" name="session[]" style="width:100%" class="form-control" value="'.$session.'">
                                                                            </td>
                                                                            <td>
                                                                                <input name="ecole[]" style="width:100%" class="form-control" value="'.$ecole.'">
                                                                            </td>
                                                                            <td>
                                                                                <input name="mention[]" style="width:100%" class="form-control" value="'.$mention.'">
                                                                            </td>
<!--                                                                             <td>

                                                                                <input type="file" name="fichier_aca[]" style="width:100%" class="form-control">
                                                                            </td> --> 
                                                                        </tr>';

                                                            }?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="card-footer">
                                                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups" style="float: right;">
                                                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                                                <h5 class="bg-warning"><i class="fas fa-warning"></i> <b><u>NB:</u></b> Veillez enregistrer avant de passer à l'étape suivante ! </h5>
                                                            </div>
                                                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                                                <button type="submit" name="submit_etat_scolaire" class="btn btn-primary" >Enregistrer</button>
                                                            </div>
                                                            <div class="btn-group mr-2" role="group" aria-label="Second group">
                                                                <!--                                                                <a href="liste_personnels.php" class="btn btn-primary" style="float: right; padding-top: 10px; padding-bottom: 10px; margin-right: 20px"><i class="fas fa-angle-double-down"></i> Annuler</a>-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--                                    Courrier-->
                                <div class="tab-pane container" id="menu2">
                                    <!-- infos civile-->

                                    <h5><b><u>NB:</u></b> Veillez saisir vos informations consernant vos 5 dernieres années profession </h5>

                                    <div class="row">
                                        <hr/>
                                    </div>

                                    <div class="row">
                                                <form class="form-horizontal" action="update_personnel_work.php" method="POST" enctype="multipart/form-data">

                                                <input type="hidden" name="id_personnel" value="<?=$id_personnel?>">
                                                        <fieldset>
                                                            <div class="table-responsive">
                                                                <table class="table table-bordered" width="100%" cellspacing="0">
                                                                    <thead>
                                                                    <tr class="bg-primary">
                                                                        <th>Entreprises</th>
                                                                        <th>Reférences <br/> "Nom (Téléphone) du responsable"</th>
                                                                        <th>Fonction</th>
                                                                        <th>Date d'arrivé</th>
                                                                        <th>Date de départ</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tfoot>
                                                                    <tr class="bg-primary">
                                                                        <th>Entreprises</th>
                                                                        <th>Reférences <br/> "Nom (Téléphone) du responsable"</th>
                                                                        <th>Fonction</th>
                                                                        <th>Date d'arrivé</th>
                                                                        <th>Date de départ</th>
                                                                    </tr>
                                                                    </tfoot>
                                                                    <tbody>
                                                                        <?php

                                         $query = "SELECT * from etat_professionnel where id_perso='".$id_personnel."' ";
                                                                $stmt = $db->prepare($query);
                                                                $stmt->execute();

                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                        foreach($tables as $table)
                                                            {
                                                            $id= $table['id_etat_professionnel'];
                                                            $entreprise= $table['entreprise'];
                                                            $reference = $table['reference'];
                                                            $fonction = $table['fonction'];
                                                            $date_arrive = $table['date_arrive'];
                                                            $date_depart = $table['date_depart'];
                                                            // echo $table['diplome'];

                                                     

                                                                       echo '
                                                                       <input type="hidden" name="id_etat[]" value="'.$id.'">
                                                                       <tr>
                                                                           
                                                                            <td>
                                                                                <input name="entreprise[]" style="width:100%" class="form-control" value="'.$entreprise.'">
                                                                            </td>
                                                                            <td>
                                                                                <input  name="reference[]" style="width:100%" class="form-control" value="'.$reference.'">
                                                                            </td>
                                                                            <td>
                                                                                <input name="fonction[]" style="width:100%" class="form-control" value="'.$fonction.'">
                                                                            </td>
                                                                            <td>
                                                                                <input type="date" name="date_arrive[]" style="width:100%" class="form-control" value="'.$date_arrive.'">
                                                                            </td>                                                                      <td>
                                                                                <input type="date" name="date_depart[]" style="width:100%" class="form-control" value="'.$date_depart.'">
                                                                            </td>                                                                    
<!--                                                                             <td>

                                                                                <input type="file" name="fichier_prof[]" style="width:100%" class="form-control">
                                                                            </td> --> 
                                                                        </tr>';

                                                            }?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </fieldset>
                                                    
                                                    
                                                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups" style="float: right;">
                                                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                                                <h5 class="bg-warning"><i class="fas fa-warning"></i> <b><u>NB:</u></b> Veillez enregistrer avant de passer à l'étape suivante ! </h5>
                                                            </div>
                                                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                                                <button type="submit" name="submit_etat_professionnel" class="btn btn-primary" >Enregistrer</button>
                                                            </div>
                                                            <div class="btn-group mr-2" role="group" aria-label="Second group">
                                                                <!--                                                                <a href="liste_personnels.php" class="btn btn-primary" style="float: right; padding-top: 10px; padding-bottom: 10px; margin-right: 20px"><i class="fas fa-angle-double-down"></i> Annuler</a>-->
                                                            </div>
                                                        </div>
                                                    
                                                </form>
                                            </div>
                                </div>
                                <!-- information RH -->
                                <div class="tab-pane container" id="menu3">
                                    <!-- infos civile-->

                                    <h5><b><u>NB:</u></b>Informations concernant le traitement de ressource humaine</h5>

                                    <div class="row">
                                        <hr/>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="card mb-4">
                                                <form class="form-horizontal" action="update_infos_pers.php" method="POST">
                                                    <div class="card-header">
                                                
                                                    </div>
                                                    <div class="card-body">
                                                        <fieldset>
                                                            <div class="table-responsive">
                                                                <table class="table  table-hover table-condensed" id="myTable">
                                                                    <tbody>
                                                                <tr>

                                                                <td>
                                                                    <?php
                                                echo '<input name="id_personnels" type="hidden" value="'.$id_personnel.'">';
                                                ?>
                                                                            <span class="help-block small-font" >CATEGORIE SALARIALE </span>
                                                                            
                                                                            <div class="col">
                                                                                <select name="cat_salariale" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;">
                                                                                    <option value="<?=$cat_salariale?>" selected=""><?=$cat_salariale?></option>
                                                <?php

                                                $iResult = $db->query('SELECT * FROM categorie_salariale');

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
                                                        <span class="help-block small-font" >GARANT</span>
                                                                            
                                                                            <div class="col">
                                                                                <select name="garant" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                                    <option value="<?=$garant?>" selected="">
                                                                <?php  $sql = "SELECT DISTINCT * from personnel where id_personnel = '$garant'";

                                                                $stmt = $db->prepare($sql);
                                                                $stmt->execute();

                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                foreach($tables as $table)
                                                                {
                                                                    echo $table['nom'].' '.$table['prenom'];
                                                                }

                                                                ?>


                                                                                </option>
                                                                                    <?php

                                                $iResult = $db->query('SELECT * FROM personnel');

                                                                            while($data = $iResult->fetch()){

                                                                                $i = $data['id_personnel'];
                                                                            echo '<option value ="'.$i.'">';
                                                                                echo $data['nom'].' '.$data['prenom'];
                                                                                echo '</option>';
                                                        
                                                                            }
                                                    ?>
                                                                                </select>
                                                                               
                                                                            </div>

                                                                        </td>
                                                                    </tr> 

                                                                    <tr>

                                                                <td>
                                                                            <span class="help-block small-font" >SECTEUR</span>
                                                                            
                                                                            <div class="col">
                                                                                <select name="secteur" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                                    <option value="<?=$secteur?>" selected=""><?=$secteur?></option>
                                                                                    <?php

                                                $iResult = $db->query('SELECT * FROM secteur');

                                                                            while($data = $iResult->fetch()){

                                                                                $i = $data['nom'];
                                                                            echo '<option value ="'.$i.'">';
                                                                                echo $data['nom'];
                                                                                echo '</option>';
                                                        
                                                                            }
                                                    ?>
                                                                                </select>
                                                                               <button type="button" data-toggle="modal"  style="background-color: transparent"><a href="nouveau_secteur.php"><i class="fas fa-plus"></i></a>
                                                                            </div>
                                                                        </td>
                                                                <td>
                                                                            <span class="help-block small-font" >SALLE</span>
                                                                            
                                                                            <div class="col">
                                                                                <select name="salle" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                                    <option value="<?=$salle?>" selected=""><?=$salle?></option>
                                                                                    <?php

                                                $iResult = $db->query('SELECT * FROM salles');

                                                                            while($data = $iResult->fetch()){

                                                                                $i = $data['nom'];
                                                                            echo '<option value ="'.$i.'">';
                                                                                echo $data['nom'];
                                                                                echo '</option>';
                                                        
                                                                            }
                                                    ?>
                                                                                </select>
                                                                              <button type="button" data-toggle="modal"  style="background-color: transparent"><a href="nouvelle_salle.php"><i class="fas fa-plus"></i></a></button>
                                                                            </div>
                                                                        </td>
                                                                    </tr>    

                                                                    <tr>
                                                                        <td>
                                                                            <span class="help-block small-font" >POSTE</span>
                                                                            
                                                                            <div class="col">
                                                                                <select name="poste" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                                    <option value="<?=$poste?>" selected=""><?=$poste?></option>
                                                                                    <?php

                                                $iResult = $db->query('SELECT * FROM profession');

                                                                            while($data = $iResult->fetch()){

                                                                                $i = $data['nom'];
                                                                            echo '<option value ="'.$i.'">';
                                                                                echo $data['nom'];
                                                                                echo '</option>';
                                                        
                                                                            }
                                                    ?>
                                                                                </select>
                                                                                <button type="button" data-toggle="modal" data-target="#ajouterProfession"  style="background-color: transparent">
                                                                                <i class="fas fa-plus"></i>
                                                                            </button>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >DATE D'EMBAUCHE</span>
                                                                            <div class="col">
                                                                                <input type="date" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="date_embauche" value="<?=$date_embauche?>">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <span class="help-block small-font" >TYPE DE CONTRAT</span>
                                                                            
                                                                            <div class="col">
                                                                                <select name="type_contrat" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" >
                                                                                <option value="CDI"><?=$type_contrat?></option>
                                                                                    <option value="CDI">CDI</option>
                                                                                    <option value="CDD">CDD</option>
                                                                                    <option value="N/A">N/A</option>
                                                                                </select>
                                                                             <!--    <button type="button" data-toggle="modal" data-target="#ajouterCc"  style="background-color: transparent">
                                                                                <i class="fas fa-plus"></i>
                                                                            </button> -->
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >STATUT</span>
                                                                            
                                                                            <div class="col">
                                                                                <select name="statut" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                                    <option value="<?=$statut?>" selected=""><?=$statut?></option>
                                                                                    <option value="PRESTATAIRE">PRESTATAIRE</option>
                                                                                    <option value="STAGIAIRE">STAGIAIRE</option>
                                                                                    <option value="EMPLOYÉ">EMPLOYÉ</option>
                                                                                    <option value="CONSULTANT">CONSULTANT</option>
                                                                                    <option value="POSTULANT">POSTULANT</option>
                                                                                </select>
                                                                                <!-- <button type="button" data-toggle="modal" data-target="#ajouterStatut"  style="background-color: transparent">
                                                                                <i class="fas fa-plus"></i>
                                                                            </button> -->
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <span class="help-block small-font" >SALAIRE DE BASE (en XAF)</span>
                                                                            <div class="col">
                                                                                <input type="number" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="sal_base" value="<?=$sal_base?>" >
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >SALAIRE HORAIRE</span>
                                                                            <div class="col">
                                                                                <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="sal_horaire" value="<?=$sal_horaire?>" required>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <span class="help-block small-font" >MATRICULE</span>
                                                                            <div class="col">
                                                                                <input style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="matricule" value="<?=$matricule?>" required>
                                                                            </div>
                                                                        </td>                                                       <td>
                                                                            <span class="help-block small-font" >N° CNPS:</span>
                                                                            <div class="col">
                                                                                <input type="text" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="number_cnps" value="<?=$number_cnps?>" required>
                                                                            </div>
                                                                        </td>

                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <span class="help-block small-font" >NOM DE LA BANQUE</span>
                                                                            <div class="col">
                                                                                <input style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="nom_banque" value="<?=$nom_banque?>" required>
                                                                            </div>
                                                                        </td>                                                       <td>
                                                                            <span class="help-block small-font" >N° COMPTE BANCAIRE:</span>
                                                                            <div class="col">
                                                                                <input type="text" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="number_card_bancaire" value="<?=$number_card_bancaire?>" required>
                                                                            </div>
                                                                        </td>

                                                                    </tr>                                                                    </tbody>
                                                                </table>
                                                                <table class="table  table-hover table-condensed" id="myTable">
                                                                        <tbody>
                                                                        <tr>
                                                                           
                                                                            <td>
                                                                                <span class="help-block small-font" >ANCIENNETE</span>
                                                                                <div class="col">
                                                                                    <label>jour(s)</label>
                                                                                    <input type="number" style="width:10%;
                                                                                    border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="day_anciennete" placeholder="jour(s)" value="<?=$day_anciennete?>" >
                                                                                    <label>mois</label>
                                                                                    <input type="number" style="width:10%;
                                                                                    border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="month_anciennete" placeholder="mois" value="<?=$month_anciennete?>" >
                                                                                    <label>année(s)</label>
                                                                                    <input type="number" style="width:10%;
                                                                                    border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="year_anciennete" placeholder="année(s)" value="<?=$year_anciennete?>" >
                                                                                </div>
                                                                            </td>
                                                                            
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
<table class="table  table-hover table-condensed" id="myTable">
                        <tbody>
                                                                    <tr>

                                    <td> <?php
                                                if($parrain_interne!=0 and $parrain_externe==0){
                                            

                                           echo' <div class="col">
                                                    <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#a1">
                                            <i class="fas fa-user"></i>
                                           Parrain Interne 
                                        </a>
                                    </li>
                                <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#a2">
                                            <i class="fas fa-users"></i>
                                            Parrain Externe
                                        </a>
                                    </li>
                                                    </ul>
                                                    <div class="tab-content">
                                                            <div class="tab-pane  active" id="a1">
                                                                <span class="help-block small-font" >INTERNE</span>
                                                                <div class="col">
                                                                    <select name="parrain_interne"  style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"  >
                                                                        '; 
                                    $sql = "SELECT DISTINCT * from personnel where id_personnel = '$parrain_interne'";

                                                                $stmt = $db->prepare($sql);
                                                                $stmt->execute();

                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                foreach($tables as $table)
                                                                {
                                                                    echo'<option value="'.$id_personnel.'" selected>'.$table['nom'].' '.$table['prenom'].'</option>';
                                                                }
                                                                        $iResult = $db->query('SELECT * FROM personnel');

                                                                        while($data = $iResult->fetch()){

                                                                        $i = $data['id_personnel'];
                                                                            echo '<option value ="'.$i.'">';
                                                                            echo $data['nom'].' '.$data['prenom'];
                                                                            echo '</option>';

                                                                        }
                                                                        
                                                                    echo'</select>
                                                                </div>
                                                            </div>
                                                        <div class="tab-pane" id="a2">
                                                            <span class="help-block small-font" >EXTERNE</span>
                                                            <div class="col">
                                                                <select name="parrain_externe" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;">
                                                                    <option value="0" selected>...</option>';
                                                                    

                                                                    $iResult = $db->query('SELECT * FROM parrain_externe');

                                                                    while($data = $iResult->fetch()){

                                                                        $i = $data['id_parrain_ex'];
                                                                        echo '<option value ="'.$i.'">';
                                                                        echo $data['nom'].' '.$data['prenom'];
                                                                        echo '</option>';

                                                                    }
                                                                    
                                                                echo '</select>
                                                            </div>
                                                        </div>
                                                    
                                                    </div>                                                      
                                                </div>
                                            </div>
                                        </div>';
                                    }elseif($parrain_externe!=0 and $parrain_interne==0){

echo' <div class="col">
                                                    <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link " data-toggle="tab" href="#a1">
                                            <i class="fas fa-user"></i>
                                           Parrain Interne 
                                        </a>
                                    </li>
                                <li class="nav-item">
                                        <a class="nav-link"  active data-toggle="tab" href="#a2">
                                            <i class="fas fa-users"></i>
                                            Parrain Externe
                                        </a>
                                    </li>
                                                    </ul>
                                                    <div class="tab-content">
                                                            <div class="tab-pane " id="a1">
                                                                <span class="help-block small-font" >INTERNE</span>
                                                                <div class="col">
                                                                    <select name="parrain_interne"  style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" >
                                                                    <option selected>...</option>
                                                                        ';
                                                                        $iResult = $db->query('SELECT * FROM personnel');

                                                                        while($data = $iResult->fetch()){

                                                                        $i = $data['id_personnel'];
                                                                            echo '<option value ="'.$i.'">';
                                                                            echo $data['nom'].' '.$data['prenom'];
                                                                            echo '</option>';

                                                                        }
                                                                        
                                                                    echo'</select>
                                                                </div>
                                                            </div>
                                                        <div class="tab-pane  active " id="a2">
                                                            <span class="help-block small-font" >EXTERNE</span>
                                                            <div class="col">
                                                                <select name="parrain_externe" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;">';
                                    $sql = "SELECT DISTINCT * from parrain_externe where id_parrain_ex = '$parrain_externe'";

                                                                $stmt = $db->prepare($sql);
                                                                $stmt->execute();

                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                foreach($tables as $table)
                                                                {
                                                                    echo'<option value="'.$table['id_parrain_ex'].'" selected>'.$table['nom'].' '.$table['prenom'].'</option>';
                                                                }

                                                                    $iResult = $db->query('SELECT * FROM parrain_externe');

                                                                    while($data = $iResult->fetch()){

                                                                        $i = $data['id_parrain_ex'];
                                                                        echo '<option value ="'.$i.'">';
                                                                        echo $data['nom'].' '.$data['prenom'];
                                                                        echo '</option>';

                                                                    }
                                                                    
                                                                echo '</select>
                                                            </div>
                                                        </div>
                                                    
                                                    </div>                                                      
                                                </div>
                                            </div>
                                        </div>';






                                    }else{
                                                echo'  <div class="col">
                                                    <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#a1">
                                            <i class="fas fa-user"></i>
                                           Parrain Interne 
                                        </a>
                                    </li>
                                <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#a2">
                                            <i class="fas fa-users"></i>
                                            Parrain Externe
                                        </a>
                                    </li>
                                                    </ul>
                                                    <div class="tab-content">
                                                            <div class="tab-pane  active" id="a1">
                                                                <span class="help-block small-font" >INTERNE</span>
                                                                <div class="col">
                                                                    <select name="parrain_interne"  style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" >';
                                                      $sql = "SELECT DISTINCT * from personnel where id_personnel = '$parrain_interne'";

                                                                $stmt = $db->prepare($sql);
                                                                $stmt->execute();

                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                foreach($tables as $table)
                                                                {
                                                                    echo'<option  value="'.$table['id_personnel'].'" selected>'.$table['nom'].' '.$table['prenom'].'</option> ';

                                                                }
                                                                        

                                                                        $iResult = $db->query('SELECT * FROM personnel');

                                                                        while($data = $iResult->fetch()){

                                                                        $i = $data['id_personnel'];
                                                                            echo '<option value ="'.$i.'">';
                                                                            echo $data['nom'].' '.$data['prenom'];
                                                                            echo '</option>';

                                                                        }
                                                                        
                                                                   echo' </select>
                                                                </div>
                                                            </div>
                                                        <div class="tab-pane " id="a2">
                                                            <span class="help-block small-font" >EXTERNE</span>
                                                            <div class="col">
                                                                <select name="parrain_externe" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;">';
                                                      $sql = "SELECT DISTINCT * from parrain_externe where id_parrain_ex = '$parrain_externe'";

                                                                $stmt = $db->prepare($sql);
                                                                $stmt->execute();

                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                foreach($tables as $table)
                                                                {
                                                                    echo'<option  value="'.$table['id_parrain_ex'].'" selected>'.$table['nom'].' '.$table['prenom'].'</option> ';

                                                                }
                                                                    

                                                                    $iResult = $db->query('SELECT * FROM parrain_externe');

                                                                    while($data = $iResult->fetch()){

                                                                        $i = $data['id_parrain_ex'];
                                                                        echo '<option value ="'.$i.'">';
                                                                        echo $data['nom'].' '.$data['prenom'];
                                                                        echo '</option>';

                                                                    }
                                                                
                                                               echo' </select>
                                                            </div>
                                                        </div>
                                                    
                                                    </div>                                                      
                                                </div>
                                            </div>
                                        </div>';
                                    }

                                        ?>
                                    </td>

                                                                    </tr>
                                                                        </tbody>
                                                                    </table>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="card-footer">
                                                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups" style="float: right;">
                                                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                                                <h5 class="bg-warning"><b><u>NB:</u></b> Veillez enregistrer avant de passer à l'étape suivante ! </h5>
                                                            </div>
                                                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                                                <button type="submit" name="submit_etat_civil" class="btn btn-primary" >Enregistrer</button>
                                                            </div>
                                                            <div class="btn-group mr-2" role="group" aria-label="Second group">
                                                                <!--                                                                <a href="liste_personnels.php" class="btn btn-primary" style="float: right; padding-top: 10px; padding-bottom: 10px; margin-right: 20px"><i class="fas fa-angle-double-down"></i> Annuler</a>-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- infos Paie -->
                                <div class="tab-pane container" id="menu4">
                                    <!-- infos bulletin conge-->

                                    <h5><b><u>NB:</u></b> Veillez saisir vos informations concernant  les primes. </h5>

                                    <div class="row">
                                        <hr/>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="card mb-4">
                                                <form class="form-horizontal" action="update_prime_pers.php" method="POST">
                                                    <div class="card-header">
                                                       

                                                    </div>
                                                    <div class="card-body">
                                                        <fieldset>
                                                            <div class="table-responsive">
                                                                <table class="table  table-hover table-condensed" id="myTable">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <?php
                                                echo '<input name="id_personnel" type="hidden" value="'.$id.'">';
                                                ?>
                                                                            <span class="help-block small-font" >PRIME:</span>
                                                                            
                                                                            <div class="col">
                                                                                <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="prime" value="<?=$prime?>">
                                                                            </div>
                                                                        </td>
                                                                    </tr>                                              
                                                                    </tbody>
                                                                </table>
                                                                
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="card-footer">
                                                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups" style="float: right;">
                                                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                                                <h5 class="bg-warning"><b><u>NB:</u></b> Veillez enregistrer avant de passer à l'étape suivante ! </h5>
                                                            </div>
                                                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                                                <button type="submit" name="submit_etat_civil" class="btn btn-primary" >Enregistrer</button>
                                                            </div>
                                                            <div class="btn-group mr-2" role="group" aria-label="Second group">
                                                                <!--                                                                <a href="liste_personnels.php" class="btn btn-primary" style="float: right; padding-top: 10px; padding-bottom: 10px; margin-right: 20px"><i class="fas fa-angle-double-down"></i> Annuler</a>-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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
<?php
    }
    ?>

<!--    Modal pour ajouter Situation Matrimoniale-->
<div class="modal fade" id="ajouterS_m" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
                <h3 align="center"><b>Nouvelle Situation Matrimoniale</b></h3>
                <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <form class="form-horizontal" action="#" name="form" method="post">
                    <div class="form-group">
                        <label>Intitulé</label>
                        <div class="col-sm-12">
                            <input type="text" name="intitule" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="submit" name="submit_sm" class="btn btn-primary" value="Créer">
                            <input type="reset" name="" class="btn btn-warning" value="Effacer Formulaire">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--    Modal pour ajouter Poste-->
<div class="modal fade" id="ajouterPoste" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
                <h3 align="center"><b>Nouveau Poste</b></h3>
                <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <form class="form-horizontal" action="#" name="form" method="post">
                    <div class="form-group">
                        <label>Intitulé</label>
                        <div class="col-sm-12">
                            <input type="text" name="intitule" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="submit" name="submit_poste" class="btn btn-primary" value="Créer">
                            <input type="reset" name="" class="btn btn-warning" value="Effacer Formulaire">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--    Modal pour ajouter Statut-->
<div class="modal fade" id="ajouterStatut" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
                <h3 align="center"><b>Nouveau Statut</b></h3>
                <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <form class="form-horizontal" action="#" name="form" method="post">
                    <div class="form-group">
                        <label>Intitulé</label>
                        <div class="col-sm-12">
                            <input type="text" name="intitule" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="submit" name="submit_statut" class="btn btn-primary" value="Créer">
                            <input type="reset" name="" class="btn btn-warning" value="Effacer Formulaire">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--    Modal pour ajouter Categorie Contrat-->
<div class="modal fade" id="ajouterCc" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
                <h3 align="center"><b>Nouvelle Categorie Contrat</b></h3>
                <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <form class="form-horizontal" action="#" name="form" method="post">
                    <div class="form-group">
                        <label>Intitulé</label>
                        <div class="col-sm-12">
                            <input type="text" name="intitule" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="submit" name="submit_cs" class="btn btn-primary" value="Créer">
                            <input type="reset" name="" class="btn btn-warning" value="Effacer Formulaire">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--    Modal pour ajouter Categorie Contrat-->
<div class="modal fade" id="ajouterAvantage" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
                <h3 align="center"><b>Nouvelle Avantage</b></h3>
                <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <form class="form-horizontal" action="#" name="form" method="post">
                    <div class="form-group">
                        <label>Intitulé</label>
                        <div class="col-sm-12">
                            <input type="text" name="avantage" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="submit" name="submit_cs" class="btn btn-primary" value="Créer">
                            <input type="reset" name="" class="btn btn-warning" value="Effacer Formulaire">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php 

                    
                    include("ajouter_profession.php");


                    ?>
    <!--//Footer-->
<?php
include('foot.php');
?>