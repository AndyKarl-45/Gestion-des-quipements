 <?php

include('first.php');
include('php/main_side_navbar.php');

?>

<!--Content-->

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Liste des Credits</h1>
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
                                <b>Historique des credits Terminés</b>
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
                                                            <th><p align="center">DATE DEBUT</p></th>
                                                            <th><p align="center">MODALITE</p></th>
                                                            <th><p align="center">MONTANT</p></th>
                                                             <th><p align="center">MOTIF</p></th>
                                                             <th><p align="center">OBSERVATION</p></th>
                                                            <th><p align="center">STATUT</p></th>

                                                        </tr>
                                                        </thead>

<tbody>

                                                        <?php

                                                    $query = "SELECT * from credit where etat = 1 or etat = 2 or etat= 3";
                                                        $q = $db->query($query);
                                                        while($row = $q->fetch())
                                                        {
                                                            $id = $row['id_credit'];
                                                            $nom = $row['nom'];
                                                            $type_conger = $row['type_conger'];
                                                            $start_time = $row['start_time'];
                                                            $modalite = $row['modalite'];
                                                            $montant = $row['montant'];
                                                            $etat = $row['etat'];
                                                            $motif = $row['motif'];
                                                            $observation = $row['observation'];
                                                            

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
                                                            <td align="center"><?php echo $start_time; ?> </td>       
                                                            <td align="center"><?php echo $modalite; ?> </td> 
                                                            <td align="center"><?php echo $montant; ?>  </td>
                                                            <td align="center"><?php echo $motif; ?>  </td>
                                                            <td align="center"><?php echo $observation; ?>  </td>             
                                                    <td align="center">
                                                        

                                                <?php 
                                                            if($etat==1){
                                                            echo'<button  style=" width:120px;"    class="btn btn-primary" >Approuver
                                                            </button>'; 
                                                            }elseif( $etat ==2) {
                                                                echo'<button  style=" width:120px;"  class="btn btn-danger" >Refuser
                                                            
                                                            </button>';
                                                            }else{
                                                                 echo'<a href="modifier_credit_attente.php?id='.$id.'" style=" width:120px;"    class="btn btn-warning" >En attente
                                                            
                                                            </a>';

                                                            }

                                                            
                                                          ?></button>
                                </td>         
                                                            </tr>
                                                <?php } ?>  
                                                            </tbody>

                                                        <tfoot>
                                                            <tr class="bg-primary">
                                                            <th><p align="center">NOM</p></th>
                                                            <th><p align="center">NATURE</p></th>
                                                            <th><p align="center">DATE DEBUT</p></th>
                                                            <th><p align="center">MODALITE</p></th>
                                                            <th><p align="center">MONTANT</p></th>
                                                            <th><p align="center">MOTIF</p></th>
                                                            <th><p align="center">OBSERVATION</p></th>
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