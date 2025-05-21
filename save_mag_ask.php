 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php");
?>

<?php

if($_REQUEST)
{               


        
        $mag = $_REQUEST['id'];
        


                                    if($mag)
                                    {
                                        ?>
                                        <script>
                                           
                                             window.location.href='nouvelle_demande_eq.php?idmag=<?=$mag?>';
                                        </script>
                                        <?php
                                    }

                                    else
                                    {       
                                      ?>
                                        <script>
                                            alert('Error.');
                                            window.location.href='nouvelle_demande_eq.php';
                                        </script>
                                        <?php
                                       
                                    }


}
?>
