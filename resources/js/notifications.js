document.addEventListener('DOMContentLoaded', function() {
    const successAlert = document.getElementById('success-alert');
    const errorAlert = document.getElementById('error-alert');

    function fadeOutAlert(alert) {
        if (alert) {
            setTimeout(() => {
                alert.style.opacity = 0;
                alert.style.transition = 'opacity 0.5s ease-out';
                setTimeout(() => {
                    alert.remove();
                }, 500);
            }, 1500);
        }
    }

    fadeOutAlert(successAlert);
    fadeOutAlert(errorAlert);
});
