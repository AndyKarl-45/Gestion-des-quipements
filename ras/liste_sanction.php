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
            <h1 class="mt-4">Liste des Sanctions</h1>
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
                                <b>L'ensemble des sanctions de campresj.</b>
                                <b> 
                                
                                <!-- Nav pills -->
                                <ul class="nav nav-pills"   style="float: right;">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="<?=$sanction['option1_link']?>">
                                            <i class="fas fa-cubes"></i>
                                            Nouvelle Sanction
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
                                                        <th><p align="center">PERSONNEL</p></th>
                                                        <th><p align="center">NATURE</p></th>
                                                        <th><p align="center">MONTANT</p></th>
                                                        <th><p align="center">MOTIF</p></th>
                                                        <th><p align="center">DATE</p></th>
                                                        <th><p align="center">Options</p></th>
                                                        </tr>
                                                        </thead>
<?php

                                                        $query = "SELECT * from sanction order by id_sanction desc"; 
                                                        $q = $db->query($query);
                                                        while($row = $q->fetch())
                                                        {   
                                                            $id_sanction = $row['id_sanction'];
                                                            $id_personnel = $row['id_personnel'];
                                                            $nature = $row['nature'];
                                                            $motif = $row['motif'];
                                                            $date = date("d-m-Y",strtotime($row['date_sanction']));
                                                           // $date = dateToFrench("$date","l j F Y");
                                                            $montant = $row['montant'];

 ?>
 <tr>
                                                                
                                                            <td align="center"> <?php

                                                                $sql = "SELECT DISTINCT * from personnel where id_personnel = '$id_personnel'";

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
                <td align="center">
                    <div class="btn-group mr-2" role="group" aria-label="First group">
                         <a class="nav-link active" href="modifier_sanction.php?id=<?=$id_sanction?>" title="Modifier">
                                <i class="fas fa-pen"></i> 
                            </a>
                       </div>
                     <div class="btn-group mr-2" role="group" aria-label="Second group">
                             <a class="nav-link active" type="button" data-toggle="modal" data-target="#verifier_delete_sanction<?= $id_sanction; ?>"  style="background-color: transparent">
                                  <i class="fas fa-trash"></i>
                            </a>
                        </div> 
                       
                    <?php 
                        include("verifier_delete_sanction.php");
                            ?>
                                    
                            
                        
                 </td>                                            
                                                            </tr>
                                                            <?php } ?>



                                                        <tfoot>
                                                            <tr class="bg-primary">
                                                        <th><p align="center">PERSONNEL</p></th>
                                                        <th><p align="center">NATURE</p></th>
                                                        <th><p align="center">MONTANT</p></th>
                                                        <th><p align="center">MOTIF</p></th>
                                                        <th><p align="center">DATE</p></th>
                                                        <th><p align="center">Options</p></th>
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

    }
}
?>






    <!--//Footer-->
<?php
include('foot.php');
?>