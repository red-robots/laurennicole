/**
 *	Custom jQuery Scripts
 *	
 *	Developed by: Austin Crane	
 *	Designed by: Austin Crane
 */
 jQuery(window).ready(function($) {
	$('.flexslider').flexslider({
		animation: "slide",
	});
});// END #####################################    END

 
jQuery(document).ready(function ($) {
	
		// Make active current page
	$("[href]").each(function() {
    if (this.href == window.location.href) {
        $(this).addClass("active");
        }
	});
	
	// $('.flexslider').flexslider({
	// 	animation: "slide",
	// });
	
	$('.termsbox').colorbox({
		width: '50%', 
		inline: true
	});
	
function setEqualHeight(selector) {
        var heights = new Array();

        $(selector).each(function() {

            $(this).css('min-height', '0');
            $(this).css('max-height', 'none');
            $(this).css('height', 'auto');

            heights.push($(this).height());
        });

        var max = Math.max.apply( Math, heights );
    $(selector).each(function() {
            $(this).css('height', max + 'px');
        }); 
    }


        setEqualHeight('.slides li');

        $(window).resize(function() {

            setTimeout(function() {
                setEqualHeight('.slides li');
            }, 120);
        });                                                                           
             
	
	
	
	
	
	$('.ajax').colorbox({
		width: "100%",
		height: "90%",
		onOpen: function(){
		  $('body').css({ overflow: 'hidden' });
		  $('html').css({ overflow: 'hidden' });
		},
		onClosed: function(){
		   $('body').css({ overflow: '' });
		   $('html').css({ overflow: '' });
		},
		onComplete:function(){
			$('.flexsliderport').flexslider({
				animation: "slide"
			});
		}});
		
	/*function fixFlexsliderHeight() {
    // Set fixed height based on the tallest slide
    $('.flexsliderport').each(function(){
        var sliderHeight = 0;
        $(this).find('.slides > li').each(function(){
            slideHeight = $(this).height();
            if (sliderHeight < slideHeight) {
                sliderHeight = slideHeight;
            }
        });
        $(this).find('ul.slides').css({'height' : sliderHeight});
    });
	}*/
		
		
		
  

	
	// Flexslider
	// front page slider 
	
	
	// Colorbox
	$('a.gallery').colorbox({
		rel:'gal',
		width: '100%', 
		height: '100%',
		current: true
	});
	
	
	
	
	
	

/*$(window).resize(function(){
    $.colorbox.resize({
      width: window.innerWidth > parseInt(cboxOptions.maxWidth) ? cboxOptions.maxWidth : cboxOptions.width,
      height: window.innerHeight > parseInt(cboxOptions.maxHeight) ? cboxOptions.maxHeight : cboxOptions.height
    });
});*/
	
	// Portfolio inline open
	/*$("a.inline").colorbox({
			inline:true, 
			width:"100%",
			height:"100%"
		});*/
		/*var $group = $('.inline').colorbox({inline:true, rel:'inline', href: function(){
            return $(this).children();
      }});
      $('#open').on('click', function(e){
            e.preventDefault();
            $group.eq(0).click();
      });*/
	
	//Isotope with images loaded ...
	var $container = $('#container').imagesLoaded( function() {
  	$container.isotope({
    // options

	 itemSelector: '.item',
		  masonry: {
			gutter: 10
			}
 		 });
	});
	
	// filter functions
  var filterFns = {
    // show if number is greater than 50
    numberGreaterThan50: function() {
      var number = $(this).find('.number').text();
      return parseInt( number, 10 ) > 50;
    },
    // show if name ends with -ium
    ium: function() {
      var name = $(this).find('.name').text();
      return name.match( /ium$/ );
    }
  };
  // bind filter button click
  $('#filters').on( 'click', 'button', function() {
    var filterValue = $( this ).attr('data-filter');
    // use filterFn if matches value
    filterValue = filterFns[ filterValue ] || filterValue;
    $container.isotope({ filter: filterValue });
  });
  // change is-checked class on buttons
  $('.button-group').each( function( i, buttonGroup ) {
    var $buttonGroup = $( buttonGroup );
    $buttonGroup.on( 'click', 'button', function() {
      $buttonGroup.find('.is-checked').removeClass('is-checked');
      $( this ).addClass('is-checked');
    });
  });
	
	
	// Equal heights divs
	$('.blocks').matchHeight();
	/*var byRow = $('body').hasClass('test-rows');
		$('.blocks-container').each(function() {
		 $(this).children('.blocks').matchHeight({
			   byRow: byRow
		//property: 'min-height'
		});
	});*/

});// END #####################################    END