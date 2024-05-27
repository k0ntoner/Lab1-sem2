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




    $sql = "SELECT p.project_name
FROM `Library`.`Project` p
WHERE NOT EXISTS (
    SELECT 1
    FROM `Library`.`Employee` e
    WHERE NOT EXISTS (
        SELECT 1
        FROM `Library`.`Employee_Project` ep
        WHERE ep.project_id = p.project_id
            AND ep.Emp_id = e.Emp_id
    )
);";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "Проект: " . $row['project_name'] ."<br>";
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
