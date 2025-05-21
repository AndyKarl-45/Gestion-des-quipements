<?php
<div class="row">
                                <div class="col-lg-8 offset-lg-2">
                                    <form action="#" method="POST">
                                        <div class="row">

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label> Nom<span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="nom_ing"
                                                           value="<?=$nom_p?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Prénom</label>
                                                    <input class="form-control" type="text" value="<?=$prenom_p?>" disabled>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Email <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="email" value="<?=$email_p?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Birthday <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="date" value="<?=$date_aniv_p?>" disabled>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Phone </label>
                                                    <input class="form-control" type="text" value="<?=$phone_p?>" disabled>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Age </label>
                                                    <input class="form-control" type="text" value="<?=$age_p?>" disabled>
                                                </div>
                                            </div>

                                        </div>

                                    </form>
                                </div>
                            </div>