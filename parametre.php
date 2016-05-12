<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
	<head>
		<title>PassChanger</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet"type="text/css"href="designform.css">
</head>

    <?php
    require('cpasbien.php');

    if(isset($_POST['password']) && isset($_POST['newPassword'])&& isset($_POST['newPassword2'])
    && $_POST['password'] == $passwordConfirmed
    && $_POST['newPassword'] === $_POST['newPassword2']){
        $passwordConfirmed = $_POST['newPassword'];

        file_put_contents('tresSensible.json', "{\"password\":".json_encode($passwordConfirmed)."}");


        var_dump(file_get_contents("tresSensible.json"));
        echo "Nouveau mot de passe";
    }
    ?>
    <body>

<form class="field" method="post">
            <label for="password">Password</label>
            <input name="password" type="password" id="password" placeholder="Password" />

            <label for="password">Password</label>
            <input name="newPassword" type="password" id="password" placeholder="Nouveau Mot de Passe" />

            <label for="password">Password</label>
            <input name="newPassword2" type="password" id="password" placeholder="Confirmation Nouveau Mot de Passe" />

    <div class="buttonPart">
        <input type="submit"><span>Connexion</span></input><p></p>
    </div>
</form>

</body>
</html>