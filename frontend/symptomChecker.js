const chatBox = document.getElementById("chat-box");
const userInput = document.getElementById("user-input");
const sendButton = document.getElementById("send-btn");
const symptomDiseaseMap = {
    "fever": {
        diseases: ["flu", "cold", "malaria", "corona"],
        medication: "For fever: Paracetamol every 6 hours, stay hydrated, and rest."
    },
    "sore throat": {
        diseases: ["strep throat", "flu", "corona"],
        medication: "For sore throat: Gargle with salt water, throat lozenges, and acetaminophen for pain relief."
    },
    "head ache": {
        diseases: ["migraine", "tension headache", "corona"],
        medication: "For headache: Ibuprofen (200-400mg every 4-6 hours), rest in a dark room, and stay hydrated."
    },
    "body pain": {
        diseases: ["COVID-19", "flu", "arthritis"],
        medication: "For body pain: Ibuprofen or acetaminophen as needed, rest, and warm compresses."
    },
    "nausea": {
        diseases: ["food poisoning", "motions sickness"],
        medication: "For nausea: Ginger tea, antiemetic like meclizine, and stay hydrated."
    },
    "diarrhea": {
        diseases: ["food poisoning", "gastroenteritis"],
        medication: "For diarrhea: Oral rehydration solution, loperamide for severe cases, and avoid dairy and spicy foods."
    },
    "cough": {
        diseases: ["bronchitis", "cold", "flu", "corona"],
        medication: "For cough: Cough syrup with guaifenesin, honey in warm water, and rest."
    },
    "runny nose": {
        diseases: ["cold", "allergy"],
        medication: "For runny nose: Antihistamines like cetirizine or loratadine, and stay hydrated."
    },
    "allergy": {
        diseases: ["seasonal allergy", "dust allergy"],
        medication: "For allergy: Antihistamines like cetirizine or loratadine, avoid allergen exposure."
    },
    "fatigue": {
        diseases: ["anemia", "thyroid issues", "flu", "corona"],
        medication: "For fatigue: Ensure adequate rest, hydration, and consider a multivitamin supplement."
    },
    "rectal bleeding": {
        diseases: ["piles", "hemorrhoids"],
        medication: "For piles: Over-the-counter creams or suppositories, sitz baths, and high-fiber diet."
    },
    "weakness": {
        diseases: ["AIDS", "anemia"],
        medication: "For weakness: Consult a doctor for proper diagnosis, maintain a nutritious diet, and take prescribed medications."
    },
    "chest pain": {
        diseases: ["angina", "heart attack", "gastroesophageal reflux disease (GERD)"],
        medication: "For chest pain: Seek immediate medical attention if severe. For mild cases, antacids may help with GERD-related pain."
    },
    "shortness of breath": {
        diseases: ["asthma", "COPD", "corona", "pneumonia"],
        medication: "For shortness of breath: Use a prescribed inhaler if you have asthma or COPD; consult a doctor if symptoms persist."
    },
    "back pain": {
        diseases: ["muscle strain", "sciatica", "osteoporosis", "spinal stenosis"],
        medication: "For back pain: NSAIDs like ibuprofen, muscle relaxants, physical therapy, and hot/cold compresses."
    },
    "skin rash": {
        diseases: ["eczema", "psoriasis", "contact dermatitis", "allergic reaction"],
        medication: "For skin rash: Antihistamines, hydrocortisone cream, and avoid allergens."
    },
    "conjunctivitis": {
        diseases: ["pink eye", "allergic conjunctivitis", "viral conjunctivitis"],
        medication: "For conjunctivitis: Antibiotic eye drops for bacterial cases, antihistamines for allergies, and avoid touching eyes."
    },
    "sinus infection": {
        diseases: ["sinusitis", "chronic rhinosinusitis"],
        medication: "For sinus infection: Decongestants, saline nasal spray, and antibiotics if bacterial."
    },
    "high cholesterol": {
        diseases: ["hyperlipidemia"],
        medication: "For high cholesterol: Statins as prescribed by a doctor, and dietary changes like low-saturated fat intake."
    },
    "hypertension": {
        diseases: ["high blood pressure"],
        medication: "For hypertension: Antihypertensive medications, regular exercise, and low-sodium diet."
    },
    "diabetes": {
        diseases: ["type 1 diabetes", "type 2 diabetes"],
        medication: "For diabetes: Insulin (type 1), metformin and other oral medications (type 2), and regular blood sugar monitoring."
    },
    "urinary tract infection": {
        diseases: ["UTI"],
        medication: "For UTI: Antibiotics prescribed by a doctor, drink plenty of fluids, and avoid irritants like caffeine."
    },
    "peptic ulcer": {
        diseases: ["gastric ulcer", "duodenal ulcer"],
        medication: "For peptic ulcer: Proton pump inhibitors (e.g., omeprazole), antacids, and antibiotics if H. pylori is detected."
    },
    "motions": {
        diseases: ["food poisoning", "gastroenteritis", "irritable bowel syndrome (IBS)", "lactose intolerance", "Crohn's disease"],
        medication: "For diarrhea: Oral rehydration solution (ORS), loperamide for severe cases, and avoid dairy and spicy foods."
    },
    "vomiting": {
        diseases: ["food poisoning", "motion sickness", "gastroenteritis", "migraine", "pregnancy (morning sickness)", "gastritis"],
        medication: "For vomiting: Ginger tea, antiemetic like meclizine or ondansetron, and stay hydrated. For motion sickness, use antihistamines like dimenhydrinate."
    },
    "stomach pain": {
        diseases: ["gastritis", "peptic ulcer", "appendicitis", "gastroenteritis", "irritable bowel syndrome (IBS)", "gallstones"],
        medication: "For stomach pain: Antacids (like ranitidine), proton pump inhibitors (like omeprazole), and for cramps, use antispasmodics like hyoscine butylbromide. Seek medical help if pain is severe or persistent."
    }
};
const diseaseMedicationMap = {
    "flu": "Rest, hydration, and over-the-counter flu medication as needed.",
    "cold": "Antihistamines, decongestants, plenty of fluids, and rest.",
    "malaria": "Consult a healthcare professional for anti-malarial drugs like artemisinin-based therapies.",
    "strep throat": "Antibiotics prescribed by a doctor, rest, and warm salt-water gargles.",
    "migraine": "NSAIDs, triptans (prescribed by doctor), rest in a dark, quiet room.",
    "food poisoning": "Oral rehydration solution, rest, and avoid solid foods until symptoms subside.",
    "bronchitis": "Cough syrup, bronchodilators, and rest. Consult a doctor if symptoms persist.",
    "gastroenteritis": "Oral rehydration, rest, and avoid dairy or spicy foods until symptoms improve.",
    "anemia": "Iron supplements, and iron-rich foods such as leafy greens and beans. Consult a doctor for proper dosage.",
    "thyroid issues": "Consult a healthcare provider for thyroid hormone replacement if needed.",
    "corona": "Rest, hydration, monitor oxygen levels, paracetamol for fever, and consult a doctor if symptoms worsen.",
    "arthritis": "NSAIDs for pain relief, physical therapy, and consult a doctor for advanced treatment options.",
    "piles": "Use over-the-counter creams, take sitz baths, and maintain a high-fiber diet.",
    "aids": "Antiretroviral therapy (ART) as prescribed by a doctor, regular monitoring, and a healthy diet.",
    "dengue": "Stay hydrated, monitor platelet levels, and avoid NSAIDs; consult a doctor if symptoms worsen.",
    "typhoid": "Antibiotics prescribed by a doctor, rest, and a bland diet.",
    "tonsillitis": "Antibiotics (if bacterial), warm salt-water gargles, and throat lozenges.",
    "sinusitis": "Decongestants, saline nasal sprays, and rest. Antibiotics may be required if bacterial.",
    "fibromyalgia": "Pain relievers, physical therapy, and stress management techniques.",
    "pregnancy": "Consult a doctor for any medications and follow dietary recommendations for nausea relief.",
    "IBS": "Fiber supplements, antispasmodic medications, and avoiding trigger foods.",
    "pneumonia": "Antibiotics for bacterial cases, rest, fluids, and prescribed cough medications.",
    "COPD": "Bronchodilators, inhaled steroids, and oxygen therapy if prescribed.",
    "heart attack": "Seek emergency care immediately. Aspirin may help, but only as directed by emergency personnel."
};

function addMessage(text, sender) {
    const message = document.createElement("div");
    message.classList.add("message", sender);
    message.textContent = text;
    chatBox.appendChild(message);
    chatBox.scrollTop = chatBox.scrollHeight;
}

function findDiseasesInInput(input) {
    const lowerInput = input.toLowerCase();
    const matchedDiseases = new Set();
    let medicationSuggestions = "";
    for (const symptom in symptomDiseaseMap) {
        if (lowerInput.includes(symptom)) {
            const { diseases, medication } = symptomDiseaseMap[symptom];
            diseases.forEach(disease => matchedDiseases.add(disease));
            medicationSuggestions +=` ${medication}\n`;
        }
    }

    return {
        diseases: Array.from(matchedDiseases),
        medication: medicationSuggestions.trim()
    };
}

function handleUserResponse() {
    const userResponse = userInput.value.trim().toLowerCase();
    
    if (userResponse) {
        addMessage(userResponse, "user");
        userInput.value = ""; 
        const diseaseDirectMatch = findDiseaseInInput(userResponse);
        const { diseases: symptomDiseases, medication: symptomMedication } = findDiseasesInInput(userResponse);
        
        if (diseaseDirectMatch) {
            const medication = diseaseMedicationMap[diseaseDirectMatch];
            addMessage(`Suggested medication for ${diseaseDirectMatch.charAt(0).toUpperCase() + diseaseDirectMatch.slice(1)}: ${medication}`, "bot");
        } else if (symptomDiseases.length > 0) {
            const diseasesList = symptomDiseases.join(", ");
            addMessage(`Based on your symptoms, possible diseases are: ${diseasesList}.`, "bot");
            addMessage(`Suggested medication:\n${symptomMedication}`, "bot");
        } else {
            addMessage("Sorry, I don't have information for that input. Please consult a healthcare professional.", "bot");
        }
    } else {
        addMessage("Please enter a disease name or related symptoms.", "bot");
    }
}

function findDiseaseInInput(input) {
    for (const disease in diseaseMedicationMap) {
        if (input.includes(disease)) {
            return disease;
        }
    }
    return null;
}

sendButton.addEventListener("click", handleUserResponse);

userInput.addEventListener("keypress", function(event) {
    if (event.key === "Enter") {
        handleUserResponse();
    }
});

document.addEventListener("DOMContentLoaded", function() {
    addMessage("Hello! Enter a disease name or symptoms to get possible diagnoses and medication suggestions.", "bot");
});