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

    $('.add-question').on('click', function () {

      var html = '<div class="row quest-row"><div class="col"> <label for="question">Question:</label> <input type="text" value="" class="question form-control" id="question" name="question"></div><div class="col"> <label for="option_1">Option 1:</label> <input type="text" class="option_1 form-control" value="" id="option_1" name="option_1"></div><div class="col"> <label for="option_1">Option 2:</label> <input type="text" class="option_2 form-control" value="" id="option_1" name="option_1"></div><div class="col"> <label for="option_1">Option 3:</label> <input type="text" class="option_3 form-control" value="" id="option_1" name="option_1"></div><div class="col"> <label for="option_1">Option 4:</label> <input type="text" class="option_4 form-control" value="" id="option_1" name="option_1"></div><div class="col"> <label for="correct_answer">Select:</label> <select class="answer form-control" id="correct_answer" name="correct_answer"><option value="option_2">Option 2</option><option value="option_3">Option 3</option><option value="option_4">Option 4</option></select></div><div class="col"><label for="">Remove</label> <input value="Remove" type="button" class="btn btn-sm btn-danger remove-question"></div></div></div>';

      $('#main-form-d').append(html);
    });

    $('#main-form-d').on('click', '.remove-question', function () {

      this.closest('.quest-row').remove();
    });

    $('#save-question').on('click', function() {

      var error = false,
          subData = [],
          data  = [];

      $('.quest-row').each(function (key, value){

        var question = $(value).find('.question'),
            option_1 = $(value).find('.option_1'),
            option_2 = $(value).find('.option_2'),
            option_3 = $(value).find('.option_3'),
            option_4 = $(value).find('.option_4'),
            answer   = $(value).find('.answer');
        
        if(question.val() == ''){

          error = true;
          question.parent().addClass('text-danger alert-danger');
        }
        if(option_1.val() == ''){

          error = true;
          option_1.parent().addClass('text-danger alert-danger');
        }
        if(option_2.val() == ''){

          error = true;
          option_2.parent().addClass('text-danger alert-danger');
        }
        if(option_3.val() == ''){

          error = true;
          option_3.parent().addClass('text-danger alert-danger');
        }
        if(option_4.val() == ''){

          error = true;
          option_4.parent().addClass('text-danger alert-danger');
        }
        if(answer.val() == ''){

          error = true;
          answer.parent().addClass('text-danger alert-danger');
        }

        data.push({
          'question' : question.val(),
          'option_1' : option_1.val(),
          'option_2' : option_2.val(),
          'option_3' : option_3.val(),
          'option_4' : option_4.val(),
          'answer'   : answer.val()
        });

      });

      $('#data').val(JSON.stringify(data));

      if(!error) {

        $('#quest-create').submit();

      }
      
    })
});
