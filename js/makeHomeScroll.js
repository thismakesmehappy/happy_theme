const makeHomeScroll = () => {
  const menuHome = document.querySelectorAll(
    ".menu-item-home.current-menu-item a",
  );
  menuHome.forEach((link) => {
    link.setAttribute("href", "#top-top");
  });
};
