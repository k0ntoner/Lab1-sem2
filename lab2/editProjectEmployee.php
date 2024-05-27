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
    $emp_id = $_POST['Emp_id'];
    $pro_id = $_POST['project_id'];






    // Вставка даних до бази даних
    $sql = "UPDATE Employee_Project SET Emp_id='$emp_id' WHERE project_id='$pro_id'";
    if (mysqli_query($conn, $sql)) {
        echo "Запись успешно обновлена по project_id.";
    } else {
        echo "Ошибка обновления по project_id: " . mysqli_error($conn);
    }

    // Обновляем данные в таблице
    $sql = "UPDATE Employee_Project SET project_id='$pro_id' WHERE Emp_id='$emp_id'";
    if (mysqli_query($conn, $sql)) {
        echo "Запись успешно обновлена по Emp_id.";
    } else {
        echo "Ошибка обновления по Emp_id: " . mysqli_error($conn);
    }

    // Закриття з'єднання
    mysqli_close($conn);
}
?>
