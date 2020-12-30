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

    $('#answer_submit').on('click', function(e) {

      e.preventDefault();

      var answersArray = [],
          answers = $('.selected_answer');

      $('.question_id').each( function(key, value){

        var perAnswerArray = [];

        perAnswerArray.push({'question_id' : value.value});
        perAnswerArray.push({'answer' : answers[key].value});

        answersArray.push(perAnswerArray);

      });

      var stringVal = JSON.stringify(answersArray);

      $('#all_answers').val(stringVal);

      $('#answer_form').submit();
    })
});
