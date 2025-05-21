 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php")
?>

<?php

if($_POST)
{               


        /*--------------------------------- ETAT INFOS RH -------------------------------------*/
        $id = $_POST['id_garant_ex'];


        $open_close=1;

         $query1  = " UPDATE garant_externe SET  open_close=:open_close    
                    WHERE id_garant_ex = '$id' ";

                

        $sql1 = $db->prepare($query1);

             // Bind parameters to statement
            $sql1->bindParam(':open_close', $open_close);
            $sql1->execute();



                        if($sql1)
                                    {
                                        ?>
                                        <script>
                                            alert('Garant a été supprimé.');
                                                    window.location.href='<?=$garant['option2_link']?>?witness=1';
                                        </script>
                                        <?php
                                    }

                                    else
                                    {       
                                      ?>
                                        <script>
                                            alert('Garant n\'a pas été supprimé.');
                                            window.location.href='<?=$garant['option2_link']?>?witness=-1';
                                        </script>
                                        <?php
                                       
                                    }


}
?>
