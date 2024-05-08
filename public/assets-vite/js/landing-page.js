const header = document.getElementById('header'); // Get Header Element
const navbar = document.getElementById('main-navbar'); // Get Navbar Element
const barButton = document.getElementById('bar-button'); // Get Button of Navbar Element

if (barButton) {
    barButton.addEventListener('click', () => {
        navbar.classList.toggle('rounded-50px');
        navbar.classList.toggle('rounded-15px');
    });
}

const handleScroll = () => {
    const scrollTop = window.scrollY || window.pageYOffset;
    if (scrollTop > 150) {
        navbar.classList.remove('bg-white');
        navbar.classList.add('bg-white-blur');
    } else {
        navbar.classList.add('bg-white');
        navbar.classList.remove('bg-white-blur');
    }
    // console.log(scrollTop)
}

const currentPath = window.location.pathname;
if (currentPath?.split('/')[2] !== 'paket') {
    window.addEventListener('scroll', handleScroll);
}

const flyerSwipper = {
    className: 'flyer',
    spaceBetween: 15,
    pagination: {},
    objSlide: {},
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
}

const gallerySwipper = {
    className: 'gallery',
    spaceBetween: 15,
    pagination: {},
    objSlide: {
        slidesPerView: 1,
        breakpoints: {
            640: {
                slidesPerView: 1,
            },
            1024: {
                slidesPerView: 3,
            },
        },
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
}

const testimoniSwipper = {
    className: 'testimoni',
    spaceBetween: 15,
    pagination: {},
    objSlide: {
        slidesPerView: 1,
        breakpoints: {
            640: {
                slidesPerView: 1,
            },
            1024: {
                slidesPerView: 2,
            },
        },
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
}

const renderSwipper = (_swiper) => {
    const swiper = new Swiper(`.${_swiper?.className}`, {
      // Optional parameters
      direction: "horizontal",
      //  loop: true,
      //  autoplay: true,
      cursor: "grab",
      spaceBetween: _swiper?.spaceBetween,
      grabCursor: true,

      slidesPerView: _swiper?.objSlide?.slidesPerView ?? 1,
      breakpoints: _swiper?.objSlide?.breakpoints ?? null,
      // If we need pagination
      pagination: _swiper?.pagination ?? {
        el: ".swiper-pagination",
        clickable: true,
      },

      // Navigation arrows
      navigation: _swiper?.navigation ?? {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
};

renderSwipper(flyerSwipper);
renderSwipper(gallerySwipper);
renderSwipper(testimoniSwipper);

const flyers = document.querySelectorAll('.flyers');
const btnDownload = document.getElementById('btnDownload');

if (btnDownload) {
    btnDownload.addEventListener('click', () => {
        flyers.forEach(flyer => {
            flyer.click();
        });
    });
}
