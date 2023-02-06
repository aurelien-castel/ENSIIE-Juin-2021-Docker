<?php
namespace Model\Objet;

class User
{
    /**
     * @var int
     */
    private int $user_id;

    /**
     * @var string
     */
    private string $user_name;

    /**
     * @var string
     */
    private string $user_email;

    /**
     * @var string
     */
    private string $user_password;
    
    /**
     * @var int
     */
    private int $user_level;

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     * @return User
     */
    public function setUserId(int $user_id): self
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->user_name;
    }

    /**
     * @param string $user_name
     * @return User
     */
    public function setUserName(string $user_name): self
    {
        $this->user_name = $user_name;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserEmail(): string
    {
        return $this->user_email;
    }

    /**
     * @param string $user_email
     * @return User
     */
    public function setUserEmail(string $user_email): self
    {
        $this->user_email = $user_email;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserPassword(): string
    {
        return $this->user_password;
    }

    /**
     * @param string $user_password
     * @return User
     */
    public function setUserPassword(string $user_password): self
    {
        $this->user_password = $user_password;
        return $this;
    }

     /**
     * @return int
     */
    public function getUserLevel(): int
    {
        return $this->user_level;
    }

    /**
     * @param int $user_id
     * @return User
     */
    public function setUserLevel(int $user_level): self
    {
        $this->user_level = $user_level;
        return $this;
    }

}

