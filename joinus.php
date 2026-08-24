<?php
    require __DIR__ . '/config.php';
    $page_title       = 'Join Us - ' . $config['title'];
    $page_description = 'Fully funded PhD positions in robotics, 3D perception, and '
                        . 'machine learning at the ' . $config['university'] . '.';
?>
<!DOCTYPE html>
<html lang="en">
  <?php require ROOT_PATH . '/includes/head.php'; ?>
  <body>
    <?php require ROOT_PATH . '/includes/header.php'; ?>

    <main id="main">
      <div class="pageband">
        <div class="shell">
          <h1>Join Our Research Team</h1>
          <p>We are seeking <strong>two highly motivated PhD students</strong> to work on
             robotics, machine learning, and autonomous systems.</p>
        </div>
      </div>

      <section class="section">
        <div class="shell">
          <div class="prose">

            <div class="callout">
              <p><strong>Applications are reviewed first come, first served.</strong>
                 Send your CV, IELTS/TOEFL iBT, GRE, and transcripts to
                 <a href="mailto:tuand@uark.edu">tuand@uark.edu</a>.</p>
            </div>

            <h3>Research Areas</h3>
            <ul>
              <li>Robot 3D perception, mapping, navigation, and control</li>
              <li>Machine learning for robotics (deep learning, reinforcement learning)</li>
              <li>Human-robot interaction and multi-robot systems</li>
            </ul>

            <h3>What We Offer</h3>
            <ul>
              <li>Full funding (tuition + stipend) for the PhD program</li>
              <li>Access to state-of-the-art robotic platforms and computing resources</li>
              <li>Collaboration opportunities with top researchers in academia and industry</li>
              <li>A friendly, supportive, and dynamic research environment</li>
            </ul>

            <h3>Ideal Candidates</h3>
            <ul>
              <li>Strong background in robotics, AI, or related fields</li>
              <li>Proficiency in programming (C/C++, Python, ROS1/ROS2)</li>
              <li>Experience in deep learning, control systems, and optimization</li>
              <li>Passion for research and problem-solving</li>
            </ul>

            <h3>Preferred Qualities</h3>
            <ul>
              <li><strong>PCB design:</strong> Altium Designer / EAGLE / OrCAD</li>
              <li><strong>Simulation:</strong> NVIDIA Isaac Sim / Gazebo / MuJoCo</li>
              <li><strong>CAD:</strong> SolidWorks / Blender</li>
            </ul>

            <h3>Position Details</h3>
            <ul class="factlist">
              <li><span class="k">Location</span>
                  <span>Department of Electrical Engineering and Computer Science,
                        University of Arkansas, Fayetteville, AR 72701</span></li>
              <li><span class="k">Start date</span><span>Spring / Fall 2026</span></li>
              <li><span class="k">Funding</span><span>Full tuition and stipend</span></li>
            </ul>

            <p style="margin-top:1.75rem;">
              <a class="btn btn--solid" href="mailto:tuand@uark.edu">Email your application</a>
            </p>

          </div>
        </div>
      </section>
    </main>

    <?php require ROOT_PATH . '/includes/footer.php'; ?>
  </body>
</html>
