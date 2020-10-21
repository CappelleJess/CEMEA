<?php
    if(!empty($_POST)){
        extract($_POST);
        $valid = (boolean) true;

        if(isset($_POST['inscription'])){
            $prénom = (String) trim($prénom);
            $nom = (String) trim($nom);
            $email = (String) trim($email);
            $genre = (String) trim($genre);
            $jour = (int) $jour;
            $mois = (int) $mois;
            $annee =  (int) $annee;
            $lieu_naissance = (int) $lieu_naissance;
            $date_naissance = (String) null;
            $adresse = (String) trim($adresse);
            $numero = (int) $numero;
            $code_postal = (int) $code_postal;
            $localite = (String) trim($localite);
            $pays = (String) trim($pays);
            $telephone = (int) $telephone;
            $gsm = (int) $gsm;
            $fax = (int) $fax;
            $occupation = (String) trim($occupation);

                if(empty($prénom)){
                    $valid = false;
                }

                if(empty($nom)){
                    $valid = false;
                }

                if(empty($email)){
                    $valid = false;
                }

                if(empty($genre)){
                    $valid = false;
                }

                if($jour <= 0 || $jour < 31){
                    $valid = false;
                }

                if($mois <= 0 || $mois < 12){
                    $valid = false;
                }

                if($annee <= 1960 || $annee < 2002){
                    $valid = false;
                }

                if(!checkdate($mois, $jour, $annee)){
                    $valid = false;
                    $err_date="Date fausse";
                } else {
                    $date_naissance = $annee . '-' . $mois . '-' . $jour;
                }

                $verif_lieu = array(1, 2, 3);

                if(in_array($lieu_naissance, $verif_lieu)){
                    $valid = false;
                }
                if(empty($adresse)){
                    $valid = false;
                }
                if(empty($numero)){
                    $valid = false;
                }
                if(empty($code_postal)){
                    $valid = false;
                }
                if(empty($localite)){
                    $valid = false;
                }
                if(empty($pays)){
                    $valid = false;
                }
                if(empty($telephone)){
                    $valid = false;
                }
                if(empty($gsm)){
                    $valid = false;
                }
                if(empty($fax)){
                    $valid = false;
                }
                if(empty($occupation)){
                    $valid = false;
                }
                if(empty($assoc)){
                    $valid = false;
                }

                if($valid) {
                    $date_inscription = date("Y-m-d");

                    $req = $BDD->prepare("INSERT INTO inscription(prénom, nom, email, genre, date_naissance, lieu_naissance, adresse, numero, code_postal, localite, pays, telephone, gsm, fax, occupation, assoc, date_inscription VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

                    $req->execute(array($prénom, $nom, $email, $genre, $date_naissance, $lieu_naissance, $adresse, $numero, $code_postal, $localite, $pays, $telephone, $gsm, $fax, $occupation, $assoc, $date_inscription));
                    }
                }   
            }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    </head>
        <body>
        <form method="post">
            <fieldset>
                <legend>S'inscrire à une formation</legend>
                <ul>
                <div class="form-group">
                    <input type="text" name="prénom" placeholder="Prénom*" required>
                </div>
                <div class="form-group">
                    <input type="text" name="nom" placeholder="Nom*" required>
                </div>
                <div class="form-group">
                    <input type="text" name="email" placeholder="Adresse E-mail*" required>
                </div>
                <div class="form-group">
                    <section class="col-sm-1">
                    <form class="form-inline">
                        <select class="custom-select my-1 mr-sm-2" id="genre">
                            <option selected>Genre</option>
                            <option value="1">Femme</option>
                            <option value="2">Homme</option>
                            <option value="3">Autre</option>
                        </select>
                    </form>
                </section>
                </div>
                <section class="col-sm-1">
                    <div class="form-group">
                        <div class="input-group date" data-provide="datepicker">
                            <input type="text" class="form-control" id="date" placeholder="JJ/MM/AAAA">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </section>
                <script type="text/javascript">
                    $(function(){
                        $('.datepicker').datepicker();
                    });
                </script>
                <div class="form-group">
                    <?php
                        if(isset($err_lieu)){
                            echo $err_lieu;                        
                        } 
                    ?>
                    <input type="text" name="lieu_naissance" placeholder="Lieu de naissance">
                </div>
                <div class="form-group">
                    <?php
                        if(isset($err_adresse)){
                            echo $err_adresse;
                        }
                    ?>
                    <input type="text" name="adresse" placeholder="Adresse*" required>
                </div>
                <div class="form-group">
                    <?php
                        if(isset($err_numero)){
                            echo $err_numero;
                        }
                    ?>
                    <input type="text" name="numero" placeholder="N°*" required>
                </div>
                <div class="form-group">
                    <?php
                        if(isset($err_code_postal)){
                            echo $err_code_postal;
                        }
                    ?>
                    <input type="text" name="code_postal" placeholder="Code Postal*" required>
                </div>
                <div class="form-group">
                    <?php
                        if(isset($err_localite)){
                            echo $err_localite;
                        }
                    ?>
                    <input type="text" name="localite" placeholder="Localité*" required>
                </div>
                <div class="form-group">
                    <?php
                        if(isset($err_pays)){
                            echo $err_pays;
                        }
                    ?>
                    <input type="text" name="pays" placeholder="Pays" required>
                </div>
                <div class="form-group">
                    <?php
                        if(isset($err_telephone)){
                            echo $err_telephone;
                        }
                    ?>
                    <input type="text" name="telephone" placeholder="Téléphone">
                </div>
                <div class="form-group">
                    <?php
                        if(isset($err_gsm)){
                            echo $err_gsm;
                        }
                    ?>
                    <input type="text" name="gsm" placeholder="GSM*" required>
                </div>
                <div class="form-group">
                    <?php
                        if(isset($err_fax)){
                            echo $err_fax;
                        }
                    ?>
                    <input type="text" name="fax" placeholder="Fax">
                </div>
                <div class="form-group">
                    <?php
                        if(isset($err_occupation)){
                            echo $err_occupation;                        
                        } 
                    ?>

                    <select name="occupation" id="occupation" required>
                        <option style="display:none;" selected="">Occupation</option>
                        <option value="2">Etudiant</option>
                        <option value="3">Travailleur</option>
                        <option value="4">Demandeur d'emploi</option>
                    </select>
                </div><br>
                <div class="form-group">
                    <p>Faites-vous partie d'une association?<br>
                    <input type="radio" id="oui" name="assoc "value="1">
                        <label for="oui">Oui</label><br>
                    <input type="radio" id="non" name="assoc "value="2">
                        <label for="non">Non</label><br></p>
                </div>
                </ul>
            </fieldset>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="submit" onclick="history.back()" class="btn btn-primary">Retour</button>
        </form>
    </div>
</div>
</main>
    </body>
</html>



<!-- régime alimentaire
covoiturage
facture
adresse de facture
centres d'intérets -->