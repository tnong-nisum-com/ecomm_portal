//handler for form submit
$('button.btnSignUp').click(function(e){
    e.preventDefault();
    var objRegister = $('#newsletter-validate-detail').serializeArray();
    var email = '';
    email = objRegister[0].value;
    if(typeof objRegister[0].value && isEmail(email)){
        //check if email is already registered
        emailExists(email);
    }
});

///Email format validation
function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

var optNewsletter = function(email){
    //insert email address
    var entity = 'CL';
    var url = 'https://216.218.200.215/api_postRegistration.php';
    $.ajax({
        url: url,
        data: 'email=' + email + '&entity=CL',
        dataType: 'JSON',
        type: 'POST'
    }).done(function(data){
        if(data.Id){
            alert('Thanks for registering. You will get a confirmation in your email box.');
        }
    }).fail(function(xhr){
        alert('error', xhr);
    });
};

var emailExists = function(email){
    var url = 'https://216.218.200.215/api_getRegisterList.php';
    $.ajax({
        url: url,
        data: 'email=' + email,
        dataType: 'JSON',
        type: 'POST'
    }).done(function(data){
        if(!data.confirm)optNewsletter(email);
    }).done(function(data){
        if(data.confirm)alert('This email already exists.');
    }).fail(function(xhr){
        alert('error', xhr);
    });
};