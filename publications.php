<?php
    require __DIR__ . '/config.php';

    $page_title       = 'Publications - ' . $config['title'];
    $page_description = 'Peer-reviewed publications from the ' . $config['title']
                        . ' at the ' . $config['university'] . '.';
    $publications = load_yaml(__DIR__ . '/data/publications.yml');
?>
<!DOCTYPE html>
<html lang="en">
  <?php require ROOT_PATH . '/includes/head.php'; ?>
  <body>
    <?php require ROOT_PATH . '/includes/header.php'; ?>

    <main id="main">
      <div class="pageband">
        <div class="shell">
          <h1>Publications</h1>
          <!-- <p><?= count($publications) ?> peer-reviewed papers on robot perception, mapping,
             navigation, and control.</p> -->
        </div>
      </div>

      <section class="section">
        <div class="shell">
        <?php if (!$publications): ?>
          <div class="empty">The publication list is being updated.</div>
        <?php endif; ?>

        <?php foreach ($publications as $item): ?>
            <?php $has_image = !empty($item['Image']); ?>
            <article class="pub<?= $has_image ? '' : ' pub--noimage' ?>">
                <?php if ($has_image): ?>
                <div class="pub__thumb">
                    <img src="/assets/images/publications/<?= e($item['Image']) ?>"
                         alt="<?= e($item['Title'] ?? '') ?>" loading="lazy">
                </div>
                <?php endif; ?>

                <div>
                    <?php if (!empty($item['Year'])): ?>
                        <span class="pub__year"><?= e($item['Year']) ?></span>
                    <?php endif; ?>

                    <h2 class="pub__title"><?= e($item['Title'] ?? '') ?></h2>

                    <?php if (!empty($item['Authors'])): ?>
                        <p class="pub__authors"><?= e($item['Authors']) ?></p>
                    <?php endif; ?>

                    <?php if (!empty($item['Publication'])): ?>
                        <p class="pub__venue"><?= e($item['Publication']) ?></p>
                    <?php endif; ?>

                    <div class="pub__links">
                        <?php if (!empty($item['Paper'])): ?>
                            <a class="btn" href="<?= e($item['Paper']) ?>" rel="noopener">Paper</a>
                        <?php endif; ?>
                        <?php if (!empty($item['Code'])): ?>
                            <a class="btn" href="<?= e($item['Code']) ?>" rel="noopener">Code</a>
                        <?php endif; ?>
                        <?php if (!empty($item['Video'])): ?>
                            <a class="btn" href="<?= e($item['Video']) ?>" rel="noopener">Video</a>
                        <?php endif; ?>
                    </div>
                </div>
            </article>
        <?php endforeach; ?>
        </div>
      </section>
    </main>

    <?php require ROOT_PATH . '/includes/footer.php'; ?>
  </body>
</html>
