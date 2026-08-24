<?php
    require __DIR__ . '/config.php';
    $page_title       = 'Contact - ' . $config['title'];
    $page_description = 'Find the ' . $config['title'] . ' in JBHT 446 at the '
                        . $config['university'] . ', Fayetteville, Arkansas.';
?>
<!DOCTYPE html>
<html lang="en">
  <?php require ROOT_PATH . '/includes/head.php'; ?>
  <body>
    <?php require ROOT_PATH . '/includes/header.php'; ?>

    <main id="main">
      <div class="pageband">
        <div class="shell">
          <h1>Contact</h1>
          <p>Visit us in the J.B. Hunt Transport Services Center of Excellence
             on the University of Arkansas campus.</p>
        </div>
      </div>

      <section class="section">
        <div class="shell">
          <ul class="factlist" style="max-width:74ch; margin-bottom:2rem;">
            <li><span class="k">Lab</span><span><?= e($config['title']) ?></span></li>
            <li><span class="k">Room</span><span>JBHT 446</span></li>
            <li><span class="k">Address</span>
                <span><?= e($config['university']) ?><br>Fayetteville, AR 72701</span></li>
            <li><span class="k">Email</span>
                <span><a href="mailto:tuand@uark.edu">tuand@uark.edu</a></span></li>
          </ul>

          <iframe
            class="map-embed"
            title="Map of the University of Arkansas"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6450.033641428907!2d-94.17742202327705!3d36.06869380859109!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87c96ee610f0f62f%3A0x10a2f93b787e2367!2sUniversity%20of%20Arkansas!5e0!3m2!1sen!2sus!4v1749773873225!5m2!1sen!2sus"
            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </section>
    </main>

    <?php require ROOT_PATH . '/includes/footer.php'; ?>
  </body>
</html>
