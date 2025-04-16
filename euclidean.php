<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Euclidean Algorithm Input</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-black flex justify-center items-center">
    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">
        <h1 class="text-2xl font-bold text-center mb-6">Euclidean Algorithm</h1>
        <form method="POST" action="result.php" class="flex flex-col gap-4" onsubmit="return validateEuclidean()">
            <input type="hidden" name="choice" value="5">

            <label class="text-gray-700 font-semibold" for="numA">Enter First Number:</label>
            <input type="number" id="numA" name="numA" min="1" class="p-2 border rounded-lg focus:ring-2 focus:ring-blue-400" required>

            <label class="text-gray-700 font-semibold" for="numB">Enter Second Number:</label>
            <input type="number" id="numB" name="numB" min="1" class="p-2 border rounded-lg focus:ring-2 focus:ring-blue-400" required>

            <div class="flex gap-4 justify-center">
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-lg">Submit</button>
                <a href="menu.php" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded-lg text-center">Back</a>
            </div>
        </form>
    </div>

    <script>
        function validateEuclidean() {
            const numA = document.getElementById('numA').value;
            const numB = document.getElementById('numB').value;

            if (numA === '' || isNaN(numA) || parseInt(numA) < 1) {
                alert('Please enter a valid positive integer for the First Number.');
                return false;
            }

            if (numB === '' || isNaN(numB) || parseInt(numB) < 1) {
                alert('Please enter a valid positive integer for the Second Number.');
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
