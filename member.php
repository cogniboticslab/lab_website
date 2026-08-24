<?php
    require __DIR__ . '/config.php';

    $id         = $_GET['id'] ?? '';
    $member     = [];
    $user_exist = false;

    // Only plain slugs are valid member ids: this keeps "../" and other
    // path tricks out of the filename below.
    if (is_string($id) && preg_match('/^[A-Za-z0-9_-]{1,64}$/', $id)) {
        $filename = __DIR__ . '/data/members/' . $id . '.yml';
        if (is_file($filename)) {
            $member = load_yaml($filename);
            $user_exist = !empty($member);
        }
    } else {
        $id = '';
    }

    if (!$user_exist) {
        http_response_code(404);
    }

    $username   = $user_exist ? ($member['name'] ?? $id) : '';
    $page_title = ($username !== '' ? $username . ' - ' : '') . $config['title'];

    // Thesis / dissertation committees. Accepted either at the top level
    // (committees:) or nested under services: — both spellings work.
    $committees = $member['committees']
               ?? $member['committee']
               ?? $member['services']['committees']
               ?? [];
    if (is_string($committees)) {
        $committees = [$committees];
    }
    $committees = array_filter((array) $committees);

    // Project showcase. Tolerant of a few YAML shapes:
    //   project: {title: ..., links: [{label:, url:, note:}, ...]}
    //   project: [{label:, url:}, ...]
    //   project: {short: <url>, long: <url>}
    $showcase       = $member['project'] ?? ($member['projects'] ?? ($member['showcase'] ?? []));
    $showcase_title = 'Project Showcase';
    $showcase_links = [];

    if (is_array($showcase)) {
        if (!empty($showcase['title'])) {
            $showcase_title = (string) $showcase['title'];
        }
        $raw_links = $showcase['links'] ?? $showcase['items'] ?? $showcase;

        // Friendly names for bare keys like "short:" / "long:".
        $known = [
            'short' => 'Short Videos',
            'long'  => 'Full Videos',
            'video' => 'Videos',
            'demo'  => 'Demos',
            'code'  => 'Code',
            'site'  => 'Website',
        ];

        foreach ((array) $raw_links as $key => $entry) {
            if (in_array($key, ['title', 'links', 'items'], true)) {
                continue;
            }
            if (is_array($entry)) {
                // Either {label:, url:} or a single-key map such as {short: url}.
                if (!empty($entry['url'])) {
                    $label = $entry['label'] ?? $entry['name'] ?? 'Link';
                    $note  = $entry['note']  ?? $entry['description'] ?? '';
                    $url   = $entry['url'];
                } else {
                    $inner = array_filter($entry, 'is_string');
                    if (!$inner) { continue; }
                    $label = (string) array_key_first($inner);
                    $url   = reset($inner);
                    $note  = '';
                    $label = $known[strtolower($label)] ?? ucfirst($label);
                }
            } else {
                // Scalar: the YAML key is the label.
                $url   = (string) $entry;
                $label = is_string($key) ? ($known[strtolower($key)] ?? ucfirst($key)) : 'Link';
                $note  = '';
            }

            $url = link_url($url);
            if ($url === '') { continue; }
            $showcase_links[] = ['label' => $label, 'url' => $url, 'note' => $note];
        }
    }

    // "schorlar" is the spelling used in most member files; "scholar" in a few.
    $profile_links = [];
    foreach ([
        'Google Scholar' => $member['schorlar'] ?? ($member['scholar'] ?? null),
        'Publications'   => $member['publications'] ?? null,
        'GitHub'         => $member['github']   ?? null,
        'LinkedIn'       => $member['linkedin'] ?? null,
    ] as $label => $raw) {
        $url = link_url($raw);
        // Skip blanks, the template's "link_here", and duplicates (several
        // files repeat the Scholar URL under "publications").
        if ($url === '' || stripos($url, 'link_here') !== false || in_array($url, $profile_links, true)) {
            continue;
        }
        if ($label === 'Publications' && stripos($url, 'scholar.google') !== false) {
            $label = 'Google Scholar';
        }
        $profile_links[$label] = $url;
    }
?>
<!DOCTYPE html>
<html lang="en">
  <?php require ROOT_PATH . '/includes/head.php'; ?>
  <body>
    <?php require ROOT_PATH . '/includes/header.php'; ?>

    <main id="main">
      <section class="section">
        <div class="shell">

        <?php if (!$user_exist): ?>
            <div class="empty">
                <?php if ($id !== ''): ?>
                    <p><strong><?= e($id) ?></strong> does not have a profile page yet.</p>
                    <p>This profile is being updated &mdash; check the
                       <a href="/team.php">Team</a> page for everyone in the lab.</p>
                <?php else: ?>
                    <p>No team member selected.</p>
                    <p>Pick someone from the <a href="/team.php">Team</a> page.</p>
                <?php endif; ?>
            </div>

        <?php else: ?>
            <div class="profile">
                <aside class="profile__aside">
                    <?php if (!empty($member['photo'])): ?>
                    <div class="profile__photo">
                        <img src="/assets/images/members/<?= e($member['photo']) ?>"
                             alt="<?= e($member['name'] ?? '') ?>">
                    </div>
                    <?php endif; ?>

                    <h1 class="profile__name"><?= e($member['name'] ?? '') ?></h1>

                    <div class="profile__role">
                        <?php if (!empty($member['title'])): ?>
                            <?= e($member['title']) ?><br>
                        <?php endif; ?>
                        <?php if (!empty($member['department'])): ?>
                            <?= e($member['department']) ?>
                        <?php endif; ?>
                    </div>

                    <?php if (!empty($member['email'])): ?>
                        <p style="font-size:.9rem; margin-bottom:.9rem;"> Email: 
                            <a href="mailto:<?= e($member['email']) ?>"><?= e($member['email']) ?></a>
                        </p>
                    <?php endif; ?>

                    <!-- <?php if ($profile_links): ?>
                    <div class="profile__links">
                        <?php foreach ($profile_links as $label => $url): ?>
                            <a class="btn" href="<?= e($url) ?>" target="_blank" rel="noopener"><?= e($label) ?></a>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?> -->
                </aside>

                <div>
                    <?php if (!empty($member['about'])): ?>
                    <div class="profile__section">
                        <h3>About</h3>
                        <div class="prose"><p><?= rich($member['about']) ?></p></div>
                    </div>
                    <?php endif; ?>

                    <?php if ($showcase_links): ?>
                    <div class="profile__section">
                        <h3><?= e($showcase_title) ?></h3>
                        <div class="showcase">
                            <?php foreach ($showcase_links as $link): ?>
                            <a class="showcase__item" href="<?= e($link['url']) ?>"
                               target="_blank" rel="noopener">
                                <span class="showcase__label"><?= e($link['label']) ?></span>
                                <?php if ($link['note'] !== ''): ?>
                                    <span class="showcase__note"><?= e($link['note']) ?></span>
                                <?php endif; ?>
                                <span class="showcase__host"><?= e(parse_url($link['url'], PHP_URL_HOST) ?? '') ?></span>
                            </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if (!empty($member['educations'])): ?>
                    <div class="profile__section">
                        <h3>Education</h3>
                        <ul>
                            <?php foreach ($member['educations'] as $edu): ?>
                                <li><?= e(implode(', ', array_filter([
                                        $edu['degree'] ?? null,
                                        $edu['institution'] ?? null,
                                        $edu['field'] ?? null,
                                        $edu['year'] ?? null,
                                    ]))) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>

                    <?php if (!empty($member['awards'])): ?>
                    <div class="profile__section">
                        <h3>Awards</h3>
                        <ul>
                            <?php foreach ($member['awards'] as $award): ?>
                                <li><?= e($award) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>

                    <?php if (!empty($member['services']['conferences'])): ?>
                    <div class="profile__section">
                        <h3>Conference Review</h3>
                        <ul>
                            <?php foreach ($member['services']['conferences'] as $conference): ?>
                                <li><?= e($conference) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>

                    <?php if (!empty($member['services']['journals'])): ?>
                    <div class="profile__section">
                        <h3>Journal Review</h3>
                        <ul>
                            <?php foreach ($member['services']['journals'] as $journal): ?>
                                <li><?= e($journal) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>

                    <?php if ($committees): ?>
                    <div class="profile__section">
                        <h3>Thesis Committees</h3>
                        <ul>
                            <?php foreach ($committees as $committee): ?>
                                <?php
                                    // "Name (role, year institution)" is split so the
                                    // student's name reads as the primary line.
                                    $person = (string) $committee;
                                    $detail = '';
                                    if (preg_match('/^(.*?)\s*\((.*)\)\s*$/u', $person, $m)) {
                                        $person = trim($m[1]);
                                        $detail = trim($m[2]);
                                    }
                                ?>
                                <li>
                                    <strong><?= e($person) ?></strong><?php if ($detail !== ''): ?>
                                        <span class="profile__detail"><?= e($detail) ?></span>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

        </div>
      </section>
    </main>

    <?php require ROOT_PATH . '/includes/footer.php'; ?>
  </body>
</html>
