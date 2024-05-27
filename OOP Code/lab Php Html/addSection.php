<?php
// Перевіряємо, чи були надіслані дані з форми
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Підключення до бази даних
    $servername = "localhost";
    $username = "root";
    $password = "1111";
    $dbname = "Library";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Перевірка з'єднання
    if (!$conn) {
        die("Помилка підключення: " . mysqli_connect_error());
    }

    // Отримання даних з форми

    $sec_genre = $_POST['add_section_genre'];
    $sec_floor = $_POST['add_section_floor'];
    $sec_lib_idx = $_POST['add_sec_lib_idx'];



    // Вставка даних до бази даних
    $sql = "INSERT INTO section (Genre, floor, lib_id) VALUES ('$sec_genre', '$sec_floor', '$sec_lib_idx')";

    if (mysqli_query($conn, $sql)) {
        echo "Новий працівник успішно доданий";
    } else {
        echo "Помилка: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Закриття з'єднання
    mysqli_close($conn);
}
?>

