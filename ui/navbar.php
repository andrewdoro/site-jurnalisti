<?php
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="?category=all">Media site</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="/?category=artistic">Artistic</a>
            <a class="nav-item nav-link" href="/?category=technic">Technic</a>
            <a class="nav-item nav-link" href="/?category=science">Science</a>
            <a class="nav-item nav-link " href="/?category=moda" >Moda</a>

        </div>
        <?php if(isset($_SESSION["user_id"])): ?>
            <a href="../logout.php" class="btn ml-auto btn-danger">Logout</a>
        <?php else: ?>
            <a href="../login.php" class="btn btn-primary ml-auto glow-on-hover ">Login</a>

        <?php endif; ?>
    </div>
</nav>