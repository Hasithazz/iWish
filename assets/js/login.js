// //BackBone model
// var UserModel = Backbone.Model.extend({
//     url: function () {
//         return "<?php php echo base_url(login/user" + this.get("user_name") + ")?>"
//     },
//     default: {
//         user_name: '',
//         user_password: ''
//     }
// });

// var UserView = Backbone.View.extend({
//     //model: new UserModel(),
//     //el: '.loginButton',
//     initialize: function () {

//     },
//     events: {
//         'click .loginButton': 'validate'
//     },
//     validate: function () {
//         alert("pressed it");
//         console.log("pressed it");
//     },
//     render: function () {

//     }
// });

// var userView = new UserView();

//Backbone Model

var UserModel = Backbone.Model.extend({
    url: function () {
        return 'http://localhost/iWish/homeController/user?user_name=' + this.get('user_name') + '&user_password=' + this.get('user_password')
    },
    defaults: {
        user_name: null,
        user_password: null
    }
});

//Backbone Collection
var UserCollection = Backbone.Collection.extend({
    url: 'http://localhost/iWish/homeController/user'
});


var users = new UserCollection();

$(document).ready(function () {
    $('.loginButton').on('click', function () {
        var user = new UserModel({
            user_name: $('#userName').val(),
            user_password: $('#userPassword').val()
        });
        console.log(user.toJSON());
        user.fetch({
            success: function (response) {
                console.log(response.toJSON());

            },
            error: function () {
                console.log("ERROR");
            }
        });
    })
});