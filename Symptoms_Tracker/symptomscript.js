document.addEventListener("DOMContentLoaded", function () {
    let selectedGender = "";
    let selectedSymptoms = [];

    document.querySelectorAll(".gender-btn").forEach(button => {
        button.addEventListener("click", function () {
            document.querySelectorAll(".gender-btn").forEach(btn => btn.classList.remove("selected"));
            this.classList.add("selected");
            selectedGender = this.getAttribute("data-gender");
        });
    });

    document.getElementById("toSymptoms").addEventListener("click", function () {
        const age = document.getElementById("age").value;
        if (!age || age < 1) {
            alert("Please enter a valid age.");
            return;
        }
        document.getElementById("page1").classList.add("hidden");
        document.getElementById("page2").classList.remove("hidden");
    });

    document.getElementById("symptomInput").addEventListener("input", function () {
        const input = this.value.toLowerCase();
        if (input.length < 2) return;

        fetch('fetch_symptoms.php?query=' + encodeURIComponent(input))
            .then(response => response.json())
            .then(data => {
                const suggestionList = document.getElementById("suggestions");
                suggestionList.innerHTML = "";

                data.forEach(symptom => {
                    const li = document.createElement("li");
                    li.textContent = symptom;
                    li.addEventListener("click", function () {
                        if (!selectedSymptoms.includes(symptom)) {
                            selectedSymptoms.push(symptom);
                            document.getElementById("selectedSymptoms").innerHTML += `<span class="badge">${symptom}</span> `;
                            document.getElementById("toConditions").disabled = false;  
                        }
                        document.getElementById("symptomInput").value = "";
                        suggestionList.innerHTML = "";
                    });
                    suggestionList.appendChild(li);
                });
            });
    });

    document.getElementById("toConditions").addEventListener("click", function () {
        if (selectedSymptoms.length === 0) {
            alert("Please select at least one symptom.");
            return;
        }

        fetch('process_symptoms.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                age: document.getElementById("age").value,
                gender: selectedGender,
                symptoms: selectedSymptoms
            })
        })
        .then(response => response.json())
        .then(data => {
            const conditionsList = document.getElementById("conditionsList");
            conditionsList.innerHTML = "";

            if (data.conditions && data.conditions.length > 0) {
                data.conditions.forEach(condition => {
                    conditionsList.innerHTML += `<li>${condition}</li>`;
                });
            } else {
                conditionsList.innerHTML = "<li>No matching conditions found.</li>";
            }

            // Populate user information
            document.getElementById("userAge").textContent = document.getElementById("age").value;
            document.getElementById("userGender").textContent = selectedGender;
            document.getElementById("userSymptoms").textContent = selectedSymptoms.join(", ");

            document.getElementById("page2").classList.add("hidden");
            document.getElementById("page3").classList.remove("hidden");
        });
    });

    document.getElementById("restart").addEventListener("click", function () {
        location.reload();
    });
});
