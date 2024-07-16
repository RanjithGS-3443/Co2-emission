<?php
session_start();
require_once "db_connection.php"; // Include your database connection

if (!isset($_SESSION['username'])) {
    header('Location: login.php'); // Redirect to login if not logged in
    exit();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $industry_name = $_POST['industry_name'];
    $emission_date = $_POST['emission_date'];
    $co2_emission = $_POST['co2_emission'];
    $industry_location = $_POST['industry_location'];
    $data_entered_by = $_SESSION['username']; // Use session username

    $stmt = $pdo->prepare("INSERT INTO emissions (industry_name, emission_date, co2_emission, industry_location, data_entered_by) VALUES (?, ?, ?, ?, ?)");
    
    if ($stmt->execute([$industry_name, $emission_date, $co2_emission, $industry_location, $data_entered_by])) {
        header('Location: analysis.php');
        exit();
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Submit Emissions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            background-image: url(factories.jpg); /* Background image */
            background-size: cover;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            width: 300px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        input[type="text"],
        input[type="date"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div>
        <h2>Submit CO2 Emissions</h2>
        <form action="" method="post">
            <input type="text" name="industry_name" placeholder="Industry Name" required>
            <input type="date" name="emission_date" required>
            <input type="number" name="co2_emission" placeholder="CO2 Emission (tons)" required>
            <input type="text" name="industry_location" placeholder="Industry Location" required>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>

