function rosie() {
  const wpcf7Elm = document.querySelector("#footer-info");
  const rosie = document.querySelector("#rosie");
  const submitButton = document.querySelector("#submitting");
  const footer = document.querySelector("#footer-info");

  submitButton.addEventListener("click", function () {
    rosie.classList.add("d-none");
    footer.classList.remove("pb-0");
    footer.classList.add("pb-3");
  });

  wpcf7Elm.addEventListener(
    "wpcf7mailsent",
    function (event) {
      rosie.classList.remove("d-none");
      footer.classList.add("pb-0");
      footer.classList.remove("pb-3");
      rosie.scrollIntoView({ behavior: "smooth", alignToTop: "true" });
    },
    false,
  );
}
