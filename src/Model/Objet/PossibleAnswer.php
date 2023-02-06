<?php
namespace Model\Objet;

class PossibleAnswer
{
    /**
     * @var int
     */
    private int $possible_answer_id;

    /**
     * @var int
     */
    private int $question_id;

    /**
     * @var string
     */
    private string $possible_answer_value;

    private int $userAnswersCount;

    /**
     * @return int
     */
    public function getPossibleAnswerId(): int
    {
        return $this->possible_answer_id;
    }

    /**
     * @param int $possible_answer_id
     * @return PossibleAnswer
     */
    public function setPossibleAnswerId(int $possible_answer_id): self
    {
        $this->possible_answer_id = $possible_answer_id;
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
     * @return PossibleAnswer
     */
    public function setQuestionId(int $question_id): self
    {
        $this->question_id = $question_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getPossibleAnswerValue(): string
    {
        return $this->possible_answer_value;
    }

    /**
     * @param string $possible_answer_value
     * @return PossibleAnswer
     */
    public function setPossibleAnswerValue(string $possible_answer_value): self
    {
        $this->possible_answer_value = $possible_answer_value;
        return $this;
    }

    /**
     * @return int
     */
    public function getUserAnswersCount(): int
    {
        return $this->userAnswersCount;
    }

    /**
     * @param int $userAnswersCount
     * @return PossibleAnswer
     */
    public function setUserAnswersCount(int $userAnswersCount): self
    {
        $this->userAnswersCount = $userAnswersCount;
        return $this;
    }
}