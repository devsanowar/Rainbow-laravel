        function updateAuthPlaceholder() {
        const selectedType = document.getElementById("authentication_type_id").value;
        const input = document.getElementById("authentication_number_id");

        if (selectedType === "NID") {
            input.placeholder = "NID Number";
        } else if (selectedType === "Birth") {
            input.placeholder = "Birth Registration Number";
        } else if (selectedType === "Passport") {
            input.placeholder = "Passport Number";
        }
    }

    window.addEventListener("DOMContentLoaded", updateAuthPlaceholder);