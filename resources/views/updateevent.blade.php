<?php
// Process the form data for Update Event
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updateEvent'])) {
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
    $eventName = mysqli_real_escape_string($data, $_POST['eventname']);
    $eventDate = mysqli_real_escape_string($data, $_POST['eventdate']);
    $eventTime = mysqli_real_escape_string($data, $_POST['eventtime']);
    $eventLocation = mysqli_real_escape_string($data, $_POST['eventlocation']);
    $eventDescription = mysqli_real_escape_string($data, $_POST['eventdescription']);

    // Update Event in the database
    $sql = "UPDATE events SET 
            eventname = '$eventName', 
            eventdate = '$eventDate', 
            eventtime = '$eventTime', 
            eventlocation = '$eventLocation', 
            eventdescription = '$eventDescription'
            WHERE eventid = '$eventId'";

    if (mysqli_query($data, $sql)) {
        echo "Event updated successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($data);
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
    <h2 class="text-center mb-4">Update Event</h2>
    <!-- Update Event Form -->
    <form method="post" action="{{ route('updateevent') }}">
    @csrf
        <div class="form-group">
            <label for="eventId">Event ID</label>
            <input type="text" class="form-control" id="eventId" name="eventid" placeholder="Event ID to update" required>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="eventName">Event Name</label>
                <input type="text" class="form-control" id="eventName" name="eventname" placeholder="Event Name" required>
            </div>
            <div class="form-group col-md-6">
                <label for="eventDate">Event Date</label>
                <input type="date" class="form-control" id="eventDate" name="eventdate" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="eventTime">Event Time</label>
                <input type="time" class="form-control" id="eventTime" name="eventtime" required>
            </div>
            <div class="form-group col-md-6">
                <label for="eventLocation">Event Location</label>
                <input type="text" class="form-control" id="eventLocation" name="eventlocation" placeholder="Event Location" required>
            </div>
        </div>
        <div class="form-group">
            <label for="eventDescription">Event Description</label>
            <textarea class="form-control" id="eventDescription" name="eventdescription" rows="3" placeholder="Event Description" required></textarea>
        </div>
        <button type="submit" name="updateEvent" class="btn btn-primary">Update Event</button>
    </form>

    <hr>
</body>
</html>
