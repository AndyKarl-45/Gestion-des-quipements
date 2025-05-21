<?php
if(isset($_POST['submit_photo']) != ""){

    $id_perso      = $_POST['id_perso'];

    if(!empty(($_FILES))){

        $autorized_extensions = array('.PNG','.png', '.jpeg', '.JPEG','.jpg','.JPG');

        $file_name = $_FILES['photo']['name'];
        $file_extension = strrchr($file_name, ".");
        $file_content = $_FILES['photo']['tmp_name'];
        $file_size = $_FILES['photo']['size'];
        $file_dest = 'pp/'.$file_name;

//        echo $file_name.'<br/>';
//        echo $file_size.'<br/>';

        if($file_size < (3072*1025)){
            if(in_array($file_extension, $autorized_extensions)){
                if((move_uploaded_file($file_content, $file_dest) && ($_FILES['photo']['error'] == 0) )){


                    $stmp = "INSERT INTO photo_profile (id_personnel, lien, extension, taille)
                                                    VALUES('$id_perso','$file_dest','$file_extension','$file_size')";
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
