const formS = document.getElementById('form_SignUp');
const formL = document.getElementById('form_login');
const first_name = document.getElementById('first_name');
const last_name = document.getElementById('last_name');
const email = document.getElementById('Email');
const phone = document.getElementById('phone_number');
const pass = document.getElementById('password');
const conf_pass = document.getElementById('password2');
const eye = document.getElementById('eye');
const date = document.getElementById('birthday');
const button2 = document.querySelector('#switch');
const passlog = document.getElementById('password_log');


$(document).ready(function () {
    $("#form_SignUp").animate({ left: '0%' }, 500);
    $(".log-img").animate({ right: '0%' }, 1000);
    $("#fname").animate({ top: '0%' }, 2800);
    $("#lname").animate({ top: '0%' }, 2700);
    $("#email2").animate({ top: '0%' }, 2600);
    $("#number").animate({ top: '0%' }, 2500);
    $("#age").animate({ top: '0%' }, 2400);
    $("#pass1").animate({ top: '0%' }, 2300);
    $("#eye").animate({ top: '0%' }, 2200);
    $("#pass2").animate({ top: '0%' }, 2100);
    $("#submit").animate({ top: '0%' }, 2300);
    $(".logo_div").animate({ left: '0%' }, 2000);
});

if (pass != null) {
    eye.onclick = function () {
        if (pass.type === "password") {
            pass.type = "text";
            eye.className = "fa-sharp fa-solid fa-eye";
        }
        else {
            pass.type = "password";
            eye.className = "fa-sharp fa-solid fa-eye-slash";
        }


        if (conf_pass.type === "password") {
            conf_pass.type = "text";
            eye.className = "fa-sharp fa-solid fa-eye";
        }
        else {
            conf_pass.type = "password";
            eye.className = "fa-sharp fa-solid fa-eye-slash";
        }
    }
}
if (passlog != null) {
    eye.onclick = function () {
        if (passlog.type === "password") {
            passlog.type = "text";
            eye.className = "fa-sharp fa-solid fa-eye";
        }
        else {
            passlog.type = "password";
            eye.className = "fa-sharp fa-solid fa-eye-slash";
        }

    }
}

formS.addEventListener('submit', e => {

    const firstv = first_name.value.trim();
    const lastnamev = last_name.value.trim();
    const passv = pass.value.trim();
    const confpassv = conf_pass.value.trim();
    const phonev = phone.value.trim();
    const emailv = email.value.trim();
    var datev = new Date(date.value);

    if (!isValidName(firstv) || !isValidName(lastnamev) || !isvalidpass(passv) || !isvalidphone(phonev) || !isvalidemail(emailv)
        || !isvalidage(datev) || confpassv != passv || confpassv === '') { e.preventDefault(); }

    validateInputs();
});

const setError = (element, message) => {

    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success')
};

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error')
};

const validateInputs = () => {

    const firstv = first_name.value.trim();
    const lastnamev = last_name.value.trim();
    const passv = pass.value.trim();
    const confpassv = conf_pass.value.trim();
    const phonev = phone.value.trim();
    const emailv = email.value.trim();
    var datev = new Date(date.value);

    var Flag = 0;

    /* name check */
    if (!isValidName(firstv)) {
        if (firstv === '') {
            setError(first_name, 'first name is required');
            $("#fname").effect("shake", { times: 4 }, 1000);
        }
        else {
            setError(first_name, 'only letters');
            $("#fname").effect("shake", { times: 4 }, 1000);
        }
    } else {
        setSuccess(first_name);
    }

    if (!isValidName(lastnamev)) {
        if (lastnamev === '') {
            setError(last_name, 'last name is required');
            $("#lname").effect("shake", { times: 4 }, 1000);
        }
        else {
            setError(last_name, 'only letters');
            $("#lname").effect("shake", { times: 4 }, 1000);
        }
    }
    else {
        setSuccess(last_name);
    }
    /* end of name check*/


    /*start password check*/
    if (!isvalidpass(passv)) {
        if (passv === '') {
            setError(password, 'field required')
            $("#pass1").effect("shake", { times: 4 }, 1000);
        }
        else {
            setError(password, 'must contain at least one uppercase one lowercase one number and one special character and be at least 8 characters long');
            $("#pass1").effect("shake", { times: 4 }, 1000);
        }
    }
    else {
        setSuccess(password);
    }
    /*end password check*/

    /*start confirm password check*/
    if ((confpassv != passv || confpassv === '') || !isvalidpass(passv)) {

        if (confpassv === '') {
            setError(password2, 'field required')
            $("#pass2").effect("shake", { times: 4 }, 1000);
        }
        else {
            setError(password2, 'Must be the same password');
            $("#pass2").effect("shake", { times: 4 }, 1000);
        }

    }
    else {
        setSuccess(password2);
    }

    /*start email  check*/

    if (!isvalidemail(emailv)) {
        if (emailv === '') {
            setError(email, 'Email is required')
            $("#email2").effect("shake", { times: 4 }, 1000);
        }
        else {
            setError(email, 'not valid email')
            $("#email2").effect("shake", { times: 4 }, 1000);
        }

    }
    else {
        setSuccess(email);
    }

    /*end email  check*/

    /*start phone number  check*/

    if (!isvalidphone(phonev)) {
        if (phonev === '') {
            setError(phone_number, 'Phone Number is Required')
            $("#number").effect("shake", { times: 4 }, 1000);
        }
        else {
            setError(phone_number, 'Phone Number Not Valid')
            $("#number").effect("shake", { times: 4 }, 1000);
        }

    }
    else {
        setSuccess(phone_number);
    }

    /*end phone number  check*/


    /* start age check */
    if (!isvalidage(datev)) {
        if (date.value === '') {
            setError(birthday, 'Field Required')
            $("#age").effect("shake", { times: 4 }, 1000);
        }
        else {
            setError(birthday, 'Must be between the age of 16 - 100 ')
            $("#age").effect("shake", { times: 4 }, 1000);
        }
    }
    else {
        setSuccess(birthday);
    }
};



function isvalidage(datev) {
    var CDate = new Date();
    var ddd = date.value;
    if (ddd === '') {
        return false;
    }
    var age = CDate.getFullYear() - datev.getFullYear();
    var monthDiff = (CDate.getMonth() + 1) - (datev.getMonth() + 1);
    if (monthDiff < 0 || (monthDiff === 0 && CDate.getDate() < datev.getDate())) {
        age--;
    }

    if (age < 16 || age > 100) {
        return false;
    }
    else {
        return true;
    }

}



/* start phone number check function */
function isvalidphone(phone) {
    if (phone === '') {
        return false;
    }
    if (phone.length !== 11) {
        return false;
    }
    for (let i = 0; i < phone.length; i++) {
        const char = phone.charAt(i);
        if (!(char >= '0' && char <= '9')) {
            return false;
        }
    }
    return true;
}

/* start phone number check function */

/*function check emial*/
function isvalidemail(email) {
    if (email === '') {
        return false;
    }

    const domain = email.split('@')[1];
    const validDomains = ['gmail.com', 'yahoo.com', 'hotmail.com'];
    if (!validDomains.includes(domain)) {
        return false;
    }

    return String(email).toLowerCase().match(/^[A-Za-z\._\-0-9]*[@][A-Za-z]*[\.][a-z]+$/);
};

/* end check emial function*/


/* functions for name check*/
function isValidName(name) {
    if (name === '') {
        return false;
    }
    else {
        for (let i = 0; i < name.length; i++) {
            const char = name.charAt(i);
            if (!isLetter(char)) {
                return false;
            }
        }
        return true;
    }
}

function isLetter(char) {
    return (char >= 'a' && char <= 'z') || (char >= 'A' && char <= 'Z');
}
/* end of functions for name check*/

/*start password check function*/
function isvalidpass(pass) {
    let ct1 = 0;
    let ct2 = 0;
    let ct3 = 0;
    let ct4 = 0;

    if (pass === '') {
        return false;
    }

    if (pass.length < 8) {
        return false;
    }

    for (let i = 0; i < pass.length; i++) {
        const char = pass.charAt(i);
        if (char >= 'a' && char <= 'z') {
            ct1++;
        } else if (char >= 'A' && char <= 'Z') {
            ct2++;
        } else if (char >= '0' && char <= '9') {
            ct3++;
        } else {
            ct4++;
        }
    }

    if (ct1 === 0 || ct2 === 0 || ct3 === 0 || ct4 === 0) {
        return false;
    }
    return true;
}
  /*end password check function*/