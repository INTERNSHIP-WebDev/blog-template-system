

<script src="{{ asset('landing_assets/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('landing_assets/styles/bootstrap4/popper.js') }}"></script>
<script src="{{ asset('landing_assets/styles/bootstrap4/bootstrap.min.js') }}"></script>
<script src="{{ asset('landing_assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
<script src="{{ asset('landing_assets/plugins/easing/easing.js') }}"></script>
<script src="{{ asset('landing_assets/plugins/masonry/masonry.js') }}"></script>
<script src="{{ asset('landing_assets/plugins/parallax-js-master/parallax.min.js') }}"></script>
<script src="{{ asset('landing_assets/js/post_nosidebar.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        // Handle Load More button click
        $('.see_fewer').hide();
        $('#load_more').on('click', function() {
            $('.remaining-comments').show();
            $('.load_more').hide();
            $('.see_fewer').show();
        });
        $('#see_fewer').on('click', function() {
            $('.remaining-comments').hide();
            $('.load_more').show();
            $('.see_fewer').hide();
        })
    });
</script>

</body>
</html>