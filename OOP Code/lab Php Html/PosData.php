<?php
// Параметры подключения к базе данных
$servername = "localhost";
$username = "root";
$password = "1111";
$dbname = "Library";


// Подключение к базе данных
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Выполнение запроса на получение всех полей из таблицы library
$sql = "SELECT * FROM Position";
$result = $conn->query($sql);

// Создание массива для хранения данных
$position_data = array();

// Добавление данных в массив
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $position_data[] = $row;
    }
} else {
    echo "0 results";
}

// Закрытие соединения
$conn->close();

// Вывод данных в формате JSON
echo json_encode($position_data);
?>

