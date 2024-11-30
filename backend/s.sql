DROP DATABASE IF EXISTS USERS_INFO;
CREATE DATABASE USERS_INFO;
USE USERS_INFO;
CREATE TABLE Users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,  
    username VARCHAR(255) NOT NULL UNIQUE, 
    mail VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,          
    name VARCHAR(255) NOT NULL,              
    age INT,                                 
    gender ENUM('Male', 'Female', 'Other'),  
    contact_info VARCHAR(255),               
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP 
);
CREATE TABLE MedicalHistory (
    medical_id INT AUTO_INCREMENT PRIMARY KEY,  
    user_id INT,                                
    condition_name VARCHAR(255),                
    diagnosis_date DATE,                        
    treatment_details TEXT,                     
    notes TEXT,                                 
    FOREIGN KEY (user_id) REFERENCES Users(user_id) ON DELETE CASCADE
);

CREATE TABLE Doctors (
    doctor_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,  
    username VARCHAR(255) UNIQUE NOT NULL,  
    password VARCHAR(255) NOT NULL,  
    specialty VARCHAR(255) NOT NULL,  
    contact_info VARCHAR(255),
    availability_schedule TEXT,  
    consultation_fees DECIMAL(10, 2),
    ratings DECIMAL(3, 2) CHECK (ratings BETWEEN 1 AND 5)  
);


CREATE TABLE Appointments (
    appointment_id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT NOT NULL,
    doctor_id INT NOT NULL,
    appointment_datetime DATETIME NOT NULL,
    appointment_status ENUM('upcoming', 'completed', 'canceled') NOT NULL,
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (patient_id) REFERENCES Users(user_id),
    FOREIGN KEY (doctor_id) REFERENCES Doctors(doctor_id)
);
CREATE TABLE Medications (
    prescription_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    medication_name VARCHAR(255) NOT NULL,
    dosage_instructions VARCHAR(255) NOT NULL,
    prescription_duration INT,  -- Duration in days
    doctor_pharmacy_details TEXT,  -- Can include contact details
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
);
CREATE TABLE Billing (
    transaction_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    payment_method VARCHAR(50) NOT NULL,  -- Method of payment (e.g., credit card, PayPal)
    amount DECIMAL(10, 2) NOT NULL,
    payment_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    invoice_number VARCHAR(255) NOT NULL UNIQUE,
    service_details TEXT,  -- Details of the services (appointments, consultations, etc.)
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
);
CREATE TABLE Feedback (
    review_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    doctor_service_id INT NOT NULL,  -- This could reference either Doctors or Services
    rating INT CHECK (rating BETWEEN 1 AND 5),  -- Rating from 1 to 5
    comments TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
    -- You might want to add FOREIGN KEY for doctor_service_id based on your implementation
);
CREATE TABLE Notifications (
    notification_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    notification_type ENUM('appointment reminder', 'medication reminder', 'other') NOT NULL,
    notification_datetime DATETIME NOT NULL,
    status ENUM('sent', 'pending', 'read') NOT NULL,
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

SELECT * FROM Users;

ALTER TABLE Doctors 
ADD COLUMN created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
ADD COLUMN updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;
