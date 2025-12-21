<!DOCTYPE html>
<?php require __DIR__ . '/config.php'; 
require_once __DIR__ . '/vendor/autoload.php';
use Symfony\Component\Yaml\Yaml;
?>

 <?php 
    $id = $_GET['id'] ?? null;
    $user_exist = TRUE;
    $username = '';

    if ($id === null || $id === '') {
        $user_exist = FALSE;
    } else{
        $filename = __DIR__ . "/data/members/$id.yml";
        if (file_exists($filename)) {
             $member = Yaml::parseFile($filename); 
             $username = $member['name'];
        } else {
            $user_exist = FALSE;
        }
    }
?>

<html >
  <title> <?= $username  ?> - <?= $config['title']  ?> </title>

  <?php require ROOT_PATH . '/includes/head.php'; ?>
  <body>
    <main>
    <?php require ROOT_PATH . '/includes/header.php'; ?>

    <!-- Content -->
   <section >
        <div class="container">
             <?php  if ($user_exist == FALSE): ?>
                <p style="text-align: center;">Updating data for <strong> <?= $id ?> </strong> ...</p>
             <?php  endif; ?>

            <?php  if ($user_exist == TRUE): ?>
            <div class="row">
                <div class="col-sm12 col-md-4" style="text-align: center;">
                    <a href="/member.php?id=<?= $id ?>">
                        <div><img class="photo" src="/assets/images/members/<?= $member['photo'] ?>"></div>
                        <div class="name"><?= $member['name'] ?></div>
                    </a>
                    <div class="title"><?= $member['title'] ?> </div>
                    <div class="title"><?= $member['department'] ?> </div>
                    <div class="email">Email: <a href="mailto:<?= $member['email'] ?>" > <?= $member['email'] ?> </a></div>
                </div>
                <div class="col-sm12 col-md-8">
                    <div>
                        <h4>About</h4> 
                        <hr>
                        <p> <?= $member['about'] ?> </p> 


                        <h4>Educations</h4>
                        <hr>
                        <ul>
                            <?php if (!empty($member['educations'])): ?>
                            <?php foreach ($member['educations'] as $edu): ?>
                                <li> <?= $edu['degree'] ?>, <?= $edu['institution'] ?>, <?= $edu['field'] ?>, <?= $edu['year'] ?> </li>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                        
                         <h4>Publications</h4> 
                        <hr>
                        <?php if (!empty($member['publications'])): ?>
                        See <a href="<?=$member['publications'] ?>">Google Scholar </a> 
                        <?php endif; ?>
                        <br>
                        <br>

                       
                        <h4>Awards</h4> 
                        <hr>
                        <ul>
                            <?php foreach ($member['awards'] as $award): ?>
                                <li> <?= $award ?> </li>
                            <?php endforeach; ?>
                        </ul>
                        
                       
                        <h4>Academic Services</h4>
                        <hr>
                        <h5>Conference Review</h5>
                        <ul>
                            <?php if (!empty($member['services']['conferences'])): ?>
                            <?php foreach ($member['services']['conferences'] as $conference): ?>
                                <li> <?= $conference ?> </li>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>

                        <h5>Journal Review</h5>
                        <ul>
                            <?php if (!empty($member['services']['journals'])): ?>
                             <?php foreach ($member['services']['journals'] as $journal): ?>
                                <li> <?= $journal ?> </li>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </ul> 

                    </div>
                </div>
            </div>

            <?php endif; ?>

        </div>
    </section>
    <!-- End of  Content -->
    
    <?php require ROOT_PATH . '/includes/footer.php'; ?>
    </main>
  </body>
</html>