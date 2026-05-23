<?php
// 1. Connect to the database
$host = 'localhost';
$user = 'root';
$pass = 'Juda4857'; // your database password
$dbname = 'plasticpollutions'; // change to your actual DB name

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 2. Fetch from contact_messages
// Update this line to include 'subject'
$messages_sql = "SELECT * FROM contact_messages ORDER BY id DESC";
$messages_result = $conn->query($messages_sql);

// 3. Fetch from donations
$donations_sql = "SELECT * FROM donations ORDER BY id DESC";
$donations_result = $conn->query($donations_sql);

// Fetch Petitions
$petitions_sql = "SELECT * FROM petitions ORDER BY id DESC";
$petitions_result = $conn->query($petitions_sql);

?>

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<script>

// Check if the user is logged in AND is an admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    // Redirect unauthorized users back to the homepage
    header("Location: index.php");
    exit();
}
</script>
<h2>Recent Messages</h2>
<table class="admin-table">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Subject</th>
        <th>Message</th>
    </tr>
    <?php
    // Ensure we are fetching from the correct result set
    if ($messages_result->num_rows > 0) {
        while($row = $messages_result->fetch_assoc()) { 
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            // Using backticks in your SQL query for `subject` was the right move!
            echo "<td>" . htmlspecialchars($row['subject']) . "</td>";
            echo "<td>" . htmlspecialchars($row['message']) . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No messages found.</td></tr>";
    }
    ?>
</table>



<!-- Display Petitions -->
<h2>Recent Petitions</h2>
<table class="admin-table">
    <tr>
        <th>Full Name</th>
        <th>Email</th>
        <th>Message</th>
        <th>Signed At</th>
    </tr>
    <?php 
    // We use the result set from your query
    while($row = $petitions_result->fetch_assoc()) { 
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['full_name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
        echo "<td>" . htmlspecialchars($row['message']) . "</td>";
        echo "<td>" . htmlspecialchars($row['signed_at']) . "</td>";
        echo "</tr>";
    } 
    ?>
</table>

<!-- Display Donations -->
<h2>Recent Donations</h2>
<table class="admin-table">
    <tr>
        <th>User ID</th>
        <th>Amount</th>
        <th>Campaign</th>
        <th>Date</th>
    </tr>
    <?php 
    // Reset the data pointer if needed, or just use the result object
    while($row = $donations_result->fetch_assoc()) { 
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['user_id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['amount']) . " " . htmlspecialchars($row['currency']) . "</td>";
        echo "<td>" . htmlspecialchars($row['campaign']) . "</td>";
        echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
        echo "</tr>";
    } 
    ?>
</table>