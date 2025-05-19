<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Automata Case Study</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            overflow: hidden;
        }
        #background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
            opacity: 0.4;
        }
        @keyframes pulse {
            0% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.6; transform: scale(1.05); }
            100% { opacity: 1; transform: scale(1); }
        }
        .futuristic-text {
            color: #ffffff;
            font-family: 'Orbitron', sans-serif;
            letter-spacing: 3px;
            text-transform: uppercase;
            font-size: 4.5rem;
            font-weight: 700;
            animation: pulse 2s infinite;
        }
        .futuristic-button {
            background: transparent;
            border: 3px solid #00ffff; /* Slightly thicker border */
            color: #00ffff;
            font-family: 'Orbitron', sans-serif;
            font-weight: 700;
            font-size: 1.5rem; /* Increased font size */
            padding: 1rem 2rem; /* Increased padding for larger button */
            border-radius: 12px; /* Slightly larger border radius */
            text-transform: uppercase;
            letter-spacing: 2px;
            transition: transform 0.3s, background 0.3s, box-shadow 0.3s;
        }
        .futuristic-button:hover {
            transform: scale(1.1);
            background: rgba(0, 255, 255, 0.1);
            box-shadow: 0 0 15px rgb(234, 241, 241);
        }
    </style>
</head>
<body class="bg-black flex items-center justify-center">

    <!-- 🔥 VIDEO BACKGROUND -->
<video id="background" autoplay muted loop playsinline>
    <source src="bg.webm" type="video/webm">
    <source src="bg.mp4" type="video/mp4">
</video>

    <!-- 🚀 CENTERED CONTENT -->
    <div class="flex flex-col items-center space-y-6">
        <h1 class="futuristic-text">AUTOMATA CASE STUDY</h1>
        <form method="POST" action="menu.php">
            <button type="submit" class="futuristic-button">
                Start
            </button>
        </form>
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
