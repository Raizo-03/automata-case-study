<?php
$num = null;
$error = "";
$sequence = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num = intval($_POST["num"]);
    if ($num % 2 == 0) {
        $error = "⚠ Error: Please enter an odd number.";
    } else {
        $sequence[] = $num;
        while ($num != 1) {
            if ($num % 2 == 0) {
                $num = $num / 2;
            } else {
                $num = $num * 3 + 1;
            }
            $sequence[] = $num;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Collatz Conjecture</title>
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
        <li><a href="menu.php" class="text-cyan-400 hover:text-cyan-300 transition-colors cursor-pointer">Menu</a></li>

    </ul>

</div>

<div class="flex flex-col items-center justify-center min-h-screen px-10">
    <div class="text-center mb-12 animate-[fadeIn_1s_ease-out]">
        <h1 class="text-6xl title-text mb-8">Collatz Conjecture</h1>
    </div>

    <div class="flex flex-row w-full max-w-7xl space-x-10">
        <!-- Left Box: Definition -->
        <div class="w-1/2 p-8 bg-black bg-opacity-70 border border-cyan-400 rounded-2xl shadow-xl backdrop-blur animate-[fadeIn_1s_ease-out]">
            <h2 class="text-3xl text-cyan-400 mb-4">What is the Collatz Conjecture?</h2>
            <p class="text-lg text-white">
                The Collatz Conjecture is a sequence defined as follows: take any positive integer n. If n is even, divide it by 2. If n is odd, multiply it by 3 and add 1. Repeat the process until n equals 1.
            </p>
        </div>

        <!-- Right Box: Input -->
        <div class="w-1/2 p-8 bg-black bg-opacity-70 border border-cyan-400 rounded-2xl shadow-xl backdrop-blur animate-[fadeIn_1s_ease-out]">
            <h2 class="text-3xl text-cyan-400 mb-4">Generate Collatz</h2>
            <form method="post" class="flex flex-col space-y-4">
                <input type="number" name="num" placeholder="Enter odd number"
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
                    echo "<span class='text-cyan-300'>Collatz Sequence starting from $num:</span><br><br>";
                    echo implode(", ", $sequence);
                }
            } ?>
        </div>

        <!-- Action Buttons -->
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
            <div class="mt-6 flex space-x-4">
                <a href="collatz.php" class="px-6 py-3 bg-cyan-500 text-black rounded-xl hover:bg-cyan-400 transition">Try Again</a>
                <a href="menu.php" class="px-6 py-3 bg-red-500 text-black rounded-xl hover:bg-red-400 transition">Exit</a>
            </div>
        <?php } ?>
    </div>
</div>

<!-- 🌐 FOOTER -->
<footer class="footer">
    <div class="footer-content">
        <!-- Three-column layout: Names left, Social middle, Professor right -->
        <div class="footer-layout">
            <!-- Left Column: Students -->
            <div class="footer-left">
                <ul class="name-list">
                    <li>Krissa Mae Beringuel</li>
                    <li>Eduardo II Buscato</li>
                    <li>Rod Anthony Balaoro</li>
                </ul>
            </div>
            
            <!-- Middle Column: Social Media Icons -->
            <div class="footer-middle">
                <div class="social-links">
                    <a href="https://www.linkedin.com/in/eduardo-ii-buscato-6729772b5/" class="social-icon" title="LinkedIn">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="https://github.com/zzzrod1"class="social-icon" title="GitHub">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="https://www.facebook.com/krissaberinguel" class="social-icon" title="Facebook">
                        <i class="fab fa-facebook"></i>
                    </a>
                </div>
            </div>
            
            <!-- Right Column: Professor -->
            <div class="footer-right">
                <ul class="name-list">
                    <li>Professor Lester Glover Diampoc</li>
                    <li>&nbsp;</li>
                </ul>
            </div>
        </div>
        
        <div class="copyright">
            <p>Automata &copy; 2025. All rights reserved.</p>
        </div>
    </div>
</footer>

<!-- Add Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- CSS for the footer -->
<style>
    .footer {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        color: #fff;
        padding: 0.5rem;
        font-family: 'Arial', sans-serif;
        backdrop-filter: blur(5px);
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .footer-content {
        max-width: 1200px;
        margin: 0 auto;
    }
    
    .footer-layout {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 0.4rem;
    }
    
    .footer-left, 
    .footer-right, 
    .footer-middle {
        flex: 1;
    }
    
    .footer-left {
        text-align: left;
        padding-left: 2rem;
    }
    
    .footer-middle {
        text-align: center;
    }
    
    .footer-right {
        text-align: right;
        padding-right: 2rem;
    }
    
    .name-list {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }
    
    .name-list li {
        margin-bottom: 0.2rem;
        font-size: 0.85rem;
        line-height: 1.2;
    }
    
    .social-links {
        display: flex;
        justify-content: center;
        gap: 1.5rem;
    }
    
    .social-icon {
        color: #fff;
        font-size: 1.2rem;
        transition: color 0.3s ease, transform 0.3s ease;
    }
    
    .social-icon:hover {
        color: #00aaff;
        transform: translateY(-2px);
    }
    
    .copyright {
        text-align: center;
        font-size: 0.75rem;
        opacity: 0.7;
        margin: 0;
    }
    
    .copyright p {
        margin: 0;
    }
    
    @media (max-width: 768px) {
        .footer-layout {
            flex-direction: column;
            gap: 0.3rem;
        }
        
        .footer-left,
        .footer-right {
            text-align: center;
            padding: 0;
        }
        
        .footer-middle {
            order: 3;
        }
    }
</style>
</body>
</html>