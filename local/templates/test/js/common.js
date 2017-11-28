/*!
 * Moonkake v5.0.0
 *
 * https://github.com/detectiveshelby/moonkake
 */

$(function () {

  /* VAR
  -------------------------------------------------- */

  var $d = $(document);
  var $w = $(window);
  var $h = $('html');
  var $b = $('body');

  /* UTILS
  -------------------------------------------------- */

  var $mk = {
    scrollTo: function ($object, offset, callback) {
      $('html, body').stop().animate({
        scrollTop: $object.offset().top - ((typeof (offset) === 'number') ? offset : 0)
      }, 500, function () {
        if ($(this)[0].nodeName === 'HTML') {
          if (typeof (callback) == 'function') {
            callback();
          }
        }
      });
    },

    numberFormat: function (number, decimals, dec_point, thousands_sep) {
      // original by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
      // improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
      // bugfix by: Michael White (http://crestidg.com)
      var i, j, kw, kd, km;

      if (isNaN(decimals = Math.abs(decimals))) {
        decimals = 0;
      }
      if (dec_point == undefined) {
        dec_point = '.';
      }
      if (thousands_sep == undefined) {
        thousands_sep = ' ';
      }

      i = parseInt(number = (+number || 0).toFixed(decimals)) + '';

      if ((j = i.length) > 3) {
        j = j % 3;
      } else {
        j = 0;
      }

      km = j ?
        i.substr(0, j) + thousands_sep :
        '';
      kw = i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands_sep);
      kd = (decimals ?
        dec_point + Math.abs(number - i).toFixed(decimals).replace(/-/, '0').slice(2) :
        '');

      return km + kw + kd;
    },
  };

  /* SCROLL
  -------------------------------------------------- */

  $('.js-scroll').on('click', function () {
    var href = $(this).attr('href');

    $mk.scrollTo($(href), 0);

    return false;
  });

  /* POPUP
  -------------------------------------------------- */

  $('.js-popup').magnificPopup({
    type: 'inline',
    midClick: true,
    closeBtnInside: true,
    removalDelay: 300,
    mainClass: 'mfp-fade mfp-custom',
    fixedContentPos: false
  });

  $('.js-image').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    removalDelay: 300,
    mainClass: 'mfp-fade mfp-img-mobile mfp-custom',
    image: {
      verticalFit: true
    }
  });

  $('.js-gallery').magnificPopup({
    delegate: 'a',
    type: 'image',
    tLoading: 'Загрузка изображения #%curr%...',
    mainClass: 'mfp-fade mfp-img-mobile mfp-custom',
    removalDelay: 300,
    gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0, 1],
      tCounter: '<span class="mfp-counter">%curr% из %total%</span>'
    },
    image: {
      tError: '<a href="%url%">Изображение #%curr%</a> не может быть загружено.'
    }
  });

  /* TABS
  -------------------------------------------------- */

  var $tabs = {
    opts: {
      root: '.tabs:not(.tabs-nojs)',
      title: '.tabs-title',
      content: '.tabs-content',
      item: '.tabs-item',
      active: '-active'
    },

    changeTab: function ($root, index) {
      var opt = this.opts;

      $root.find(opt.title + ' ' + opt.item).eq(index).addClass(opt.active).siblings(opt.item).removeClass(opt.active);
      $root.find(opt.content + ' ' + opt.item).eq(index).addClass(opt.active).siblings(opt.item).removeClass(opt.active);

      $(document).trigger('tab_change', {
        root: $root,
        index: index
      });
    },

    init: function () {
      var $this = this;
      var opt = $this.opts;

      $(opt.title).on('click', opt.item, function () {
        var _ = $(this);
        var $root = _.closest(opt.root);
        var index = _.index();

        $this.changeTab($root, index);
      });
    }
  };

  $tabs.init();

  /* CAROUSEL
  -------------------------------------------------- */

  $('.carousel-hero').owlCarousel({
    items: 1,
    loop: true,
    margin: 0,
    nav: true,
    dots: true,
    autoplay: true,
    autoplayTimeout: 5000,
    animateOut: 'fadeOut',
    animateIn: 'fadeIn'
  });

  $('.carousel-tile').owlCarousel({
    items: 1,
    loop: true,
    margin: 0,
    nav: false,
    dots: true,
    autoplay: true,
    autoplayTimeout: 5000,
    animateOut: 'fadeOut',
    animateIn: 'fadeIn'
  });

  $('.carousel-inline').owlCarousel({
    items: 1,
    loop: true,
    margin: 0,
    nav: true,
    dots: true,
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    onInitialized: function(event) {
      if ($(event.target).data('fullscreen') == true) {
        var gallery = [];

        $(event.target).find('.owl-item:not(.cloned)').each(function() {
          var src = $(this).find('img').attr('data-full');

          gallery.push({src: src});
        });

        $(event.target).append('<a class="owl-popup" href="#"></a>');

        $(event.target).find('.owl-popup').on('click', function() {
          $.magnificPopup.open({
            items: gallery,
            type: 'image',
            tLoading: 'Загрузка изображения #%curr%...',
            mainClass: 'mfp-fade mfp-img-mobile',
            removalDelay: 300,
            gallery: {
              enabled: true,
              navigateByImgClick: true,
              preload: [0, 1],
              tCounter: '<span class="mfp-counter">%curr% из %total%</span>'
            },
            image: {
              tError: '<a href="%url%">Изображение #%curr%</a> не может быть загружено.'
            }
          });

          return false;
        });

      };
    },
    onChanged: function(event) {
      if ($('.carousel-inline-text').length) {
        var index = event.item.index;

        if (event.relatedTarget.options.loop) {
          index = event.item.index - (event.relatedTarget._clones.length / 2);

          if (index >= event.item.count) {
            index = 0;
          }
        }

        $('.carousel-inline-text').trigger('to.owl.carousel', index);
      }
    }
  });

  $('.carousel-inline-text').owlCarousel({
    items: 1,
    loop: true,
    margin: 0,
    nav: false,
    dots: false,
    mouseDrag: false,
    touchDrag: false,
    pullDrag: false,
    freeDrag: false,
    animateOut: 'fadeOut',
    animateIn: 'fadeIn'
  });

  $('.carousel-project').owlCarousel({
    items: 1,
    loop: true,
    margin: 0,
    nav: true,
    dots: true,
    animateOut: 'fadeOut',
    animateIn: 'fadeIn'
  });

  $('.carousel-flats').owlCarousel({
    items: 1,
    loop: true,
    margin: 29,
    nav: false,
    dots: true,
    responsive: {
      641: {
        items: 2
      },
      1025: {
        items: 3,
        dots: false
      }
    }
  });

  $('.carousel').on('mousemove mouseout', function(e) {
    var width = $(this).width();
    var x = e.pageX;
    var offsetX = $(this).offset().left;

    if (e.type == 'mousemove') {
      // prev
      if (x > offsetX && x < offsetX + width/2) {
        $(this).removeClass('owl-show-next').addClass('owl-show-prev');
      }

      // next
      if (x > offsetX + width/2 && x < offsetX + width) {
        $(this).removeClass('owl-show-prev').addClass('owl-show-next');
      }
    }

    if (e.type == 'mouseout') {
      $(this).removeClass('owl-show-next').removeClass('owl-show-prev');
    }
  });

  /* NAVIGATION
  -------------------------------------------------- */

  $('.menu-toggler').on('click', function() {
    var _ = $(this);
    var $aside = $('.aside');
    var $asideBody = $('.aside-body');
    var $asideFooter = $('.aside-footer');

    if ($b.hasClass('menu-opened')) {

      _.removeClass('-active');
      $asideBody.removeAttr('style').removeClass('-active');
      $b.removeClass('menu-opened');

    } else {

      _.addClass('-active');
      $asideBody
        .addClass('-active')
        .css({
          height: window.innerHeight - $aside.outerHeight(),
          paddingBottom: $asideFooter.outerHeight()
        });
      $b.addClass('menu-opened');

    }
  });

  /* STICK
  -------------------------------------------------- */

  function stickAside() {
    var $element = $('.aside-holder');

    if ($w.width() > 1024) {
      $element.stick_in_parent({
        parent: '.main',
        inner_scrolling: false,
        recalc_every: 1
      });
    } else {
      $element.trigger('sticky_kit:detach');
    }
  }

  $w.on('resize', stickAside);

  stickAside();

  /* DECORATION
  -------------------------------------------------- */

  $('.switcher').on('click', '.switcher-item', function() {
    var index = $(this).index();

    $(this).addClass('-active').siblings().removeClass('-active');

    $tabs.changeTab($('.tabs-switcher'), index);
  });

  /* COMMERCIAL
  -------------------------------------------------- */

  $d.on('click', '.accordion-commercial .button-control', function() {
    var index = $(this).index();

    $(this).addClass('-active').siblings().removeClass('-active');

    $tabs.changeTab($(this).closest('.accordion-body').find('.tabs-commercial'), index);

    return false;
  });

  /* FX
  -------------------------------------------------- */

  var $effect = {

    init: function() {
      var $this = this;

      $('.js-fx-button-slideup').each(function() {
        var text = $(this).html();

        $(this).attr('data-text', text);
      });

      $w.on('load resize', function() {
        $this.effect();
      });

    },

    effect: function() {
      $('.js-fx-button-slideup').each(function() {
        var text = $(this).attr('data-text');

        $(this).html(text);

        var heigth = $(this).height();

        $(this).html('<div style="height: '+ heigth +'px"><span>' + text + '</span><span>' + text + '</span></div>');
      });
    }

  };

  $effect.init();

  /* UI SLIDER
  -------------------------------------------------- */

  $('.form-slider').each(function() {
    var _ = $(this);
    var $slider = _.find('.form-slider-slider');
    var $input = _.find('input');

    var min = $slider.data('min');
    var max = $slider.data('max');
    var step = $slider.data('step');
    var value = $slider.data('value');
    var prefix = $slider.data('prefix') || '';

    var timer;

    $slider.slider({
      animate: 200,
      range: 'min',
      min: min,
      max: max,
      step: step,
      value: value,
      slide: function(event, ui) {
        $input.val(prefix + $mk.numberFormat(ui.value));

        // example
        $('.calculator-total-summ').text($mk.numberFormat(Math.random() * 10000000));
      }
    });

    $input.val(prefix + $mk.numberFormat(value));

    $input.on('keyup focusout', function(event) {
      var _ = $(this);
      var prefix = _.data('prefix') || '';
      var value = parseInt(_.val().replace(/[A-zА-я| ]/gim, ''));

      if (event.type == 'focusout') {
        if (value < min || value > max || value == '' || isNaN(value)) {
          value = min;
        }

        $slider.slider('value', value);
      }

      _.val(prefix + $mk.numberFormat(value));
    });

  });

  $('.form-ranger').each(function() {
    var _ = $(this);
    var $slider = _.find('.form-ranger-slider');
    var $inputFrom = _.find('input').eq(0);
    var $inputTo = _.find('input').eq(1);

    var min = $slider.data('min');
    var max = $slider.data('max');
    var step = $slider.data('step');
    var values = $slider.data('values').split(',');
    var prefix = $slider.data('prefix') || '';

    var timer;

    $slider.slider({
      animate: 200,
      range: true,
      min: min,
      max: max,
      step: step,
      values: values,
      slide: function(event, ui) {
        $inputFrom.val(prefix + $mk.numberFormat(ui.values[0]));
        $inputTo.val(prefix + $mk.numberFormat(ui.values[1]));
      }
    });

    $inputFrom.val(prefix + $mk.numberFormat(values[0]));
    $inputTo.val(prefix + $mk.numberFormat(values[1]));

    $inputFrom.on('keyup focusout', function(event) {
      var _ = $(this);
      var prefix = _.data('prefix') || '';
      var value = parseInt(_.val().replace(/[A-zА-я| ]/gim, ''));

      if (event.type == 'focusout') {
        if (value < min || value > $slider.slider('values', 1) || value == '' || isNaN(value)) {
          value = min;
        }

        $slider.slider('values', 0, value);
      }

      _.val(prefix + $mk.numberFormat(value));
    });

    $inputTo.on('keyup focusout', function(event) {
      var _ = $(this);
      var prefix = _.data('prefix') || '';
      var value = parseInt(_.val().replace(/ /gim, ''));

      if (event.type == 'focusout') {
        if (value < $slider.slider('values', 0) || value > max || value == '' || isNaN(value)) {
          value = max;
        }

        $slider.slider('values', 1, value);
      }

      _.val(prefix + $mk.numberFormat(value));
    });

  });

  /* ACCORDION
  -------------------------------------------------- */

  $d.on('click', '.accordion-title', function() {
    $(this).closest('.accordion-item').toggleClass('-active');
    $(this).closest('.accordion-item').find('.accordion-body').slideToggle(100, function () {
      $b.trigger('sticky_kit:recalc');
    });
  });

  /* INPUTMASK
  -------------------------------------------------- */

  $('input[type="tel"]').inputmask({
    mask: '+7 (999) 999-99-99'
  });

  /* CHESS TIP
  -------------------------------------------------- */

  $('.chess-number').on('mouseenter mouseout', function(event) {
    var $tip = $(this).next('.chess-tip');

    if (event.type === 'mouseenter') {
      var tipHeight = $tip.outerHeight() || 0;

      if ($d.scrollTop() > $(this).offset().top - tipHeight) {
        $tip.addClass('chess-tip-bottom');
      }
    }

    if (event.type === 'mouseout') {
      $tip.removeClass('chess-tip-bottom');
    }
  });

});
