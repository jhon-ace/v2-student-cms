<div id="error-message" class="bg-red-500 text-white p-4 rounded mb-4">
    {{ $slot }}
</div>

<script>
    setTimeout(function() {
        var successMessage = document.getElementById('error-message');
        if (successMessage) {
            successMessage.style.transition = 'opacity 0.5s ease-out';
            successMessage.style.opacity = '0';
            setTimeout(function() {
                successMessage.remove();
            }, 500);
        }
    }, 5000); // 3 seconds
</script>
