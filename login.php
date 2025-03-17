<?php include "Partials/header.php" ?>

<div class="container">
        <div class="wrapper">
            <section class="Login">
                <h1 id="connexion">Connexion</h1>
               
                <form method="POST" action="pdoconnexion.php">
                    <div class="inputbox">
                        <input type="text" name="email" id="email" class="input-field" placeholder="Email" autocomplete="off"  required>
                        
                    </div>
                    <div class="inputbox">
                        <input type="password" name="password" id="password" class="input-field" placeholder="Mot de passe" autocomplete="off" required>
                    </div>
                    <button type="submit", name="submit">CONNEXION</button>
                    <div class="register">
                        <span>Pas de compte ?</span>
                        <a href="register.php">Crée un compte</a>
                        
                    </div>
                </form>
            </section>
        </div>
    </div>

<?php include "Partials/footer.php"; ?> 

