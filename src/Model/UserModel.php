<?php
namespace Model;
use Exception;
use PDO;

class UserModel
{
    private PDO $connection;

    /**
     * UserRepository constructor.
     * @param PDO $connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @return array []
     */
    public function getUsers(): array
    {
        return $this->connection->query('SELECT * FROM "user"')->fetchAll();
    }

    public function getUserByUserName($name)
    {      
        $sql =  $this->connection->prepare('SELECT * FROM "user" WHERE "user_name" = ? ');
        $sql->execute(array($name));
        return  $sql->fetch();
    }

    public function getUserById($id)
    {
        $sql =  $this->connection->prepare('SELECT * FROM "user" WHERE "user_id" = ? ');
        $sql->execute(array($id));
        return  $sql->fetch();
    }

    public function addUser($user)
    {      
        $sql =  $this->connection->prepare('INSERT INTO "user" ("user_name" ,"user_email" ,"user_password","user_level") VALUES (?,?,?,?)');

        $sql->bindParam(1, $name);
        $sql->bindParam(2, $email);
        $sql->bindParam(3, $password);
        $sql->bindParam(4, $level);

        $name = $user->getUserName();
        $email = $user->getUserEmail();
        $password = $user->getUserPassword();
        $level = 0;

        $sql->execute();
    }
}
