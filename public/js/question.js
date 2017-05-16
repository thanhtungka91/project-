$(document).ready(function(){
    $('#question_type').change(function(){
        if($(this).val() == 1){
            $("#answer_text").show();
            $("#answer_select").hide();
            $(".answer_select").hide();
            $("#answer_map").hide();
        }
        if($(this).val() == 2){
            $("#answer_text").hide();
            $("#answer_map").hide();
            $("#answer_select").show();
            $(".answer_select").show();
            $(".answer_type2").show();
        }
        if($(this).val() == 3){
            $("#answer_text").hide();
            $("#answer_select").hide();
            $(".answer_select").hide();
            $("#answer_map").show();
        }
    });
    var number_answers = 1;
    $('#add_answer').click(function(){
        number_answers = number_answers+1;
        var include = '<div class="add_answer"><input type="text" name = "answer_type2[' + (number_answers) + ']" /></div>';
        var remove_button = '<span class="btn btn-default remove_button"> Delete</span>';
        // append more answer
        $(".add_answer").last().after(include);
        $(".remove_button").remove();
        // append remove button
        $(".add_answer").last().after(remove_button);
        // add answer to multil choice
        $(this).parent().parent().children('.answer_type2').children('.select-answer').append($('<option>', {
            value: 1,
            text: 'My option'
        }));
    });

    $('.answer_select').on('click','.remove_button',function() {
        if($(this).parent().children('.add_answer').length<=1){
            alert("at least 1 answer is required");
        }else{
            number_answers = number_answers-1;
            $(this).parent().children('.add_answer').last().remove();\
            // remove last select option 
            $(this).parent().parent().children('.answer_type2').children('.select-answer').children().last().remove();
        }

    });
});