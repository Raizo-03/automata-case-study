<?php
// Set the content type to text/html
header('Content-Type: text/html; charset=utf-8');
?>

<div class="donut" id="donut"></div>

<style>
    .donut {
        font-family: monospace;
        line-height: 0.8;
        white-space: pre;
        color: #0ef;
        text-shadow: 0 0 5px #0ef, 0 0 10px #0ef;
    }
</style>

<script>
    // Donut animation
    const preTag = document.getElementById('donut');
    let A = 0, B = 0;
    const render = () => {
        let b = [], z = [];
        const screenWidth = 40, screenHeight = 30; // Smaller size
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
        A += 0.03;
        B += 0.015;
        requestAnimationFrame(render);
    };

    render();
</script>