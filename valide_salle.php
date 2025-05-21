 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php")
?>

<?php

if($_POST)
{               


        /*--------------------------------- ETAT HOLIDAY -------------------------------------*/
         $id = $_POST['id_salles'];






                                    if($id)
                                    {   
                                        
                                      ?>
                                        <script>
                                                 window.location.href='nouvelle_intervention.php?ids=<?php echo $id?>';
                                        </script>
                                        <?php

                                        

                                    }

                                    else
                                    {       
                                      ?>
                                        <script>
                                            window.location.href='nouvelle_intervention.php';
                                        </script>
                                        <?php
                                       
                                    }


}
?>
