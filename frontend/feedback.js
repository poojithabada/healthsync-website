document.getElementById('reviewForm').addEventListener('submit', function (e) {
    e.preventDefault(); // Prevent form from submitting normally
  
    // Get form values
    const name = document.getElementById('patientName').value;
    const rating = document.getElementById('rating').value;
    const feedback = document.getElementById('feedback').value;
  
    // Create a new review item
    const review = document.createElement('div');
    review.classList.add('review-item');
  
    review.innerHTML = `
        <p class="review-name">${name}</p>
        <p class="review-rating">Rating: ${rating} ⭐</p>
        <p class="review-feedback">${feedback}</p>
    `;
  
    // Append the new review to the reviews list
    document.getElementById('reviews').appendChild(review);
  
    // Reset form
    document.getElementById('reviewForm').reset();
  });