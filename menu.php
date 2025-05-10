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
    <!-- Video Background -->
    <video id="background" autoplay muted loop playsinline>
        <source src="menubg.mp4" type="video/mp4">
    </video>
    
    <!-- Navigation Bar -->
    <div class="nav-bar fixed w-full top-0 z-10 flex justify-center">
        <ul class="flex space-x-6 py-4 px-6">
            <li><a href="fibonacci.php" class="text-cyan-400 hover:text-cyan-300 transition-colors cursor-pointer">Fibonacci</a></li>
            <li><a href="lucas.php" class="text-cyan-400 hover:text-cyan-300 transition-colors cursor-pointer">Lucas</a></li>
            <li><a href="tribonacci.php" class="text-cyan-400 hover:text-cyan-300 transition-colors cursor-pointer">Tribonacci</a></li>
            <li><a href="collatz.php" class="text-cyan-400 hover:text-cyan-300 transition-colors cursor-pointer">Collatz</a></li>
            <li><a href="euclidean.php" class="text-cyan-400 hover:text-cyan-300 transition-colors cursor-pointer">Euclidean</a></li>
            <li><a href="index.php" class="text-cyan-400 hover:text-cyan-300 transition-colors cursor-pointer">Exit</a></li>
        </ul>
    </div>
    
    <!-- Donut Animation Container (Top Left) - Will be loaded via AJAX -->
    <div class="donut-container" id="donut-container"></div>
    
    <!-- Main Content -->
    <div class="flex flex-col items-center justify-center min-h-screen">
        <div class="text-center mb-12 animate-[fadeIn_1s_ease-out]">
            <h1 class="text-5xl title-text mb-4">NUMBER SEQUENCE</h1>
            <p class="text-cyan-400 text-xl">Select a sequence to explore</p>
        </div>
        
        <!-- Futuristic Buttons -->
        <div class="grid grid-cols-2 gap-6 w-full max-w-3xl px-4">
            <a href="fibonacci.php" class="neo-button py-8 px-4 rounded-lg flex flex-col items-center animate-[fadeIn_1s_ease-out_0.2s] opacity-0" style="animation-fill-mode: forwards;">
                <span class="text-3xl mb-2">01</span>
                <span class="text-lg">Fibonacci</span>
            </a>
            <a href="lucas.php" class="neo-button py-8 px-4 rounded-lg flex flex-col items-center animate-[fadeIn_1s_ease-out_0.4s] opacity-0" style="animation-fill-mode: forwards;">
                <span class="text-3xl mb-2">02</span>
                <span class="text-lg">Lucas</span>
            </a>
            <a href="tribonacci.php" class="neo-button py-8 px-4 rounded-lg flex flex-col items-center animate-[fadeIn_1s_ease-out_0.6s] opacity-0" style="animation-fill-mode: forwards;">
                <span class="text-3xl mb-2">03</span>
                <span class="text-lg">Tribonacci</span>
            </a>
            <a href="collatz.php" class="neo-button py-8 px-4 rounded-lg flex flex-col items-center animate-[fadeIn_1s_ease-out_0.8s] opacity-0" style="animation-fill-mode: forwards;">
                <span class="text-3xl mb-2">04</span>
                <span class="text-lg">Collatz</span>
            </a>
            <a href="euclidean.php" class="neo-button py-8 px-4 rounded-lg flex flex-col items-center animate-[fadeIn_1s_ease-out_1s] opacity-0" style="animation-fill-mode: forwards;">
                <span class="text-3xl mb-2">05</span>
                <span class="text-lg">Euclidean</span>
            </a>
            <a href="euclidean.php" class="neo-button py-8 px-4 rounded-lg flex flex-col items-center animate-[fadeIn_1s_ease-out_1s] opacity-0" style="animation-fill-mode: forwards;">
                <span class="text-3xl mb-2">05</span>
                <span class="text-lg">Pascal Triangle</span>
            </a>
            <a href="exit.php" class="neo-button py-8 px-4 rounded-lg flex flex-col items-center col-span-2 animate-[fadeIn_1s_ease-out_1s] opacity-0" style="animation-fill-mode: forwards;">
            <span class="text-3xl mb-2">07</span>
            <span class="text-lg">Exit</span>
        </a>

        </div>
        
    </div>

</body>
</html>