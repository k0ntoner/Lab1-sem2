<?php
// Підключення до бази даних
$servername = "localhost";
$username = "root";
$password = "1111";
$dbname = "Library";

// Створення з'єднання
$conn = new mysqli($servername, $username, $password, $dbname);

// Перевірка з'єднання
if ($conn->connect_error) {
    die("Помилка з'єднання: " . $conn->connect_error);
}

// Виведення даних з таблиці library
$sql = "SELECT * FROM library";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Таблиця library</h2>";
    echo "<table><tr><th>lib_id</th><th>Name</th><th>Place</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["lib_id"]."</td><td>".$row["Name"]."</td><td>".$row["Place"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 результатів";
}

// Виведення даних з таблиці Position
$sql = "SELECT * FROM Position";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Таблиця Position</h2>";
    echo "<table><tr><th>p_id</th><th>Name</th><th>Description</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["p_id"]."</td><td>".$row["Name"]."</td><td>".$row["Description"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 результатів";
}

// Виведення даних з таблиці Employee
$sql = "SELECT * FROM Employee";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Таблиця Employee</h2>";
    echo "<table><tr><th>Emp_id</th><th>Passport</th><th>Full Name</th><th>lib_id</th><th>p_id</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["Emp_id"]."</td><td>".$row["Passport"]."</td><td>".$row["Full Name"]."</td><td>".$row["lib_id"]."</td><td>".$row["p_id"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 результатів";
}

// Виведення даних з таблиці book
$sql = "SELECT * FROM book";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Таблиця book</h2>";
    echo "<table><tr><th>idBook</th><th>Name</th><th>Genre</th><th>Author</th><th>Release_date</th><th>s_id</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["idBook"]."</td><td>".$row["Name"]."</td><td>".$row["Genre"]."</td><td>".$row["Author"]."</td><td>".$row["Release_date"]."</td><td>".$row["s_id"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 результатів";
}

// Виведення даних з таблиці section
$sql = "SELECT * FROM section";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Таблиця section</h2>";
    echo "<table><tr><th>s_id</th><th>Genre</th><th>floor</th><th>lib_id</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["s_id"]."</td><td>".$row["Genre"]."</td><td>".$row["floor"]."</td><td>".$row["lib_id"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 результатів";
}
$sql = "SELECT * FROM Project";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Таблиця Project</h2>";
    echo "<table><tr><th>pro_id</th><th>Name</th><th>Description</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["project_id"]."</td><td>".$row["project_name"]."</td><td>".$row["project_description"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 результатів";
}
$sql = "SELECT * FROM Employee_Project";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Таблиця Employee_Project</h2>";
    echo "<table><tr><th>emp_id</th><th>pro_id</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["Emp_id"]."</td><td>".$row["project_id"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 результатів";
}


// Закриття з'єднання
$conn->close();
?>
