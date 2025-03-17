<?php 

include "../Partials/header.php";


?>

    <div class="container">
        <div class="wrapper">
            <section class="register">
                
                <form method="POST" action="pdo.php">
                    <div class="inputbox">
                        <input type="surname" name="surname" id="surname" class="input-field" placeholder="Prénom" autocomplete="off"  required>
                    </div>
                    <div class="inputbox">
                        <input type="name" name="name" id="name" class="input-field" placeholder="Nom" autocomplete="off" required>
                    </div>
                    <div class="inputbox">
                        <input type="email" name="email" id="email" class="input-field" placeholder="Email" autocomplete="off" required>
                    </div>
                    <div class="inputbox">
                        <input type="password" name="password" id="password" class="input-field" placeholder="Mot de passe" autocomplete="off" required>
                    </div>

                    
                    <button type="submit" name="ok">CRÉE</button>
                    <div class="register">
                        <span>Déja un compte ?</span>
                        <a href="../CONNEXION/login.php">Connecté vous</a>
                </form>   
            </section>
        </div>
    </div>

<?php include "../Partials/footer.php"; ?> 