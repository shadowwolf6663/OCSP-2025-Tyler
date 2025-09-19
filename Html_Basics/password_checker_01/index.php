<?php //this opens the php code section

echo "<!DOCTYPE html>";  // desired tag to declare what type of page it is

echo "<html>";  // opening html
    echo "<head>";  // opening head

    echo "<title>page title</title>";  // creating title
    echo "<link rel='stylesheet' type='text/css' href='css\styles.css'>";// getting css formatting for website from external

    echo "</head>";
    echo "<body>"; // opening body


        echo "<div class ='container'>"; // class container to give all items a default to reduce need for styling later
            require_once "assets/topbar.php"; // presenting header
            require_once "assets/nav.php";// presenting navigation bar

            echo "<div class ='content'>"; // class context to give all items that give information an overall css to reduce need for styling later and standardise formatting
                echo "<p>In today’s digital world, your password is often the only thing standing between your personal data and a cybercriminal. Weak, reused, or predictable passwords are a major vulnerability and are frequently exploited in data breaches, brute-force attacks, and phishing schemes. That’s why password strength matters more than ever. Our password checking tool helps you instantly evaluate the strength and security of your passwords using a variety of modern techniques. It analyzes length and complexity, detects common patterns like repeated characters or keyboard sequences, and checks against dictionaries of commonly used or compromised passwords. We also calculate password entropy to estimate how difficult it would be to crack your password using automated tools. For extra protection, we cross-reference with known data breaches using privacy-preserving APIs, so you can be alerted if your password has already been exposed online. All analysis is done securely, with no passwords stored or transmitted, ensuring your privacy while helping you build stronger, safer credentials. Whether you’re securing a personal account or managing enterprise access, understanding password strength is a critical step toward better online security, and our tool gives you the insight you need to take control.</p>"; // main text for body of main



            echo "</div>";

        echo "</div>";

    echo "</body>";

echo "</html>";
?>