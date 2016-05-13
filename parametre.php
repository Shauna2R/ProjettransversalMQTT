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

<?php
//Ajouter groupe
if(isset($_POST['groupe']) && $_POST["groupecree"] == true){
    json_encode(array_push($groupeName,$_POST["groupe"]));
    file_put_contents('groupe.json', "{\"name\":".json_encode($groupeName)."}");
    echo "Nouveaugroupe crée";
}
?>

<form class="field" method="post">

<label for="Creer groupe">Groupe</label>
<input name="groupe" type="text" id="groupe" placeholder="" />

<div class="buttonPart">
    <input type="submit" name="groupecree"><span>Connexion</span></input><p></p>
</div>
</form>

<table style="border: solid red 2px">
    <tr>Nom des Groupes</tr>
    <?php
    //lister groupe
    $acc = 0;
    foreach($groupeName as $groupe){?>
        <td style="border: solid red 1px"><?php echo $groupe; ?></td>
        <td> <form method="post"><input type="submit" value="supprimer" name="supprimer"></form></input> </td>
    <?php
        $acc+=1;
    }?>
</table>

    <?php
    //supprimer groupe
    if($_POST["supprimer"]){
        unset($groupeName[$acc-1]);
    }
    var_dump($groupeName);
    file_put_contents('groupe.json', "{\"name\":".json_encode($groupeName)."}");
?>


</body>
</html>


