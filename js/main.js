/**
 * Created by walden on 16-8-26.
 */

function getyear() {
    var year = new Date().getFullYear();
    document.getElementById('current-year').innerHTML = year;
}

function getUpdateTime() {
    var update_time = new Date(document.lastModified);
    document.getElementById('update-time').innerHTML = update_time;
}

$('.reply-walden').click(function () {
    $(this).hide();
    // $(this).toggle();
    // $(this).child('.my-reply-walden').toggle();
});

$('.submit-link-walden').click(function () {
    var nickname = $('#nickname').val().trim();
    var email = $('#email').val().trim();
    var content = $('#content').val().trim();

    var flag = 0;
    var tmp = 0;
    // if(!email.match(/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/) && email.length > 0) {
    //     alert('Email format is illegal, please check it again!');
    //     $('#email').focus();
    //     flag = 1;
    //     tmp = 1;
    // }
    if (nickname.length < 3 && tmp == 0) {
        alert('Your nickname is too short!');
        $('#nickname').focus();
        flag = 1;
        tmp = 1;
    }
    if (nickname.length > 30 && tmp == 0) {
        alert('Your nickname is too long!');
        $('#nickname').focus();
        flag = 1;
        tmp = 1;
    }
    if (content.length < 10 && tmp == 0) {
        alert('Your content is too short!');
        $('#content').focus();
        flag = 1;
        tmp = 1;
    }
    if (content.length > 800 && tmp == 0) {
        alert('Your content is too long!');
        $('#content').focus();
        flag = 1;
        tmp = 1;
    }
    $('.form-submit-walden').submit(function () {
        if (flag == 0 && tmp == 0) {
            alert('Comment Success!');
            return true;
        }
        else {
            location.reload();
            return false;
        }
    });

});

$('.favor-ajax').hover(
    function () {
        var url_test = window.location.href;
        var url_tmp = url_test.replace('//', ' ');
        var url = url_tmp.substring(url_tmp.indexOf('/'));

        $(this).children($(this)).attr('class', 'fa fa-heart');
        $(this).click(function () {
            // $.get(url,
            //     {
            //         val1: "11111"
            //     },
            //     function(data,status){
            //         alert("Data: " + data + "\nStatus: " + status);
            //     });
            var tmp ={
                test: 'good'
            };
            $.ajax({
                type: "post",    // method for the date sending
                url: url,    // the target back-end URL
                data: tmp,  // transfer data（variable）format as: {'val1':"1","val2":"2"}
                dataType: "text",   // return type for back-end process
                success: function (data) {  // ajax request in success
                    alert('Success!');
                },
                error: function (msg) {  // ajax request in failure
                    alert(msg); //  alert the wrong message
                }
            });
        });
    },
    function () {
        $('.fa-heart').attr('class', 'fa fa-heart-o');
    }
);


$(window).scroll(function () {
    if ($(window).scrollTop() > 150) {
        $('#to-top').css('visibility', 'visible');
    }
    if ($(window).scrollTop() <= 150) {
        $('#to-top').css('visibility', 'hidden');
    }
});

$(document).ready(function () {
    getyear();
    getUpdateTime();
    $('.img-circle-walden').attr('style', 'width: 140px; height: 140px;')
    $(function () {
        $('.summernote.comment-walden').summernote({
            placeholder: 'Welcome to leave your comment here...',
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ]
        });
        $('.summernote').summernote({
            placeholder: 'Entry content is input here...'
        });
    });

    $(function () {
        $('.nav-item').click(function () {
            $('.nav-item').removeClass('active');
            $(this).addClass('active');
        });
        $('#to-top').click(function () {
            $('body, html').animate({scrollTop: 0}, 200);
        });
    });
});
