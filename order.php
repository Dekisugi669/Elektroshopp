

<?php 
// Cek apakah formulir telah disubmit
if (isset($_POST['order'])){
    // Tangkap data dari formulir
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $product = $_POST['product'];
    $quantity = $_POST['quantity'];
    $payment_method = $_POST['payment-method'];

    // Detail koneksi database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "ElektroShopp";

    // Membuat koneksi ke database
    $conn = new mysqli($servername, $username, $password, $database);

    // Cek koneksi
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data ke dalam tabel `orders`
    $sql = "INSERT INTO `orders` (name, email, address, phone, product, quantity, payment_method) 
            VALUES ('$name', '$email', '$address', '$phone', '$product', '$quantity', '$payment_method')";

    if ($conn->query($sql) === TRUE) {
        header("Location: dashboard.php");
        exit(); // Pastikan untuk menghentikan eksekusi skrip setelah redirect
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>


<!-- Formulir Pemesanan -->
<div class="order-form-container">
    <h2>Formulir Pemesanan</h2>
    <form id="orderForm" action="order.php" method="POST">
        <!-- Nama Lengkap -->
        <div class="form-group">
            <label for="name">Nama Lengkap</label>
            <input type="text" id="name" name="name" required>
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>

        <!-- Alamat Pengiriman -->
        <div class="form-group">
            <label for="address">Alamat Pengirim</label>
            <textarea id="address" name="address" rows="4" required></textarea>
        </div>

        <!-- Nomor Telepon -->
        <div class="form-group">
            <label for="phone">Nomor Wa</label>
            <input type="tel" id="phone" name="phone" required>
        </div>

        <!-- Produk -->
        <div class="form-group">
            <label for="product">Pilih Produk</label>
            <select id="product" name="product" required>
                <option value="" disabled selected>Pilih Produk Anda</option>
                <option value="product1">Strongwell Brush Pembersih Karat Besi Nano Melamine Magic Sponge - SW901</option>
            </select>
        </div>

        <!-- Jumlah -->
        <div class="form-group">
            <label for="quantity">Jumlah Produk</label>
            <input type="number" id="quantity" name="quantity" min="1" value="1" required>
        </div>

        <!-- Metode Pembayaran -->
        <div class="form-group">
            <label for="payment-method">Metode Pembayaran</label>
            <select id="payment-method" name="payment-method" required>
                <option value="" disabled selected>Pilih metode Pembayaran</option>
                <option value="bank-transfer">Bank Transfer</option>
                <option value="cash-on-delivery">Cash on Delivery</option>
            </select>
        </div>

        <!-- Tombol Submit -->
        <div class="form-group">
            <button type="submit" class="submit-button" name="order" onclick="sendOrderToWhatsApp()">Order</button>
        </div>
    </form>
</div>
</body>
<script>
function sendOrderToWhatsApp() {
    // Ambil data dari formulir
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const address = document.getElementById('address').value;
    const phone = document.getElementById('phone').value;
    const product = document.getElementById('product').value;
    const quantity = document.getElementById('quantity').value;
    const paymentMethod = document.getElementById('payment-method').value;

    // Format pesan untuk dikirim ke WhatsApp
    const message = `Hello, I would like to place an order:%0A%0A*Name*: ${name}%0A*Email*: ${email}%0A*Shipping Address*: ${address}%0A*Phone Number*: ${phone}%0A*Product*: ${product}%0A*Quantity*: ${quantity}%0A*Payment Method*: ${paymentMethod}`;

    // Ganti dengan nomor WhatsApp tujuan Anda (format internasional tanpa tanda +, contoh: 6281234567890)
    const phoneNumber = 'YOUR_PHONE_NUMBER';

    // URL WhatsApp API
    const url = `https://wa.me/${phoneNumber}?text=${message}`;

    // Redirect ke URL WhatsApp
    window.open(url, '_blank');
}
</script>

<script src="scripts.js"></script>
</body>
