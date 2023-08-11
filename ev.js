// ev.js

document.addEventListener("DOMContentLoaded", function () {
    const codeForm = document.querySelector(".code-ren");
    const addEventForm = document.querySelector(".ajouter");
    const codeInput = document.getElementById("pass-re");
    const submitCodeButton = document.getElementById("code");

    submitCodeButton.addEventListener("click", function (event) {
        event.preventDefault(); // Prevent form submission

        const enteredCode = codeInput.value;
        const correctCode = "2545"; // Replace with the correct code

        if (enteredCode === correctCode) {
            codeForm.style.display = "none";
            addEventForm.style.display = "block";
            
        } else {
            alert("Incorrect code. Please try again.");
        }
    });
});
