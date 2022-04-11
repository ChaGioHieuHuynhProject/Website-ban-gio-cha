var accordions = document.querySelectorAll(".h-container");
accordions.forEach((item) => {
  item.addEventListener("click", () => {
    if (item.classList.contains("h-active")) {
      item.classList.remove("h-active");
      return;
    }
    accordions.forEach((ele) => {
      ele.classList.remove("h-active");
    });
    item.classList.toggle("h-active");
  });
});
