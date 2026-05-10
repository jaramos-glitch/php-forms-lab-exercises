// LAB 19 //

<!DOCTYPE html>
<html>
<head>
    <title>Lab 19: PROCESS.PHP</title>
</head>
<body>
<div class="form-section">
    <h2>Lab 19: PROCESS.PHP</h2>
    <form method="post" action="process.php">
        <label>Name</label>
        <input type="text" name="reg_name" required>

        <label>Email</label>
        <input type="email" name="reg_email" required>

        <label>Age</label>
        <input type="number" name="reg_age" min="1" max="120" required>

        <label>Password</label>
        <input type="password" name="reg_password" required>

        <label>Gender</label>
        <input type="radio" name="reg_gender" value="Male"> Male
        <input type="radio" name="reg_gender" value="Female"> Female
        <input type="radio" name="reg_gender" value="Other"> Other

        <label>Course</label>
        <select name="reg_course" required>
            <option value="">Choose a Course</option>
            <option value="BSIT">BSIT</option>
            <option value="BSOA">BSOA</option>
            <option value="CSS">CSS</option>
        </select>

        <label>Hobbies</label>
        <input type="checkbox" name="reg_hobbies[]" value="Reading"> Reading
        <input type="checkbox" name="reg_hobbies[]" value="Playing Games"> Playing Games
        <input type="checkbox" name="reg_hobbies[]" value="Watching Netflix"> Watching Netflix

        <label>Message</label>
        <textarea name="reg_message" rows="4" required></textarea>

        <div style="display:flex; justify-content:space-between;">
            <input type="submit" value="Register">
            <input type="reset" value="Reset">
        </div>
    </form>
</div>
</body>
</html>
