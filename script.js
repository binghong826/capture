document.addEventListener('DOMContentLoaded', function() {
    var video = document.getElementById('videoElement');

    if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
        navigator.mediaDevices.getUserMedia({ video: true })
            .then(function(stream) {
                video.srcObject = stream;
                video.onloadedmetadata = function(e) {
                    video.play();
                };
            })
            .catch(function(err) {
                console.error('Error accessing the camera:', err);
            });
    } else {
        console.error('getUserMedia is not supported on your browser');
    }
});
