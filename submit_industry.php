<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <br><br><title>Add Industry</title></br></br>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0; /* Fallback color */
            background-image: url(factories.jpg); /* Background image */
            background-size: cover; /* Cover the entire viewport */ /* Center the image */
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column; /* Stack elements vertically */
            align-items: center; /* Center horizontally */
        }

        h2 {
            margin-top: 20px; /* Space from the top */
            text-align: center; /* Center the text */
        }

        form {
            background-color: #fff;
            padding: 20px;
            width: 300px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-top: 20px; /* Space below the title */
        }

        input[type="text"],
        input[type="date"] {
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
    <h2>Add Industry</h2>
    <form action="process_industry.php" method="post">
        <input type="text" name="industry_name" placeholder="Industry Name" required>
        <input type="text" name="owner_name" placeholder="Owner Name" required>
        <input type="text" name="address" placeholder="Address" required>
        <input type="date" name="established_on" required>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
