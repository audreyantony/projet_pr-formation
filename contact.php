<?php
/* DÉCLARATION DE L'ADRESSE MAIL */
$VotreAdresseMail="audrey@calzi.fr";//ADRESSE MAIL PERSO
$email="mariejacynthe@delamotte.com";

if(isset($_POST['envoyer'])) { //BOUTON ENVOYER APPUYÉ
    //VÉRIFICATION DU CHAMP MAIL
    if(empty($_POST['mail'])) {
        echo "Le champ mail est vide";

    } else {
        //VÉRIFICATION DU CONTENU DU CHAMP MAIL
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "L'adresse mail entrée est incorrecte";

        }else{
            //VÉRIFICATION DU CHAMP SUJET
            if(empty($_POST['prenom'])) {
                echo "Le champ sujet est vide";

            }else{
                //VÉRIFICATION DU CHAMP MESSAGE
                if(empty($_POST['question'])) {
                    echo "Le champ message est vide";

                }else{
                    //SI TOUT EST BON => SEND

                    //on renseigne les entêtes de la fonction mail de PHP
                    $Entetes = "MIME-Version: 1.0\r\n";
                    $Entetes .= "Content-type: text/html; charset=UTF-8\n";
                    $Entetes .= "From: preforming. <".$_POST['mail'].">\r\n";
                    $Entetes .= "Reply-To: preforming. <".$_POST['mail'].">\r\n";
                    //SÉCURISATION DES CHAMP :
                    $mail=htmlentities($_POST['mail'],ENT_QUOTES,"UTF-8"); 
                    $prenom=htmlentities($_POST['prenom'],ENT_QUOTES,"UTF-8");
                    $question=htmlentities($_POST['question'],ENT_QUOTES,"UTF-8");

                    //ENVOI DU MAIL :
                    if(mail($VotreAdresseMail,$prenom,nl2br($question),$Entetes)) { 
                    //NL2BR = SAUT DE LIGNE CONSERVÉ 
                    //urf8_encode =  CONSERVE LES ACCENTS
                        echo "Le mail à été envoyé avec succès !";

                    } else {
                        echo "Une erreur est survenue, le mail n'a pas été envoyé";
                    }
                }
            }
        }
    }
}
?>