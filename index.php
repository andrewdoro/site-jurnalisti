<?php

global $mysqli;
require_once "config.php";
require_once "./models/ArticleManager.php";
require_once "./models/Article.php";

session_start();
// Initialize the session


$articleManager = new ArticleManager($mysqli);

$category = isset($_GET['category']) ? $_GET['category'] : "all";

// Fetch articles based on the category
$articles = $articleManager->getApprovedArticlesByCategory($category);

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Welcome</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>

    <div class="container">
        <div>
            <h1 class="my-5 welcome-message">Sursa Ta de Încredere pentru Știri și Actualizări Oportune</h1>
            <p class="text-left">
                Bine ați venit la portalul nostru de știri,
                unde vă aducem cele mai recente și relevante știri
                din întreaga lume. Rămâneți informat cu gama noastră diversă
                de articole, acoperind totul de la știri de ultimă oră până
                la analize în profunzime. Echipa noastră de jurnaliști dedicați
                se străduiește să vă furnizeze informații precise și actualizate,
                asigurându-ne că sunteți mereu la curent.</p>
        </div>

        <ul class="nav nav-tabs">
            <!-- Meniul pentru categorii -->
            <li class="nav-item">
                <a class="nav-link <?php echo $category === 'all' ? 'active' : ''; ?>" href="?category=all">Toate</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $category === 'artistic' ? 'active' : ''; ?>" href="?category=artistic">Artistic</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $category === 'technic' ? 'active' : ''; ?>" href="?category=technic">Tehnic</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $category === 'science' ? 'active' : ''; ?>" href="?category=science">Știință</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $category === 'moda' ? 'active' : ''; ?>" href="?category=moda">Modă</a>
            </li>
        </ul>


        <div class="article-container">
            <?php foreach ($articles as $article): ?>
                <div class="article">
                    <h2><?php echo $article->getTitle(); ?></h2>
                    <h3><?php echo date("d-m-Y", strtotime($article->getCreatedAt())); ?></h3>

                    <?php if(isset($_SESSION["user_id"])): ?>
                        <div class="article-content">
                            <p><?php echo $article->getContent(); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="btn-container d-flex justify-content-center">
            <?php if(isset($_SESSION["user_id"])): ?>
                <a href="logout.php" class="btn btn-danger">Logout</a>
            <?php else: ?>
                <a href="login.php" class="btn btn-primary btn-lg btn-block glow-on-hover ">Login</a>

            <?php endif; ?>
        </div>

    </div>

    </body>
    </html>

<?php
// Close the database connection
$mysqli->close();
?>