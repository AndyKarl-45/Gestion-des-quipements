<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Liste des Quartiers</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme XXX, il est <?=date("G:i");?> en ce jour du <?=dateToFrench("now","l j F Y");?>.
                    </li>
                </ol>
                <!--                Main Body-->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card mb-4">
                            <form class="form-horizontal" action="save_quat.php" method="POST">
                                <div class="card-header">
                                    Formulaire 
                                </div>
                                <div class="card-body">
                                    <fieldset>
                                        <div class="table-responsive">
                                            <table class="table  table-hover table-condensed" id="myTable">
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <span class="help-block small-font" >VILLE</span>
                                                        <div class="col">
                                                                                <select name="id_ville" style="width:75%;
                                                                                border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                                    <option value="" selected="">...</option>
                                                                                    <?php

                                                $iResult = $db->query("SELECT * FROM ville where open_close!='1' ");

                                                                            while($data = $iResult->fetch()){

                                                                                $i = $data['id_ville'];
                                                                             echo '<option value ="'.$i.'">';
                                                                                echo $data['nom'];
                                                                                echo '</option>';
                                                        
                                                                            }
                                                    ?>

                                                                    
                                                                                </select>
                                                                        <button type="button" data-toggle="modal"   style="background-color: transparent"><a href="liste_ville.php"><i class="fas fa-plus"></i></a>
                                                                                
                                                                            </button>
                                                                                    </div>
                                                    </td>
                                                
                                                    <td>
                                                        <span class="help-block small-font" >NOM DU QUARTIER</span>
                                                        <div class="col">
                                                            <input name="nom_quat" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;"  required>
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

                <div class="row">
                    <div class="col-md-12">
                        <hr/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-scroll"></i>
                                <b>Liste des villes</b>
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
                                                            <th><p align="center">NOM DU QUARTIER</p></th>
                                                         <th><p align="center">VILLE</p></th>
                                                         <th><p align="center">Options</p></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php

                                                    $query = "SELECT * from quartier where open_close!='1' ";
                                                        $q = $db->query($query);
                                                        while($row = $q->fetch())
                                                        {
                                                            $id_quat = $row['id_quat'];
                                                            $nom = $row['nom'];
                                                            $id_ville = $row['id_ville'];

                                                     ?>
                                                     <tr>
                                                          <td align="center"><?php echo $nom; ?>  </td>       
                                                            <td align="center">
                                                                <?php

                                                                $sql = "SELECT DISTINCT * from ville where id_ville = '$id_ville'";

                                                                $stmt = $db->prepare($sql);
                                                                $stmt->execute();

                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                foreach($tables as $table)
                                                                {
                                                                    echo $table['nom'];
                                                                }

                                                                ?>
                                                            </td>
                                                             <td align="center"><a class="btn btn-danger" type="button" data-toggle="modal" data-target="#verifier_delete_quartier<?= $id_quat; ?>" title="supprimer"  style="background-color: transparent">
                                                                <i style="color: red" class="fas fa-trash"></i>
                                                        </a></td>
                                                                             <?php 
                        include("verifier_delete_quartier.php");
                            ?>
                                                        </tr>
                                            <?php } ?>
                                                    </tbody>
                                                        <tfoot>
                                                        <tr class="bg-primary">
                                                            <th><p align="center">NOM DU QUARTIER</p></th>
                                                         <th><p align="center">VILLE</p></th>
                                                         <th><p align="center">Options</p></th>
                                                        </tr>
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
        </main>
    </div>


    <!--//Footer-->
<?php
include('foot.php');
?>