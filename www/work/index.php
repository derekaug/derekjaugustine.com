<?php
include_once(__DIR__ . '/../vendor_class/autoload.php');
Config::init();
$active_class = 'work';
?>
<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
    <?php include_once(Config::$root . '/includes/head.php'); ?>
    <title>Derek J. Augustine</title>
</head>
<body class="<?php echo Config::$body_class; ?> <?php echo $active_class; ?>">
<div id="divBodyWrapper">
    <?php include_once(Config::$root . '/includes/header.php'); ?>
    <div class="container">
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3">
                <h2 class="page-header">Work</h2>

                <h4>Developer at <span class="sr-only">Archrival</span></h4>
                <a href="http://www.archrival.com/" target="_blank">
                    <img class="img-responsive" src="/img/archrival.png" alt="Archrival"/>
                </a>

                <h5>Technologies</h5>

                <div class="div-techs">
                    <a href="http://www.php.net/" target="_blank">
                        <span class="sr-only">PHP</span>
                        <img src="/img/src/php.png" class="img-tech" alt="PHP"/>
                    </a>

                    <a href="http://www.mysql.com/" target="_blank">
                        <span class="sr-only">MySQL</span>
                        <img src="/img/mysql.png" class="img-tech" alt="MySQL"/>
                    </a>

                    <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">
                        <span class="sr-only">Javascript</span>
                        <img src="/img/javascript.png" class="img-tech" alt="JavaScript"/>
                    </a>

                    <a href="http://www.w3.org/TR/html5/" target="_blank">
                        <span class="sr-only">HTML5</span>
                        <img src="/img/html5.png" class="img-tech" alt="HTML5"/>
                    </a>
                </div>

                <h5>Projects</h5>
                <ul>
                    <li>
                        a web portal for brand advocates to participate in discussion with other advocates and compete
                        to earn rewards from the brand
                    </li>
                    <li>
                        a mobile website to facilitate an online photo clue based scavenger hunt for product
                        in multiple countries at different times
                    </li>
                    <li>
                        an analytical tool for a brand to monitor their Facebook posts and determine whether they
                        were meeting their social goals
                    </li>
                    <li>
                        various microsites and Facebook tabs for promoting a brand, product, or service through either
                        an online contest or interactive online experience
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php include_once(Config::$root . '/includes/footer.php'); ?>
</body>
</html>
