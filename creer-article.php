<html>

<head>
    <link rel="stylesheet" type="text/css" href="index.css" />
    <link rel=icon href="icon.png" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Subrayada&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish&display=swap" rel="stylesheet">
    <title>Creér Article</title>
    <meta charset="utf-8">
</head>

<body>
    <main>

        <header>
            <?php include "header.php"; ?>
        </header>


        <h1>Acceuil</h1>
        <div class="carré">
            <form class="formco" method="POST" action="">

                <input type="text" placeholder="Title Article" name="titre" required />
                <br>
                <label for="text"> Contenue de l'Article :</label>
                <br>
                <textarea id="article" name="user_article" required></textarea>
                <br>

                <label for="categorie"> Catégories :</label>
                <br><SELECT name="categorie">
                    <OPTION>Buzz de fou
                    <OPTION>actu Foot
                    <OPTION>Marseille fait divers
                </SELECT>

                <br><br>
                <input class="boutton" type="submit" value="Envoyer votre article" name="envoyer" />

            </form>
        </div>

        <footer>
            <?php include "footer.php"; ?>
        </footer>
    </main>
</body>

</html>



<?php

if (isset($_POST['envoyer'])) {

    $connexion = mysqli_connect("localhost", "root", "", "blog");


    $utilisateur = $_SESSION['login'];
    $titre = $_POST['titre'];
    $article = $_POST['user_article'];
    $categorie = $_POST['categorie'];



    // 1) REQ ID UTILISATEUR
    $requsers = "SELECT id FROM utilisateurs WHERE login = '$utilisateur'";
    $query = mysqli_query($connexion, $requsers);
    $execq = mysqli_fetch_array($query);
    $id_utilisateur = $execq['id'];



    // 2) REQ ID CATEGORIE
    $reqcategorie = "SELECT * FROM categories WHERE nom = '$categorie'";
    $query = mysqli_query($connexion, $reqcategorie);
    $execq2 = mysqli_fetch_array($query);
    $id_categorie = $execq2['id'];

    $requete = "INSERT INTO `articles` (`article`, `id_utilisateur`, `id_categorie`, `date`) VALUES  ('$article','$id_utilisateur','$id_categorie',now())";
    $resultat = mysqli_query($connexion, $requete);
    $identifiant = mysqli_insert_id($connexion);
    var_dump($id_categorie);
    mysqli_close($connexion);

    header("Location: index.php");
}
?>