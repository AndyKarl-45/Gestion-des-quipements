 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php")
?>

<?php

if($_POST)
{               


        
        $nom = $_POST['nom'];
        
                                    $sql = "INSERT INTO nature_sanction (nom)
                                  VALUES (?)";
                                $req = $db->prepare($sql);
                                $req->execute(array($nom));

                                    if($req)
                                    {
                                        ?>
                                        <script>
                                            alert('Sanction a été bien enregistrée.');
                                             window.location.href='liste_nature_sanction.php';
                                        </script>
                                        <?php
                                    }

                                    else
                                    {       
                                      ?>
                                        <script>
                                            alert('Sanction existe déjà.');
                                            window.location.href='liste_nature_sanction.php';
                                        </script>
                                        <?php
                                       
                                    }


}
?>
