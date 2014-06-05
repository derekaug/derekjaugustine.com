<?php
include_once(__DIR__ . '/../vendor_class/autoload.php');
Config::init();
$active_class = 'email';

$email = Session::get('email');
if(empty($email)){
    $email['name'] = '';
    $email['email'] = '';
    $email['body'] = '';
    Session::set('email', $email);
}
else {
    Session::set('email', null);
}
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
                <h2 class="page-header">Email</h2>

                <p>Want to get in touch? Shoot me an email by filling in the form below.</p>

                <div id="divMessages"><?php echo Response::getMessages(); ?></div>

                <form id="formEmail" role="form" action="<?php echo Config::$base_url; ?>service/email.php"
                      method="post">

                    <label for="inputName">Your Name</label>

                    <div class="form-container">
                        <input id="inputName" type="text" class="form-control" name="name" value="<?php echo $email['name']; ?>" />
                    </div>

                    <label for="inputEmail">Your Email</label>

                    <div class="form-container">
                        <input id="inputEmail" type="email" class="form-control" name="email" value="<?php echo $email['email']; ?>"/>
                    </div>

                    <label for="textareaBody">Your Message</label>

                    <div class="form-container">
                        <textarea id="textareaBody" class="form-control" name="body"><?php echo $email['body']; ?></textarea>
                    </div>

                    <div class="hidden">
                        <label for="inputRequired">Leave Blank (Poor Man's CAPTCHA)</label>

                        <div class="form-container">
                            <input id="inputRequired" type="text" class="form-control" name="required"/>
                        </div>
                    </div>

                    <input type="hidden" name="output" value="redirect"/>
                    <input type="hidden" name="redirect" value="<?php echo Config::$base_url; ?>email/"/>
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
<script>
    dja.init('email');
</script>
</body>
</html>
