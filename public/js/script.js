$(document).ready(function(){

//DECORATE_STARS-GRADE
  var articleGrade = $('.article>.title>.current-rating>h2>span').attr('data-grade');
  $('.add-review>form>.rating>.rate-stars>span').css('width', articleGrade*20 + '%');
  $('.article>.title>.current-rating>.rate-stars>span').css('width', articleGrade*20 + '%');

//READ_FULL_COMMENT
  $('.feedback>.comments>div>p.comment-body').each(function(){
    if( $(this).text().length > 300 ){
      var comment = $(this).text();
      var subComment = $(this).text().substr(0, 299) + '"';
      $(this).text(subComment);
      $('<a class="full" href="">...read full comment</a>').insertAfter($(this));
    }
    $('.feedback>.comments>div>a.full').data('clicked', 0);
    $('.feedback>.comments>div>a.full').on('click', function(){
      event.preventDefault();
      $(this).prev().text(comment);
      $('<a class="collapse" href="">collapse comment</a>').insertAfter($(this).prev());
      $(this).remove();

      $('.feedback>.comments>div>a.collapse').data('clicked', 0);
      $('.feedback>.comments>div>a.collapse').on('click', function(){
        event.preventDefault();
        $(this).prev().text(subComment);
        $('<a class="full" href="">...read full comment</a>').insertAfter($(this));
        $(this).remove();
      });
    });
  });
//SHOW_FORM_FOR_ADD_FEEDBACK
  $('.article>.title>.current-rating>a').on('click', function(){
    $('.feedback>.add-review').fadeToggle(400).css('display','flex');

    $('.feedback>.add-review>.close-form>img').on('click', function(){
      $('.feedback>.add-review').fadeOut(400);
    });
    return false;
  });

});