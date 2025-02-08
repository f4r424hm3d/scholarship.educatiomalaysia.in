<!-- Footer -->

<!-- All Js -->
<script src="{{ url('front/') }}/assets/js/jquery.min.js"></script>
<script src="{{ url('front/') }}/assets/js/popper.min.js"></script>
<script src="{{ url('front/') }}/assets/js/bootstrap.min.js"></script>
<script src="{{ url('front/') }}/assets/js/select2.min.js"></script>
<script src="{{ url('front/') }}/assets/js/slick.js"></script>
<script src="{{ url('front/') }}/assets/js/jquery.counterup.min.js"></script>
<script src="{{ url('front/') }}/assets/js/counterup.min.js"></script>
<script src="{{ url('front/') }}/assets/js/custom.js"></script>
<script>
  $('#side-menu').metisMenu();
</script>
<script src="{{ url('front/') }}/assets/js/metisMenu.min.js"></script>

<!-- Zoom -->
<link rel="preload" href="{{ url('front/') }}/assets/fancybox/jquery.fancybox.min.css" as="style"
  onload="this.onload=null;this.rel='stylesheet'">
<script src="{{ url('front/') }}/assets/fancybox/jquery.fancybox.min.js" defer></script>
<script>
  jQuery(document).ready(function($) {
    $(function() {
      $(".scrollTo a").click(function(e) {
        var destination = $(this).attr('href');
        $(".scrollTo li").removeClass('active');
        $(this).parent().addClass('active');
        $('html, body').animate({
          scrollTop: $(destination).offset().top - 90
        }, 500);
      });
    });
    var totalHeight = $('#myHeader').height() + $('.proHead').height();
    $(window).scroll(function() {
      if ($(this).scrollTop() > totalHeight) {
        $('.proHead').addClass('sticky');
      } else {
        $('.proHead').removeClass('sticky');
      }
    })
  });
</script>

<script>
  $(document).on('click', '#close-preview', function() {
    $('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
      function() {
        $('.image-preview').popover('show');
      },
      function() {
        $('.image-preview').popover('hide');
      }
    );
  });

  $(function() {
    // Create the close button
    var closebtn = $('<button/>', {
      type: "button",
      text: 'x',
      id: 'close-preview',
      style: 'font-size: initial;',
    });
    closebtn.attr("class", "close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
      trigger: 'manual',
      html: true,
      title: "<strong>Preview</strong>" + $(closebtn)[0].outerHTML,
      content: "There's no image",
      placement: 'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function() {
      $('.image-preview').attr("data-content", "").popover('hide');
      $('.image-preview-filename').val("");
      $('.image-preview-clear').hide();
      $('.image-preview-input input:file').val("");
      $(".image-preview-input-title").text("Browse");
    });
    // Create the preview image
    $(".image-preview-input input:file").change(function() {
      var img = $('<img/>', {
        id: 'dynamic',
        width: 250,
        height: 200
      });
      var file = this.files[0];
      var reader = new FileReader();
      // Set preview image into the popover data-content
      reader.onload = function(e) {
        $(".image-preview-input-title").text("Change");
        $(".image-preview-clear").show();
        $(".image-preview-filename").val(file.name);
        img.attr('src', e.target.result);
        $(".image-preview").attr("data-content", $(img)[0].outerHTML).popover("show");
      }
      reader.readAsDataURL(file);
    });
  });
</script>

<script>
  $("#upload").click(function() {
    $("#upload-file").trigger('click');
  });
</script>
<script>
  $(".show-more").click(function() {
    if ($(".text").hasClass("show-more-height")) {
      $(this).text("(Show Less)");
    } else {
      $(this).text("(Show More)");
    }
    $(".text").toggleClass("show-more-height");
  });
</script>

<div class="chat-popup" id="myForm">
  <div class="wa-container">
    <button type="button" class="cancel" onClick="closeForm()"><i class="ti-close"></i></button>
    <div class="whtsapp-header">
      <div class="row">
        <div class="col-2 pr0"><img data-src="https://www.educationmalaysia.in/front/assets/img/wa.png" alt="whatsapp"
            class="img-fluid"></div>
        <div class="col-10">
          <div class="title">Start a Conversation</div>
          <div class="text">Hi! Click one of our member below to chat on <strong>WhatsApp</strong>
          </div>
        </div>
      </div>
    </div>

    <div class="content">
      <span class="d-block font-size-13 mb-2">The team typically replies in a few minutes.</span>

      <a class="country-box" target="_blank"
        href="https://api.whatsapp.com/send?phone=601117784424&text=Hello there!! I want to get counseling from experts. Want to know more information about Study Abroad Consultants in India - Education Malaysia Education">
        <div class="row align-items-center">
          <div class="col-2 pr-0"><img data-src="https://www.educationmalaysia.in/front/assets/img/flag-malaysia.png"
              alt="indian flag" class="img-fluid"></div>
          <div class="col-8 pr0">
            <strong>Location: Malaysia</strong><br>
            Start Chat with a Counsellor
          </div>
          <div class="col-1 pr-0 text-right"><img data-src="https://www.educationmalaysia.in/front/assets/img/wad.png"
              alt="counsellor" width="20">
          </div>
        </div>
      </a>

    </div>

  </div>
</div>

<!-- Include jQuery and Slick Carousel libraries -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

<!-- Initialize Slick Carousel -->
<script>
  $(document).ready(function() {
    $(".multiple-items").slick({
      dots: true,
      infinite: true,
      speed: 500,
      slidesToShow: 4,
      slidesToScroll: 4,
      responsive: [{
          breakpoint: 1200, // For devices with a width <= 1024px
          settings: {
            slidesToShow: 3,
            slidesToScroll: 2,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 1024, // For devices with a width <= 1024px
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 768, // For devices with a width <= 600px
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 600, // For devices with a width <= 600px
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false
          }
        }
      ]
    });

    $(".secondheader").slick({
      dots: true,
      infinite: true,
      speed: 500,
      slidesToShow: 1, // Change based on your preference
      slidesToScroll: 2, // Change based on your preference
      responsive: [{
          breakpoint: 1024,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 2,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });

    $(".serviceitedms").slick({
      dots: true,
      infinite: true,
      speed: 500,
      arrows: true, // Enable arrows
      slidesToShow: 3,
      slidesToScroll: 2,
      responsive: [{
          breakpoint: 1200, // For devices with a width <= 1024px
          settings: {
            slidesToShow: 3,
            slidesToScroll: 2,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 1024, // For devices with a width <= 1024px
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 768, // For devices with a width <= 600px
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 600, // For devices with a width <= 600px
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });

  });
</script>

<!-- top slider mainheader  -->

<script>
  document.addEventListener("DOMContentLoaded", function() {
    var lazyImages = document.querySelectorAll('[data-src]');
    var observer = new IntersectionObserver(function(entries, observer) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          var lazyImage = entry.target;
          lazyImage.src = lazyImage.dataset.src;
          observer.unobserve(lazyImage);
        }
      });
    });
    lazyImages.forEach(function(lazyImage) {
      observer.observe(lazyImage);
    });
  });
</script>

<script>
  function openForm() {
    document.getElementById("myForm").style.display = "block";
  }

  function closeForm() {
    document.getElementById("myForm").style.display = "none";
  }
</script>
<!-- Whatsapp Box and Button -->

<!-- owl-carousel start  -->
<script>
  $(document).ready(function() {
    $(".owl-carousel").owlCarousel({
      responsiveBaseElement: $('body'),
      loop: true,
      margin: 10,
      responsiveClass: true,
      // autoHeight: true,
      autoplayTimeout: 4000,
      autoplay: true,
      smartSpeed: 800,
      nav: true,
      // dots: false,
      items: 2,
      responsive: {
        0: {
          items: 1
        },

        600: {
          items: 1
        },

        1000: {
          items: 2
        },

        1200: {
          items: 3
        }
      }


    });
  });
</script>

<!-- jQuery -->

<!-- Owl Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<!-- owl-carousel end  -->

</body>

</html>
