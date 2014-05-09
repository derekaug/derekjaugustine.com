<?php
include_once(__DIR__ . '/../vendor_class/autoload.php');
Config::init();
$active_class = 'work';
//archrival tech
$archrival_tech = json_decode(file_get_contents(Config::$root . '/data/tech-archrival.json'), true);
$unl_tech = json_decode(file_get_contents(Config::$root . '/data/tech-unl.json'), true);
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
                    <span class="sr-only">Archrival</span>
                    <img class="img-responsive" src="/img/archrival.png" alt="Archrival"/>
                </a>

                <h5>Technologies</h5>
                <ul class="list">
                    <ul class="list">
                        <?php foreach ($archrival_tech as $item) { ?>
                            <li>
                                <a href="<?php echo $item['url']; ?>" title="<?php echo $item['name']; ?>"
                                   target="_blank">
                                    <span class="sr-only"><?php echo $item['name']; ?></span>
                                    <img class="list-image" alt="<?php echo $item['name']; ?>"
                                         src="<?php echo $item['picture']; ?>"/>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </ul>

                <h5>Projects</h5>
                <ul>
                    <li>
                        a web portal for brand advocates to participate in discussion with other advocates and compete
                        to earn rewards from the brand
                    </li>
                    <li>
                        a mobile website to facilitate an photo-based scavenger hunt for product in multiple countries
                        and languages
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
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3">
                <h4>Previously</h4>
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="h5">Software Development at <span class="sr-only">University of Nebraska–Lincoln</span></h4>
                        <a href="http://www.unl.edu/" target="_blank">
                            <span class="sr-only">University of Nebraska–Lincoln</span>
                            <img class="img-responsive" src="/img/unl.png" alt="University of Nebraska–Lincoln"/>
                        </a>

                        <h5>Technologies</h5>
                        <ul class="list">
                            <ul class="list">
                                <?php foreach ($unl_tech as $item) { ?>
                                    <li>
                                        <a href="<?php echo $item['url']; ?>" title="<?php echo $item['name']; ?>"
                                           target="_blank">
                                            <span class="sr-only"><?php echo $item['name']; ?></span>
                                            <img class="list-image" alt="<?php echo $item['name']; ?>"
                                                 src="<?php echo $item['picture']; ?>"/>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </ul>
                        <h5>Projects</h5>
                        <ul>
                            <li>
                                a college-wide C# library for code reuse and organization
                            </li>
                            <li>
                                an online college election system for chairs &amp; committees
                            </li>
                            <li>
                                a surplus auction site used by multiple universities
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h4 class="h5">Freelance Developer in <span class="sr-only">Lincoln</span></h4>
                        <a href="http://www.lincoln.org/" target="_blank">
                            <span class="sr-only">Lincoln</span>
                            <img class="img-responsive" src="/img/lincoln.png" alt="Lincoln"/>
                        </a>
                        <h5>Projects</h5>
                        <ul>
                            <li>
                                an IRB approved research survey for a graduate student at the University of Nebraska–Lincoln
                            </li>
                            <li>
                                a tool to track video views and reactions for a marketing firm
                            </li>
                            <li>
                                various shell scripts and bug fixes through freelance websites
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once(Config::$root . '/includes/footer.php'); ?>
</body>
</html>
