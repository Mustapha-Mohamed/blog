<html>

<head>
    <link rel="stylesheet" type="text/css" href="index.css" />
    <link rel=icon href="icon.png" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Subrayada&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Enriqueta&display=swap" rel="stylesheet">
    <title>Articles</title>
    <meta charset="utf-8">
</head>

<header>
    <?php include "header.php"; ?>
</header>


<body>
    <main>
        <div class="article">
            <?php
            $id = $_GET["id"];
            $connexion = mysqli_connect("localhost", "root", "", "blog");
            $sql = 'SELECT article from articles  WHERE id="' . $_GET['id'] . '" ';
            $query = mysqli_query($connexion, $sql);

            //var_dump($sql);

            while ($row = mysqli_fetch_array($query)) {

                echo '<article>"' . ($row["article"]) . '""';
            }
            ?>
        </div>
        <br>

        <?php


        $id = $_GET['id'];


        $connexion = mysqli_connect("localhost", "root", "", "blog");
        $sql2 = "SELECT commentaires.id, commentaires.commentaire, commentaires.id_utilisateur,commentaires.id_article,
						commentaires.date, utilisateurs.login FROM commentaires INNER JOIN utilisateurs 
						WHERE  commentaires.id_utilisateur = utilisateurs.id 
                        AND id_article='$id'  ORDER BY date DESC ";
        $req2 = mysqli_query($connexion, $sql2);;
        // var_dump($sql2);



        while ($req = mysqli_fetch_array($req2)) {
        ?>
            <section class="carré">
                <section class="users">
                    <?php echo $req['login']; ?></p>
                </section>

                <section class="commentaire">
                    <?php echo $req['commentaire']; ?></p>
                </section>

                <section class="heure">
                    <?php echo $req['date']; ?></span>
                </section>
            </section>
            <br>
        <?php
        }


        ?>


        <section class="titre">
            <form method="post">
                <legend class='rep'>Commentaire :</legend>



                <textarea name="message" maxlength="300" placeholder="Commentaire"></textarea>
                <input type="hidden" name="sujets" value="<?php echo $_GET['id']; ?>"><br><br>
                <input class="boutton" type="submit" name="submit" value="Envoyer">
                <br>


            </form>
        </section>


        <?php
        if (isset($_POST['submit'])) {


            $auteur = $_SESSION['id'];

            $message = $_POST['message'];
            
            $connexion = mysqli_connect("localhost", "root", "", "blog");
            $sql = "INSERT INTO `commentaires` (`id`, `commentaire`, `id_article`, `id_utilisateur`, `date`)
        VALUES (NULL,'$message','$id','$auteur', CURRENT_TIMESTAMP())";
            $query = mysqli_query($connexion, $sql);
            header("Location: articles.php?id=$id");
            //var_dump($sql);

        } else {
        }

        ?>


        <footer>
            <?php include "footer.php"; ?>
        </footer>
    </main>
</body>

</html>