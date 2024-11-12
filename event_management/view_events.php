<?php
include 'includes/header.php';
include 'includes/db.php';

$sql = "SELECT * FROM events ORDER BY date DESC";
$result = $conn->query($sql);
?>

<h2>Upcoming Events</h2>

<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='card mb-3'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>" . $row['title'] . "</h5>";
        echo "<p class='card-text'>" . $row['description'] . "</p>";
        echo "<p><strong>Location:</strong> " . $row['location'] . "</p>";
        echo "<p><strong>Date:</strong> " . date('F j, Y, g:i a', strtotime($row['date'])) . "</p>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "<p>No events found.</p>";
}

$conn->close();
?>

<?php
include 'includes/footer.php';
?>
