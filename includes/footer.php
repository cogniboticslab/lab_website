  <footer class="site-footer">
    <div class="shell">
      <div class="site-footer__grid">
        <div>
          <div class="site-footer__wordmark"><?= e($config['title']) ?></div>
          <p style="font-size:.9rem; margin-bottom:.6rem;"><?= e($config['description']) ?></p>
        </div>

        <div>
          <h4>Explore</h4>
          <ul>
            <li><a href="/team.php">Team</a></li>
            <li><a href="/publications.php">Publications</a></li>
            <li><a href="/joinus.php">Join Us</a></li>
            <li><a href="/contact.php">Contact</a></li>
          </ul>
        </div>

        <div>
          <h4>Find us</h4>
          <ul>
            <li>JBHT 446</li>
            <li><?= e($config['university']) ?></li>
            <li>Fayetteville, AR 72701</li>
            <li><a href="https://github.com/cogniboticslab" rel="noopener">GitHub</a></li>
          </ul>
        </div>
      </div>

      <div class="site-footer__note">
        <span>&copy; <?= date('Y') ?> <?= e($config['title']) ?>. All rights reserved.</span>
        <span>Built by <a href="/member.php?id=tuandang">Tuan Dang</a>.</span>
      </div>
    </div>
  </footer>

  <script>
    (function () {
      /* ---- Mobile navigation ------------------------------------------ */
      var toggle = document.querySelector('.nav-toggle');
      var nav    = document.getElementById('site-nav');

      if (toggle && nav) {
        toggle.addEventListener('click', function () {
          var open = nav.classList.toggle('is-open');
          toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
        });

        document.addEventListener('click', function (evt) {
          if (!nav.classList.contains('is-open')) return;
          if (nav.contains(evt.target) || toggle.contains(evt.target)) return;
          nav.classList.remove('is-open');
          toggle.setAttribute('aria-expanded', 'false');
        });

        document.addEventListener('keydown', function (evt) {
          if (evt.key === 'Escape' && nav.classList.contains('is-open')) {
            nav.classList.remove('is-open');
            toggle.setAttribute('aria-expanded', 'false');
            toggle.focus();
          }
        });
      }

      /* ---- Highlight the current page --------------------------------- */
      var current = window.location.pathname.replace(/\/+$/, '') || '/';
      if (current === '/index.php') current = '/';

      document.querySelectorAll('.nav a').forEach(function (link) {
        var target = new URL(link.getAttribute('href'), window.location.origin)
                       .pathname.replace(/\/+$/, '') || '/';
        if (target === current) {
          link.classList.add('active');
          link.setAttribute('aria-current', 'page');
        }
      });

      /* ---- Hero carousel ---------------------------------------------- */
      var hero = document.querySelector('[data-carousel]');
      if (!hero) return;

      var slides = Array.prototype.slice.call(hero.querySelectorAll('.hero__slide'));
      var dots   = Array.prototype.slice.call(hero.querySelectorAll('.hero__dot'));
      if (slides.length < 2) return;

      var index = 0;
      var timer = null;
      var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

      function show(next) {
        index = (next + slides.length) % slides.length;
        slides.forEach(function (slide, i) {
          slide.classList.toggle('is-active', i === index);
        });
        dots.forEach(function (dot, i) {
          dot.classList.toggle('is-active', i === index);
          dot.setAttribute('aria-selected', i === index ? 'true' : 'false');
        });
      }

      function start() {
        if (reduced) return;
        stop();
        timer = window.setInterval(function () { show(index + 1); }, 5500);
      }
      function stop() {
        if (timer) { window.clearInterval(timer); timer = null; }
      }

      hero.querySelector('[data-carousel-prev]')
          .addEventListener('click', function () { show(index - 1); start(); });
      hero.querySelector('[data-carousel-next]')
          .addEventListener('click', function () { show(index + 1); start(); });

      dots.forEach(function (dot, i) {
        dot.addEventListener('click', function () { show(i); start(); });
      });

      hero.addEventListener('mouseenter', stop);
      hero.addEventListener('mouseleave', start);
      hero.addEventListener('focusin', stop);
      hero.addEventListener('focusout', start);
      document.addEventListener('visibilitychange', function () {
        document.hidden ? stop() : start();
      });

      show(0);
      start();
    })();
  </script>
