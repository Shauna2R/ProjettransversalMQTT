    function VerifCookie(Name) {
        var search = Name + "="

        offset = document.cookie.indexOf(search)
        if (offset != -1) {

// si le cookie recherché existe... bah rien...


        }
        else {

//le cookie n'existe pas, on le crée et on affiche un message
            document.cookie="Cookie_Visite=oui";
            document.location.href="Connexion.php";
        }
    }