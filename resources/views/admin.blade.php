

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Dashboard - TOTUMA Agrinet System</title>
        <!-- Bootstrap CSS Link -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/your-font-awesome-kit.js" crossorigin="anonymous"></script>
        <!-- Custom CSS Style -->
        <style>
            body {
                background-color: #f8f9fa;
            }

            .navbar {
                background-color: #28a745;
            }

            .navbar-brand img {
                max-height: 40px;
                margin-right: 10px;
            }

            .dashboard-header {
                background-color: #28a745;
                color: #ffffff;
                padding: 2rem;
                text-align: center;
            }

            .dashboard-section {
                padding: 4rem 0;
            }

            .user-list {
                list-style-type: none;
                padding: 0;
            }

            .user-list-item {
                border: 1px solid #ddd;
                margin-bottom: 10px;
                padding: 10px;
            }
        </style>
    </head>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <img src="/totuma/logo.png" height="40px">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Users</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('events') }}">Events</a>
                </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>

    <!-- Dashboard Header -->
    <div class="dashboard-header">
        <div class="container">
            <h1>Welcome, Admin Name!</h1>
        </div>
    </div>

    <!-- Admin Dashboard Section -->
    <div class="dashboard-section">
        <div class="container">
            <!-- Add your dashboard content here -->
            <h2>User Management</h2>
            <ul class="user-list">
                <li class="user-list-item">
                    <h4>User Name 1</h4>
                    <p>Email: user1@example.com</p>
                    <!-- Add more details as needed -->
                </li>
                <li class="user-list-item">
                    <h4>User Name 2</h4>
                    <p>Email: user2@example.com</p>
                    <!-- Add more details as needed -->
                </li>
                <!-- Repeat the above list items for more users -->
            </ul>
        </div>
    </div>

    <!-- Bootstrap JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


