const scroll_to_target = () => {
  const currentUrl = window.location.href;
  const targetIndex = currentUrl.lastIndexOf("#");
  if (targetIndex > 0) {
    const target = currentUrl.substring(targetIndex);
    console.log(target);
    const element = document.getElementById(target);
    if (element != null) element.scrollIntoView();
  }
};

function sleep(milliseconds) {
  var start = new Date().getTime();
  for (var i = 0; i < 1e7; i++) {
    if (new Date().getTime() - start > milliseconds) {
      break;
    }
  }
}
