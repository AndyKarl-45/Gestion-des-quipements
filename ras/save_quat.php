 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php");

//strtolower(); ecrire en miniscule
//strtouppor(); ecrire en majiscule
?>

<?php

if($_POST)
{               


        
        $nom = strtoupper($_POST['nom_quat']);
        $id_ville = strtoupper($_POST['id_ville']);

        // echo $nom;
        // echo $id_ville;
        $query = "INSERT INTO quartier (nom,id_ville) VALUES (:nom,:id_ville)";

                 $sql = $db->prepare($query);

     // Bind parameters to statement
            $sql->bindParam(':nom', $nom);
            $sql->bindParam(':id_ville', $id_ville);
            $sql->execute();

                                    if($sql)
                                    {
                                        ?>
                                        <script>
                                            alert('Ville a été bien enregistrée.');
                                           window.location.href='liste_quartier.php';
                                        </script>
                                        <?php
                                    }

                                    else
                                    {       
                                      ?>
                                        <script>
                                            alert('Ville existe déjà.');
                                            window.location.href='liste_quartier.php';
                                        </script>
                                        <?php
                                       
                                    }


}
?>
