/**
 * Created by dclae on 01/11/2018.
 */
function htmlTextField(fieldType)
{


    var label = document.createElement('label');
    label.setAttribute('class','mb-3');

    var labelText = document.createTextNode('Text : ');

    var buttonText = document.createTextNode('\u00D7');

    var button = document.createElement('button');
    button.setAttribute('onclick','deleteField(this)');
    button.setAttribute('class','close p-0 m-0');

    var div = document.createElement('div');
    div.setAttribute('class','form-group fields');

    var textArea = document.createElement('textarea');
    textArea.setAttribute('name','text[]');
    textArea.setAttribute('placeholder','Text:');
    textArea.setAttribute('rows','5');
    textArea.setAttribute('class','form-control mb-3');

    var input = document.createElement('input');
    input.setAttribute('type','hidden');
    input.setAttribute('name','place[]');
    input.setAttribute('value',fieldType);

    label.appendChild(labelText);
    div.appendChild(label);

    button.appendChild(buttonText);
    div.appendChild(button);

    div.appendChild(textArea);
    div.appendChild(input);

    document.getElementById('fieldsGroup').appendChild(div);
}

function htmlPictureField(fieldType)
{
    var label = document.createElement('label');
    label.setAttribute('class','mb-3');

    var labelText = document.createTextNode('Picture : ');

    var buttonText = document.createTextNode('\u00D7');

    var button = document.createElement('button');
    button.setAttribute('onclick','deleteField(this)');
    button.setAttribute('class','close p-0 m-0');

    var headDiv =  document.createElement('div');
    headDiv.setAttribute('class','d-flex justify-content-between');

    var inputSource = document.createElement('input');
    inputSource.setAttribute('type','text');
    inputSource.setAttribute('name','sources[]');
    inputSource.setAttribute('placeholder','Source');
    inputSource.setAttribute('class','form-control mb-3');

    var inputName = document.createElement('input');
    inputName.setAttribute('type','text');
    inputName.setAttribute('name','picturesName[]');
    inputName.setAttribute('placeholder','Picture name');
    inputName.setAttribute('class','form-control mb-3');

    var inputFile = document.createElement('input');
    inputFile.setAttribute('type','file');
    inputFile.setAttribute('name','pictures[]');
    inputFile.setAttribute('placeholder','Picture name');
    inputFile.setAttribute('class','form-control-file border  mb-3');

    var inputPlace = document.createElement('input');
    inputPlace.setAttribute('type','hidden');
    inputPlace.setAttribute('name','place[]');
    inputPlace.setAttribute('value',fieldType);

    var div = document.createElement('div');
    div.setAttribute('class','form-group  fields');

    label.appendChild(labelText);
    div.appendChild(label);

    button.appendChild(buttonText);
    div.appendChild(button);

    div.appendChild(inputSource);
    div.appendChild(inputName);
    div.appendChild(inputFile);
    div.appendChild(inputPlace);

    document.getElementById('fieldsGroup').appendChild(div);

}


function generateFieldId()
{
    var fields = document.getElementsByClassName('fields');

    for(var i=0;i<fields.length;i++)
    {
        fields[i].id = i+1;
    }
}

function deleteField(element)
{
    var parent = element.parentNode;
    parent.parentNode.removeChild(parent);
}

function fieldsManager(newField)
{
    if(newField == "text")
    {
        htmlTextField(1,1);
    }
    else if(newField == "picture")
    {
        htmlPictureField(2,2);
    }
    generateFieldId();
}