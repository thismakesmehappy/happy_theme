const expand = document.getElementById("process-expand");
const hide = document.getElementById("process-hide");
const process = document.getElementById("process");

if (expand !== undefined && expand !== null) {
  expand.addEventListener("click", () => {
    process.classList.remove("d-none");
    expand.classList.add("d-none");
  });

  hide.addEventListener("click", () => {
    process.classList.add("d-none");
    expand.classList.remove("d-none");
  });
}
