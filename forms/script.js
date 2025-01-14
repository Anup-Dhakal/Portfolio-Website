function sendMail() {
    // Get the error message container
    const formErrorMessage = document.getElementById("form-error-message");
    formErrorMessage.textContent = ""; // Clear any previous error messages

    // Get form values
    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const subject = document.getElementById("subject").value.trim();
    const message = document.getElementById("message").value.trim();

    // Validate form fields
    if (!name || !email || !subject || !message) {
        formErrorMessage.textContent = "Please fill all the fields before sending the message.";
        return; // Stop the function if validation fails
    }

    // Proceed with sending the message if all fields are filled
    formErrorMessage.textContent = "Sending your message... Please wait."; // Optional feedback

    const parms = {
        to_name: "Anup",
        name: name,
        subject: subject,
        message: message,
        reply_to: email,
    };

    emailjs
        .send("service_sov7xnr", "template_0sx9fup", parms)
        .then((response) => {
            console.log("SUCCESS!", response);
            formErrorMessage.textContent = "Your message has been sent successfully!";
            formErrorMessage.className = "text-success mt-3"; // Change color to green for success
            document.querySelector("form").reset();
        })
        .catch((error) => {
            console.error("FAILED...", error);
            formErrorMessage.textContent = `Failed to send message. Error: ${error.text}`;
        });
}
