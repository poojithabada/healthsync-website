const express = require('express');
const bodyParser = require('body-parser');
const nodemailer = require('nodemailer');
const cron = require('node-cron');
const cors = require('cors');
require('dotenv').config();


const app = express();
app.use(cors());
app.use(bodyParser.json());


const transporter = nodemailer.createTransport({
    service: 'gmail',
    auth: {
        user: process.env.EMAIL_USER,
        pass: process.env.EMAIL_PASS
    }
});


// Test email route
app.get('/test-email', (req, res) => {
    const mailOptions = {
        from: 'healthsync00@gmail.com',
        to: 'poojithabada858@gmail.com',
        subject: 'Test Email',
        text: 'This is a test email to check if nodemailer is working.'
    };

    transporter.sendMail(mailOptions, (error, info) => {
        if (error) {
            console.error('Error sending email:', error);
            res.status(500).send('Error sending test email');
        } else {
            console.log('Email sent:', info.response);
            res.status(200).send('Test email sent successfully');
        }
    });
});

// Send medication reminder route
app.post('/send-reminder', (req, res) => {
    console.log("Received a reminder request:", req.body);

    const { email, medicationName, dosage, nextDose } = req.body;

    const mailOptions = {
        from: 'healthsync00@gmail.com',
        to: email,
        subject: 'Medication Reminder',
        text: `This is a reminder to take your medication:\n\nMedication: ${medicationName}\nDosage: ${dosage}\nNext Dose: ${nextDose}`
    };

    transporter.sendMail(mailOptions, (error, info) => {
        if (error) {
            console.error("Error sending email:", error);
            res.status(500).send('Error sending email');
        } else {
            console.log('Email sent:', info.response);
            res.status(200).send('Reminder sent successfully');
        }
    });
});

// Function to send scheduled email notifications
function sendEmailNotification(name, dosage, frequency) {
    console.log('Attempting to send email notification...');
    const mailOptions = {
        from: 'healthsync00@gmail.com',
        to: 'poojithabada858@gmail.com',
        subject: 'Medication Reminder',
        text: `Reminder to take your medication: ${name}\nDosage: ${dosage}\nFrequency: ${frequency}`
    };

    transporter.sendMail(mailOptions, (error, info) => {
        if (error) {
            console.error('Error sending email:', error);
        } else {
            console.log('Email sent:', info.response);
        }
    });
}

// Schedule a cron job for testing (runs every minute)
const job = cron.schedule('* * * * *', () => {
    console.log('Cron job triggered');
    sendEmailNotification('Test Medication', '1 tablet', 'Once daily');
});
job.start();

// Start the server
app.listen(3000, () => {
    console.log('Server running on http://localhost:3000');
});