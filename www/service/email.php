<?php
use Zend\Mail\Message;
use Zend\Mail\Transport\Smtp;
use Zend\Mail\Transport\SmtpOptions;
include_once(__DIR__ . '/../vendor_class/autoload.php');

$action = Request::get('action');
$messages = array();

if (!empty($action)) {
    if ($action === 'email') {
        $email = Request::getSanitized('email');
        $name = Request::getSanitized('name');
        $body = Request::getSanitized('body');
        $required = Request::getSanitized('required');

        // check if request paramaters are valid
        $valid = true;
        if (empty($email)) {

            $valid = false;
        }
        if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $valid = false;
        }
        if (empty($name)) {

            $valid = false;
        }
        if (empty($body)) {

            $valid = false;
        }
        if (!empty($required)) {

            $valid = false;
        }

        if ($valid) {
            $message = new Message();
            $message->addFrom(Config::$contact_from, $name);
            $message->addReplyTo($email, $name);
            $message->addTo(Config::$contact_to);
            $message->setSubject('Email from ' . $name . ' sent from '. Config::$base_url);
            $message->setBody($body);
            $message->setEncoding("UTF-8");
            $transport = new Smtp();
            $options   = new SmtpOptions(array(
                'name'              => Config::$smtp['host'],
                'host'              => Config::$smtp['host'],
                'port'              => Config::$smtp['port'],
                'connection_class'  => Config::$smtp['auth']['type'],
                'connection_config' => array(
                    'username' => Config::$smtp['auth']['user'],
                    'password' => Config::$smtp['auth']['pass'],
                    'ssl'      => Config::$smtp['auth']['ssl']
                )
            ));
            $transport->setOptions($options);
            $transport->send($message);
        }
    }
}