<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard</title>
    <link rel="stylesheet" href="doctordashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="dashboard">

        <header class="profile-header">
            <div class="profile-info">
                <img src="doctor-photo.jpg" alt="Doctor Photo" class="profile-photo">
                <div class="doctor-details">
                    <h1>Dr. [Doctor Name]</h1>
                    <p>Hospital: [Hospital Name]</p>
                    <p>Specialization: [Specialty]</p>
                    <p>Years of Experience: [Experience]</p>
                </div>
            </div>
        </header>
        
        <nav class="sidebar">
            <ul>
                <li><a href="#patients"><i class="fas fa-user-injured"></i> Patients</a></li>
                <li><a href="#appointments"><i class="fas fa-calendar-alt"></i> Appointments</a></li>
                <li><a href="#reports"><i class="fas fa-file-medical-alt"></i> Medical Reports</a></li>
                <li><a href="#Educational-Qualifications"><i class="fas fa-file-medical-alt"></i> Educational Qualifications</a></li>
                
            </ul>
        </nav>
        
        <main class="main-content">
            <section id="patients" class="card large-card">
                <h2>Patients</h2>
                <table>
                    <tr>
                        <th>Patient Name</th>
                        <th>Age</th>
                        <th>Condition</th>
                        <th>Last Visit</th>
                    </tr>
                    <tr>
                        <td>K.Ram</td>
                        <td>45</td>
                        <td>Diabetes</td>
                        <td>10/25/2024</td>
                    </tr>
                    <tr>
                        <td>Seetha.M</td>
                        <td>30</td>
                        <td>Hypertension</td>
                        <td>10/10/2024</td>
                    </tr>
                </table>
            </section>

            <section id="appointments" class="card large-card">
                <h2>Upcoming Appointments</h2>
                <table>
                    <tr>
                        <th>Patient Name</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                    </tr>
                    <tr>
                        <td>M.Laxman</td>
                        <td>11/12/2024</td>
                        <td>10:30 AM</td>
                        <td>Confirmed</td>
                    </tr>
                    <tr>
                        <td>G.Bharath</td>
                        <td>11/15/2024</td>
                        <td>02:00 PM</td>
                        <td>Pending</td>
                    </tr>
                </table>
            </section>

            
        </main>
    </div>
</body>
</html>
