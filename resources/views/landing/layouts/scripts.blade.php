

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

<script>
		/**
	 * Options
	 **/
	const options = {
		ease: 0.1,
	}

	/**
	 * Canvas
	 **/
	const $canvas = document.getElementById('canvas')

	const updateCanvasSize = () => {
		const { innerWidth, innerHeight, devicePixelRatio } = window
		const width = innerWidth
		const height = innerHeight
		const pixelRatio = Math.min(devicePixelRatio, 2)

		$canvas.width = width * pixelRatio
		$canvas.height = height * pixelRatio

		$canvas.style.width = width + 'px'
		$canvas.style.height = height + 'px'
	}

	window.addEventListener('resize', updateCanvasSize)
	updateCanvasSize()

	/**
	 * Context
	 **/
	const ctx = $canvas.getContext('2d')

	/**
	* Mouse
	**/
	const mouse = {
		x: window.innerWidth / 2 * Math.min(window.devicePixelRatio, 2),
		y: window.innerHeight / 2 * Math.min(window.devicePixelRatio, 2),
	}

	const updateMousePosition = e => {
		const { clientX, clientY } = e
		const { left, top } = $canvas.getBoundingClientRect()
		const pixelRatio = Math.min(window.devicePixelRatio, 2)

		mouse.x = (clientX - left) * pixelRatio
		mouse.y = (clientY - top) * pixelRatio
	}

	$canvas.addEventListener('mousemove', updateMousePosition)

	/**
	 * Cursor
	 **/
	const cursor = {
		x: window.innerWidth / 2 * Math.min(window.devicePixelRatio, 2),
		y: window.innerHeight / 2 * Math.min(window.devicePixelRatio, 2),
		a: 0,
		s: 0,
	}

	/**
	 * Loop
	 **/
	requestAnimationFrame(function tick(timestamp) {
		const { width, height } = $canvas
		const pixelRatio = Math.min(window.devicePixelRatio, 2)

		ctx.clearRect(0, 0, width, height)

		// mouse
		const mouseRadius = pixelRatio * 16

		ctx.strokeStyle = 'rgba(255, 255, 255, 0.25)'
		ctx.lineWidth = 4
		ctx.beginPath()
		ctx.arc(mouse.x, mouse.y, mouseRadius, 0, Math.PI * 2, false)
		ctx.closePath()
		ctx.stroke()

		// cursor
		cursor.x += (mouse.x - cursor.x) * options.ease
		cursor.y += (mouse.y - cursor.y) * options.ease

		cursor.a = Math.atan((mouse.y - cursor.y) / (mouse.x - cursor.x))

		cursor.s = map(distance(cursor.x, cursor.y, mouse.x, mouse.y), 0, Math.max(width, height), 1, .1)

		const cursorRadius = pixelRatio * 12

		ctx.save()
		ctx.translate(cursor.x, cursor.y)
		ctx.rotate(cursor.a)
		ctx.scale(1, cursor.s)

		ctx.fillStyle = 'rgba(255, 255, 255, 1.0)'
		ctx.beginPath()
		ctx.arc(0, 0, cursorRadius, 0, Math.PI * 2, false)
		ctx.closePath()
		ctx.fill()

		ctx.restore()

		requestAnimationFrame(tick)
	})

	/**
	 * Utils
	 **/
	function lerp(norm, min, max) {
		return (max - min) * norm + min
	}

	function distance(x0, y0, x1, y1) {
		return Math.hypot(x1 - x0, y1 - y0)
	}

	function map(n, start1, stop1, start2, stop2) {
		return (n - start1) / (stop1 - start1) * (stop2 - start2) + start2
	}

</script>


</body>
</html>