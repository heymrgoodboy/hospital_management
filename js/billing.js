document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector('form');

    form.addEventListener('submit', function(event) {
        event.preventDefault();

        // Validate form fields
        const fullName = document.getElementById('fullName').value.trim();
        const address = document.getElementById('address').value.trim();
        const email = document.getElementById('email').value.trim();
        const paymentMethod = document.getElementById('paymentMethod').value;

        if (fullName === '' || address === '' || email === '') {
            alert('Please fill in all fields.');
            return;
        }

        // Additional validation logic can be added here

        // Submit the form if all fields are valid
        this.submit();
    });
});
