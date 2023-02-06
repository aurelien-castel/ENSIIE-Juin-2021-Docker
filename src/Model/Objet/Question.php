<?php
namespace Model\Objet;


class Question
{
    /**
     * @var int
     */
    private int $question_id;

    /**
     * @var int
     */
    private int $form_id;

    /**
     * @var string
     */
    private string $question_type;

    /**
     * @var string
     */
    private string $question_value;

    /**
     * @var boolean
     */
    private bool $question_is_required;

    /**
     * @var array
     */
    private array $possibleAnswers;

    /**
     * @var array
     */
    private array $userAnswers;

    /**
     * @return int
     */
    public function getQuestionId(): int
    {
        return $this->question_id;
    }

    /**
     * @param int $question_id
     * @return Question
     */
    public function setQuestionId(int $question_id): self
    {
        $this->question_id = $question_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getFormId(): int
    {
        return $this->form_id;
    }

    /**
     * @param int $form_id
     * @return Question
     */
    public function setFormId(int $form_id): self
    {
        $this->form_id = $form_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getQuestionType(): string
    {
        return $this->question_type;
    }

    /**
     * @param string $question_type
     * @return Question
     */
    public function setQuestionType(string $question_type): self
    {
        $this->question_type = $question_type;
        return $this;
    }

    /**
     * @return string
     */
    public function getQuestionValue(): string
    {
        return $this->question_value;
    }

    /**
     * @param string $question_value
     * @return Question
     */
    public function setQuestionValue(string $question_value): self
    {
        $this->question_value = $question_value;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getQuestionIsRequired(): bool
    {
        return $this->question_is_required;
    }

    public function setQuestionIsRequired(bool $question_is_required): self
    {
        $this->question_is_required = $question_is_required;
        return $this;
    }

    /**
     * @return array
     */
    public function getPossibleAnswers(): array
    {
        return $this->possibleAnswers;
    }

    /**
     * @param array $possibleAnswers
     * @return Question
     */
    public function setPossibleAnswers(array $possibleAnswers): self
    {
        $this->possibleAnswers = $possibleAnswers;
        return $this;
    }

    /**
     * @return array
     */
    public function getUserAnswers(): array
    {
        return $this->userAnswers;
    }

    /**
     * @param array $userAnswers
     * @return Question
     */
    public function setUserAnswers(array $userAnswers): self
    {
        $this->userAnswers = $userAnswers;
        return $this;
    }
}