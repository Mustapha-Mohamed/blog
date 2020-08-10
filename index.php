<html>

<head>
    <link rel="stylesheet" type="text/css" href="index.css" />
    <link rel=icon href="icon.png" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Subrayada&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish&display=swap" rel="stylesheet">
    <title>Accueil</title>
    <meta charset="utf-8">
</head>

<body>
    <main>

        <header>
            <?php include "header.php"; ?>
        </header>
        <?php


$limite = 4;
				if (isset($_GET["page"]))
				{
					$page  = $_GET["page"];
				}
				 else
				{ 
					$page=1;
				};			
						$debut = ($page-1) * $limite;


        if (isset($_GET["ctg"])) {
            $id = $_GET['ctg'];
            $uti = "SELECT * FROM articles  WHERE id_categorie= '$id' ORDER BY date DESC LIMIT $debut, $limite ";   
            $pg = "SELECT COUNT(id) FROM articles where id_categorie='$id'";
            $pg2 = mysqli_query($connexion, $pg);
            $row = mysqli_fetch_row($pg2);
            $total = $row[0];
					$total_pages = ceil($total / $limite);

        } else {
            $uti = "SELECT * FROM articles ORDER BY date DESC  LIMIT $debut, $limite ";
            $pg = "SELECT COUNT(id) FROM articles";
            $pg2 = mysqli_query($connexion, $pg);
            $row = mysqli_fetch_row($pg2);
            $total = $row[0];
					$total_pages = ceil($total / $limite);

        }

        $uti2 = mysqli_query($connexion, $uti); ?>

        <?php
        ?> <h1>Acceuil</h1>
        <div class="carré">Nous vous souhaitons la bienvenue sur notre Blog.
            <section class="message"><?php
                                        $connexion = mysqli_connect("localhost", "root", "", "blog");
                                        $sql = "SELECT id,article,date from articles ORDER BY date DESC ";
                                        $query = mysqli_query($connexion, $sql);

                                        //var_dump($sql);

                                        ?>


                <?php
                while ($row = mysqli_fetch_array($uti2)) {

                    echo '<article class="art">' . substr($row["article"], 0, 100) . '';
                    echo '<a href="articles.php?id=', $row['id'], '">(Voir plus...)</a>';
                    echo '</article>';
                    echo '</article></section>';
                }
                ?></section>
        </div>

<?php

        for ($i=1; $i<=$total_pages; $i++)
					{  
						if (isset($_GET["ctg"]))
				{
					
					echo"<section class='page'><a href='index.php?page=".$i."&amp;ctg=".$_GET["ctg"]."'>".$i."</a></section>"; 

				}
					else
					{
						echo"<section class='page'><a href='index.php?page=".$i."'>".$i."</a></section>"; 


					} 
}
 
		?>


        <footer>
            <?php include "footer.php"; ?>
        </footer>
    </main>
</body>

</html>