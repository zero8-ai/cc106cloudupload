<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Professional Admin Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
    body {
        background-color: #f4f6f9;
    }

    /* LOGIN STYLE */
    #loginSection {
        height: 100vh;
        background: linear-gradient(135deg, #0d6efd, #0a58ca);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .login-card {
        width: 400px;
        padding: 30px;
        border-radius: 10px;
        background: white;
    }

    /* DASHBOARD STYLE */
    #dashboardSection {
        display: none;
    }

    .sidebar {
        height: 100vh;
        width: 250px;
        position: fixed;
        background-color: #0d6efd;
        color: white;
        padding-top: 20px;
    }

    .sidebar h4 {
        text-align: center;
        margin-bottom: 30px;
    }

    .sidebar a {
        display: block;
        color: white;
        padding: 15px 20px;
        text-decoration: none;
        transition: 0.3s;
    }

    .sidebar a:hover {
        background-color: #084298;
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

<!-- ================= LOGIN SECTION ================= -->
<div id="loginSection">
    <div class="login-card shadow">
        <h3 class="text-center mb-4 text-primary">Admin Login</h3>

        <div id="errorMessage" class="alert alert-danger d-none">
            Invalid Username or Password
        </div>

        <form onsubmit="return loginUser()">
            <div class="mb-3">
                <label>Username</label>
                <input type="text" id="username" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" id="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</div>

<!-- ================= DASHBOARD SECTION ================= -->
<div id="dashboardSection">

    <!-- Sidebar -->
    <div class="sidebar">
        <h4>Admin Panel</h4>
        <a href="#">Dashboard</a>
        <a href="#">Users</a>
        <a href="#">Reports</a>
        <a href="#">Analytics</a>
        <a href="#">Settings</a>
        <a href="#" onclick="logout()">Logout</a>
    </div>

    <!-- Main Content -->
    <div class="content">

        <nav class="navbar navbar-light bg-white shadow-sm mb-4 rounded">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h4">Dashboard Overview</span>
                <span>Welcome, <strong>Admin</strong></span>
            </div>
        </nav>

        <!-- Cards -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card shadow-sm card-box">
                    <div class="card-body">
                        <h6>Total Users</h6>
                        <h3>1,250</h3>
                        <p class="text-success">+12% this month</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm card-box">
                    <div class="card-body">
                        <h6>Revenue</h6>
                        <h3>$8,540</h3>
                        <p class="text-success">+8% this month</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm card-box">
                    <div class="card-body">
                        <h6>Pending Orders</h6>
                        <h3>23</h3>
                        <p class="text-danger">-3% this month</p>
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
</div>

<script>
    // Hardcoded credentials
    const correctUsername = "admin";
    const correctPassword = "Admin123";

    function loginUser() {
        const user = document.getElementById("username").value;
        const pass = document.getElementById("password").value;

        if (user === correctUsername && pass === correctPassword) {
            document.getElementById("loginSection").style.display = "none";
            document.getElementById("dashboardSection").style.display = "block";
            loadCharts();
            return false;
        } else {
            document.getElementById("errorMessage").classList.remove("d-none");
            return false;
        }
    }

    function logout() {
        document.getElementById("dashboardSection").style.display = "none";
        document.getElementById("loginSection").style.display = "flex";
    }

    function loadCharts() {
        new Chart(document.getElementById("barChart"), {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Users',
                    data: [120, 190, 300, 250, 220, 400],
                    backgroundColor: '#0d6efd'
                }]
            }
        });

        new Chart(document.getElementById("pieChart"), {
            type: 'pie',
            data: {
                labels: ['Direct', 'Social Media', 'Referral', 'Email'],
                datasets: [{
                    data: [40, 25, 20, 15],
                    backgroundColor: ['#0d6efd', '#198754', '#ffc107', '#dc3545']
                }]
            }
        });
    }
</script>

</body>
</html>
