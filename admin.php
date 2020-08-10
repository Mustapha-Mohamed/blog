<html>

<head>
    <link rel="stylesheet" type="text/css" href="index.css" />
    <link rel=icon href="icon.png" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Subrayada&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish&display=swap" rel="stylesheet">
    <title>Admin</title>
    <meta charset="utf-8">
</head>

<body>
    <header>
        <?php include "header.php"; ?>
    </header>


    <main>
        <section>
            <h1>Admin</h1>

            <div class="formulaire">
                <div class="carré">
                    <form class="forme" method="post">

                        <h2>Article</h2>

                        <label for="login">Nouvelle catégorie :</label>
                        <input type="text" placeholder="Title" name="titre" />
                        <input type="submit" name="go" value="Envoyer" /><br>

                        <?php
                        if (isset($_POST["go"])) {
                            $titre = $_POST["titre"];
                            $connexion = mysqli_connect("localhost", "root", "", "blog");
                            $requete = "INSERT INTO `categories` (`id`,`nom`) VALUES (NULL,'" . $titre . "')";
                            $query = mysqli_query($connexion, $requete);
                        }
                        ?>

                        <label for="login">Supprimer Categorie :</label>
                        <input type="text" placeholder="Delete Category" name="ctg" />
                        <input type="submit" name="sup" value="Supprimer" /><br>

                        <?php
                        if (isset($_POST['sup'])) {
                            $base = mysqli_connect("localhost", "root", "", "blog");
                            $ctg = $_POST['ctg'];
                            $delete = "DELETE FROM `categories` WHERE nom='$ctg'";
                            $quer = mysqli_query($base, $delete);
                            echo "<p class='bug'>$ctg supprimée avec succès !</p>";
                        }
                        ?>

                        <label for="login">Supprimer Article :</label>
                        <input type="text" placeholder="Delete Article" name="suppu" />
                        <input type="submit" name="suppu" value="Supprimer" /><br>

                        <?php
                        if (isset($_POST['suppu'])) {
                            $base = mysqli_connect("localhost", "root", "", "blog");
                            $article = $_POST['article'];
                            $delet = "DELETE FROM `articles` WHERE titre='$article'";
                            $quer = mysqli_query($base, $delet);
                            echo "<p class='bug'>$article supprimée avec succès !</p>";
                        }
                        ?>

                        <h2>Utilisateurs</h2>

                        <label for="login">Supprimer Utilisateur :</label>
                        <input type="text" placeholder="Delete Users" name="supp" />
                        <input type="submit" name="supp" value="Supprimer" /><br>

                        <?php
                        if (isset($_POST['supp'])) {
                            $base = mysqli_connect("localhost", "root", "", "blog");
                            $utilisateur = $_POST['utilisateur'];
                            $dele = "DELETE FROM `utilisateurs` WHERE login='$utilisateur'";
                            $quer = mysqli_query($base, $dele);
                            echo "<p class='bug'>$utilisateur supprimée avec succès !</p>";
                        }
                        ?>

                        <label for="login">Gestion des Droits :</label>
                        <input type="text" name="login" placeholder="Login" />
                        <input type="text" name="id" placeholder="ID" />
                        <input type="submit" name="modif" value="Modifier" />

                        <?php
                        if (isset($_POST['modif'])) {
                            $id = $_POST['id'];
                            $login = $_POST['login'];
                            $base = mysqli_connect("localhost", "root", "", "blog");
                            $insert = "UPDATE utilisateurs SET id_droits = '$id' WHERE login = '$login'";
                            $result = mysqli_query($connexion, $insert);
                            echo '<p class="bug">modifier avec succés</p>';
                        }
                        ?>

                        <br>
                        <input class="boutton" type="submit" value="Valider" name="connexion">
                    </form>
                </div>
            </div>

            <footer>
                <?php include "footer.php"; ?>
            </footer>
    </main>
</body>

</html>