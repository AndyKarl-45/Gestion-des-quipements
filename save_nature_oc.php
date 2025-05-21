<?php
include('first.php');
include('php/main_side_navbar.php');


if(isset($_POST['submit_nature']) != "")
{

    $nom_nature = strtoupper($_POST['nom_nature']);

    $sql = "INSERT INTO nature_oc (intitule)
                                  VALUES (?)";
    $req = $db->prepare($sql);
    $req->execute(array($nom_nature));

    if($req)
    {
        ?>
        <script>
            alert('Nature bien enregistrée.');
            window.location.href="<?=$comptabilite['option1_link']?>";
        </script>
        <?php
    }

    else
    {
        ?>
        <script>
            alert('Erreur.');
            window.location.href="<?=$comptabilite['option1_link']?>";
        </script>
        <?php

    }

}
?>
