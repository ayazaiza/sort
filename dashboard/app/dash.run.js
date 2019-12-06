angular
  .module('dashApp')
  .run(function ($rootScope, dashFac) {
      $rootScope.d = 'riyaz';
    dashFac.setPermission('USER', function () {
      return angular.isDefined($rootScope.user);
    });
 }).run(function($rootScope, $state) {
  $rootScope.$on('$stateChangeError', function(evt, to, toParams, from, fromParams, error) {
if (error.redirectTo) {
  $state.go(error.redirectTo);
} else {
  $state.go('error', {status: error.status})
}
})
}).run(function($transitions) {
  $transitions.onError({}, function(transition) {
      console.log('error', transition.error().message, transition);
  });

  $transitions.onBefore({ to: 'parent' }, function(trans) {
      console.log(trans.targetState().name());
      return trans.router.stateService.target('parent.child', trans.targetState().params());
  });
});