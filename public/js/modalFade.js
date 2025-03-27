document.addEventListener("DOMContentLoaded", function () {
  setTimeout(function () {
      let alerts = document.querySelectorAll(".alert");
      alerts.forEach(alert => {
          alert.classList.add("fade");
          alert.classList.add("show");
          alert.style.opacity = "0";
          setTimeout(() => alert.remove(), 500); 
      });
  }, 3000);
});