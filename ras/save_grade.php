 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php")
?>

<?php

if($_POST)
{               


        
        $nom = $_POST['nom'];
        
                                    $sql = "INSERT INTO grade (nom)
                                  VALUES (?)";
                                $req = $db->prepare($sql);
                                $req->execute(array($nom));

                                    if($req)
                                    {
                                        ?>
                                        <script>
                                            alert('Grade a été bien enregistrée.');
                                             window.location.href='liste_grade.php';
                                        </script>
                                        <?php
                                    }

                                    else
                                    {       
                                      ?>
                                        <script>
                                            alert('Grade existe déjà.');
                                            window.location.href='liste_grade.php';
                                        </script>
                                        <?php
                                       
                                    }


}
?>
