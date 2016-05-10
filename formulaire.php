<?php  <?php
 $base = mysql_connect ('localhost', '****', '*****');
            mysql_select_db ('*****', $base);
session_start() ;
 // on teste si notre variable est d&eacute;clar&eacute;e
 if (isset($_SESSION['login'])) {

     // lancement de la requ&ecirc;te
     $sql = 'SELECT login, pass_md5 FROM membre WHERE login = "'.$_SESSION['login'].'"';

     // on lance la requ&ecirc;te (mysql_query) et on impose un message d'erreur si la requ&ecirc;te ne se passe pas bien (or die)
     $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());

     // on r&eacute;cup&egrave;re le r&eacute;sultat sous forme d'un tableau
     $data = mysql_fetch_array($req);

     // on lib&egrave;re l'espace m&eacute;moire allou&eacute; pour cette interrogation de la base
     mysql_free_result ($req);

     // on teste si les variables du formulaire sont d&eacute;clar&eacute;es
     if (isset($_POST['newpass']) && isset($_POST['newpass_confirm'])){

         // on teste les deux mots de passe
         if ($_POST['newpass'] != $_POST['newpass_confirm']) {
             $erreur = 'Les 2 mots de passe sont diff&eacute;rents.';

             // lancement de la requ&ecirc;te
             $sql = 'UPDATE membre SET pass_md5="'.$_POST['newpass'].'" WHERE login="'.$_POST['login'].'"';

             // on ex&eacute;cute la requ&ecirc;te (mysql_query) et on affiche un message au cas o&ugrave; la requ&ecirc;te ne se passait pas bien (or die)
             mysql_query($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());

             // on ferme la connexion &agrave; la base
             mysql_close();
             // on redirige vers la page d'accueil du site
             header('Location: membre.php');
         }
     }
 }
?>


<h1>MODIFIER VOTRE MOT DE PASSE<h1><table class="wg-paragraph" cellspacing="2" width="100%"><tr><td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td valign="top"><a name="bv000002"></a></td></tr><tr><td><table width="100%"><tr><td valign="top"><a name="bv000001"></a>
                                            <html>
                                            <head>
                                                <title>Accueil</title>

                                                <link rel="stylesheet" media="screen" type="text/css" title="Inscription" href="formulaire.css" />

                                            </head>

                                            <body>
                                            <form action="modifiermotdepasse.php" method="post"
                                            <table  >
                                                <tr>
                                                    <td align="right">Pseudo</td>
                                                    <td><td align="left"><input type="text" name="login" value="<?php echo $data['login']; ?>"</td>
                                                </tr>
                                                <tr>
                                                <tr>
                                                    <td align="right">Nouveau Mot de Passe</td>
                                                    <td><td align="left"><input type="password" name="newpass" value="<?php if (isset($_POST['newpass'])) echo htmlentities(trim($_POST['newpass'])); ?>"></td>
                                                </tr>
                                                <tr>
                                                <tr>
                                                    <td align="right">Confirmation Nouveau Mot de Passe</td>
                                                    <td><td align="left"><input type="password" name="newpass_confirm" value="<?php if (isset($_POST['newpass_confirm'])) echo htmlentities(trim($_POST['newpass_confirm'])); ?>"></td>
                                                </tr>
                                                <tr>
                                                <tr>
                                                    <td colspan="2"><td align center><input type="submit" name="modifiermotdepasse" value="Modifier mot de passe"></td></tr>
                                            </table>
                                            </form>
                                            <?php
                                            if (isset($erreur)) echo '<br />'.$erreur;
                                            ?>
                                            </body>
                                            </html>

                                            ?>