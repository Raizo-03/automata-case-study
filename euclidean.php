<?php
// Initialize variables
$num1 = $num2 = null;
$gcd = null;
$error = "";
$steps = [];

function euclideanAlgorithm($a, $b) {
    // Ensure the first number is the larger one
    if ($a < $b) {
        // Swap if the first number is smaller than the second
        list($a, $b) = [$b, $a];
    }

    $steps = [];
    while ($b != 0) {
        $quotient = intdiv($a, $b);
        $remainder = $a % $b;
        $steps[] = "$a = ($b) $quotient + $remainder"; // Show step
        $a = $b;
        $b = $remainder;
    }
    // Return both the steps and the GCD (which is the last non-zero value of $a)
    return [$steps, $a];
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user input
    $num1 = intval($_POST["num1"]);
    $num2 = intval($_POST["num2"]);

    // Check if both numbers are greater than 0
    if ($num1 <= 0 || $num2 <= 0) {
        $error = "⚠ Error: Please enter positive integers.";
    } else {
        // Calculate the steps for Euclidean Algorithm
        list($steps, $gcd) = euclideanAlgorithm($num1, $num2);

        // Ensure the GCD result displays in the format GCD(greater, lesser)
        $greater = max($num1, $num2);
        $lesser = min($num1, $num2);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Euclidean Algorithm</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="min-h-screen bg-black">
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
    </ul>
</div>

<div class="flex flex-col items-center justify-center min-h-screen px-10">
    <div class="text-center mb-12 animate-[fadeIn_1s_ease-out]">
        <h1 class="text-6xl title-text mb-8 text-cyan-400">Euclidean Algorithm</h1>
    </div>

    <!-- Input Form -->
    <div class="flex flex-row w-full max-w-7xl space-x-10">
        <!-- Left Box: Explanation -->
        <div class="w-1/2 p-8 bg-black bg-opacity-70 border border-cyan-400 rounded-2xl shadow-xl backdrop-blur animate-[fadeIn_1s_ease-out]">
            <h2 class="text-3xl text-cyan-400 mb-4">What is the Euclidean Algorithm?</h2>
            <p class="text-lg text-white">
                The Euclidean algorithm finds the greatest common divisor (GCD) of two numbers. It works by repeatedly dividing the larger number by the smaller one and replacing the larger number with the remainder until the remainder is zero. The divisor at this point is the GCD.
            </p>
        </div>

        <!-- Right Box: Input -->
        <div class="w-1/2 p-8 bg-black bg-opacity-70 border border-cyan-400 rounded-2xl shadow-xl backdrop-blur animate-[fadeIn_1s_ease-out]">
            <h2 class="text-3xl text-cyan-400 mb-4">Enter Two Numbers</h2>
            <form method="post" class="flex flex-col space-y-4">
                <input type="number" name="num1" placeholder="Enter first number" 
                       class="p-4 text-lg bg-black bg-opacity-60 border border-cyan-400 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-cyan-400" required>
                <input type="number" name="num2" placeholder="Enter second number"
                       class="p-4 text-lg bg-black bg-opacity-60 border border-cyan-400 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-cyan-400" required>
                <button type="submit" class="neo-button p-4 text-xl">Calculate GCD</button>
            </form>
        </div>
    </div>

    <!-- Result Box -->
    <div class="w-full max-w-7xl mt-10 p-8 bg-black bg-opacity-70 border border-cyan-400 rounded-2xl shadow-xl backdrop-blur animate-[fadeIn_1s_ease-out]">
        <h2 class="text-3xl text-cyan-400 mb-4">Steps</h2>
        <div class="text-white text-xl">
            <?php 
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($error) {
                    echo "<span class='text-red-400'>$error</span>";
                } else {
                    foreach ($steps as $step) {
                        echo "<p>$step</p><br>";
                    }
                    // Add GCD result echo in the format GCD(greater, lesser)
                    echo "<p class='mt-4 text-xl text-cyan-400'>GCD($greater, $lesser) = $gcd</p>";
                }
            }
            ?>
        </div>

        <!-- Action Buttons -->
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
            <div class="mt-6 flex space-x-4">
                <a href="euclidean.php" class="px-6 py-3 bg-cyan-500 text-black rounded-xl hover:bg-cyan-400 transition">Try Again</a>
                <a href="menu.php" class="px-6 py-3 bg-red-500 text-black rounded-xl hover:bg-red-400 transition">Exit</a>
            </div>
        <?php } ?>
    </div>
</div>
</body>
</html>