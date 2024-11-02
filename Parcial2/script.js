var check = {
    length: false,
    uppercase: false,
    lowercase: false,
    number: false
}
document.getElementById("myForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent default form submission
    
    // Create a FormData object from the form
    const formData = new FormData(this);
    var checker = 0;
   check.forEach(element => {
    if (element==true){
        checker+=1;
    }else{}
   });
   if (checker=4){
    checker=0;
    check.forEach(element => {
        element=false;
    });
         // Send the form data to a PHP file using fetch
    fetch("submit.php", {
        method: "POST",
        body: formData
      })
      .then(response => response.text())
      .then(data => {
        // Display the response in an HTML element (for example, a <div> with id "response")
        document.getElementById("response").innerHTML = data;
      })
      .catch(error => {
        console.error("Error:", error);
      });
   }
  });
  
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
