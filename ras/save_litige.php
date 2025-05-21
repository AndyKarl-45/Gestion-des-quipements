 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php")
?>

<?php

if($_POST)
{               


        
        $id_personnel = $_POST['id_personnel'];
        $date_litige = $_POST['date_litige'];
        $nature = $_POST['nature'];
        $motif = $_POST['motif'];

        // echo $code;
        // echo  $nom;
         // echo '</br></br></br></br></br></br>bonjour</br></br>'.$secteur.' '.$responsable.' '.$code.' '.$nom.' '.$tel.' '.$pays.' '.$quartier.' '.$ville;
         


        
                                //     $sql = "INSERT INTO salles (code,nom,tel)
                                //   VALUES (?,?,?,?,?,?,?,?)";
                                // $req = $db->prepare($sql);
                                // $req->execute(array($code,$nom,$tel));

//--------------------------------- insertion des pièces jointes par étape -----------------------------------------//
                   

                    $query = " INSERT INTO litige (id_personnel,date_litige,nature,motif) VALUES (:id_personnel,:date_litige,:nature,:motif)";

                 $sql = $db->prepare($query);

     // Bind parameters to statement
            $sql->bindParam(':id_personnel', $id_personnel);
            $sql->bindParam(':date_litige', $date_litige);
            $sql->bindParam(':nature', $nature);
            $sql->bindParam(':motif', $motif);
            $sql->execute();



                                    if($sql)
                                    {
                                        ?>
                                        <script>
                                            alert('Litige a été bien enregistrée.');
                                              window.location.href='<?=$litige['option2_link']?>';
                                        </script>
                                        <?php
                                    }

                                    else
                                    {       
                                      ?>
                                        <script>
                                            alert('Litige n\'a pas été bien enregistrée.');
                                            window.location.href='<litige['option2_link']?>';
                                        </script>
                                        <?php
                                       
                                    }


}
?>
