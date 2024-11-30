// Mock Billing Data
const billingHistory = [
    { date: '2024-10-01', service: 'Consultation', amount: 100, status: 'Paid' },
    { date: '2024-10-15', service: 'Surgery', amount: 1500, status: 'Unpaid' },
    { date: '2024-11-02', service: 'Physiotherapy', amount: 200, status: 'Paid' }
];

// Load Billing History on Page Load
window.onload = () => {
    const billingTable = document.getElementById('billingTable');
    billingHistory.forEach((bill) => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${bill.date}</td>
            <td>${bill.service}</td>
            <td>$${bill.amount}</td>
            <td>${bill.status}</td>
        `;
        billingTable.appendChild(row);
    });
};

// Handle Payment Submission
document.getElementById('paymentForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const amount = document.getElementById('amount').value;
    const paymentMethod = document.getElementById('paymentMethod').value;

    // Simulate Payment Processing (you would replace this with a real payment integration)
    processPayment(amount, paymentMethod);
});

function processPayment(amount, paymentMethod) {
    // Here, you'd make API calls to a real payment service provider like Stripe or PayPal.
    // Simulating a successful payment for this example.
    const paymentStatus = document.getElementById('paymentStatus');
    paymentStatus.textContent = `Payment of $${amount} via ${paymentMethod} was successful!`;

    // Redirect to another page after payment is successful
    setTimeout(() => {
        window.location.href = "appointmentstatus.html"; // Replace with your target page
    }, 10); // Redirect after 2 seconds to allow the user to see the success message
}
