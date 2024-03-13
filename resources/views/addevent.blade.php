<?php

// Process the form data for Add Event
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addEvent'])) {
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "totuma";

    $data = mysqli_connect($host, $user, $password, $db);
    if ($data == false) {
        die("Connection error");
    }

    // Retrieve form data
    $eventName = mysqli_real_escape_string($data, $_POST['eventname']);
    $eventDate = mysqli_real_escape_string($data, $_POST['eventdate']);
    $eventTime = mysqli_real_escape_string($data, $_POST['eventtime']);
    $eventLocation = mysqli_real_escape_string($data, $_POST['eventlocation']);
    $eventDescription = mysqli_real_escape_string($data, $_POST['eventdescription']);

    // Add Event to the database
    $sql = "INSERT INTO events (eventname, eventdate, eventtime, eventlocation, eventdescription) 
            VALUES ('$eventName', '$eventDate', '$eventTime', '$eventLocation', '$eventDescription')";

    if (mysqli_query($data, $sql)) {
        echo "Event added successfully!";

        // Send notification to the farmer
        
        $notification = "New Event Added: $eventName on $eventDate at $eventTime, $eventLocation. Event description: $eventDescription";
        $_SESSION['notifications'][] = $notification;

        
    } 
    
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($data);
    }
    

    // Close the connection
    mysqli_close($data);
}
?>

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
  <h2 class="text-center mb-4">Add Event</h2>
<!-- Add Event Form -->
<form action="{{ route('addevent.store') }}" method="POST">
@csrf
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
                
                <button type="submit" name="addEvent" class="btn btn-success">Add Event</button>
            </form>

            <hr>
</body>
</html>

