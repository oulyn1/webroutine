
document.addEventListener('DOMContentLoaded', function() {
  var currentSlide = 0;
  var sliderImages = document.querySelectorAll('.slider-img img');
  var sliderNavLinks = document.querySelectorAll('.slider-nav-link');
  var intervalTime = 5000; // Thời gian chuyển slide (5 giây)

  // Hàm hiển thị slide
  function showSlide(index) {
    // Ẩn tất cả các hình ảnh
    for (var i = 0; i < sliderImages.length; i++) {
      sliderImages[i].style.display = 'none';
    }
    // Hiển thị slide được chọn
    sliderImages[index].style.display = 'block';

    // Đánh dấu liên kết điều hướng slide hiện tại
    for (var j = 0; j < sliderNavLinks.length; j++) {
      sliderNavLinks[j].classList.remove('active');
    }
    sliderNavLinks[index].classList.add('active');
  }

  // Hàm chuyển slide tự động
  function autoSlide() {
    currentSlide++;
    if (currentSlide >= sliderImages.length) {
      currentSlide = 0;
    }
    showSlide(currentSlide);
  }

  // Tự động chuyển slide sau một khoảng thời gian
  setInterval(autoSlide, intervalTime);

  // Xử lý sự kiện khi click vào các liên kết điều hướng
  sliderNavLinks.forEach(function(link, index) {
    link.addEventListener('click', function(e) {
      e.preventDefault();
      currentSlide = index;
      showSlide(currentSlide);
    });
  });

  // Hiển thị slide đầu tiên khi tải trang
  showSlide(currentSlide);
});
