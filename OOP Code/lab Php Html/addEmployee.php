
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
    $emp_passport = $_POST['add_employee_passport'];
    $emp_full_name = $_POST['add_full_name'];
    $emp_lib_idx = $_POST['add_emp_lib_idx'];
    $emp_pos_idx = $_POST['add_emp_pos_idx'];


    // Вставка даних до бази даних
    $sql = "INSERT INTO Employee (Passport, `Full Name`, lib_id, p_id ) VALUES ('$emp_passport', '$emp_full_name', '$emp_lib_idx', '$emp_pos_idx')";

    if (mysqli_query($conn, $sql)) {
        echo "Новий працівник успішно доданий";
    } else {
        echo "Помилка: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Закриття з'єднання
    mysqli_close($conn);
}
?>
