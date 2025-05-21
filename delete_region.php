 <?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>

<?php

if($_REQUEST)
{


    /*--------------------------------- ETAT INFOS RH -------------------------------------*/
    $id = $_REQUEST['id'];


    $open_close=1;

    $query1  = " UPDATE region SET  open_close=:open_close    
                    WHERE id_region = '$id' ";



    $sql1 = $db->prepare($query1);

    // Bind parameters to statement
    $sql1->bindParam(':open_close', $open_close);
    $sql1->execute();



    if($sql1)
    {
        ?>
        <script>
            alert('region a été supprimé.');
            window.location.href='<?=$region['option2_link']?>?witness=1';
        </script>
        <?php
    }

    else
    {
        ?>
        <script>
            alert('region n\'a pas été supprimé.');
            window.location.href='<?=$region['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>
