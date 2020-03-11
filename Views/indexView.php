<?php $title = "Billet simple pour l'Alaska"; ?>

<?php ob_start(); ?>
<header class="container">
    <nav>
        <ul class="nav">
            <li class="nav-item"><a class="nav-link" href="">Accueil</a></li>
            <li class="nav-item"><a class="nav-link" href="">A propos</a></li>
            <li class="nav-item"><a class="nav-link" href="">Me contacter</a></li>
        </ul>
    </nav>
</header>

<div>
    <section class="container-fluid" id="section_img">
        <figure>
            <img class="img-fluid" src="images/1.jpg" alt="Alaska's lake"/>
            <figcaption>Billet simple pour l'Alaska<br>
            de Jean Forteroche
            </figcaption>
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
            <p><?= substr(nl2br($data['post']),0,300);?> <a href="index.php?action=ViewPost&id=<?= $data['id']; ?>">Voir plus</a></p>    
        </article>
        <?php
    }
        $req->closeCursor();
        ?>
    <a href="Controllers/report.php">Test</a>
</div>

<footer class="container navbar">
    <div class="row">
        <ul id="social_networks" class="d-flex col-2 list-unstyled">
            <li><a href=""><i class="fab fa-twitter fa-2x" class="img-circle"></i></a></li>
            <li><a href=""><i class="fab fa-facebook fa-2x" class="img-circle"></i></a></li>
            <li><a href=""><i class="fab fa-instagram fa-2x" class="img-circle"></i></a></li>
        </ul>
        <a class="col-3 text-center" href="">Mentions légales</a>
        <a class="col-3 text-center" href="Views/login.php">Connection (admin)</a>
        <p class="col-4 footer-copyright text-center">Copyright © All rights reserved. Billet simple pour l'Alaska 2020</p>
    </div>
</footer>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>