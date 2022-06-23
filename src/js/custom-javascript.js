// Add your custom JS here.

jQuery(function($){

	$('body').scrollspy({ target: '#tableContents' });

	// Client Carousel
	$('.clients').slick({
		slidesToShow: 3,
		autoplay: true,
		speed: 1000,
		autoplaySpeed: 2000,
		infinite: true,
		slidesToScroll: 1,
		dots: false,
		arrows: false,
		variableWidth: true
	});

	// Roulette
	$('.roulette').slick({
		slidesToShow: 3,
		autoplay: true,
		autoplaySpeed: 1500,
		speed: 500,
		infinite: true,
		slidesToScroll: 1,
		vertical: true,
		centerMode: true,
		dots: false,
		arrows: false,
		responsive: [
    	{
    	  breakpoint: 576,
    	  settings: {
    	    slidesToShow: 1,
    	    slidesToScroll: 1
    	  }
    	}
    	]
	});

  $(".search-button").click(function(){
    $('#searchbox').toggle();
  });

});


// Steps


document.addEventListener("DOMContentLoaded", () => {
  const tabs = document.getElementsByName('tab');
  const titles = document.getElementsByName('circle-title');
  if(tabs){
    tabs.forEach((tab, i) => {
      tab.addEventListener('click', () => {
        changeTabsHistory(tab);
      });
    });
  }
  if(titles){
    titles.forEach((title, i) => {
      title.addEventListener('click', () => {
        const tab = document.querySelector('button[data-position="'+title.dataset.position+'"]');
        changeTabsHistory(tab);
      });
    });
  }
});

function changeTabsHistory(tab){
    if(!tab.classList.contains('circle__number--active')) {
        const old = document.getElementsByClassName('circle__number--active')[0];
        old.classList.remove('circle__number--active');
        let oldPosition = old.dataset.position;
        let newPosition = tab.dataset.position;
        tab.classList.add('circle__number--active');
        document.getElementById('tab-'+oldPosition).classList.add('hidden');
        document.getElementById('tab-'+newPosition).classList.remove('hidden');
    }
}



// Blog Filter
jQuery(function($){
  $('.filterfield').change(function(){
    var filter = $('#blogfilter');
    $.ajax({
      url:filter.attr('action'),
      data: {
        action: 'opennorth_filter'
      }, // form data
      type:filter.attr('method'), // POST
      success:function(data){
        $('#response').html(data); // insert data
      }
    });
    return false;
  });
});