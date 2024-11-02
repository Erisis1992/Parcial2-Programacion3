var check = {
    length: false,
    uppercase: false,
    lowercase: false,
    number: false
}

function validatePassword() {
    const password = document.getElementById('password').value;
    const length = document.getElementById('length');
    const uppercase = document.getElementById('uppercase');
    const lowercase = document.getElementById('lowercase');
    const number = document.getElementById('number');

    // Check length
    if (password.length >= 8) {
        length.classList.remove('invalid');
        length.classList.add('valid');
        check['length']=true;
    } else {
        length.classList.remove('valid');
        length.classList.add('invalid');

    }

    // Check for uppercase letter
    if (/[A-Z]/.test(password)) {
        uppercase.classList.remove('invalid');
        uppercase.classList.add('valid');
        check['uppercase']=true;
    } else {
        uppercase.classList.remove('valid');
        uppercase.classList.add('invalid');
    }

    // Check for lowercase letter
    if (/[a-z]/.test(password)) {
        lowercase.classList.remove('invalid');
        lowercase.classList.add('valid');
        check['lowercase']=true;
    } else {
        lowercase.classList.remove('valid');
        lowercase.classList.add('invalid');
    }

    // Check for number
    if (/\d/.test(password)) {
        number.classList.remove('invalid');
        number.classList.add('valid');
        check['number']=true;
    } else {
        number.classList.remove('valid');
        number.classList.add('invalid');
    }
}
