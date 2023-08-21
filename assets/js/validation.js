function initiate(buttonName, query){
    let button = document.getElementById(buttonName);
    button.addEventListener("click", sendIt, false);

    let form = document.querySelector(query)
    form.addEventListener("invalid", validation, true);
    form.addEventListener("input", checkVal, false);
}

function validation(e){
    let elem = e.target;
    elem.style.background = "#ffdddd";
}

function sendIt(){
    let valid = form.checkValidity();
    if(valid){
        form.submit();
    }
}

function checkVal(e){
    let elem = e.target;
    if(elem.validity.valid){
        elem.style.background = '#ffffff';
    }
    else{
        elem.style.background = '#ffdddd';
    }
}

addEventListener("load", initiate, false)