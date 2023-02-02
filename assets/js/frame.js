$(document).ready(function () {
    var isDragging = false;
    var currentX;
    var currentY;
    var initialX;
    var initialY;
    var xOffset = 0;
    var yOffset = 0;
    var speedMultiplier = 0.2;

    $("#painting").on("mousedown touchstart", function (e) {
        e.preventDefault();
        initialX = e.clientX ? e.clientX : e.originalEvent.touches[0].clientX;
        initialY = e.clientY ? e.clientY : e.originalEvent.touches[0].clientY;

        xOffset = parseFloat($("#painting").css("left"));
        yOffset = parseFloat($("#painting").css("top"));

        isDragging = true;
    });

    $(document).on("mouseup touchend", function () {
        isDragging = false;
    });

    $(document).on("mousemove touchmove", function (e) {
        if (isDragging) {
            currentX = e.clientX ? e.clientX : e.originalEvent.touches[0].clientX;
            currentY = e.clientY ? e.clientY : e.originalEvent.touches[0].clientY;

            xOffset = (currentX - initialX) * speedMultiplier + xOffset;
            yOffset = (currentY - initialY) * speedMultiplier + yOffset;

            $("#painting").css("top", yOffset + "px");
            $("#painting").css("left", xOffset + "px");
        }
    });
});