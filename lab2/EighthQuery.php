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


    $book_id= $_POST['book_id'];

    $sql = "SELECT b2.Name
FROM `Library`.`book` b2
WHERE b2.idBook != $book_id
  AND EXISTS (
    SELECT 1
    FROM `Library`.`book` b1
    WHERE b1.idBook = $book_id
      AND b1.s_id = b2.s_id
      AND b1.Genre = b2.Genre
  );";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            // Вывод результатов
            while ($row = mysqli_fetch_assoc($result)) {
                echo "Назва: " . $row["Name"] . "<br>";
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