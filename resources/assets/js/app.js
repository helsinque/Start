var app = angular.module('app',['ngRoute','app.controllers']);

angular.module('app.controllers',[]);

app.config(['$routerProvider',
    function($routerProvider){
    $routerProvider
        .when('/login',{
            TemplateUrl: 'build/views/login.html',
            controller: 'LoginController'
        }).otherwise({'redirectTo':'/home'})
        .when('/home',{
            TemplateUrl: 'build/views/home.html',
            controller: 'HomeController'
        })
    }
]);