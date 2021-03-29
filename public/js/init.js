document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, {});
  });

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.slider');
    var instances = M.Slider.init(elems, {});
  });


function getSlider() {
    var elems = document.querySelectorAll('.slider');
    return M.Slider.getInstance(elems[0]);
}

function sliderPrev() {
    var elems = document.querySelectorAll('.slider');
    var instance = getSlider();
    instance.prev();
    instance.pause();
}

function sliderNext() {
    var elems = document.querySelectorAll('.slider');
    var instance = getSlider();
    instance.next();
    instance.pause();
}