let paintingdrag = document.getElementById("paintingdrag")

if (paintingdrag) {

    $(document).ready(function () {
        var isDragging = false;
        var currentX;
        var currentY;
        var initialX;
        var initialY;
        var xOffset = 0;
        var yOffset = 0;
        var speedMultiplier = 0.2;

        $("#paintingdrag").on("mousedown touchstart", function (e) {
            e.preventDefault();
            initialX = e.clientX ? e.clientX : e.originalEvent.touches[0].clientX;
            initialY = e.clientY ? e.clientY : e.originalEvent.touches[0].clientY;

            xOffset = parseFloat($("#paintingdrag").css("left"));
            yOffset = parseFloat($("#paintingdrag").css("top"));

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

                $("#paintingdrag").css("top", yOffset + "px");
                $("#paintingdrag").css("left", xOffset + "px");
            }
        });
    });

    $("#reset-button").click(function () {
        $("#paintingdrag").css({
            "top": 0,
            "left": 0
        });

        xOffset = 0;
        yOffset = 0;
    });

}
