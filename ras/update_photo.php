<?php
if(isset($_POST['update_photo']) != ""){

    $id_perso      = $_POST['id_perso'];

    if(!empty(($_FILES))){

        $autorized_extensions = array('.PNG','.png', '.jpeg', '.JPEG','.jpg','.JPG');

        $file_name = $_FILES['new_photo']['name'];
        $file_extension = strrchr($file_name, ".");
        $file_content = $_FILES['new_photo']['tmp_name'];
        $file_size = $_FILES['new_photo']['size'];
        $file_dest = 'pp/'.$file_name;

//        echo $file_name.'<br/>';
//        echo $file_size.'<br/>';

        if($file_size < (3072*1025)){
            if(in_array($file_extension, $autorized_extensions)){
                if((move_uploaded_file($file_content, $file_dest) && ($_FILES['new_photo']['error'] == 0) )){


                    $stmp = "UPDATE photo_profile SET lien='$file_dest', extension='$file_extension', taille=$file_size WHERE id_personnel=$id_perso";
                    $sql = $conn->query($stmp);

                    if ($sql)
                    {
                        ?>
                        <script>
                            Toast.fire({
                                icon: 'success',
                                title: 'Opération effectuée avec succès ! '
                            })
                        </script>
                        <?php
                    }
                }else{
                    ?>
                    <script>
                        Toast.fire({
                            icon: 'Error',
                            title: 'Opération Non effectuée ! '
                        })
                    </script>
                    <?php
                }

            }else{
                ?>
                <script>
                    Toast.fire({
                        icon: 'warning',
                        title: 'Type de fichier refusé ! '
                    })
                </script>
                <?php
            }
        }else{
            ?>
            <script>
                Toast.fire({
                    icon: 'warning',
                    title: 'Fichier trop volumineux ! '
                })
            </script>
            <?php
        }
    }
}
