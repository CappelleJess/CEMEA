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
                    $err_prénom = "Veuillez renseigner ce champs!";
                }

                if(empty($nom)){
                    $valid = false;
                    $err_nom = "Veuillez renseigner ce champs!";
                }

                if(empty($email)){
                    $valid = false;
                    $err_email = "Veuillez renseigner ce champs!";
                }

                if(empty($genre)){
                    $valid = false;
                }

                if($jour <= 0 || $jour < 31){
                    $valid = false;
                    $err_jour = "Veuillez renseigner ce champs!";
                }

                if($mois <= 0 || $mois < 12){
                    $valid = false;
                    $err_mois = "Veuillez renseigner ce champs!";
                }

                if($annee <= 1960 || $annee < 2002){
                    $valid = false;
                    $err_annee = "Veuillez renseigner ce champs!";
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
                    $err_lieu = "Veuillez renseigner ce champs!";
                    }
                if(empty($adresse)){
                    $valid = false;
                    $err_adresse = "Veuillez renseigner ce champs!";
                }
                if(empty($numero)){
                    $valid = false;
                    $err_numero = "Veuillez renseigner ce champs!";
                }
                if(empty($code_postal)){
                    $valid = false;
                    $err_code_postal = "Veuillez renseigner ce champs!";
                }
                if(empty($localite)){
                    $valid = false;
                    $err_localite = "Veuillez renseigner ce champs!";
                }
                if(empty($pays)){
                    $valid = false;
                    $err_pays = "Veuillez renseigner ce champs!";
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
                    $err_occupation = "Veuillez renseigner ce champs!";
                }
                

                if($valid) {
                    $date_inscription = date("Y-m-d");

                    $req = $BDD->prepare("INSERT INTO inscription(prénom, nom, email, genre, date_naissance, lieu_naissance, adresse, numero, code_postal, localite, pays, telephone, gsm, fax, occupation, date_inscription VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

                    $req->execute(array($prénom, $nom, $email, $genre, $date_naissance, $lieu_naissance, $adresse, $numero, $code_postal, $localite, $pays, $telephone, $gsm, $fax, $occupation, $date_inscription));
                    }
                }   
            }
?>

<!DOCTYPE html>
<html>
    <head>
    </head>
        <body>
             <main role="main">
                <div class="jumbotron">
                    <div class="container">
        <form method="post">
            <section>
                <div>
                    <?php
                        if(isset($err_prénom)){
                            echo $err_prénom;                        
                        } 
                    ?>
                    <input type="text" name="prénom" placeholder="Prénom*">
                </div>
                <div>
                    <?php
                        if(isset($err_nom)){
                            echo $err_nom;                        
                        } 
                    ?>
                    <input type="text" name="nom" placeholder="Nom*">
                </div>
                <div>
                    <?php
                        if(isset($err_email)){
                            echo $err_email;                        
                        } 
                    ?>
                    <input type="text" name="email" placeholder="Adresse E-mail*">
                </div>
                <div>
                    <?php
                        if(isset($err_genre)){
                            echo $err_genre;                        
                        } 
                    ?>
                    <select name="genre">
                        <option style="display:none;" selected>Genre</option>
                        <option value="2">Femme</option>
                        <option value="3">Homme</option>
                        <option value="4">Autre</option>
                    </select>
                </div>                
                <div>
                    <?php
                        if(isset($err_date)){
                            echo $err_date;                        
                        } 
                    ?>
                    <select name="jour">
                        <?php 
                            for($i = 1; $i<= 31; $i++){
                        ?>
                        <option style="display:none;" selected>Jour</option>
                        <option value="Jour; <?= $i ?>"><?= $i ?></option>
                        <?php
                            }
                        ?>
                    </select>
                    <select name="mois">
                        <?php 
                            for($i = 1; $i<= 12; $i++){
                        ?>
                        <option style="display:none;" selected>Mois</option>
                        <option value="Mois; <?= $i ?>"><?= $i ?></option>
                        <?php
                            }
                        ?>
                    </select>
                    <select name="annee">
                        <?php 
                            for($i = 1960; $i<= 2002; $i++){
                        ?>
                        <option style="display:none;" selected>Année</option>
                        <option value="Année; <?= $i ?>"><?= $i ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>                
                <div>
                    <?php
                        if(isset($err_lieu)){
                            echo $err_lieu;                        
                        } 
                    ?>
                    <input type="text" name="lieu_naissance" placeholder="Lieu de naissance">
                </div>
                <div>
                    <?php
                        if(isset($err_adresse)){
                            echo $err_adresse;
                        }
                    ?>
                    <input type="text" name="adresse" placeholder="Adresse*">
                </div>
                <div>
                    <?php
                        if(isset($err_numero)){
                            echo $err_numero;
                        }
                    ?>
                    <input type="text" name="numero" placeholder="N°*">
                </div>
                <div>
                    <?php
                        if(isset($err_code_postal)){
                            echo $err_code_postal;
                        }
                    ?>
                    <input type="text" name="code_postal" placeholder="Code Postal*">
                </div>
                <div>
                    <?php
                        if(isset($err_localite)){
                            echo $err_localite;
                        }
                    ?>
                    <input type="text" name="localite" placeholder="Localité*">
                </div>
                <div>
                    <?php
                        if(isset($err_pays)){
                            echo $err_pays;
                        }
                    ?>
                    <input type="text" name="pays" placeholder="Pays">
                </div>
                <div>
                    <?php
                        if(isset($err_telephone)){
                            echo $err_telephone;
                        }
                    ?>
                    <input type="text" name="telephone" placeholder="Téléphone">
                </div>
                <div>
                    <?php
                        if(isset($err_gsm)){
                            echo $err_gsm;
                        }
                    ?>
                    <input type="text" name="gsm" placeholder="GSM">
                </div>
                <div>
                    <?php
                        if(isset($err_fax)){
                            echo $err_fax;
                        }
                    ?>
                    <input type="text" name="fax" placeholder="Fax">
                </div>
                <div>
                    <?php
                        if(isset($err_occupation)){
                            echo $err_occupation;                        
                        } 
                    ?>
                    <label>Occupation:</label>
                    <select name="occupation" id="occupation" onChange="getElementById('OCCUPATION_ID').value = this.value">
                        <option style="display:none;" selected=""></option>
                        <option value="2">Etudiant</option>
                        <option value="3">Travailleur</option>
                        <option value="4">Demandeur d'emploi</option>
                        <input type="text" name="OCCUPATION_ID" id="OCCUPATION_ID" value=""/>
                    </select>
                </div>
            </section>
            <input type="submit" name="inscription" value="Envoyer">
            <input type="button" onclick="history.back()" value="Retour">
        </form>
    </div>
</div>
</main>
    </body>
</html>