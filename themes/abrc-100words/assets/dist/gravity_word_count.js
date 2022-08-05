jQuery(document).ready(function($) {
    $("[class*='count[']").each(function() {
        var elClass = $(this).attr('class');
        var maxWords = 0;
        var countControl = elClass.substring((elClass.indexOf('['))+1, elClass.lastIndexOf(']')).split(',');

        if (countControl.length > 1) {
            minWords = countControl[0];
            maxWords = countControl[1];
        } else {
            maxWords = countControl[0];
        }

        $(this).find('textarea').bind('keyup click blur focus change paste', function() {
            var numWords = jQuery.trim($(this).val()).replace(/\s+/g," ").split(' ').length;

            if ($(this).val() === '') {
                numWords = 0;
            }

            $(this).siblings('.word-count-wrapper').children('.word-count').text(numWords);

            if (numWords > maxWords && maxWords != 0) {
                $(this).siblings('.word-count-wrapper').addClass('error');

                var trimmedString = '';
                var wordArray = $(this).val().split(/[\s\.\?]+/);
                for (var i = 0; i < maxWords; i++) {
                    trimmedString += wordArray[i] + ' ';
                }

                $(this).val(trimmedString);
            }
            else if (numWords == maxWords && maxWords != 0) {
                $(this).siblings('.word-count-wrapper').addClass('error');
            }
            else {
                $(this).siblings('.word-count-wrapper').removeClass('error');
            }

        }).after('<span class="word-count-wrapper">(110 word limit) <span class="word-count">0</span> words</span>');
    });
});
