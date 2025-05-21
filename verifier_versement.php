
        <!--    Modal pour ajouter Categorie Contrat-->
<div class="modal fade" id="verifier_versement" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
                <h3 align="center"><i class="fas fa-user"></i>  <b>IDENTIFACTION</b></h3>
                <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <form class="form-horizontal" action="delete_salle.php" name="form" method="post">
                    <div class="form-group">
                        <label>Entrer votre mot de passe:</label>
                        <div class="col-sm-12">
                            <input type="hidden" name="id" value="" class="form-control">
                            <input type="password" name="id"  class="form-control">
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