<div class="container">
    <div class="row">

        <div id="card border-primary mb-3" class="text-center">
            <h2 class="title">Créer un nouveau formulaire</h2>

            <form method="POST" action="index.php?action=createFormToDB">

                <h3>Informations générales</h3>

                <p>
                    <label for="name">Nom formulaire*</label>
                    <input id="name" type="text" name="form_name" size="30" minlength="4" maxlength="128" required>
                </p>

                <p>
                    <label for="desc">Description*</label>
                    <input id="desc" type="text" name="form_description" size="30" minlength="4" maxlength="128" required>
                </p>

                <p>
                    <label for="date">Date d'expiration*</label>
                    <input id="date" type="date" name="form_expiration_date" size="30" minlength="10" maxlength="10"
                           placeholder="dd/mm/aaaa" pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}" required>
                </p>

                <h3>Questions</h3>

                <table class="table table-dark">
                    <tr>
                        <th scope="col">Nom question</th>
                        <th scope="col">Type de question</th>
                        <th scope="col">Réponses possibles</th>
                        <th scope="col">Est obligatoire</th>
                        <th scope="col">Supprimer question</th>
                        <th scope="col"><p onclick="addQuestionFunction()" class="btn btn-success">Ajouter une
                                question</p></th>
                    </tr>
                    <tbody id="myForm">
                    <tr id="id_0">
                        <td>
                            <input type="text" placeholder="Entrez votre question" required="" name="NameElement_0">
                        </td>
                        <td>
                            <select name="TypeElement_0">
                                <option value="text">Text</option>  
                                <option value="select">Select</option>
                                <option value="radio">Radio</option>
                            </select>
                        </td>
                        <td>
                            <textarea
                                    placeholder="Entrez les réponses possibles, saut de ligne = nouvelle réponse possible"
                                    name="PossibleAnswersElement_0" rows="3" cols="33"></textarea>
                        </td>
                        <td>
                            <input type="checkbox" name="RequiredElement_0">
                        </td>
                        <td>
                        </td>
                    </tr>
                    </tbody>
                </table>

                <p>
                    <input type="submit" value="Valider" name="valider" class="btn btn-success">
                    <input type="reset" value="Annuler" name="annuler" class="btn btn-primary">
                </p>
            </form>
        </div>
    </div>
</div>

    <script>
        var i = 0; /* Set Global Variable i */
        function increment() {
            i += 1; /* Function for automatic increment of field's "Name" attribute. */
        }

        /*
        ---------------------------------------------

        Function to Remove Form Elements Dynamically
        ---------------------------------------------

        */
        function removeElement(parentDiv, childDiv) {
            if (childDiv == parentDiv) {
                alert("The parent div cannot be removed.");
            } else if (document.getElementById(childDiv)) {
                var child = document.getElementById(childDiv);
                var parent = document.getElementById(parentDiv);
                parent.removeChild(child);
            } else {
                alert("Child div has already been removed or does not exist.");
                return false;
            }
        }

        /*
        ----------------------------------------------------------------------------

        Functions that will be called upon, when user click on the Name text field.

        ----------------------------------------------------------------------------
        */
        function addQuestionFunction() {
            var questionRow = document.createElement('tr');

            var questionTdName = document.createElement("td");
            var questionName = document.createElement("INPUT");
            questionName.setAttribute("type", "text");
            questionName.setAttribute("placeholder", "Entrez votre question");
            questionName.setAttribute("required", "");
            questionTdName.appendChild(questionName);

            var questionTdType = document.createElement("td");
            var questionType = document.createElement("select");

            var option1 = document.createElement("option");
            option1.innerHTML = "Text";
            option1.setAttribute("value", "text");
            var option2 = document.createElement("option");
            option2.innerHTML = "Select";
            option2.setAttribute("value", "select");
            var option3 = document.createElement("option");
            option3.innerHTML = "Radio";
            option3.setAttribute("value", "radio");

            questionType.appendChild(option1);
            questionType.appendChild(option2);
            questionType.appendChild(option3);

            questionTdType.appendChild(questionType);

            var questionTdPossibleAnswers = document.createElement("td");
            var questionPossibleAnswers = document.createElement("textarea");
            questionPossibleAnswers.setAttribute("placeholder", "Entrez les réponses possibles, saut de ligne = nouvelle réponse possible");
            questionPossibleAnswers.setAttribute("cols", "33");
            questionPossibleAnswers.setAttribute("rows", "3");
            questionTdPossibleAnswers.appendChild(questionPossibleAnswers);

            var questionTdRequired = document.createElement("td");
            var questionRequired = document.createElement("INPUT");
            questionRequired.setAttribute("type", "checkbox");
            questionTdRequired.appendChild(questionRequired);

            var questionTdDelete = document.createElement("td");
            var deleteButton = document.createElement("IMG");
            deleteButton.setAttribute("src", "delete.png");
            questionTdDelete.appendChild(deleteButton);

            increment();

            questionName.setAttribute("Name", "NameElement_" + i);
            questionType.setAttribute("Name", "TypeElement_" + i);
            questionPossibleAnswers.setAttribute("Name", "PossibleAnswersElement_" + i);
            questionRequired.setAttribute("Name", "RequiredElement_" + i);
            deleteButton.setAttribute("onclick", "removeElement('myForm','id_" + i + "')");

//questionRow.appendChild(questionThNum);
            questionRow.appendChild(questionTdName);
            questionRow.appendChild(questionTdType);
            questionRow.appendChild(questionTdPossibleAnswers);
            questionRow.appendChild(questionTdRequired);
            questionRow.appendChild(questionTdDelete);
            questionRow.setAttribute("id", "id_" + i);
//questionRow.className += "list-group-item";

            document.getElementById("myForm").appendChild(questionRow);
        }

        /*
        -----------------------------------------------------------------------------

        Functions that will be called upon, when user click on the Reset Button.

        ------------------------------------------------------------------------------
        */
        /*
        function resetElements(){
        document.getElementById('myForm').innerHTML = '';
        }*/
    </script>