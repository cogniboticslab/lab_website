<!DOCTYPE html>
<?php 
    require __DIR__ . '/config.php'; 
    use Symfony\Component\Yaml\Yaml;
    $publications = Yaml::parseFile(__DIR__ . '/data/publications.yml');
?>

<html >
  <title>Publications - <?= $config['title']  ?></title>

  <?php require ROOT_PATH . '/includes/head.php'; ?>
  <body>
    <main>
    <?php require ROOT_PATH . '/includes/header.php'; ?>

    <!-- Content -->
    <section>
    <?php foreach ($publications as $item): ?>
    <div class="row" style="margin-bottom:15px">

        <div class="col-sm-12 col-md-4">
            <?php if (!empty($item['Image'])): ?>
                <img
                    src="/assets/images/publications/<?= htmlspecialchars($item['Image']) ?>"
                    class="image-project"
                    alt="<?= htmlspecialchars($item['Title'] ?? '') ?>"
                />
            <?php endif; ?>
        </div>

        <div class="col-sm-12 col-md-8">
            <p><strong><?= $item['Title'] ?></strong></p>
            <p><?= $item['Authors'] ?></p>
            <p><?= $item['Publication'] ?></p>
            <p>Year: <?= $item['Year'] ?></p>

            <div class="d-flex">
                <?php if (!empty($item['Paper'])): ?>
                    <a href="<?= $item['Paper'] ?>" class="btn btn-light btn-sm me-2">Paper</a>
                <?php endif; ?>

                <?php if (!empty($item['Code'])): ?>
                    <a href="<?= $item['Code'] ?>" class="btn btn-light btn-sm me-2">Code</a>
                <?php endif; ?>

                <?php if (!empty($item['Video'])): ?>
                    <a href="<?= $item['Video'] ?>" class="btn btn-light btn-sm me-2">Video</a>
                <?php endif; ?>
            </div>
        </div>

    </div>
<?php endforeach; ?>

    </section>
    <!-- End of  Content -->
    
    <?php require ROOT_PATH . '/includes/footer.php'; ?>
    </main>
  </body>
</html>