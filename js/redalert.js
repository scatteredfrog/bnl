var red_alert = '<div id="redAlert" style="display:none;">\n\
<div id="alert_white"><span id="click_message">File under: Click the Semicircle to Close</span><span id="ra_ip">IP 225.60</span></div>\n\
<div id="alert_bar"></div>\n\
<div id="alert_close">\n\</div>\n\
<div id="ra_message"></div><div id="first_bar"><img src="/images/gangsta_mike.jpg" height="225px" width="500px" style="margin-top: 5px;" />\
</div><div id="second_bar"></div></div>';

$(document).ready(function() {
    $('body').append(red_alert);

    $('#alert_close').click(function() {
        $('#redAlert').css('display','none');
        $.unblockUI();
        if (window.location.href.indexOf('addacap') > 0) {
            open_form();
        }
    });
});

function redAlert(ra_title,ra_mess) {
    if (typeof ra_title === 'undefined' || ra_title === '') {
        ra_title = "GANGSTA MIKE SEZ:";
    }
    
    if (typeof ra_mess === 'undefined') {
        ra_mess = 'Sorry, but Dauber couldn\'t get off his lazy butt and put this page in. Maybe later.';
    }
    
    $.blockUI({message: $('#redAlert') });
    $('#alert_bar').text(ra_title);
    $('#ra_message').text(ra_mess);
    $('#redAlert').css('top',(window.innerHeight/2-250)+'px');
    $('#redAlert').css('left',(window.innerWidth/2-250)+'px');
    $('#redAlert').css('display','block');
}
