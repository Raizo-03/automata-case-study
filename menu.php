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
                white-space: nowrap;
                letter-spacing: .1em;
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
            <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md my-8">
                <div class="typewriter mb-6">
                    <h1 class="text-2xl font-bold text-center">MENU</h1>
                </div>

                <ul class="mb-4 text-gray-800 font-medium space-y-2">
                    <li>1) Fibonacci</li>
                    <li>2) Lucas</li>
                    <li>3) Tribonacci</li>
                    <li>4) Collatz</li>
                    <li>5) Euclidean Algorithm</li>
                    <li>6) Exit</li>
                </ul>
                    <form id="choiceForm" method="POST" class="flex flex-col gap-4">
                        <label for="choice" class="text-gray-700 font-semibold">Enter your choice:</label>
                        <input type="text" id="choice" name="choice" placeholder="Enter choice number"
                            class="p-2 border rounded-lg focus:ring-2 focus:ring-blue-400" />

                        <div class="flex gap-4 justify-center">
                            <button type="button" onclick="openModal()" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg">Submit</button>
                            <button type="reset" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg">Clear</button>
                        </div>
                    </form>

                <!-- Modal -->
                <div id="termModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
                    <div class="bg-white p-6 rounded-xl shadow-xl text-center space-y-4 w-80">
                        <h2 class="text-lg font-bold">Enter Number of Terms</h2>
                        <input type="number" id="numTerms" class="p-2 border rounded-lg w-full" placeholder="Number of terms" min="1" />
                        <p id="errorMsg" class="text-red-600 text-sm hidden">Please enter a number greater than 2.</p>
                        <div class="flex justify-around mt-4">
                            <button onclick="submitTerms()" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg">Submit</button>
                            <button onclick="closeModal()" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">Cancel</button>
                        </div>
                    </div>
                </div>
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

    <script>
function openModal() {
    const choice = document.getElementById('choice').value.trim();

    if (choice === '' || isNaN(choice) || choice < 1 || choice > 6) {
        alert("Please enter a valid choice number from 1 to 6.");
        return;
    }

    if (choice == 4) {
        // Redirect to collatz.php
        window.location.href = 'collatz.php';
    } else if (choice == 5) {
        // Redirect to euclidean.php
        window.location.href = 'euclidean.php';
    } else if (choice == 6) {
        alert("Exiting the program. Goodbye!");
    } else {
        // For choices 1,2,3 show modal
        document.getElementById('termModal').classList.remove('hidden');
    }
}

function closeModal() {
    document.getElementById('termModal').classList.add('hidden');
    document.getElementById('numTerms').value = '';
    document.getElementById('errorMsg').classList.add('hidden');
}

function submitTerms() {
    const num = document.getElementById('numTerms').value;
    const errorMsg = document.getElementById('errorMsg');

    if (num < 3) {
        errorMsg.classList.remove('hidden');
    } else {
        errorMsg.classList.add('hidden');

        const form = document.createElement('form');
        form.method = 'POST';
        form.action = 'result.php';

        const choiceInput = document.createElement('input');
        choiceInput.type = 'hidden';
        choiceInput.name = 'choice';
        choiceInput.value = document.getElementById('choice').value.trim();

        const termInput = document.createElement('input');
        termInput.type = 'hidden';
        termInput.name = 'terms';
        termInput.value = num;

        form.appendChild(choiceInput);
        form.appendChild(termInput);
        document.body.appendChild(form);
        form.submit();
    }
}
</script>
