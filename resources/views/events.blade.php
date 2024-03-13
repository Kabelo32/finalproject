<!-- resources/views/event_management.blade.php -->

<!DOCTYPE html>
<html lang="en">
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

    <!-- Event Management Section -->
    <div class="event-section">
        <div class="container">
            <h2 class="text-center mb-4">Event Management</h2>

            <!-- Event Cards -->
            <div class="card-deck">
                <!-- Add Event Card -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add Event</h5>
                        <p class="card-text">Add a new event to the system.</p>
                        <a href="{{ route('addevent') }}" class="btn btn-primary">Go to Add Event</a>
                    </div>
                </div>

                <!-- Delete Event Card -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Delete Event</h5>
                        <p class="card-text">Delete an existing event from the system.</p>
                        <a href="{{ route('deleteevent') }}" class="btn btn-danger">Go to Delete Event</a>
                    </div>
                </div>

                <!-- Update Event Card -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Update Event</h5>
                        <p class="card-text">Update details of an existing event.</p>
                        <a href="{{ route('updateevent') }}" class="btn btn-warning">Go to Update Event</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-light text-center py-2 fixed-bottom">
        <p>&copy; 2024/2025 TOTUMA Agrinet System. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
