 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php")
?>

<?php

if($_POST)
{               


        
        $numero = $_POST['numero'];
        $nom = $_POST['nom'];
        $tel = $_POST['tel'];
        $responsable = $_POST['responsable'];

        // echo $code;
        // echo  $nom;
         // echo '</br></br></br></br></br></br>bonjour</br></br>'.$secteur.' '.$responsable.' '.$code.' '.$nom.' '.$tel.' '.$pays.' '.$quartier.' '.$ville;
         


        
                                //     $sql = "INSERT INTO salles (code,nom,tel)
                                //   VALUES (?,?,?,?,?,?,?,?)";
                                // $req = $db->prepare($sql);
                                // $req->execute(array($code,$nom,$tel));

//--------------------------------- insertion des pièces jointes par étape -----------------------------------------//
                   

                    $query = " INSERT INTO secteur (numero_secteur,nom,tel,responsable) VALUES (:numero,:nom,:tel,:responsable)";

                 $sql = $db->prepare($query);

     // Bind parameters to statement
            $sql->bindParam(':numero', $numero);
            $sql->bindParam(':nom', $nom);
            $sql->bindParam(':tel', $tel);
            $sql->bindParam(':responsable', $responsable);
            $sql->execute();



                                    if($sql)
                                    {
                                        ?>
                                        <script>
                                            alert('Secteur a été bien enregistrée.');
                                              window.location.href='<?=$secteur['option2_link']?>';
                                        </script>
                                        <?php
                                    }

                                    else
                                    {       
                                      ?>
                                        <script>
                                            alert('Secteur existe déjà.');
                                            window.location.href='<?=$secteur['option2_link']?>';
                                        </script>
                                        <?php
                                       
                                    }


}
?>
