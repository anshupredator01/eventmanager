// You can add JavaScript functionality here if needed
// For example, you might want to add client-side validation

// Example: Ensure that the password meets certain criteria before submitting the form
document.addEventListener('DOMContentLoaded', function () {
    const passwordInput = document.getElementById('password');
    const form = document.querySelector('form');

    form.addEventListener('submit', function (event) {
        if (!isPasswordValid(passwordInput.value)) {
            event.preventDefault();
            alert('Password must be at least 8 characters long.');
        }
    });

    function isPasswordValid(password) {
        return password.length >= 8;
    }
});
