<?php
include_once(__DIR__ . '/../vendor_class/autoload.php');
$messages = Response::getSessionData();
Response::clearSessionData();
?>
<script>
    var GLOBALS = {
        'messages': <?php echo json_encode($messages); ?>
        <?php echo PHP_EOL; ?>
    };
</script>