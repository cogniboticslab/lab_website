<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title><?= e($page_title ?? ($config['title'] . ' - ' . $config['university'])) ?></title>
    <meta name="description" content="<?= e($page_description ?? $config['description']) ?>">
    <meta name="keywords" content="robotics, cognitive robotics, SLAM, robot navigation, University of Arkansas, PhD robotics">
    <meta name="author" content="Cognitive Robotics Lab, University of Arkansas">
    <meta name="theme-color" content="#9d2235">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="<?= e($config['title']) ?>">
    <meta property="og:title" content="<?= e($page_title ?? $config['title']) ?>">
    <meta property="og:description" content="<?= e($page_description ?? $config['description']) ?>">
    <meta property="og:image" content="/assets/images/banner/1.JPG">
    <meta name="twitter:card" content="summary_large_image">

    <link rel="shortcut icon" href="/assets/images/favicon.ico">
    <link rel="stylesheet" href="/assets/css/style.css?v=2">
</head>
