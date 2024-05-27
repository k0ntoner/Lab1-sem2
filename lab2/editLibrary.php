
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
    $lib_idx = $_POST['lib_id'];
    $lib_name = $_POST['lib_name'];
    $lib_place = $_POST['lib_place'];

    // Вставка даних до бази даних
    $sql = "UPDATE library SET Name='$lib_name', Place='$lib_place' WHERE lib_id=$lib_idx";

    if (mysqli_query($conn, $sql)) {
        echo "Нова бібліотека успішно додана";
    } else {
        echo "Помилка: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Закриття з'єднання
    mysqli_close($conn);
}
?>