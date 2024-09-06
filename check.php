<script>
    // Assume a simple PHP-based login check
    const isLoggedIn = <?php echo isset($_SESSION['user_id']) ? 'true' : 'false'; ?>;

    // Function to open the login modal
    function openLoginModal() {
        document.getElementById('loginModal').style.display = 'block';
    }

    // Handle service link clicks
    document.querySelectorAll('.service-link').forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault(); // Prevent the default link behavior

            if (!isLoggedIn) {
                // If the user is not logged in, show the login modal
                openLoginModal();
            } else {
                // If the user is logged in, redirect to the target service page
                window.location.href = this.getAttribute('data-target');
            }
        });
    });

    // Close login modal when clicking the close button or outside the modal
    const loginModal = document.getElementById('loginModal');
    const closeLoginModal = document.getElementById('closeLogin');

    closeLoginModal.onclick = function () {
        loginModal.style.display = "none";
    }

    window.onclick = function (event) {
        if (event.target == loginModal) {
            loginModal.style.display = "none";
        }
    }
</script>
