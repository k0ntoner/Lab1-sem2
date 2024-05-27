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

    $pro_id= $_POST['project_id'];


    $sql = "SELECT DISTINCT p2.project_name
FROM `Library`.`Project` p2
JOIN `Library`.`Employee_Project` ep2 ON p2.project_id = ep2.project_id
WHERE p2.project_id != $pro_id
  AND NOT EXISTS (
    SELECT 1
    FROM `Library`.`Employee_Project` ep1
    WHERE ep1.project_id = $pro_id
      AND ep1.Emp_id NOT IN (
        SELECT ep3.Emp_id
        FROM `Library`.`Employee_Project` ep3
        WHERE ep3.project_id = p2.project_id
      )
  )
  AND NOT EXISTS (
    SELECT 1
    FROM `Library`.`Employee_Project` ep4
    WHERE ep4.project_id = p2.project_id
      AND ep4.Emp_id NOT IN (
        SELECT ep5.Emp_id
        FROM `Library`.`Employee_Project` ep5
        WHERE ep5.project_id = $pro_id
      )
  );";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            // Вывод результатов
            while ($row = mysqli_fetch_assoc($result)) {
                echo "ID Проект: " . $row["project_name"]. "<br>";
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

