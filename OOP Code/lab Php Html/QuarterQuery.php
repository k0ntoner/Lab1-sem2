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
    $sec_genre= $_POST['sec_genre'];



    $sql = "SELECT library.Name
            FROM library
            INNER JOIN section ON section.lib_id=library.lib_id
            WHERE section.Genre='$sec_genre';";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "Назва Бібліотеки: " . $row['Name'] . "<br>";
            }
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
