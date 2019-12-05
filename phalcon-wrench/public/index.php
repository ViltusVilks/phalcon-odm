<!DOCTYPE html><html lang="en" prefix="og: http://ogp.me/ns#" itemscope itemtype="http://schema.org/WebPage">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="author" content="ViltusVilks">
<meta name="description" content="....">
<title>Ready-to-Serve image with Phalcon framework</title>
<ink rel="canonical" href="https://www.bootstrapcdn.com/">
<link rel="dns-prefetch" href="https://stackpath.bootstrapcdn.com">
<link rel="dns-prefetch" href="https://code.jquery.com">
<link rel="dns-prefetch" href="https://fonts.googleapis.com">
<meta itemprop="name" content="Start Page">
<meta itemprop="description" content="...">
<eta itemprop="image" content="/assets/img/og.dd30b10.png">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.2/materia/bootstrap.min.css" integrity="sha384-5mtbl3D/NWE3adtPBX+YsVIhjrCzkc9MWi8qMUcsRKvXa0vuQUnGCVZEGm2Y0YYm" crossorigin="anonymous">
<style>
</style>

</head>

<body class="page-home">

<div class="jumbotron text-center py-5">
    <h1 class="display-5">Phalcon Wrench</h1>
    <p class="lead">Ready-to-Serve docker image using NGINX, PHP/FPM and Phalcon framework with all needed drivers (ODM/MongoDB, Memcached, Redis)</p>
    
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-3">
                <img src="assets/docker.png" alt="" />
            </div>
            <div class="col-sm-12 col-md-3">
                <img src="assets/alpine.png" alt="" />
            </div>
            <div class="col-sm-12 col-md-3">
                <img src="assets/nginx.png" alt="" />
            </div>
            <div class="col-sm-12 col-md-3">
                <img src="assets/mongodb.png" alt="" />
            </div>
            <div class="col-sm-12 col-md-3">
                <img src="assets/phpfpm.png" alt="" />
            </div>
            <div class="col-sm-12 col-md-3">
                <img src="assets/phalcon.png" alt="" />
            </div>
            <div class="col-sm-12 col-md-3">
                <img src="assets/redis.png" alt="" />
            </div>
            <div class="col-sm-12 col-md-3">
                <img src="assets/memcached.png" alt="" />
            </div>
        </div>
    </div>    
    
</div>
    <div class="container">
        <div class="card">
            <div class="card-header">
            <h1>Server</h1>
            </div>
            <div class="card-text">
                <?php 
                //var_dump($_SERVER); 
                $inDocker = preg_match('/^172/', $_SERVER['SERVER_ADDR']);
                ?>
                <p>OS: <?php echo php_uname(); ?></p>
                <p>PHP: <?php echo phpversion(); ?></p>
                <p>Phalcon: <?php echo Phalcon\Version::get(); ?></p>
                <p>Interface: <?php echo $_SERVER['GATEWAY_INTERFACE'] ?></p>
                <p>Http Server: <?php echo $_SERVER['SERVER_SOFTWARE'] ?></p>
                <p>In Docker: <?php echo $inDocker ? 'Yes' : 'No'; ?></p>
                <p>Hostname: <?php echo gethostname(); ?></p>
            </div>
        </div>
    </div>
<pre><?php //var_dump($_SERVER); ?> </pre> 
</body></html>