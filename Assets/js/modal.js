const body = document.querySelector("body");
const modal = document.querySelector(".modal");
let isOpened = false;

const openModal = () => {
    modal.classList.add("is-open");
    body.style.overflow = "hidden";
};

openModal();

