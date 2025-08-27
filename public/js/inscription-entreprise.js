document.addEventListener("DOMContentLoaded", function () {
    const panels = Array.from(document.querySelectorAll(".step"));
    const indicators = Array.from(document.querySelectorAll(".progress-step"));
    const progressLine = document.getElementById("progress-line");
    const stepText = document.getElementById("stepText");

    const total = panels.length;
    let currentStep = 0; // index 0..(total-1)
    const completed = new Set(); // indices déjà validés

    const titles = indicators.map((el) => el.dataset.title || "");

    function styleIndicator(el, state) {
        // Reset classes de base
        el.className =
            "progress-step w-12 h-12 rounded-full flex items-center justify-center text-xl transition-colors";
        if (state === "complete") {
            el.classList.add("bg-green-500", "text-white");
        } else if (state === "active") {
            el.classList.add("bg-blue-600", "text-white");
        } else {
            el.classList.add("bg-gray-300", "text-gray-500");
        }
    }

    function render() {
        // Afficher uniquement le panneau courant
        panels.forEach((p, i) => {
            if (i === currentStep) p.classList.remove("hidden");
            else p.classList.add("hidden");
        });

        // Mettre à jour les pastilles (gris / vert / bleu)
        indicators.forEach((el, i) => {
            if (i < currentStep || completed.has(i))
                styleIndicator(el, "complete");
            else if (i === currentStep) styleIndicator(el, "active");
            else styleIndicator(el, "upcoming");
        });

        // Ligne de progression (0% au step 0 → 100% au step final)
        const percent = (currentStep / (total - 1)) * 100;
        progressLine.style.width = `${percent}%`;

        // Texte "Étape X sur Y : Titre"
        stepText.textContent = `Étape ${currentStep + 1} sur ${total} : ${
            titles[currentStep]
        }`;
    }

    function validateCurrentStep() {
        const step = panels[currentStep];
        const inputs = step.querySelectorAll(
            "input[required], select[required], textarea[required]"
        );
        let ok = true;
        inputs.forEach((input) => {
            if (!input.checkValidity()) {
                ok = false;
                input.classList.add("border-red-500");
            } else {
                input.classList.remove("border-red-500");
            }
        });
        return ok;
    }

    // Navigation publique (appelées par les boutons)
    window.nextStep = function () {
        if (!validateCurrentStep()) return;
        completed.add(currentStep);
        if (currentStep < total - 1) {
            currentStep += 1;
            render();
        }
    };

    window.prevStep = function () {
        if (currentStep > 0) {
            currentStep -= 1;
            render();
        }
    };

    // Initialisation
    render();
});
