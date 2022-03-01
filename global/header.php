<nav class="navbar navbar-expand-sm navbar-light">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <span class="nav-brand mb-0 h3"><?php echo "Bonjour " . $_SESSION['username']; ?></span>
                </li>
            </ul>
            <ul class="navbar-nav">
                <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="main.php">Vos posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="others.php">Autre posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="global/logout.php">Se déconnecter</a>
                    </li>
                </div>
            </ul>
        </div>
    </div>
</nav>