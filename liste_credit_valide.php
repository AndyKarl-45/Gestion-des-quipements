 <?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');

?>

<!--Content-->

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Liste des credits à valider</h1>
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
                                <b>Historique des credits en cours...</b>
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
                                                            <th><p align="center">NOM</p></th>
                                                            <th><p align="center">NATURE</p></th>
                                                            <th><p align="center">MODALITE</p></th>
                                                            <th><p align="center">MONTANT</p></th>
                                                            <th><p align="center">MOTIF</p></th>
                                                            <th><p align="center">STATUT</p></th>

                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        <?php

                                                    $query = "SELECT * from credit where etat = 0";
                                                        $q = $db->query($query);
                                                        while($row = $q->fetch())
                                                        {
                                                            $id = $row['id_credit'];
                                                            $nom = $row['nom'];
                                                            $type_conger = $row['type_conger'];
                                                            $motif = $row['motif'];
                                                            $modalite = $row['modalite'];
                                                            $montant = $row['montant'];
                                                            

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
                                                                   
                                                            <td align="center"><?php echo $modalite; ?>  </td> 
                                                            <td align="center"><?php echo $montant; ?>  </td>
                                                            <td align="center"><?php echo $motif; ?>  </td>
                                                                     
                                                            <td align="center">
                                                                
                        
                                <ul class="nav nav-pills">
                                     &nbsp &nbsp &nbsp &nbsp<li class="nav-item" >
                                        <a class="nav-link active" href="modifier_credit.php?id=<?php echo $id; ?>">
                                            <i class="fas fa-pen"></i> </a>
                                    </li>                                    
                                </ul>
                            
                        
                             </td>         
                                                            </tr>
                                                <?php } ?>  
                                                            </tbody>
                                                        <tfoot>
                                                            <tr class="bg-primary">
                                                            <th><p align="center">NOM</p></th>
                                                            <th><p align="center">NATURE</p></th>
                                                            <th><p align="center">MODALITE</p></th>
                                                            <th><p align="center">MONTANT</p></th>
                                                             <th><p align="center">MOTIF</p></th>
                                                            <th><p align="center">STATUT</p></th>
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






    <!--//Footer-->
<?php
include('foot.php');
?>