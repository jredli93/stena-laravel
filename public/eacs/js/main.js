// ===== Scroll to Top ====
const scrollBtn = document.querySelector('.scroll-to-top');

const buttonVisibility = () => {
    if (document.documentElement.scrollTop <= 250) {
      scrollBtn.style.display = 'none';
    } else {
      scrollBtn.style.display = 'block';
    }
}

buttonVisibility();

scrollBtn.addEventListener('click', () => {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
})

document.addEventListener('scroll', () => {
    buttonVisibility();
})






// progress bar
$(window).on('scroll', function () {
  const docHeight = $(document).height();
  const winHeight = $(window).height();

  let viewport = docHeight - winHeight;
  let positionY = $(window).scrollTop();

  let indicator = (positionY / viewport) * 100;

  $('.scroll_bar').css('width', indicator + '%');
});
