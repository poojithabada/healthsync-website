<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);

session_start();
if ($_SESSION['role'] !== 'admin') {
    header("Location: login.php");  // Redirect to login if not an admin
    exit();
}

include('backend/database_connection.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$patients_query = "SELECT * FROM Users";
$doctors_query = "SELECT * FROM Doctors";
$appointments_query = "SELECT * FROM Appointments";

$patients_result = $conn->query($patients_query);
$doctors_result = $conn->query($doctors_query);
$appointments_result = $conn->query($appointments_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div class="admin-container">
        <header>
            <h1>Admin Dashboard</h1>
            <a href="logout.php">Logout</a> <!-- Logout link -->
        </header>
        <nav>
            <ul>
                <li><a href="#dashboard">Dashboard</a></li>
                <li><a href="#patients">Patients</a></li>
                <li><a href="#doctors">Doctors</a></li>
                <li><a href="#appointments">Appointments</a></li>
            </ul>
        </nav>
        <main>
            <!-- Dashboard Section -->
            <section id="dashboard">
                <h2>Dashboard Overview</h2>
                <div class="stats">
                    <div>Total Patients: <?= $patients_result->num_rows; ?></div>
                    <div>Total Doctors: <?= $doctors_result->num_rows; ?></div>
                    <div>Total Appointments: <?= $appointments_result->num_rows; ?></div>
                </div>
            </section>

            <!-- Patients Section -->
            <section id="patients">
                <h2>Patients</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Medical Records</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($patient = $patients_result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($patient['id']); ?></td>
                            <td><?= htmlspecialchars($patient['name']); ?></td>
                            <td><?= htmlspecialchars($patient['contact']); ?></td>
                            <td><?= htmlspecialchars($patient['medical_records']); ?></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </section>

            <!-- Doctors Section -->
            <section id="doctors">
                <h2>Doctors</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Specialization</th>
                            <th>Contact</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($doctor = $doctors_result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($doctor['id']); ?></td>
                            <td><?= htmlspecialchars($doctor['name']); ?></td>
                            <td><?= htmlspecialchars($doctor['specialization']); ?></td>
                            <td><?= htmlspecialchars($doctor['contact']); ?></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </section>

            <!-- Appointments Section -->
            <section id="appointments">
                <h2>Appointments</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Patient</th>
                            <th>Doctor</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($appointment = $appointments_result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($appointment['id']); ?></td>
                            <td><?= htmlspecialchars($appointment['patient_name']); ?></td>
                            <td><?= htmlspecialchars($appointment['doctor_name']); ?></td>
                            <td><?= htmlspecialchars($appointment['date']); ?></td>
                            <td><?= htmlspecialchars($appointment['status']); ?></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
</body>
</html>
