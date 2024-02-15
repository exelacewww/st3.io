<?php
// Подключение к базе данных
$servername = "localhost"; // Имя сервера
$username = "root"; // Имя пользователя базы данных
$password = ""; // Пароль пользователя базы данных
$database = "registeruser"; // Имя базы данных

// Создание соединения
$conn = new mysqli($servername, $username, $password, $database);

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получение данных из формы
$product_name = $_POST['product_name'];
$quantity = $_POST['quantity'];
$customer_name = $_POST['customer_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// Подготовленный запрос для вставки данных в базу данных
$stmt = $conn->prepare("INSERT INTO orders (product_name, quantity, customer_name, email, phone) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sissi", $product_name, $quantity, $customer_name, $email, $phone);

// Выполнение запроса
if ($stmt->execute() === TRUE) {
    echo "Заказ успешно добавлен в базу данных!";
} else {
    echo "Ошибка: " . $stmt->error;
}

// Закрытие подготовленного запроса и соединения
$stmt->close();
$conn->close();


?>
