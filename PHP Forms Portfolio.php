<!DOCTYPE html>
<html>
<head>
    <title>PHP Forms Portfolio</title>
   <style>
    body {
        font-family: "Segoe UI", Arial, sans-serif;
        background-color: #000;
        margin: 0;
        padding: 40px 20px; /* space at top and sides */
        color: #fff;
        display: block; /* remove flex centering */
    }

    .form-section {
        background: #111;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(255,255,255,0.1);
        max-width: 600px;
        margin: 0 auto 40px auto; /* center horizontally, stack vertically */
        animation: fadeInUp 0.8s ease;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .form-section:hover {
        transform: scale(1.02);
        box-shadow: 0 10px 30px rgba(255,255,255,0.2);
    }

    h1 {
        text-align: center;
        color: #fff;
        margin-bottom: 30px;
        font-size: 26px;
        letter-spacing: 1px;
    }

    h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #fff;
        font-size: 22px;
        letter-spacing: 1px;
    }

    label {
        display: block;
        margin-top: 14px;
        font-weight: bold;
        color: #ddd;
    }

    input[type="text"], input[type="email"], input[type="number"], 
    input[type="password"], select, textarea {
        width: 100%;
        padding: 12px;
        margin-top: 6px;
        border: 1px solid #444;
        border-radius: 6px;
        font-size: 14px;
        background-color: #000;
        color: #fff;
        transition: all 0.3s ease;
    }

    input:focus, select:focus, textarea:focus {
        border-color: #fff;
        box-shadow: 0 0 8px rgba(255,255,255,0.6);
        outline: none;
    }

    input[type="radio"], input[type="checkbox"] {
        margin-right: 6px;
    }

    input[type="submit"], input[type="reset"] {
        background: #fff;
        color: #000;
        border: none;
        padding: 12px 20px;
        border-radius: 6px;
        cursor: pointer;
        transition: transform 0.2s ease, background 0.3s ease;
        margin-top: 20px;
        margin-right: 10px;
        width: 48%;
        font-weight: bold;
    }

    input[type="submit"]:hover, input[type="reset"]:hover {
        background: #ddd;
        transform: scale(1.05);
    }

    .output {
        margin-top: 25px;
        padding: 15px;
        background-color: #000;
        border-left: 5px solid #fff;
        border-radius: 6px;
        font-size: 15px;
        color: #fff;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

</head>
<body>

<h1>PHP Forms Portfolio</h1>

<div class="form-section">
    <h2>Lab 1: Basic Form Creation (GET)</h2>
    <form method="get" action="">
        <label>Name</label>
        <input type="text" name="name_get">
        <input type="submit" value="Submit">
    </form>
    <?php

    if (isset($_GET['name_get']) && !empty($_GET['name_get'])) {
        echo "<div class='output'>Hello, " . htmlspecialchars($_GET['name_get']) . "</div>";
    }
    ?>
</div>

<div class="form-section">
    <h2>Lab 2: Using POST Method</h2>
    <form method="post" action="">
        <label>Name</label>
        <input type="text" name="name_post">
        <input type="submit" value="Submit">
    </form>
    <?php
  
    if (isset($_POST['name_post']) && !empty($_POST['name_post'])) {
        echo "<div class='output'>Hello, " . htmlspecialchars($_POST['name_post']) . "</div>";
    }
    ?>
</div>

<div class="form-section">
    <h2>Lab 3: Multiple Inputs</h2>
    <form method="post" action="">
        <label>Name</label>
        <input type="text" name="name_multi">
        <label>Email</label>
        <input type="email" name="email_multi">
        <input type="submit" value="Submit">
    </form>
    <?php

    if (!empty($_POST['name_multi']) && !empty($_POST['email_multi'])) {
        echo "<div class='output'>Hello, " . htmlspecialchars($_POST['name_multi']) . "<br>Email: " . htmlspecialchars($_POST['email_multi']) . "</div>";
    }
    ?>
</div>

<div class="form-section">
    <h2>Lab 4: Form Validation</h2>
    <form method="post" action="">
        <label>Name</label>
        <input type="text" name="name_val" required>
        <label>Email</label>
        <input type="text" name="email_val" required>
        <input type="submit" value="Submit">
    </form>
    <?php
  
    if ($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_POST["name_val"]) || isset($_POST["email_val"]))) {
        if (empty($_POST["name_val"])) echo "<div class='output'>Name is required</div>";
        if (empty($_POST["email_val"])) echo "<div class='output'>Email is required</div>";
        if (!empty($_POST["name_val"]) && !empty($_POST["email_val"])) {
            echo "<div class='output'>Hello, " . htmlspecialchars($_POST["name_val"]) . "<br>Email: " . htmlspecialchars($_POST["email_val"]) . "</div>";
        }
    }
    ?>
</div>

<div class="form-section">
    <h2>Lab 5: Prevent XSS</h2>
    <form method="post" action="">
        <label>Enter something</label>
        <input type="text" name="xss_input">
        <input type="submit" value="Submit">
    </form>
    <?php

    if (!empty($_POST['xss_input'])) {
        echo "<div class='output'>You entered: " . htmlspecialchars($_POST['xss_input']) . "</div>";
    }
    ?>
</div>

<div class="form-section">
    <h2>Lab 6: Email Validation</h2>
    <form method="post" action="">
        <label>Email</label>
        <input type="text" name="email_check">
        <input type="submit" value="Submit">
    </form>
    <?php

    if (!empty($_POST['email_check'])) {
        if (filter_var($_POST['email_check'], FILTER_VALIDATE_EMAIL)) {
            echo "<div class='output'>Valid email: " . htmlspecialchars($_POST['email_check']) . "</div>";
        } else {
            echo "<div class='output'>Invalid email</div>";
        }
    }
    ?>
</div>

<div class="form-section">
    <h2>Lab 7: Radio Buttons</h2>
    <form method="post" action="">
        <label>Gender</label>
        <input type="radio" name="gender" value="Male"> Male
        <input type="radio" name="gender" value="Female"> Female
        <input type="submit" value="Submit">
    </form>
    <?php

    if (!empty($_POST['gender'])) {
        echo "<div class='output'>Selected gender: " . htmlspecialchars($_POST['gender']) . "</div>";
    }
    ?>
</div>

<div class="form-section">
    <h2>Lab 8: Dropdown Menu</h2>
    <form method="post" action="">
        <label>Course</label>
        <select name="course">
            <option value="">Choose a course</option>
            <option value="BSIT">BSIT</option>
            <option value="BSOA">BSOA</option>
            <option value="CSS">CSS</option>
        </select>
        <input type="submit" value="Submit">
    </form>
    <?php

    if (!empty($_POST['course'])) {
        echo "<div class='output'>Selected course: " . htmlspecialchars($_POST['course']) . "</div>";
    }
    ?>
</div>

<div class="form-section">
    <h2>Lab 9: Textarea Input</h2>
    <form method="post" action="">
        <label>Message</label>
        <textarea name="message" rows="4" cols="40"></textarea>
        <input type="submit" value="Submit">
    </form>
    <?php

    if (!empty($_POST['message'])) {
        echo "<div class='output'>Your message: " . htmlspecialchars($_POST['message']) . "</div>";
    }
    ?>
</div>

<div class="form-section">
    <h2>Lab 10: Combined Form</h2>
    <form method="post" action="">
        <label>Name</label>
        <input type="text" name="name_comb"

<div class="form-section">
    <h2>Lab 11: Self-Processing Form</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label>Name</label>
        <input type="text" name="name_self">
        <input type="submit" value="Submit">
    </form>
    <?php
  
    if (!empty($_POST['name_self'])) {
        echo "<div class='output'>Hello, " . htmlspecialchars($_POST['name_self']) . "</div>";
    }
    ?>
</div>

<div class="form-section">
    <h2>Lab 12: Sticky Form</h2>
    <form method="post" action="">
        <label>Name</label>
        <input type="text" name="name_sticky" value="<?php if(isset($_POST['name_sticky'])) echo htmlspecialchars($_POST['name_sticky']); ?>">
        <label>Email</label>
        <input type="text" name="email_sticky" value="<?php if(isset($_POST['email_sticky'])) echo htmlspecialchars($_POST['email_sticky']); ?>">
        <input type="submit" value="Submit">
    </form>
    <?php

    if (!empty($_POST['name_sticky']) && !empty($_POST['email_sticky'])) {
        echo "<div class='output'>Sticky Form Output:<br>Name: " . htmlspecialchars($_POST['name_sticky']) . "<br>Email: " . htmlspecialchars($_POST['email_sticky']) . "</div>";
    }
    ?>
</div>

<div class="form-section">
    <h2>Lab 13: Password Input</h2>
    <form method="post" action="">
        <label>Username</label>
        <input type="text" name="username">
        <label>Password</label>
        <input type="password" name="password">
        <input type="submit" value="Login">
    </form>
    <?php
 
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        echo "<div class='output'>Login attempt received for user: " . htmlspecialchars($_POST['username']) . "<br>Password is securely handled (not displayed).</div>";
    }
    ?>
</div>

<div class="form-section">
    <h2>Lab 14: Checkbox Input</h2>
    <form method="post" action="">
        <label>Hobbies</label>
        <input type="checkbox" name="hobbies[]" value="Reading"> Reading
        <input type="checkbox" name="hobbies[]" value="Music"> Playing Gmaes
        <input type="checkbox" name="hobbies[]" value="Coding"> Watching Netflix
        <input type="submit" value="Submit">
    </form>
    <?php

    if (!empty($_POST['hobbies'])) {
        echo "<div class='output'>Selected hobbies: " . implode(", ", array_map('htmlspecialchars', $_POST['hobbies'])) . "</div>";
    }
    ?>
</div>

<div class="form-section">
    <h2>Lab 15: Form Reset Button</h2>
    <form method="post" action="">
        <label>Name</label>
        <input type="text" name="name_reset">
        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
    </form>
    <?php
    // Lab 15
    if (!empty($_POST['name_reset'])) {
        echo "<div class='output'>Entered name: " . htmlspecialchars($_POST['name_reset']) . "</div>";
    }
    ?>
</div>

<div class="form-section">
    <h2>Lab 16: Number Input Validation</h2>
    <form method="post" action="">
        <label>Age</label>
        <input type="number" name="age" min="1" max="120">
        <input type="submit" value="Submit">
    </form>
    <?php

    if (isset($_POST['age'])) {
        $age = $_POST['age'];
        if (!is_numeric($age) || $age < 1 || $age > 120) {
            echo "<div class='output'>Invalid age entered.</div>";
        } else {
            echo "<div class='output'>Valid age: " . htmlspecialchars($age) . "</div>";
        }
    }
    ?>
</div>

<div class="form-section">
    <h2>Lab 17: Required Attribute (HTML)</h2>
    <form method="post" action="">
        <label>Name</label>
        <input type="text" name="name_req" required>
        <label>Email</label>
        <input type="email" name="email_req" required>
        <input type="submit" value="Submit">
    </form>
    <?php

    if (!empty($_POST['name_req']) && !empty($_POST['email_req'])) {
        echo "<div class='output'>Name: " . htmlspecialchars($_POST['name_req']) . "<br>Email: " . htmlspecialchars($_POST['email_req']) . "</div>";
    }
    ?>
</div>

<div class="form-section">
    <h2>Lab 18: GET vs POST Comparison</h2>
    <form method="get" action="">
        <label>Name (GET)</label>
        <input type="text" name="name_get2">
        <input type="submit" value="Submit (GET)">
    </form>
    <form method="post" action="">
        <label>Name (POST)</label>
        <input type="text" name="name_post2">
        <input type="submit" value="Submit (POST)">
    </form>
    <?php

    if (!empty($_GET['name_get2'])) {
        echo "<div class='output'>GET Name: " . htmlspecialchars($_GET['name_get2']) . "</div>";
    }
    if (!empty($_POST['name_post2'])) {
        echo "<div class='output'>POST Name: " . htmlspecialchars($_POST['name_post2']) . "</div>";
    }
    ?>
</div>
</body>
</html>