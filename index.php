<!DOCTYPE html>
<?php require __DIR__ . '/config.php'; 
require_once __DIR__ . '/vendor/autoload.php';
use Symfony\Component\Yaml\Yaml;
?>

<html >
  <title></title>
  <!-- <meta name="description" content="{{ page.description | default: 'Cognitive Robotics Lab' }}"> -->

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
            <?php
            foreach ($news as $item) {
                 echo "<li><strong>{$item['date']}: </strong> {$item['event']}</li>";
            }
            ?>
        </ul>
    </section>

    <section>
    <h4>Projects</h4>
    <h5>Rosie: Baxter-customized robot</h5>
    <div class="row">
        <div class="col-sm12 col-md-4">
            <image src="/assets/images/projects/rosie_perception.jpg" class="image-project" alt="Baxter-customized robot"/>
            <p style="text-align: center;">Perception and Manipulation</p>
        </div>
        <div class="col-sm12 col-md-4">
            <image src="/assets/images/projects/rosie_slam.jpg" class="image-project" alt="Baxter-customized robot"/>
            <p style="text-align: center;">SLAM in Dynamic Environments</p>
        </div>
        <div class="col-sm12 col-md-4">
            <image src="/assets/images/projects/rosie_map.jpg" class="image-project" alt="Baxter-customized robot"/>
            <p style="text-align: center;">Human-like Topological Map</p>
        </div>
    </div>

    <h5>Industrial Robot Controllers</h5>
    <div class="row">
        <div class="col-sm12 col-md-4">
            <image src="/assets/images/projects/controller_01.jpg" class="image-project" alt="Robot Controller"/>
            <p style="text-align: center;">Multi-robot controller using EtherCat </p>
        </div>
        <div class="col-sm12 col-md-4">
            <image src="/assets/images/projects/controller_03.jpg" class="image-project" alt="Robot Controller"/>
            <p style="text-align: center;">Moving Magnets</p>
        </div>
        <div class="col-sm12 col-md-4">
            <image src="/assets/images/projects/controller_02.jpg" class="image-project" alt="Robot Controller"/>
            <p style="text-align: center;">Motion Controller: 64 sync axes</p>
        </div>
    </div>


    <h5>Robot Teaching Hardware/Software</h5>
    <div class="row">
        <div class="col-sm12 col-md-4">
            <image src="/assets/images/projects/tp7hw2.jpg" class="image-project" alt="Robot Teaching"/>
            <p style="text-align: center;">Teaching Pendant 7 inches (ARM-based, Linux)</p>
        </div>
        <div class="col-sm12 col-md-4">
            <image src="/assets/images/projects/tp3.jpg" class="image-project" alt="Robot Teaching"/>
            <p style="text-align: center;">Teaching Pendant 5 inches (STM32, bare-metal)</p>
        </div>
        <div class="col-sm12 col-md-4">
            <image src="/assets/images/projects/sim_osc.jpg" class="image-project"  alt="Robot Teaching"/>
            <p style="text-align: center;">Oscilloscope</p>
        </div>
    </div>

    <h5>Embeded Systems</h5>
    <div class="row">
        <div class="col-sm12 col-md-4">
            <image src="/assets/images/projects/iotree_01.jpg" class="image-project" alt="iotree"/>
            <p style="text-align: center;">IoTree System</p>
        </div>
        <div class="col-sm12 col-md-4">
            <image src="/assets/images/projects/iotree_02.jpg" class="image-project"  alt="iotree"/>
            <p style="text-align: center;">IoTree Prototype</p>
        </div>
        <div class="col-sm12 col-md-4">
            <image src="/assets/images/projects/iotree_realworld.jpg" class="image-project"  alt="iotree"/>
            <p style="text-align: center;">IoTree in Real World</p>
        </div>
    </div>

    </section>
    
    <?php require ROOT_PATH . '/includes/footer.php'; ?>
    </main>
  </body>
</html>