const passwordInput1 = document.getElementById("passwordInput1");
const passwordInput2 = document.getElementById("passwordInput2");

const togglePassword1 = document.querySelector("#togglePassword1");
const togglePassword2 = document.querySelector("#togglePassword2");

togglePassword1.addEventListener("click", function () {
    const type = passwordInput1.type === "password" ? "text" : "password";
    passwordInput1.type = type;
})

togglePassword2.addEventListener("click", function () {
    const type = passwordInput2.type === "password" ? "text" : "password";
    passwordInput2.type = type;
})

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
