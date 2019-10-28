/**
 * Isotope
 * @description Enables Isotope plugin
 */
let $window = $(window);
plugins = {
    isotope: $(".isotope")
}
if (plugins.isotope.length) {
    var i, j, isogroup = [];
    for (i = 0; i < plugins.isotope.length; i++) {
        var isotopeItem = plugins.isotope[i],
            filterItems = $(isotopeItem).closest('.isotope-wrap').find('[data-isotope-filter]'),
            iso;

        iso = new Isotope(isotopeItem, {
            itemSelector: '.isotope-item',
            layoutMode: isotopeItem.getAttribute('data-isotope-layout') ? isotopeItem.getAttribute('data-isotope-layout') : 'masonry',
            filter: '*',
            masonry: {
                columnWidth: 0.66
            }
        });

        isogroup.push(iso);

        filterItems.on("click", function (e) {
            e.preventDefault();
            var filter = $(this),
                iso = $('.isotope[data-isotope-group="' + this.getAttribute("data-isotope-group") + '"]'),
                filtersContainer = filter.closest(".isotope-filters");

            filtersContainer
                .find('.active')
                .removeClass("active");
            filter.addClass("active");

            iso.isotope({
                itemSelector: '.isotope-item',
                layoutMode: iso.attr('data-isotope-layout') ? iso.attr('data-isotope-layout') : 'masonry',
                filter: this.getAttribute("data-isotope-filter") == '*' ? '*' : '[data-filter*="' + this.getAttribute("data-isotope-filter") + '"]',
                masonry: {
                    columnWidth: 0.66
                }
            });

            $window.trigger('resize');

            // If d3Charts contains in isotop, resize it on click.
            if (filtersContainer.hasClass('isotope-has-d3-graphs') && c3ChartsArray != undefined) {
                setTimeout(function () {
                    for (var j = 0; j < c3ChartsArray.length; j++) {
                        c3ChartsArray[j].resize();
                    }
                }, 500);
            }

        }).eq(0).trigger("click");
    }

    $(window).on('load', function () {
        setTimeout(function () {
            var i;
            for (i = 0; i < isogroup.length; i++) {
                isogroup[i].element.className += " isotope--loaded";
                isogroup[i].layout();
            }
        }, 600);
    });
}