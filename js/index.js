var myApp = angular.module('myApp', []);

angular
  .module('myApp')
  .directive('responsiveTabs', responsiveTabs);

function responsiveTabs() {
  return {
    restrict: 'A',
    link: function(scope, element, attrs) {
      element.responsiveTabs({
        startCollapsed: false
      });

    }
  };
}