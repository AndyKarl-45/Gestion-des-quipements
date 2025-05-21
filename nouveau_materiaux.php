<?php

include('first.php');
include('php/db.php');
include('php/main_side_navbar.php');
$year=date('Y');

// $req = $db->query("SELECT COUNT(id_materiel) AS total FROM materiel where open_close!='1' LIMIT 1");

//         $row = $req->fetch(PDO::FETCH_ASSOC);
//         $id_entite = $row['total'] + 1;
//         $ref_materiel = 'E_'.$year.'_'.$id_entite;

?>

<!--Content-->

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Nouveau Equipement</h1>
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
                            <b>
                                <!-- Nav pills -->
                                <ul class="nav nav-pills">

                                </ul>
                            </b>
                        </div>

                        <div class="card-body">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!-- Etat Civile-->
                                <div class="tab-pane container active" id="home">
                                    <!-- infos civile-->



                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="card mb-4">
                                                <form class="form-horizontal" action="save_materiaux.php" method="POST">
                                                    <div class="card-header">

                                                    </div>
                                                    <div class="card-body">
                                                        <fieldset>
                                                            <div class="table-responsive">
                                                                <table  border="0" class="table  table-hover table-condensed" width="100%" cellspacing="0" id="myTable">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td style="width: 50%">
                                                                            
                                                                            <span class="help-block small-font" >NUMÉRO DE SÉRIE:</span>
                                                                            <div class="col">
                                                                                <input  style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="ref_materiel" >
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <span class="help-block small-font" >DESIGNATION:</span>
                                                                     <div class="col">
                                                                                <input  style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="designation" required>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                         <td>
                                                                            <span class="help-block small-font" >QUANTITÉ(S):</span>
                                                                            <div class="col">
                                                                                <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="quantite" required="">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                        <span class="help-block small-font" >CATEGORIE MATÉRIAUX:</span>
                                                            <div class="col">
                                                                <select name="id_cat_materiel" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" required>
                                                                                    <option value="0" selected="">...</option>
                                                                                    <?php

                                                                                         $iResult = $db->query("SELECT * FROM categorie_materiel  where open_close!='1' ");

                                                                                            while($data = $iResult->fetch()){

                                                                                                $i = $data['id_cat_materiel'];
                                                                                                echo '<option value ="'.$i.'">';
                                                                                                echo $data['nom'];
                                                                                                echo '</option>';
                                                            
                                                                                                     }
                                                                                     ?>               
                                                                             </select>                                                                 <button type="button"   style="background-color: transparent; border-radius: 20px; border-color: black; border-bottom-color: yellow; border-top-color: red;
                                                                    border-right-color: blue;
                                                                    border-left-color: orange;">
                                                                    <a href="liste_cat_materiel.php"><i class="fas fa-plus"></i></a>
                                                                    </button>


                                                                            </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <span class="help-block small-font" >PRIX UNITAIRE:</span>
                                                                            <div class="col">
                                                                                <input type="number" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;
                                                                                border-color: gray" name="prix_unitaire" value="0" required>
                                                                            </button> 
                                                                            </div>
                                                                    </td> 
                                                                    <td>
                                                                        <span class="help-block small-font" >Magasins:</span>
                                                            <div class="col">
                                                                <input type="hidden" style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" name="mag" value="C" >
                                                                <input  style="width:75%;border-top: 0; border-left: 0;
                                                                                border-right: 0;
                                                                                background: transparent;" value="Magasin centrale" disabled="">
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
                                                                                        
                                                      <center> <button type="submit" style=" width:150px;"  name="submit_salle"  class="btn btn-primary" >Enregistrer</button>
                                    
                                                        <a href="liste_materiaux.php" style=" width:150px;" class="btn btn-primary" ><font>Annuler</font></a>
                                                        </center>
                                                          </form> 
                                </div>

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



<!--    Modal pour ajouter Categorie Contrat-->



    <!--//Footer-->
<?php
include('foot.php');
?>