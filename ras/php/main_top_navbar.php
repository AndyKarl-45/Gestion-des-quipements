<?php
?>
<nav class="sb-topnav navbar navbar-expand-sm navbar-dark bg-dark sticky-top">
    <a class="navbar-brand" href="index.php">
        <?php
        echo $siteName;
        $lvl = $_SESSION['rainbo_lvl'];
        $secteur_user = $_SESSION['rainbo_secteur'];
        if($secteur_user == 0)
            $secteur_user = "N/A";
        else{
            $query = "SELECT * from secteur where id_secteur = $secteur_user";
            $q = $db->query($query);
            while($row = $q->fetch()) {
                $secteur_user = $row['nom'];
            }
        }

        $salle_user = $_SESSION['rainbo_salle'];
        if($salle_user == 0){
            $salle_user = "N/A";
        }else{
            $query = "SELECT * from salles where id_salles = $salle_user";
            $q = $db->query($query);
            while($row = $q->fetch()) {
                $salle_user = $row['nom'];
            }
        }
        ?>
    </a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
            <?php
            if($lvl == 4 || $lvl == 6){
            ?>
            <div class="inner-text">
                <a href="demandes_transferts.php" style="color: white" title="Demandes de transfert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5zm14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5z"/>
                    </svg>
                </a>
                <?php
                $query  = "SELECT count(id) as total from demandes_transferts WHERE montant_percu = 0";
                $q = $conn->query($query);
                while($row = $q->fetch_assoc())
                {
                    $dt = $row["total"];
                }
                ?>
            </div>
            <sup><h6><span class="badge badge-warning"><?=$dt?></span></h6></sup>
            &nbsp;<?php
            }
            ?>
            &nbsp;
            <div class="inner-text">
                <i class="fas fa-home"></i><sup><span class="badge badge-warning"><?=$salle_user?></span></sup>
            </div>
            &nbsp;&nbsp;&nbsp;
            <div class="inner-text">
                <i class="fas fa-map"></i><sup><span class="badge badge-warning"><?=$secteur_user?></span></sup>
            </div>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <div class="inner-text">
                <?php
                $grade="";

                $iResult = $db->query('SELECT * FROM roles WHERE lvl = '.$lvl);
                while($data = $iResult->fetch()) {

                    $grade = $data['fonction'];
                }

                echo strtoupper($nom_user).' ('.$grade.')';
                ?>
            </div>

        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="profile.php">Mon Profile</a>
                <a class="dropdown-item" href="liste_utilisateurs.php">Utilisateurs</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="deconnexion.php">Deconnexion</a>
            </div>
        </li>
    </ul>
</nav>
