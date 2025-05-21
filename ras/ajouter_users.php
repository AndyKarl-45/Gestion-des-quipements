
        <!--    Modal pour ajouter Categorie Contrat-->
<div class="modal fade" id="ajouterUser" role="dialog">
    <div class="modal-dialog" >
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
                <h3 align="center"><i class="fas fa-users"></i>  <b>Nouveau Utilisateur</b></h3>
                <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
            </div>
            <div class="modal-body" >
                <form class="form-horizontal" action="#" name="form" method="post">
                     <div class="row">
                                        <div class="col-xl-12">
                                            <div class="card mb-4">
                                                <form class="form-horizontal" action="save_salle.php" method="POST">
                                                    <div class="card-header">

                                                    </div>
                                                    <div class="card-body">
                                                        <fieldset>
                                                            <div class="table-responsive">
                                                                <table  border="0" class="table  table-hover table-condensed" id="myTable">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <span class="help-block small-font" >NOM DU PERSONNEL:</span>

                                                                            <div class="col">
                                                                                <select name="id_personnel" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                                    <option value="" selected="">...</option>
                                                               

                                                                                </select>                                                                            <button type="button" data-toggle="modal" data-target="#ajouterSecteur"  style="background-color: transparent">
                                                                                <i class="fas fa-plus"></i>
                                                                            </button>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                        <span class="help-block small-font" >GRADE:</span>
                                                                            <div class="col">
                                                                                <select name="grade" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                                    <option value="" selected="">...</option>
                                                                                </select>                                                                            <button type="button" data-toggle="modal" data-target="#ajouterGrade"  style="background-color: transparent">
                                                                                <i class="fas fa-plus"></i>
                                                                            </button>
                                                                            </div> 
                                                                        </td>
                                                                        
                                                                    </tr>
                                                                    <tr>

                                                                        <td>
                                                                            <span class="help-block small-font" >PSEUDO:</span>
                                                                            <div class="col">
                                                                                <input style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="nom" required>
                                                                            </div>
                                                                        </td>
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                        <span class="help-block small-font" >PASSWORD:</span>
                                                                            <div class="col">
                                                                                <input type="password" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="pwd" required>
                                                                            </div> 
                                                                        </td>
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                        <span class="help-block small-font" >PASSWORD:</span>
                                                                            <div class="col">
                                                                                <input type="password" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                " name="pwd" required>
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

                                            </div>
                                        </div>
                                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <center>
                            <input type="submit" style=" width:25% " name="submit_cs" class="btn btn-primary" value="Créer">
                            
                            <a href="liste_users.php"><input type="text" style=" width:25% " name="" class="btn btn-danger" value="Annuler"/></a></center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>