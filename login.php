<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>


<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
</head>
<body ng-app="myApp" ng-controller="formCtrl">

<h2>Modal Login Form</h2>

<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>

<div id="id01" class="modal">
  
  <form class="modal-content animate" name="myForm" novalidate ng-submit="myFunc()">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" ng-model="username" required>
      <span style="color:red" ng-show="myForm.username.$dirty && myForm.username.$invalid">
      <span ng-show="myForm.username.$error.required">Username is required.</span>
      </span>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" ng-model="password" required>
      <span style="color:red" ng-show="myForm.password.$dirty && myForm.password.$invalid">
      <span ng-show="myForm.password.$error.required">Password is required.</span>
      </span>
    
    <input type="submit"
      ng-disabled="myForm.username.$dirty && myForm.username.$invalid ||  
      myForm.email.$dirty && myForm.email.$invalid" ng-click="formsubmit(myForm.$valid)">
      <!-- <button type="submit">Login</button> -->
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
  <p>
    <pre ng-model="result">
        {{result}}
    </pre>
 </p>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<script>
var app = angular.module('myApp', []);
/* app.controller('formCtrl', function($scope) {
    //$scope.name = "John";
    //$scope.user = 'John Doe';
    //$scope.email = 'John.Doe@gmail.com';
    $scope.myTxt = "You have not yet clicked submit";
    $scope.myFunc = function () {
        $scope.myTxt = "You clicked submit!";
    }
}); */

app.controller("formCtrl", ['$scope', '$http', function($scope, $http) {
   var vm = this; // self-referencing local variable required for when promise resolves
    vm.model = {};
        $scope.url = 'checkuser.php';
 
        $scope.formsubmit = function(isValid) {
 
 
            if (isValid) {              
 
                $http.post($scope.url, {"name": $scope.name, "email": $scope.email, "username": $scope.username, "password": $scope.password}).
                        then(function(data, status) {
                            console.log(data);
                            $scope.status = status;
                            $scope.data = data;
                            $scope.result = data; // Show result from server in our <pre></pre> element

                            vm.model = {}; // this resets the model
                            vm.myForm.$setPristine(); // this resets the form itself

                        })
            }else{
                
                  alert('Form is not valid');
            }
 
 
        }
 
 
 
 
    }]);
</script>


</body>
</html>
