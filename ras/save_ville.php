 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php");
?>

<?php

if($_POST)
{               


        
        $nom = $_POST['nom'];
        $id_pays = $_POST['id_region'];

        // echo $nom;
        // echo $id_pays;
        $query = "INSERT INTO ville (nom,id_region) VALUES (:nom,:id_region)";

                 $sql = $db->prepare($query);

     // Bind parameters to statement
            $sql->bindParam(':nom', $nom);
            $sql->bindParam(':id_region', $id_region);
            $sql->execute();

                                    if($sql)
                                    {
                                        ?>
                                        <script>
                                            alert('Ville a été bien enregistrée.');
                                          window.location.href='liste_ville.php';
                                        </script>
                                        <?php
                                    }

                                    else
                                    {       
                                      ?>
                                        <script>
                                            alert('Ville existe déjà.');
                                            window.location.href='liste_ville.php';
                                        </script>
                                        <?php
                                       
                                    }


}
?>
