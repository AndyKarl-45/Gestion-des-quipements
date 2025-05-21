<?php

include('first.php');
include('php/main_side_navbar.php');

$error = '';
$role = '';
$secteur = '';
$id_user = 0;
$pseudo = '';

if(isset($_POST['submit_payDay']) != "")
{
    $new_payDay = $_POST['new_payDay'];
//    echo $new_payDay;

    $sql = $conn->query("UPDATE parametres SET payDay='$new_payDay' WHERE id=1");
    if($sql){
        ?>
        <script>
            Toast.fire({
                icon: 'success',
                title: 'Opération effectuée avec succès ! '
            })
            window.location.href="<?=$liste['option7_link']?>";
        </script>
            <?php
    }

}

if(isset($_POST['submit_personnel']) != "")
{
    $personnel = $_POST['personnel'];
//    echo $new_payDay;

    $query1 = "SELECT * FROM users WHERE id_users=$personnel";
    $q1 = $db->query($query1);
    while($row1 = $q1->fetch())
    {
        $id_user = $row1['id_users'];
        $pseudo = $row1['pseudo'];
        $role = $row1['lvl'];
        $secteur = $row1['secteur'];
    }

    $query2 = "SELECT * FROM roles WHERE lvl=$role";
    $q2 = $db->query($query2);
    while($row2 = $q2->fetch())
    {
        $role = $row2['fonction'];
    }

    $query3 = "SELECT * FROM secteur WHERE id_secteur=$secteur";
    $q3 = $db->query($query3);
    while($row3 = $q3->fetch())
    {
        $secteur = $row3['nom'];
    }

}

if(isset($_POST['submit_a_personnel']) != "")
{
    $personnel = $_POST['id_user'];
    $role = $_POST['fonction'];
    $secteur = $_POST['secteur'];
//    echo $new_payDay;

    if($personnel != '' AND $role != '' AND $secteur != ''){
        $sql = $conn->query("UPDATE users SET secteur=$secteur, lvl=$role WHERE id_users=$personnel");
        if($sql){
            ?>
            <script>
                Toast.fire({
                    icon: 'success',
                    title: 'Opération effectuée avec succès ! '
                })
                //window.location.href="<?//=$liste['option7_link']?>//";
            </script>
            <?php
        }
    }

    if($personnel != '' AND $secteur != ''){
        $sql = $conn->query("UPDATE users SET secteur=$secteur WHERE id_users=$personnel");
        if($sql){
            ?>
            <script>
                Toast.fire({
                    icon: 'success',
                    title: 'Opération effectuée avec succès ! '
                })
            </script>
            <?php
        }
    }

    if($personnel != '' AND $role != ''){
        $sql = $conn->query("UPDATE users SET groupe_role=$role WHERE id_users=$personnel");
        if($sql){
            ?>
            <script>
                Toast.fire({
                    icon: 'success',
                    title: 'Opération effectuée avec succès ! '
                })
            </script>
            <?php
        }
    }

    $role = '';
    $secteur = '';
    $id_user = 0;
    $pseudo = '';

}

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Autres Réglages</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme <?=strtoupper($user);?>, il est <?=date("G:i");?> en ce jour du <?=dateToFrench("now","l j F Y");?>.
                    </li>
                </ol>

                <div class="row">
                    <div class="col-md-12">
                        <hr/>
                    </div>
                </div>
                <?php
                if($lvl == 4){
                ?>
                <div class="row">
                    <div class="col-md-12">

                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="mt-4">Modifier la date de paie</h1>
                                <form action="autres_configs.php" method="post">
                                    <span>Date actuelle</span>
                                    <table>
                                        <tr>
                                            <td>
                                                <div class="col">
                                                    <input class="form-control" type="number" name="new_payDay" value="<?=$payDay?>" />
                                                </div>
                                            </td>
                                            <td>
                                                <div class="col">
                                                    <input type="submit" name="submit_payDay" class="btn btn-primary" value="Enregistrer" />
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>

                        <div class="row">
                            <hr/>
                        </div>
                        <!-- /. ROW  -->
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="mt-4">Affectation</h1>
                                <?php
                                if($pseudo == ''){
                                ?>
                                <form action="autres_configs.php" method="post">
                                    <span>Selectionner un utilisateur</span>
                                    <table>
                                        <tr>
                                            <td>
                                                <div class="col">
                                                    <select class="form-control" name="personnel">
                                                    <option selected="">...</option>
                                                        <?php
                                                            $query = "SELECT * FROM users WHERE pseudo <> 'special' ";
                                                            $q = $db->query($query);
                                                            while($row = $q->fetch())
                                                            {
                                                                echo '<option value="'.$row['id_users'].'">'
                                                                    .$row['pseudo'].
                                                                    '</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="col">
                                                    <input type="submit" name="submit_personnel" class="btn btn-primary" value="Selectionner" />
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                                <?php
                                }
                                ?>
                                <br/>
                                <br/>
                                <?php
                                if($role != ""){
                                ?>
                                <form action="autres_configs.php" method="post">
                                    <table>
                                        <tr>
                                            <td>
                                                <span>Utilisateur</span>
                                                <div class="col">
                                                    <input class="form-control" value="<?=$pseudo?>" readonly/>
                                                    <input type="hidden" name="id_user" value="<?=$id_user?>" />
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span>Fonction</span>
                                                <div class="col">
                                                    <select class="form-control" name="fonction">
                                                        <option selected="<?=$role?>"><?=$role?></option>
                                                        <?php
                                                        $query = "SELECT * FROM roles WHERE fonction <> 'BOSS' AND fonction <> '$role'";
                                                        $q = $db->query($query);
                                                        while($row = $q->fetch())
                                                        {
                                                            echo '<option value="'.$row['lvl'].'">'
                                                                .$row['fonction'].
                                                                '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <span>Secteur</span>
                                                <div class="col">
                                                    <select class="form-control" name="secteur">
                                                        <option selected="<?=$secteur?>"><?=$secteur?></option>
                                                        <?php
                                                        $query = "SELECT * FROM secteur WHERE nom <> '$secteur' ";
                                                        $q = $db->query($query);
                                                        while($row = $q->fetch())
                                                        {
                                                            echo '<option value="'.$row['id_secteur'].'">'
                                                                .$row['nom'].
                                                                '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <span>&nbsp;</span>
                                                <div class="col">
                                                    <input type="submit" name="submit_a_personnel" class="btn btn-primary" value="Enregistrer" />
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <!-- /. ROW  -->
                    </div>
                </div>
                    <?php
                }else{
                    ?>
                    <div class="bg-warning">Vous n'avez pas accès à cette page</div>
                    <?php
                }
                    ?>


            </div>
        </main>
    </div>

    <!--//Footer-->
<?php
include('foot.php');
?>