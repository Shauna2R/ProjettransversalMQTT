<!doctype html>
<html lang="fr" class="no-js">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<style>

    body {
        background-image: url('img/WallpaperPortrait.jpg');
        height: 100%;
        position: static;
        background-size: cover;
    }

    .login {
        margin: 10% auto;
        width: 300px;
        background: white;
        box-shadow: 0 0 10px #000000;
    }

    .login .head,
    .login .body {
        padding: 10px;
    }

    .login .head {
        background: rgba(255, 81, 12, 0.87) ;
    }

    .login h1 {
        font-family: Helvetica, Arial, Verdana, 'sans-serif';
        font-weight: normal;
        margin: 0;
        color: #000000;
        text-align: center;
    }

    .login h1 i {
        margin-right: 10px;
    }

    .field {
        margin: 10px 0 10px;
    }

    .field:first-child {
        margin-top: 0;
    }

    .field label {
        position: absolute;
        width: 0;
        height: 0;
        overflow: hidden;
    }

    .field input {
        display: block;
        text-align: center;
        margin: 0;
        width: 93%;
        border: 1px solid #CCC;
        border-width: 0 0 1px 0;
        padding: 10px;
        font-size: 16px;
        outline: none;
        color: #333;
    }

    .field input:focus {
        border-color: #5ca941;
    }

    .MauvaisPassword{
        color: red;
        text-align: center;
    }

    .photoEquipe{
        overflow:hidden;
        -webkit-border-radius:50px;
        -moz-border-radius:50px;
        border-radius:50px;
        width:90px;
        height:90px;
    }

    /*.field input::-webkit-input-placeholder {
    color: #60b044;
    }*/

    .buttonPart {
        margin-top: 20px;
    }

    button {
        cursor: pointer;
        display: block;
        width: 100%;
        padding: 10px;
        border: none;
        font-size: 13px;
        font-weight: bold;
        color: #333;
        text-shadow: 0 1px 0 rgba(255, 255, 255, 0.9);
        background-color: #eee;
        background-image: -webkit-linear-gradient(#fcfcfc, #eee);
        background-image: linear-gradient(#fcfcfc, #eee);
        background-repeat: repeat-x;
        border: 1px solid #d5d5d5;
        border-radius: 3px;
    }

    button:hover {
        background-color: #ddd;
        background-image: -webkit-linear-gradient(#eee, #ddd);
        background-image: linear-gradient(#eee, #ddd);
        background-repeat: repeat-x;
        border-color: #ccc;
    }

    @media only screen and (min-width: 1170px) {
        body {
            background-image: url('img/intro-background.jpg');
            max-height: 100%;
            position: static;
            background-size: cover;
        }


</style>


<?php require('cpasbien.php')?>

<form class="login" method="post">
    <div class="head">
        <h1><i class="fa fa-cloud"></i></h1>
    </div>
    <div class="body">
        <div class="field">
            <h1>DreamTeam</h1>
        </div>
        <div class="field">
            <label for="password">Password</label>
            <input name="password" type="password" id="password" placeholder="Password" />
            <?php
            if (isset($_POST['password']) AND $_POST['password'] == $passwordConfirmed)
            {
                header( "Location: index.html");
                // On affiche les codes
            }
            else if(isset($_POST['password']) AND $_POST['password'] != $passwordConfirmed){

                echo '<p class="MauvaisPassword">Mot de passe incorrect. Veuillez réessayer.</p>';}
            ?>

        </div>
        <div class="buttonPart">
            <button type="submit"><span>Connexion</span></button><p></p>
        </div>
    </div>
</form>
