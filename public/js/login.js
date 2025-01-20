const selectLogin = document.getElementById("select-login");
const campoPJ = document.getElementById("campo-cnpj");
const campoPF = document.getElementById("campo-cpf");

selectLogin.addEventListener("change", function () {
    if (selectLogin.value == "cpf") {
        campoPJ.style.display = "none";
        campoPJ.disabled = true;
        campoPF.style.display = "block";
        campoPF.disabled = false;

    } else {
        campoPJ.style.display = "block";
        campoPJ.disabled = false;
        campoPF.style.display = "none";
        campoPF.disabled = true;
    }
});

const passwordInput = document.getElementById("passwordInput");
const togglePassword = document.querySelector("#togglePassword")

togglePassword.addEventListener("click", function () {
    const type = passwordInput.type === "password" ? "text" : "password";
    passwordInput.type = type;
})
