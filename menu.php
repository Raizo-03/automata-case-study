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
            <li><a href="pascal.php" class="text-cyan-400 hover:text-cyan-300 transition-colors cursor-pointer">Pascal Triangle</a></li>
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
            <a href="index.php" class="neo-button py-8 px-4 rounded-lg flex flex-col items-center col-span-2 animate-[fadeIn_1s_ease-out_1s] opacity-0" style="animation-fill-mode: forwards;">
            <span class="text-3xl mb-2">07</span>
            <span class="text-lg">Exit</span>
        </a>

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