<?php

namespace Api\Resource\Classes;

class ApiRequest {

    private $avaliableMethod = ['POST', 'GET', 'PUT'];
    private $data;

    public function __construct()
    {
        $this->data = [];
    }

    public function getMethod() 
    {
        return $this->data['method'];
    }

    public function setMethod($method) : void
    {
        $this->data['method'] = $method;
    }

    public function getEndpoint() 
    {
        return $this->data['endpoint'];
    }

    public function setEndpoint($endpoint) : void 
    {
        $this->data['endpoint'] = $endpoint;
    }

    public function checkMethod() : bool
    {
        return in_array($this->getMethod(), $this->avaliableMethod);
    }

    public function sendResponse($status, $result, $msg = "")
    {
        $this->data = 
        [
            "status" => $status, 
            "result" => $result,
            "message" => $msg
        ];

        header("Content-Type: application/json");
        echo json_encode($this->data);
        exit;
    }

}