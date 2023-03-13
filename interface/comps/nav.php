<div nav>
    <div class="nav-content">
        <div class="nav-logo">
            <h1>DELYATIA</h1>
        </div>
        <div class="nav-links">
            <?php foreach ($inNav as $routeLink => $name){ ?>
            <a href="/<?= $routeLink; ?>">
                <button<?= ($routeLink == $page) ? " active" : ""; ?>><?= $name; ?></button>
            </a>
            <?php } ?>
        </div>
    </div>
</div>
<link rel="stylesheet" href="/styles/nav.css">