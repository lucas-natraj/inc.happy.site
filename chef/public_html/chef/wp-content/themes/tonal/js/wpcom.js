(function($) {
    /*
     * A function to move the video above the entry-title if post format is video.
     *
     * Function taken from Singl theme to work for responsive video
     */
    function videos() {
        var video = $('.hentry.format-video .wpcom-video-wrapper');

        video.each(function() {
            $(this).first().prependTo($(this).closest('.hentry.format-video'));
            $(this).addClass('active');
            $(this).show();
        });

    }
    $(window).load(videos);
    $(document).on('post-load', videos);

})(jQuery);