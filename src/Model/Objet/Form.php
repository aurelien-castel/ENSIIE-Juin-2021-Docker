<?php
namespace Model\Objet;

class Form
{
    /**
     * @var int
     */
    private int $form_id;

    /**
     * @var int
     */
    private int $user_id;

    /**
     * @var string
     */
    private string $form_name;

    /**
     * @var string
     */
    private string $form_password;
    
    /**
     * @var string
     */
    private string $form_description;

    /**
     * @var string
     */
    private string $form_expiration_date;

    /**
     * @var array
     */
    private array $questions;

    /**
     * @return int
     */
    public function getFormId(): int
    {
        return $this->form_id;
    }
    
    /**
     * @param int $form_id
     * @return Form
     */
    public function setFormId(int $form_id): self
    {
        $this->form_id = $form_id;
        return $this;
    }

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
    public function getFormName(): string
    {
        return $this->form_name;
    }

    /**
     * @param string $form_name
     * @return Form
     */
    public function setFormName(string $form_name): self
    {
        $this->form_name = $form_name;
        return $this;
    }

    /**
     * @return string
     */
    public function getFormPassword(): string
    {
        return $this->form_password;
    }

    /**
     * @param string $form_password
     * @return Form
     */
    public function setFormPassword(string $form_password): self
    {
        $this->form_password = $form_password;
        return $this;
    }

    /**
     * @return string
     */
    public function getFormDescription(): string
    {
        return $this->form_description;
    }

    /**
     * @param string $form_description
     * @return Form
     */
    public function setFormDescription(string $form_description): self
    {
        $this->form_description= $form_description;
        return $this;
    }

    /**
     * @return string
     */
    public function getFormExpirationDate(): string
    {
        return $this->form_expiration_date;
    }

    /**
     * @param string $form_expiration_date
     * @return Form
     */
    public function setFormExpirationDate(string $form_expiration_date): self
    {
        $this->form_expiration_date= $form_expiration_date;
        return $this;
    }

    /**
     * @return array
     */
    public function getQuestions(): array
    {
        return $this->questions;
    }

    /**
     * @return Form
     */
    public function setQuestions($questions): self
    {
        $this->questions = $questions;
        return $this;
    }

}