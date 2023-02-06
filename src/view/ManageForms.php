<div class="container">
    <img src="https://c.tenor.com/xzjlrhYq_lQAAAAj/cat-nyan-cat.gif">
    <table class="table table-striped">
        <tr>
            <th>Formulaire</th>
            <th>Identifiant du formulaire</th>
            <th>Supprimer</th>
        </tr>
            <?php
            if(count($data["forms"] ) == 0)
            {
                echo("<tr>");
                echo("<td>Vous n'avez pas de formulaire</td><td></td>");
                echo("</tr>");
            }
            else{
                foreach($data["forms"] as $form)
                {
                    echo("<tr>");
                    echo("<td><a href=\"index.php?action=listAnswers&id=".$form->getFormId()."\">".$form->getFormName()."</a></td>");
                    echo("<td>".$form->getFormPassword()."</td>");
                    echo("<td><a href=\"index.php?action=deleteForm&id=".$form->getFormId()."\"><img src='delete.png'> </img></a></td>");
                    echo("</tr>");
                }
            }
            ?>
    </table>
</div>