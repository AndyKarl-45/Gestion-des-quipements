<?php

include ("php/dbconnect.php");


if (isset($_REQUEST['idi']) and isset($_REQUEST['ids']) and isset($_REQUEST['idm']) and isset($_REQUEST['ide'])) {
    $id_ask_eq = $_REQUEST['idi'];
    $receveur = $_REQUEST['ids'];
    $id_materiel = $_REQUEST['idm'];
    $emetteur = $_REQUEST['ide'];
    // echo $id_personnel;

    $query = "DELETE FROM demande_materiel WHERE receveur='$receveur' and id_ask_eq='$id_ask_eq' and id_materiel='$id_materiel' ";
    $sql = $conn->query($query);


    if ($sql)
    {       
           

            switch ($emetteur){
                    case 'C';
                      ?>
                        <script>
                            alert('Equipement a été bien supprimer.');
                                      window.location.href='modifier_transfert_mag_congo.php?id=<?=$id_ask_eq?>';
                        </script>
                        <?php
                        break;
                    case 'E';
                      ?>
                        <script>
                            alert('Equipement a été bien supprimer.');
                                      window.location.href='modifier_transfert_mag_congo.php?id=<?=$id_ask_eq?>';
                        </script>
                        <?php
                        break;
                    case 'D';
                      ?>
                        <script>
                            alert('Equipement a été bien supprimer.');
                                      window.location.href='modifier_transfert_mag_def.php?id=<?=$id_ask_eq?>';
                        </script>
                        <?php
                        break;
                     case 'M';
                      ?>
                        <script>
                            alert('Equipement a été bien supprimer.');
                                      window.location.href='modifier_transfert_mag_main.php?id=<?=$id_ask_eq?>';
                        </script>
                        <?php
                        break;
                    case 'O';
                      ?>
                        <script>
                            alert('Equipement a été bien supprimer.');
                                      window.location.href='modifier_transfert_mag_congo.php?id=<?=$id_ask_eq?>';
                        </script>
                        <?php
                        break;

                 }

                                               
    }
    else
    { 


     switch ($emetteur){
                    case 'C';
                      ?>
                        <script>
                            alert('Equipement n\'a pas été supprimer.'); 
                                      window.location.href='modifier_transfert_mag_congo.php?id=<?=$id_ask_eq?>';
                        </script>
                        <?php
                        break;
                    case 'E';
                      ?>
                        <script>
                            alert('Equipement n\'a pas été supprimer.'); 
                                      window.location.href='modifier_transfert_mag_congo.php?id=<?=$id_ask_eq?>';
                        </script>
                        <?php
                        break;
                    case 'D';
                      ?>
                        <script>
                            alert('Equipement n\'a pas été supprimer.'); 
                                      window.location.href='modifier_transfert_mag_def.php?id=<?=$id_ask_eq?>';
                        </script>
                        <?php
                        break;
                     case 'M';
                      ?>
                        <script>
                           alert('Equipement n\'a pas été supprimer.'); 
                                      window.location.href='modifier_transfert_mag_main.php?id=<?=$id_ask_eq?>';
                        </script>
                        <?php
                        break;
                    case 'O';
                      ?>
                        <script>
                            alert('Equipement n\'a pas été supprimer.'); 
                                      window.location.href='modifier_transfert_mag_congo.php?id=<?=$id_ask_eq?>';
                        </script>
                        <?php
                        break;

                 }
    }
}


?>
