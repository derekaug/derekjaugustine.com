<?php
include_once(__DIR__ . '/../vendor_class/autoload.php');
$main_css = '/css/main.' . Config::$asset_type . '.css';
?>
<link href="http://fonts.googleapis.com/css?family=Roboto:400,400italic,700,700italic%7CRusso+One%7CInconsolata" rel="stylesheet" type="text/css">
<base href="<?php echo Config::$base_url; ?>" target="_self">
<link rel="canonical" href="<?php echo Config::$canonical_url; ?>" />
<meta charset="utf-8">
<meta name="format-detection" content="telephone=no">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
<link rel="stylesheet" href="<?php echo $main_css; ?>">
<script src="/vendor/modernizr/modernizr.js"></script>