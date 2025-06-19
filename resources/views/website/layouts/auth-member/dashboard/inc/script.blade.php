<!-- Bootstrap & Script -->
<script src="{{ asset('frontend') }}/assets/js/jquery-3.6.0.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
{!! Toastr::message() !!}

<script>
    function showContent(sectionId) {
        document.querySelectorAll('.content-section').forEach(el => el.classList.add('d-none'));
        document.getElementById(sectionId).classList.remove('d-none');

        document.querySelectorAll('.nav-link').forEach(link => link.classList.remove('active'));
        event.target.classList.add('active');
    }
</script>

    @stack('scripts')