                                    <td>

                                        <div class="row mb-3" style="padding: 20px">
                                            <label class="col-auto col-form-label col-form-label-lg">Candidat : </label>

                                            <div class="col">
                                                    <ul  class="nav nav-pills">
                                                        <li class="active">
                                                            <a  href="#1a" data-toggle="tab">
                                                                Unique
                                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                                                </svg>
                                                            </a>
                                                        </li>
                                                        <li><a href="#2a" data-toggle="tab">
                                                                Groupement
                                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-people" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1h7.956a.274.274 0 0 0 .014-.002l.008-.002c-.002-.264-.167-1.03-.76-1.72C13.688 10.629 12.718 10 11 10c-1.717 0-2.687.63-3.24 1.276-.593.69-.759 1.457-.76 1.72a1.05 1.05 0 0 0 .022.004zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10c-1.668.02-2.615.64-3.16 1.276C1.163 11.97 1 12.739 1 13h3c0-1.045.323-2.086.92-3zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                                                                </svg>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content clearfix">
                                                            <div class="tab-pane active" id="1a">
                                                                <div class="col">
                                                                    <br />


                                                                    <select name="candidat_unique"  style="width:75%" class="browser-default custom-select mb-4" >
                                                                        <option value="0" selected="selected">Selectionner</option>
                                                                        <?php

                                                                        $iResult = $conn->query('SELECT id_entite, raison_sociale FROM entites WHERE type_entite = "PRIVEE"');

                                                                        while($data = $iResult->fetch_assoc()){

                                                                            $i = $data['raison_sociale'];
                                                                            echo '<option value ="'.$i.'">';
                                                                            echo $data['raison_sociale'];
                                                                            echo '</option>';

                                                                        }
                                                                        ?>
                                                                    </select>
                                                                    <a href="ajouter_entite.php">
                                                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                            <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                                                                        </svg>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        <div class="tab-pane" id="2a">
                                                            <div class="col">
                                                                <br />

                                                                <select name="candidat_groupe" style="width:75%" class="browser-default custom-select mb-4">
                                                                    <option value="0" selected="selected">Selectionner</option>
                                                                    <?php

                                                                    $iResult = $db->query('SELECT id_groupement, ref_groupement, libelle FROM groupements');

                                                                    while($data = $iResult->fetch()){

                                                                        $i = $data['libelle'];
                                                                        echo '<option value ="'.$i.'">';
                                                                        echo $data['ref_groupement'].'/'.$data['libelle'];
                                                                        echo '</option>';

                                                                    }
                                                                    ?>
                                                                </select>


                                                                <a href="nouveau_group.php">
                                                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                            <div class="tab-pane" id="2a">
                                                                <div class="col">
                                                                    <br />

                                                                    <select name="candidat_groupe" style="width:75%" class="browser-default custom-select mb-4">
                                                                        <option value="0" selected="selected">Selectionner</option>
                                                                        <?php

                                                                        $iResult = $conn->query('SELECT id_groupement, ref_groupement, libelle FROM groupements');

                                                                        while($data = $iResult->fetch_assoc()){

                                                                            $i = $data['libelle'];
                                                                            echo '<option value ="'.$i.'">';
                                                                            echo $data['ref_groupement'].'/'.$data['libelle'];
                                                                            echo '</option>';

                                                                        }
                                                                        ?>
                                                                    </select>


                                                                    <a href="ajouter_group.php">
                                                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                            <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                                                                        </svg>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </td>