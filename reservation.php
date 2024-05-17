<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "airline_reservation";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["delete_id"])) {
        // Handle deletion of reservation and associated passenger/flight
        $delete_id = $_POST['delete_id'];

        // Use a transaction to ensure all deletions are atomic
        $conn->begin_transaction();

        try {
            // Get passenger_id and flight_id associated with the reservation to be deleted
            $stmt = $conn->prepare("SELECT passenger_id, flight_id FROM reservations WHERE reservation_id = ?");
            $stmt->bind_param("i", $delete_id);
            $stmt->execute();
            $stmt->bind_result($passenger_id, $flight_id);
            $stmt->fetch();
            $stmt->close();

            // Delete reservation
            $stmt = $conn->prepare("DELETE FROM reservations WHERE reservation_id = ?");
            $stmt->bind_param("i", $delete_id);
            $stmt->execute();
            $stmt->close();

            // Delete associated passenger
            $stmt = $conn->prepare("DELETE FROM passengers WHERE passenger_id = ?");
            $stmt->bind_param("i", $passenger_id);
            $stmt->execute();
            $stmt->close();

            // Delete associated flight
            $stmt = $conn->prepare("DELETE FROM flights WHERE flight_id = ?");
            $stmt->bind_param("i", $flight_id);
            $stmt->execute();
            $stmt->close();

            // Commit the transaction
            $conn->commit();

            // After deletion, rearrange the IDs
            $conn->query("SET @num := 0;");
            $conn->query("UPDATE reservations SET reservation_id = @num := (@num + 1);");
            $conn->query("ALTER TABLE reservations AUTO_INCREMENT = 1;");

            // Redirect after successful deletion
            header("Location: ".$_SERVER['PHP_SELF']);
            exit;
        } catch (Exception $e) {
            // Roll back the transaction on error
            $conn->rollback();
            die("Transaction failed: " . $e->getMessage());
        }
    } elseif (isset($_POST["first_name"], $_POST["last_name"], $_POST["phone_number"], $_POST["from_location"], $_POST["to_location"], $_POST["departure_date"])) {
        // Handle addition of new reservation, passenger, and flight
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $phone_number = $_POST["phone_number"];
        $from_location = $_POST["from_location"];
        $to_location = $_POST["to_location"];
        $departure_date = $_POST["departure_date"];
        $return_date = isset($_POST["return_date"]) ? $_POST["return_date"] : null;

        // Use a transaction to ensure all inserts are atomic
        $conn->begin_transaction();

        try {
            // Insert into passengers table
            $stmt = $conn->prepare("INSERT INTO passengers (first_name, last_name, phone_number) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $first_name, $last_name, $phone_number);
            $stmt->execute();
            $passenger_id = $stmt->insert_id;
            $stmt->close();

            // Insert into flights table
            $stmt = $conn->prepare("INSERT INTO flights (from_location, to_location, departure_date, return_date) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $from_location, $to_location, $departure_date, $return_date);
            $stmt->execute();
            $flight_id = $stmt->insert_id;
            $stmt->close();

            // Insert into reservations table
            $stmt = $conn->prepare("INSERT INTO reservations (passenger_id, flight_id) VALUES (?, ?)");
            $stmt->bind_param("ii", $passenger_id, $flight_id);
            $stmt->execute();
            $stmt->close();

            // Commit the transaction
            $conn->commit();

            // After addition, rearrange the IDs
            $conn->query("SET @num := 0;");
            $conn->query("UPDATE reservations SET reservation_id = @num := (@num + 1);");
            $conn->query("ALTER TABLE reservations AUTO_INCREMENT = 1;");

            // Redirect after successful addition
            header("Location: ".$_SERVER['PHP_SELF']);
            exit;
        } catch (Exception $e) {
            // Roll back the transaction on error
            $conn->rollback();
            die("Transaction failed: " . $e->getMessage());
        }
    }
}

// Fetch existing reservations from the database
$sql = "SELECT r.reservation_id, p.first_name, p.last_name, p.phone_number, f.from_location, f.to_location, f.departure_date, f.return_date 
        FROM reservations r
        INNER JOIN passengers p ON r.passenger_id = p.passenger_id
        INNER JOIN flights f ON r.flight_id = f.flight_id";
$result = $conn->query($sql);

$sql = "SELECT 
            r.reservation_id,
            CONCAT(
                'CJ',
                RemoveVowels(p.first_name),
                SUBSTRING_INDEX(f.from_location, ' ', 1),
                SUBSTRING_INDEX(f.to_location, ' ', 1),
                DATE_FORMAT(f.departure_date, '%m%d'),
                DATE_FORMAT(f.return_date, '%m%d')
            ) AS reservationcode_id,
            p.first_name,
            p.last_name,
            p.phone_number,
            f.from_location,
            f.to_location,
            f.departure_date,
            f.return_date
        FROM reservations r
        INNER JOIN passengers p ON r.passenger_id = p.passenger_id
        INNER JOIN flights f ON r.flight_id = f.flight_id";
$result = $conn->query($sql);

if ($result === false) {
    die("Error fetching reservations: " . $conn->error);
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CODEJET:Airlines Reservations</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>
<header class="header-container">
    <div class="logo-container">
        <a href="logout.php">
            <img src="pastedimage-uoln-200h.png" alt="CODEJET:Airlines Logo" class="logo-img">
        </a>
        <span class="logo-text">CODEJET</span>
    </div>
    <div>
        <a href="logout.php" class="logout-link">Logout</a>
    </div>
</header>
<?php
if ($result->num_rows > 0) {
    // Output table header
    echo "<table>";
    echo "<tr><th>ID</th><th>Code</th><th>First Name</th><th>Last Name</th><th>Phone Number</th><th>From Location</th><th>To Location</th><th>Departure Date</th><th>Return Date</th><th>Action</th></tr>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["reservation_id"] . "</td>";
        echo "<td>" . $row["reservationcode_id"] . "</td>";
        echo "<td>" . $row["first_name"] . "</td>";
        echo "<td>" . $row["last_name"] . "</td>";
        echo "<td>" . $row["phone_number"] . "</td>";
        echo "<td>" . $row["from_location"] . "</td>";
        echo "<td>" . $row["to_location"] . "</td>";
        echo "<td>" . $row["departure_date"] . "</td>";
        echo "<td>" . $row["return_date"] . "</td>";
        echo "<td>";
        echo "<form method='post'>";
        echo "<form method='post' action='delete_reservation.php' class='delete-form'>";
        echo "<input type='hidden' name='delete_id' value='" . $row["reservation_id"] . "'>";
        echo "<button type='submit' class='noselect'>";
        echo "<span class='text'>Delete</span>";
        echo "<span class='icon'><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><path d='M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z'></path></svg></span>";
        echo "</button>";
        echo "</form>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>No reservations found.</p>";
}
?>
</body>
</html>
