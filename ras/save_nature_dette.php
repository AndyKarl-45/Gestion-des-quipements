 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php")
?>

<?php

if($_POST)
{               


        
        $nom = $_POST['nom'];
        
                                    $sql = "INSERT INTO naturedette (nom)
                                  VALUES (?)";
                                $req = $db->prepare($sql);
                                $req->execute(array($nom));

                                    if($req)
                                    {
                                        ?>
                                        <script>
                                            alert('Nature dette a été bien enregistrée.');
                                             window.location.href='liste_nature_dette.php>';
                                        </script>
                                        <?php
                                    }

                                    else
                                    {       
                                      ?>
                                        <script>
                                            alert('Nature dette existe déjà.');
                                            window.location.href='liste_nature_dette.php';
                                        </script>
                                        <?php
                                       
                                    }


}
?>
