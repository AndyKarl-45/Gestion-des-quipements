 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php")
?>

<?php

if($_POST)
{               


        /*--------------------------------- ETAT HOLIDAY -------------------------------------*/
        // $id = $_POST['id_personnel'];
        $id_perso= $_POST['id_perso'];
        $nom= $_POST['nom'];
        $debut_utilisateur = $_POST['debut_utilisateur'];
        $debut_systeme = $_POST['debut_systeme'];
        $date_emission = $_POST['date_emission'];
        $month = date("Y-m");

        /*--------------------------------- SAVE DATA HOLIDAY ---------------------------*/

        $query1 = " INSERT INTO pointage (id_perso, utilisateur, date_emission, month, debut_systeme, debut_utilisateur) 
        VALUES 
        (:id_perso,:name,:date_emission,:month,:debut_systeme,:debut_utilisateur)";

        $sql1 = $db->prepare($query1);

             // Bind parameters to statement
            $sql1->bindParam(':id_perso', $id_perso);
            $sql1->bindParam(':name', $nom);
            $sql1->bindParam(':month', $month);
            $sql1->bindParam(':date_emission', $date_emission);
            $sql1->bindParam(':debut_systeme', $debut_systeme);
            $sql1->bindParam(':debut_utilisateur', $debut_utilisateur);
            $sql1->execute();



                                    if($sql1)
                                    {
                                        ?>
                                        <script>
                                            alert('Pointage a été bien enregistrée.');
                                                 window.location.href='<?=$activite['option1_link']?>';
                                        </script>
                                        <?php
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
