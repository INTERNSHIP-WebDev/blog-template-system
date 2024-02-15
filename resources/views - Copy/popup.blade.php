<style>
    		/* styles.css */
	.modal {
		display: none;
		position: fixed;
		z-index: 9999;
		left: 50%;
		top: 50%;
		transform: translate(-50%, -50%);
		width: 500px; /* Minimized width */
	}

	.modal-content {
		width: 100%;
		height: auto;
	}

	/* Overlay to disable clicking surrounding the modal */
	.modal-overlay {
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent overlay */
		z-index: 9998; /* Place overlay behind the modal */
	}
</style>



<!-- popup.blade.php -->


<div id="myModal" class="modal">
    <div class="modal-content">
        <video width="100%" height="auto" controls autoplay>
            <source src="{{ asset('/images/ads/oreo-ads.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
</div>

    
<script>
    // script.js
    document.addEventListener("DOMContentLoaded", function() {
        // Function to close the modal and remove overlay
        function closeModal() {
            modal.style.display = "none";
            overlay.style.display = "none";
            // Redirect to the original view without the ad
            window.location.href = "{{ route('blog.sample.sample') }}";
        }

        // Autoplay video after 5 seconds
        setTimeout(function() {
            // Show the modal after 5 seconds
            var modal = document.getElementById("myModal");
            var overlay = document.createElement("div");
            overlay.classList.add("modal-overlay");
            document.body.appendChild(overlay);
            modal.style.display = "block";
            modal.querySelector("video").play();

            // Close modal after video finishes playing
            modal.querySelector("video").addEventListener("ended", function() {
                closeModal();
                return ('blog.sample.sample')
            });
        }, 5000);
    });
</script>


