function formGenerator(number) {
    var nb = parseInt(number);
    var nbComponents = document.getElementsByName("components");
    if (nbComponents === null) {
        var form = document.getElementById("formModule");
        var i = 0;
        for (i; i < nb; i++) {
            form.appendChild(generateFormPart(i));
        }
    } else {
        var form = document.getElementById("formModule");
        if (nb > nbComponents.length) {
            var nbToAdd = nb - nbComponents.length;
            for (var i = 0; i < nbToAdd; i++) {
                form.appendChild(generateFormPart(nbComponents.length+i));
            }
        }
        if (nb < nbComponents.length) {
            var nbToDel =nbComponents.length - nb;
            for (var i = 0; i < nbToDel; i++) {
                console.log(nbComponents.length-i);
                form.removeChild(form.lastChild);
            }
        }
    }
}

function generateFormPart(i) {
    var fieldset = document.createElement('fieldset');
    fieldset.id = "components";
    fieldset.name = "components";
    var legend = document.createElement('legend');
    legend.innerHTML = 'Components';
    fieldset.appendChild(legend);
    fieldset.appendChild(generateType(i));
    fieldset.appendChild(generateDate(i));
    fieldset.appendChild(generateRatio(i));
    return fieldset
}

function generateType(i) {
    var option1 = document.createElement('option');
    option1.innerHTML = "Assignment";
    var option2 = document.createElement('option');
    option2.innerHTML = "Lab Test";
    var option3 = document.createElement('option');
    option3.innerHTML = "Written Exam";
    var select = document.createElement('select');
    select.id = 'examType';
    select.name = 'examType'+i;
    select.required = true;
    select.appendChild(option1);
    select.appendChild(option2);
    select.appendChild(option3);
    var divSelect = document.createElement('div');
    divSelect.class = "col-sm-10";
    divSelect.appendChild(select);
    var label = document.createElement('label');
    label.for = "examType";
    label.class = "col-sm-2 col-form-label";
    label.innerHTML = "Type of exam";
    var div = document.createElement(div);
    div.class = "form-group row";
    div.appendChild(label);
    div.appendChild(divSelect);
    return div;
}

function generateDate(i) {
    var input = document.createElement('input');
    input.type = "date";
    input.id = "examDate";
    input.name = "examDate"+i;
    input.value = "<?php date(\"d/m/Y\") ?>";
    input.min = "<?php date(\"d/m/Y\") ?>";
    input.max = "31/12/2999";
    var divInput = document.createElement('div');
    divInput.class = "col-sm-10";
    divInput.appendChild(input);
    var label = document.createElement("label");
    label.for = "examDate";
    label.class = "col-sm-2 col-form-label";
    label.innerHTML = "Type of exam";
    var div = document.createElement("div");
    div.appendChild(label);
    div.appendChild(divInput);
    return div;
}

function generateRatio(i) {
    var input = document.createElement('input');
    input.type = "number";
    input.id = "ratio";
    input.name = "ratio"+i;
    input.placeholder = "100";
    var divInput = document.createElement('div');
    divInput.class = "col-sm-10";
    divInput.appendChild(input);
    var label = document.createElement("label");
    label.for = "examDate";
    label.class = "col-sm-2 col-form-label";
    label.innerHTML = "Ratio";
    var div = document.createElement("div");
    div.appendChild(label);
    div.appendChild(divInput);
    return div;
}
