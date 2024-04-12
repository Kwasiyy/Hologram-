<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"],
        input[type="file"] {
            width: calc(100% - 12px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error-message {
            color: red;
            margin-top: 5px;
        }
        input:invalid {
            border: 1px solid red;
        }
    </style>
</head>
<body>
    <form id="registerForm" action="../action/register_action.php" method="POST">
        <h2>Register</h2>
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
        <label for="firstname">First name</label>
        <input type="text" id="firstname" name="firstname" required>
        <label for="lastname">Last name</label>
        <input type="text" id="lastname" name="lastname" required>
        <label for="gender">Gender</label>
        <select id="gender" name="gender">
            <option value="other">Other</option>
            <option value="male">Male</option>
            <option value="female">Female</option>

        </select>
        <label for="dob">Date of Birth</label>
        <input type="date" id="dob" name="dob" placeholder="mm-dd-yyyy" required>
        <label for="phoneNumber">Phone Number</label>
        <input type="tel" id="phoneNumber" name="phoneNumber" required>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
        <label for="confirmPassword">Confirm Password</label>
        <input type="password" id="confirmPassword" name="confirmPassword" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
        <input type="submit" value="Register" name="register" id="regi">
        <div id="errorMessage" class="error-message"></div>
    </form>
</body>
</html>