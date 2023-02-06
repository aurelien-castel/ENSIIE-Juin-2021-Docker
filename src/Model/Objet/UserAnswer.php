<?php
namespace Model\Objet;

class UserAnswer
{
    /**
     * @var int
     */
    private int $user_answer_id;

    /**
     * @var int
     */
    private int $question_id;

    /**
     * @var string
     */
    private string $user_answer_value;

    /**
     * @return int
     */
    public function getUserAnswerId(): int
    {
        return $this->user_answer_id;
    }
    
    /**
     * @param int $user_answer_id
     *
     */
    public function setUserAnswerId(int $user_answer_id): self
    {
        $this->user_answer_id = $user_answer_id;
        return $this;
    }
     
     /**
     * @return int
     */
    public function getQuestionId(): int
    {
        return $this->question_id;
    }
    
    /**
     * @param int $question_id
     * @return question
     */
    public function setQuestionId (int $question_id): self
    {
        $this->question_id = $question_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserAnswerValue(): string
    {
        return $this->user_answer_value;
    }

    /**
     * @param string $user_answer_value
     * @return
     */
    public function setUserAnswerValue(string $user_answer_value): self
    {
        $this->user_answer_value= $user_answer_value;
        return $this;
    }
}