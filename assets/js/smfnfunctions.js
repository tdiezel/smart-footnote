(function($) {
    if($('.footnote').length){
        $('.footnote').removeClass('right');
        $('.footnote:odd').each(function(e){
            //Assing class right to every other footnote
            $(this).addClass('right');
        });
        $('.footnote').each(function(e){
            //Get content of footnote stripping html tags
            var cite = $(this).find('.article-aside-txt').html().replace(/<(?:.|\n)*?>/gm, '');

            //Check if footnote has more than 1 line to insert 'show more' button
            if(cite.length > 50) {
                var showMore = document.createElement('a');
                showMore.className = 'article-aside--more-link js-article-unabridge-trigger';
                showMore.innerHTML = 'Show more';
                $(this).addClass('article-aside--abridged').append(showMore);
            }
        });
    }
    $('.js-article-aside-trigger').click(function(e){
        console.log('click');
        if($(this).hasClass('aside-active')) {
            $(this).removeClass('aside-active').siblings('.article-aside').removeClass('aside-active');
        } else {
            $(this).addClass('aside-active').siblings('.article-aside').addClass('aside-active');
        }
    });
    $('.js-article-unabridge-trigger').click(function(){
        console.info('clicked');
        if($(this).parents('.footnote').hasClass('article-aside--abridged')) {
            $(this).parents('.footnote').removeClass('article-aside--abridged');
            $(this).html('Show Less');
        } else {
            $(this).parents('.footnote').addClass('article-aside--abridged');
            $(this).html('Show More');
        }
    })
})(jQuery);