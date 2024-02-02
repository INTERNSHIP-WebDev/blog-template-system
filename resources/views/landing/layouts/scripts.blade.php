

<script src="{{ asset('landing_assets/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('landing_assets/styles/bootstrap4/popper.js') }}"></script>
<script src="{{ asset('landing_assets/styles/bootstrap4/bootstrap.min.js') }}"></script>
<script src="{{ asset('landing_assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
<script src="{{ asset('landing_assets/plugins/jquery.mb.YTPlayer-3.1.12/jquery.mb.YTPlayer.js') }}"></script>
<script src="{{ asset('landing_assets/plugins/easing/easing.js') }}"></script>
<script src="{{ asset('landing_assets/plugins/masonry/masonry.js') }}"></script>
<script src="{{ asset('landing_assets/plugins/masonry/images_loaded.js') }}"></script>
<script src="{{ asset('landing_assets/js/custom.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rellax/1.12.1/rellax.min.js"></script>
<script>
  $(document).ready(function() {
    // Initially hide the lessless_button
    $("#lessless_button").hide();
	$("#moremore").hide();

    // When moremore_button is clicked
    $("#moremore_button").click(function() {
      $(this).hide();
	  $("#moremore").show();
      $("#lessless_button").show();
    });

    // When lessless_button is clicked
    $("#lessless_button").click(function() {
      $(this).hide();
	  $("#moremore").hide();
      $("#moremore_button").show();
    });
  });
</script>
<script>
	$(document).ready(function() {
		let page = 1; // Initial page number

		// Function to load more data
		function loadMoreData(page) {
			$.ajax({
				url: '/get-latest-templates?page=' + page,
				method: 'GET',
				dataType: 'json',
				success: function(data) {
					if (data.data.length > 0) {
						// Append new data to the container
						// (Assuming you have a container with the id 'latest-templates-container')
						$('#latest-templates-container').append(data.data);
					} else {
						// No more data
						$('#load-more-btn').hide();
					}
				},
				error: function() {
					console.log('Error loading data.');
				}
			});
		}

		// Initial load
		loadMoreData(page);

		// Load more button click event
		$('#load-more-btn').on('click', function() {
			page++;
			loadMoreData(page);
		});
	});
	$(document).ready(function(){
		$(document).on('click', '.pagination a', function(event){
			event.preventDefault();
			var page = $(this).attr('href').split('page=')[1];
			more_data_tempo(page);
		});

		function more_data_tempo(page)
		{
			$.ajax({
				url:"/pagination/more_data_tempo?page="+page,
				success:function(data)
				{
					$('#more_pagination').html(data);
				}
			})
		}
	});
</script>

</body>
</html>