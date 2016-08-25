new WOW().init();
            
$("a[rel^='prettyPhoto']").prettyPhoto({
	opacity:'0.95',
	slideshow:'5000',
	theme:'facebook'
});

var slider = new MasterSlider();
slider.setup('of-home' , {
        width:1170,
        height:500,
        space:5,
        fullwidth:true,
        autoplay:true,
        view:"scale",
        loop:true,
        // more slider options goes here...
    });
slider.control('arrows'); // here we've added arrow control to the slider.
slider.control('bullets' , {autohide:false  , dir:"h", align:"top"});
//slider.control('circletimer' , {color:"#479a1b" , stroke:20});

var owl = $("#owl-demo");
owl.owlCarousel({
    slideSpeed : 300,
    singleItem:true
});
// Custom Navigation Events
$(".next").click(function(){
    owl.trigger('owl.next');
})
$(".prev").click(function(){
    owl.trigger('owl.prev');
})

$('a[href="#search"]').on('click', function(event) {
    event.preventDefault();
    $('#search').addClass('open');
    $('#search > form > input[type="search"]').focus();
});

$('#search, #search button.close').on('click keyup', function(event) {
    if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
        $(this).removeClass('open');
    }
});

$(window).load(function() { // makes sure the whole site is loaded
	$('#loading-center').fadeOut(); // will first fade out the loading animation
   $('#loading').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
	$('body').delay(350).css({'overflow':'visible'});
})

/*Item Details Slider*/
var slider2 = new MasterSlider();
slider2.setup('of-item' , {
        width:750,    // slider standard width
        height:500,   // slider standard height
        space:5,
        loop:true,
        // more slider options goes here...
        // check slider options section in documentation for more options.
    });
slider2.control('arrows'); // here we've added arrow control to the slider.
slider2.control('thumblist' , {arrows:true, autohide:false, dir:"h", arrows:true});