var shyAppElements = {
  comments : document.getElementById("comments"),
  loaded_comments : document.getElementById("loaded-comments"),
  baseHeight:'',
  calculatedHeight: '',
}
shyAppElements.baseHeight = shyAppElements.comments.offsetHeight;
shyAppElements.calculatedHeight = shyAppElements.comments.offsetHeight + shyAppElements.loaded_comments.offsetHeight;

var shyApp = angular.module("elephant_app",['ngMaterial', 'ngMessages']);

shyApp.controller("blogPage",function($scope)
{
  $scope.comments={
    toogletext: 'Load Comments',
    collapsed: true,
  };


  $scope.toogleComments=function(){
      $scope.comments.collapsed =!$scope.comments.collapsed;
    if($scope.comments.collapsed){
      shyAppElements.comments.style.height = shyAppElements.baseHeight+'px';
      $scope.comments.toogletext = 'Load Comments';
    }
    else{
      shyAppElements.comments.style.height = shyAppElements.calculatedHeight+'px';
      $scope.comments.toogletext = 'Hide Comments';
    }
  }
  $scope.toogleCommentField = function(){}
}
);

shyApp.controller("videoPart",function($scope){
  $scope.getTimes=function(n){
     return new Array(n);
   };
  $scope.cards = [];
  $scope.video_card={
    id:'',
    name:'',
    image:'',
    toogled:'',
  }

}
);
