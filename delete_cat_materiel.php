 <?php
    include("first.php");
    include('php/navbar_links.php');
?>

<?php

if($_REQUEST)
{               


        /*--------------------------------- ETAT INFOS RH -------------------------------------*/
        $id = $_REQUEST['id'];
        // echo $id;

        $open_close=1;

         $query1  = " UPDATE categorie_materiel SET  open_close=:open_close    
                    WHERE id_cat_materiel= '$id' ";

                

        $sql1 = $db->prepare($query1);

             // Bind parameters to statement
            $sql1->bindParam(':open_close', $open_close);
            $sql1->execute();



                        if($sql1)
                                    {
                                        ?>
                                        <script>
                                            alert('Categorie matériel a été supprimé.');
                                                      window.location.href='liste_cat_materiel.php?witness=1';
                                        </script>
                                        <?php
                                    }

                                    else
                                    {       
                                      ?>
                                        <script>
                                            alert('Categorie matériel n\'a pas été supprimé.');
                                            window.location.href='liste_cat_materiel.php?witness=-1';
                                        </script>
                                        <?php
                                       
                                    }


}
?>
