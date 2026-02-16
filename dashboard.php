<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body {
            overflow-x: hidden;
        }
        .sidebar {
            height: 100vh;
            background: #0d6efd;
            color: white;
            position: fixed;
            width: 250px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 15px;
        }
        .sidebar a:hover {
            background: #084298;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .card-box {
            border-left: 5px solid #0d6efd;
        }
    </style>
</head>

<body>

<!-- Sidebar -->
<div class="sidebar">
    <h4 class="text-center py-4 border-bottom">Admin Panel</h4>
    <a href="#">Dashboard</a>
    <a href="#">Users</a>
    <a href="#">Reports</a>
    <a href="#">Settings</a>
    <a href="logout.php" class="text-warning">Logout</a>
</div>

<!-- Main Content -->
<div class="content">

    <!-- Top Navbar -->
    <nav class="navbar navbar-light bg-light shadow-sm mb-4">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h4">Dashboard Overview</span>
            <span>Welcome, <strong><?php echo $_SESSION['admin']; ?></strong></span>
        </div>
    </nav>

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm card-box">
                <div class="card-body">
                    <h6>Total Users</h6>
                    <h3>150</h3>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm card-box">
                <div class="card-body">
                    <h6>Monthly Sales</h6>
                    <h3>$3,200</h3>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm card-box">
                <div class="card-body">
                    <h6>Pending Reports</h6>
                    <h3>8</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts -->
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow-sm p-3">
                <h5>Monthly Users</h5>
                <canvas id="barChart"></canvas>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm p-3">
                <h5>Traffic Sources</h5>
                <canvas id="pieChart"></canvas>
            </div>
        </div>
    </div>

</div>

<script>
    // Bar Chart
    new Chart(document.getElementById("barChart"), {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Users',
                data: [12, 19, 3, 5, 2, 15],
                backgroundColor: '#0d6efd'
            }]
        }
    });

    // Pie Chart
    new Chart(document.getElementById("pieChart"), {
        type: 'pie',
        data: {
            labels: ['Direct', 'Social', 'Referral'],
            datasets: [{
                data: [55, 25, 20],
                backgroundColor: ['#0d6efd', '#198754', '#ffc107']
            }]
        }
    });
</script>

</body>
</html>
