$(function () {
    // Submit LGU Profile
    $('#lgu-submit').on('click', function (e) {
        document.getElementById('status').value = 1;
        $('#lgu-profile-form').submit();
    });

    // Draft LGU Profile
    $('#lgu-draft').on('click', function (e) {
        document.getElementById('status').value = 2;
        $('#lgu-profile-form').submit();
    });
});

// dynamic View/edit
function view( url, id, action){
    window.location.href = url + '/' + id+ '/'+ action;
   
}
$(function() {
    // Submit LGU Profile
    $('#nutritionService-submit').on('click', function(e) {
        document.getElementById('status').value = 1;
        $('#nutritionService-form').submit();
        console.log('clicked!Submit');
    });

    // Draft LGU Profile
    $('#nutritionService-draft').on('click', function(e) {
        document.getElementById('status').value = 2;
        $('#nutritionService-form').submit();
        console.log('clicked!draft');
    });
});