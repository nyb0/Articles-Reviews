$(document).ready(function(){
//SHOW_FORM_FOR_ADD_FEEDBACK
  $('.article>.title>.current-rating>a').on('click', function(){
    $('.feedback>.add-review').fadeIn(400).css('display','flex');

    $('.feedback>.add-review>.close-form>img').on('click', function(){
      $('.feedback>.add-review').fadeOut(400);
    });
    return false;
  });

});