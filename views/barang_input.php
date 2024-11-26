<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Barang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <!-- Navbar -->
    <?php include 'includes/navbar.php'; ?>
    <!-- Main container -->
    <div class="flex">
        <!-- Sidebar -->
        <?php include 'includes/sidebar.php'; ?>
        <!-- Main Content -->
        <div class="flex-1 p-8">
            <!-- Formulir Input Barang -->
            <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Input Barang</h2>
                <form action="index.php?modul=barang&fitur=add" method="POST">
                    <!-- Nama Barang -->
                    <div class="mb-4">
                        <label for="nameBarang" class="block text-gray-700 text-sm font-bold mb-2">Nama Barang :</label>
                        <input type="text" id="nameBarang" name="nameBarang" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan Nama Barang" required>
                    </div>
                    <!-- Harga Barang -->
                    <div class="mb-4">
                        <label for="hargaBarang" class="block text-gray-700 text-sm font-bold mb-2">Harga Barang :</label>
                        <textarea id="hargaBarang" name="hargaBarang" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan Harga Barang" rows="3" required></textarea>
                    </div>
                    <!-- Jumlah Barang -->
                    <div class="mb-4">
                        <label for="jumlahBarang" class="block text-gray-700 text-sm font-bold mb-2">Jumlah Barang :</label>
                        <input type="number" id="jumlahBarang" name="jumlahBarang" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan Jumlah Barang" required>
                    </div>
                    <!-- Submit Button -->
                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>