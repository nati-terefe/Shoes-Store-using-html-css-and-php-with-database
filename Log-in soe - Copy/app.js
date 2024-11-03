const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");
const sign_in_btn2 = document.querySelector("#sign-in-btn2");
const sign_up_btn2 = document.querySelector("#sign-up-btn2");
// Get references to the form elements
const signUpForm = document.querySelector('.sign-up-form');
const fullNameInput = signUpForm.querySelector('input[type="text"][placeholder="Full name"]');
const emailInput = signUpForm.querySelector('input[type="text"][placeholder="Email"]');
const passwordInput = signUpForm.querySelector('input[type="password"][placeholder="Password"]');
const confirmPasswordInput = signUpForm.querySelector('input[type="password"][placeholder=" Confirm Password"]');
const usernameInput = signUpForm.querySelector('input[type="text"][placeholder="Username"]');

// Add form submit event listener
signUpForm.addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting
    // Perform the validations
    if (!validateFullName(fullNameInput.value)) {
        alert('Please enter a valid full name.');
        return;
    }

    if (!validateEmail(emailInput.value)) {
        alert('Please enter a valid email address.');
        return;
    }

    if (!validatePassword(passwordInput.value)) {
        alert('Password must be 8 - 15 characters long.');
        return;
    }

    if (passwordInput.value !== confirmPasswordInput.value) {
        alert('Password and Confirm Password must match.');
        return;
    }

    if (!validateUsername(usernameInput.value)) {
        alert('Username must be at 4 - 15 characters long and can only contain letters, numbers, and underscores.');
        return;
    }
    // If all validations pass, you can proceed with form submission or further processing
    sendData(); // Calling function to send data to php
    signUpForm.reset(); // Reset the form
});
function sendData() {
    // Declaring variable that will hold the form values
    var data={
        fullname: fullNameInput.value,
        email: emailInput.value,
        username: usernameInput.value,
        password: passwordInput.value,
    }
    // Declaring HTTP Request Variable
    var xhr = new XMLHttpRequest();
    // Set the PHP page you want to send data to
    xhr.open("POST", "signup.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    // What to do when you receive a response
    xhr.onreadystatechange = function () {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            alert(xhr.responseText); // Alerting any echo from the php as it is
        }
    };
    // Send the data
    xhr.send(JSON.stringify(data));
}
// Full name validation function
function validateFullName(fullName) {
    // Regular expression pattern for full name validation
    // Allows letters, hyphens, apostrophes, spaces, and periods
    const fullNamePattern = /^[A-Za-z-'\s.]+$/;
    return fullNamePattern.test(fullName) && fullName.length<=30;
}

// Email validation function
function validateEmail(email) {
    // Regular expression pattern for email validation
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email) && email.length<=30;
}

// Password validation function
function validatePassword(password) {
    return password.length >= 8 && password.length <= 15;
}

// Username validation function
function validateUsername(username) {
    // Regular expression pattern for username validation
    const usernamePattern = /^[A-Za-z0-9_]{4,}$/;
    return usernamePattern.test(username) && username.length<=15;
}

sign_up_btn.addEventListener("click", () => {
    document.title= "Shoe X Sign Up"; // Change the page title for user sign up
    container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
    document.title= "Shoe X Sign in"; // Change the page title for user log in
    container.classList.remove("sign-up-mode");
});

sign_up_btn2.addEventListener("click", () => {
    container.classList.add("sign-up-mode2");
});
sign_in_btn2.addEventListener("click", () => {
    container.classList.remove("sign-up-mode2");
});

document.getElementById("browse-btn").addEventListener("click", () => {
    var data="Hello";
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "nonlogin.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    // What to do when you receive a response
    xhr.onreadystatechange = function () {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            window.location.href = "/Final Project/index.php";
        }
    };
    // Send the data
    xhr.send(JSON.stringify(data));
    
});
