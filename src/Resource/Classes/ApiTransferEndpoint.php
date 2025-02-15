<?php

namespace Api\Resource\Classes;

use Api\Controller\ApiTransferCtrl;
use Api\Resource\Classes\ApiRequest;
use Api\VO\UserVO;

class ApiTransferEndpoint extends ApiRequest
{

    private array $params;
    private $ctrl;

    public function __construct()
    {
        $this->ctrl = new ApiTransferCtrl;
    }
    
    public function addParams($parameter)
    {
        $this->params = $parameter;
    }

    public function checkEndpoint()
    {
        return method_exists($this, $this->getEndpoint());
    }

    public function bankTransferEndpoint()
    {

        $vo = new UserVO;
        $vo->setSenderId($this->params['senderId']);
        $vo->setReceiverId($this->params['receiverId']);
        $vo->setMonetaryValue($this->params['monetaryValue']);

        return $this->ctrl->bankTransferCtrl($vo);
    }

    public function FilterUserEndpoint()
    {
        $vo = new UserVO;
        $vo->setUserId($this->params['userId']);

        return $this->ctrl->filterUserCtrl($vo);

    }
}
