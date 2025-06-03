document.getElementById("authType").addEventListener("change", function () {
  // Hide all inputs first
  document.querySelectorAll("#authNumberContainer input").forEach((input) => {
    input.classList.add("d-none");
  });

  // Show the selected one
  const selectedType = this.value;
  document.getElementById(selectedType + "Number").classList.remove("d-none");
});
