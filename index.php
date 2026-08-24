<?php
    require __DIR__ . '/config.php';

    $page_title      = $config['title'] . ' - ' . $config['university'];
    $slides          = array_values(array_filter(
                          load_yaml(__DIR__ . '/data/banner.yml'),
                          fn ($s) => !empty($s['image'])
                       ));
    $news            = load_yaml(__DIR__ . '/data/news.yml');
    $groups_projects = load_yaml(__DIR__ . '/data/projects.yml');
?>
<!DOCTYPE html>
<html lang="en">
  <?php require ROOT_PATH . '/includes/head.php'; ?>
  <body>
    <?php require ROOT_PATH . '/includes/header.php'; ?>

    <main id="main">

    <?php if ($slides): ?>
    <section class="hero" data-carousel>
        <div class="hero__viewport">
            <?php foreach ($slides as $i => $slide): ?>
            <div class="hero__slide<?= $i === 0 ? ' is-active' : '' ?>">
                <img src="/assets/images/banner/<?= e($slide['image']) ?>"
                     alt=""
                     <?= $i === 0 ? 'fetchpriority="high"' : 'loading="lazy"' ?>>
            </div>
            <?php endforeach; ?>
            <div class="hero__scrim"></div>

            <div class="hero__copy">
                <div class="shell">
                    <span class="hero__eyebrow"><?= e($config['university']) ?></span>
                    <h1 class="hero__title"><?= e($config['title']) ?></h1>
                    <p class="hero__lede"><?= e($config['description']) ?></p>
                </div>
            </div>

            <?php if (count($slides) > 1): ?>
            <div class="hero__dots" role="tablist" aria-label="Choose slide">
                <?php foreach ($slides as $i => $slide): ?>
                <button class="hero__dot<?= $i === 0 ? ' is-active' : '' ?>" type="button"
                        role="tab" aria-selected="<?= $i === 0 ? 'true' : 'false' ?>"
                        aria-label="Slide <?= $i + 1 ?>"></button>
                <?php endforeach; ?>
            </div>
            <div class="hero__nav">
                <button class="hero__btn" type="button" data-carousel-prev aria-label="Previous slide">&#8249;</button>
                <button class="hero__btn" type="button" data-carousel-next aria-label="Next slide">&#8250;</button>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php endif; ?>

    <?php if ($news): ?>
    <section class="section section--alt">
        <div class="shell">
            <div class="section__head">
                <h2 class="section__title">News &amp; Events</h2>
            </div>
            <ul class="news">
                <?php foreach ($news as $item): ?>
                <li class="news__item">
                    <div class="news__date"><?= e($item['date'] ?? '') ?></div>
                    <div class="news__body"><?= rich($item['event'] ?? '') ?></div>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>
    <?php endif; ?>

    <?php if ($groups_projects): ?>
    <section class="section">
        <div class="shell">
            <div class="section__head">
                <h2 class="section__title">Research Projects</h2>
            </div>

            <?php foreach ($groups_projects as $group): ?>
                <?php if (empty($group['projects'])) { continue; } ?>
                <h3 class="group-title"><?= e($group['name'] ?? '') ?></h3>
                <div class="grid grid--projects">
                    <?php foreach ($group['projects'] as $project): ?>
                    <article class="card">
                        <?php if (!empty($project['image'])): ?>
                        <div class="card__media">
                            <img src="/assets/images/projects/<?= e($project['image']) ?>"
                                 alt="<?= e($project['name'] ?? '') ?>" loading="lazy">
                        </div>
                        <?php endif; ?>
                        <div class="card__body">
                            <h4 class="card__title"><?= e($project['name'] ?? '') ?></h4>
                        </div>
                    </article>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <?php endif; ?>

    </main>

    <?php require ROOT_PATH . '/includes/footer.php'; ?>
  </body>
</html>
