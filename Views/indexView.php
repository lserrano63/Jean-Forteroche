<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Billet simple pour l'Alaska</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/png" href="pics/logo.png"> <! -- a faire -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/f42ba57ba1.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <link href="style.css" rel="stylesheet"/>
    </head>
        
    <body>
        <div>
            <?php require ('header.php'); ?>

            <section class="container-fluid" id="section_img">
                <figure>
                    <img class="img-fluid" src="pics/1.jpg" alt="Alaska's lake"/>
                    <figcaption>Billet simple pour l'Alaska<br>
                    de Jean Forteroche</figcaption>
                </figure>
            </section>
            <?php 
            $postManager = new PostManager();
            $req = $postManager->getPosts();
            while ($data = $req->fetch())
            {
            ?>
            <article>
                <h2><?= $data['title'];?></h2>
                <p>posté le <?php echo $data['creation_date_fr'];?></p>
                <p><?= nl2br($data['post']);?></p>
                <a href="index.php?action=ViewPost&id=<?= $data['id']; ?>">Voir plus</a>
            </article>
            <?php
            }
            $req->closeCursor();
            ?>
            
            <?php require ('footer.php'); ?>

        </div>
    </body>
</html>