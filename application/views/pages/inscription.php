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
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#myModal").modal('show');
            });
        </script>
        <style>
            .bs-example{
                margin: 20px;
            }
        </style>
    </head>
        <body>
            <div class="bs-example" >
            <div id="myModal" class="modal fade bd-exemple" tabindex="-1" >
            <div class="modal-dialog modal-lg" style="overflow:visible;min-height:100%!important;">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="margin-left: 40px;">S'inscrire à une formation</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" style="overflow-y: inherit !important;">
                <form method="post">
                <ul>
                <div class="form-group w-50">
                    <input type="text" class="form-control" name="prénom" placeholder="Prénom" required>
                </div>
                <div class="form-group w-50">
                    <input type="text" class="form-control" name="nom" placeholder="Nom" required>
                </div>
                <div class="form-group w-50">
                    <input type="text" class="form-control" name="email" placeholder="Adresse E-mail" required>
                </div>
                <div class="form-group">
                    <section class="col-sm-3">
                    <form class="form-inline">
                        <select class="custom-select my-3 mr-sm-3" id="genre">
                            <option selected>Genre</option>
                            <option value="1">Femme</option>
                            <option value="2">Homme</option>
                            <option value="3">Autre</option>
                        </select>
                    </form>
                </section>
                </div>
                <section class="col-sm-3">
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
                <div class="form-group w-50">
                    <input type="text" class="form-control" name="lieu_naissance" placeholder="Lieu de naissance">
                </div>
                <div class="form-group w-50">
                    <input type="text" class="form-control" name="adresse" placeholder="Adresse" required>
                </div>
                <div class="form-group w-50">
                    <input type="text" class="form-control" name="numero" placeholder="N°" required>
                </div>
                <div class="form-group w-50">
                    <input type="text" class="form-control" name="code_postal" placeholder="Code Postal" required>
                </div>
                <div class="form-group w-50">
                    <input type="text" class="form-control" name="localite" placeholder="Localité" required>
                </div>
                <div class="form-group w-50">
                    <input type="text" class="form-control" name="pays" placeholder="Pays" required>
                </div>
                <div class="form-group w-50">
                    <input type="text" class="form-control" name="telephone" placeholder="Téléphone">
                </div>
                <div class="form-group w-50">
                    <input type="text" class="form-control" name="gsm" placeholder="GSM" required>
                </div>
                <div class="form-group w-50">
                    <input type="text" class="form-control" name="fax" placeholder="Fax">
                <br>
                <p>Quelle est votre occupation ?</p>
                <div class="custom-control custom-radio">
                    <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">
                        <input type="radio" onclick="javascript:etudiantCheck();" name="yesno" id="studyCheck">
                            <label>Etudiant.e</label></a>
                </div>
                <div class="custom-control custom-radio">
                        <input type="radio" onclick="javascript:travailCheck();" name="yesno" id="workCheck">
                            <label>Travailleur.euse</label>
                </div>
                <div class="custom-control custom-radio">
                        <input type="radio" onclick="javascript:chercheurCheck();" name="yesno" id="chomageCheck">
                            <label>Demandeur.euse d'emploi</label>
                </div>
                <br>
                <div class="form-group w-50" id="ifOne" style="visibility:hidden" required>
                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse" id="multiCollapseExample1">
                                <div class="card card-body">
                                    Etudes en cours: <input class="form-control" type='text' id='yes' name='yes'><br>
                                    Nom de l'établissement:  <input class="form-control" type='text' id='acc' name='acc'>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group w-50" id="ifTwo" style="visibility:hidden" required>
                    Profession: <input class="form-control" type='text' id='yes' name='yes'><br>
                    Lieu de travail:  <input class="form-control" type='text' id='acc' name='acc'>
                </div>
                <script>
                    function etudiantCheck() {
                        if (document.getElementById('studyCheck').checked) {
                            document.getElementById('ifOne').style.visibility = 'visible';
                        }
                        else document.getElementById('ifOne').style.visibility = 'hidden';
                    }
                    function travailCheck() {
                        if (document.getElementById('workCheck').checked) {
                            document.getElementById('ifTwo').style.visibility = 'visible';
                        }
                        else document.getElementById('ifTwo').style.visibility = 'hidden';
                    }  
                </script>
                </br>
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
                        </script><br>
                        <div class="form-group w-50">
                            <input class="form-control" id="facturecomment" placeholder="Veuillez inscrire l'adresse complète"style="width: 370px;" required>
                        </div>

                        <br>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" dropdown container="body">Centres d'intérêt</button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <label class="dropdown-item">
                                        <input type="checkbox" name="dropdown-group" value="01" style="margin-right: 10px;"/>Programme complet des formations
                                    </label>
                                    <label class="dropdown-item">
                                        <input type="checkbox" name="dropdown-group" value="02" style="margin-right: 10px;"/>Centres et plaines de vacances - Ateliers d’expression
                                    </label>
                                    <label class="dropdown-item">
                                        <input type="checkbox" name="dropdown-group" value="03" style="margin-right: 10px;"/>Animateur volontaire de jeunesse
                                    </label>
                                    <label class="dropdown-item">
                                        <input type="checkbox" name="dropdown-group" value="04" style="margin-right: 10px;"/>Animateur professionnel et animation de quartier
                                    </label>
                                    <label class="dropdown-item">
                                        <input type="checkbox" name="dropdown-group" value="05" style="margin-right: 10px;"/>Coordinateur volontaire de jeunesse
                                    </label>
                                    <label class="dropdown-item">
                                        <input type="checkbox" name="dropdown-group" value="06" style="margin-right: 10px;"/>Formation pour formateurs
                                    </label>
                                    <label class="dropdown-item">
                                        <input type="checkbox" name="dropdown-group" value="07" style="margin-right: 10px;"/>Petite enfance
                                    </label>
                                    <label class="dropdown-item">
                                        <input type="checkbox" name="dropdown-group" value="08" style="margin-right: 10px;"/>Enseignement
                                    </label>
                                    <label class="dropdown-item">
                                        <input type="checkbox" name="dropdown-group" value="09" style="margin-right: 10px;"/>Accueillant(e) extra-scolaire
                                    </label>
                                    <label class="dropdown-item">
                                        <input type="checkbox" name="dropdown-group" value="10" style="margin-right: 10px;"/>Formation de délégués d’élèves
                                    </label>
                                    <label class="dropdown-item">
                                        <input type="checkbox" name="dropdown-group" value="11" style="margin-right: 10px;"/>Rencontres entre l’enseignement spécial et l’enseignement ordinaire
                                    </label>
                                    <label class="dropdown-item">
                                        <input type="checkbox" name="dropdown-group" value="12" style="margin-right: 10px;"/>Handicap et intégration
                                    </label>
                                    <label class="dropdown-item">
                                        <input type="checkbox" name="dropdown-group" value="13" style="margin-right: 10px;"/>Action sociale
                                    </label>
                                    <label class="dropdown-item">
                                        <input type="checkbox" name="dropdown-group" value="14" style="margin-right: 10px;"/>Santé
                                    </label>
                                    <label class="dropdown-item">
                                        <input type="checkbox" name="dropdown-group" value="15" style="margin-right: 10px;"/>Pédagogie
                                    </label>
                                    <label class="dropdown-item">
                                        <input type="checkbox" name="dropdown-group" value="16" style="margin-right: 10px;"/>Jeunes enfants 2,5 - 8 ans
                                    </label>
                                    <label class="dropdown-item">
                                        <input type="checkbox" name="dropdown-group" value="17" style="margin-right: 10px;"/>Audio-visuel
                                    </label>
                                    <label class="dropdown-item">
                                        <input type="checkbox" name="dropdown-group" value="18" style="margin-right: 10px;"/>Activités théâtrales, expression corporelle
                                    </label>
                                    <label class="dropdown-item">
                                        <input type="checkbox" name="dropdown-group" value="19" style="margin-right: 10px;"/>Expression orale et écrite
                                    </label>
                                    <label class="dropdown-item">
                                        <input type="checkbox" name="dropdown-group" value="20" style="margin-right: 10px;"/>Activités manuelles et plastiques
                                    </label>
                                    <label class="dropdown-item">
                                        <input type="checkbox" name="dropdown-group" value="21" style="margin-right: 10px;"/>Découverte du milieu
                                    </label>
                                    <label class="dropdown-item">
                                        <input type="checkbox" name="dropdown-group" value="22" style="margin-right: 10px;"/>Activités musicales
                                    </label>
                                    <label class="dropdown-item">
                                        <input type="checkbox" name="dropdown-group" value="23" style="margin-right: 10px;"/>Jeux et activités physiques
                                    </label>
                                    <label class="dropdown-item">
                                        <input type="checkbox" name="dropdown-group" value="24" style="margin-right: 10px;"/>Initiation technique et scientifique
                                    </label>
                                    <label class="dropdown-item">
                                        <input type="checkbox" name="dropdown-group" value="25" style="margin-right: 10px;"/>Communication et gestion des groupes
                                    </label>
                                    <label class="dropdown-item">
                                        <input type="checkbox" name="dropdown-group" value="26" style="margin-right: 10px;"/>Gestion et collectivité
                                    </label>
                                    <label class="dropdown-item">
                                        <input type="checkbox" name="dropdown-group" value="27" style="margin-right: 10px;"/>Formation qualifiante
                                    </label>
                                    <label class="dropdown-item">
                                        <input type="checkbox" name="dropdown-group" value="28" style="margin-right: 10px;"/>Pour une éducation à l’égalité des genres
                                    </label>
                                    <label class="dropdown-item">
                                        <input type="checkbox" name="dropdown-group" value="29" style="margin-right: 10px;"/>Festival du Film d’Education
                                    </label>
                                    <label class="dropdown-item">
                                        <input type="checkbox" name="dropdown-group" value="30" style="margin-right: 10px;"/>Newsletter du secteur Numérique
                                    </label>
                                    <label class="dropdown-item">
                                        <input type="checkbox" style="margin-right: 10px;" id="selectall" name="selectall" autocomplete="off" checked onclick="eventCheckBox()"/>Tout sélectionner
                                            <script type="text/javascript">
                                                function eventCheckBox() {
                                                    let checkboxs = document.getElementsByTagName("input");
                                                    for(let i = 1; i < checkboxs.length ; i++) {
                                                        checkboxs[i].checked = !checkboxs[i].checked;
                                                    }
                                                }
                                            </script>
                                    </label>
                                </div>
                        </div>
                        <!--<script type="text/javascript">
                            $(document).on('click', '.dropdown-item', function(event) {
                                event.preventDefault();
                                $(this).toggleClass('dropdown-item-checked');  
                        });</script> -->
                </ul>
            <div class="modal-footer" style="margin: 20px">
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="submit" onclick="history.back()" class="btn btn-danger">Retour</button>
            </div>
        </form>
</div>
</div>
</div>
</div>
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