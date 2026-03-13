<!DOCTYPE html>
<?php 
    require __DIR__ . '/config.php'; 
    use Symfony\Component\Yaml\Yaml;
?>

<html >
  <title><?= $config['title']  ?></title>
  <?php require ROOT_PATH . '/includes/head.php'; ?>
  <body>
    <main>
    <?php require ROOT_PATH . '/includes/header.php'; ?>
    
    <!-- Content -->
    <!-- <div class="hero-banner ">
    <div class="hero-overlay">
        <h3 class ="hero-text" ><?php echo $config['title'] ?> </h3>
        <p class ="hero-text"><?php echo $config['description']?> </p>
    </div>
    </div> -->

    <?php $slides = Yaml::parseFile(__DIR__ . '/data/banner.yml'); ?>

<div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="4000">
    <div class="carousel-inner">
        <?php foreach ($slides as $index => $slide): ?>
            <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                <img
                    src="/assets/images/banner/<?= htmlspecialchars($slide['image']) ?>"
                    class="d-block w-100 hero-slide"
                    alt="Banner <?= $index + 1 ?>"
                >
                <div class="carousel-caption hero-overlay">
                    <h3><?= htmlspecialchars($config['title']) ?></h3>
                    <p><?= htmlspecialchars($config['description']) ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>





    <section class="news">
        <?php $news = Yaml::parseFile(__DIR__ . '/data/news.yml'); ?>
        <h4>News & Events</h4>
        <ul>
            <?php foreach ($news as $item): ?>
                <li><strong><?= $item['date'] ?>: </strong>  <?= $item['event'] ?></li>
            <?php endforeach; ?>
        </ul>
    </section>

    <section>
    <h4>Projects</h4>
    <?php $groups_projects = Yaml::parseFile(__DIR__ . '/data/projects.yml'); ?>
    <?php foreach ($groups_projects as $group): ?>
    <h5><?= $group['name'] ?> </h5>
    <div class="row">
        <?php foreach ($group['projects'] as $project): ?>
        <div class="col-sm12 col-md-4">
            <image src="/assets/images/projects/<?= $project['image'] ?>" class="image-project"/>
            <p style="text-align: center;"> <?= $project['name'] ?> </p>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endforeach; ?>
    </section>
    
    <?php require ROOT_PATH . '/includes/footer.php'; ?>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>