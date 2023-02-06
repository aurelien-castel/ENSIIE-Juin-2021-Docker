<?php

namespace Controllers;

use Db\Connection;
use Exception;
use Model\Objet\User;
use Model\UserModel;

class UserController
{
    private UserModel $userModel;

    public function __construct()
    {
        $this->userModel= new UserModel(Connection::get());
    }

    /**
     * @throws Exception
     */
    public function getUsers(): array
    {      
        $rows = $this->userModel->getUsers();
        $users = [];

        foreach ($rows as $row)
        {
            $users[] = $this->createClassUser($row);
        }
        return $users;
    }

    public function createUser($data) : bool
    {
        $user = $this->userModel->getUserByUserName($data['user_name']);
        if($user == null)
        {
            $this->userModel->addUser($this->createClassUser($data));
            return true;
        }
        else{
            return false;
        }
    }

    public function verifLogin($data=[]): ?User
    {
        if( !empty($data['user_name']) && !empty($data['user_password']) )
        {
            $login = $data['user_name'];
            $user = $this->userModel->getUserByUserName($login);

            if( !empty($user) && password_verify( $data['user_password'] ,  $user['user_password']  ))
            {
                $this->createSession($user);
                return $this->createClassUser($user);
            }else{
                return null;
            }
        }
        return null;
    }

    private function createSession($user)
    {
        $_SESSION['auth'] = "ok";
        $_SESSION['id'] = $user['user_id'];
        $_SESSION['login'] = $user['user_name'];
    }

    private function createClassUser($data): User
    {
        $user = new User();
        $user
            ->setUserName($data['user_name'])
            ->setUserPassword($data['user_password'])
            ->setUserEmail($data['user_email']);
        
        if(isset($data['user_id']))
        {
            $user->setUserId($data['user_id']);
        }
        return $user;
    }
}
