<?php
// Place this block at the top to handle POST before HTML
$num = null;
$error = "";
$sequence = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num = intval($_POST["num"]);
    if ($num < 3) {
        $error = "⚠ Error: Please enter a number greater than 3.";
    } else {
        $n1 = 2;
        $n2 = 1;
        for ($i = 0; $i < $num; $i++) {
            $sequence[] = $n1;
            $next = $n1 + $n2;
            $n1 = $n2;
            $n2 = $next;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Automata Case Study</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;600&display=swap" rel="stylesheet">
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
        <h1 class="text-6xl title-text mb-8">Lucas</h1>
    </div>

    <div class="flex flex-row w-full max-w-7xl space-x-10">
        <!-- Left Box: Definition -->
        <div class="w-1/2 p-8 bg-black bg-opacity-70 border border-cyan-400 rounded-2xl shadow-xl backdrop-blur animate-[fadeIn_1s_ease-out]">
            <h2 class="text-3xl text-cyan-400 mb-4">What is the Lucas Sequence?</h2>
            <p class="text-lg text-white">
                The Lucas sequence is similar to the Fibonacci sequence but starts with 2 and 1 instead of 0 and 1. Each term is the sum of the two preceding terms.
            </p>
        </div>

        <!-- Right Box: Input -->
        <div class="w-1/2 p-8 bg-black bg-opacity-70 border border-cyan-400 rounded-2xl shadow-xl backdrop-blur animate-[fadeIn_1s_ease-out]">
            <h2 class="text-3xl text-cyan-400 mb-4">Generate Lucas</h2>
            <form method="post" class="flex flex-col space-y-4">
                <input type="number" name="num" placeholder="Enter number of terms (min 3)"
                       class="p-4 text-lg bg-black bg-opacity-60 border border-cyan-400 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-cyan-400" required>
                <button type="submit" class="neo-button p-4 text-xl">Generate</button>
            </form>
        </div>
    </div>

    <!-- Result Box -->
    <div class="w-full max-w-7xl mt-10 p-8 bg-black bg-opacity-70 border border-cyan-400 rounded-2xl shadow-xl backdrop-blur animate-[fadeIn_1s_ease-out]">
        <h2 class="text-3xl text-cyan-400 mb-4">Result</h2>
        <div class="text-white text-xl">
            <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($error) {
                    echo "<span class='text-red-400'>$error</span>";
                } else {
                    echo "<span class='text-cyan-300'>Lucas Series up to $num terms:</span><br><br>";
                    echo implode(", ", $sequence);
                }
            } ?>
        </div>

        <!-- Action Buttons -->
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
            <div class="mt-6 flex space-x-4">
                <a href="lucas.php" class="px-6 py-3 bg-cyan-500 text-black rounded-xl hover:bg-cyan-400 transition">Try Again</a>
                <a href="menu.php" class="px-6 py-3 bg-red-500 text-black rounded-xl hover:bg-red-400 transition">Exit</a>
            </div>
        <?php } ?>
    </div>
</div>
</body>
</html>
