<?php

namespace Api\Model;

use Api\Model\Connection;
use Api\VO\UserVO;
use Error;
use PDO;

class ApiTransferModel extends Connection
{

    private $conn;

    public function __construct()
    {
        $this->conn = parent::returnsConnection();
    }

    public function bankTransferModel(UserVO $vo): bool | string
    {

        $sql = "SELECT bankBalance FROM tb_user WHERE userId = ?";

        $statement = $this->conn->prepare($sql);
        $statement->bindValue(1, $vo->getSenderId());

        $statement->execute();

        $balance = $statement->fetch(PDO::FETCH_ASSOC);

        if ($balance['bankBalance'] >= $vo->getMonetaryValue()) {
            $sql = "UPDATE tb_user SET bankBalance = bankBalance - ? WHERE userId = ?";
            $statement = $this->conn->prepare($sql);
            $statement->bindValue(1, $vo->getMonetaryValue());
            $statement->bindValue(2, $vo->getSenderId());

            $this->conn->beginTransaction();

            try {
                $statement->execute();

                $sql = "UPDATE tb_user SET bankBalance = bankBalance + ? WHERE userId = ?";
                $statement = $this->conn->prepare($sql);
                $statement->bindValue(1, $vo->getMonetaryValue());
                $statement->bindValue(2, $vo->getReceiverId());

                $this->conn->commit();
                $statement->execute();

                return true;
            } catch (\Exception $ex) {
                $this->conn->rollBack();
                echo $ex->getMessage();
                return false;
            }
        }else{
            return ("Your balance is insufficient. Your balance is " . $balance['bankBalance']);
        }
    }

    public function filterUserModel(UserVO $vo): array
    {
        $sql = "SELECT userName, bankBalance FROM tb_user WHERE userId = ?";

        $statement = $this->conn->prepare($sql);
        $statement->bindValue(1, $vo->getUserId());

        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}
