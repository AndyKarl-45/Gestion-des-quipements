 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php");
?>

<?php

if($_POST)
{               


        
        $nom = strtoupper($_POST['nom']);
        $open_close=0;
        
                                    $sql = "INSERT INTO pays (nom,open_close)
                                  VALUES (?,?)";
                                $req = $db->prepare($sql);
                                $req->execute(array($nom,$open_close));

                                    if($req)
                                    {
                                        ?>
                                        <script>
                                            alert('Pays a été bien enregistrée.');
                                             window.location.href='liste_pays.php';
                                        </script>
                                        <?php
                                    }

                                    else
                                    {       
                                      ?>
                                        <script>
                                            alert('Pays existe déjà.');
                                            window.location.href='liste_pays.php';
                                        </script>
                                        <?php
                                       
                                    }


}
?>
