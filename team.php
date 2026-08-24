<?php
    require __DIR__ . '/config.php';

    $page_title       = 'Team - ' . $config['title'];
    $page_description = 'Faculty, students, and research interns of the '
                        . $config['title'] . ' at the ' . $config['university'] . '.';
    $team = load_yaml(__DIR__ . '/data/team.yml');

    /**
     * Photo shown on the team page: the one listed in team.yml, or, when that
     * is missing, the one from the member's own profile file.
     */
    function team_photo(array $item): string
    {
        if (!empty($item['image'])) {
            return $item['image'];
        }
        $id = $item['id'] ?? '';
        if (preg_match('/^[A-Za-z0-9_-]+$/', $id)) {
            $member = load_yaml(__DIR__ . '/data/members/' . $id . '.yml');
            if (!empty($member['photo'])) {
                return $member['photo'];
            }
        }
        return '';
    }

    /** First letter, used when someone has no photo at all. */
    function initial(string $name): string
    {
        $name = trim($name);
        return $name === '' ? '?' : mb_strtoupper(mb_substr($name, 0, 1));
    }
?>
<!DOCTYPE html>
<html lang="en">
  <?php require ROOT_PATH . '/includes/head.php'; ?>
  <body>
    <?php require ROOT_PATH . '/includes/header.php'; ?>

    <main id="main">
      <div class="pageband">
        <div class="shell">
          <h1>Team</h1>
          <p>The people building and teaching robots to map, navigate, and plan the way people do.</p>
        </div>
      </div>

      <section class="section">
        <div class="shell">
        <?php if (!$team): ?>
          <div class="empty">Team information is being updated.</div>
        <?php endif; ?>

        <?php foreach ($team as $group): ?>
            <?php if (empty($group['people'])) { continue; } ?>

            <h2 class="group-title"><?= e($group['name'] ?? '') ?></h2>

            <div class="grid grid--people">
                <?php foreach ($group['people'] as $item): ?>
                    <?php
                        $photo = team_photo($item);
                        $name  = $item['name'] ?? '';
                        $id    = $item['id'] ?? '';
                    ?>
                    <article class="person">
                        <a class="person__link" href="/member.php?id=<?= urlencode($id) ?>">
                            <?php if ($photo !== ''): ?>
                                <div class="person__photo">
                                    <img src="/assets/images/members/<?= e($photo) ?>"
                                         alt="<?= e($name) ?>" loading="lazy">
                                </div>
                            <?php else: ?>
                                <div class="person__photo person__photo--placeholder" aria-hidden="true">
                                    <?= e(initial($name)) ?>
                                </div>
                            <?php endif; ?>
                            <h3 class="person__name"><?= e($name) ?></h3>
                        </a>

                        <?php if (!empty($item['title'])): ?>
                            <div class="person__meta person__meta--accent"><?= e($item['title']) ?></div>
                        <?php endif; ?>

                        <?php if (!empty($item['position'])): ?>
                            <div class="person__meta"><?= e($item['position']) ?></div>
                        <?php endif; ?>

                        <?php if (!empty($item['department'])): ?>
                            <div class="person__meta"><?= e($item['department']) ?></div>
                        <?php endif; ?>

                        <?php if (!empty($item['research'])): ?>
                            <div class="person__meta"><?= e($item['research']) ?></div>
                        <?php endif; ?>

                        <?php if (!empty($item['next'])): ?>
                            <div class="person__meta"><strong>Next stop:</strong> <?= e($item['next']) ?></div>
                        <?php endif; ?>

                        <?php if (!empty($item['buildingRoom'])): ?>
                            <div class="person__meta">Office: <?= e($item['buildingRoom']) ?></div>
                        <?php endif; ?>

                        <?php if (!empty($item['phone'])): ?>
                            <div class="person__contact">
                                <a href="tel:<?= e($item['phone']) ?>"><?= e($item['phone']) ?></a>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($item['email'])): ?>
                            <div class="person__contact"> Email: 
                                <a href="mailto:<?= e($item['email']) ?>"><?= e($item['email']) ?></a>
                            </div>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
        </div>
      </section>
    </main>

    <?php require ROOT_PATH . '/includes/footer.php'; ?>
  </body>
</html>
