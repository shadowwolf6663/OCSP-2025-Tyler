<?php //this opens the php code section

echo "<!DOCTYPE html>";  // desired tag to declare what type of page it is

echo "<html>";  // opening html
    echo "<head>";  // opening head

    echo "<title>page 4</title>";  // creating title
    echo "<link rel='stylesheet' type='text/css' href='css\styles.css'>";// getting style formatting for website from external

    echo "</head>";
    echo "<body>"; // opening body


        echo "<div class ='container'>"; // class container to give all items a default to reduce need for styling later
            require_once "assets/topbar.php"; // presenting header
            require_once "assets/nav.php";// presenting navigation bar

            echo "<div class ='content'>"; // class context to give all items that give information an overall style to reduce need for styling later and standardise formatting
                echo "<img src='images/pink%20hair%20woman.jpg' id='introduction_image'>";//adding image to screen
                echo "<p>Welcome to Gibjohn Tutoring!
                Helping You Learn, Grow, and Succeed—One Step at a Time
                At Gibjohn Tutoring, we’re all about making learning easier, more enjoyable, and more personal. Whether you’re struggling with a tricky subject, preparing for exams, or just want to stay ahead in class, we’re here to support you every step of the way.
                We offer a growing library of learning resources that you can access anytime—perfect for brushing up on topics at your own pace. Need a bit more help? You can also book face-to-face tutoring sessions with friendly, experienced tutors who know how to explain things in a way that just makes sense.
                No pressure. No confusing jargon. Just real help from people who care about your progress.
                Whether you’re a student looking to boost your grades, a parent searching for extra support for your child, or an adult learner getting back into education, Gibjohn Tutoring is here for you.
                So take a look around, explore our resources, and when you're ready, book a session with one of our tutors. Let's work together to reach your goals—whatever they are.</p>";// large chunk of text introducing the companies goals



            echo "</div>";

        echo "</div>";

    echo "</body>";

echo "</html>";
?>