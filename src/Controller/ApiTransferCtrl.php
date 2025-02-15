<?php

namespace Api\Controller;
use Api\Model\ApiTransferModel;
use Api\VO\UserVO;

class ApiTransferCtrl
{
    private $model;

    public function __construct()
    {
        $this->model = new ApiTransferModel;
    }

    public function bankTransferCtrl(UserVO $vo)
    {
        return $this->model->bankTransferModel($vo);
    }

    public function filterUserCtrl(UserVO $vo)
    {
        return $this->model->filterUserModel($vo);
    }
}