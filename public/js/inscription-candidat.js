document.addEventListener("DOMContentLoaded", function () {
    const drop = document.getElementById("cv-dropzone");
    const file = document.getElementById("cv");
    const fileName = document.getElementById("cv-filename");

    if (!drop || !file) {
        console.error("Impossible de trouver cv-dropzone ou cv");
        return;
    }

    // ✅ Clic sur la zone → ouvre le sélecteur
    drop.addEventListener("click", function () {
        file.click();
    });

    // ✅ Sélection d’un fichier via input
    file.addEventListener("change", function () {
        if (file.files && file.files[0]) {
            fileName.textContent = `Fichier sélectionné : ${file.files[0].name}`;
        } else {
            fileName.textContent = "";
        }
    });

    // ✅ Drag & Drop
    drop.addEventListener("dragover", function (e) {
        e.preventDefault();
        drop.classList.add("bg-gray-200");
    });

    drop.addEventListener("dragleave", function () {
        drop.classList.remove("bg-gray-200");
    });

    drop.addEventListener("drop", function (e) {
        e.preventDefault();
        drop.classList.remove("bg-gray-200");

        if (e.dataTransfer.files && e.dataTransfer.files[0]) {
            file.files = e.dataTransfer.files; // on assigne le fichier au vrai input
            fileName.textContent = `Fichier sélectionné : ${e.dataTransfer.files[0].name}`;
        }
    });
});


const passwordInput = document.getElementById("password");
const requirements = {
    uppercase: document.querySelector(".password-req-uppercase"),
    lowercase: document.querySelector(".password-req-lowercase"),
    number: document.querySelector(".password-req-number"),
    symbol: document.querySelector(".password-req-symbol"),
};

function validatePassword() {
    const pwd = passwordInput.value;
    const checks = {
        uppercase: /[A-Z]/.test(pwd),
        lowercase: /[a-z]/.test(pwd),
        number: /\d/.test(pwd),
        symbol: /[^a-zA-Z0-9]/.test(pwd),
    };

    // Met à jour les couleurs avec Tailwind
    Object.keys(checks).forEach((key) => {
        if (requirements[key]) {
            requirements[key].classList.toggle("text-gray-500", !checks[key]);
            requirements[key].classList.toggle("text-green-600", checks[key]);
        }
    });
}

passwordInput?.addEventListener("input", validatePassword);


document.addEventListener("DOMContentLoaded", function () {
    function setupPasswordToggle(inputId, toggleId) {
        const input = document.getElementById(inputId);
        const toggle = document.getElementById(toggleId);

        if (!input || !toggle) return;

        toggle.addEventListener("click", function () {
            const icon = toggle.querySelector("i");

            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                input.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        });
    }

    setupPasswordToggle("password", "togglePassword");
    setupPasswordToggle("password_confirmation", "togglePasswordConfirm");
});
