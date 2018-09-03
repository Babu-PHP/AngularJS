<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

  <style>
  .footer {
     position: fixed;
     left: 0;
     bottom: 0;
     width: 100%;
     background-color: red;
     color: white;
     text-align: center;
  }
</style>
</head>
<body>
<?php
  include "includes/nav.php";
?>

<div class="container" ng-app="myApp" ng-controller="formCtrl">
  <h2>Vertical (basic) form</h2>
  <form name="myForm" novalidate>
    <div class="form-group">
      <label for="email">Name:</label>
      <input type="text" class="form-control" name="firstname" ng-model="firstname">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" name="email" ng-model="email">
    </div>
    <div class="form-group">
      <label for="email">Username:</label>
      <input type="text" class="form-control" name="user" ng-model="user" required>
      <span style="color:red" ng-show="myForm.user.$dirty && myForm.user.$invalid">
      <span ng-show="myForm.user.$error.required">Username is required.</span>
      </span>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" ng-model="password">
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>
<?php
  include "includes/footer.php";
?>


<script>
var app = angular.module('myApp', []);
app.controller('formCtrl', function($scope) {
    $scope.firstname = "John";
});
</script>

</body>
</html>