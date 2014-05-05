<?php
include_once(__DIR__ . '/../vendor_class/autoload.php');
$data = Response::getSessionData();
Response::clearSessionData();
?>
<script>
    var GLOBALS = {
        'data': <?php echo json_encode($data); ?>
        <?php echo PHP_EOL; ?>
    };
</script>