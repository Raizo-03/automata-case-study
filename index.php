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

</body>
</html>
