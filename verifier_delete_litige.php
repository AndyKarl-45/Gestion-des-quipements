
        <!--    Modal pour ajouter Categorie Contrat-->
<div class="modal fade" id="verifier_delete_litige<?= $id_litige; ?>" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
                <h3 align="center"><i class="fas fa-alert"></i>  <b>Warning</b></h3>
                <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <form class="form-horizontal" action="delete_litige.php" name="form" method="post">
                    <div class="form-group">
                        <label>Vous êtes sur de vouloir supprimer le litige: 
                        </br><b style="color :red">Nom:    
                            <?php

                                                                $sql = "SELECT DISTINCT * from personnel where id_personnel = '$id_personnel'";

                                                                $stmt = $db->prepare($sql);
                                                                $stmt->execute();

                                                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                                foreach($tables as $table)
                                                                {
                                                                    echo $table['nom'].' '.$table['prenom'];
                                                                }

                                                                ?>   
                    </br>Nature: <?php
                    switch ($nature){
        case '1';
                  echo 'Reconduition';  
            break;
        case '2';
                 echo 'Blacklist';
            break;
        case '3';
                echo 'Observation';
            break;
        case '4';
                echo 'Elimination';
            break;
        case '5';
                echo 'Rétrogradation';
            break;

    }


                     ?></b></label>
                        <div class="col-sm-12">
                            <input type="hidden" name="id_litige" value="<?= $id_litige; ?>" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <center>
                            <input type="submit" style=" width:25% " name="submit_cs" class="btn btn-primary" value="Ok">
                            
                            <input type="reset" data-dismiss="modal" style=" width:25% "  class="btn btn-danger" value="Annuler"/>
                        </center>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>