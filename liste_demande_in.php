<?php

include('first.php');
include('php/main_side_navbar.php');

?>

<!--Content-->

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Liste des demandes d'interventions</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">
                    Hello M/Mme, il est <?=date("G:i");?> en ce jour du <?=dateToFrench("now","l j F Y");?>.
                </li>
            </ol>
            <!--                Main Body-->
                            <div class="row">
                    <div class="col-xl-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-scroll"></i>
                                <b>L'ensemble des demandes.</b>
                                <b> 
                                
                                <!-- Nav pills -->
                                <?php if ($lvl == 5 || $lvl == 6 || $lvl == 3 || $lvl == 7 || $lvl == 8 || $lvl == 0){ ?>
                                <ul class="nav nav-pills"   style="float: right;">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="nouvelle_demande_in.php">
                                            <i class="fas fa-cubes"></i>
                                            Nouvelle demande
                                        </a>
                                    </li>                                    
                                </ul>
                                <ul class="nav nav-pills"   style="float: right; margin-right: 20px ;">
                                    <li class="nav-item">
                                        <a class="nav-link" href="liste_demande_in_suite.php">
                                           
                                            <?php
                                                         $query = "SELECT DISTINCT count(id_ask_inter) as total from demande_inter where statut=0 and id_salles!=0  ";

                                                        $q = $db->query($query);
                                                        while($row = $q->fetch())
                                                        {
                                                            echo ' Demande en cours ['.$row['total'].']';
                                                            
                                                        }

                                                            ?>
                                           
                                        </a>
                                    </li>                                   
                                </ul>
                                <?php } ?>
                            </b>
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
                                                            <th><p align="center">Salles </p></th>
                                                            <th><p align="center">Date de demande</p></th>
                                                            <th><p align="center">Date de validation</p></th>
                                                            <th><p align="center">Objet<br/> Etirez le bloc de text (l'arrêt de droite-bas)!!!</p></th>
                                                            <th><p align="center">Statut</p></th>


                                                        </tr>
                                                        </thead>

                                                         <tbody>
                                                    <?php

                                                        if ($lvl == 7)
                                                            $query = "SELECT * from demande_inter WHERE (statut=1 and id_salles = (SELECT id_salles FROM salles WHERE secteur = $num_secteur_user)) or (statut=-1 and id_salles = (SELECT id_salles FROM salles WHERE secteur = $num_secteur_user)) ";
                                                        if($lvl == 3)
                                                            $query = "SELECT * from demande_inter WHERE (statut=1 and id_salles = $id_salle_user) or (statut=-1 and id_salles = $id_salle_user)  ";
                                                        else
                                                            $query = "SELECT * FROM `demande_inter` WHERE (statut=1 and id_salles!=0) or (statut=-1 and id_salles!=0) ";

                                                        $q = $db->query($query);
                                                        while($row = $q->fetch())
                                                        {   
                                                            $id_ask_inter = $row['id_ask_inter'];
                                                            $id_salles = $row['id_salles'];
                                                            $nom_salle = $row['nom_salle'];
                                                            $date_debut = $row['date_debut'];
                                                            $date_valide = $row['date_valide'];
                                                            $heure = $row['heure'];
                                                            $nature = $row['nature'];
                                                            $statut = $row['statut'];


                                                            ?>

                                                            <tr>
                                                               
                                                            <td align="center"><?php echo $nom_salle; ?>   </td>
                                                            <td align="center"><?php echo $date_debut; ?>  </td>
                                                            <td align="center"><?php if($date_valide=='N/A'){echo 'N/A';}else{echo $date_valide; echo ' ('.$heure.')';} ?></td>
                                                            
                                                           <td align="center"><textarea rows="4" cols="60" style="inline-block"title="vous pouvez étirez le bloc de text (l'arrêt de droite-bas)!!!" disabled><?php echo $nature; ?></textarea></td>
                                                                <td align="center" style="width:10%"> <?php 
                                                                if($lvl == 5 || $lvl == 6 || $lvl == 3 || $lvl == 7 || $lvl == 8 || $lvl == 0){
                            if($statut==0 && $lvl != 8 && $lvl != 0){
                                echo' <a class="btn btn-primary" href="refuser_demande_in.php?ids='.$id_ask_inter.'">
                                <i class="fa fa-trash"></i></a>||<a class="btn btn-primary" href="valider_demande_in.php?ids='.$id_ask_inter.'"><i class="fa fa-check"></i></a>';

                            }elseif($statut==1){
                                echo'<a class="btn btn-success" href="#"><i class="fa fa-handshake"></i></a>';
                            }elseif($statut==-1){
                                 echo'<a class="btn btn-danger" href="#"><i class="fas fa-handshake-slash"></i></a>';
                            }else{
                                echo'En cours de traitement...';
                            }    
                                                                }
                   
                        
              

                ?>  </td>

                        

                                                              
                                                            </tr>

         <?php } ?>
                                                    </tbody>

                                                        <tfoot>
                                                            <tr class="bg-primary">
                                                            <th><p align="center">Salles </p></th>
                                                             <th><p align="center">Date de demande</p></th>
                                                            <th><p align="center">Date de validation</p></th>
                                                            <th><p align="center">Objet</p></th>
                                                            <th><p align="center">Statut</p></th>
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
            <div class="row">
                <div class="col-md-12">
                    <hr/>
                </div>
            </div>

        </div>
    </main>
</div>
<?php
if (isset($_GET['witness'])){
    $witness = $_GET['witness'];

    switch ($witness){
        case '1';
            ?>
            <script>
                Swal.fire(
                    'Succès',
                    'Demande effectuée avec succès !',
                    'success'
                )
            </script>
            <?php
            break;
        case '-1';
            ?>
            <script>
                Swal.fire(
                    'Succès',
                    'Demande  refusée !',
                    'success'
                )
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