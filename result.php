<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sequence Result</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-100 flex items-center justify-center">

<div class="bg-white p-8 rounded-2xl shadow-lg text-center w-full max-w-md">
    <h1 class="text-2xl font-bold mb-4 text-blue-600">Sequence Result</h1>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $choice = isset($_POST['choice']) ? intval($_POST['choice']) : 0;

        switch ($choice) {
            case 1:  // Fibonacci
            case 2:  // Lucas
            case 3:  // Tribonacci
                $terms = isset($_POST['terms']) ? intval($_POST['terms']) : 0;

                if ($terms < 2) {
                    echo "<p class='text-red-500 font-semibold'>Invalid number of terms. Must be at least 2.</p>";
                } else {
                    $sequence = [];
                    if ($choice === 1) {
                        $sequence = [1, 1];
                        for ($i = 2; $i < $terms; $i++) {
                            $sequence[] = $sequence[$i-1] + $sequence[$i-2];
                        }
                        $type = "Fibonacci";
                    } elseif ($choice === 2) {
                        $sequence = [2, 1];
                        for ($i = 2; $i < $terms; $i++) {
                            $sequence[] = $sequence[$i-1] + $sequence[$i-2];
                        }
                        $type = "Lucas";
                    } else {
                        $sequence = [0, 0, 1];
                        for ($i = 3; $i < $terms; $i++) {
                            $sequence[] = $sequence[$i-1] + $sequence[$i-2] + $sequence[$i-3];
                        }
                        $type = "Tribonacci";
                    }

                    echo "<p class='text-gray-800 font-medium mb-2'>You selected: <span class='text-green-600 font-bold'>$type</span></p>";
                    if($choice===1){
                        echo "The Fibonacci sequence is a series of numbers where each number is the sum of the two preceding ones, starting from 0 and 1. It appears in nature, art, and computer science.";
                    }else if($choice ===2){
                        echo "The Lucas sequence is similar to the Fibonacci sequence but starts with 2 and 1 instead of 0 and 1. Each number is the sum of its two preceding numbers.";
                    }else if($choice === 3){
                        echo "The Tribonacci sequence extends the Fibonacci rule by summing the previous three numbers to generate the next, starting typically from 0, 0, 1.";
                    }
                    echo "<p class='mt-2 text-gray-700'>Number of terms: <strong>$terms</strong></p>";
                    echo "<p class='mt-4 text-gray-800'>Sequence:</p>";
                    echo "<div class='mt-1 p-2 bg-gray-200 rounded text-blue-700 font-mono'>" . implode(', ', $sequence) . "</div>";
                }
                break;

            case 4:  // Collatz
                $startNum = isset($_POST['startNum']) ? intval($_POST['startNum']) : 0;

                if ($startNum < 1) {
                    echo "<p class='text-red-500 font-semibold'>Invalid starting number. Must be a positive integer.</p>";
                } else {
                    $collatz = [$startNum];
                    while ($startNum != 1) {
                        if ($startNum % 2 == 0) {
                            $startNum /= 2;
                        } else {
                            $startNum = 3 * $startNum + 1;
                        }
                        $collatz[] = $startNum;
                    }
                    echo "<p class='text-gray-800 font-medium mb-2'>You selected: <span class='text-green-600 font-bold'>Collatz Sequence</span></p>";
                    echo "The Collatz Conjecture involves taking any positive integer: if it’s even, divide it by 2; if it’s odd, multiply by 3 and add 1. Repeat the process and the sequence always reaches 1.";
                    echo "<p class='mt-4 text-gray-800'>Sequence:</p>";
                    echo "<div class='mt-1 p-2 bg-gray-200 rounded text-blue-700 font-mono'>" . implode(', ', $collatz) . "</div>";
                }
                break;

            case 5:  // Euclidean Algorithm
                $numA = isset($_POST['numA']) ? intval($_POST['numA']) : 0;
                $numB = isset($_POST['numB']) ? intval($_POST['numB']) : 0;

                if ($numA < 1 || $numB < 1) {
                    echo "<p class='text-red-500 font-semibold'>Both numbers must be positive integers.</p>";
                } else {
                    $a = $numA;
                    $b = $numB;
                    $steps = [];
                    while ($b != 0) {
                        $steps[] = "$a ÷ $b = " . intdiv($a, $b) . " remainder " . ($a % $b);
                        $temp = $b;
                        $b = $a % $b;
                        $a = $temp;
                    }

                    echo "<p class='text-gray-800 font-medium mb-2'>You selected: <span class='text-green-600 font-bold'>Euclidean Algorithm</span></p>";
                    echo "The Euclidean algorithm is an efficient method for finding the greatest common divisor (GCD) of two numbers by repeatedly applying the rule: GCD(a, b) = GCD(b, a mod b) until b equals zero.";
                    echo "<p class='mt-4 text-gray-800'>Steps:</p>";
                    echo "<div class='mt-1 p-2 bg-gray-200 rounded text-blue-700 font-mono'>" . implode('<br>', $steps) . "</div>";
                    echo "<p class='mt-4 text-green-700 font-bold'>GCD is: $a</p>";
                }
                break;

            default:
                echo "<p class='text-red-500 font-semibold'>Invalid choice.</p>";
                break;
        }
    } else {
        echo "<p class='text-red-500 font-semibold'>No data received.</p>";
    }
    ?>

     <h2 class="text-2xl font-bold mb-4 text-blue-600 pt-6">Try Again?</h2>
    <a href="menu.php" class="mt-6 inline-block bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg">Yes</a>
    <a href="index.php" class="mt-6 inline-block bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg">No</a>
</div>

</body>
</html>
