<html>

<head>
    <link rel="stylesheet" type="text/css" href="index.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Subrayada&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish&display=swap" rel="stylesheet">
    <title>header</title>
    <meta charset="utf-8">
</head>


<?php
session_start();
$connexion = mysqli_connect("localhost", "root", "", "blog");

if (isset($_SESSION['login'])) :


    $login = $_SESSION['login'];
    // var_dump($login);

    $sql = "SELECT id_droits FROM `utilisateurs` WHERE login = '$login'";
    $req = mysqli_query($connexion, $sql);
    // var_dump(mysqli_fetch_row($req));

    $iddroits = mysqli_fetch_row($req)[0];
    //var_dump($iddroits);

?>


    <div class="header">
        <ul id="menu-demo2">
            <li><a href="index.php">Acceuil</a></li>
            <li><a href="#">Modérateur</a> <ul></li>
           

                <?php

                //var_dump(['id_droits']);

                if ($iddroits == '42') {
                    echo '<li><a href="creer-article.php">Article</a></li>';
                } elseif ($iddroits == '1337') {
                    echo '<li><a href="admin.php">Admin</a></li>';
                    echo '<li><a href="creer-article.php">Article</a></li>';
                }
                
                ?>
</ul></li>

                

            <li><a href="profil.php">Profil </a></li>
            <li><a href="#">Categories</a>
                <ul>





                    <?php

                    ?>

                    <?php
                    $sql2 = "SELECT * FROM categories ";
                    $req2 = mysqli_query($connexion, $sql2);

                    while ($row = mysqli_fetch_array($req2)) {
                        echo '<li><a href="index.php?ctg=', $row['id'], '">' . $row['nom'] . '</a></li>';
                    }

                    ?>
                </ul>
            <li>
    </div>




    <form action="index.php" method="post">
        <div class="deco">
            <input type="submit" name='deconnexion' value="Deconnexion">
        </div>
        <?php if (isset($_POST['deconnexion'])) {
            session_unset();
            session_destroy();
            header('Location:index.php');
        }
        ?>
    </form>



    <?php// var_dump($_SESSION) ?>

<?php else : ?>

    <div class="header">
        <ul id="menu-demo2">
            <li><a href="index.php">Acceuil</a></li>
            <li><a href="inscription.php">Inscription</a></li>
            <li><a href="connexion.php">Connexion</a></li>
            <li><a href="#">Categories</a>
                <ul>

                    <?php
                    $sql2 = "SELECT * FROM categories ";
                    $req2 = mysqli_query($connexion, $sql2);

                    while ($row = mysqli_fetch_array($req2)) {
                        echo '<li><a href="index.php?ctg=', $row['id'], '">' . $row['nom'] . '</a></li>';
                    }

                    ?>
                </ul>
            <li>
    </div>




<?php endif; ?>