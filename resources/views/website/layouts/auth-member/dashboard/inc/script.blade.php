<!-- Bootstrap & Script -->
<script src="{{ asset('frontend') }}/assets/js/jquery-3.6.0.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/bootstrap.bundle.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script>
        function showContent(sectionId) {
            document.querySelectorAll('.content-section').forEach(el => el.classList.add('d-none'));
            document.getElementById(sectionId).classList.remove('d-none');

            document.querySelectorAll('.nav-link').forEach(link => link.classList.remove('active'));
            event.target.classList.add('active');
        }
    </script>

    @stack('scripts')