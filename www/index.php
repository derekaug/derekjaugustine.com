<?php
include_once(__DIR__ . '/vendor_class/autoload.php');
Session::init();
$active_class = 'about';
$birth_time = 530663760;
$birth_dtm = DateTime::createFromFormat('U', 530663760);
$now_dtm = new DateTime();
$age_interval = $now_dtm->diff($birth_dtm, true);

// populate favs and shuffle for fun
$favorites = array();
$favorites[] = array(
    'name' => 'Monkey Wrench Cycles',
    'url' => 'https://www.facebook.com/pages/Monkey-Wrench-Cycles/326974564427',
    'picture' => 'https://graph.facebook.com/326974564427/picture?type=square'
);
$favorites[] = array(
    'name' => 'Sultan\'s Kite',
    'url' => 'https://www.facebook.com/TheSultansKite',
    'picture' => 'https://graph.facebook.com/127339140770525/picture?type=square'
);
$favorites[] = array(
    'name' => 'Faster Than Light',
    'url' => 'https://www.facebook.com/FTLGame',
    'picture' => 'https://graph.facebook.com/375917579114052/picture?type=square'
);
$favorites[] = array(
    'name' => 'Endomondo',
    'url' => 'https://www.facebook.com/endomondo',
    'picture' => 'https://graph.facebook.com/136072689446/picture?type=square'
);
$favorites[] = array(
    'name' => 'Don\'t Starve',
    'url' => 'https://www.facebook.com/dontstarvegame',
    'picture' => 'https://graph.facebook.com/349701968456304/picture?type=square'
);
$favorites[] = array(
    'name' => 'Fishing',
    'url' => 'https://www.facebook.com/pages/Fishing/104056309631975',
    'picture' => 'https://graph.facebook.com/104056309631975/picture?type=square'
);
$favorites[] = array(
    'name' => 'Bikes',
    'url' => 'https://www.facebook.com/pages/Bikes/108733305825278',
    'picture' => 'https://graph.facebook.com/108733305825278/picture?type=square'
);
$favorites[] = array(
    'name' => 'C. Berry\'s',
    'url' => 'https://www.facebook.com/pages/C-Berrys/141825782544283',
    'picture' => 'https://graph.facebook.com/141825782544283/picture?type=square'
);
$favorites[] = array(
    'name' => 'Beer',
    'url' => 'https://www.facebook.com/pages/Beer/112570395422274',
    'picture' => 'https://graph.facebook.com/112570395422274/picture?type=square'
);
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

                <div class="div-favs">
                    <h3>Favorites</h3>
                    <?php foreach($favorites as $fav) { ?>
                        <a href="<?php echo $fav['url']; ?>" title="<?php echo $fav['name']; ?>" target="_blank">
                            <span class="sr-only"><?php echo $fav['name']; ?></span>
                            <img class="img-fav" alt="<?php echo $fav['name']; ?>"
                                 src="<?php echo $fav['picture']; ?>"/>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once(Config::$root . '/includes/footer.php'); ?>
</body>
</html>
