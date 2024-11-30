function assessHealth() {
    const height = document.getElementById('height').value;
    const weight = document.getElementById('weight').value;
    const smoking = document.getElementById('smoking').value;
    const exercise = document.getElementById('exercise').value;

    if (!height || !weight) {
        alert("Please fill out all the fields.");
        return;
    }

    // Calculate BMI
    const bmi = (weight / ((height / 100) ** 2)).toFixed(2);

    let recommendation = `Your BMI is ${bmi}. `;

    // Health assessment based on BMI
    if (bmi < 18.5) {
        recommendation += "You are underweight. Consider eating a balanced diet.";
    } else if (bmi >= 18.5 && bmi < 24.9) {
        recommendation += "You have a normal weight. Keep up with your healthy lifestyle!";
    } else if (bmi >= 25 && bmi < 29.9) {
        recommendation += "You are overweight. Consider managing your diet and increasing physical activity.";
    } else {
        recommendation += "You are in the obese range. It’s important to consult with a healthcare provider.";
    }

    // Additional recommendations based on smoking status and exercise habits
    if (smoking === 'yes') {
        recommendation += " Smoking increases your health risks. Quitting smoking is highly recommended.";
    }

    if (exercise === 'no') {
        recommendation += " Regular physical activity is important for your health. Consider starting a workout routine.";
    } else {
        recommendation += " Great job exercising regularly! Keep it up!";
    }

    // Display the recommendation
    document.getElementById('recommendation').innerText = recommendation;
    document.getElementById('result').style.display = 'block';
}