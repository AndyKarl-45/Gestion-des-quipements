 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php")
?>

<?php

if($_POST)
{               


        
        $nom = strtoupper($_POST['nom']);
        
        
                                    $sql = "INSERT INTO profession (nom)
                                  VALUES (?)";
                                $req = $db->prepare($sql);
                                $req->execute(array($nom));

                                    if($req)
                                    {
                                        ?>
                                        <script>
                                            alert('Profession a été bien enregistrée.');
                                             window.location.href='<?=$liste['option2_link']?>?witness=1';
                                        </script>
                                        <?php
                                    }

                                    else
                                    {       
                                      ?>
                                        <script>
                                            alert('Error.');
                                            window.location.href='<?=$liste['option2_link']?>?witness=-1';
                                        </script>
                                        <?php
                                       
                                    }


}
?>
