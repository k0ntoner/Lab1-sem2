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
    $emp_idx = $_POST['emp_id'];
    $emp_passport = $_POST['passport'];
    $emp_full_name = $_POST['full_name'];
    $emp_lib_idx = $_POST['lib_id'];
    $emp_pos_idx = $_POST['p_id'];


    // Вставка даних до бази даних
    $sql = "UPDATE Employee SET Passport=$emp_passport,`Full Name`='$emp_full_name', lib_id=$emp_lib_idx, p_id=$emp_pos_idx WHERE Emp_id=$emp_idx";

    if (mysqli_query($conn, $sql)) {
        echo "Новий працівник успішно доданий";
    } else {
        echo "Помилка: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Закриття з'єднання
    mysqli_close($conn);
}
?>
