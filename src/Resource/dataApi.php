<?php

require "../../vendor/autoload.php";

use Api\Resource\Classes\ApiTransferEndpoint;

$obj = new ApiTransferEndpoint();

$obj->setMethod($_SERVER['REQUEST_METHOD']);
if (!$obj->checkMethod())
    $obj->sendResponse(404, 'ERROR', 'Method not allowed');

$array = json_decode(file_get_contents('php://input'), true);
$data = !empty($_POST) ? $_POST : (!empty($_GET) ? $_GET : $array);

$obj->setEndpoint($data['endpoint']);
if (!$obj->checkEndpoint())
    $obj->sendResponse(404, 'ERROR', 'Invalid endpoint');

$obj->addParams($data);
$obj->sendResponse(200, 'SUCCESS', $obj->{$obj->getEndpoint()}());
