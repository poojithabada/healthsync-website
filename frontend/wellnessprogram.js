document.getElementById("wellnessForm").addEventListener("submit", function(event) {
    event.preventDefault();

    const age = document.getElementById("age").value;
    const healthGoal = document.getElementById("healthGoal").value;
    const activityLevel = document.getElementById("activityLevel").value;

    const healthHistory = Array.from(document.querySelectorAll('input[name="history"]:checked')).map(checkbox => checkbox.value);
    
    let wellnessPlan = "";

    // Base suggestions based on goals
    if (healthGoal === "fitness") {
        wellnessPlan += `Since your goal is to improve fitness and your current activity level is ${activityLevel}, we recommend a mix of cardio, strength training, and flexibility exercises. `;
    } else if (healthGoal === "weight_loss") {
        wellnessPlan += `For weight loss, focusing on calorie-controlled meals and regular physical activity is key. Since your activity level is ${activityLevel}, we suggest starting with a balanced diet plan and increasing activity gradually. `;
    } else if (healthGoal === "diet") {
        wellnessPlan += `For dietary improvement, we suggest adopting a balanced meal plan focusing on whole foods, avoiding processed sugars, and incorporating more fruits and vegetables. `;
    } else if (healthGoal === "mental") {
        wellnessPlan += `To improve mental wellness, consider regular mindfulness exercises, meditation, and activities that reduce stress. `;
    } else if (healthGoal === "chronic_management") {
        wellnessPlan += `Managing chronic conditions such as ${healthHistory.join(', ')} requires a careful approach. Incorporating regular medical checkups, a well-balanced diet, and physical activity tailored to your condition will help. `;
    }

    // Considerations based on health history
    if (healthHistory.includes("diabetes")) {
        wellnessPlan += `For diabetes management, we recommend focusing on a low-sugar, high-fiber diet with consistent exercise to help regulate blood sugar levels. `;
    }
    if (healthHistory.includes("hypertension")) {
        wellnessPlan += `For hypertension, it’s important to limit salt intake, avoid stress, and engage in regular cardiovascular exercise. `;
    }
    if (healthHistory.includes("heart_disease")) {
        wellnessPlan += `For heart disease, consider a heart-healthy diet rich in omega-3 fatty acids and low in saturated fats. Regular medical checkups are crucial. `;
    }
    if (healthHistory.includes("anxiety") || healthHistory.includes("depression")) {
        wellnessPlan += `For mental health conditions like anxiety or depression, a combination of therapy, regular physical activity, and relaxation techniques such as meditation can be beneficial. `;
    }

    // Final output display
    document.getElementById("wellnessPlan").innerText = wellnessPlan;
    document.getElementById("wellnessPlan").style.display = "block";
});