function submitForm() {
    preventDefault();
    const form = document.getElementsById('createQuiz');
    form.submit(); // Submit the form
    form.reset();  // Reset all form data
    return false; // Prevent page refresh
 }
