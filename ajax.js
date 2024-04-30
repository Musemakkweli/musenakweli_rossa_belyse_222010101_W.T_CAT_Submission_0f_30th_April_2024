
/**
*Created by: MUSEMAKWELI Belyse Rossa Arlande 
* Registration Number: 222010101 
*School Department: Year 2 in BIT (Business Information Technology)
*Project: Online Pregnancy Test System
 
 */
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("appointmentForm");
    const successMessage = document.getElementById("successMessage");

    form.addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent form submission

        const formData = new FormData(form);

        fetch(form.action, {
            method: "POST",
            body: formData,
        })
        .then(response => {
            if (response.ok) {
                successMessage.style.display = "block"; // Show success message
            }
            throw new Error("Network response was not ok.");
        })
        .catch(error => {
            console.error("Error:", error);
        });
    });
});