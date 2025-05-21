<?php

include('first.php');
include('php/archives_side_navbar.php');

include("save_new_directory.php");

$courrier_finder = "";
$contrat_finder = "";
$projet_finder = "";
$autres_finder = "";

include ("pj_courrier_finder.php");
include ("pj_contrat_finder.php");
include ("pj_projet_finder.php");
include ("pj_autres_finder.php");

include ("pj_courrier_resetter.php");
include ("pj_contrat_resetter.php");
include ("pj_projet_resetter.php");
include ("pj_autres_resetter.php");





?>
    <!--Count Projets-->

<?php
//                                global $deduction;
//                                $deduction = 0;
//                                $total_cash = 0;
//                        PJ Evaluation
$query  = "SELECT count(id_pj) as total from pj_evaluation";
$q = $conn->query($query);
while($row = $q->fetch_assoc())
{
    $total_pj_evaluation = $row["total"];
}

//                        PJ Apmi
$query  = "SELECT count(id_pj) as total from pj_apmi";
$q = $conn->query($query);
while($row = $q->fetch_assoc())
{
    $total_pj_apmi = $row["total"];
}
//                        PJ Aor
$query  = "SELECT count(id_pj) as total from pj_aor";
$q = $conn->query($query);
while($row = $q->fetch_assoc())
{
    $total_pj_aor = $row["total"];
}
//                        PJ Dialogue
$query  = "SELECT count(id_pj) as total from pj_dialogue";
$q = $conn->query($query);
while($row = $q->fetch_assoc())
{
    $total_pj_dialogue = $row["total"];
}
//                      PJ adjudication
$query  = "SELECT count(id_pj) as total from pj_adjudication";
$q = $conn->query($query);
while($row = $q->fetch_assoc())
{
    $total_pj_adjudication = $row["total"];
}
//                        PJ Négociation
$query  = "SELECT count(id_pj) as total from pj_negociation";
$q = $conn->query($query);
while($row = $q->fetch_assoc())
{
    $total_pj_negociation = $row["total"];
}
//                        PJ Contrat Signé
$query  = "SELECT count(id_pj) as total from pj_contrat_signe";
$q = $conn->query($query);
while($row = $q->fetch_assoc())
{
    $total_pj_contrat_signe = $row["total"];
}


$total_pj_all_step = $total_pj_evaluation + $total_pj_apmi + $total_pj_aor + $total_pj_dialogue + $total_pj_adjudication + $total_pj_negociation + $total_pj_contrat_signe;
?>

    <!--        Count COntrats-->
<?php
$query  = "SELECT count(id_pj) as total from pj_contrats";
$q = $conn->query($query);
while($row = $q->fetch_assoc())
{
    $total_pj_contrats = $row["total"];
}
?>

    <!--        Count Courriers-->
<?php
$query  = "SELECT count(id_pj) as total from pj_courriers";
$q = $conn->query($query);
while($row = $q->fetch_assoc())
{
    $total_pj_courriers = $row["total"];
}
?>

    <!--        Count others -->
<?php
$total_archives = 0;
$query  = "SELECT nom_repertoire from archives";
$q = $conn->query($query);
while($row = $q->fetch_assoc())
{
    $nom_repertoire = $row["nom_repertoire"];

//            echo 'Repertoire :'.$nom_repertoire.'<br/>';

    $query1  = "SELECT count(id) as total from ".$nom_repertoire;

//            echo 'Query 1 :'.$query1.'<br/>';

    $q1 = $conn->query($query1);
    while($row1 = $q1->fetch_assoc())
    {
        $total_archives += $row1["total"];
//                echo 'Total :'.$total_archives.'<br/>';
    }
}
?>


<!--Content-->

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Archives</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">
                    Hello M/Mme <?=strtoupper($user);?>, il est <?=date("G:i");?> en ce jour du <?=dateToFrench("now","l j F Y");?>.
                </li>
            </ol>

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
                                            Projets (<?= $total_pj_all_step;?>)
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#menu1">
                                            <i class="fas fa-university"></i>
                                            Contrats (<?= $total_pj_contrats;?>)
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#menu2">
                                            <i class="fas fa-envelope"></i>
                                            Courriers (<?= $total_pj_courriers;?>)
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#menu3">
                                            <i class="fas fa-plus"></i>
                                            Autres (<?= $total_archives;?>)
                                        </a>
                                    </li>
                                </ul>
                            </b>
                        </div>
                        <div class="card-body">
                            <!-- Tab panes -->
                            <div class="tab-content">
<!--                                    Projet-->
                                <div class="tab-pane container active" id="home">
                                    <!--            Dossier Projets-->
                                    <h3>Dossier projets</h3>
                                    <p>Fichiers classé par étape</p>

                                    <div class="row mb-3" style="padding: 20px">
                                        <div class="table-responsive">
                                            <form action="#" method="post">
                                                <table class="table table-hover table-condensed">
                                                    <tr>
                                                        <td>
                                                            <select name="target_projet" style="width:75%">
                                                                <option value="">Selectionner un projet pour affiner les recherches</option>
                                                                <?php
                                                                $query  = "SELECT * from projets";
                                                                $q = $conn->query($query);
                                                                $comp = 0;

                                                                while($data = $q->fetch_assoc()){
                                                                    ?>
                                                                    <option value="<?= $data['reference'];?>"><?= $data['nom'];?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                            <span>
                                                                <input type="submit" name="submit_projet" class="btn btn-primary" value="Go" />
                                                            </span>
                                                            <span>
                                                                <input type="submit" name="reset_projet" class="btn btn-outline-warning" value="Reset" />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </form>
                                        </div>
                                    </div>

                                    <!--                Panels -->

                                    <!--                Evaluation-->
                                    <div class="col-md-12">
                                        <div>
                                            <div>
                                                <h5 class="panel-title">
                                                    <i class="fas fa-folder"></i>
                                                    <?php
                                                    if($projet_finder == ""){
                                                        echo '<a href="#">EVALUATION ('.$total_pj_evaluation.')</a>';

                                                        $name_find_projet = '';

                                                    }else{

                                                        $name_find_projet = 'Projet Reference : '.$projet_finder;
                                                        $query  = "SELECT count(id_pj) as total from pj_evaluation WHERE ref_projet='$projet_finder'";
                                                        $q = $conn->query($query);
                                                        while($row = $q->fetch_assoc())
                                                        {
                                                            $total_pj_eval = $row["total"];
                                                        }

                                                        echo '<a href="#">Evaluation '.$name_find_projet.' : ('.$total_pj_eval.')</a>';
                                                    }
                                                    ?>
                                                </h5>
                                            </div>

                                            <div class="panel-body">
                                                <div class="main-box">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="row">
                                                                <div class="table-responsive" >
                                                                    <?php
                                                                        if($total_pj_evaluation != 0){
                                                                    ?>
                                                                    <table class="table table-bordered table-hover table-condensed">
                                                                        <thead>
                                                                        <tr class="bg-primary">
                                                                            <th><p align="center">Reference du Projet</p></th>
                                                                            <th><p align="center">Nom du Fichier</p></th>
                                                                            <th><p align="center">Date de Signature</p></th>
                                                                            <th><p align="center">Date de Reception</p></th>
                                                                            <th><p align="center">Action</p></th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <?php
                                                                        if($projet_finder=="")
                                                                            $query  = "SELECT * from pj_evaluation";
                                                                        else
                                                                            $query  = "SELECT * from pj_evaluation WHERE ref_projet='$projet_finder'";
                                                                        $q = $conn->query($query);
                                                                        $comp = 0;

                                                                        while($data = $q->fetch_assoc()){
                                                                            $comp+=1;
                                                                            echo '<tr>';
                                                                            echo '<td>';
                                                                            echo $data['ref_projet'];
                                                                            echo '</td>';
                                                                            echo '<td>';
                                                                            echo $data['nom_pj'];
                                                                            echo '</td>';
                                                                            echo '<td>';
                                                                            echo date("d-m-Y",strtotime($data['date_signature']));
                                                                            echo '</td>';
                                                                            echo '<td>';
                                                                            echo date("d-m-Y",strtotime($data['date_reception']));
                                                                            echo '</td>';
                                                                            echo '<td>';
                                                                            echo '<a  class="btn btn-primary" target="_blank" href="'.$data['lien'].'" > <i class="fa fa-eye"></></a>';
                                                                            echo '</td>';
                                                                            echo '</tr>';

                                                                        }
                                                                        ?>
                                                                        </tbody>
                                                                        <tfoot>
                                                                        <tr class="bg-primary">

                                                                            <th><p align="center">Reference du Projet</p></th>
                                                                            <th><p align="center">Nom du Fichier</p></th>
                                                                            <th><p align="center">Date de Signature</p></th>
                                                                            <th><p align="center">Date de Reception</p></th>
                                                                            <th><p align="center">Action</p></th>
                                                                        </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--                End Evaluation-->
                                    <hr/>
                                    <!--                APMI -->
                                    <div class="col-md-12">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h5 class="panel-title">
                                                    <i class="fas fa-folder"></i>
                                                    <?php
                                                    if($projet_finder == ""){
                                                        echo '<a href="#">APMI ('.$total_pj_apmi.')</a>';

                                                        $name_find_projet = '';

                                                    }else{

                                                        $name_find_projet = 'Projet Reference : '.$projet_finder;
                                                        $query  = "SELECT count(id_pj) as total from pj_apmi WHERE ref_projet='$projet_finder'";
                                                        $q = $conn->query($query);
                                                        while($row = $q->fetch_assoc())
                                                        {
                                                            $total_pj_apm = $row["total"];
                                                        }

                                                        echo '<a href="#">APMI '.$name_find_projet.' : ('.$total_pj_apm.')</a>';
                                                    }
                                                    ?>
                                                </h5>

                                            </div>
                                            <div class="panel-body">
                                                <div class="main-box">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="row">
                                                                <div class="table-responsive" >
                                                                    <?php
                                                                    if($total_pj_apmi != 0){
                                                                    ?>
                                                                    <table class="table table-bordered table-hover table-condensed">
                                                                        <thead>
                                                                        <tr class="bg-primary">
                                                                            <th><p align="center">Reference du Projet</p></th>
                                                                            <th><p align="center">Nom du Fichier</p></th>
                                                                            <th><p align="center">Date de Signature</p></th>
                                                                            <th><p align="center">Date de Reception</p></th>
                                                                            <th><p align="center">Action</p></th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <?php
                                                                        if($projet_finder=="")
                                                                            $query  = "SELECT * from pj_apmi";
                                                                        else
                                                                            $query  = "SELECT * from pj_apmi WHERE ref_projet='$projet_finder'";
                                                                        $q = $conn->query($query);
                                                                        $comp = 0;

                                                                        while($data = $q->fetch_assoc()){
                                                                            $comp+=1;
                                                                            echo '<tr>';
                                                                            echo '<td>';
                                                                            echo $data['ref_projet'];
                                                                            echo '</td>';
                                                                            echo '<td>';
                                                                            echo $data['nom_pj'];
                                                                            echo '</td>';
                                                                            echo '<td>';
                                                                            echo date("d-m-Y",strtotime($data['date_signature']));
                                                                            echo '</td>';
                                                                            echo '<td>';
                                                                            echo date("d-m-Y",strtotime($data['date_reception']));
                                                                            echo '</td>';
                                                                            echo '<td>';
                                                                            echo '<a  class="btn btn-primary" target="_blank" href="'.$data['lien'].'" > <i class="fa fa-eye"></></a>';
                                                                            echo '</td>';
                                                                            echo '</tr>';

                                                                        }
                                                                        ?>
                                                                        </tbody>
                                                                        <tfoot>
                                                                        <tr class="bg-primary">

                                                                            <th><p align="center">Reference du Projet</p></th>
                                                                            <th><p align="center">Nom du Fichier</p></th>
                                                                            <th><p align="center">Date de Signature</p></th>
                                                                            <th><p align="center">Date de Reception</p></th>
                                                                            <th><p align="center">Action</p></th>
                                                                        </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--                End Apmi-->
                                    <hr/>
                                    <!--                AOR-->
                                    <div class="col-md-12">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h5 class="panel-title">
                                                    <i class="fas fa-folder"></i>
                                                    <?php
                                                    if($projet_finder == ""){
                                                        echo '<a href="#">AOR ('.$total_pj_aor.')</a>';

                                                        $name_find_projet = '';

                                                    }else{

                                                        $name_find_projet = 'Projet Reference : '.$projet_finder;
                                                        $query  = "SELECT count(id_pj) as total from pj_aor WHERE ref_projet='$projet_finder'";
                                                        $q = $conn->query($query);
                                                        while($row = $q->fetch_assoc())
                                                        {
                                                            $total_pj_ao = $row["total"];
                                                        }

                                                        echo '<a href="#">AOR '.$name_find_projet.' : ('.$total_pj_ao.')</a>';
                                                    }
                                                    ?>
                                                </h5>

                                            </div>
                                            <div class="panel-body">
                                                <div class="main-box">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="row">
                                                                <div class="table-responsive" >
                                                                    <?php
                                                                    if($total_pj_aor != 0){
                                                                    ?>
                                                                    <table class="table table-bordered table-hover table-condensed">
                                                                        <thead>
                                                                        <tr class="bg-primary">
                                                                            <th><p align="center">Reference du Projet</p></th>
                                                                            <th><p align="center">Nom du Fichier</p></th>
                                                                            <th><p align="center">Date de Signature</p></th>
                                                                            <th><p align="center">Date de Reception</p></th>
                                                                            <th><p align="center">Action</p></th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <?php
                                                                        if($projet_finder=="")
                                                                            $query  = "SELECT * from pj_aor";
                                                                        else
                                                                            $query  = "SELECT * from pj_aor WHERE ref_projet='$projet_finder'";
                                                                        $q = $conn->query($query);
                                                                        $comp = 0;

                                                                        while($data = $q->fetch_assoc()){
                                                                            $comp+=1;
                                                                            echo '<tr>';
                                                                            echo '<td>';
                                                                            echo $data['ref_projet'];
                                                                            echo '</td>';
                                                                            echo '<td>';
                                                                            echo $data['nom_pj'];
                                                                            echo '</td>';
                                                                            echo '<td>';
                                                                            echo date("d-m-Y",strtotime($data['date_signature']));
                                                                            echo '</td>';
                                                                            echo '<td>';
                                                                            echo date("d-m-Y",strtotime($data['date_reception']));
                                                                            echo '</td>';
                                                                            echo '<td>';
                                                                            echo '<a  class="btn btn-primary" target="_blank" href="'.$data['lien'].'" > <i class="fa fa-eye"></></a>';
                                                                            echo '</td>';
                                                                            echo '</tr>';

                                                                        }
                                                                        ?>
                                                                        </tbody>
                                                                        <tfoot>
                                                                        <tr class="bg-primary">

                                                                            <th><p align="center">Reference du Projet</p></th>
                                                                            <th><p align="center">Nom du Fichier</p></th>
                                                                            <th><p align="center">Date de Signature</p></th>
                                                                            <th><p align="center">Date de Reception</p></th>
                                                                            <th><p align="center">Action</p></th>
                                                                        </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--                End AOR-->
                                    <hr/>
                                    <!--                Dialogue-->
                                    <div class="col-md-12">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h5 class="panel-title">
                                                    <i class="fas fa-folder"></i>
                                                    <?php
                                                    if($projet_finder == ""){
                                                        echo '<a href="#">DIALOGUE ('.$total_pj_dialogue.')</a>';

                                                        $name_find_projet = '';

                                                    }else{

                                                        $name_find_projet = 'Projet Reference : '.$projet_finder;
                                                        $query  = "SELECT count(id_pj) as total from pj_dialogue WHERE ref_projet='$projet_finder'";
                                                        $q = $conn->query($query);
                                                        while($row = $q->fetch_assoc())
                                                        {
                                                            $total_pj_dialogu = $row["total"];
                                                        }

                                                        echo '<a href="#">DIALOGUE '.$name_find_projet.' : ('.$total_pj_dialogu.')</a>';
                                                    }
                                                    ?>
                                                </h5>

                                            </div>
                                            <div class="panel-body">
                                                <div class="main-box">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="row">
                                                                <div class="table-responsive" >
                                                                    <?php
                                                                    if($total_pj_dialogue != 0){
                                                                    ?>
                                                                    <table class="table table-bordered table-hover table-condensed">
                                                                        <thead>
                                                                        <tr class="bg-primary">
                                                                            <th><p align="center">Reference du Projet</p></th>
                                                                            <th><p align="center">Nom du Fichier</p></th>
                                                                            <th><p align="center">Date de Signature</p></th>
                                                                            <th><p align="center">Date de Reception</p></th>
                                                                            <th><p align="center">Action</p></th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <?php
                                                                        if($projet_finder=="")
                                                                            $query  = "SELECT * from pj_dialogue";
                                                                        else
                                                                            $query  = "SELECT * from pj_dialogue WHERE ref_projet='$projet_finder'";
                                                                        $q = $conn->query($query);
                                                                        $comp = 0;

                                                                        while($data = $q->fetch_assoc()){
                                                                            $comp+=1;
                                                                            echo '<tr>';
                                                                            echo '<td>';
                                                                            echo $data['ref_projet'];
                                                                            echo '</td>';
                                                                            echo '<td>';
                                                                            echo $data['nom_pj'];
                                                                            echo '</td>';
                                                                            echo '<td>';
                                                                            echo date("d-m-Y",strtotime($data['date_signature']));
                                                                            echo '</td>';
                                                                            echo '<td>';
                                                                            echo date("d-m-Y",strtotime($data['date_reception']));
                                                                            echo '</td>';
                                                                            echo '<td>';
                                                                            echo '<a  class="btn btn-primary" target="_blank" href="'.$data['lien'].'" > <i class="fa fa-eye"></></a>';
                                                                            echo '</td>';
                                                                            echo '</tr>';

                                                                        }
                                                                        ?>
                                                                        </tbody>
                                                                        <tfoot>
                                                                        <tr class="bg-primary">

                                                                            <th><p align="center">Reference du Projet</p></th>
                                                                            <th><p align="center">Nom du Fichier</p></th>
                                                                            <th><p align="center">Date de Signature</p></th>
                                                                            <th><p align="center">Date de Reception</p></th>
                                                                            <th><p align="center">Action</p></th>
                                                                        </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--                End Dialogue-->
                                    <hr/>
                                    <!--                Adjudication-->
                                    <div class="col-md-12">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h5 class="panel-title">
                                                    <i class="fas fa-folder"></i>
                                                    <?php
                                                    if($projet_finder == ""){
                                                        echo '<a href="#">ADJUDICATION ('.$total_pj_adjudication.')</a>';

                                                        $name_find_projet = '';

                                                    }else{

                                                        $name_find_projet = 'Projet Reference : '.$projet_finder;
                                                        $query  = "SELECT count(id_pj) as total from pj_adjudication WHERE ref_projet='$projet_finder'";
                                                        $q = $conn->query($query);
                                                        while($row = $q->fetch_assoc())
                                                        {
                                                            $total_pj_adjudicatio = $row["total"];
                                                        }

                                                        echo '<a href="#">ADJUDICATION '.$name_find_projet.' : ('.$total_pj_adjudicatio.')</a>';
                                                    }
                                                    ?>
                                                </h5>

                                            </div>
                                            <div class="panel-body">
                                                <div class="main-box">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="row">
                                                                <div class="table-responsive" >
                                                                    <?php
                                                                    if($total_pj_adjudication != 0){
                                                                    ?>
                                                                    <table class="table table-bordered table-hover table-condensed">
                                                                        <thead>
                                                                        <tr class="bg-primary">
                                                                            <th><p align="center">Reference du Projet</p></th>
                                                                            <th><p align="center">Nom du Fichier</p></th>
                                                                            <th><p align="center">Date de Signature</p></th>
                                                                            <th><p align="center">Date de Reception</p></th>
                                                                            <th><p align="center">Action</p></th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <?php
                                                                        if($projet_finder=="")
                                                                            $query  = "SELECT * from pj_adjudication";
                                                                        else
                                                                            $query  = "SELECT * from pj_adjudication WHERE ref_projet='$projet_finder'";
                                                                        $q = $conn->query($query);
                                                                        $comp = 0;

                                                                        while($data = $q->fetch_assoc()){
                                                                            $comp+=1;
                                                                            echo '<tr>';
                                                                            echo '<td>';
                                                                            echo $data['ref_projet'];
                                                                            echo '</td>';
                                                                            echo '<td>';
                                                                            echo $data['nom_pj'];
                                                                            echo '</td>';
                                                                            echo '<td>';
                                                                            echo date("d-m-Y",strtotime($data['date_signature']));
                                                                            echo '</td>';
                                                                            echo '<td>';
                                                                            echo date("d-m-Y",strtotime($data['date_reception']));
                                                                            echo '</td>';
                                                                            echo '<td>';
                                                                            echo '<a  class="btn btn-primary" target="_blank" href="'.$data['lien'].'" > <i class="fa fa-eye"></></a>';
                                                                            echo '</td>';
                                                                            echo '</tr>';

                                                                        }
                                                                        ?>
                                                                        </tbody>
                                                                        <tfoot>
                                                                        <tr class="bg-primary">

                                                                            <th><p align="center">Reference du Projet</p></th>
                                                                            <th><p align="center">Nom du Fichier</p></th>
                                                                            <th><p align="center">Date de Signature</p></th>
                                                                            <th><p align="center">Date de Reception</p></th>
                                                                            <th><p align="center">Action</p></th>
                                                                        </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--                End Adjudication-->
                                    <hr/>
                                    <!--                Negociation-->
                                    <div class="col-md-12">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h5 class="panel-title">
                                                    <i class="fas fa-folder"></i>
                                                    <?php
                                                    if($projet_finder == ""){
                                                        echo '<a href="#">NEGOCIATION ('.$total_pj_negociation.')</a>';

                                                        $name_find_projet = '';

                                                    }else{

                                                        $name_find_projet = 'Projet Reference : '.$projet_finder;
                                                        $query  = "SELECT count(id_pj) as total from pj_negociation WHERE ref_projet='$projet_finder'";
                                                        $q = $conn->query($query);
                                                        while($row = $q->fetch_assoc())
                                                        {
                                                            $total_pj_negociatio = $row["total"];
                                                        }

                                                        echo '<a href="#">NEGOCIATION '.$name_find_projet.' : ('.$total_pj_negociatio.')</a>';
                                                    }
                                                    ?>
                                                </h5>

                                            </div>
                                            <div class="panel-body">
                                                <div class="main-box">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="row">
                                                                <div class="table-responsive" >
                                                                    <?php
                                                                    if($total_pj_negociation != 0){
                                                                    ?>
                                                                    <table class="table table-bordered table-hover table-condensed">
                                                                        <thead>
                                                                        <tr class="bg-primary">
                                                                            <th><p align="center">Reference du Projet</p></th>
                                                                            <th><p align="center">Nom du Fichier</p></th>
                                                                            <th><p align="center">Date de Signature</p></th>
                                                                            <th><p align="center">Date de Reception</p></th>
                                                                            <th><p align="center">Action</p></th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <?php
                                                                        if($projet_finder=="")
                                                                            $query  = "SELECT * from pj_negociation";
                                                                        else
                                                                            $query  = "SELECT * from pj_negociation WHERE ref_projet='$projet_finder'";
                                                                        $q = $conn->query($query);
                                                                        $comp = 0;

                                                                        while($data = $q->fetch_assoc()){
                                                                            $comp+=1;
                                                                            echo '<tr>';
                                                                            echo '<td>';
                                                                            echo $data['ref_projet'];
                                                                            echo '</td>';
                                                                            echo '<td>';
                                                                            echo $data['nom_pj'];
                                                                            echo '</td>';
                                                                            echo '<td>';
                                                                            echo date("d-m-Y",strtotime($data['date_signature']));
                                                                            echo '</td>';
                                                                            echo '<td>';
                                                                            echo date("d-m-Y",strtotime($data['date_reception']));
                                                                            echo '</td>';
                                                                            echo '<td>';
                                                                            echo '<a  class="btn btn-primary" target="_blank" href="'.$data['lien'].'" > <i class="fa fa-eye"></></a>';
                                                                            echo '</td>';
                                                                            echo '</tr>';

                                                                        }
                                                                        ?>
                                                                        </tbody>
                                                                        <tfoot>
                                                                        <tr class="bg-primary">

                                                                            <th><p align="center">Reference du Projet</p></th>
                                                                            <th><p align="center">Nom du Fichier</p></th>
                                                                            <th><p align="center">Date de Signature</p></th>
                                                                            <th><p align="center">Date de Reception</p></th>
                                                                            <th><p align="center">Action</p></th>
                                                                        </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--                End Negociation-->
                                    <hr/>
                                    <!--                Contrat Signé-->
                                    <div class="col-md-12">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h5 class="panel-title">
                                                    <i class="fas fa-folder"></i>
                                                    <?php
                                                    if($projet_finder == ""){
                                                        echo '<a href="#">CONTRAT SIGNÉ ('.$total_pj_contrat_signe.')</a>';

                                                        $name_find_projet = '';

                                                    }else{

                                                        $name_find_projet = 'Projet Reference : '.$projet_finder;
                                                        $query  = "SELECT count(id_pj) as total from pj_contrat_signe WHERE ref_projet='$projet_finder'";
                                                        $q = $conn->query($query);
                                                        while($row = $q->fetch_assoc())
                                                        {
                                                            $total_pj_contrat_sign = $row["total"];
                                                        }

                                                        echo '<a href="#">CONTRAT SIGNE '.$name_find_projet.' : ('.$total_pj_contrat_sign.')</a>';
                                                    }
                                                    ?>
                                                </h5>
                                            </div>
                                            <div class="panel-body">
                                                <div class="main-box">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="row">
                                                                <div class="table-responsive" >
                                                                    <?php
                                                                    if($total_pj_contrat_signe != 0){
                                                                        ?>
                                                                        <table class="table table-bordered table-hover table-condensed">
                                                                            <thead>
                                                                            <tr class="bg-primary">
                                                                                <th><p align="center">Reference du Projet</p></th>
                                                                                <th><p align="center">Nom du Fichier</p></th>
                                                                                <th><p align="center">Date de Signature</p></th>
                                                                                <th><p align="center">Date de Reception</p></th>
                                                                                <th><p align="center">Action</p></th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            <?php
                                                                            if($projet_finder=="")
                                                                                $query  = "SELECT * from pj_contrat_signe";
                                                                            else
                                                                                $query  = "SELECT * from pj_contrat_signe WHERE ref_projet='$projet_finder'";
                                                                            $q = $conn->query($query);
                                                                            $comp = 0;

                                                                            while($data = $q->fetch_assoc()){
                                                                                $comp+=1;
                                                                                echo '<tr>';
                                                                                echo '<td>';
                                                                                echo $data['ref_projet'];
                                                                                echo '</td>';
                                                                                echo '<td>';
                                                                                echo $data['nom_pj'];
                                                                                echo '</td>';
                                                                                echo '<td>';
                                                                                echo date("d-m-Y",strtotime($data['date_signature']));
                                                                                echo '</td>';
                                                                                echo '<td>';
                                                                                echo date("d-m-Y",strtotime($data['date_reception']));
                                                                                echo '</td>';
                                                                                echo '<td>';
                                                                                echo '<a  class="btn btn-primary" target="_blank" href="'.$data['lien'].'" > <i class="fa fa-eye"></></a>';
                                                                                echo '</td>';
                                                                                echo '</tr>';

                                                                            }
                                                                            ?>
                                                                            </tbody>
                                                                            <tfoot>
                                                                            <tr class="bg-primary">

                                                                                <th><p align="center">Reference du Projet</p></th>
                                                                                <th><p align="center">Nom du Fichier</p></th>
                                                                                <th><p align="center">Date de Signature</p></th>
                                                                                <th><p align="center">Date de Reception</p></th>
                                                                                <th><p align="center">Action</p></th>
                                                                            </tr>
                                                                            </tfoot>
                                                                        </table>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--                End Contrat Signé-->
                                    <!--                End Panel-->
                                    <!--            Fin dossier projets -->
                                </div>
<!--Contrats-->
                                <div class="tab-pane container fade" id="menu1">
                                    <!--        Dossier Contrats-->
                                    <h3>Dossier contrats</h3>
                                    <p>Fichiers contrats</p>

                                    <div class="row mb-3" style="padding: 20px">

                                        <div class="table-responsive">
                                            <form action="#" method="post">
                                                <table class="table table-hover table-condensed">
                                                    <tr>
                                                        <td>
                                                            <select name="target_contrat" style="width:75%">
                                                                <option value="">Selectionner un contrat pour affiner les recherches</option>
                                                                <?php
                                                                $query  = "SELECT * from contrats";
                                                                $q = $conn->query($query);
                                                                $comp = 0;

                                                                while($data = $q->fetch_assoc()){
                                                                    ?>
                                                                    <option value="<?= $data['ref_contrat'];?>"><?= $data['nom_projet'];?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                            <span>
                                                                <input type="submit" name="submit_contrat" class="btn btn-primary" value="Go" />
                                                            </span>
                                                            <span>
                                                                <input type="submit" name="reset_contrat" class="btn btn-outline-warning" value="Reset" />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h5 class="panel-title">
                                                    <i class="fas fa-folder"></i>
                                                    <?php
                                                    if($contrat_finder == ""){
                                                        echo '<a href="#">Fichiers ('.$total_pj_contrats.')</a>';

                                                        $name_find_contrat = '';

                                                    }else{

                                                        $name_find_contrat = 'Contrat Reference : '.$contrat_finder;
                                                        $query  = "SELECT count(id_pj) as total from pj_contrats WHERE ref_contrat='$contrat_finder'";
                                                        $q = $conn->query($query);
                                                        while($row = $q->fetch_assoc())
                                                        {
                                                            $total_pj_contrat = $row["total"];
                                                        }

                                                        echo '<a href="#">Fichiers '.$name_find_contrat.' : ('.$total_pj_contrat.')</a>';
                                                    }
                                                    ?>
                                                </h5>

                                            </div>
                                            <div class="panel-body">
                                                <div class="main-box">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="row">
                                                                <div class="table-responsive" >
                                                                    <?php
                                                                    if($total_pj_contrats != 0){
                                                                    ?>
                                                                    <table class="table table-bordered table-hover table-condensed">
                                                                        <thead>
                                                                        <tr class="bg-primary">
                                                                            <th><p align="center">Reference du Contrat</p></th>
                                                                            <th><p align="center">Nom du Fichier</p></th>
                                                                            <th><p align="center">Action</p></th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <?php
                                                                        if($contrat_finder=="")
                                                                            $query  = "SELECT * from pj_contrats";
                                                                        else
                                                                            $query  = "SELECT * from pj_contrats WHERE ref_contrat='$contrat_finder'";
                                                                        $q = $conn->query($query);
                                                                        $comp = 0;

                                                                        while($data = $q->fetch_assoc()){
                                                                            $comp+=1;
                                                                            echo '<tr>';
                                                                            echo '<td>';
                                                                            echo $data['ref_contrat'];
                                                                            echo '</td>';
                                                                            echo '<td>';
                                                                            echo $data['nom_pj'];
                                                                            echo '</td>';
                                                                            echo '<td>';
                                                                            echo '<a  class="btn btn-primary" target="_blank" href="'.$data['lien'].'" > <i class="fa fa-eye"></></a>';
                                                                            echo '</td>';
                                                                            echo '</tr>';

                                                                        }
                                                                        ?>
                                                                        </tbody>
                                                                        <tfoot>
                                                                        <tr class="bg-primary">

                                                                            <th><p align="center">Reference du Contrat</p></th>
                                                                            <th><p align="center">Nom du Fichier</p></th>
                                                                            <th><p align="center">Action</p></th>
                                                                        </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--            End Dossier contrats-->
                                </div>
<!--                                    Courrier-->
                                <div class="tab-pane container fade" id="menu2">
                                    <!--Panel Courriers-->
                                    <h3>Dossier courriers</h3>
                                    <p>Fichiers Courrier.</p>

                                    <div class="row mb-3" style="padding: 20px">

                                        <div class="table-responsive">
                                            <form action="#" method="post">
                                                <table class="table table-hover table-condensed">
                                                    <tr>
                                                        <td>
                                                            <select name="target_courrier" style="width:75%">
                                                                <option value="">Selectionner un courrier pour affiner les recherches</option>
                                                                <?php
                                                                $query  = "SELECT * from courriers";
                                                                $q = $conn->query($query);
                                                                $comp = 0;

                                                                while($data = $q->fetch_assoc()){
                                                                    ?>
                                                                    <option value="<?= $data['reference'];?>"><?= $data['objet'];?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                            <span>
                                                                <input type="submit" name="submit_courrier" class="btn btn-primary" value="Go" />
                                                            </span>
                                                            <span>
                                                                <input type="submit" name="reset_courrier" class="btn btn-outline-warning" value="Reset" />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h5 class="panel-title">
                                                    <i class="fas fa-folder"></i>
                                                    <?php
                                                    if($courrier_finder == ""){
                                                        echo '<a href="#">Fichiers ('.$total_pj_courriers.')</a>';

                                                        $name_find = '';

                                                    }else{

                                                        $name_find = 'Courrier Reference : '.$courrier_finder;
                                                        $query  = "SELECT count(id_pj) as total from pj_courriers WHERE ref_courrier='$courrier_finder'";
                                                        $q = $conn->query($query);
                                                        while($row = $q->fetch_assoc())
                                                        {
                                                            $total_pj_courrier = $row["total"];
                                                        }

                                                        echo '<a href="#">Fichiers '.$name_find.' : ('.$total_pj_courrier.')</a>';
                                                    }
                                                    ?>
                                                </h5>

                                            </div>
                                            <div class="panel-body">
                                                <div class="main-box">

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="row">
                                                                <div class="table-responsive" >
                                                                    <?php
                                                                    if($total_pj_courriers != 0){
                                                                    ?>
                                                                    <table class="table table-bordered table-hover table-condensed">
                                                                        <thead>
                                                                        <tr class="bg-primary">
                                                                            <th><p align="center">Reference du Courrier</p></th>
                                                                            <th><p align="center">Nom du Fichier</p></th>
                                                                            <th><p align="center">Action</p></th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <?php
                                                                        if($courrier_finder=="")
                                                                            $query  = "SELECT * from pj_courriers";
                                                                        else
                                                                            $query  = "SELECT * from pj_courriers WHERE ref_courrier='$courrier_finder'";
                                                                        $q = $conn->query($query);
                                                                        $comp = 0;

                                                                        while($data = $q->fetch_assoc()){
                                                                            $comp+=1;
                                                                            echo '<tr>';
                                                                            echo '<td>';
                                                                            echo $data['ref_courrier'];
                                                                            echo '</td>';
                                                                            echo '<td>';
                                                                            echo $data['nom_pj'];
                                                                            echo '</td>';
                                                                            echo '<td>';
                                                                            echo '<a  class="btn btn-primary" target="_blank" href="'.$data['lien'].'" > <i class="fa fa-eye"></></a>';
                                                                            echo '</td>';
                                                                            echo '</tr>';

                                                                        }
                                                                        ?>
                                                                        </tbody>
                                                                        <tfoot>
                                                                        <tr class="bg-primary">
                                                                            <th><p align="center">Reference du Courrier</p></th>
                                                                            <th><p align="center">Nom du Fichier</p></th>
                                                                            <th><p align="center">Action</p></th>
                                                                        </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--            End Courrier-->
                                </div>
<!--                                    Autre-->
                                <div class="tab-pane container fade" id="menu3">
                                    <h3>
                                        Dossier Autres
                                    </h3>
                                    <p>Dans cet onglet, vous pourrez archirver d'autres fichiers et créer des repertoires</p>

                                    <div class="row mb-3" style="padding: 20px">
                                        <div class="table-responsive">
                                            <form action="#" method="post">
                                                <table class="table table-hover table-condensed">
                                                    <tr>
                                                        <td>
                                                            <select  name="target_autres" style="width:75%">
                                                                <option value="">Affiner les recherches</option>
                                                                <?php
                                                                $query  = "SELECT * from archives";
                                                                $q = $conn->query($query);
                                                                $comp = 0;

                                                                while($data = $q->fetch_assoc()){
                                                                    ?>
                                                                    <option value="<?= $data['nom_repertoire'];?>"><?= strtoupper($data['nom_repertoire']);?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                            <span>
                                                                    <input type="submit" name="submit_autres" class="btn btn-primary" value="Go" />
                                                                </span>
                                                            <span>
                                                                    <input type="submit" name="reset_autres" class="btn btn-outline-warning" value="Reset" />
                                                                </span>
                                                            <span>
                                                                <button type="button" data-toggle="modal" data-target="#ajouterRepertoire"  class="btn btn-outline-primary">
                                                                    Nouveau repertoire
                                                                </button>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="row mb-3" style="padding: 20px">
                                        <div class="table-responsive">
                                            <form action="add_file_to_folder.php" method="post" enctype="multipart/form-data">
                                                <label>
                                                    <i class="fas fa-file"></i>
                                                    Ajouter un fichier aux repertoires autres
                                                </label>
                                                <table class="table table-hover table-condensed">
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                <i class="fa fa-file-alt"></i>
                                                                Fichier
                                                            </label>
                                                            <div class="col">
                                                                <input id="fichier" type="file" name="fichier_other" style="width:80%"  required>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <label>
                                                                <i class="fas fa-folder"></i>
                                                                Repertoire
                                                            </label>
                                                            <div class="col">
                                                                <select name="add_other" style="width:75%" required>
                                                                    <option value="">Choisir Repertoire</option>
                                                                    <?php
                                                                    $query  = "SELECT * from archives";
                                                                    $q = $conn->query($query);
                                                                    $comp = 0;

                                                                    while($data = $q->fetch_assoc()){
                                                                        ?>
                                                                        <option value="<?= $data['nom_repertoire'];?>"><?= strtoupper($data['nom_repertoire']);?></option>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td style="width:10%">
                                                            <label>

                                                            </label>
                                                            <div class="col">
                                                                <span>
                                                                        <input type="submit" name="submit_add_other" class="btn btn-primary" value="Ajouter" />
                                                                    </span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h5 class="panel-title">
                                                    <i class="fas fa-folder"></i>
                                                    <?php
                                                    if($autres_finder == ""){
                                                        echo '<a href="#">Fichiers ('.$total_archives.')</a>';

                                                        $name_find = '';

                                                    }else{

                                                        $name_find = $autres_finder;
                                                        $query  = "SELECT count(id) as total from archives WHERE nom_repertoire='$autres_finder'";
                                                        $q = $conn->query($query);
                                                        while($row = $q->fetch_assoc())
                                                        {
                                                            $total_autres = $row["total"];
                                                        }

                                                        echo '<a href="#">Repertoire '.strtoupper($name_find).' : ('.$total_autres.')</a>';
                                                    }
                                                    ?>
                                                </h5>

                                            </div>
                                            <div class="panel-body">
                                                <div class="main-box">

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="row">
                                                                <div class="table-responsive" >
                                                                    <?php
                                                                    if($total_archives != 0){
                                                                        ?>
                                                                        <table class="table table-bordered table-hover table-condensed">
                                                                            <thead>
                                                                            <tr class="bg-primary">
                                                                                <th><p align="center">Repertoire</p></th>
                                                                                <th><p align="center">Nom du Fichier</p></th>
                                                                                <th><p align="center">Action</p></th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            <?php
                                                                            if($autres_finder==""){
                                                                                $query  = "SELECT nom_repertoire from archives";
                                                                                $q = $conn->query($query);
                                                                                while($row = $q->fetch_assoc())
                                                                                {
                                                                                    $nom_repertoire = $row["nom_repertoire"];

                                                                                    $query1  = "SELECT * from ".$nom_repertoire;

                                                                                    $q1 = $conn->query($query1);
                                                                                    while($row1 = $q1->fetch_assoc())
                                                                                    {
                                                                                        $comp+=1;
                                                                                        echo '<tr>';
                                                                                        echo '<td>';
                                                                                        echo $nom_repertoire;
                                                                                        echo '</td>';
                                                                                        echo '<td>';
                                                                                        echo $row1['nom_fichier'];
                                                                                        echo '</td>';
                                                                                        echo '<td>';
                                                                                        echo '<a  class="btn btn-primary" target="_blank" href="'.$row1['lien'].'" > <i class="fa fa-eye"></></a>';
                                                                                        echo '</td>';
                                                                                        echo '</tr>';
                                                                                    }
                                                                                }
                                                                            }else{
                                                                                $query1  = "SELECT * from ".$autres_finder;

                                                                                $q1 = $conn->query($query1);
                                                                                while($row1 = $q1->fetch_assoc())
                                                                                {
                                                                                    $comp+=1;
                                                                                    echo '<tr>';
                                                                                    echo '<td>';
                                                                                    echo $nom_repertoire;
                                                                                    echo '</td>';
                                                                                    echo '<td>';
                                                                                    echo $row1['nom_fichier'];
                                                                                    echo '</td>';
                                                                                    echo '<td>';
                                                                                    echo '<a  class="btn btn-primary" target="_blank" href="'.$row1['lien'].'" > <i class="fa fa-eye"></></a>';
                                                                                    echo '</td>';
                                                                                    echo '</tr>';
                                                                                }
                                                                            }
                                                                            ?>
                                                                            </tbody>
                                                                            <tfoot>
                                                                            <tr class="bg-primary">
                                                                                <th><p align="center">Repertoire</p></th>
                                                                                <th><p align="center">Nom du Fichier</p></th>
                                                                                <th><p align="center">Action</p></th>
                                                                            </tr>
                                                                            </tfoot>
                                                                        </table>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            END
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<!--        Nouveau repertoire -->

<div class="modal fade" id="ajouterRepertoire" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
                <h3 align="center"><b>Nouveau Repertoire</b></h3>
                <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <form class="form-horizontal" action="#" name="form" method="post">
                    <div class="form-group">
                        <label>Nom</label>
                        <div class="col-sm-12">
                            <input type="text" name="nom_repertoire" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label></label>
                        <div class="col-sm-8">
                            <input type="submit" name="submit_repertoire" class="btn btn-primary" value="Créer">
                            <input type="reset" name="" class="btn btn-outline-warning" value="Effacer Formulaire">
                        </div>
                    </div>
                    <div class="form-group">
                        <label><b>NB :</b> Ne pas mettre d'espace et d'accent dans le nom du repertoire sinon la création n'aura lieu !</label>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <!--Sweety alert -->
<?php
if (isset($_GET['witness'])){
    $witness = $_GET['witness'];

    switch ($witness){
        case '1';
            ?>
            <script>
                Swal.fire(
                    'Succès',
                    'Opération effectuée avec succès !',
                    'success'
                )
            </script>
            <?php
            break;
        case '-1';
            ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Une erreur s\'est produite !',
                    footer: 'Reéssayez encore'
                })
            </script>
            <?php
            break;

    }
}
?>

    <!--//Footer-->
<?php
include('foot.php');
?>
