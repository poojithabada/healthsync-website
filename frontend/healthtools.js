// Mindfulness Exercise
const mindfulnessTimer = document.getElementById('mindfulnessTimer');
const startMindfulness = document.getElementById('startMindfulness');

startMindfulness.addEventListener('click', () => {
    mindfulnessTimer.innerHTML = 'Close your eyes and take deep breaths...';
    let timeLeft = 60; // 5 seconds for a demo
    const countdown = setInterval(() => {
        mindfulnessTimer.innerHTML = `Keep breathing... Time left: ${timeLeft} seconds`;
        timeLeft--;
        if (timeLeft < 0) {
            clearInterval(countdown);
            mindfulnessTimer.innerHTML = 'Well done! You have completed the mindfulness exercise.';
        }
    }, 1000);
});

// Stress Management Tips
const stressTips = [
    "Take regular breaks during work.",
    "Practice deep breathing exercises.",
    "Engage in physical activities like yoga or walking.",
    "Connect with friends or family for support.",
    "Listen to calming music.",
];

document.getElementById('loadStressTips').addEventListener('click', () => {
    const tipList = document.getElementById('stressTips');
    tipList.innerHTML = '';
    stressTips.forEach((tip) => {
        const li = document.createElement('li');
        li.textContent = tip;
        tipList.appendChild(li);
    });
});

// Mental Health Professional Consultation Form
document.getElementById('consultationForm').addEventListener('submit', (event) => {
    event.preventDefault();
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const issue = document.getElementById('issue').value;

    // Simulate sending data to a server
    setTimeout(() => {
        document.getElementById('responseMessage').textContent = `Thank you, ${name}. A mental health professional will contact you at ${email}.`;
    }, 1000);
});