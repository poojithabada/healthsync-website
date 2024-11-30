<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard</title>
    <link rel="stylesheet" href="patientdashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
</head>
<body>
    <div class="dashboard">
        
        <header class="profile-header">
            <div class="profile-info">
                <img src="patient-photo.jpg" alt="Patient Photo" class="profile-photo">
                <div class="patient-details">
                    <h1>[Patient Name]</h1>
                    <p>Age: [Patient Age]</p>
                    <p>Blood Type: [Blood Type]</p>
                    <p>Chronic Conditions: [Condition List]</p>
                </div>
            </div>
        </header>
        
        <nav class="sidebar">
            <ul>
                <li><a href="#profile"><i class="fas fa-user"></i> Profile</a></li>
                <li><a href="#appointments"><i class="fas fa-calendar-alt"></i> Appointments</a></li>
                <li><a href="medicationremainder.html"><i class="fas fa-pills"></i> Medication Remainders</a></li>
            </ul>
        </nav>
        
        <main>
            
            
            <!-- Appointments Section -->
            <section id="appointments" class="card large-card">
                <h2>Upcoming Appointments</h2>
                <table>
                    <tr>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Doctor</th>
                        <th>Status</th>
                    </tr>
                    <tr>
                        <td>12/11/2024</td>
                        <td>10:30 AM</td>
                        <td>Dr. GangaRaju</td>
                        <td>Confirmed</td>
                    </tr>
                    <tr>
                        <td>12/12/2024</td>
                        <td>02:00 PM</td>
                        <td>Dr. KrisnamRaju</td>
                        <td>Pending</td>
                    </tr>
                </table>
            </section>
            
            <!-- Health Tips Section -->
            <section id="health-tips" class="card large-card">
                <h2>Health Tips</h2>
                <ul>
                    <li>Stay hydrated by drinking at least 8 cups of water daily.</li>
                    <li>Incorporate 30 minutes of physical activity into your day.</li>
                    <li>Maintain a balanced diet with a variety of nutrients.</li>
                    <li>Practice mindfulness or meditation to reduce stress.</li>
                    <li>Get at least 7-8 hours of sleep each night for better health.</li>
                </ul>
            </section>
        </main>
    </div>
</body>
</html>
