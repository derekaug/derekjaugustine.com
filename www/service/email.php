<?php
use Zend\Mail\Message;
use Zend\Mail\Transport\Smtp;
use Zend\Mail\Transport\SmtpOptions;

include_once(__DIR__ . '/../vendor_class/autoload.php');
Session::init();

$action = Request::get('action');
$messages = array();

Response::$output = Request::getSanitized('output');
Response::$redirect = Request::getSanitized('redirect');

if (!empty($action)) {
    if ($action === 'email') {
        $email = Request::getSanitized('email');
        $name = Request::getSanitized('name');
        $body = Request::getSanitized('body');
        $required = Request::getSanitized('required');
        Response::$data = array();

        // check if request paramaters are valid
        Response::$data['success'] = true;
        if (empty($name)) {
            Response::$data['messages'][] = array('type'=>'error', 'message'=>'Name is required.');
            Response::$data['success'] = false;
        }
        if (empty($email)) {
            Response::$data['messages'][] = array('type'=>'error', 'message'=>'Email is required.');
            Response::$data['success'] = false;
        }
        if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            Response::$data['messages'][] = array('type'=>'error', 'message'=>'Email must be valid.');
            Response::$data['success'] = false;
        }
        if (empty($body)) {
            Response::$data['messages'][] = array('type'=>'error', 'message'=>'Message is required.');
            Response::$data['success'] = false;
        }
        if (!empty($required)) {
            // if this field is filled out, it's most likely a robot
            Response::$data['messages'][] = array('type'=>'error', 'message'=>'Invalid Attempt.');
            Response::$data['success'] = false;
        }

        if (Response::$data['success']) {
            try {
                $message = new Message();
                $message->addFrom(Config::$contact_from, $name);
                $message->addReplyTo($email, $name);
                $message->addTo(Config::$contact_to);
                $message->setSubject('Email from ' . $name . ' sent from ' . Config::$base_url);
                $message->setBody($body);
                $message->setEncoding("UTF-8");
                $transport = new Smtp();
                $options = new SmtpOptions(array(
                    'name' => Config::$smtp['host'],
                    'host' => Config::$smtp['host'],
                    'port' => Config::$smtp['port'],
                    'connection_class' => Config::$smtp['auth']['type'],
                    'connection_config' => array(
                        'username' => Config::$smtp['auth']['user'],
                        'password' => Config::$smtp['auth']['pass'],
                        'ssl' => Config::$smtp['auth']['ssl']
                    )
                ));
                $transport->setOptions($options);
                $transport->send($message);
                Response::$data['messages'][] = array('type'=>'success', 'message'=>'Email has been sent!');
            }
            catch(Exception $e){
                Response::$data['success'] = false;
                Response::$data['messages'][] = array('type'=>'error', 'message'=>'Server error, please try again!');
            }
        }
    }
}

Response::render();