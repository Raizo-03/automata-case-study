<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Number Sequence Menu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes typing {
            from { width: 0 }
            to { width: 100% }
        }
        @keyframes blink {
            50% { border-color: transparent }
        }
        .typewriter h1 {
            overflow: hidden;
            border-right: .15em solid #2563eb;
            white-space: nowrap;
            letter-spacing: .1em;
            animation: typing 3s steps(30, end), blink .75s step-end infinite;
        }
        .donut {
            font-family: monospace;
            line-height: 0.8;
            white-space: pre;
            color: white;
        }
        .layout-container {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            align-items: center;
            width: 100%;
            padding: 0 2rem;
        }
    </style>
</head>
<body class="min-h-screen bg-black"> 
    <div class="layout-container">
        <div class="bg-white p-8 rounded-2xl shadow-lg max-w-md text-center my-8">
            <div class="typewriter mb-6">
                <h1 class="text-2xl font-bold text-black-700">AUTOMATA CASE STUDY</h1>
            </div>
            <form method="POST" action="menu.php">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg">
                    Start
                </button>
            </form>
        </div>
        <div class="donut text-white text-sm" id="donut"></div>
    </div>

<script>
    const preTag = document.getElementById('donut');
    let A = 0, B = 0;
    const render = () => {
        let b = [], z = [];
        const screenWidth = 60, screenHeight = 44;  // Increased size
        const thetaSpacing = 0.07, phiSpacing = 0.02;
        const R1 = 1, R2 = 2, K2 = 5;
        const K1 = screenWidth * K2 * 3 / (8 * (R1 + R2));

        b.length = 0;
        z.length = 0;

        for (let k = 0; k < screenWidth * screenHeight; k++) {
            b[k] = ' ';
            z[k] = 0;
        }

        for (let j = 0; j < 6.28; j += thetaSpacing) {
            for (let i = 0; i < 6.28; i += phiSpacing) {
                const sinA = Math.sin(A), cosA = Math.cos(A);
                const sinB = Math.sin(B), cosB = Math.cos(B);
                const sintheta = Math.sin(j), costheta = Math.cos(j);
                const sinphi = Math.sin(i), cosphi = Math.cos(i);

                const circlex = R2 + R1 * costheta;
                const circley = R1 * sintheta;
                const x = circlex * (cosB * cosphi + sinA * sinB * sinphi) - circley * cosA * sinB;
                const y = circlex * (sinB * cosphi - sinA * cosB * sinphi) + circley * cosA * cosB;
                const zcoord = K2 + cosA * circlex * sinphi + circley * sinA;
                const ooz = 1 / zcoord;
                const xp = Math.floor(screenWidth / 2 + K1 * ooz * x);
                const yp = Math.floor(screenHeight / 2 - K1 * ooz * y);
                const idx = xp + screenWidth * yp;
                const L = cosphi * costheta * sinB - cosA * costheta * sinphi - sinA * sintheta + cosB * (cosA * sintheta - costheta * sinA * sinphi);

                if (yp >= 0 && yp < screenHeight && xp >= 0 && xp < screenWidth && L > 0) {
                    if (ooz > z[idx]) {
                        z[idx] = ooz;
                        const luminance_index = Math.floor(L * 8);
                        const chars = ".,-~:;=!*#$@";
                        b[idx] = chars[luminance_index > 0 ? luminance_index : 0];
                    }
                }
            }
        }

        let output = '';
        for (let k = 0; k < b.length; k++) {
            output += b[k];
            if ((k + 1) % screenWidth === 0) output += '\n';
        }
        preTag.textContent = output;
        A += 0.02;  // Slower donut animation
        B += 0.01;  // Slower donut animation
        requestAnimationFrame(render);
    };

    render();
</script>

</body>
</html>
