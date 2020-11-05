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
            <div class="bs-example">
            <div id="myModal" class="modal fade bd-exemple" tabindex="-1" >
            <div class="modal-dialog modal-xl" style="overflow:visible;min-height:100%!important;">
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

                <div class="panel-group" id="accordion" >
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <input type='radio' id='r11' name='occupation' value='Working' required /> Travailleur.euse
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"></a>
                        </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <div class="form-group w-50" id="ifOne" required >
                                        Profession: <input class="form-control" type='text' id='yes' name='yes'>
                                        Lieu de Travail:  <input class="form-control" type='text' id='acc' name='acc'>
                                        Téléphone:  <input class="form-control" type='text' id='acc' name='acc'>
                                </div>
                            </div>
                    </div>
                </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <input type='radio' id='r12' name='occupation' value='Not-Working' required /> Étudiant.e
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"></a>
                        </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="form-group w-50" id="ifOne" required>
                                        Études en cours: <input class="form-control" type='text' id='yes' name='yes'>
                                        Nom de l'établissement:  <input class="form-control" type='text' id='acc' name='acc'>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <input type='radio' id='r13' name='occupation' value='Not-Working' required/> Demandeur.euse d'emploi
                    </div>
                </div>
                <script type="text/javascript">
                    $('#r11').on('click', function(){
                        $(this).parent().find('a').trigger('click')
                    })

                    $('#r12').on('click', function(){
                        $(this).parent().find('a').trigger('click')
                    })</script>

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

                        <div class="panel-group centre-interet" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                        <a data-toggle="collapse" data-parent="#accordion2" data-target="#collapseThree">
                                        <button type="button" class="btn btn-secondary dropdown-toggle" id="chk1" value=""> 
                                        Centres d'intérêts</button>
                                        </a>
                                </div>
                            </div></br>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="panel-body">
                                        <div class="centre-interet">

                                            <div class="checkbox">
                                                <input type="checkbox" class="ui-checkbox" id="chk2" value="" style="margin-right: 10px;">
                                                <label for="chk2">Programme complet des formations</label>
                                            </div>

                                            <div class="checkbox">
                                                <input type="checkbox" class="ui-checkbox" id="chk3" value="" style="margin-right: 10px;">
                                                <label for="chk3">Centres et plaines de vacances - Ateliers d’expression</label>
                                            </div>

                                            <div class="checkbox">
                                                <input type="checkbox" class="ui-checkbox" id="chk4" value="" style="margin-right: 10px;">
                                                <label for="chk4">Animateur volontaire de jeunesse</label>
                                            </div>

                                            <div class="checkbox">
                                                <input type="checkbox" class="ui-checkbox" id="chk5" value="" style="margin-right: 10px;">
                                                <label for="chk5">Animateur professionnel et animation de quartier</label>
                                            </div>

                                            <div class="checkbox">
                                                <input type="checkbox" class="ui-checkbox" id="chk6" value="" style="margin-right: 10px;">
                                                <label for="chk6">Coordinateur volontaire de jeunesse</label>
                                            </div>

                                            <div class="checkbox">
                                                <input type="checkbox" class="ui-checkbox" id="chk7" value="" style="margin-right: 10px;">
                                                <label for="chk7">Formation pour formateurs</label>
                                            </div>

                                            <div class="checkbox">
                                                <input type="checkbox" class="ui-checkbox" id="chk8" value="" style="margin-right: 10px;">
                                                <label for="chk8">Petite enfance</label>
                                            </div>

                                            <div class="checkbox">
                                                <input type="checkbox" class="ui-checkbox" id="chk9" value="" style="margin-right: 10px;">
                                                <label for="chk9">Enseignement</label>
                                            </div>

                                            <div class="checkbox">
                                                <input type="checkbox" class="ui-checkbox" id="chk10" value="" style="margin-right: 10px;">
                                                <label for="chk10">Accueillant(e) extra-scolaire</label>
                                            </div>

                                            <div class="checkbox">
                                                <input type="checkbox" class="ui-checkbox" id="chk11" value="" style="margin-right: 10px;">
                                                <label for="chk11">Formation de délégués d'élèves</label>
                                            </div>

                                            <div class="checkbox">
                                                <input type="checkbox" class="ui-checkbox" id="chk12" value="" style="margin-right: 10px;">
                                                <label for="chk12">Rencontres entre l'enseignement spécialete l'enseignement ordinaire</label>
                                            </div>

                                            <div class="checkbox">
                                                <input type="checkbox" class="ui-checkbox" id="chk13" value="" style="margin-right: 10px;">
                                                <label for="chk13">Handicap et intégration</label>
                                            </div>

                                            <div class="checkbox">
                                                <input type="checkbox" class="ui-checkbox" id="chk14" value="" style="margin-right: 10px;">
                                                <label for="chk14">Action sociale</label>
                                            </div>

                                            <div class="checkbox">
                                                <input type="checkbox" class="ui-checkbox" id="chk15" value="" style="margin-right: 10px;">
                                                <label for="chk15">Santé</label>
                                            </div>

                                            <div class="checkbox">
                                                <input type="checkbox" class="ui-checkbox" id="chk16" value="" style="margin-right: 10px;">
                                                <label for="chk16">Pédagogie</label>
                                            </div>

                                            <div class="checkbox">
                                                <input type="checkbox" class="ui-checkbox" id="chk17" value="" style="margin-right: 10px;">
                                                <label for="chk17">Jeunes enfants 2,5 - 8 ans</label>
                                            </div>

                                            <div class="checkbox">
                                                <input type="checkbox" class="ui-checkbox" id="chk18" value="" style="margin-right: 10px;">
                                                <label for="chk18">Audio-visuel</label>
                                            </div>

                                            <div class="checkbox">
                                                <input type="checkbox" class="ui-checkbox" id="chk19" value="" style="margin-right: 10px;">
                                                <label for="chk19">Activités théatrales, expression corporelle</label>
                                            </div>

                                            <div class="checkbox">
                                                <input type="checkbox" class="ui-checkbox" id="chk20" value="" style="margin-right: 10px;">
                                                <label for="chk20">Expression orale et écrite</label>
                                            </div>

                                            <div class="checkbox">
                                                <input type="checkbox" class="ui-checkbox" id="chk21" value="" style="margin-right: 10px;">
                                                <label for="chk21">Activités manuelles et plastiques</label>
                                            </div>

                                            <div class="checkbox">
                                                <input type="checkbox" class="ui-checkbox" id="chk22" value="" style="margin-right: 10px;">
                                                <label for="chk22">Découverte du milieu</label>
                                            </div>

                                            <div class="checkbox">
                                                <input type="checkbox" class="ui-checkbox" id="chk23" value="" style="margin-right: 10px;">
                                                <label for="chk23">Activités musicales</label>
                                            </div>

                                            <div class="checkbox">
                                                <input type="checkbox" class="ui-checkbox" id="chk24" value="" style="margin-right: 10px;">
                                                <label for="chk24">Jeux et activités physiques</label>
                                            </div>

                                            <div class="checkbox">
                                                <input type="checkbox" class="ui-checkbox" id="chk25" value="" style="margin-right: 10px;">
                                                <label for="chk25">Initiation technique et scientifique</label>
                                            </div>

                                            <div class="checkbox">
                                                <input type="checkbox" class="ui-checkbox" id="chk26" value="" style="margin-right: 10px;">
                                                <label for="chk26">Communication et gestion des groupes</label>
                                            </div>

                                            <div class="checkbox">
                                                <input type="checkbox" class="ui-checkbox" id="chk27" value="" style="margin-right: 10px;">
                                                <label for="chk27">Gestion et collectivité</label>
                                            </div>

                                            <div class="checkbox">
                                                <input type="checkbox" class="ui-checkbox" id="chk28" value="" style="margin-right: 10px;">
                                                <label for="chk28">Formation qualifiante</label>
                                            </div>

                                            <div class="checkbox">
                                                <input type="checkbox" class="ui-checkbox" id="chk29" value="" style="margin-right: 10px;">
                                                <label for="chk29">Pour une éducation à l'égalité des genres</label>
                                            </div>

                                            <div class="checkbox">
                                                <input type="checkbox" class="ui-checkbox" id="chk30" value="" style="margin-right: 10px;">
                                                <label for="chk30">Festival du film d'Éducation</label>
                                            </div>

                                            <div class="checkbox">
                                                <input type="checkbox" class="ui-checkbox" id="chk31" value="" style="margin-right: 10px;">
                                                <label for="chk31">Newsletter du secteur Numérique</label>
                                            </div>

                                            <script type="text/javascript">
                                                $('.collapse').collapse();
                                            </script>
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