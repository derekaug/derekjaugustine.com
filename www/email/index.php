<?php
include_once(__DIR__ . '/../vendor_class/autoload.php');
$active_class = 'email';
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
                <form id="formEmail" role="form" action="<?php echo Config::$base_url; ?>service/email.php" method="post">
                    <h3>Email</h3>

                    <label for="inputName">Your Name</label>

                    <div class="form-container">
                        <input id="inputName" type="text" class="form-control" name="name"/>
                    </div>

                    <label for="inputEmail">Your Email</label>

                    <div class="form-container">
                        <input id="inputEmail" type="email" class="form-control" name="email"/>
                    </div>

                    <label for="textareaBody">Your Message</label>

                    <div class="form-container">
                        <textarea id="textareaBody" class="form-control" name="body"></textarea>
                    </div>

                    <div class="hidden">
                        <label for="inputRequired">Leave Blank (Poor Man's CAPTCHA)</label>

                        <div class="form-container">
                            <input id="inputRequired" type="text" class="form-control" name="required"/>
                        </div>
                    </div>

                    <input type="hidden" name="action" value="email"/>

                    <button id="buttonSubmit" type="submit" class="button pull-right">
                        <span>Send Email</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include_once(Config::$root . '/includes/footer.php'); ?>
</body>
</html>
