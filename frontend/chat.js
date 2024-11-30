function handleKeyPress(event) {
    if (event.key === 'Enter') {
        sendMessage();
    }
}

function sendMessage() {
    const inputField = document.getElementById('user-input'); 
    const userMessage = inputField.value.trim();

    if (!userMessage) return;

    addMessage(userMessage, 'user');
    inputField.value = '';

    const botResponse = getBotResponse(userMessage);
    addMessage(botResponse, 'bot');
}

function addMessage(text, sender) {
    const messageContainer = document.getElementById('chat-box'); 
    const messageDiv = document.createElement('div');
    messageDiv.className = `message ${sender === 'user' ? 'user-message' : 'bot-message'}`; 
    messageDiv.innerHTML = text; 
    messageContainer.appendChild(messageDiv);
    messageContainer.scrollTop = messageContainer.scrollHeight;
}

function getBotResponse(message) {
    const msg = message.toLowerCase();

    if (msg.includes("hi") || msg.includes("hello")) {
        return "Hello! How can I assist you with the HealthSync website today?";
    } else if (msg.includes("book appointment") || msg.includes("schedule an appointment")) {
        return `To book an appointment:
        <ol>
            <li>Go to the <a href="/appointments" target="_blank">Appointments page</a>.</li>
            <li>Select your preferred doctor and available date.</li>
            <li>Fill in your details and confirm the booking.</li>
        </ol>`;
    } else if (msg.includes("contact support") || msg.includes("contact details")) {
        return `You can contact HealthSync support in the following ways:
        <ul>
            <li>Call us at <strong>(123) 456-7890</strong>.</li>
            <li>Email us at <a href="mailto:support@healthsync.com">support@healthsync.com</a>.</li>
            <li>Or visit our <a href="/contact" target="_blank">Contact Us page</a> for more options.</li>
        </ul>`;
    } else if (msg.includes("services") || msg.includes("health services")) {
        return `HealthSync offers a range of health services including:
        <ul>
            <li>General Checkups</li>
            <li>Specialist Consultations</li>
            <li>Diagnostic Services</li>
            <li>Emergency Care</li>
        </ul>
        You can learn more on our <a href="/services" target="_blank">Services page</a>.`;
    } else if (msg.includes("search doctor") || msg.includes("find doctor") || msg.includes("doctor list")) {
        return `To search for doctors on HealthSync:
        <ol>
            <li>Visit the <a href="doctors.html" target="_blank">Find a Doctor page</a>.</li>
            <li>Enter the doctor's name, specialization, or location in the search bar.</li>
            <li>Filter results based on your preferences such as availability or ratings.</li>
            <li>Click on a doctor's profile to view their details and book an appointment.</li>
        </ol>`;
    } else if (msg.includes("emergency") || msg.includes("urgent care")) {
        return "If you are experiencing a medical emergency, please call 108 or go to the nearest emergency room immediately.";
    } else if (msg.includes("working hours") || msg.includes("opening hours")) {
        return "Our regular working hours are Monday to Friday, 8:00 AM to 6:00 PM. For emergencies, we are available 24/7.";
    } else if (msg.includes("website")) {
        return "I'm here to help with website-related questions. Could you please clarify your query?";
    } else if (msg.includes("symptom checker")) {
        return `To use the Symptom Checker:
        <ol>
            <li>Visit the <a href="symptomChecker.html" target="_blank">Symptom Checker page</a>.</li>
            <li>Select your symptoms from the list provided.</li>
            <li>Click 'Analyze' to receive suggestions for potential conditions and advice on next steps.</li>
        </ol>`;
    } else if (msg.includes("health articles") || msg.includes("health tips")) {
        return `Explore our collection of health articles and tips for wellness:
        <ul>
            <li>Visit the <a href="blog.html" target="_blank">Health Articles page</a>.</li>
            <li>Browse articles by category or by the latest updates.</li>
            <li>Stay informed with reliable health information and tips from professionals.</li>
        </ul>`;
    } else if (msg.includes("medication reminders") || msg.includes("set reminders for medicine") || msg.includes("remind me to take medicine")) {
        return `To set up medication reminders on HealthSync:
        <ol>
            <li>Go to the <a href="medicationremainder.html" target="_blank">Remainders Page</a> in your account.</li>
            <li>Select the medication you want to set reminders for.</li>
            <li>Choose the frequency (daily, weekly, or custom schedule).</li>
            <li>Set the preferred time for each reminder.</li>
            <li>Save your settings to activate the reminders.</li>
        </ol>
        You’ll receive notifications according to the schedule you've set to help you stay on track with your medications.`;
    } else if (msg.includes("notifications") || msg.includes("reminders") || msg.includes("receive notifications")) {
        return `You will receive notifications and reminders via email to help you stay updated with your health needs on HealthSync. Make sure your email address is up-to-date in your account settings.`;
    } else {
        return "I'm here to help with website-related questions. Could you please clarify your query?";
    } 
}