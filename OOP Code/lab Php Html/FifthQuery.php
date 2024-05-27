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
    $lib_id= $_POST['library_id'];



    $sql = "SELECT COUNT(DISTINCT floor) AS Floors_Count
            FROM section
            WHERE lib_id = $lib_id;";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result); // Получаем первую строку результата
            $floorsCount = $row['Floors_Count']; // Получаем значение столбца 'Floors_Count'
            echo "Кількість поверхів: " . $floorsCount . "<br>";
        } else {
            echo "Результатів не знайдено";
        }
    } else {
        echo "Помилка: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Закриття з'єднання
    mysqli_close($conn);
}
?>