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

    $book_name = $_POST['add_book_name'];
    $book_genre = $_POST['add_book_genre'];
    $book_author = $_POST['add_book_author'];
    $book_release_data= $_POST['add_book_release_date'];
    $sec_idx = $_POST['sec_idx'];



    // Вставка даних до бази даних
    $sql = "INSERT INTO book (Name, Genre,Author,Release_date, s_id) VALUES ('$book_name', '$book_genre', '$book_author', '$book_release_data','$sec_idx')";

    if (mysqli_query($conn, $sql)) {
        echo "Новий працівник успішно доданий";
    } else {
        echo "Помилка: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Закриття з'єднання
    mysqli_close($conn);
}
?>