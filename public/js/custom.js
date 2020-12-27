$(document).ready(function() {
    $('#exam_submit').on('click', function(e) {
        e.preventDefault();
        var idArray = [];
        $('.chk-question').each( function(key, value){

          if(value.checked == true) {
            //console.log(value.value, key, $('.chk-question')[key].value);
            idArray.push(value.value);
          }
        });
        var stringVal = JSON.stringify(idArray);

        $('#checked_questions').val(stringVal);
        //console.log(stringVal);
        $('#exam_form').submit();
    });

    $('#assign_submit').on('click', function(e) {
        e.preventDefault();
        var idArray = [];
        $('.chk-user').each( function(key, value){

          if(value.checked == true) {
            //console.log(value.value, key, $('.chk-question')[key].value);
            idArray.push(value.value);
          }
        });
        var stringVal = JSON.stringify(idArray);

        $('#checked_user').val(stringVal);
        //console.log(stringVal);
        $('#assign_form').submit();
    });
});
