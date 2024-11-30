document.getElementById('medication-form').addEventListener('submit', function(event) {
    event.preventDefault(); 
    const email = document.getElementById('email').value;
    const medicationName = document.getElementById('medication-name').value;
    const dosage = document.getElementById('dosage').value;
    const frequency = document.getElementById('frequency').value;
    const nextDoseTime = document.getElementById('next-dose').value;

    const currentTime = new Date();
    const nextDoseDate = new Date(); 
    const [nextDoseHours, nextDoseMinutes] = nextDoseTime.split(':');
    nextDoseDate.setHours(nextDoseHours);
    nextDoseDate.setMinutes(nextDoseMinutes);

    const timeUntilDose = nextDoseDate - currentTime;

    if (timeUntilDose < 0) {
        alert('The time selected for the next dose has already passed. Please choose a future time.');
        return;
    }
    const table = document.getElementById('medication-table');
    const newRow = table.insertRow();
    newRow.insertCell(0).textContent = medicationName;
    newRow.insertCell(1).textContent = dosage;
    newRow.insertCell(2).textContent = frequency;
    newRow.insertCell(3).textContent = nextDoseTime;
    
    setTimeout(() => {
        sendEmailReminder(email, medicationName, dosage, nextDoseTime);
        alert(`It's time to take your medication: ${medicationName}. Dosage: ${dosage}.`);
    }, timeUntilDose);

    document.getElementById('message').textContent = 'Medication reminder set successfully!';
    document.getElementById('message').style.color = 'green';
});


function sendEmailReminder(email, medicationName, dosage, nextDoseTime) {
    fetch('http://localhost:3000/send-email', { 
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
            email,
            subject: `Reminder: Time for ${medicationName}`,
            message:` It's time to take your medication: ${medicationName}. Dosage: ${dosage}. Next dose is at ${nextDoseTime}.`
        })
    })
    .then(response => {
        if (response.ok) {
            console.log('Email reminder sent successfully!');
        } else {
            console.error('Failed to send email reminder.');
        }
    })
    .catch(error => {
        console.error('Error sending reminder:', error);
    });
}