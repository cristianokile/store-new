$(window).load(function () {
    var image = $('.work-each img');
    image.each(function () {
        var that = $(this);
        if (that.width() < 500) {
            that.next('div.work-text').addClass('work-text-small');
        }
    })

});