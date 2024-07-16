<?php
session_start();
require_once "db_connection.php"; // Include your database connection

if (!isset($_SESSION['username'])) {
    header('Location: login.php'); // Redirect to login if not logged in
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CO2 Emissions Analysis</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            background-image: url(factories.jpg); /* Background image */
            background-size: cover;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .logout-button {
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px; /* Space above the button */
            font-size: 16px;
        }

        .logout-button:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <h1>CO2 Emissions Analysis</h1>
    <table>
        <tr>
            <th>Industry Name</th>
            <th>Emission Date</th>
            <th>CO2 Emission (tons)</th>
            <th>Industry Location</th>
            <th>Data Entered By</th>
        </tr>
        <?php
        $stmt = $pdo->prepare("SELECT industry_name, emission_date, co2_emission, industry_location, data_entered_by FROM emissions WHERE data_entered_by = ?");
        $stmt->execute([$_SESSION['username']]);

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                <td>{$row['industry_name']}</td>
                <td>{$row['emission_date']}</td>
                <td>{$row['co2_emission']}</td>
                <td>{$row['industry_location']}</td>
                <td>{$row['data_entered_by']}</td>
            </tr>";
        }
        ?>
    </table>
    <a href="logout.php" class="logout-button">Logout</a>
</body>
</html>

