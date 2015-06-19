/* ========================================================================
* DOM-based Routing
* Based on http://goo.gl/EUTi53 by Paul Irish
*
* Only fires on body classes that match. If a body class contains a dash,
* replace the dash with an underscore when adding it to the object below.
*
* .noConflict()
* The routing is enclosed within an anonymous function so that you can
* always reference jQuery with $, even when in .noConflict() mode.
*
* Google CDN, Latest jQuery
* To use the default WordPress version of jQuery, go to lib/config.php and
* remove or comment out: add_theme_support('jquery-cdn');
* ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Roots = {
    // All pages
    common: {
      init: function() {
        // JavaScript to be fired on all pages

        $('.nav-main').dropit({
          action: 'mouseenter',
          submenuEl: 'div.products',
          triggerParentEl: '.menu-products',
          triggerEl: 'a',
          beforeShow: function(){$('.products-trigger').addClass('is-on');},
          afterHide: function(){$('.products-trigger').removeClass('is-on');},
          afterShow: function(){$('.product-row .title').matchHeight(false);$('.product-row .title span').flexVerticalCenter();}

        });

        $(document).ready(function() {
          $('.products-trigger, #menu-primary-navigation li a, div.lang, #menu-primary-navigation-french0 li a').matchHeight(false);
          $('.products-trigger span').flexVerticalCenter({verticalOffset: -5});
        });

        $('a.menu-products, a.menu-spacer, a.menu-produits').click(function(e) {
          e.preventDefault();
        });
      }
    },
    // Home page
    home: {
      init: function() {
        // JavaScript to be fired on the home page
        $('.widget').matchHeight();
        // IE9 ruined this party.

        // enquire.register("screen and (max-width: 320px)", {
        //     match : function() {
        //         $('.products li .wrap').matchHeight();
        //     },
        //     unmatch : function() {
        //         $('.widget').matchHeight('remove');
        //         $('.products li .wrap').matchHeight('remove');
        //     }
        // });

        // enquire.register("screen and (min-width: 767px)", {
        //     match : function() {
        //         $('.widget').matchHeight();
        //         $('.products a.image').matchHeight(false);
        //         $('.product-listing li').matchHeight();
        //     },
        //     unmatch : function() {
        //         $('.widget').matchHeight('remove');
        //         $('.products li').matchHeight();
        //         $('.products li .wrap').matchHeight('remove');
        //     }
        // });

        $(document).ready(function() {
          // $('.products a.image').matchHeight(false);
          $('.product-listing .title').matchHeight(false);
          $('.product-listing li').matchHeight(false);
          // $('.product-listing li').matchHeight();
          $('.product-listing .title span').flexVerticalCenter();

        });



        $(window).load(function() {
          $('.widget .wrap').flexVerticalCenter();
        });
      }
    },
    about_us: {
      init: function() {
      }
    },

    page_template_page_partnership_php: {
      init: function() {

        function render() {
          $('.media-body, .pull-left').matchHeight();
          $('.media-body div').flexVerticalCenter();
          console.log('render');
        }

        function unrender() {
          $('.media-body, .pull-left').matchHeight('remove');
          $('.media-body div').flexVerticalCenter();
          console.log('render');
        }

        enquire.register("screen and (max-width: 768px)", {
          setup : function() { render(); },
          match : function() { render(); },
          unmatch : function() { render(); }
        });

        enquire.register("screen and (max-width: 480px)", {
          match : function() { render(); },
          unmatch : function() { render(); }
        });
        enquire.register("screen and (max-width: 992px)", {
          match : function() { unrender(); },
          unmatch : function() { render(); }
        });
        enquire.register("screen and (max-width: 1200px)", {
          match : function() { render(); },
          unmatch : function() { render(); }
        });
      }
    },
    page_template_page_lifestyle_php: {
      init: function() {


        function render() {
          $('.media-body, .pull-left').matchHeight();
          $('.media-body div').flexVerticalCenter();
          console.log('render');
        }

        function unrender() {
          $('.media-body, .pull-left').matchHeight('remove');
          $('.media-body div').flexVerticalCenter();
          console.log('render');
        }

        enquire.register("screen and (max-width: 768px)", {
          setup : function() { render(); },
          match : function() { render(); },
          unmatch : function() { render(); }
        });

        enquire.register("screen and (max-width: 480px)", {
          match : function() { render(); },
          unmatch : function() { render(); }
        });
        enquire.register("screen and (max-width: 992px)", {
          match : function() { unrender(); },
          unmatch : function() { render(); }
        });
        enquire.register("screen and (max-width: 1200px)", {
          match : function() { render(); },
          unmatch : function() { render(); }
        });
      }
    },

    post_type_archive: {
      init: function() {

        $('.products li .wrap').matchHeight();

        if ($('.product-listing').length) {

          $('.product-listing .about').matchHeight(false);
          enquire.register("screen and (max-width: 320px)", {
            match : function() {
              $('.products li .wrap').matchHeight();
            },
            unmatch : function() {
              $('.widget').matchHeight('remove');
              $('.products li .wrap').matchHeight('remove');
            }
          });
        }


      }
    },
    post_type_archive_recipe: {
      init: function() {

        $('ul.recipes .title').matchHeight(false);
        //$('ul.recipes .title span').matchHeight(false);
        // $('ul.recipes .title span').flexVerticalCenter();

        $(document).ready(function() {
          var $container = $('.display');

          function onLayout() {
            console.log('layout done');
          }

          $container.isotope({
            itemSelector: '.item',
            layoutMode: 'fitRows',
            transitionDuration: '.500s',
            position: 'relative',
          });

          $container.isotope( 'on', 'layoutComplete', onLayout );

          $('section.recipes .nav a').click(function(e) {
            var recipe_cat = $(this).attr('class');
            function align(category, callback) {
              if (category === 'item') {
                // $('ul.recipes .title').matchHeight(false);
                $('ul.recipes .title span').flexVerticalCenter();
              }
              callback();
            }

            $(this).parent('li').siblings().removeClass('active');
            $(this).parent('li').addClass('active');


            align(recipe_cat, function() {
              $container.isotope({ filter: '.' + recipe_cat });
              $('ul.recipes .'+recipe_cat+ ' .title span').flexVerticalCenter();
            });

            $('ul.recipes .title span').flexVerticalCenter();
            e.preventDefault();
          });
        });
      }
    },
    page_template_page_recipes: {
      init: function() {

        $('ul.recipes .title').matchHeight(false);
        //$('ul.recipes .title span').matchHeight(false);
        // $('ul.recipes .title span').flexVerticalCenter();

        $(document).ready(function() {
          var $container = $('.display');

          function onLayout() {
            console.log('layout done');
          }

          $container.isotope({
            itemSelector: '.item',
            layoutMode: 'fitRows',
            transitionDuration: '.500s',
            position: 'relative',
          });

          $container.isotope( 'on', 'layoutComplete', onLayout );

          $('section.recipes .nav a').click(function(e) {
            var recipe_cat = $(this).attr('class');
            function align(category, callback) {
              if (category === 'item') {
                // $('ul.recipes .title').matchHeight(false);
                $('ul.recipes .title span').flexVerticalCenter();
              }
              callback();
            }

            $(this).parent('li').siblings().removeClass('active');
            $(this).parent('li').addClass('active');


            align(recipe_cat, function() {
              $container.isotope({ filter: '.' + recipe_cat });
              $('ul.recipes .'+recipe_cat+ ' .title span').flexVerticalCenter();
            });

            $('ul.recipes .title span').flexVerticalCenter();
            e.preventDefault();
          });
        });
      }
    },
    single: {
      init: function() {

        $('.nutrition header').matchHeight(false);
      }
    },
    page_template_page_whychoose_php: {
      init: function() {

        function resize() {

          $('.reasons li header').matchHeight();
          $('.reasons li .reason').flexVerticalCenter();
          $('.text, .image-wrap').matchHeight();
          $('.reasons li').matchHeight(false);
        }

        function unResize() {
          $('.reasons li').matchHeight('remove');
          $('.reasons li header').matchHeight('remove');
          $('.text, .image-wrap').matchHeight('remove');
        }

        // enquire.register("screen and (min-width: 768px)", {
        //     match : function() {
        //         resize();
        //     },
        //     unmatch : function() { unResize(); }
        // });

        resize();

      }
    },
    single_recipe: {
      init: function() {

        $('div.image').stick_in_parent({offset_top: 25, parent: '.container.content'});
      }
    },
    page_template_page_newsletter_php: {
      init: function() {


      }
    }

  };



  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var namespace = Roots;
      funcname = (funcname === undefined) ? 'init' : funcname;
      if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      UTIL.fire('common');

      $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
        UTIL.fire(classnm);
      });
    }
  };

  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
