<?php

include('first.php');
 include("php/db.php");
include('php/navbar_links.php');
include('php/main_side_navbar.php');

?>

<!--Content-->

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Liste des Litiges</h1>
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
                                <i class="fas fa-scroll"></i>
                                <b>L'ensemble des litiges de campresj.</b>
                                <b> 
                                
                                <!-- Nav pills -->
                                <ul class="nav nav-pills"   style="float: right;">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="<?=$litige['option1_link']?>">
                                            <i class="fas fa-cubes"></i>
                                            Nouveau litige
                                        </a>
                                    </li>                                    
                                </ul>
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
                                                            <th><p align="center">NOM </p></th>
                                                            <th><p align="center">DATE DU LITIGE</p></th>
                                                            <th><p align="center"> NATURE</p></th>
                                                            <th><p align="center">MOTIFS</p></th>
                                                            <th><p align="center">OPTIONS</p></th>

                                                        </tr>
                                                        </thead>

                                                         <tbody>
                                                    <?php

                                                        $query = "SELECT * from litige ";
                                                        $q = $db->query($query);
                                                        while($row = $q->fetch())
                                                        {   
                                                            $id_litige = $row['id_litige'];
                                                            $id_personnel = $row['id_personnel'];
                                                            $date_litige = $row['date_litige'];
                                                            $motif = $row['motif'];
                                                            $nature = $row['nature'];


                                                            ?>

                                                            <tr>
                                                                <input name="id_litige" type="hidden" value="<?php echo $row['id_litige'];?>" />
                                                            <td align="center"><?php

                                                                $sql = "SELECT DISTINCT * from personnel where id_personnel = '$id_personnel'";

                                                                $stmt = $db->prepare($sql);
                                                                $stmt->execute();

                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                foreach($tables as $table)
                                                                {
                                                                    echo $table['nom'].' '.$table['prenom'];
                                                                }

                                                                ?>  </td>
                                                            <td align="center"><?php echo $date_litige; ?>   </td>
                                                            <td align="center">

                                                    <?php 
                                                            

                                        switch ($nature){
                                                case '1';
                                                         echo'<button  style=" width:140px;"    class="btn btn-primary" >Reconduition
                                                                </button>';  
                                                    break;
                                                case '2';
                                                        echo'<button  style=" width:140px;"  class="btn btn-dark" >Blacklist
                                                                                                    
                                                            </button>';
                                                    break;
                                                case '3';
                                                         echo'<a href="modifier_litige.php?id='.$id_litige.'" style=" width:140px;"    class="btn btn-warning" >Observation</a>';
                                                    break;
                                                case '4';
                                                       echo'<button  style=" width:140px;"    class="btn btn-danger" >Elimination
                                                            </button>';
                                                    break;
                                                case '5';
                                                        echo'<button  style=" width:140px;"    class="btn btn-info" >Rétrogradation
                                                            </button>';
                                                    break;

                                            }
                                                            
                                                          ?>  </td>
                                                          <td align="center"><?php echo $motif; ?>   </td>
                                                            
                                                            

                        <td align="center">
                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                <a class="btn btn-warning" href="modifier_litige.php?id=<?=$id_litige?>" title="Modifier"
                            style="background-color: transparent">
                                <i style="color: orange" class="fas fa-pen"></i> 
                            </a>
                               </div>
                             <div class="btn-group mr-2" role="group" aria-label="Second group">
                                    <a class="btn btn-danger" type="button" data-toggle="modal" data-target="#verifier_delete_litige<?= $id_litige; ?>" title="supprimer"  style="background-color: transparent">
                                  <i style="color: red" class="fas fa-trash"></i>
                            </a>
                                </div>  
                               
                            <?php 
                                 include("verifier_delete_litige.php");
                                    ?>
                        </td>  

                                                              
                                                            </tr>

         <?php } ?>
                                                    </tbody>

                                                        <tfoot>
                                                            <tr class="bg-primary">
                                                            <th><p align="center">NOM </p></th>
                                                            <th><p align="center">DATE DU LITIGE</p></th>
                                                            <th><p align="center"> NATURE  </p></th>
                                                            <th><p align="center">MOTIFS</p></th>
                                                            <th><p align="center">OPTIONS</p></th>
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
                    icon: 'Erreur',
                    title: 'Oops...',
                    text: 'Une erreur s\'est produite !',
                    footer: 'Reéssayez encore'
                })
            </script>
            <?php
            break;
        case '-2';
            ?>
            <script>
                Swal.fire({
                    icon: 'Erreur',
                    title: 'Oops...',
                    text: 'Vous avez choisi un postulant et un employé !',
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