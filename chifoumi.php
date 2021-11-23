<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Chifoumi</title>
        
            <style type="text/css">
            /* DISSIMULER LES BOUTONS RADIO */
            [type=radio] { 
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
            }

            /* IMAGE STYLES */
            [type=radio] + img {
            cursor: pointer;
            }

            /* CHECKED STYLES */
            [type=radio]:checked + img {
            outline: 2px solid black;
            }
            </style>
    </head>

    <body>
<!--FORMULAIRE-->
    
       <h1>Bienvenue sur Chifoumi !</h1>
        <form name="formulaire_456" method="post" action="chifoumi.php">
            <label><h2>Le joueur 1 sera connu sous le pseudo de :
            <input type="text" name="nomjoueur1" placeholder="nom par défaut IDA" value="<?php if (isset($_POST["nomjoueur1"])) {echo $_POST["nomjoueur1"];} ?>"/><br> </h2></label>
            <h2><br>Quel signe voulez-vous jouer ?</h2>
            <label><input type="radio" name="signeJ1" value="0" checked><img src="pierrej1.png"></label>
            <label><input type="radio" name="signeJ1" value="1"> <img src="feuillej1.png"></label>
            <label><input type="radio" name="signeJ1" value="2"> <img src="ciseauxj1.png"><br></label>
            <input type="submit" name="valider" value="JOUER"/>
        </form>

<?php 
// NOMS DES JOUEURS
if(empty($_POST["nomjoueur1"])){
    $nomJoueur1 = "IDA";
} else {
    $nomJoueur1 = $_POST["nomjoueur1"];
}
$nomJoueur2 = "Skynet";

if(isset($_POST['valider'])){

// CHOIX SIGNES JOUEUR 1
$mainJ1 = $_POST["signeJ1"];

$testsigneJ1 = $_POST["signeJ1"];
    if ($testsigneJ1 == 0){
        $signeJ1 = "<img src='pierrej1.png'/>";
    } else if ($testsigneJ1 ==1){
        $signeJ1 =  "<img src='feuillej1.png'/>";
    } else if ($testsigneJ1 == 2) {
        $signeJ1 = "<img src='ciseauxj1.png'/>";
    }

// CHOIX SIGNES JOUEUR 2
$signeJ2 = array ("0" => "<img src='pierrej2.png'/>", "1" =>"<img src='feuillej2.png'/>", "2" => "<img src='ciseauxj2.png'/>");
$mainJ2 = array_rand($signeJ2,1);

// RECUPERATION DES SIGNES DES JOUEURS
$choixJ1 = $signeJ1;
$choixJ2 = $signeJ2[$mainJ2];

// PREPARATION AFFICHAGE DES RESULTATS
$j1 = "$nomJoueur1 qui a joué $choixJ1";
$j2 = "$choixJ2 jouée par $nomJoueur2";

// COMPARAISON ET AFFICHAGE DES CHOIX DES JOUEURS
    if ($mainJ1 == $mainJ2){
        echo "$j1 fait <b>égalité</b> avec $j2 !";
        } elseif ($mainJ1 == 0 AND $mainJ2 == 2){
            echo "$j1 <b>gagne</b> face à $j2 !";
        } elseif ($mainJ2 == 0 AND $mainJ1 == 2){
            echo "$j1 <b>perd</b> face à $j2 !";
        } elseif ($mainJ1 < $mainJ2){
            echo "$j1 <b>perd</b> face à $j2 !";
        } elseif ($mainJ1 > $mainJ2) {
            echo "$j1 <b>gagne</b> face à $j2 !";
    }
}
?>
    </body>
    </html>