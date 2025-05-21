 <?php
    include("first.php");
    include('php/navbar_links.php');
?>

<?php

if($_POST)
{               


        /*--------------------------------- ETAT HOLIDAY -------------------------------------*/
        // $id = $_POST['id_personnel'];
        $secteur= $_POST['secteur'];
        $nom= $_POST['nom'];
        $id_perso= $_POST['id_perso'];
        $indic= $_POST['indic'];
        $debut_utilisateur = $_POST['debut_utilisateur'];
        $debut_systeme = $_POST['debut_systeme'];
        $date_emission = $_POST['date_emission'];
        $month = date("Y-m");

        echo 'id_perso: '.$id_perso.'<br/>';
        echo 'indic: '.$indic.'<br/>';
        echo 'secteur: '.$secteur.'<br/>';
        echo 'nom: '.$nom.'<br/>';
        echo 'debut_utilisateur: '.$debut_utilisateur.'<br/>';

        /*--------------------------------- SAVE DATA HOLIDAY ---------------------------*/

        $query1 = " INSERT INTO pointage (id_perso ,secteur, utilisateur, date_emission, month, debut_systeme, debut_utilisateur) 
        VALUES 
        (:id_perso ,:secteur,:name,:date_emission,:month,:debut_systeme,:debut_utilisateur)";

        $sql1 = $db->prepare($query1);

             // Bind parameters to statement
            $sql1->bindParam(':id_perso', $id_perso);
            $sql1->bindParam(':secteur', $secteur);
            $sql1->bindParam(':name', $nom);
            $sql1->bindParam(':month', $month);
            $sql1->bindParam(':date_emission', $date_emission);
            $sql1->bindParam(':debut_systeme', $debut_systeme);
            $sql1->bindParam(':debut_utilisateur', $debut_utilisateur);
            $sql1->execute();
//
//
//            echo 'sql1: '.print_r($sql1).'<br/>';
//            echo ' indic checker : '.($indic == "mes").'<br/>';
//            echo ' Link 1 : '.$activite['option1_link'].'<br/>';
//            echo ' Link 2 : '.$activite['option0_link'].'<br/>';
//

                                    if($sql1)
                                    {
                                        if($indic == "mes"){
                                        ?>
                                        <script>
                                            alert('Pointage a été bien enregistrée.');
                                            window.location.href='<?=$activite['option1_link']?>';
                                        </script>
                                            <?php
                                        }
                                        if($indic == "leur"){
                                            ?>
                                            <script>
                                                alert('Pointage a été bien enregistrée.');
                                                window.location.href='<?=$activite['option0_link']?>';
                                            </script>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                      ?>
                                        <script>
                                            alert('Pointage is failed ...');
                                            window.location.href='<?=$activite['option1_link']?>';
                                        </script>
                                        <?php

                                    }


}
?>
