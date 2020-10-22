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
            <fieldset class="border p-2">
                <legend  class="w-auto">S'inscrire à une formation</legend>
                <ul>
                <div class="form-group w-25">
                    <input type="text" class="form-control" name="prénom" placeholder="Prénom" required>
                </div>
                <div class="form-group w-25">
                    <input type="text" class="form-control" name="nom" placeholder="Nom" required>
                </div>
                <div class="form-group w-25">
                    <input type="text" class="form-control" name="email" placeholder="Adresse E-mail" required>
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
                <div class="form-group w-25">
                    <input type="text" class="form-control" name="lieu_naissance" placeholder="Lieu de naissance">
                </div>
                <div class="form-group w-25">
                    <input type="text" class="form-control" name="adresse" placeholder="Adresse" required>
                </div>
                <div class="form-group w-25">
                    <input type="text" class="form-control" name="numero" placeholder="N°" required>
                </div>
                <div class="form-group w-25">
                    <input type="text" class="form-control" name="code_postal" placeholder="Code Postal" required>
                </div>
                <div class="form-group w-25">
                    <input type="text" class="form-control" name="localite" placeholder="Localité" required>
                </div>
                <div class="form-group w-25">
                    <input type="text" class="form-control" name="pays" placeholder="Pays" required>
                </div>
                <div class="form-group w-25">
                    <input type="text" class="form-control" name="telephone" placeholder="Téléphone">
                </div>
                <div class="form-group w-25">
                    <input type="text" class="form-control" name="gsm" placeholder="GSM" required>
                </div>
                <div class="form-group w-25">
                    <input type="text" class="form-control" name="fax" placeholder="Fax">
                </div>
                    <div class="form-group">
                    <section class="col-sm-2">
                    <form class="form-inline">
                        <select class="custom-select my-3 mr-sm-3" id="genre">
                            <option disabled selected>Occupation</option>
                            <option value="1">Étudiant.e</option>
                            <option value="2">Travailleur.se</option>
                            <option value="3">Demandeur.euse d'emploi</option>
                        </select>
                    </form>
                </section>
                </div>
                    <p>Faites-vous partie d'une association?<br>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                        <label class="custom-control-label" for="customRadio1">Oui</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                        <label class="custom-control-label" for="customRadio2">Non</label>
                    </div>
                    <br>
                    <p>Régime alimentaire dans le cadre d'une formation résidentielle</p>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
                        <label class="custom-control-label" for="customRadio3">Sans viande</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio4" name="customRadio" class="custom-control-input">
                        <label class="custom-control-label" for="customRadio4">Avec viande</label>
                    </div>
                    <br>
                    <p>Souhaitez-vous une facture?</p>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="radioOui" name="facture" value="Oui" required onclick="validate();" class="custom-control-input">
                        <label class="custom-control-label" for="radioOui">Oui</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="radioNon" name="facture" value="Non" required onclick="validate();" class="custom-control-input">
                        <label class="custom-control-label" for="radioNon">Non</label>
                    </div>



                        <!-- <input type="radio" name="facture" value="Oui" required onclick="validate();" id="radioOui">Oui
                        <input type="radio" name="facture" value="Non" required onclick="validate();" id="radioNon">Non -->
                        <script type="text/javascript">
                            function validate() {
                                var radioOui = document.getElementById('radioOui');
                                var textarea = document.getElementById('facturecomment');

                                if (radioOui.checked && facturecomment.value.length < 1) {
                                    facturecomment.focus();
                                    document.getElementById('facturecomment').disabled = false;
                                    return false;
                                } else {
                                    document.getElementById('facturecomment').disabled = true;
                                }     
                            }
                        </script>
                        <textarea name="facturecomment" id="facturecomment" rows="5" cols="40" required>Veuillez inscrire une adresse de facturation</textarea>
                </ul>
            </fieldset>


            <!-- <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">J'accepte les conditions d'utilisations</label>
            </div> -->
            <div class="container" style="margin: 20px">
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="submit" onclick="history.back()" class="btn btn-danger">Retour</button>
            </div>
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