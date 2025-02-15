<?php

namespace Api\VO;

class UserVO
{

    private $userId;
    private $senderId;
    private $receiverId;
    private $monetaryValue;

    public function getUserId(): int | string
    {
        return $this->userId;
    }

    public function setUserId(int | string $id): void
    {
        $this->userId = $id;
    }

    public function getSenderId(): int
    {
        return $this->senderId;
    }

    public function setSenderId(int $id): void
    {
        $this->senderId = $id;
    }

    public function getReceiverId() : int 
    {
        return $this->receiverId;    
    }

    public function setReceiverId(int $id) : void 
    {
        $this->receiverId = $id;    
    }

    public function getMonetaryValue() : int 
    {
        return $this->monetaryValue;    
    }

    public function setMonetaryValue(int $value): void 
    {
        $this->monetaryValue = $value;
    }

    public function getData() 
    {
        date_default_timezone_set("America/Sao_Paulo");

        return date("2025-02-13 H:i:s");
    }
}
