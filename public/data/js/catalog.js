'use strict';
var numberOfItems= $("#loop .book-item").length;
var limitPerPage=4;
$("#loop .book-item:gt(" + (limitPerPage) + ")").hide();
var totalPages=Math.round(numberOfItems/limitPerPage);
$(".pagination").append("<li class='current-page active'><a href='javascript:void(0)'>\" + 1 + \"</a></li>");

for(var i=2; i<=totalPages;i++){
    $(".pagination").append("<li class='current-page'><a href='javascript:void(0)'>\" + 1 + \"</a></li>");
}

$(".pagination").append("<li><a href='javascript:void(0)' aria-label='Next'><span aria-hidden='true'>&raquo</span></a></li>");
$(".pagination li.current-page").on("click", function(){
    if($(this).hasClass("active")){
        return false;
    }
    else{
        alert('user clicked on numbebr');
        var currentPage = $(this).index();
        $(".pagination li").removeClass("active");
        $(this).addClass("active");

    }


});