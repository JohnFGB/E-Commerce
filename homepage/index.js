let menu = document.querySelector('.menu-icon');
let navbar = document.querySelector('.navbar');

menu.onclick = () => {
  navbar.classList.toggle('open-menu');
  menu.classList.toggle('move');
};
window.onscroll = () => {
  navbar.classList.remove('open-menu');
  menu.classList.remove('move');
};

let header = document.querySelector('header');

window.addEventListener('scroll', () => {
  header.classList.toggle('header-active', window.scrollY > 100);
});

const collage = [...document.querySelectorAll('.collage-img')];

collage.map((item, i) => {
  item.addEventListener('mouseover', () => {
    collage.map((image, index) => {
      if (index != i) {
        image.style.filter = 'blur(10px)';
        item.style.zIndex = 2;
      }
    });
  });
  item.addEventListener('mouseleave', () => {
    collage.map((image, index) => {
      image.style = null;
    });
  });
});

function success() {
  swal({
    title: 'Message sent sucessfully!',
    text: 'We try to reply 2x24 Hours',
    icon: 'success',
    button: 'success!',
  });
}
