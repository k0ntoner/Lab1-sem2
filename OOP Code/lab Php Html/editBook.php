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
    $book_idx = $_POST['idBook'];
    $book_name = $_POST['book_name'];
    $book_genre = $_POST['genre'];
    $book_author = $_POST['author'];
    $book_release_data= $_POST['release_date'];
    $sec_idx = $_POST['s_id'];




    // Вставка даних до бази даних
    $sql = "UPDATE book SET Name='$book_name', Genre='$book_genre', Author='$book_author', Release_date='$book_release_data', s_id=$sec_idx WHERE idBook=$book_idx";

    if (mysqli_query($conn, $sql)) {
        echo "Новий працівник успішно доданий";
    } else {
        echo "Помилка: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Закриття з'єднання
    mysqli_close($conn);
}
?>