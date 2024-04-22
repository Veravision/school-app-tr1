/* ============================================================
 * Gallery
 * Showcase your portfolio or even use it for an online store!
 * For DEMO purposes only. Extract what you need.
 * ============================================================ */

$(function() {

    /* GRID
    -------------------------------------------------------------*/

    /* 
        Wait for the images to be loaded before applying
        Isotope plugin. 
    */
    var $gallery = $('.gallery');
    $gallery.imagesLoaded(function() {
        applyIsotope();
    });

    /*  Apply Isotope plugin 
        isotope.metafizzy.co
    */
    var applyIsotope = function() {
        $gallery.isotope(
            {
                "itemSelector": '.demo-screenshot',
                "masonry": {
                    "columnWidth": 330,
                    "gutter": 20,
                    "isFitWidth": true
                }
            }


        )
    }

    var $blocks = $('.blocks');
    $blocks.imagesLoaded(function() {
        applyIsotopeBlocks();
    });

    /*  Apply Isotope plugin 
        isotope.metafizzy.co
    */
    var applyIsotopeBlocks = function() {
        $blocks.isotope(
            {
                "itemSelector": '.demo-blocks',
                "masonry": {
                    "columnWidth": 200,
                    "gutter": 10,
                    "isFitWidth": true
                }
            }


        )
    }



});