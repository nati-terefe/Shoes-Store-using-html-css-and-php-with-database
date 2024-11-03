<!DOCTYPE html>
<html lang="en">

<head>
    <title>ShoeX/Contact us</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background-image: url("./database/back17.jpg");
            background-size: cover;
            background-repeat: repeat;
            max-width: 100%;
            height: auto;
            font-family: Arial, sans-serif;
        }

        .menu {
            display: none;
        }

        .menulink {
            justify-content: space-between;
        }

        .page-contact {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .page-contact h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .page-contact p {
            margin-bottom: 20px;
        }

        .page-contact label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .page-contact input,
        .page-contact textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        .page-contact button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .page-contact button:hover {
            background-color: #45a049;
        }

        .logo-container {
            text-align: center;
            padding: 10px 0;
            position: relative;
            top: 10%;
            width: 50px;
            height: 45px;
        }

        /* Mobile Styles */
        @media (max-width: 600px) {
            .logo-container {
                position: absolute;
                top: 10%;
                width: 90px;
                height: 50px;
            }

            .page-contact {
                padding: 10px;
            }

            .page-contact h1 {
                font-size: 20px;
            }

            .page-contact p {
                font-size: 14px;
                margin-bottom: 10px;
            }

            .page-contact input,
            .page-contact textarea {
                font-size: 14px;
                padding: 5px;
            }

            .page-contact button {
                padding: 5px 10px;
                font-size: 14px;
            }

            /* ////////////////////////////////menu ////////////////////////// */
            /* Menu icon */
            .menu {
                display: flex;
                flex-direction: column;
                align-items: center;
                background-color: transparent;
                color: white;
                font-size: 17px;
                cursor: pointer;
                max-width: 50px;
                max-height: 35px;
                position: absolute;
                top: 60px;
                left: 85%;
            }

            /* Links in header */
            .nav-links {
                display: none;
                flex-direction: column;
                border-top: 10px solid black;
                list-style-type: none;
                background-color: gray;
                color: white;
                gap: 10px;
                padding-top: 1px;
                align-items: center;
                position: absolute;
                top: 100px;
                width: 18%;
                left: 80%;
                border: none;
            }

            .nav-link:hover {
                background-color: black;
                border-radius: 10%;
                width: 60%;
                color: white;
            }

            /* Hover effect on menu icon */
            .menu:hover+.nav-links,
            .nav-links.active {
                display: flex;
            }

            /* Hover effect on menu icon */
            .menu:hover {
                flex-grow: 1;
                border: 1px solid cyan;
                background-color: #007bff;
            }
        }
    </style>
</head>

<body>
    <header>
        <div class="logo-container">
            <img src="./database/logo.png" alt="logo">
        </div>
        <nav>
            <img src="vectors/menu (1).png" class="menu" alt="">
            <ul class="nav-links">
                <li><a class="nav-link" href="index.php">Home</a></li>
                <li><a class="nav-link" href="showcase.html">Showcase</a></li>
                <li><a class="nav-link" href="about.html">About us</a></li>
                <li><a class="nav-link" href="contact.php">Contact us</a></li>
                <li><a class="nav-link" href="FAQ.html">FAQ</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="page-contact">
            <h1>Contact us</h1>
            <p>Contact us for any kind of question or misinformation about our showcase. First check the FAQ if your question is there. If not, contact us using the information provided.</p>
            <p>Email: shoex@gmail.com</p>
            <p>Phone: +251937675360</p>

            <form method="POST" action="">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Message:</label>
                <textarea id="message" name="message" required></textarea>

                <button type="submit">Submit</button>
            </form>
        </section>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $con = mysqli_connect("localhost", "root", "", "db_shoex"); // Connecting to Database
            if ($con) { // Connection successfully established
                // Retriving all admins
                $name = $_POST['name'];
                $email = $_POST['email'];
                $message = $_POST['message'];
                $registermsg = "insert into messages(name, email, message) values('$name','$email','$message')"; // Query to select all accounts
                mysqli_query($con, $registermsg); // Executing query and storing result
                echo "<script>alert('Message Contacted Successfully')</script>";
                echo "<script>document.querySelector('.contact').reset(); </script>";
            } else if (!$con) // Connection not successfully established
            {
                die('Could not connect: ' . mysqli_connect_error()); // Closing Cnnection
            }
        }
        ?>
    </main>
</body>

</html>
<script>
    // code to make the menu items stay when clicked
    const menu = document.querySelector('.menu');
    const menuLinks = document.querySelectorAll('.nav-links');

    menu.addEventListener('mouseover', function() {
        menuLinks.forEach(link => link.classList.toggle('active'));
    });
    document.addEventListener('DOMContentLoaded', () => {
        document.getElementById("h2tabletitle").innerHTML = "Login History"
        document.querySelector('.contact').reset(); // Reset the form
    });
    ///////////////////////////////////////////////////////////////
</script>