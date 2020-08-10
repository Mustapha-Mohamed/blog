<html>

<head>
    <link rel="stylesheet" type="text/css" href="index.css" />
    <link rel=icon href="icon.png" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Subrayada&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish&display=swap" rel="stylesheet">
    <title>Article</title>
    <meta charset="utf-8">
</head>

<body>
    <main>

        <header>
            <?php include "header.php"; ?>
        </header>
        <main>

            <?php
            $connexion = mysqli_connect("localhost", "root", "", "blog");
            $uti = "SELECT * FROM articles ORDER BY date DESC";
            $uti2 = mysqli_query($connexion, $uti);
            while ($data = mysqli_fetch_array($uti2)) {
            }
            ?>
            <div class="commentaire">

                <?php //include('Commentaire.php') 
                ?>

            </div>
        </main>

        <footer>
            <?php include "footer.php"; ?>
        </footer>
    </main>
</body>

</html>