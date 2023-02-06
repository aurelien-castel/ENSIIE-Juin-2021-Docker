<?php
namespace Model;
use Exception;
use Model\Objet\Form;
use PDO;

class FormModel
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

   
    //TO DO QUERY FORM AVEC SON PASSWORD
    public function getFormByPassword($formPassword)
    {      
        $sql =  $this->connection->prepare('SELECT * FROM "form" WHERE "form_password" = ? ');
        $sql->execute(array($formPassword));
        return  $sql->fetch();
    }

    public function getForm($formId)
    {
        $sql =  $this->connection->prepare('SELECT * FROM "form" WHERE "form_id" = ? ');
        $sql->execute(array($formId));
        return  $sql->fetch();
    }

    public function getFormsByUserId($id)
    {
        $sql =  $this->connection->prepare('SELECT * FROM "form" WHERE "user_id" = ? ');
        $sql->execute(array($id));
        return  $sql->fetchAll();
    }

    public function changeExpDate(array $data)
    {
        $sql =  $this->connection->prepare('UPDATE "form" SET "form_expiration_date" = ? WHERE "form_id" = ?');

        $sql->bindParam(1, $date);
        $sql->bindParam(2, $id);

        $date = $data['form_expiration_date'];
        $id = $data['form_id'];

        return $sql->execute();
    }

    public function deleteForm($id)
    {
        $sql =  $this->connection->prepare('DELETE FROM "form" WHERE "form_id" = ? ');
        $sql->execute(array($id));
        return  $sql->execute();
    }

    public function addForm(Form $form): bool
    {
        $sql =  $this->connection->prepare('INSERT INTO "form" ("user_id" ,"form_name" ,"form_password","form_description","form_expiration_date") VALUES (?,?,?,?,?)');

        $sql->bindParam(1, $userId);
        $sql->bindParam(2, $formName);
        $sql->bindParam(3, $formPassword);
        $sql->bindParam(4, $formDescription);
        $sql->bindParam(5, $formExpiration);

        $userId = $form->getUserId();
        $formName = $form->getFormName();
        $formPassword = $form->getFormPassword();
        $formDescription = $form->getFormDescription();
        $formExpiration = $form->getFormExpirationDate();

        return $sql->execute();
    }
}