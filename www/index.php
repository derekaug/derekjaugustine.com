<?php
include_once(__DIR__ . '/vendor_class/autoload.php');
Config::init();

$active_class = 'about';
$birth_time = 530663760;
$birth_dtm = DateTime::createFromFormat('U', 530663760);
$now_dtm = new DateTime();
$age_interval = $now_dtm->diff($birth_dtm, true);

// tech
$research = json_decode(file_get_contents(Config::$root . '/data/research.json'), true);
shuffle($research);

// populate favs and shuffle for funsies
$favorites = json_decode(file_get_contents(Config::$root . '/data/favorites.json'), true);
shuffle($favorites);
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
                <h2 class="page-header">About</h2>

                <p>
                    I am a <?php echo $age_interval->y; ?>-year-old developer in Lincoln, NE, USA. I've been writing
                    code since I can remember, and I've dabbled with many different languages, frameworks, and tools.
                    When I'm not developing, you can find me riding my bike, brewing some beer, fishing with a buddy, or
                    exploring various Lincoln establishments.
                </p>

                <h3>Studies</h3>
                <p>
                    Some technologies I'm currently learning or wanting to investigate.
                </p>
                <ul class="list">
                    <?php foreach ($research as $res) { ?>
                        <li>
                            <a href="<?php echo $res['url']; ?>" title="<?php echo $res['name']; ?>" target="_blank">
                                <span class="sr-only"><?php echo $res['name']; ?></span>
                                <img class="list-image" alt="<?php echo $res['name']; ?>"
                                     src="<?php echo $res['picture']; ?>"/>
                            </a>
                        </li>
                    <?php } ?>
                </ul>

                <h3>Favorites</h3>
                <p>
                    A few of the things that I like besides programming.
                </p>
                <ul class="list">

                    <?php foreach ($favorites as $fav) { ?>
                        <li>
                            <a href="<?php echo $fav['url']; ?>" title="<?php echo $fav['name']; ?>" target="_blank">
                                <span class="sr-only"><?php echo $fav['name']; ?></span>
                                <img class="list-image" alt="<?php echo $fav['name']; ?>"
                                     src="<?php echo $fav['picture']; ?>"/>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php include_once(Config::$root . '/includes/footer.php'); ?>
</body>
</html>
