var checkArrayLeft = [];
var checkArrayTop = [];
var checkArrayRight = [];
var checkArrayBottom = [];

$('body input[type="checkbox"]').each(function(){

  var thisOffset = $(this).offset();
  var thisWidth = $(this).width();
  var thisHeight = $(this).height();

  checkArrayRight.push(thisOffset.left);
  checkArrayBottom.push(thisOffset.top);
  checkArrayTop.push(thisOffset.top + thisHeight);
  checkArrayLeft.push(thisOffset.left + thisWidth);

});

var exEnabled = true;
var moudow = false;

$(document).keydown(function (e) {

  if(e.keyCode == 16) {
    shifting = true;
  }

});



$(document).on('mousedown', function(){
  if(!shifting){
    moudow = true;
  }
});

$(document).on('mouseup', function(){
  moudow = false;
});

$('body input[type="checkbox"]').mouseenter(function(){
  if(exEnabled){
    if(moudow){
      $(this).click();
    }
  };
});

$('body input[type="checkbox"]').on('mousedown', function(){
  if(exEnabled){
    if(!shifting){
      moudow = true;
      $(this).click();
    }
  };
});

$('body input[type="checkbox"]').click(function(e){
  if(exEnabled){
    $(this).click();
  };
});

var dragging = false;
var shifting = false;
var mx = 0;
var my = 0;

$(document).keyup(function (e) {

  if(e.keyCode == 16) {
    dragging = false;
    shifting = false;
    defaulted = true;
    $('.highlight-area').remove();
  }

});

$(document).on('mousedown', function(e){

  if(shifting){
    mx = e.pageX;
    my = e.pageY;
    $('body').prepend('<div class="highlight-area" style="position: absolute; background: rgba(21, 155, 255, 0.2); border: 1px solid rgba(21, 155, 255, 0.8); z-index:5;"></div>');
    startDrag(mx, my);
  }
});

$(document).on('mouseup', function(){
  registerChecks();
});

$(document).on('mousemove', function(e){

  if(dragging){

    var moveX = e.pageX;
    var moveY = e.pageY;
    var xDif = moveX - mx;
    var yDif = moveY - my;

    if(xDif < 0){
      $('.highlight-area').offset({
        left: moveX
      });
    }

    if(yDif < 0){
      $('.highlight-area').offset({
        top: moveY
      });
    }

    $('.highlight-area').css({

      width: Math.abs(xDif),
      height: Math.abs(yDif)

    });

  }

});

function startDrag(x, y){

  dragging = true;

  $('.highlight-area').offset({
    top: y,
    left: x
  });

}

function registerChecks(){

  dragging = false;

  if(shifting){


    var areaWidth = $('.highlight-area').width();
    var areaHeight = $('.highlight-area').height();
    var hiRangeLeft = $('.highlight-area').offset().left;
    var hiRangeRight = $('.highlight-area').offset().left + areaWidth;
    var hiRangeTop = $('.highlight-area').offset().top;
    var hiRangeBottom = $('.highlight-area').offset().top + areaHeight;

    for(var i=0; i<checkArrayLeft.length; i++){

      if(checkArrayRight[i] <= hiRangeRight && checkArrayLeft[i] >= hiRangeLeft && checkArrayBottom[i] <= hiRangeBottom && checkArrayTop[i] >= hiRangeTop){
        $('body input[type="checkbox"]').eq(i).click();
      }

    };

  }

  $('.highlight-area').remove();

}
