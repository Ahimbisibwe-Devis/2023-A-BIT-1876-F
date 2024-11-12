<?php
include 'includes/header.php';
?>

<h2>Create Event</h2>
<form action="add_event.php" method="POST">
    <div class="mb-3">
        <label for="title" class="form-label">Event Title</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Event Description</label>
        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
    </div>
    <div class="mb-3">
        <label for="location" class="form-label">Event Location</label>
        <input type="text" class="form-control" id="location" name="location" required>
    </div>
    <div class="mb-3">
        <label for="date" class="form-label">Event Date and Time</label>
        <input type="datetime-local" class="form-control" id="date" name="date" required>
    </div>
    <button type="submit" class="btn btn-primary">Create Event</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'includes/db.php';
    
    $title = $_POST['title'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $date = $_POST['date'];

    $sql = "INSERT INTO events (title, description, location, date) 
            VALUES ('$title', '$description', '$location', '$date')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success mt-3'>New event created successfully!</div>";
    } else {
        echo "<div class='alert alert-danger mt-3'>Error: " . $conn->error . "</div>";
    }
}
?>

<?php
include 'includes/footer.php';
?>
