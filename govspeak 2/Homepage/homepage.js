let currentStep = 1;

const formData = {
    name: "",
    telephone: "",
    email: "",
    typeOfComplaint: "",
    dateOfIncident: "",
    locationOfIncident: "",
    complaint: ""
};

const dynamicForm = document.getElementById('dynamic-form');

function isValidEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

function isValidTelephone(telephone) {
    const re = /^[0-9]+$/;
    return re.test(telephone);
}

function showError(inputId, message) {
    const errorSpan = document.getElementById(inputId + "-error");
    errorSpan.textContent = message;
}

function clearErrors() {
    const errorSpans = document.querySelectorAll(".error-message");
    errorSpans.forEach(span => span.textContent = "");
}

function showStep(step) {
    // Clear existing content in dynamicForm
    dynamicForm.innerHTML = '';

    if (step === 1) {
        dynamicForm.insertAdjacentHTML('beforeend', `
            <div class="above">
                <div class="box ${currentStep === 1 ? 'active' : ''}">
                    <div class="circle">1</div>
                    <p>Contact</p>
                </div>
                <img src="/lns/images/arrow.svg" alt="">
                <div class="box ${currentStep === 2 ? 'active' : ''}">
                    <div class="circle">2</div>
                    <p>Complaint Information</p>
                </div>
                <img src="/lns/images/arrow.svg" alt="">
                <div class="box ${currentStep === 3 ? 'active' : ''}">
                    <div class="circle">3</div>
                    <p>Complaint</p>
                </div>
            </div>
            <hr class="custom-line">
            <div class="below">
                <div class="box">
                    <label for="name">Name</label><br>
                    <input type="text" id="name" name="name" placeholder="How would you like to be called" value="${formData.name}">
                    <span id="name-error" class="error-message"></span>
                </div>
                <div class="box">
                    <label for="telephone">Telephone</label><br>
                    <input type="text" id="telephone" name="telephone" placeholder="Enter your WhatsApp number" value="${formData.telephone}">
                    <span id="telephone-error" class="error-message"></span>
                </div>
                <div class="box">
                    <label for="email">E-mail</label><br>
                    <input type="text" id="email" name="email" placeholder="Enter your email" value="${formData.email}">
                    <span id="email-error" class="error-message"></span>
                </div>
                <button id="continue-to-complaint-info">CONTINUE</button>
            </div>
        `);

        // Add event listener for continue button
        document.getElementById("continue-to-complaint-info").addEventListener("click", continueToComplaintInfo);
    } else if (step === 2) {
        dynamicForm.insertAdjacentHTML('beforeend', `
            <div class="above">
                <div class="box ${currentStep === 1 ? 'active' : ''}">
                    <div class="circle">1</div>
                    <p>Contact</p>
                </div>
                <img src="/lns/images/arrow.svg" alt="">
                <div class="box ${currentStep === 2 ? 'active' : ''}">
                    <div class="circle">2</div>
                    <p>Complaint Information</p>
                </div>
                <img src="/lns/images/arrow.svg" alt="">
                <div class="box ${currentStep === 3 ? 'active' : ''}">
                    <div class="circle">3</div>
                    <p>Complaint</p>
                </div>    
            </div>
            <hr class="custom-line">
            <div class="below">
                <div class="box">
                    <label for="type-of-complaint">Type of Complaint</label><br>
                    <input type="text" id="type-of-complaint" name="type-of-complaint" placeholder="Enter the type of complaint" value="${formData.typeOfComplaint}">
                    <span id="type-of-complaint-error" class="error-message"></span>
                </div>
                <div class="box">
                    <label for="date-of-incident">Date of Incident</label><br>
                    <input type="date" id="date-of-incident" name="date-of-incident" value="${formData.dateOfIncident}">
                    <span id="date-of-incident-error" class="error-message"></span>
                </div>
                <div class="box">
                    <label for="location-of-incident">Location of Incident</label><br>
                    <input type="text" id="location-of-incident" name="location-of-incident" placeholder="Enter the location of incident" value="${formData.locationOfIncident}">
                    <span id="location-of-incident-error" class="error-message"></span>
                </div>
                <div class="button">
                    <button id="back-to-contact">BACK</button>
                    <button id="continue-to-complaint">CONTINUE</button>
                </div>
            </div>
        `);

        // Add event listeners for back and continue buttons
        document.getElementById("back-to-contact").addEventListener("click", backToContact);
        document.getElementById("continue-to-complaint").addEventListener("click", continueToComplaint);
    } else if (step === 3) {
        dynamicForm.insertAdjacentHTML('beforeend', `
            <div class="above">
                <div class="box ${currentStep === 1 ? 'active' : ''}">
                <div class="circle">1</div>
                <p>Contact</p>
            </div>
            <img src="/lns/images/arrow.svg" alt="">
            <div class="box ${currentStep === 2 ? 'active' : ''}">
                <div class="circle">2</div>
                <p>Complaint Information</p>
            </div>
            <img src="/lns/images/arrow.svg" alt="">
            <div class="box ${currentStep === 3 ? 'active' : ''}">
                <div class="circle">3</div>
                <p>Complaint</p>
            </div>    
        </div>
        <hr class="custom-line">
        <div class="below">
            <div class="box">
                <label for="complaint">Complaint</label><br>
                <textarea id="complaint" name="complaint" placeholder="Enter your complaint">${formData.complaint}</textarea>
                <span id="complaint-error" class="error-message"></span>
            </div>
            <div class="button">
                <button id="back-to-complaint-info">BACK</button>
                <button id="submit-complaint">SUBMIT</button>
            </div>
        </div>
    `);

    // Add event listeners for back and submit buttons
    document.getElementById("back-to-complaint-info").addEventListener("click", backToComplaintInfo);
    document.getElementById("submit-complaint").addEventListener("click", submitComplaint);
}}

function continueToComplaintInfo() {
    clearErrors();
    formData.name = document.getElementById("name").value;
    formData.telephone = document.getElementById("telephone").value;
    formData.email = document.getElementById("email").value;

    let hasError = false;

    if (!formData.name) {
        showError("name", "Name is required, please enter your name");
        hasError = true;
    }

    if (!formData.telephone) {
        showError("telephone", "Telephone is required, please enter your telephone number");
        hasError = true;
    } else if (!isValidTelephone(formData.telephone)) {
        showError("telephone", "Telephone must be a number, please enter a valid telephone number");
        hasError = true;
    }

    if (!formData.email) {
        showError("email", "Email is required, please enter your email address");
        hasError = true;
    } else if (!isValidEmail(formData.email)) {
        showError("email", "Invalid email format, please enter a valid email address");
        hasError = true;
    }

    if (!hasError) {
        currentStep = 2;
        showStep(currentStep);
    }
}

function backToContact() {
    formData.typeOfComplaint = document.getElementById("type-of-complaint").value;
    formData.dateOfIncident = document.getElementById("date-of-incident").value;
    formData.locationOfIncident = document.getElementById("location-of-incident").value;
    currentStep = 1;
    showStep(currentStep);
}

function continueToComplaint() {
    clearErrors();
    formData.typeOfComplaint = document.getElementById("type-of-complaint").value;
    formData.dateOfIncident = document.getElementById("date-of-incident").value;
    formData.locationOfIncident = document.getElementById("location-of-incident").value;

    let hasError = false;

    if (!formData.typeOfComplaint) {
        showError("type-of-complaint", "Type of complaint is required, please specify the type of complaint");
        hasError = true;
    }

    if (!formData.dateOfIncident) {
        showError("date-of-incident", "Date of incident is required, please specify the date of the incident");
        hasError = true;
    }

    if (!formData.locationOfIncident) {
        showError("location-of-incident", "Location of incident is required, please specify the location of the incident");
        hasError = true;
    }

    if (!hasError) {
        currentStep = 3;
        showStep(currentStep);
    }
}

function backToComplaintInfo() {
    formData.complaint = document.getElementById("complaint").value;
    currentStep = 2;
    showStep(currentStep);
}

function submitComplaint() {
    clearErrors();
    formData.complaint = document.getElementById("complaint").value;

    if (!formData.complaint) {
        showError("complaint", "Complaint is required, please enter your complaint details");
    } else {
        const formDataToSend = new FormData();
        formDataToSend.append("name", formData.name);
        formDataToSend.append("telephone", formData.telephone);
        formDataToSend.append("email", formData.email);
        formDataToSend.append("type_of_complaint", formData.typeOfComplaint);
        formDataToSend.append("date_of_incident", formData.dateOfIncident);
        formDataToSend.append("location_of_incident", formData.locationOfIncident);
        formDataToSend.append("complaint", formData.complaint);

        fetch("submit_complaint.php", {
            method: "POST",
            body: formDataToSend
        })
        .then(response => response.text())
        .then(data => {
            alert("Submit success");
            // Reset formData and return to the first step
            formData.name = "";
            formData.telephone = "";
            formData.email = "";
            formData.typeOfComplaint = "";
            formData.dateOfIncident = "";
            formData.locationOfIncident = "";
            formData.complaint = "";
            currentStep = 1;
            showStep(currentStep);
        })
        .catch(error => {
            console.error("Error:", error);
        });
    }
}

document.addEventListener("DOMContentLoaded", function() {
    showStep(currentStep);
});
