/*When clicking on Full hide fail/success boxes */


$("form#sendResumeForm").submit(function(){

    var formData = new FormData($(this)[0]);

    $.ajax({
        url: 'mail/sendResume.php',
        type: 'POST',
        data: formData,
        async: false,
        success: function (result) {
            alert(result)
        },
        error: function(result) {
            alert(result)
        },
        cache: false,
        contentType: false,
        processData: false
    });

    
    this.reset();
    return false;
});

$("form#contactForm").submit(function(){

    var formData = new FormData($(this)[0]);

    $.ajax({
        url: 'mail/contactMe.php',
        type: 'POST',
        data: formData,
        success: function (result) {
            alert(result)
        },
        error: function(result) {
            alert(result)
        },
        cache: false,
        contentType: false,
        processData: false
    });

    this.reset();
    return false;
});


$('#name').focus(function() {
    $('#success').html('');
});

$('#name').focus(function() {
    $('#success').html('');
});

