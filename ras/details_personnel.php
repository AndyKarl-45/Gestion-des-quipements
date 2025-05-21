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
$id=$_REQUEST['id'];

$query  = "SELECT * from personnel where id_personnel='".$id."'";
$q = $db->query($query);
while($row = $q->fetch())
{ 
    $id_personnel = $row['id_personnel'];
    /*-------------------- ETAT CIVILE --------------------*/
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
    $id_pays=$row['id_pays'];

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
    $garant = $row['garant'];
    $parrain_interne = $row['parrain_interne'];
    $parrain_externe = $row['parrain_externe'];



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
            <h1 class="mt-4">Détails du Pesonnel : <?= $nom.' '.$prenom ?></h1>
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
                                            Civile<!-- <?=$id_personnel?> -->
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#menu_photo">
                                            <i class="fas fa-camera"></i>
                                            Photo
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#menu6">
                                            <i class="fas fa-envelope"></i>
                                             Academique
                                        </a>
                                    </li>
                              <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#menu7">
                                            <i class="fas fa-envelope"></i>
                                             Professionnel
                                        </a>
                                    </li> 
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#menu1">
                                            <i class="fas fa-user"></i>
                                            Information RH
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#menu2">
                                            <i class="fas fa-plus"></i>
                                            Infos Paie
                                        </a>
                                    </li> 
                                     <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#menu3">
                                            <i class="fas fa-university"></i>
                                            Congés
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#menu4">
                                            <i class="fas fa-envelope"></i>
                                             Credits
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#menu5">
                                            <i class="fas fa-envelope"></i>
                                             Sanctions
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

                                                                        <td>
                                                                            <span class="help-block small-font" >NOM</span>
                                                                            <div class="col">
                                                                                <input style="width:75%;border-top: 0;
                                                                                border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"  value="<?=$nom?>" readonly>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >PRENOM</span>
                                                                            <div class="col">
                                                                                <input style="width:75%;border-top: 0;
                                                                                border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" value="<?=$prenom?>"  readonly>
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
                                                                                background: transparent;" value="<?=$id_card_number?>"  readonly>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >DATE D'EXPIRATION CNI</span>
                                                                            <div class="col">
                                                                                <input type="date" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" value="<?=$id_card_validity?>"  readonly>
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
                                                                                background: transparent;" value="<?=$tel?>"  readonly>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >EMAIL</span>
                                                                            <div class="col">
                                                                                <input style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" type="email" value="<?=$email?>" readonly>
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
                                                                                background: transparent;" value="<?=$nom_pere?>"  readonly>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >NOM DE LA MERE</span>
                                                                            <div class="col">
                                                                                <input style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" value="<?=$nom_mere?>"  readonly>
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
                                                                                background: transparent;" value="<?=$date_naissance?>"  readonly>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >LIEU DE NAISSANCE</span>
                                                                            <div class="col">
                                                                                <input style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" value="<?=$lieu_naissance?>"  readonly>
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
                                                                                background: transparent;" readonly>
                                                                                    <option value="" selected>
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
                                                                                </select>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                           <span class="help-block small-font" >QUARTIER</span>
                                                                            <div class="col">
                                                                                <select name="id_quartier" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" readonly>
                                                                                    <option value="" selected>
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
                                                                                background: transparent;" readonly>
                                                                                    <option value="<?=$profession?>" ><?=$profession?></option>
                                                                                </select>

                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >SITUATION MATRIMONIALE</span>

                                                                            <div class="col">
                                                                                <select name="situation_matrimoniale" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" readonly>>
                                                                                    <option value="<?=$situation_matrimoniale?>"><?=$situation_matrimoniale?></option>

                                                                                </select>

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
                                                                                background: transparent;"  value="<?=$nombre_enfants?>"  readonly>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >GENRE</span>
                                                                            <div class="col">
                                                                                <select name="genre" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" readonly>>
                                                                                    <option value="<?=$genre?>" selected><?=$genre?></option>

                                                                                </select>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                <td>
                                                                        <span class="help-block small-font" >PAYS</span>
                                                                            <div class="col">
                                                                                <select name="genre" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" readonly>
                                                                                    <option value="<?=$id_pays?>" selected>
                                                                 <?php

                                                                     $sql="SELECT * FROM pays where id_pays='$id_pays' ";
                                                                        $stmt = $db->prepare($sql);
                                                                        $stmt->execute();

                                                                         $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                                foreach($tables as $table)
                                                                                    {
                                                                                        echo $table['nom'];
                                                                                   }
                                                                          ?>

                                                                                    </option>

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

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!--                                Photo-->
                                <div class="tab-pane container active" id="menu_photo">


                                    <h5> Photo de <?=$prenom.' '.$nom?> </h5>

                                    <div class="row">
                                        <?php
                                        if($size != "" AND $size != 0){
                                            ?>

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
                                        }
                                        ?>
                                    </div>
                                </div>

<!--********************************************INFO RH************************************************* -->
                                  <div class="tab-pane container" id="menu1">
                                    <!-- infos civile-->

                                   <!--  <h5><b><u>NB:</u></b> Veillez saisir vos informations concernant le traitement de ressource humaine</h5> -->

                                    <div class="row">
                                        <hr/>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="card mb-4">
                                                <form class="form-horizontal" action="save_infos_pers.php" method="POST">
                                                    <div class="card-header">
                                                
                                                    </div>
                                                    <div class="card-body">
                                                        <fieldset>
                                                            <div class="table-responsive">
                                                                <table class="table  table-hover table-condensed" id="myTable">
                                                                    <tbody>
                                                                <tr>

                                                                <td>
                                                                    
                                                                            <span class="help-block small-font" >CATEGORIE SALARIALE </span>
                                                                            
                                                                            <div class="col">
                                                                                <select name="cat_salariale" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" readonly>>
                                                                                    <option value="<?=$cat_salariale?>" selected><?=$cat_salariale?></option>
                                                                                    
                                                                                </select>
                                                                               
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                        <span class="help-block small-font" >GARANT</span>
                                                                            
                                                                            <div class="col">
                                                                                <select name="parrain" style="width:75%;
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

                                                                ?></option>
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
                                                                                background: transparent;" readonly>>
                                                                                    <option value="<?=$secteur?>" selected><?=$secteur?></option>
                                                                                    
                                                                                </select>
                                                                               
                                                                            </div>
                                                                        </td>
                                                                <td>
                                                                            <span class="help-block small-font" >SALLE</span>
                                                                            
                                                                            <div class="col">
                                                                                <select name="salle" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"readonly >
                                                                                    <option value="<?=$salle?>" selected><?=$salle?></option>
                                                                                  
                                                                                </select>
                                                                              
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
                                                                                background: transparent;" readonly>>
                                                                                    <option value="<?=$poste?>" selected><?=$poste?></option>
                                                                                   
                                                                                </select>
                                                                                
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >DATE D'EMBAUCHE</span>
                                                                            <div class="col">
                                                                                <input type="date" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" value="<?=$date_embauche?>"  readonly>
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
                                                                                background: transparent;" readonly>
                                                                                    <option value="<?=$type_contrat?>"><?=$type_contrat?></option>
                                                                                    
                                                                                </select>
                                                                                <button type="button" data-toggle="modal" data-target="#ajouterCc"  style="background-color: transparent">
                                                                                <i class="fas fa-plus"></i>
                                                                            </button>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >STATUT</span>
                                                                            
                                                                            <div class="col">
                                                                                <select name="statut" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" readonly>>
                                                                                    <option value="<?=$statut?>" selected=""><?=$statut?></option>
                                                                                    
                                                                                </select>
                                                                                <button type="button" data-toggle="modal" data-target="#ajouterStatut"  style="background-color: transparent">
                                                                                <i class="fas fa-plus"></i>
                                                                            </button>
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
                                                                                background: transparent;" value="<?=$sal_base?>"  readonly>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >SALAIRE HORAIRE</span>
                                                                            <div class="col">
                                                                                <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" value="<?=$sal_horaire?>"  readonly>
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
                                                                                background: transparent;" value="<?=$matricule?>"  readonly>
                                                                            </div>
                                                                        </td>                                                       <td>
                                                                            <span class="help-block small-font" >N° CNPS:</span>
                                                                            <div class="col">
                                                                                <input type="text" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" value="<?=$number_cnps?>"  readonly>
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
                                                                                background: transparent;" value="<?=$nom_banque?>"  readonly>
                                                                            </div>
                                                                        </td>                                                       <td>
                                                                            <span class="help-block small-font" >N° COMPTE BANCAIRE:</span>
                                                                            <div class="col">
                                                                                <input type="text" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" value="<?=$number_card_bancaire?>"  readonly>
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
                                                                                background: transparent;"  placeholder="jour(s)"  value="<?=$day_anciennete?>"  readonly>
                                                                                    <label>mois</label>
                                                                                    <input type="number" style="width:10%;
                                                                                    border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"  placeholder="mois" value="<?=$month_anciennete?>"  readonly>
                                                                                    <label>année(s)</label>
                                                                                    <input type="number" style="width:10%;
                                                                                    border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"  placeholder="année(s)" value="<?=$year_anciennete?>"  readonly>
                                                                                </div>
                                                                            </td>
                                                                             </tr>
  </tbody>
                                                                    </table>
                    <table class="table  table-hover table-condensed" id="myTable">
                        <tbody>
                                                                <tr>
                                                        <td>
                                                                    <?php


                                                                    if($parrain_interne!=0 and $parrain_externe==0){
                                    $sql = "SELECT DISTINCT * from personnel where id_personnel = '$parrain_interne'";

                                                                $stmt = $db->prepare($sql);
                                                                $stmt->execute();

                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                foreach($tables as $table)
                                                                {
                                                                    echo' <span class="help-block small-font" >PARRAIN INTERNE:</span>
                                                                            <div class="col">
                                                                                <input type="text" style="width:45%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" value="'.$table['nom'].' '.$table['prenom'].'"  readonly>
                                                                            </div>';
                                                                }

                                                                        
                                                                    }elseif($parrain_externe!=0 and $parrain_interne==0){                                          
                                    $sql = "SELECT DISTINCT * from parrain_externe where id_parrain_ex = '$parrain_externe'";

                                                                $stmt = $db->prepare($sql);
                                                                $stmt->execute();

                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                foreach($tables as $table)
                                                                {
                                                                    echo' <span class="help-block small-font" >PARRAIN EXTERNE:</span>
                                                                            <div class="col">
                                                                                <input type="text" style="width:45%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" value="'.$table['nom'].' '.$table['prenom'].'"  readonly>
                                                                            </div>';
                                                                }
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
                                                                                background: transparent;" readonly>';

                                                $sql = "SELECT DISTINCT * from personnel where id_personnel = '$parrain_interne'";

                                                                $stmt = $db->prepare($sql);
                                                                $stmt->execute();

                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                foreach($tables as $table)
                                                                {
                                                                    echo'<option  value="'.$table['id_personnel'].'" selected>'.$table['nom'].' '.$table['prenom'].'</option> ';

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
                                                                                background: transparent;" readonly>';
                                                $sql = "SELECT DISTINCT * from parrain_externe where id_parrain_ex = '$parrain_externe'";

                                                                $stmt = $db->prepare($sql);
                                                                $stmt->execute();

                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                foreach($tables as $table)
                                                                {
                                                                    echo'<option  value="'.$table['id_parrain_ex'].'" selected>'.$table['nom'].' '.$table['prenom'].'</option> ';

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
                                                       
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

<!--********************************************INFO PAIE************************************************* -->
                          <div class="tab-pane container" id="menu2">
                                    

                                    <!-- <h5><b><u>NB:</u></b> Veillez saisir vos informations concernant  les primes. </h5> -->

                                    <div class="row">
                                        <hr/>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="card mb-4">
                                                <form class="form-horizontal" action="save_prime_pers.php" method="POST">
                                                    <div class="card-header">
                                                       

                                                    </div>
                                                    <div class="card-body">
                                                        <fieldset>
                                                            <div class="table-responsive">
                                                                <table class="table  table-hover table-condensed" id="myTable">
                                                                    <tbody>
                                                                    
                                                                    <tr>
                                                                        <td>
                                                                            <span class="help-block small-font" >PRIME:</span>
                                                                            
                                                                            <div class="col">
                                                                                <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" value="<?php if($prime==0)
                                                                                {echo $prime=0;}
                                                                                else{ echo $prime;}
                                                                                
                                                                                ?>"  readonly>
                                                                            </div>
                                                                        </td>

                                                                    </tr>
                                                                    
                                                                    </tbody>
                                                                </table>
                                                                
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="card-footer">
                                                        
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

<!--********************************************MES CONGES************************************************* -->
                                <!--ETAT ACADEMIQUE -->
                                <div class="tab-pane container" id="menu3">
                                    <!-- infos civile-->

                                    

                                    <div class="row">
                                        <hr/>
                                    </div>

                                    <!-- Tableau liste de permissions  -->
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="card mb-4">
                                            <div class="card-header">
                                                <i class="fas fa-scroll"></i>
                                                <b>Historique de mes congés</b>
                                            </div>
                                            <div class="card-body">
                                                <div class="well bs-component">
                                                    <form class="form-horizontal">
                                                        <fieldset>
                                                            <div class="table-responsive">
                                                                <form method="post" action="" >
                                                                   <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                                                        <thead>
                                                                        <tr class="bg-primary">
                                                                            <th><p align="center">Utilisateur</p></th>
                                                                           <!--  <th><p align="center">Date d'émission</p></th> -->
                                                                            <th><p align="center">Nature congé</p></th>
                                                                            <th><p align="center">Début</p></th>
                                                                            <th><p align="center">Fin</p></th>
                                                                            <th><p align="center">Motif</p></th>
                                                                            <!-- <th><p align="center">Durée</p></th> -->
                                                                            <th><p align="center">Observation Manager</p></th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
<?php

                                                    $query = "SELECT * from conger_manager where nom='".$id."'";
                                                        $q = $db->query($query);
                                                        while($row = $q->fetch())
                                                        {
                                                            $nom = $row['nom'];
                                                            $type_conger = $row['type_conger'];
                                                            $start_time = $row['start_time'];
                                                            $end_time = $row['end_time'];
                                                            $motif = $row['motif'];
                                                            $observation = $row['observation'];
                                                             $etat = $row['etat'];

                                                     ?>
                                                     <tr>
                                                                
                                                            <td align="center">
                                                                <?php

                                                                $sql = "SELECT DISTINCT * from personnel where id_personnel = '$nom'";

                                                                $stmt = $db->prepare($sql);
                                                                $stmt->execute();

                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                foreach($tables as $table)
                                                                {
                                                                    echo $table['nom'].' '.$table['prenom'];
                                                                }

                                                                ?>
                                                            </td>
                                                            <td align="center"><?php echo $type_conger; ?>  </td>
                                                            <td align="center"><?php echo $start_time; ?>  </td>       
                                                            <td align="center"><?php echo $end_time; ?>  </td> 
                                                            <td align="center"><?php echo $motif; ?> </td>
                                                <?php 
                                                            if($etat==1){
                                                               echo'<td align="center" style="color: green"><b>'.$observation.'</b></td>'; 
                                                           }elseif($etat==2){
                                                            echo'<td align="center" style="color: red"><b>'.$observation.'</b></td>';
                                                            }elseif($etat==3){
                                                                   echo'<td align="center"><input style=" width:120px;"    class="btn btn-warning" value="En attente"/></td>';
                                                               }else{
                                                                echo'<td align="center">'.$observation.'</td>';
                                                               }
                                                             ?>  

                                                        <?php } ?>
                                                    </tbody>
                                                                        <tfoot>
                                                                        <tr class="bg-primary">
                                                                            <th><p align="center">Utilisateur</p></th>
                                                                            <!-- <th><p align="center">Date d'émission</p></th> -->
                                                                            <th><p align="center">Nature congé</p></th>
                                                                            <th><p align="center">Début</p></th>
                                                                            <th><p align="center">Fin</p></th>
                                                                            <th><p align="center">Motif</p></th>
                                                                           <!--  <th><p align="center">Durée</p></th> -->
                                                                             <th><p align="center">Observation Manager</p></th> 
                                                                        </tr>
                                                                        </tfoot>
                                                                        <tbody></tbody>
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
                                </div>
<!--********************************************MES CREDITS************************************************ -->
                                
            <div class="tab-pane container" id="menu4">
                          <div class="row">
                                        <hr/>
                            </div>

                    <div class="row">
                    <div class="col-xl-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-scroll"></i>
                                <b>Historique de mes crédits</b>
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
                                                            <th><p align="center">Utilisateur</p></th>
                                                            <!-- <th><p align="center">Date d'émission</p></th> -->
                                                            <th><p align="center">Nature crédit</p></th>
                                                            <th><p align="center">Date voulue</p></th>
                                                            <th><p align="center">Modèle Recouvrement</p></th>
                                                            <th><p align="center">Montant</p></th>
                                                            <th><p align="center">Motif</p></th>
                                                             <th><p align="center">Observation Manager</p></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php

                                                    $query = "SELECT * from credit where nom='".$id."'";
                                                        $q = $db->query($query);
                                                        while($row = $q->fetch())
                                                        {
                                                            $nom = $row['nom'];
                                                            $type_conger = $row['type_conger'];
                                                            $start_time = $row['start_time'];
                                                            $modalite = $row['modalite'];
                                                            $montant = $row['montant'];
                                                            $motif = $row['motif'];
                                                            $observation = $row['observation'];
                                                            $etat = $row['etat'];

                                                     ?>
                                                     <tr>
                                                                
                                                            <td align="center">
                                                                <?php

                                                                $sql = "SELECT DISTINCT * from personnel where id_personnel = '$nom'";

                                                                $stmt = $db->prepare($sql);
                                                                $stmt->execute();

                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                foreach($tables as $table)
                                                                {
                                                                    echo $table['nom'].' '.$table['prenom'];
                                                                }

                                                                ?>
                                                            </td>
                                                            <td align="center"><?php echo $type_conger; ?>  </td>
                                                            <td align="center"><?php echo $start_time; ?>  </td>       
                                                            <td align="center"><?php echo $modalite; ?>  </td> 
                                                            <td align="center"><?php echo $montant; ?>  </td>
                                                            <td align="center"><?php echo $motif; ?>  </td>
 <?php 
                                                            if($etat==1){
                                                               echo'<td align="center" style="color: green"><b>'.$observation.'</b></td>'; 
                                                           }elseif($etat==2){
                                                            echo'<td align="center" style="color: red"><b>'.$observation.'</b></td>';
                                                            }elseif($etat==3){
                                                                   echo'<td align="center"><input style=" width:120px;"    class="btn btn-warning" value="En attente"/></td>';
                                                               }else{
                                                                echo'<td align="center">'.$observation.'</td>';
                                                               }
                                                             ?>  

                                                        <?php } ?>
                                                    </tbody>
                                                        <tfoot>
                                                        <tr class="bg-primary">
                                                            <th><p align="center">Utilisateur</p></th>
                                                            <!-- <th><p align="center">Date d'émission</p></th> -->
                                                            <th><p align="center">Nature crédits</p></th>
                                                            <th><p align="center">Date voulue</p></th>
                                                            <th><p align="center">Modèle Recouvrement</p></th>
                                                            <th><p align="center">Montant</p></th>
                                                            <th><p align="center">motif</p></th>
                                                            <th><p align="center">Observation Manager</p></th>
                                                        </tr>
                                                        </tfoot>
                                                        <tbody></tbody>
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
             </div>
<!--******************************************MES TESTS************************************************ -->



            <div class="tab-pane container" id="menu7">
                          <div class="row">
                                        <hr/>
                            </div>

                    <div class="row">
                    <div class="col-xl-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-scroll"></i>
                                <b>Historique de mes crédits</b>
                            </div>
                            <div class="card-body">
                                <div class="well bs-component">
                                    <form class="form-horizontal">
                                        <fieldset>
                                            <div class="table-responsive">
                                                <form method="post" action="" >
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
                                                                                <input name="entreprise[]" style="width:100%" class="form-control" value="'.$entreprise.'" reparrain>
                                                                            </td>
                                                                            <td>
                                                                                <input  name="reference[]" style="width:100%" class="form-control" value="'.$reference.'" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input name="fonction[]" style="width:100%" class="form-control" value="'.$fonction.'" readonly >
                                                                            </td>
                                                                            <td>
                                                                                <input type="date" name="date_arrive[]" style="width:100%" class="form-control" value="'.$date_arrive.'" readonly>
                                                                            </td>                                                                      <td>
                                                                                <input type="date" name="date_depart[]" style="width:100%" class="form-control" value="'.$date_depart.'" readonly>
                                                                            </td>                                                                    
<!--                                                                             <td>

                                                                                <input type="file" name="fichier_prof[]" style="width:100%" class="form-control">
                                                                            </td> --> 
                                                                        </tr>';

                                                            }?>
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
             </div>




<!--******************************************MES SANCTIONS************************************************ -->
                              
                        <div class="tab-pane container" id="menu5">
                             <div class="row">
                                <hr/>
                             </div>

<div class="row">
                    <div class="col-xl-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-scroll"></i>
                                <b>L'ensemble de mes sanctions .</b>
                               
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
                                                        <th><p align="center">PERSONNEL</p></th>
                                                        <th><p align="center">NATURE</p></th>
                                                        <th><p align="center">MONTANT</p></th>
                                                        <th><p align="center">MOTIF</p></th>
                                                        <th><p align="center">DATE</p></th>
                                                        </tr>
                                                        </thead>
<?php

                                                        $query = "SELECT * from sanction where personnel='".$id."'"; 
                                                        $q = $db->query($query);
                                                        while($row = $q->fetch())
                                                        {
                                                            $personnel = $row['personnel'];
                                                            $nature = $row['nature'];
                                                            $motif = $row['motif'];
                                                            $date = $row['date_sanction'];
                                                            $montant = $row['montant'];

 ?>
 <tr>
                                                                
                                                            <td align="center"> <?php

                                                                $sql = "SELECT DISTINCT * from personnel where id_personnel = '$personnel'";

                                                                $stmt = $db->prepare($sql);
                                                                $stmt->execute();

                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                foreach($tables as $table)
                                                                {
                                                                    echo $table['nom'].' '.$table['prenom'];
                                                                }

                                                                ?>   </td>
                                                            <td align="center"><?php echo $nature; ?>  </td>
                                                            <td align="center"><?php echo $montant; ?>  </td>
                                                            <td align="center"><?php echo $motif; ?>  </td>
                                                            <td align="center"><?php echo $date; ?>  </td>                                          
                                                            </tr>
                                                            <?php } ?>



                                                        <tfoot>
                                                            <tr class="bg-primary">
                                                        <th><p align="center">PERSONNEL</p></th>
                                                        <th><p align="center">NATURE</p></th>
                                                        <th><p align="center">MONTANT</p></th>
                                                        <th><p align="center">MOTIF</p></th>
                                                        <th><p align="center">DATE</p></th>
                                                            </tr>
                                                        </tfoot>
                                                        <tbody></tbody>
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
             </div>




<!--******************************************ETAT ACADEMIQUE************************************************ -->
                              
                        <div class="tab-pane container" id="menu6">
                            <ul class="nav nav-pills" style="float: right;">
                                    <li class="nav-item">
                                        <a class="nav-link active"  href="liste_pj_aca?id=<?=$id?>">
                                            <i class="fas fa-cubes"></i>
                                            Liste des Pièces jointes <!-- <?=$id_personnel?> -->
                                        </a>
                                    </li>
                                </ul>


                                    <h5><b><u>NB:</u></b> Vos informations consernant vos 5 dernieres années d'études</h5>
                                                                <b>
                             <div class="row">
                                <hr/>
                             </div>


<div class="row">
                    <div class="col-xl-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-scroll"></i>
                                <b>L'ensemble de mes etats academique .</b>
                               
                            </div>
                                                    <div class="card-body">
                                                        <fieldset>
                                                            <div class="table-responsive">
                                                                <table class="table table-bordered" width="100%" cellspacing="0">
                                                                    <thead>
                                                                        <tr class="bg-primary">
                                                                            <th>Dilplôme</th>
                                                                            <th>Session</th>
                                                                            <th>École</th>
                                                                            <th>Mention</th>
                                                                            <!-- <th>PJ (scan du diplome)</th>  -->
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

                                                    $query = "SELECT * from etat_academique where id_perso='".$id_personnel."' ";
                                                                $stmt = $db->prepare($query);
                                                                $stmt->execute();

                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                        foreach($tables as $table)
                                                            {
                                                            $diplome= $table['diplome'];
                                                            $session = $table['session'];
                                                            $ecole = $table['ecole'];
                                                            $mention = $table['mention'];
                                                            // echo $table['diplome'];

                                                     

                                                                       echo '<tr>
                                                                           
                                                                            <td>
                                                                                <input name="diplome[]" style="width:100%" class="form-control" value="'.$diplome.'" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input type="month" name="session[]" style="width:100%" class="form-control" value="'.$session.'" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input name="ecole[]" style="width:100%" class="form-control" value="'.$ecole.'" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input name="mention[]" style="width:100%" class="form-control" value="'.$mention.'" readonly>
                                                                            </td>
<!--                                                                             <td>

                                                                                <input type="file" name="fichier_aca[]" style="width:100%" class="form-control" readonly>
                                                                            </td> -->  
                                                                        </tr>';

                                                            }?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </fieldset>
                                                    </div>


                            <div class="card-footer">

                            </div>
                        </div>
                    </div>
                </div>
             </div>



<!--******************************************ETAT PROFESSIONNEL************************************************ -->
                              
                      
                                
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
        }
    ?>


    <!--//Footer-->
<?php
include('foot.php');
?>