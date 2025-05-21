 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php")
?>

<?php

if($_POST)
{               


        
        $nom = $_POST['nom'];
        
                                    $sql = "INSERT INTO profession (nom)
                                  VALUES (?)";
                                $req = $db->prepare($sql);
                                $req->execute(array($nom));

                                    if($req)
                                    {
                                        ?>
                                        <script>
                                            alert('Profession a été bien enregistrée.');
                                             window.location.href='liste_profession.php';
                                        </script>
                                        <?php
                                    }

                                    else
                                    {       
                                      ?>
                                        <script>
                                            alert('Profession existe déjà.');
                                            window.location.href='liste_profession.php';
                                        </script>
                                        <?php
                                       
                                    }


}
?>
