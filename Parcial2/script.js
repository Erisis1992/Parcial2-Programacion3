var check = [
    false,
    false,
    false,
    false
]
document.getElementById("formu").addEventListener("submit", function(event) {
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
    fetch("./Api2/api.php", {
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
      close()
   }     // Send the form data to a PHP file using fetch
    
  }
);
  
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
        check[0]=true;
    } else {
        length.classList.remove('valid');
        length.classList.add('invalid');
        check[0]=false;
    }

    // Check for uppercase letter
    if (/[A-Z]/.test(password)) {
        uppercase.classList.remove('invalid');
        uppercase.classList.add('valid');
        check[1]=true;
    } else {
        uppercase.classList.remove('valid');
        uppercase.classList.add('invalid');
        check[1]=false;
    }

    // Check for lowercase letter
    if (/[a-z]/.test(password)) {
        lowercase.classList.remove('invalid');
        lowercase.classList.add('valid');
        check[2]=true;
    } else {
        lowercase.classList.remove('valid');
        lowercase.classList.add('invalid');
        check[2]=false;
    }

    // Check for number
    if (/\d/.test(password)) {
        number.classList.remove('invalid');
        number.classList.add('valid');
        check[3]=true;
    } else {
        number.classList.remove('valid');
        number.classList.add('invalid');
        check[3]=false;
    }
}
