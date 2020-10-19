<!DOCTYPE html>
<html>
  <head>
    <title></title>
  </head>
    <body>
      <div class="jumbotron">
      <div class="container">
      <div class="tab-content">
        <div id="signup">   
          <h1>S'inscrire</h1>

            <form action="/" method="post">

              <div class="top-row">
                <div class="field-wrap">
                  <label>Prénom<span class="req">*</span></label>
                    <input type="text" required autocomplete="off" />
                </div>
        
                <div class="field-wrap">
                  <label>Nom<span class="req">*</span></label>
                    <input type="text"required autocomplete="off"/>
                </div>
              </div>

                <div class="field-wrap">
                  <label>Adresse E-mail<span class="req">*</span></label>
                    <input type="email"required autocomplete="off"/>
                </div>
          
                <div class="field-wrap">
                  <label>Définir un mot de passe<span class="req">*</span></label>
                    <input type="password"required autocomplete="off"/>
                </div>
          
              <button type="submit" class="button button-block"/>Envoyer</button>

            </form>
        </div>
        
        <div id="login">   
          <h1>Se connecter</h1>
          
            <form action="/" method="post">

              <div class="field-wrap">
                <label>Adresse E-mail<span class="req">*</span></label>
                  <input type="email"required autocomplete="off"/>
              </div>
          
              <div class="field-wrap">
                <label>Mot de passe<span class="req">*</span></label>
                  <input type="password"required autocomplete="off"/>
              </div>
          
                <p class="forgot"><a href="#">Mot de passe oublié?</a></p>
          
              <button class="button button-block"/>Se connecter</button>

            </form>
          </div>
        </div>
    </body>
</html>