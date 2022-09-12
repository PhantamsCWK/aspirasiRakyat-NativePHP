<div class="container" id="navbar">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="dashboard" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none" data-bs-toggle="<?= isset($_SESSION['isAdmin']) ? '' : 'modal' ?>" data-bs-target="#modalSignin">
            <span class="fs-4">AspirasiRakyat</span>
        </a>
        <ul class="nav nav-pills">
            <li class="nav-item"><a href="home.php" class="nav-link <?= routeName() == 'home.php' ? 'active' : '' ?>" aria-current="page">Home</a></li>
            <li class="nav-item"><a href="aspirasis.php" class="nav-link <?= routeName() == 'aspirasis.php' ? 'active' : '' ?>">Aspirasi</a></li>
            <li class="nav-item"><a href="formAspirasi.php" class="nav-link <?= routeName() == 'formAspirasi.php' ? 'active' : '' ?>">Form</a></li>
        </ul>
    </header>
</div>
