<?php
// Process the form data for Delete Event
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteEvent'])) {
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "totuma";

    $data = mysqli_connect($host, $user, $password, $db);
    if ($data == false) {
        die("Connection error");
    }

    // Retrieve form data
    $eventId = mysqli_real_escape_string($data, $_POST['eventid']);

    // Check if the event with the specified ID exists
    $checkSql = "SELECT * FROM events WHERE eventid = '$eventId'";
    $result = mysqli_query($data, $checkSql);

    if ($result && mysqli_num_rows($result) > 0) {
        // Event exists, proceed with deletion
        $deleteSql = "DELETE FROM events WHERE eventid = '$eventId'";
        
        if (mysqli_query($data, $deleteSql)) {
            echo "Event deleted successfully!";
        } else {
            echo "Error: " . $deleteSql . "<br>" . mysqli_error($data);
        }
    } else {
        echo "Event with ID $eventId does not exist.";
    }

    // Close the connection
    mysqli_close($data);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management - TOTUMA Agrinet System</title>
    <!-- Bootstrap CSS Link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Custom CSS Style -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .event-section {
            background-color: #ffffff;
            padding: 4rem 0;
        }
    </style>
</head>
<body>
    <h2 class="text-center mb-4">Delete Event</h2>
    <!-- Delete Event Form -->
    <form method="post" action="{{ route('deleteevent') }}">
    @csrf
        <div class="form-group">
            <label for="eventId">Event ID</label>
            <input type="text" class="form-control" id="eventId" name="eventid" placeholder="Event ID to delete" required>
        </div>
        <button type="submit" name="deleteEvent" class="btn btn-danger">Delete Event</button>
    </form>

    <hr>
</body>
</html>
