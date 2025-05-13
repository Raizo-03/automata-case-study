<?php
// Initialize variables
$numRows = null;
$error = "";
$triangle = [];

function generatePascalTriangle($rows) {
    $triangle = [];
    
    // For input 0, return just row 0 (which is [1])
    $triangle[0] = [1];
    
    // If user wants just the first row (input 0), return only row 0
    if ($rows == 0) {
        return $triangle;
    }
    
    // For input 1, add row 1 which is [1,1]
    $triangle[1] = [1, 1];
    
    // If user wants just two rows (input 1), return rows 0 and 1
    if ($rows == 1) {
        return $triangle;
    }
    
    // Generate the rest of the rows (starting from row 2)
    for ($i = 2; $i <= $rows; $i++) {
        $triangle[$i] = [];
        $triangle[$i][0] = 1;  // First element of each row is 1

        // Generate the middle values of the row
        for ($j = 1; $j < $i; $j++) {
            $triangle[$i][$j] = $triangle[$i-1][$j-1] + $triangle[$i-1][$j];
        }

        // Last element of each row is 1
        $triangle[$i][$i] = 1;
    }
    
    return $triangle;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user input for rows
    $numRows = intval($_POST["numRows"]);

    // Check if the number of rows is a negative integer
    if ($numRows < 0) {
        $error = "⚠ Error: Please enter a non-negative number of rows.";
    } else {
        // Generate Pascal's Triangle (numRows+1 because we count from 0)
        $triangle = generatePascalTriangle($numRows);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pascal's Triangle</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>

    </style>
</head>
<body class="min-h-screen bg-black overflow-y-auto">
<video id="background" autoplay muted loop playsinline>
    <source src="menubg.mp4" type="video/mp4">
</video>

<div class="nav-bar fixed w-full top-0 z-10 flex justify-center">
    <ul class="flex space-x-6 py-4 px-6">
        <li><a href="fibonacci.php" class="text-cyan-400 hover:text-cyan-300 transition-colors cursor-pointer">Fibonacci</a></li>
        <li><a href="lucas.php" class="text-cyan-400 hover:text-cyan-300 transition-colors cursor-pointer">Lucas</a></li>
        <li><a href="tribonacci.php" class="text-cyan-400 hover:text-cyan-300 transition-colors cursor-pointer">Tribonacci</a></li>
        <li><a href="collatz.php" class="text-cyan-400 hover:text-cyan-300 transition-colors cursor-pointer">Collatz</a></li>
        <li><a href="euclidean.php" class="text-cyan-400 hover:text-cyan-300 transition-colors cursor-pointer">Euclidean</a></li>
        <li><a href="pascal.php" class="text-cyan-400 hover:text-cyan-300 transition-colors cursor-pointer">Pascal Triangle</a></li>
        <li><a href="menu.php" class="text-cyan-400 hover:text-cyan-300 transition-colors cursor-pointer">Menu</a></li>
    </ul>
</div>

<div class="flex flex-col items-center justify-center min-h-screen px-10">
    <div class="text-center mb-12 animate-[fadeIn_1s_ease-out]">
        <h1 class="text-6xl title-text mb-8 text-cyan-400">Pascal's Triangle</h1>
    </div>

    <!-- Input Form -->
    <div class="flex flex-row w-full max-w-7xl space-x-10">
        <!-- Left Box: Explanation -->
        <div class="w-1/2 p-8 bg-black bg-opacity-70 border border-cyan-400 rounded-2xl shadow-xl backdrop-blur animate-[fadeIn_1s_ease-out]">
            <h2 class="text-3xl text-cyan-400 mb-4">What is Pascal's Triangle?</h2>
            <p class="text-lg text-white">
                Pascal's Triangle is a triangular array of binomial coefficients. Each number is the sum of the two numbers directly above it.
            </p>
            <p class="text-lg text-white mt-4">
                • Input 0: Shows row 0 (a single 1)<br>
                • Input 1: Shows rows 0 and 1 (the first two rows)<br>
                • Each higher input: Shows that many rows starting from row 0
            </p>
        </div>

        <!-- Right Box: Input -->
        <div class="w-1/2 p-8 bg-black bg-opacity-70 border border-cyan-400 rounded-2xl shadow-xl backdrop-blur animate-[fadeIn_1s_ease-out]">
            <h2 class="text-3xl text-cyan-400 mb-4">Enter the Number of Rows</h2>
            <form method="post" class="flex flex-col space-y-4">
                <input type="number" name="numRows" placeholder="Enter number of rows" 
                       class="p-4 text-lg bg-black bg-opacity-60 border border-cyan-400 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-cyan-400" required>
                <button type="submit" class="neo-button p-4 text-xl">Generate Pascal's Triangle</button>
            </form>
        </div>
    </div>
    <!-- Result Box -->
    <div class="w-full max-w-7xl mt-10 p-8 bg-black bg-opacity-70 border border-cyan-400 rounded-2xl shadow-xl backdrop-blur animate-[fadeIn_1s_ease-out]">
        <h2 class="text-3xl text-cyan-400 mb-4">Pascal's Triangle</h2>
        <div class="text-white text-xl">
            <?php 
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($error) {
                    echo "<span class='text-red-400'>$error</span>";
                } else {
                    // Display Pascal's Triangle
                    echo "<div class='text-center'>";
                    foreach ($triangle as $row) {
                        echo "<div class='flex justify-center mb-2'>";
                        // Add space before each number to center-align
                        foreach ($row as $value) {
                            echo "<div class='p-2'>" . $value . "</div>";
                        }
                        echo "</div>";
                    }
                    echo "</div>";
                }
            }
            ?>
        </div>

        <!-- Action Buttons -->
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
            <div class="mt-6 flex space-x-4">
                <a href="pascal.php" class="px-6 py-3 bg-cyan-500 text-black rounded-xl hover:bg-cyan-400 transition">Try Again</a>
                <a href="menu.php" class="px-6 py-3 bg-red-500 text-black rounded-xl hover:bg-red-400 transition">Exit</a>
            </div>
        <?php } ?>
    </div>
</div>
</body>
</html>