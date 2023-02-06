<div class="container">
    <div class="row">
        <div id="card border-primary mb-3" class="text-center">
            <h2 class="title"><?php echo($data['form']->getFormName()); ?> </h2>
            <span><?php echo($data['form']->getFormDescription()); ?></span>

                <form method="POST" action="index.php?page=addAnswer&form=<?php echo($data['form']->getFormId()); ?>" class="answer-form">

                    <?php
                    $questions = ($data['form']->getQuestions());
                        for($i = 0; $i < count($questions) ; $i++)
                        {
                            $required = $questions[$i]->getQuestionIsRequired() ? "required" : "" ;
                            $value = $required ? ($questions[$i]->getQuestionValue()."*") : $questions[$i]->getQuestionValue();
                            $type = $questions[$i]->getQuestionType();
                            echo("<div class=\"form-group\">");
                                echo("<label>".$value."</label>");

                                if($type == "text" )
                                {
                                    echo("<input name=\"question".$i."\" type=\"text\" minlength=\"3\" maxlength=\"128\"".$required.">");
                                }
                                if($type == "radio" )
                                {
                                    $possibleAnswers = $questions[$i]->getPossibleAnswers();
                                    for($j = 0; $j < count($possibleAnswers) ; $j++)
                                    {
                                        echo("<input  class=\"form-check-input\" name=\"question".$i."\" type=\"radio\" value =\"".$possibleAnswers[$j]->getPossibleAnswerId()."\" ".$required.">");
                                        echo( "<label class=\"form-check-label\">".$possibleAnswers[$j]->getPossibleAnswerValue()."</label>");
                                    }

                                }
                                if($type == "select")
                                {
                                    $possibleAnswers = $questions[$i]->getPossibleAnswers();
                                    echo("<div class='select'>");
                                    echo("<select class=\"form-select\" name=\"question".$i."[]\" multiple ".$required.">");

                                    for($j = 0; $j < count($possibleAnswers) ; $j++)
                                    {
                                        echo("<option value=\"".$possibleAnswers[$j]->getPossibleAnswerId()."\">".$possibleAnswers[$j]->getPossibleAnswerValue() ."</option>");
                                    }

                                    echo("</select>");
                                    echo("</div>");
                                }
                            echo("</div>");
                        }
                    ?>

                    <p>
                        <input type="submit" value="Valider" name="valider" class="btn btn-success">
                        <input type="reset" value="Annuler" name="annuler" class="btn btn-primary">
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>