                                                    <?php

                                        $iResult = $db->query('SELECT * FROM pays');

                                                                    while($data = $iResult->fetch_assoc()){

                                                                        $i = $data['nom'];
                                                                        echo '<option value ="'.$i.'">';
                                                                        echo $data['nom'];
                                                                        echo '</option>';
                                                
                                                                    }
                                                    ?>