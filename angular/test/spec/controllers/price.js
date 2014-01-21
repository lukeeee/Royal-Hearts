'use strict';

describe('Controller: PriceCtrl', function () {

  // load the controller's module
  beforeEach(module('angularApp'));

  var PriceCtrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    PriceCtrl = $controller('PriceCtrl', {
      $scope: scope
    });
  }));

  it('should attach a list of awesomeThings to the scope', function () {
    expect(scope.awesomeThings.length).toBe(3);
  });
});
