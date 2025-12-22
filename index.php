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
    <div class="hero-banner ">
    <div class="hero-overlay">
        <h3 class ="hero-text" ><?php echo $config['title'] ?> </h3>
        <p class ="hero-text"><?php echo $config['description']?> </p>
    </div>
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
  </body>
</html>