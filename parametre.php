<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd >
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
	<head>
		<title>PassChanger</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet"type="text/css"href="designform.css">
</head>
<body>
<?php
    require('Warning.php');
    if(isset($_POST['password']) && isset($_POST['newPassword'])&& isset($_POST['newPassword2'])
    && $_POST['password'] === $password
    && $_POST['newPassword'] === $_POST['newPassword2']){
        $password = $_POST['newPassword'];
        echo "Nouveau mot de passe";
    }
?>

<form class="field" method="post">
            <label for="password">Password</label>
            <input name="password" type="password" id="password" placeholder="Password" />

            <label for="password">Password</label>
            <input name="newPassword" type="password" id="password" placeholder="Nouveau Mot de Passe" />

            <label for="password">Password</label>
            <input name="newPassword2" type="password" id="password" placeholder="Confirmation Nouveau Mot de Passe" />
</form>

<div class="buttonPart">
    <button type="submit"><span>Connexion</span></button><p></p>
</div>

</body>
</html>