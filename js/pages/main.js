$(document).ready(function () {
$('#target').css({marginRight: getScrollbarWidth() + "px"});
    $('#country').change(function () {
        var $value = $(this).find("option:selected").val();
        var $collection = $(".table-default").find(".inFilter");
        refresh($collection);
        $collection.each(function (index, item) {
            if ($value !== "all") {
                $collection.each(function (index, item) {
                    if (item.getAttribute("data-country") !== $value) {
                        item.classList.add("hidden");
                    }
                });
            }
        });
    })
    $('#genre').change(function () {
        var $value = $(this).find("option:selected").val();
        var $collection = $(".table-default").find(".inFilter");
        refresh($collection);
        $collection.each(function (index, item) {
            if ($value !== "all") {
                $collection.each(function (index, item) {
                    if (item.getAttribute("data-genre") !== $value) {
                        item.classList.add("hidden");
                    }
                });
            }
        });
    })
    function refresh(collection) {
        collection.each(function(index,item) {
            item.classList.remove("hidden");
        });
    }
    function getScrollbarWidth() {
        var outer = document.createElement("div");
        outer.style.visibility = "hidden";
        outer.style.width = "100px";
        document.body.appendChild(outer);

        var widthNoScroll = outer.offsetWidth;
        // force scrollbars
        outer.style.overflow = "scroll";

        // add innerdiv
        var inner = document.createElement("div");
        inner.style.width = "100%";
        outer.appendChild(inner);

        var widthWithScroll = inner.offsetWidth;

        // remove divs
        outer.parentNode.removeChild(outer);

        return widthNoScroll - widthWithScroll;
    }

})