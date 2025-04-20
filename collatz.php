<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Collatz Sequence Input</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-black flex justify-center items-center">
    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">
        <h1 class="text-2xl font-bold text-center mb-6">Collatz Sequence</h1>
        <form method="POST" action="result.php" class="flex flex-col gap-4" onsubmit="return validateCollatz()">
            <input type="hidden" name="choice" value="4">

            <label class="text-gray-700 font-semibold" for="startNum">Enter Odd Number for Starting Number:</label>
            <input type="number" id="startNum" name="startNum" min="1" class="p-2 border rounded-lg focus:ring-2 focus:ring-blue-400" required>
            <div id="errorMsg" class="text-red-600 text-sm mt-1"></div>

            <div class="flex gap-4 justify-center">
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-lg">Submit</button>
                <a href="menu.php" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded-lg text-center">Back</a>
            </div>
        </form>
    </div>

    <script>
        function validateCollatz() {
            const startNum = document.getElementById('startNum').value;
            const errorMsg = document.getElementById('errorMsg');

            if (startNum === '' || isNaN(startNum) || parseInt(startNum) < 1) {
                errorMsg.textContent = 'Please enter a valid positive integer for the starting number.';
                return false;
            } else if (startNum % 2 == 0) {
                errorMsg.textContent = 'Please enter an odd number for the starting number.';
                return false;
            }

            errorMsg.textContent = '';  // Clear error if valid
            return true;
        }

    </script>
</body>
</html>
