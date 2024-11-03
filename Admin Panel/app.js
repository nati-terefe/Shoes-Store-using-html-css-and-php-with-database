const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#accounts-btn");
const container = document.querySelector(".container");
const sign_in_btn2 = document.querySelector("#sign-in-btn2");
const sign_up_btn2 = document.querySelector("#sign-up-btn2");
const loginhis_btn2 = document.querySelector("#loginhis-btn2");
const addadmin_btn2 = document.querySelector("#addadmin-btn2");
const msg_btn2 = document.querySelector("#msg-btn2");
// Get references to the form elements
const addadminForm = document.getElementById("addadminform");

const signUpForm = document.querySelector('.accounts');
const fullNameInput = addadminForm.querySelector('input[type="text"][placeholder="Full name"]');
const emailInput = addadminForm.querySelector('input[type="text"][placeholder="Email"]');
const passwordInput = addadminForm.querySelector('input[type="password"][placeholder="Password"]');
const confirmPasswordInput = addadminForm.querySelector('input[type="password"][placeholder=" Confirm Password"]');
const usernameInput = addadminForm.querySelector('input[type="text"][placeholder="Username"]');

var loginhisbtn = document.getElementById("loginhis-btn");
var msgbtn = document.getElementById("msg-btn");
var addadminbtn = document.getElementById("addadmin-btn");
var accountstbl = document.getElementById("accountstbl");
var loginhistbl = document.getElementById("loginhistable");
var msgtable = document.getElementById("msgtable");
var admintbl = document.getElementById("adminstable");
var addadmin1btn = document.getElementById("addadmin1-btn");
var removeadminbtn = document.getElementById("removeadmin-btn");
document.addEventListener("DOMContentLoaded", function () {
    accountstbl.style.display = "none";
});
sign_up_btn.addEventListener("click", () => {
    document.title = "Shoe X Accounts"; // Change the page title for user sign up
    document.getElementById("h2tabletitle").innerHTML = "List of Accounts";
    container.classList.add("sign-up-mode");
    loginhistbl.style.display = "none";
    msgtable.style.display = "none";
    admintbl.style.display = "none";
    addadmin1btn.style.display = "none";
    addadminForm.style.display = "none";
    removeadminbtn.style.display = "none";
    setTimeout ( function(){accountstbl.style.display = "inline";}, 1550);
});

sign_in_btn.addEventListener("click", () => {
    document.title = "Shoe X Orders"; // Change the page title for user log in
    document.getElementById("h2tabletitle").innerHTML = "List of Active Orders";
    accountstbl.style.display = "none";
    loginhistbl.style.display = "none";
    msgtable.style.display = "none";
    admintbl.style.display = "none";
    addadmin1btn.style.display = "none";
    addadminForm.style.display = "none";
    removeadminbtn.style.display = "none";
    container.classList.remove("sign-up-mode");
});

sign_up_btn2.addEventListener("click", () => {
    document.title = "Shoe X Accounts";
    document.getElementById("h2tabletitle").innerHTML = "List of Accounts"
    loginhistbl.style.display = "none";
    msgtable.style.display = "none";
    admintbl.style.display = "none";
    accountstbl.style.display = "inline-table";
    addadmin1btn.style.display = "none";
    addadminForm.style.display = "none";
    removeadminbtn.style.display = "none";
    container.classList.add("sign-up-mode2");
});
sign_in_btn2.addEventListener("click", () => {
    document.title = "Shoe X Orders";
    document.getElementById("h2tabletitle").innerHTML = "List of Active Orders"
    accountstbl.style.display = "none";
    loginhistbl.style.display = "none";
    msgtable.style.display = "none";
    admintbl.style.display = "none";
    addadmin1btn.style.display = "none";
    addadminForm.style.display = "none";
    removeadminbtn.style.display = "none";
    container.classList.remove("sign-up-mode2");
});
loginhisbtn.addEventListener("click", () => {
    document.title = "Shoe X Login History";
    document.getElementById("h2tabletitle").innerHTML = "Login History"
    loginhistbl.style.display = "inline";
    accountstbl.style.display = "none";
    msgtable.style.display = "none";
    admintbl.style.display = "none";
    addadmin1btn.style.display = "none";
    removeadminbtn.style.display = "none";
    addadminForm.style.display = "none";
});
loginhis_btn2.addEventListener("click", () => {
    document.title = "Shoe X Login History";
    document.getElementById("h2tabletitle").innerHTML = "Login History"
    loginhistbl.style.display = "inline";
    accountstbl.style.display = "none";
    msgtable.style.display = "none";
    admintbl.style.display = "none";
    addadmin1btn.style.display = "none";
    removeadminbtn.style.display = "none";
    addadminForm.style.display = "none";
});
msgbtn.addEventListener("click", () => {
    document.title = "Shoe X User Messages";
    document.getElementById("h2tabletitle").innerHTML = "User Messages"
    loginhistbl.style.display = "none";
    accountstbl.style.display = "none";
    msgtable.style.display = "inline-table";
    admintbl.style.display = "none";
    addadmin1btn.style.display = "none";
    removeadminbtn.style.display = "none";
    addadminForm.style.display = "none";
});
msg_btn2.addEventListener("click", () => {
    document.title = "Shoe X Messages";
    document.getElementById("h2tabletitle").innerHTML = "User Messages"
    loginhistbl.style.display = "none";
    accountstbl.style.display = "none";
    msgtable.style.display = "inline-table";
    admintbl.style.display = "none";
    addadmin1btn.style.display = "none";
    removeadminbtn.style.display = "none";
    addadminForm.style.display = "none";
});
addadminbtn.addEventListener("click", () => {
    document.title = "Shoe X Admins";
    document.getElementById("h2tabletitle").innerHTML = "List of Admins"
    loginhistbl.style.display = "none";
    accountstbl.style.display = "none";
    msgtable.style.display = "none";
    admintbl.style.display = "inline-table";
    addadmin1btn.style.display = "inline";
    removeadminbtn.style.display = "inline";
    addadminForm.style.display = "none";
});
addadmin_btn2.addEventListener("click", () => {
    document.title = "Shoe X Admins";
    document.getElementById("h2tabletitle").innerHTML = "List of Admins"
    loginhistbl.style.display = "none";
    accountstbl.style.display = "none";
    msgtable.style.display = "none";
    addadminForm.style.display = "none";
    admintbl.style.display = "inline-table";
    addadmin1btn.style.display = "inline";
    addadmin1btn.style.height="2.5%";
    addadmin1btn.style.marginBottom="5%";
    removeadminbtn.style.display = "inline";
    removeadminbtn.style.height="2.5%";
    removeadminbtn.style.marginBottom="5%";
});
window.addEventListener("resize", () => {
    window.location.href = "index.php";
});

// Form related
// Add form submit event listener
addadminForm.addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent the form from submitting
    // Perform the validations
    if (!validateFullName(fullNameInput.value)) {
        alert('Please enter a valid full name.');
        return;
    }
    if (!validateUsername(usernameInput.value)) {
        alert('Username must be at 4 - 15 characters long and can only contain letters, numbers, and underscores.');
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
    // If all validations pass, you can proceed with form submission or further processing
    sendData(); // Calling function to send data to php
    signUpForm.reset(); // Reset the form
});
function sendData() {
    // Declaring variable that will hold the form values
    var data = {
        fullname: fullNameInput.value,
        email: emailInput.value,
        username: usernameInput.value,
        password: passwordInput.value,
    }
    // Declaring HTTP Request Variable
    var xhr = new XMLHttpRequest();
    // Set the PHP page you want to send data to
    xhr.open("POST", "adminadd.php", true);
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
    return fullNamePattern.test(fullName) && fullName.length <= 30;
}

// Email validation function
function validateEmail(email) {
    // Regular expression pattern for email validation
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email) && email.length <= 30;
}

// Password validation function
function validatePassword(password) {
    return password.length >= 8 && password.length <= 15;
}

// Username validation function
function validateUsername(username) {
    // Regular expression pattern for username validation
    const usernamePattern = /^[A-Za-z0-9_]{4,}$/;
    return usernamePattern.test(username) && username.length <= 15;
}
function addingadmin(isadmin) {
    if (isadmin == 1) {
        document.title = "Shoe X Admin";
        document.getElementById("h2tabletitle").innerHTML = " "
        loginhistbl.style.display = "none";
        accountstbl.style.display = "none";
        msgtable.style.display = "none";
        admintbl.style.display = "none";
        addadmin1btn.style.display = "none";
        removeadminbtn.style.display = "none";
        addadminForm.style.display = "inline";
    }
    else {
        alert("Adding Admins is super admin functionality");
    }
}
function removingadmin(isadmin) {
    if (isadmin == 1) {
        document.title = "Remove Admin";
        document.getElementById("h2tabletitle").innerHTML = "Choose Admin"
        var person = prompt("Please Enter ID of Admin to remove", "Admin ID");
        if (person != null) { // If ID is selected
            var supe = prompt("Please Enter SuperAdmin Password", "Super Password");
            if (validatePassword(supe) && supe == "superadmin") {
                let confi1 = confirm("Are you sure you want to Delete Admin");
                if (confi1) {
                    loginhistbl.style.display = "none";
                    accountstbl.style.display = "none";
                    msgtable.style.display = "none";
                    admintbl.style.display = "inline-table";
                    addadmin1btn.style.display = "none";
                    removeadminbtn.style.display = "none";
                    addadminForm.style.display = "none";
                    // Declaring variable that will hold the prompt values
                    var data = {
                        id: person,
                        password: supe,
                    }
                    // Declaring HTTP Request Variable
                    var xhr = new XMLHttpRequest();
                    // Set the PHP page you want to send data to
                    xhr.open("POST", "adminremove.php", true);
                    xhr.setRequestHeader("Content-Type", "application/json");
                    // What to do when you receive a response
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState == XMLHttpRequest.DONE) {
                            alert(xhr.responseText); // Alerting any echo from the php as it is
                            document.getElementById("h2tabletitle").innerHTML = "List of Admins"
                            loginhistbl.style.display = "none";
                            accountstbl.style.display = "none";
                            msgtable.style.display = "none";
                            admintbl.style.display = "inline-table";
                            addadmin1btn.style.display = "inline";
                            removeadminbtn.style.display = "inline";
                            addadminForm.style.display = "none";
                        }
                    };
                    // Send the data
                    xhr.send(JSON.stringify(data));
                } else {
                    alert("Admin Not Deleted");
                }
            }
            else { // IF password is given
                alert('Invalid Password retry again.');
                document.getElementById("h2tabletitle").innerHTML = "List of Admins"
                loginhistbl.style.display = "none";
                accountstbl.style.display = "none";
                msgtable.style.display = "none";
                admintbl.style.display = "inline-table";
                addadmin1btn.style.display = "inline";
                removeadminbtn.style.display = "inline";
                addadminForm.style.display = "none";
            }

        }
        else {
            alert('No Admin Selected');
            document.getElementById("h2tabletitle").innerHTML = "List of Admins"
            loginhistbl.style.display = "none";
            accountstbl.style.display = "none";
            msgtable.style.display = "none";
            admintbl.style.display = "inline-table";
            addadmin1btn.style.display = "inline";
            removeadminbtn.style.display = "inline";
            addadminForm.style.display = "none";
        }
    }
    else {
        alert("Removing Admins is super admin functionality");
    }
}
var order;
function editorder(num) {
    document.title = "Edit Order";
    if (document.getElementById("editorder-btn").innerHTML == "Edit") {
        //document.getElementById("usrordertable").style.display = "none";
        var table = document.getElementById("usrordertable");
        order = num;
        if (order != null && !isNaN(order)) { // If ID is selected
            document.getElementById("h2tabletitle").innerHTML = "You can Edit Size or Quantity of Selected Order"
            document.getElementById("editorder-btn").innerHTML = "Save";
            document.getElementById("editorder-btn").textContent = "Save";
            // Display form
            var table = document.getElementById("usrordertable");
            var tr = table.getElementsByTagName("tr");
            // Loop through all table rows, and hide those who don't match the search query
            var found = false;
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText || td.value;
                    if (txtValue.toUpperCase().indexOf(order) > -1) {
                        tr[i].style.display = "";
                        tr[i].getElementsByTagName("td")[2].contentEditable = true;
                        tr[i].getElementsByTagName("td")[3].contentEditable = true;
                        tr[i].getElementsByTagName("td")[2].style.backgroundColor = "rgba(39, 200, 245, 1)";
                        tr[i].getElementsByTagName("td")[3].style.backgroundColor = "rgba(39, 200, 245, 1)";
                        found = true;
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
            if (!found) {
                alert("No Order with that ID.");
                window.location.reload(true);
            }
        } else {
            alert('Invalid Order ID Input');
            document.title = "Shoe X Orders";
        }
    } else if (document.getElementById("editorder-btn").innerHTML == "Save") {
        let confi = confirm("Do you want to Save Edit Order.");
        // Declaring variable that will hold the prompt values
        if (confi) {
            var table = document.getElementById("usrordertable");
            var tr = table.getElementsByTagName("tr");
            var size, quantity;
            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText || td.value;
                    if (txtValue.toUpperCase().indexOf(order) > -1) {
                        size = tr[i].getElementsByTagName("td")[2].value || tr[i].getElementsByTagName("td")[2].innerText;
                        quantity = tr[i].getElementsByTagName("td")[3].value || tr[i].getElementsByTagName("td")[3].innerText;
                    }
                }
            }
            var data = {
                orderid: order,
                Size: size,
                Quantity: quantity,
            };
            // Declaring HTTP Request Variable
            var xhr = new XMLHttpRequest();
            // Set the PHP page you want to send data to
            xhr.open("POST", "../User Cart/editorder.php", true);
            xhr.setRequestHeader("Content-Type", "application/json");
            // What to do when you receive a response
            xhr.onreadystatechange = function () {
                if (xhr.readyState == XMLHttpRequest.DONE) {
                    alert(xhr.responseText); // Alerting any echo from the php as it is
                    if (xhr.responseText != "Please Enter valid info for Size(9,10,11,12) and Quantity(1-10)") {
                        document.getElementById("h2tabletitle").innerHTML = "List of Active Orders"
                        document.getElementById("editorder-btn").innerHTML = "Edit";
                        document.title = "Shoe X Orders";
                        window.location.reload(true);
                    }
                }
            };
            // Send the data
            xhr.send(JSON.stringify(data));
        }
        else {
            document.getElementById("h2tabletitle").innerHTML = "List of Active Orders"
            document.getElementById("editorder-btn").innerHTML = "Edit";
            document.title = "Shoe X Orders";
            window.location.reload(true);
        }

    }
}
function rmvorder(num) {
    document.title = "Remove Order";
    var order = num;
    if (order != null && !isNaN(order)) { // If ID is selected
        var found = false;
        var table = document.getElementById("usrordertable");
        var tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText || td.value;
                if (txtValue.toUpperCase().indexOf(order) > -1) {
                    found = true;
                }
            }
        }
        if (!found) {
            alert("No Order with that ID in your cart.");
            window.location.reload(true);
            document.title = "Shoe X Orders";
        } else {
            let confi = confirm("Are you sure you want to Delete Order");
            // Declaring variable that will hold the prompt values
            if (confi) {
                var data = {
                    orderid: order,
                }
                // Declaring HTTP Request Variable
                var xhr = new XMLHttpRequest();
                // Set the PHP page you want to send data to
                xhr.open("POST", "../User Cart/removeorder.php", true);
                xhr.setRequestHeader("Content-Type", "application/json");
                // What to do when you receive a response
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == XMLHttpRequest.DONE) {
                        alert(xhr.responseText); // Alerting any echo from the php as it is
                        window.location.reload(true);
                    }
                };
                // Send the data
                xhr.send(JSON.stringify(data));

            } else {
                alert("Order Removal Cancelled");
                document.title = "Shoe X Orders";
            }
        }
    } else {
        alert("Order Not Entered");
        document.title = "Shoe X Orders";
    }
}
function editadmin(num, isadmin) {
    if (isadmin == 1) {
        document.title = "Edit Admin";
        if (document.getElementById("editadmin-btn").innerHTML == "Edit") {
            //document.getElementById("usrordertable").style.display = "none";
            var table = document.getElementById("adminstable");
            order = num;
            if (num != null && !isNaN(num)) { // If ID is selected
                document.getElementById("h2tabletitle").innerHTML = "You can Edit Admin"
                document.getElementById("editadmin-btn").innerHTML = "Save";
                document.getElementById("editadmin-btn").textContent = "Save";
                // Display form
                var table = document.getElementById("adminstable");
                var tr = table.getElementsByTagName("tr");
                // Loop through all table rows, and hide those who don't match the search query
                var found = false;
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[0];
                    if (td) {
                        txtValue = td.textContent || td.innerText || td.value;
                        if (txtValue.toUpperCase().indexOf(num) > -1) {
                            tr[i].style.display = "";
                            tr[i].getElementsByTagName("td")[1].contentEditable = true;
                            tr[i].getElementsByTagName("td")[2].contentEditable = true;
                            tr[i].getElementsByTagName("td")[3].contentEditable = true;
                            tr[i].getElementsByTagName("td")[4].contentEditable = true;
                            tr[i].getElementsByTagName("td")[1].style.backgroundColor = "rgba(39, 200, 245, 1)";
                            tr[i].getElementsByTagName("td")[2].style.backgroundColor = "rgba(39, 200, 245, 1)";
                            tr[i].getElementsByTagName("td")[3].style.backgroundColor = "rgba(39, 200, 245, 1)";
                            tr[i].getElementsByTagName("td")[4].style.backgroundColor = "rgba(39, 200, 245, 1)";
                            found = true;
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
                if (!found) {
                    alert("No Admin with that ID.");
                    window.location.reload(true);
                }
            } else {
                alert('Invalid Order ID Input');
                document.title = "Shoe X Orders";
            }
        } else if (document.getElementById("editadmin-btn").innerHTML == "Save") {
            var Fullname, Usrname, Passwd, Email;
            var table = document.getElementById("adminstable");
            var tr = table.getElementsByTagName("tr");
            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText || td.value;
                    if (txtValue.toUpperCase().indexOf(num) > -1) {
                        Fullname = tr[i].getElementsByTagName("td")[1].value || tr[i].getElementsByTagName("td")[1].innerText;
                        Usrname = tr[i].getElementsByTagName("td")[2].value || tr[i].getElementsByTagName("td")[2].innerText;
                        Passwd = tr[i].getElementsByTagName("td")[3].value || tr[i].getElementsByTagName("td")[3].innerText;
                        Email = tr[i].getElementsByTagName("td")[4].value || tr[i].getElementsByTagName("td")[4].innerText;
                    }
                }
            }
            // Perform the validations
            if (!validateFullName(Fullname)) {
                alert('Please enter a valid full name.');
                return;
            }
            if (!validateUsername(Usrname)) {
                alert('Username must be at 4 - 15 characters long and can only contain letters, numbers, and underscores.');
                return;
            }
            if (!validateEmail(Email)) {
                alert('Please enter a valid email address.');
                return;
            }

            if (!validatePassword(Passwd)) {
                alert('Password must be 8 - 15 characters long.');
                return;
            }
            let confi = confirm("Do you want to Save Edit Admin.");
            // Declaring variable that will hold the prompt values
            if (confi) {
                var table = document.getElementById("adminstable");
                var tr = table.getElementsByTagName("tr");
                var Fullname, Usrname, Passwd, Email;
                // Loop through all table rows, and hide those who don't match the search query
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[0];
                    if (td) {
                        txtValue = td.textContent || td.innerText || td.value;
                        if (txtValue.toUpperCase().indexOf(num) > -1) {
                            Fullname = tr[i].getElementsByTagName("td")[1].value || tr[i].getElementsByTagName("td")[1].innerText;
                            Usrname = tr[i].getElementsByTagName("td")[2].value || tr[i].getElementsByTagName("td")[2].innerText;
                            Passwd = tr[i].getElementsByTagName("td")[3].value || tr[i].getElementsByTagName("td")[3].innerText;
                            Email = tr[i].getElementsByTagName("td")[4].value || tr[i].getElementsByTagName("td")[4].innerText;
                        }
                    }
                }
                var data = {
                    adminid: num,
                    fullname: Fullname,
                    usrname: Usrname,
                    passwd: Passwd,
                    email: Email
                };
                // Declaring HTTP Request Variable
                var xhr = new XMLHttpRequest();
                // Set the PHP page you want to send data to
                xhr.open("POST", "adminedit.php", true);
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
            document.getElementById("h2tabletitle").innerHTML = "List of Active Orders"
            document.getElementById("editadmin-btn").innerHTML = "Edit";
            document.title = "Shoe X Orders";
            window.location.reload(true);
        }
    }
    else {
        alert("Editing Admins is super admin functionality");
    }
}
function editaccount(num) {
    document.title = "Edit Account";
    if (document.getElementById("editaccount-btn").innerHTML == "Edit") {
        //document.getElementById("usrordertable").style.display = "none";
        var table = document.getElementById("accountstbl");
        order = num;
        if (num != null && !isNaN(num)) { // If ID is selected
            document.getElementById("h2tabletitle").innerHTML = "You can Edit Account"
            document.getElementById("editaccount-btn").innerHTML = "Save";
            document.getElementById("editaccount-btn").textContent = "Save";
            // Display form
            var table = document.getElementById("accountstbl");
            var tr = table.getElementsByTagName("tr");
            // Loop through all table rows, and hide those who don't match the search query
            var found = false;
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText || td.value;
                    if (txtValue.toUpperCase().indexOf(num) > -1) {
                        tr[i].style.display = "";
                        tr[i].getElementsByTagName("td")[1].contentEditable = true;
                        tr[i].getElementsByTagName("td")[2].contentEditable = true;
                        tr[i].getElementsByTagName("td")[3].contentEditable = true;
                        tr[i].getElementsByTagName("td")[4].contentEditable = true;
                        tr[i].getElementsByTagName("td")[1].style.backgroundColor = "rgba(39, 200, 245, 1)";
                        tr[i].getElementsByTagName("td")[2].style.backgroundColor = "rgba(39, 200, 245, 1)";
                        tr[i].getElementsByTagName("td")[3].style.backgroundColor = "rgba(39, 200, 245, 1)";
                        tr[i].getElementsByTagName("td")[4].style.backgroundColor = "rgba(39, 200, 245, 1)";
                        found = true;
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
            if (!found) {
                alert("No Order with that ID.");
                window.location.reload(true);
            }
        } else {
            alert('Invalid Order ID Input');
            document.title = "Shoe X Orders";
        }
    } else if (document.getElementById("editaccount-btn").innerHTML == "Save") {
        var Fullname, Usrname, Passwd, Email;
        var table = document.getElementById("accountstbl");
        var tr = table.getElementsByTagName("tr");
        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText || td.value;
                if (txtValue.toUpperCase().indexOf(num) > -1) {
                    Fullname = tr[i].getElementsByTagName("td")[1].value || tr[i].getElementsByTagName("td")[1].innerText;
                    Usrname = tr[i].getElementsByTagName("td")[2].value || tr[i].getElementsByTagName("td")[2].innerText;
                    Passwd = tr[i].getElementsByTagName("td")[3].value || tr[i].getElementsByTagName("td")[3].innerText;
                    Email = tr[i].getElementsByTagName("td")[4].value || tr[i].getElementsByTagName("td")[4].innerText;
                }
            }
        }
        // Perform the validations
        if (!validateFullName(Fullname)) {
            alert('Please enter a valid full name.');
            return;
        }
        if (!validateUsername(Usrname)) {
            alert('Username must be at 4 - 15 characters long and can only contain letters, numbers, and underscores.');
            return;
        }
        if (!validateEmail(Email)) {
            alert('Please enter a valid email address.');
            return;
        }

        if (!validatePassword(Passwd)) {
            alert('Password must be 8 - 15 characters long.');
            return;
        }
        let confi = confirm("Do you want to Save Edit Account.");
        // Declaring variable that will hold the prompt values
        if (confi) {
            var table = document.getElementById("accountstbl");
            var tr = table.getElementsByTagName("tr");
            var Fullname, Usrname, Passwd, Email;
            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText || td.value;
                    if (txtValue.toUpperCase().indexOf(num) > -1) {
                        Fullname = tr[i].getElementsByTagName("td")[1].value || tr[i].getElementsByTagName("td")[1].innerText;
                        Usrname = tr[i].getElementsByTagName("td")[2].value || tr[i].getElementsByTagName("td")[2].innerText;
                        Passwd = tr[i].getElementsByTagName("td")[3].value || tr[i].getElementsByTagName("td")[3].innerText;
                        Email = tr[i].getElementsByTagName("td")[4].value || tr[i].getElementsByTagName("td")[4].innerText;
                    }
                }
            }
            var data = {
                accountid: num,
                fullname: Fullname,
                usrname: Usrname,
                passwd: Passwd,
                email: Email
            };
            // Declaring HTTP Request Variable
            var xhr = new XMLHttpRequest();
            // Set the PHP page you want to send data to
            xhr.open("POST", "editaccount.php", true);
            xhr.setRequestHeader("Content-Type", "application/json");
            // What to do when you receive a response
            xhr.onreadystatechange = function () {
                if (xhr.readyState == XMLHttpRequest.DONE) {
                    alert(xhr.responseText); // Alerting any echo from the php as it is
                    window.location.reload(true);
                }
            };
            // Send the data
            xhr.send(JSON.stringify(data));
        }
        document.getElementById("h2tabletitle").innerHTML = "List of Active Orders"
        document.getElementById("editaccount-btn").innerHTML = "Edit";
        document.title = "Shoe X Orders";
        window.location.reload(true);
    }
}
function rmvaccount(num) {
    document.title = "Remove Account";
    var order = num;
    if (order != null && !isNaN(order)) { // If ID is selected
        var found = false;
        var table = document.getElementById("accountstbl");
        var tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText || td.value;
                if (txtValue.toUpperCase().indexOf(order) > -1) {
                    found = true;
                }
            }
        }
        if (!found) {
            alert("No Account with that ID. in table");
            window.location.reload(true);
            document.title = "Shoe X Orders";
        } else {
            let confi = confirm("Are you sure you want to Delete Account");
            // Declaring variable that will hold the prompt values
            if (confi) {
                var data = {
                    accountid: num,
                }
                // Declaring HTTP Request Variable
                var xhr = new XMLHttpRequest();
                // Set the PHP page you want to send data to
                xhr.open("POST", "rmvaccount.php", true);
                xhr.setRequestHeader("Content-Type", "application/json");
                // What to do when you receive a response
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == XMLHttpRequest.DONE) {
                        alert(xhr.responseText); // Alerting any echo from the php as it is
                        window.location.reload(true);
                    }
                };
                // Send the data
                xhr.send(JSON.stringify(data));
            } else {
                alert("Accounts Removal Cancelled");
                document.title = "Shoe X Accounts";
            }
        }
    } else {
        alert("Accounts Not Entered");
        document.title = "Shoe X Accounts";
    }
}