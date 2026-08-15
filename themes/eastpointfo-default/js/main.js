// Add your custom JS here.
(function ($) {
  // Navbar On Hover
  $('.navbar .dropdown').hover(function () {
    $(this).find('.dropdown-menu').first().stop(true, true).delay(250).slideDown();
  }, function () {
    $(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideUp();
  });

  $('.navbar .dropdown > a').click(function () {
    if ($(this).attr('href') != "#") {
      location.href = this.href;
    }
  });

  // Navigation Mobile Arrow
  $('#main-menu .menu-item-has-children > .nav-link, #top-line-menu .menu-item-has-children > .nav-link').after("<span class='m-subnav-arrow dropdown-toggle' data-toggle='dropdown' aria-expanded='false'></span>");
  $('.site-nav-container-screen').on('click', function () {
    $('.navbar-close-toggler').trigger('click');
  });

  // Side nav
  $('.side-nav .menu-item-has-children').append("<span class='m-subnav-arrows'></span>");

  $('.side-nav .m-subnav-arrows').click(function () {
    $(this).toggleClass('active');
    $(this).parent('.menu-item-has-children').toggleClass('active');
    $(this).parent('.menu-item-has-children').children('ul').toggleClass('active');
  });

  $('.sn-nav .menu-item-has-children > a').focus(function () {
    $(this).siblings('.m-subnav-arrows').trigger('click');
  });

  $('#main-menu .menu-item-has-children > a, .side-nav .menu-item-has-children > a').each(function () {
    var parentHref = $(this).attr('href');
    if (parentHref == "#" || !parentHref) {
      $(this).addClass('nonlink');
    }
  });

  // Bootstrap Carousel
  $('#carouselExampleIndicators').carousel({
    keyboard: true,
  });

  // Carousel Animation class
  $('#carouselExampleIndicators').on('slid.bs.carousel', function () {
    $(this).find('.carousel-item .carousel-content').removeClass('wow');
    $(this).find('.carousel-item.active .carousel-content').addClass('wow');
  });

  // Carousel ADA
  $('#carouselExampleIndicators a, #carouselExampleIndicators .carousel-indicators li').on('focus', function () {
    $('#carouselExampleIndicators').carousel('pause');
  });

  $('#carouselExampleIndicators .carousel-indicators li:first-of-type').on('focus', function () {
    $('#carouselExampleIndicators').carousel(0);
  });

  $('#carouselExampleIndicators .carousel-indicators li').keyup(function (e) {
    if (e.which === 13) { //13 is the char code for Enter
      $(this).click();
    }
  });

  $('.cwc-carousel .carousel-item:not(:last-child) .carousel-content a:last-of-type').on('blur', function () {
    $('#carouselExampleIndicators').carousel('next');
    setTimeout(function () {
      $('#carouselExampleIndicators .carousel-item.active a:first-of-type').focus();
    }, 100);
  });


  //Magnific Popup


  $('.lightbox-infographic,.lightbox').magnificPopup({
    type: 'image',
    removalDelay: 500, //Delaying the removal in order to fit in the animation of the popup
    mainClass: 'mfp-fade', //The actual animation
    overflowY: 'hidden',
    autoFocusLast: false,
    fixedContentPos: true,
    callbacks: {
      close: function () {
        $('html').removeClass('mfg-popup-open');
        $.each(this.items, function (index, value) {
          if (value.el) {
            $(value.el[0]).addClass('tse-remove-border');
          } else {
            $(value).removeClass('tse-remove-border');
          }
        });
      },
      open: function () {
        var self = this;
        $('.input-group-append.search-close').trigger('çlick');
        if ($(window).height() < $(document).height()) {
          $('html').addClass('mfg-popup-open');
        }
        self.wrap.on('click.pinhandler', 'img', function () {
          self.wrap.toggleClass('mfp-force-scrollbars');
        });
      },
      beforeClose: function () {
        this.wrap.off('click.pinhandler');
        this.wrap.removeClass('mfp-force-scrollbars');
      }
    },

    image: {
      verticalFit: false
    }
  });


  $(document).ready(function () {
    $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
      type: 'iframe',
      mainClass: 'mfp-fade',
      removalDelay: 500,
      preloader: false,
      overflowY: 'hidden',
      fixedContentPos: true,
      fixedBgPos: true,
      autoFocusLast: false,
      callbacks: {
        open: function () {
          $('.input-group-append.search-close').trigger('çlick');
          if ($(window).height() < $(document).height()) {
            $('html').addClass('mfg-popup-open');
          }
        },
        close: function () {
          $('html').removeClass('mfg-popup-open');
          $(this.items).each(function () {
            if ($(this.el)) {
              $(this.el).addClass('tse-remove-border');
            }
          });
        },
      },
      iframe: {
        patterns: {
          youtube: {
            index: 'youtube.com/', // String that detects type of video (in this case YouTube). Simply via url.indexOf(index).
            id: 'v=', // String that splits URL in a two parts, second part should be %id%
            // Or null - full URL will be returned
            // Or a function that should return %id%, for example:
            // id: function(url) { return 'parsed id'; }

            src: '//www.youtube.com/embed/%id%?autoplay=1&rel=0' // URL that will be set as a source for iframe.
          }
        },
        srcAction: 'iframe_src', // Templating object key. First part defines CSS selector, second attribute. "iframe_src" means: find "iframe" and set attribute "src".
      }
    });

    $('.popup-gallery').magnificPopup({
      type: 'image',
      mainClass: 'mfp-with-zoom',
      gallery: {
        enabled: true,
        preload: [0, 1],
      },

      zoom: {
        enabled: true,
        duration: 300, // duration of the effect, in milliseconds
        easing: 'ease-in-out', // CSS transition easing function

        opener: function (openerElement) {
          return openerElement.is('img') ? openerElement : openerElement.find('img');
        }
      },
      image: {
        titleSrc: function (item) {
          var markup = '';
          if (item.el[0].hasAttribute("data-title")) {
            markup += '<h3>' + item.el.attr('data-title') + '</h3>';
          }

          if (item.el[0].hasAttribute("data-description")) {
            markup += '<p>' + item.el.attr('data-description') + '</p>';
          }
          return markup
        }
      },
      callbacks: {
        open: function () {
          $('.input-group-append.search-close').trigger('çlick');
          if ($(window).height() < $(document).height()) {
            $('html').addClass('mfg-popup-open');
          }
        },
        close: function () {
          $('html').removeClass('mfg-popup-open');
        },
      },

    });

    $('.popup-inline').magnificPopup({
      type: 'inline',
      midClick: true,

      callbacks: {
        open: function () {
          $('.input-group-append.search-close').trigger('çlick');
          if ($(window).height() < $(document).height()) {
            $('html').addClass('mfg-popup-open');
          }
        },
        close: function () {
          $('html').removeClass('mfg-popup-open');
          $(this.items).each(function () {
            if ($(this.el)) {
              $(this.el).addClass('tse-remove-border');
            }
          });
        },
      },
    });
  });

  // Module Equal Height
  $(window).on('load resize orientationchange', function () {
    setTimeout(function () {
      var lcrilmHeight = $('.left-content-right-icon-title-listing-module .lcrilm-content-wrap').outerHeight();
      $('.lcrilm-item-link').outerHeight(lcrilmHeight / 2);
    }, 500);
  });

  // Animation on Scroll
  var wow = new WOW(
    {
      boxClass: 'wow',      // animated element css class (default is wow)
      animateClass: 'animated', // animation css class (default is animated)
      offset: 0,          // distance to the element when triggering the animation (default is 0)
      mobile: true,       // trigger animations on mobile devices (default is true)
      live: true,       // act on asynchronously loaded content (default is true)
      callback: function (box) {
        // the callback is fired every time an animation is started
        // the argument that is passed in is the DOM node being animated
      },
      scrollContainer: null // optional scroll container selector, otherwise use window
    });
  wow.init();

  // Show Search on icon click
  $('[data-toggle=search-form]').click(function (e) {
    e.preventDefault();
    $('.search-module').toggleClass('open');
    $('.search-module .search').focus();
    $('html').toggleClass('search-form-open');
    $('.search-module input, .search-module button, .search-module .search-close').attr('tabindex', '0');
  });

  $('[data-toggle=search-form-close]').click(function () {
    $('.search-module').removeClass('open');
    $('html').removeClass('search-form-open');
  });

  $('.search-module .search').keypress(function (event) {
    if ($(this).val() == "Search") $(this).val("");
  });

  $('.search-close').click(function (event) {
    event.preventDefault();
    $('.search-module').removeClass('open');
    $('html').removeClass('search-form-open');
    $('.search-module input, .search-module button .search-module .search-close').attr('tabindex', '-1');
  });



  //Smooth Scroll - Detects a #hash on-page link and will smooth scroll to that position. Will not affect regular links.
  $('.smooth-scroll, .smooth-scroll > a').click(function () {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      var smoothtop = 0;
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      var header_height = $('.sh-sticky-wrap').height();
      var pillar_nav_height = $('.pillarpage-linklist-module').outerHeight();
      var wWidth = $(window).width();
      if (wWidth > 767) {
        smoothtop = pillar_nav_height ? (header_height + pillar_nav_height) : header_height;
      }
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top - smoothtop
        }, 1000);
        return false;
      }
    }
  });

  // Hero Slider
  $(document).on('ready', function () {
    $('.si-slider').slick({
      dots: true,
      infinite: false,
      arrows: false,
      fade: true,
      slidesToShow: 1,
      autoplay: true,
      accessibility: true,
    });
    $('.wg-slider-item').slick({
      slidesToShow: 4,
      infinite: true,
      slidesToScroll: 1,
      dots: false,
      rtl: false,
      arrows: true,
      prevArrow: '<span class="slick-prev-wrap"><a class="slick-prev" href="javascript:void(0)" aria-label="Previous"><img src="/wp-content/uploads/prevn.svg" alt="Previous" title="Previous"></a></span>',
      nextArrow: '<span class="slick-next-wrap"><a class="slick-next" href="javascript:void(0)" aria-label="Next"><img src="/wp-content/uploads/nextn.svg" alt="Next" title="Next"></a></span>',
      autoplay: false,
      variableWidth: true,
      accessibility: true,
      responsive: [
        {
          breakpoint: 640,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          }
        },
        {
          breakpoint: 400,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });
    $('.inner-wg_slider_item').each(function () { // iterate over unordered list placed inside '.my_gallery' div
      $(this).magnificPopup({
        delegate: '.lightbox2', // the select all except hidden ones
        type: 'image',
        removalDelay: 1000,
        gallery: {
          enabled: true
        },
        close: function () {
          $(this).removeClass('tse-remove-border');
          $('html').removeClass('mfg-popup-open');
          $.each(this.items, function (index, value) {
            if (value.el) {
              $(value.el[0]).addClass('tse-remove-border');
            } else {
              $(value).removeClass('tse-remove-border');
            }
          });
        }
      });

    });

    $('.si-slider .slick-slide:not(:last-child) .si-content a:last-of-type').blur(function () {
      $('.si-slider .slick-next').trigger('click');
      setTimeout(function () {
        $('.si-slider .slick-current').find('a').focus();
      }, 500);
    });

    $('.si-slider .slick-dots li button').on('click contextmenu drag auxclick', function () {
      $('a, button, input').removeClass('tse-remove-border');
      $(this).addClass('tse-remove-border');
    }).on('blur', function () {
      $(this).removeClass('tse-remove-border');
    });

    // Gallery Section Slider (Tablet & Mobile peek carousel)
    if ($(window).width() < 768) {
      $('[data-gallery-slider]').each(function () {
        if (!$(this).hasClass('slick-initialized')) {
          $(this).slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            variableWidth: true,
            dots: false,
            infinite: true,
            centerMode: false,
            responsive: [
              {
                breakpoint: 768,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 1,
                  arrows: false,
                }
              },
              {
                breakpoint: 480,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 1,
                  arrows: false,
                }
              }
            ]
          });
        }
      });
    }
  });

  // Smooth scroll on load
  if (window.location.hash) {
    var hash = window.location.hash;
    $('html, body').animate({
      scrollTop: $(hash).offset().top
    }, 1500);
  }


  //Slide in CTA
  var findEl = $('#slidebox').length;
  if (findEl <= 0) {
    // do nothing
  } else {
    var slidebox = $('#slidebox');
    if (slidebox) {
      $(window).scroll(function () {
        var distanceTop = $('#last').offset().top - $(window).height();
        if ($(window).scrollTop() > distanceTop)
          slidebox.animate({
            'right': '0px'
          }, 300);
        else
          slidebox.stop(true).animate({
            'right': '-430px'
          }, 100);
      });
      $('#slidebox .close').on('click', function () {
        $(this).parent().remove();
      });
    }
  }

  // Scroll to top
  $(window).bind("scroll", function () {
    if ($(this).scrollTop() > 520) {
      $("#toTop").fadeIn();
    } else {
      $("#toTop").stop().fadeOut();
    }
  });

  $('#toTop').on('click', function (e) {
    e.preventDefault();
    $('html, body').animate({
      scrollTop: 0
    }, 1000);
  });

  //Sticky Nav
  if (!("ontouchstart" in document.documentElement)) {
    document.documentElement.className += " no-touch";
  }

  if (!$('body').hasClass('page-template-navigations-template')) {
    $(window).on('load orientationchange resize', function () {
      var wWidth = $(window).width();
      if (wWidth > 991) {
        var findEl = $('.sh-sticky-wrap').length;
        if (findEl <= 0) {
          // do nothing
        } else {


          //Set the height of the sticky container to the height of the nav
          //var navheight = $('.sub-nav-container').height();
          // grab the initial top offset of the navigation 
          var sticky_navigation_offset_top = $('.sh-sticky-wrap').offset().top;
          var header_height = $('.sh-sticky-wrap').outerHeight();
          // our function that decides weather the navigation bar should have "fixed" css position or not.
          var sticky_navigation = function () {
            var scroll_top = $(window).scrollTop(); // our current vertical position from the top
            // if we've scrolled more than the navigation, change its position to fixed to stick to top,
            // otherwise change it back to relative
            if (scroll_top > sticky_navigation_offset_top) {
              $('.sh-sticky-wrap').addClass('stuck');
              $('body').css('padding-top', header_height + 'px');
              $('body').addClass('hide-langtran');
              //$('.sh-sticky-inner-wrap').css('height', '187px');
            } else if (scroll_top <= sticky_navigation_offset_top) {
              $('.sh-sticky-wrap').removeClass('stuck');
              $('body').css('padding-top', '0');
              $('body').removeClass('hide-langtran');
              // $('.site-header').css('height', 'auto');
            }
          };
          // run our function on load
          sticky_navigation();
          // and run it again every time you scroll
          $(window).scroll(function () {
            sticky_navigation();
          });

        }
      }
    });
  }

  $('.pillar-nav a').on('click', function () {
    $('.pillar-nav a').removeClass('pillar-active');
    $(this).addClass('pillar-active');

  });

  if ($('section').hasClass('pillarpage-linklist-module')) {
    var pillar_navigation_offset_top = $('.pillarpage-linklist-module').offset().top;
    var pillar_nav_height = $('.pillarpage-linklist-module').outerHeight() + 35;
    var header_height = $('.sh-sticky-wrap').outerHeight();

    // Cache selectors
    var lastId,
      topMenu = $(".pillarpage-linklist-module"),
      topMenuHeight = topMenu.outerHeight() + 15,
      // All list items
      menuItems = topMenu.find("a"),
      // Anchors corresponding to menu items
      scrollItems = menuItems.map(function () {
        var item = $($(this).attr("href"));
        if (item.length) { return item; }
      });

    var pillar_sticky_navigation = function () {
      var scroll_top = $(window).scrollTop();

      if (scroll_top > pillar_navigation_offset_top) {
        $('.pillarpage-linklist-module').addClass('stuck').css('top', header_height + 'px');
        $('.additional-content').css('padding-top', pillar_nav_height + 'px');
      } else if (scroll_top <= pillar_navigation_offset_top) {
        $('.pillarpage-linklist-module').removeClass('stuck');
        $('.additional-content').css('padding-top', '0');
      }

      // Get container scroll position
      var fromTop = $(this).scrollTop() + (topMenuHeight + header_height);

      // Get id of current scroll item
      var cur = scrollItems.map(function () {
        if ($(this).offset().top < fromTop)
          return this;
      });
      // Get the id of the current element
      cur = cur[cur.length - 1];
      var id = cur && cur.length ? cur[0].id : "";

      if (lastId !== id) {
        lastId = id;
        // Set/remove active class
        menuItems
          .parent().removeClass("pillar-active")
          .end().filter("[href='#" + id + "']").parent().addClass("pillar-active");
      }
    };

    // run our function on load
    pillar_sticky_navigation();
    // and run it again every time you scroll
    $(window).scroll(function () {
      pillar_sticky_navigation();
    });
  }



  $(document).ready(function () {
    $('.hsm-wapp').slick({
      arrows: true,
      dots: false,
      slidesToShow: 3,
      slidesToScroll: 1,
      infinite: true,
      responsive: [
        {
          breakpoint: 960,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 640,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });

    $('.hsm-wapp .slick-slide.slick-active:not(:last-of-type) a:last-of-type').blur(function () {
      $('.slick-next').trigger('click');
    });

    $(".hsm-wapp .slick-prev").insertBefore(".hsm-wapp .slick-next");
    $(".hsm-wapp .slick-prev, .hsm-wapp .slick-next").wrapAll('<div class="hsm-arrow-wrap"></div>');
  });

  /*============== Focus on tab (ADA)=============*/
  $(document).on('keyup keydown', function (e) {
    var code = e.keyCode || e.which;
    if (code == '9') {

      $('#main-menu .menu-item-has-children > a, #top-line-menu .menu-item-has-children > a').focus(function () {
        console.log('show');
        $(this).parent('.menu-item-has-children').children('.dropdown-menu').show();
      });

      $('#main-menu .menu-item-has-children > .dropdown-menu li:last-of-type > a, #top-line-menu .menu-item-has-children > .dropdown-menu li:last-of-type > a').blur(function () {

        if (!$(this).parent().children().hasClass('dropdown-menu') && $(this).parent().is(':last-child')) {
          $(this).parent().parent('.dropdown-menu').hide();
          if ($(this).parent('li').parent('.dropdown-menu').parent('li').next().length <= 0) {
            $(this).parent('li').parent('.dropdown-menu').parent('li').parent('.dropdown-menu').hide();
          }

          if ($(this).parent().next().length <= 0 && $(this).parent('li').parent('.dropdown-menu').parent('li').next().length <= 0 && $(this).parent('li').parent('.dropdown-menu').hasClass('sn-level-3')) {
            $('.dropdown-menu').hide();
          }
        }

      });

      if (code == '9' && e.shiftKey) {
        if ($(document.activeElement).parent().hasClass('menu-item-has-children')) {
          $(document.activeElement).parent().children('.dropdown-menu').hide();
        }
        $('#main-menu .menu-item-has-children > .dropdown-menu li:last-of-type a, #top-line-menu .menu-item-has-children > .dropdown-menu li:last-of-type a').blur(function () {
          $(this).closest('.dropdown-menu').show();
        });

      }

      $(document).click(function (e) {
        if (!$(e.target).is('#main-menu .menu-item-has-children a')) {
          $('#main-menu .dropdown-menu').hide();
        }

        if (!$(e.target).is('#top-line-menu .menu-item-has-children a')) {
          $('#top-line-menu .dropdown-menu').hide();
        }

        if (!$(e.target).is('a') || !$(e.target).is('button') || !$(e.target).is('input') || !$(e.target).is('[tabindex="0"]')) {

          $('a, button, input, [tabindex="0"]').removeClass('tse-remove-border');
        }

        if (!$(e.target).is('[data-toggle="tab"]')) {
          $('[data-toggle="tab"]').attr('tabindex', "0")
        }
      });
    }
  });

  // Modal
  $('[data-toggle="modal"]').on('keyup', function (e) {
    if (e.which === 13) { //13 is the char code for Enter
      $(this).click();
    }
  });

  $('[data-dismiss="modal"]').on('click', function (e) {
    setTimeout(function () {
      $('[data-toggle="modal"]').addClass('tse-remove-border');
    }, 10);
  });

  $('.modal').on('click', function (e) {
    e.stopPropagation();
    setTimeout(function () {
      $('[data-toggle="modal"]').addClass('tse-remove-border');
    }, 10);
  });




  $(document).ready(function () {
    $("#skipToContent").on('click', function (e) {
      $('body').toggleClass('changeCursor');
      e.stopPropagation();
      e.preventDefault();
      $('.site-header').after('<a href="javascript:void(0)" tabindex="-1" id="siteContentFocusable"></a>');
      $(this).blur();
      if (window.location.pathname == '/') {
        $('html, body').animate({
          scrollTop: $("#siteContentFocusable").offset().top
        }, 1000);
      } else {
        $('html, body').animate({
          scrollTop: 0
        }, 1000);
      }
      $('#siteContentFocusable').trigger('focus');
    });

    $('body').on('click contextmenu drag auxclick', 'a, button, input, select', function () {
      $('a, button, input, select, [tabindex="0"]').removeClass('tse-remove-border');
      $(this).addClass('tse-remove-border');
    }).on('blur', function (e) {
      $(this).removeClass('tse-remove-border');
      if (e.which == 2) {
        $(this).addClass('tse-remove-border');
      }
    });

    $('[tabindex="0"]').on('click contextmenu drag auxclick', function () {
      $('a, button, input, select, [tabindex="0"]').removeClass('tse-remove-border');
      $(this).addClass('tse-remove-border');
    }).on('blur', function (e) {
      $(this).removeClass('tse-remove-border');
      if (e.which == 2) {
        $(this).addClass('tse-remove-border');
      }
    });

    $('select, button, input').on('mousemove', function (event) {
      //$('a, button, input, select').removeClass('tse-remove-border');
      $(this).addClass('tse-remove-border');
    });

    $("a[href*='tel'], [href*='mailto']").on('click contextmenu drag auxclick', function () {
      $('a, button, input').removeClass('tse-remove-border');
      $(this).addClass('tse-remove-border');
    }).on('blur', function () {
      $(this).addClass('tse-remove-border');
    });

    $("a:not([href*='tel']), a:not([href*='mailto'])").on('blur', function () {
      $("[href*='mailto'], [href*='tel']").removeClass('tse-remove-border');
    });

    $('button').on('click contextmenu drag auxclick', '.slick-arrow', function () {
      $('a, button, input, select, [tabindex="0"]').removeClass('tse-remove-border');
      $(this).addClass('tse-remove-border');
    }).on('blur', function (e) {
      $(this).removeClass('tse-remove-border');
      if (e.which == 2) {
        $(this).addClass('tse-remove-border');
      }
    });

  });

  $(window).on('load', function () {
    setTimeout(function () {
      $('.slick-slide.slick-cloned *[tabindex="0"], .slick-slide.slick-cloned a').attr('tabindex', '-1');
    }, 1000);
  });

  $(window).on('blur', function () {
    $(document.activeElement).addClass('tse-remove-border');
  });
  $('a, button, input, .ce-header, .tab-link').mouseover(function () {
    $(this).addClass('tse-remove-border');
  }).on('blur', function (e) {
    $(this).removeClass('tse-remove-border');
    if (e.which == 2) {
      $(this).addClass('tse-remove-border');
    }
  });

  $(document).ready(function () {
    $('a[href$=".pdf"]').attr('rel', 'noopener noreferrer');
  });

  // Bootstrap Tabs ADA
  $('.bootstrap-tabs .bt-nav-item a:not(.active)').attr('tabindex', '-1');

  $('.bootstrap-tabs .tab-pane:not(:last-child) .bt-tab-body a:last-of-type').on('blur', function () {
    $('.bootstrap-tabs .bt-nav-item a.active').parent().next().find('a').trigger('click');
    setTimeout(function () {
      $('.bootstrap-tabs .bt-nav-item a:not(.active)').attr('tabindex', '-1');
    }, 300);

    $('.bootstrap-tabs .bt-nav-item a.active').attr('tabindex', '0').focus();
  });

  //   // Bootstrap Tabs ADA pillarpage
  // $('.ppgm-wrap .ppgm-item a:not(.active)').attr('tabindex', '-1');

  // $('.bootstrap-tabs .tab-pane:not(:last-child) .bt-tab-body a:last-of-type').on('blur', function() {
  //   $('.bootstrap-tabs .bt-nav-item a.active').parent().next().find('a').trigger('click');
  //   setTimeout(function() {
  //     $('.bootstrap-tabs .bt-nav-item a:not(.active)').attr('tabindex', '-1');
  //   }, 300);

  //   $('.bootstrap-tabs .bt-nav-item a.active').attr('tabindex', '0').focus();
  // });

  // Industries We Serve Module
  $('.industries-we-serve-module .nav-pills-custom a:not(.active)').attr('tabindex', '-1');

  $('.industries-we-serve-module .tab-pane:not(:last-child) div[role="tabpanel"] a:last-of-type').on('blur', function () {
    $('.industries-we-serve-module .nav-pills-custom a.active').next('.nav-link').trigger('click');
    setTimeout(function () {
      $('.industries-we-serve-module .nav-pills-custom a:not(.active)').attr('tabindex', '-1');
    }, 300);

    $('.industries-we-serve-module .nav-pills-custom a.active').attr('tabindex', '0').focus();
  });

  //destination page slider    
  $(document).ready(function () {

    $('.slider-for').each(function (key, item) {

      var sliderIdName = 'slider' + key;
      var sliderNavIdName = 'sliderNav' + key;

      this.id = sliderIdName;
      $('.slider-nav')[key].id = sliderNavIdName;

      var sliderId = '#' + sliderIdName;
      var sliderNavId = '#' + sliderNavIdName;

      $(sliderId).slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: sliderNavId
      });

      $(sliderNavId).slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: sliderId,
        prevArrow: '<span class="slick-prev-wrap"><a class="slick-prev" href="javascript:void(0)" aria-label="Previous">Prev</a></span>',
        nextArrow: '<span class="slick-next-wrap"><a class="slick-next" href="javascript:void(0)" aria-label="Next"><i class="fa fa-angle-right" aria-hidden="true"></i></a></span>',
        dots: false,
        focusOnSelect: true,
        accessibility: true,
        responsive: [
          {
            breakpoint: 640,
            settings: {
              slidesToShow: 3
            }
          },
        ]
      });

    });


  });

  // Accordion Tabs
  $(document).ready(function () {
    $('.accordion-tabs').each(function (index) {
      $(this).children('li').first().children('a').addClass('is-active').next().addClass('is-open').show();
    });
    $('.accordion-tabs').on('click focus', 'li > a.tab-link', function (event) {
      if (!$(this).hasClass('is-active')) {
        event.preventDefault();
        var accordionTabs = $(this).closest('.accordion-tabs');
        accordionTabs.find('.is-open').removeClass('is-open').hide();

        $(this).next().toggleClass('is-open').toggle();
        accordionTabs.find('.is-active').removeClass('is-active');
        $(this).addClass('is-active');
      } else {
        event.preventDefault();
      }
    });
  });

  // Industries We Serve Accordion
  $(document).on('click', '[data-accordion] [data-accordion-trigger]', function () {
    var $item = $(this).closest('.industries-we-serve__accordion-item');
    var $content = $item.find('[data-accordion-content]');
    var $icon = $(this).find('.industries-we-serve__accordion-icon svg');

    if ($item.is('[data-open]')) {
      $item.removeAttr('data-open');
      $content.removeAttr('data-open');
      $icon.css('transform', 'rotate(0deg)');
    } else {
      $item.siblings('[data-open]').removeAttr('data-open');
      $item.siblings().find('[data-accordion-content]').removeAttr('data-open');
      $item.siblings().find('.industries-we-serve__accordion-icon svg').css('transform', 'rotate(0deg)');

      $item.attr('data-open', '');
      $content.attr('data-open', '');
      $icon.css('transform', 'rotate(45deg)');
    }
  });

  // FAQ Accordion
  $(document).on('click', '.faq-section__accordion [data-accordion-trigges]', function () {
    var $item = $(this).closest('.faq-section__accordion-item');
    var $content = $item.find('.faq-section__accordion-content');
    var $icon = $(this).find('.faq-section__accordion-icon svg');

    if ($item.is('[data-opens]')) {
      $item.removeAttr('data-opens');
      $content.removeAttr('data-opens');
      $icon.css('transform', 'rotate(0deg)');
    } else {
      $item.siblings('[data-opens]').removeAttr('data-opens');
      $item.siblings().find('[data-accordion-content]').removeAttr('data-opens');
      $item.siblings().find('.faq-section__accordion-icon svg').css('transform', 'rotate(0deg)');

      $item.attr('data-opens', '');
      $content.attr('data-opens', '');
      $icon.css('transform', 'rotate(45deg)');
    }
  });

  // FAQ Section New Accordion (2-column layout)
  $(document).on('click', '[data-faq-accordion] [data-faq-accordion-trigger]', function () {
    var $item = $(this).closest('.faq-section-new__accordion-item');
    var $content = $item.find('[data-faq-accordion-content]');
    var $header = $(this);

    if ($item.is('[data-opens]')) {
      // Close
      $item.removeAttr('data-opens');
      $content.removeAttr('data-opens');
      $header.attr('aria-expanded', 'false');
      $item.removeClass('is-open');
    } else {
      // Close siblings
      $item.siblings('[data-opens]').each(function () {
        $(this).removeAttr('data-opens');
        $(this).find('[data-faq-accordion-content]').removeAttr('data-opens');
        $(this).find('[data-faq-accordion-trigger]').attr('aria-expanded', 'false');
        $(this).removeClass('is-open');
      });

      // Open clicked
      $item.attr('data-opens', '');
      $content.attr('data-opens', '');
      $header.attr('aria-expanded', 'true');
      $item.addClass('is-open');
    }
  });

  // Industries Section Accordion (with image sync on PC)
  $(document).on('click', '.industries-section__accordion [data-accordion-trigger]', function () {
    var $item = $(this).closest('.industries-section__accordion-item');
    var $accordion = $item.closest('.industries-section__accordion');
    var $content = $item.find('.industries-section__accordion-content');
    var $icon = $item.find('.industries-section__accordion-icon svg');
    var index = $item.data('index');

    if ($item.is('[data-open]')) {
      // Close current item
      $item.removeAttr('data-open');
      $content.removeAttr('data-open').css({
        'max-height': '0',
        'opacity': '0',
        'visibility': 'hidden'
      });
      $icon.css('transform', 'rotate(0deg)');
    } else {
      // Close all accordion items
      $accordion.find('[data-open]').removeAttr('data-open');
      $accordion.find('[data-accordion-content]').removeAttr('data-open').css({
        'max-height': '0',
        'opacity': '0',
        'visibility': 'hidden'
      });
      $accordion.find('.industries-section__accordion-icon svg').css('transform', 'rotate(0deg)');

      // Open clicked item
      $item.attr('data-open', '');
      $content.attr('data-open', '').css({
        'max-height': '200px',
        'opacity': '1',
        'visibility': 'visible'
      });
      $icon.css('transform', 'rotate(45deg)');

      // Sync image on desktop
      if (window.innerWidth >= 992) {
        var $imagesContainer = $accordion.siblings('.industries-section__images');
        if ($imagesContainer.length) {
          $imagesContainer.find('.industries-section__image-wrapper').removeClass('is-active');
          $imagesContainer.find('[data-index="' + index + '"]').addClass('is-active');
        }
      }
    }
  });

  // Initialize first image on page load for Industries Section
  $(document).ready(function () {
    $('.industries-section').each(function () {
      var $imagesContainer = $(this).find('.industries-section__images');
      var $firstItem = $(this).find('.industries-section__accordion-item[data-open]');
      if ($imagesContainer.length && $firstItem.length) {
        var index = $firstItem.data('index');
        $imagesContainer.find('.industries-section__image-wrapper').removeClass('is-active');
        $imagesContainer.find('[data-index="' + index + '"]').addClass('is-active');
      }
    });
  });

  // Mobile Menu Toggle & Scroll Behavior
  jQuery(document).ready(function ($) {
    var $header = $('#header-new');
    var $toggle = $('#header-new-mobile-toggle');
    var $mobileMenu = $('#header-new-mobile-menu');
    var scrollThreshold = 50; // pixels before header becomes scrolled state
    var isScrolled = false;

    // Debounce helper for scroll events
    function debounce(func, wait) {
      var timeout;
      return function() {
        var context = this, args = arguments;
        clearTimeout(timeout);
        timeout = setTimeout(function() {
          func.apply(context, args);
        }, wait);
      };
    }

    // Mobile menu toggle
    $toggle.on('click', function (e) {
      e.preventDefault();
      e.stopPropagation();
      $(this).toggleClass('is-active');
      $mobileMenu.toggleClass('is-active');
      $('body').toggleClass('header-mobile-open');
    });

    // Close mobile menu on outside click
    $(document).on('click', function (e) {
      if (!$(e.target).closest('#header-new').length && $mobileMenu.hasClass('is-active')) {
        $toggle.removeClass('is-active');
        $mobileMenu.removeClass('is-active');
        $('body').removeClass('header-mobile-open');
      }
    });

    // Close mobile menu on escape key
    $(document).on('keydown', function (e) {
      if (e.key === 'Escape' && $mobileMenu.hasClass('is-active')) {
        $toggle.removeClass('is-active');
        $mobileMenu.removeClass('is-active');
        $('body').removeClass('header-mobile-open');
      }
    });

    // Header scroll behavior - add/remove is-scrolled class with debounce
    function updateHeaderOnScroll() {
      var shouldBeScrolled = $(window).scrollTop() > scrollThreshold;

      // Only toggle class when state changes (avoid unnecessary DOM updates)
      if (shouldBeScrolled !== isScrolled) {
        isScrolled = shouldBeScrolled;
        if (isScrolled) {
          $header.addClass('is-scrolled');
        } else {
          $header.removeClass('is-scrolled');
        }
      }
    }

    // Throttled scroll handler - 16ms ≈ 60fps
    var scrollTicking = false;
    $(window).on('scroll', function() {
      if (!scrollTicking) {
        window.requestAnimationFrame(function() {
          updateHeaderOnScroll();
          scrollTicking = false;
        });
        scrollTicking = true;
      }
    });

    // Check on page load (in case user refreshes mid-page)
    updateHeaderOnScroll();

    // Language dropdown toggle
    $(document).on('click', '#header-new-lang-btn, .header-new__lang-chevron', function (e) {
      e.preventDefault();
      e.stopPropagation();

      var $btn = $('#header-new-lang-btn');
      var $dropdown = $('#header-new-lang-dropdown');
      var isExpanded = $btn.attr('aria-expanded') === 'true';

      // Close all other dropdowns
      $('.header-new__lang-dropdown').removeClass('is-active');
      $('.header-new__lang-btn').attr('aria-expanded', 'false');

      // Toggle current dropdown
      if (!isExpanded) {
        $dropdown.addClass('is-active');
        $btn.attr('aria-expanded', 'true');
      }
    });

    // Search popup toggle
    $(document).on('click', '#header-new-search-btn', function (e) {
      e.preventDefault();

      var $popup = $('#header-new-search-popup');
      var $btn = $(this);

      $popup.addClass('is-active');
      $btn.attr('aria-expanded', 'true');
      $('body').css('overflow', 'hidden');

      // Focus on input after popup opens
      setTimeout(function() {
        $('#header-new-search-popup .header-new__search-popup-input').focus();
      }, 100);
    });

    // Close search popup
    $(document).on('click', '#header-new-search-close, #header-new-search-overlay', function (e) {
      e.preventDefault();

      var $popup = $('#header-new-search-popup');
      var $btn = $('#header-new-search-btn');

      $popup.removeClass('is-active');
      $btn.attr('aria-expanded', 'false');
      $('body').css('overflow', '');
    });

    // Close search popup on Escape key
    $(document).on('keydown', function (e) {
      if (e.key === 'Escape') {
        var $popup = $('#header-new-search-popup');

        if ($popup.hasClass('is-active')) {
          $popup.removeClass('is-active');
          $('#header-new-search-btn').attr('aria-expanded', 'false');
          $('body').css('overflow', '');
        }
      }
    });

    // Close dropdowns and popups when clicking outside
    $(document).on('click', function (e) {
      if (!$(e.target).closest('.header-new__lang-wrapper').length) {
        $('.header-new__lang-dropdown').removeClass('is-active');
        $('.header-new__lang-btn').attr('aria-expanded', 'false');
      }

      if (!$(e.target).closest('#header-new-search-popup').length &&
          !$(e.target).closest('#header-new-search-btn').length) {
        $('#header-new-search-popup').removeClass('is-active');
        $('#header-new-search-btn').attr('aria-expanded', 'false');
        $('body').css('overflow', '');
      }
    });

    // Mobile submenu toggle
    $(document).on('click', '.header-new__mobile-submenu-toggle', function (e) {
      e.preventDefault();
      e.stopPropagation();

      var $toggle = $(this);
      var $submenu = $toggle.closest('.header-new__mobile-menu-item').find('.header-new__mobile-submenu');

      $toggle.toggleClass('is-open');
      $submenu.toggleClass('is-open');
    });

    // Prevent link navigation when clicking toggle button
    $(document).on('click', '.header-new__mobile-submenu-toggle a', function (e) {
      e.stopPropagation();
    });
  });


  jQuery(document).ready(function ($) {
    // Footer EPF Mobile Accordion
    $(document).on('click', '[data-footer-accordion-trigger]', function () {
      var $trigger = $(this);
      var $content = $trigger.closest('[data-footer-accordion-content]').find('[data-footer-accordion-panel]');
      var isExpanded = $trigger.attr('aria-expanded') === 'true';

      if (isExpanded) {
        // Close
        $trigger.attr('aria-expanded', 'false');
        $content.slideUp(300);
      } else {
        // Open
        $trigger.attr('aria-expanded', 'true');
        $content.slideDown(300);
      }
    });
  });

  // Click to Expand Module
  $('.click-expand-module .card-header').on('click', function () {
    $('.click-expand-module .card-header i').removeClass('fa-minus').addClass('fa-plus');
    $('.click-expand-module .card-header .material-icons').text('add');

    if ($(this).hasClass('collapsed')) {
      $(this).children('i').removeClass('fa-plus').addClass('fa-minus');
      $(this).children('.material-icons').text('remove');
    } else {
      $(this).children('i').removeClass('fa-minus').addClass('fa-plus');
      $(this).children('.material-icons').text('add');
    }
  });


  //Buckets Hover/Focus
  $(document).ready(function () {

    // Market Serve Carousel
    $('.hero-interactive-1-mobile-carousel').slick({
      dots: true,
      infinite: true,
      speed: 500,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      arrows: false,
      prevArrow: '<a class="slick-prev" href="javascript:void(0)" aria-label="Previous"></a>',
      nextArrow: '<a class="slick-next" href="javascript:void(0)" aria-label="Next"></a>',
      accessibility: true,
      pauseOnFocus: true,
      rows: 0,
    });

    var height = 0;
    $('.hero-interactive-1-mobile-carousel .slick-slide').each(function () {
      height = Math.max(height, $(this).find(".hi1m-slide").outerHeight());
    }).find('.hi1m-slide').css('min-height', height);

    // Market Serve Module
    $(document).on('mouseenter', '.hi1m-item', function (event) {
      $('.hi1m-item').removeClass('hi1m-item-hovered').addClass('hi1m-item-normal');
      $(this).addClass('hi1m-item-hovered').removeClass('hi1m-item-normal');
    });

    $(document).on('focus', '.hi1m-item', function (event) {
      $('.hi1m-item').removeClass('hi1m-item-hovered').addClass('hi1m-item-normal');
      $(this).addClass('hi1m-item-hovered').removeClass('hi1m-item-normal');
    });

    $(window).on('load orientationchange resize', function () {
      var wWidth = $(window).width();
      if (wWidth < 1100) {
        if (!$('.hi2m-carousel').hasClass('slick-initialized')) {
          $('.hi2m-carousel').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            mobileFirst: true,
            arrows: true,
            dots: true,
            infinite: true,
            accessibility: true,
            pauseOnFocus: true,
            responsive: [
              {
                breakpoint: 1100,
                settings: 'unslick'
              }
            ]
          });
        }

        $('.hi2m-carousel').on("afterChange", function (event, slick, currentSlide, nextSlide) {
          $('.hi2m-wrapper').hide();
          $('.hi2m-slider-hover-content').css('opacity', 1);
          $('.hi2m-slide').css('background-size', 'cover');
        });

      } else {
        $('.hi2m-slide-title').on("mouseenter focus ontouchstart", function (e) {
          console.log('test');
          $('.hi2m-slide').removeClass('active-slide');
          var type = e.type;
          var dataImgSrc = $(this).parent('.hi2m-slide').attr('data-imgsrc');
          $(this).parent('.hi2m-slide').addClass('active-slide');
          $('.hi2m-carousel').css('background-image', 'url(' + dataImgSrc + ')');
        });

        if ($('.hi2m-carousel').hasClass('slick-initialized')) {
          setTimeout(function () {
            $('.hi2m-carousel').slick('unslick');
            location.reload();
          }, 100);
        }
      }
    });

    var index = parseInt(Math.ceil(($('.hi2m-slide').length / 2) - 1));
    $(window).on('load', function () {
      if ($('.hi2m-carousel').hasClass('slick-initialized')) {
        $('.hi2m-carousel').slick('slickGoTo', index, true);
        $('.hi2m-wrapper').show();
        $('.hi2m-slide').css('background-size', '0 0');
        $('.hi2m-slider-hover-content').css('opacity', 0);
      }
    });
    $(window).on('load', function () {
      $('.hts-slider').slick({
        arrows: false,
        fade: true,
        autoplay: false,
        dots: true,
        speed: 800,
        customPaging: function (slider, i) {
          var thumb = $(slider.$slides[i]).find('.slider-nav');
          return thumb;
        }
      });
    });
    $(window).on('load', function () {
      $('.tm-carousel').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        mobileFirst: true,
        arrows: true,
        dots: true,
        infinite: true,
        accessibility: true,
        pauseOnFocus: true,
      });
    });
    $('.tcm-carousel').slick({
      centerMode: true,
      centerPadding: '15px',
      slidesToShow: 3,
      arrows: false,
      dots: true,
      responsive: [
        {
          breakpoint: 992,
          settings: {
            arrows: false,
            centerMode: true,
            centerPadding: '80px',
            slidesToShow: 1
          }
        },
        {
          breakpoint: 639,
          settings: {
            arrows: false,
            centerMode: true,
            centerPadding: '10px',
            slidesToShow: 1
          }
        }
      ]
    });
  });
  $(window).on('load', function () {
    $('.cbs-slider').slick({
      arrows: true,
      dots: true,
      slidesToShow: 5,
      slidesToScroll: 1,
      infinite: true,
      responsive: [
        {
          breakpoint: 960,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 400,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });
  });

  $(document).ready(function () {
    $('.parent-pageid-1552 #breadcrumbs span span span a').removeAttr('href');
  });

  $(document).ready(function () {
    $('.htm-slide-wrap:first-child').addClass('active');
    $('.htm-list > li:first-child > a').addClass('active');
    $('.htm-bg-col > div:first-child').addClass('active');
    $('.htm-list > li > a').on('click', function () {
      $('.htm-slide-wrap').removeClass('active');
      $('.htm-list > li > a').removeClass('active');
      $(this).addClass('active');
      var target = $(this).data('d');
      $('#' + target).addClass('active');
    });
    $('.htm-bg-col > div').hover(function () {
      $('.htm-bg-col > div').removeClass('active')
      $(this).addClass('active');

    })
  });
  $(document).ready(function () {
    $('[data-wpr-lazyrender="1"]').removeAttr('data-wpr-lazyrender');
  });

}(jQuery));

// jQuery(window).on('load', function() {
//   if (jQuery( 'html:lang(fr)')) {
//     setTimeout(function() {
//         jQuery('.sh-ph .material-icons font').text("call");
//         jQuery('.sh-search .material-icons font').text("search");
//       }, 1000);
//   }
// });

jQuery('.switcher .option a').on('click', function () {
  var language = jQuery(this).attr('title');
  //console.log(language);
  if (language === 'French') {
    setTimeout(function () {
      jQuery('.sh-ph .material-icons font').text("call");
      jQuery('.sh-search .material-icons font').text("search");
    }, 800);
  }
});

jQuery(document).ready(function () {
  if (jQuery('html:lang(fr)')) {
    setTimeout(function () {
      jQuery('.sh-ph .material-icons font').text("call");
      jQuery('.sh-search .material-icons font').text("search");
    }, 1500);
  }
});


//Pillar page
jQuery(document).ready(function () {
  jQuery(function () {
    var findE2 = jQuery('.anchor-links-nav_new').length;
    if (findE2 > 0) {
      //Set the height of the sticky container to the height of the nav
      //var navheight = $('.site-nav-container').height();
      // grab the initial top offset of the navigation 
      var sticky_navigation_offset_top2 = jQuery('.anchor-links-nav_new').offset().top - 50;
      var header_height = jQuery('.sh-sticky-wrap').outerHeight();
      var pillar_nav_height = jQuery('.anchor-links-nav_new').outerHeight();

      // our function that decides weather the navigation bar should have "fixed" css position or not.
      var sticky_navigation2 = function () {
        var scroll_top2 = jQuery(window).scrollTop(); // our current vertical position from the top
        console.log(scroll_top2, sticky_navigation_offset_top2);
        var wWidth = jQuery(window).width();
        if (wWidth > 991) {
          // if we've scrolled more than the navigation, change its position to fixed to stick to top,
          // otherwise change it back to relative
          if (scroll_top2 >= sticky_navigation_offset_top2) {
            jQuery('.anchor-links-nav_new').addClass('stuck');
            jQuery('.additional-content').css('padding-top', pillar_nav_height + 'px');
            //$('.sh-sticky-wrap').addClass('stuck').css('height',navheight);
          } else {
            jQuery('.anchor-links-nav_new').removeClass('stuck');
            jQuery('.additional-content').css('padding-top', '0');
          }
        };
      };

      // run our function on load
      sticky_navigation2();

      // and run it again every time you scroll
      jQuery(window).scroll(function () {
        sticky_navigation2();
      });
    }
  });
});

// jQuery(window).scroll(function() {
//   var scrollDistance = jQuery(window).scrollTop();
//   // Assign active class to nav links while scolling
//   jQuery('.page-inner-anchor').each(function(i) {
//      //console.log($(this).position().top);
//       // if (jQuery(this).position().top - 200 <= scrollDistance) {
//           jQuery('.anchor-links-wrap_new li.active').removeClass('active');
//           jQuery('.anchor-links-wrap_new li').eq(i).addClass('active');
//       // }
//   });
// }).scroll();

//Smooth Scroll - Detects a #hash on-page link and will smooth scroll to that position. Will not affect regular links.
// jQuery(function() {
//   jQuery('.smooth-scroll-pillar').click(function() {
//     var top_anchor = (jQuery('.sh-sticky-wrap').height()) + (jQuery('.anchor-links-nav_new ').height());
//     jQuery(".smooth-scroll-pillar").removeClass('tse-remove-border');
//     jQuery(this).addClass('tse-remove-border');

//     if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
//       var target = jQuery(this.hash);

//       target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');

//       if (target.length) {
//         jQuery('html, body').animate({
//           scrollTop: target.offset().top - top_anchor
//         }, 1000);
//         return false;
//       }
//     }
//   });
// });
jQuery('.smooth-scroll-pillar').click(function () {
  if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
    var target = jQuery(this.hash);
    var smoothtop = 0;
    target = target.length ? target : jQuery('[name=' + this.hash.slice(1) + ']');
    var header_height = jQuery('.sh-sticky-wrap').height();
    var pillar_nav_height = jQuery('.anchor-links-nav_new').outerHeight();
    var wWidth = jQuery(window).width();
    if (wWidth > 991) {
      smoothtop = pillar_nav_height ? (header_height + pillar_nav_height) : header_height;
    }
    if (target.length) {
      jQuery('html, body').animate({
        scrollTop: target.offset().top - smoothtop
      }, 1000);
      return false;
    }
  }
});
// Smooth scroll on load
if (window.location.hash) {
  var hash = window.location.hash;
  jQuery('html, body').animate({
    scrollTop: jQuery(hash).offset().top
  }, 1500);
}


jQuery(document).ready(function () {
  jQuery('.hpm-link').first('.hpm-anch-link').addClass('active');
  jQuery('.hpm-item').first().addClass('active');
  jQuery('.hpm-img').first().addClass('active');

  jQuery('.hpm-link .hpm-anch-link').on('mouseover focus', function () {
    jQuery('.hpm-item').removeClass('active');
    jQuery('.hpm-img').removeClass('active');
    jQuery('.hpm-link .hpm-anch-link').removeClass('active');
    jQuery(this).addClass('active');
    var target = jQuery(this).attr('id');
    var hover_target = jQuery('.hpm-img-wrap').find('.' + target).addClass('active');
    var hover_target_new = jQuery('.hpm-content').find('.' + target).addClass('active');

  });
});

jQuery(document).ready(function () {
  jQuery('.hsm-link').first('.hsm-anch-link').addClass('active');
  jQuery('.hsm-item').first().addClass('active');

  jQuery('.hsm1').addClass('active');
  jQuery('.hsm-img').first().addClass('active');

  jQuery('.hsm-link .hsm-anch-link').on('mouseover focus', function () {
    jQuery('.hsm-item').removeClass('active');
    jQuery('.hsm-img').removeClass('active');
    jQuery('.hsm-link .hsm-anch-link').removeClass('active');
    jQuery(this).addClass('active');
    var target = jQuery(this).attr('id');
    var hover_target = jQuery('.hsm-img-wrap').find('.' + target).addClass('active');
    var hover_target_new = jQuery('.hsm-content').find('.' + target).addClass('active');

  });
});

jQuery(window).on('load', function () {
  jQuery(".label-captcha-inline .gfield_label").append('<span class="gfield_required"><span class="gfield_required gfield_required_asterisk">*</span></span>');

  // AOS
  AOS.init();
});

// $(window).on('load', function () {
//   $('..osm-logo-slider').on('afterChange', function (event, slick, currentSlide) {
//     $('.slick-slide').removeAttr('aria-hidden');
//   });
// });

/* ============================================
   HEADER NEW - Homepage JavaScript
   Mô tả: JavaScript cho header navigation mới
   Bao gồm: Mobile menu + Scroll behavior (is-scrolled class)
   ============================================ */

/* ============================================
   TESTIMONIAL VIDEO SECTION
   Mô tả: JavaScript cho video play button
   ============================================ */
// $(document).on('click', '[data-play-video]', function () {
//   var $wrapper = $(this).closest('.testimonial-video-section__video-wrapper');
//   var $video = $wrapper.find('video');

//   if ($video.length) {
//     $video[0].play();
//     $(this).hide();
//     $video.on('pause ended', function () {
//       $wrapper.find('[data-play-video]').show();
//     });
//   }
// });
var swiper = new Swiper('.mySwiper', {
  spaceBetween: 30,
  loop: true,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
});