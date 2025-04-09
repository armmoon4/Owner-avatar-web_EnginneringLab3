<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inaert-Data</title>
</head>
<body>
    <h2>Enter User Details</h2>
    <form action="insert.php" method="POST">
        <label>Name:</label>
        <input type="text" name="name" required><br><br>

        <label>Email:</label>
        <input type="email" name="email" required><br><br>

        <label>Age:</label>
        <input type="number" name="age" required><br><br>

        <label>Gender:</label>
        <input type="radio" name="gender" value="Male" required> Male
        <input type="radio" name="gender" value="Female" required> Female
        <input type="radio" name="gender" value="Other" required> Other<br><br>

        <label>Course:</label>
        <select name="course" required>
            <option value="">--Select Course--</option>
            <option value="CSE">CSE</option>
            <option value="EEE">EEE</option>
            <option value="BBA">BBA</option>
            <option value="LAW">LAW</option>
        </select><br><br>

        <button type="submit">Submit</button>
    </form>
    
</body>
</html>