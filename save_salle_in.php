 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php");
?>

<?php

if($_REQUEST)
{               


        
        $id_salles = $_REQUEST['id'];
        


                                    if($id_salles)
                                    {
                                        ?>
                                        <script>
                                           
                                             window.location.href='nouvelle_intervention.php?ids=<?=$id_salles?>';
                                        </script>
                                        <?php
                                    }

                                    else
                                    {       
                                      ?>
                                        <script>
                                            alert('Error.');
                                            window.location.href='nouvelle_intervention.php';
                                        </script>
                                        <?php
                                       
                                    }


}
?>
