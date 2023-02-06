
<div class ="container">
    <h2 class="title"><?php echo($data['form']->getFormName())?> </h2>
    <p>
        <form method="POST" action="index.php?action=changeExpDate&id=<?php echo($data['form']->getFormId())?>" style="margin-bottom: 50px">
            <label for="date">Date d'expiration*</label>
            <input id="date" type="date" name="form_expiration_date" size="30" minlength="10" maxlength="10"
                   placeholder="dd/mm/aaaa" pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}" value="<?php echo($data['form']->getFormExpirationDate())?>">
             <input type="submit" value="Valider" name="valider" class="btn btn-success" style="margin-left: 20px">
        </form>
    </p>

    <p>
        <?php
            $questions = $data['form']->getQuestions();
            for ($i = 0; $i < count($questions); $i++) {
        ?>      <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo($i)?>" aria-expanded="false" aria-controls="collapse<?php echo($i);?>">
        <?php
            echo($questions[$i]->getQuestionValue());
            echo("</button>");
            } ?>
    </p>

    <?php
    for ($i = 0; $i < count($questions); $i++) {
        $answers = $questions[$i]->getUserAnswers();
    ?>
        <div class="collapse" id="collapse<?php echo($i)?>">
            <div class="card card-body">
                <?php
                    if($questions[$i]->getQuestionType() != "text")
                    {
                        echo("<div class='list-possible-answer'>");
                        foreach($questions[$i]->getPossibleAnswers() as $possibleAnswer)
                        {
                            echo ("<button type=\"button\" class=\"btn btn-outline-primary list-possible-answer-item git ".$possibleAnswer->getPossibleAnswerValue()."\" onclick='selectAnswer(\"".$possibleAnswer->getQuestionId().$possibleAnswer->getPossibleAnswerValue()."\")'>".$possibleAnswer->getPossibleAnswerValue()."(".$possibleAnswer->getUserAnswersCount().")</button>");
                        }
                        echo("</div>");
                    }
                    echo("<ul class=\"list-answer\">");
                        if(count($answers) == 0)
                        {
                            echo("<li class=\"list-answer-item\">Pas de reponses ...</li>");
                        }else{

                            for ($j = 0; $j < count($answers); $j++) {
                                echo("<li class='list-answer-item ".$answers[$j]->getQuestionId().$answers[$j]->getUserAnswerValue()."'>".$answers[$j]->getUserAnswerValue()."</li>");
                            }
                        }
                    echo("</ul>");
                ?>
            </div>
        </div>
    <?php } ?>
</div>

<script>

function selectAnswer(value) {
    var elements = document.getElementsByClassName(value);
    for(i=0; i<elements.length; i++) {
        if(window.getComputedStyle(elements[i]).getPropertyValue("background-color") == "rgba(13, 110, 253, 0.16)")
        {
            elements[i].style.backgroundColor = "rgba(0, 0, 0, 0)";
        }
        else{
            elements[i].style.backgroundColor = "rgba(13, 110, 253, 0.16)";
        }
    }
}
</script>