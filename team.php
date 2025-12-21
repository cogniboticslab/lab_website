<!DOCTYPE html>
<?php require __DIR__ . '/config.php'; 
require_once __DIR__ . '/vendor/autoload.php';
use Symfony\Component\Yaml\Yaml;
$team = Yaml::parseFile(__DIR__ . '/data/team.yml');
?>

<html >
  <title></title>

  <?php require ROOT_PATH . '/includes/head.php'; ?>
  <body>
    <main>
    <?php require ROOT_PATH . '/includes/header.php'; ?>

    <!-- Content -->
   <section>
    <?php foreach ($team as $group): ?>
        <?php if (!empty($group['people']) && count($group['people']) > 0): ?>

            <div class="row">
                <h4 style="margin-top: 10px; margin-bottom: 10px;">
                    <?= $group['name'] ?? '' ?>
                </h4>

                <div class="row">
                    <div class="row">
                        <?php foreach ($group['people'] as $item): ?>
                            <div class="col-sm-12 col-md-6 col-lg-4" style="margin-bottom: 20pt;">
                                <a href="/member.php?id=<?= $item['id'] ?>">
                                    <div>
                                        <?php if (!empty($item['image'])): ?>
                                            <img class="photo" src="/assets/images/members/<?= $item['image'] ?>" alt="<?= $item['name'] ?? '' ?>">
                                        <?php endif; ?>
                                    </div>
                                    <div class="name"><?= $item['name'] ?? '' ?></div>
                                </a>

                                <?php if (!empty($item['department'])): ?>
                                    <div class="title"><?= $item['department'] ?></div>
                                <?php endif; ?>

                                <?php if (!empty($item['title'])): ?>
                                    <div class="title"><?= $item['title'] ?></div>
                                <?php endif; ?>
                                <?php if (!empty($item['position'])): ?>
                                    <div class="title"><?= $item['position'] ?></div>
                                <?php endif; ?>

                                <?php if (!empty($item['research'])): ?>
                                    <div class="title"><?= $item['research'] ?></div>
                                <?php endif; ?>

                                <?php if (!empty($item['buildingRoom'])): ?>
                                    <div class="buildingRoom">
                                        Office: <?= $item['buildingRoom'] ?>
                                    </div>
                                <?php endif; ?>

                                <?php if (!empty($item['phone'])): ?>
                                    <div class="phone">
                                        Phone: <a href="tel:<?= $item['phone'] ?>"><?= $item['phone'] ?></a>
                                    </div>
                                <?php endif; ?>

                                <?php if (!empty($item['email'])): ?>
                                    <div class="email">
                                        Email: <a href="mailto:<?= $item['email'] ?>"><?= $item['email'] ?></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
    
                </div>
            </div>

        <?php endif; ?>
    <?php endforeach; ?>

    </section>
    <!-- End of  Content -->
    
    <?php require ROOT_PATH . '/includes/footer.php'; ?>
    </main>
  </body>
</html>