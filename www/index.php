<?php
include_once(__DIR__ . '/vendor_class/autoload.php');
Session::init();
$active_class = 'about';
$birth_time = 530663760;
$birth_dtm = DateTime::createFromFormat('U', 530663760);
$now_dtm = new DateTime();
$age_interval = $now_dtm->diff($birth_dtm, true);
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
                    When I'm not developing, you can find me riding my bike, brewing some beer, or fishing at some local
                    lake.
                </p>

                <h3>Favorites</h3>
            </div>
        </div>
    </div>
</div>
<?php include_once(Config::$root . '/includes/footer.php'); ?>
</body>
</html>
