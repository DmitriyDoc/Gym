// close modal

function modalOpen(data) {

    let modal = document.getElementById('modal-form');
    let form = document.getElementById('info-form');
    let oldInput =  document.querySelector('input[name="form-post-id"]');

    modal.classList.add("active");

    let atr = data.getAttribute("data-post-id");
    let input = document.createElement("input");

    input.setAttribute("type", "hidden"),
        input.setAttribute("name", "form-post-id"),
        input.setAttribute("value", atr);
    form.appendChild(input);

    if ( oldInput == null ){
        form.appendChild(input);
    } else if ( oldInput != input) {

        oldInput.remove();
    }

}

function modalClose() {
    let modal = document.getElementById('modal-form');
    modal.classList.remove("active");
}


// BMI CALCULATOR

function trimAll(sString) {
    while (sString.substring(0, 1) == ' ') {
        sString = sString.substring(1, sString.length);
    }
    while (sString.substring(sString.length - 1, sString.length) == ' ') {
        sString = sString.substring(0, sString.length - 1);
    }
    return sString;
}

function isNumber(val) {
    val = val + "";
    if (val.length < 1) return false;
    if (isNaN(val)) {
        return false;
    } else {
        return true;
    }
}

function calculate() {

    let height = document.querySelector('input[name="height"]').value;
    let weight = document.querySelector('input[name="weight"]').value;


    let underweight = document.querySelector('.chart-table tbody tr:nth-child(1)');
    let healthy = document.querySelector('.chart-table tbody tr:nth-child(2)');
    let overweight = document.querySelector('.chart-table tbody tr:nth-child(3)');
    let obese = document.querySelector('.chart-table tbody tr:nth-child(4)');

    let text = '';
    let output = document.getElementById('output');

    underweight.style.cssText = "background-color: none !important";
    healthy.style.cssText = "background-color: none !important";
    overweight.style.cssText = "background-color: none !important";
    obese.style.cssText = "background-color: none !important";

    if( isNumber(trimAll(height)) == true && isNumber(trimAll(weight)) == true ) {

        if ( weight > 0 && height > 0 ) {

            let index = (weight / Math.pow(height, 2)) * 100;
            let bmi = index.toFixed(4) * 100;

            if (15 > bmi && bmi > 14) {
                text = "You are seriously underweight!";
                underweight.style.cssText = "background-color: red !important";
            } else if (15 <= bmi && bmi < 18.5) {
                text = "You are slightly underweight.";
                underweight.style.cssText = "background-color: yellow !important";
            } else if (18.5 <= bmi && bmi < 25) {
                text = "You are healthy!";
                healthy.style.cssText = "background-color: green !important";
            } else if (25 <= bmi && bmi < 30) {
                text = "You are slightly overweight.";
                overweight.style.cssText = "background-color: yellow !important";
            } else if (30 <= bmi && bmi < 40) {
                text = "You are obese!";
                obese.style.cssText = "background-color: red !important";
            } else if (40 <= bmi && bmi < 50) {
                text = "You are seriously obese!";
                obese.style.cssText = "background-color: red !important";
            } else {
                text = "You should be dead...";
            }
        }
    }
        output.innerHTML = text;

}


