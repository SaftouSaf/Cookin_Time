<header>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #222425">
        <div class="container-fluid p-2">
            <a class="navbar-brand" href="accueil.php">Cookin' Time</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="accueil.php">Accueil</a>
                    </li>
                    <li>
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                </ul>
                <div class="user-widget">
                    <?php if (isset($_SESSION['LOGGED_USER']) && $_SESSION['LOGGED_USER'] !== null): ?>
                        <a class="nav-link active" href="/Cookin'_Time/logout.php">Déconnexion</a>
                    <?php else: ?>
                        <a class="btn btn-primary" href="/Cookin'_Time/index.php" role="button">Se connecter</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
</header>