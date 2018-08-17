jQuery(function($){
    $('.main-navigation ul').slicknav({
		'label' : '<i class="fa fa-bars"></i>',
		'prependTo': '.main-navigation'
	});

	jQuery('.load_more a').live('click', function(e){
			  e.preventDefault();
			  var link = jQuery(this).attr('href');
			  jQuery('.load_more').html('<span class="loader">Loading More Posts...</span>');
			  $.get(link, function(data) {
				  var post = $("#main .post ", data);
				  $('#main').append(post);
			  });
			  jQuery('.load_more').load(link+' .load_more a');
		  });
});
