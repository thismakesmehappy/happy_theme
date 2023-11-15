const secondaryNav = document.getElementById("secondary-nav");
const topHeader = document.getElementById("top-header");
const carousel = document.getElementById("carousel-slides");

const isItemInView = (element) => {
  const elementBottom = element.getBoundingClientRect().bottom;
  const elementTop = element.getBoundingClientRect().top;
  const windowSize = window.innerHeight;
  return elementBottom >= 0 && elementTop <= windowSize;
};
const displayScrollElement = (element) => {
  element.classList.add("scrolled");
};

const hideScrollElement = (element) => {
  element.classList.remove("scrolled");
};

const hideWhenTriggerInView = (triggerElement, animateElement) => {
  if (!isItemInView(topHeader)) {
    displayScrollElement(secondaryNav);
  } else {
    hideScrollElement(secondaryNav);
  }

  if (!isItemInView(carousel)) {
    $(".carousel").pause();
  } else {
    $(".carousel").cycle();
  }
};

const watchScroll = () => {
  window.addEventListener("scroll", () => {
    hideWhenTriggerInView(topHeader, secondaryNav, carousel);
  });
};

const verticalStacking = () => {
  const verticalStack = document.querySelectorAll(".stack-vertical a");
  verticalStack.forEach((item) => {
    const inner = item.innerHTML;
    const newInner = "<div>" + inner.split("").join("</br>") + "</div>";
    item.innerHTML = newInner;
  });
};
