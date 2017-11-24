$(document).ready(function () {
    $('#contribute_btn').click(function () {
        open_form();
    });
    
    $('#cancel').click(function() {
        $('#song').val('');
        $('#correct_lyric').val('');
        $('#misheard_as').val('');
        $('#misheard_by').val('');
        if($('#anonymous').prop('checked') == true) {
            $('#anonymous').trigger('click');
        }
        $.unblockUI();
    });
});

function validate_addacap() {
    var error_count = 0;
    var error_message = '';
    if ($('#song').val() === '') {
        error_count++;
        error_message += 'SONG TITLE';
    }
    if ($('#correct_lyric').val() === '') {
        error_count++;
        if (error_count > 1) {
            error_message += ' \u00b7 ';
        }
        error_message += 'CORRECT LYRIC';
    }
    if ($('#misheard_as').val() === '') {
        error_count++;
        if (error_count > 1) {
            error_message += ' \u00b7 ';
        }
        error_message += 'MISHEARD LYRIC';
    }
    
    if ($('#misheard_by').val() === '' && $('#anonymous').prop('checked') === false) {
        error_count++;
        if (error_count > 1) {
            error_message += '...plus you didn\'t provide a name but didn\'t say you want to be anonymous';
        } else {
            error_message += "YOU FAILED TO PROVIDE A NAME BUT DIDN'T INDICATE YOU WISH TO BE ANONYMOUS";
        }
    }

    if (error_count > 0) {
        $.unblockUI();
        var title = 'FIX SOME STUFF!';
        redAlert(title,error_message);
        return false;
    } else {
        if ($('#anonymous').prop('checked') === true) {
            $('#misheard_by').val('(ANONYMOUS)');
        }
        return true;
    }
}

function open_form() {
    var goodMargin = (($(window).width()-500)/2)+'px';
    $.blockUI({
        message: $('#formbox'),
        css: {
            left: goodMargin,
            top: '50px;',
            border: 'none'
        }
    });
}