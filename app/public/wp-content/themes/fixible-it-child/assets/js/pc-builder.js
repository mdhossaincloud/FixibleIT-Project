// Function to update total price
function updateTotal() {
    let total = 0;
    const selects = document.querySelectorAll('.fit-select');
    
    selects.forEach(select => {
        total += parseFloat(select.value) || 0;
    });

    // Format price with Taka symbol and commas
    document.getElementById('fit-total-price').innerText = '৳' + total.toLocaleString('en-IN');
    
    // Basic compatibility simulation
    const compatText = document.getElementById('fit-compat-text');
    if(total > 0) {
        compatText.innerText = "Pending Check";
        compatText.style.color = "#00A896"; 
    } else {
        compatText.innerText = "Unknown";
        compatText.style.color = "#6C757D";
    }
}

// Modal Logic
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('fit-quote-modal');
    const btn = document.querySelector('.fit-save-build-btn');
    const closeBtn = document.querySelector('.fit-modal-close');

    btn.addEventListener('click', function() {
        // Check if at least 1 item is selected
let totalText = document.getElementById('fit-total-price').innerText;
let numericString = totalText.replace(/[^0-9.]/g, ''); 
let total = parseFloat(numericString) || 0;
        if(total === 0) {
            alert("Please select at least one component before requesting a quote.");
            return;
        }
        modal.style.display = 'flex';
    });

    closeBtn.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    window.addEventListener('click', function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    });
});

// Simulate Quote Submission
function submitQuote() {
    const name = document.getElementById('fit-q-name').value;
    const phone = document.getElementById('fit-q-phone').value;
    const status = document.getElementById('fit-quote-status');

    if(!name || !phone) {
        alert("Please enter both Name and Mobile Number.");
        return;
    }

    // In the future, this will send an AJAX request to the server to save the quote to the database.
    status.innerText = "Processing...";
    
    setTimeout(() => {
        status.style.color = "#00A896";
        status.innerText = "Success! Your quotation request has been received. Reference: FIT-Q-TEST-01";
    }, 1500);
}