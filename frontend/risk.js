document.getElementById('riskForm').addEventListener('submit', function (event) {
    event.preventDefault();

    // Collecting input values
    let age = document.getElementById('age').value;
    let weight = document.getElementById('weight').value;
    let height = document.getElementById('height').value;
    let smoke = document.querySelector('input[name="smoke"]:checked').value;
    let familyHistory = document.querySelector('input[name="familyHistory"]:checked').value;
    let diabetes = document.querySelector('input[name="diabetes"]:checked').value;

    // Calculate BMI
    let bmi = (weight / ((height / 100) * (height / 100))).toFixed(2);

    // Risk calculation
    let riskScore = 0;

    if (age > 45) riskScore += 2;
    if (bmi > 25) riskScore += 2;
    if (smoke === 'yes') riskScore += 3;
    if (familyHistory === 'yes') riskScore += 2;
    if (diabetes === 'yes') riskScore += 2;

    // Generate report
    let report = document.getElementById('report');
    let riskMessage = "";

    if (riskScore < 3) {
        riskMessage = "Low risk. Keep maintaining a healthy lifestyle!";
    } else if (riskScore >= 3 && riskScore <= 6) {
        riskMessage = "Moderate risk. Consider making lifestyle changes and consult with a healthcare professional.";
    } else {
        riskMessage = "High risk. It's important to consult with a doctor as soon as possible.";
    }

    report.innerHTML = `
        <h2>Your Health Risk Assessment</h2>
        <p>Age: ${age}</p>
        <p>BMI: ${bmi}</p>
        <p>Risk Score: ${riskScore}</p>
        <p><strong>Conclusion: ${riskMessage}</strong></p>
        <p>Recommendations: Eat healthy, exercise regularly, avoid smoking, and have regular check-ups.</p>
    `;
});