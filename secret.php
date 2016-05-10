<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Codes d'accès au serveur projet transversal</title>
</head>
<body>

<?php
if (isset($_POST['mot_de_passe']) AND $_POST['mot_de_passe'] ==  "password") // Si le mot de passe est bon
{
    // On affiche les codes
    ?>

    <link href="index.html">

    <p>
        Cette page est réservée à l'équipe du projet transversal.<br />
        Nous vous remercions de votre visite.
    </p>
    <?php
}
else // Sinon, on affiche un message d'erreur
{
    echo '<p>Mot de passe incorrect</p>';
}
?>


</body>
</html>