<?php
require_once 'logic/controller.php';

if (isset($_GET['id'])) {
    require_once 'templates/aspirasi.php';
    die;
}

$aspirasis = query("SELECT a.id, a.message, a.status, c.name, a.image, a.created_at 
                    FROM aspirasis AS a JOIN categories AS c ON (c.id = category_id) 
                    ORDER BY created_at DESC");
?>
<?php require_once 'templates/header.php'?>
</head>
<body>
    <?php require_once 'partials/navbar.php'?>
    <main>
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Album example</h1>
            <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
            <p>
            <input class="form-control my-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-secondary" type="submit"><i data-feather="search"></i></button>
            </p>
        </div>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-5">
        <?php 
            foreach($aspirasis as $aspirasi):
        ?>
            <div class="col">
            <div style="min-height: 330px;" class="card border-<?= $aspirasi['status'] ? 'success' : 'danger'?> shadow bg-body"  id="<?= $aspirasi['id']?>">
                <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="200" xmlns="resource/img/<?=$aspirasi['image']?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"></text></svg>
                <img src="" alt=""> -->
                <img src="resource/img/<?= $aspirasi['image']?>" alt="<?=$aspirasi['name']?>" style="height: 190px;">
                <div class="d-flex flex-column justify-content-between card-body text-<?= $aspirasi['status'] ? 'success' : 'danger'?>">
                <p class="card-text"><?= strlen($aspirasi['message']) < 60 ? $aspirasi['message'] : substr($aspirasi['message'],0,60).'...' ?></p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    <a href="http://localhost/senntra-Bend1/aspirasis.php?id=<?= $aspirasi['id']?>" class="btn btn-sm btn-outline-secondary">View</a>
                    </div>
                    <small class="text-muted"><?=$aspirasi['created_at']?></small>
                </div>
                </div>
            </div>
            </div>
        <?php 
            endforeach; 
        ?>
        </div>
        </div>
    </div>
    <?php require_once 'partials/footer.php'?>
    </main>
<?php
require_once 'partials/loginModal.php';
require_once 'templates/footer.php';
?>