const initSlider = () => {
  const imageList = document.querySelector(".slider-wrapper .image-list");
  const slideButton = document.querySelectorAll(
    ".slider-wrapper .slide-button"
  );
  const maxScrollLeft = imageList.scrollWidth - imageList.clientWidth;

  slideButton.forEach((button) => {
    button.addEventListener("click", () => {
      const direction = button.id === "prev-slide" ? -1 : 1;
      const scrollAmount = imageList.clientWidth * direction;
      imageList.scrollBy({ left: scrollAmount, behavior: "smooth" });
    });
  });

  const handleSlideButtons = () => {
    slideButton[0].style.display = imageList.scrollLeft <= 0 ? "none" : "block";
    slideButton[1].style.display =
      imageList.scrollLeft >= maxScrollLeft ? "none" : "block";
  };

  imageList.addEventListener("scroll", () => {
    handleSlideButtons();
  });
};

window.addEventListener("load", initSlider);
