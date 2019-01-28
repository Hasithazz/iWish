var UserModel = Backbone.Model.extend({
    url: function () {
        return 'http://localhost/iWish/homeController/user?user_name=' + this.get('user_name') + '&user_password=' + this.get('user_password')
    },
    defaults: {
        user_name: null,
        user_password: null
    }
});

var UserDetailModel = Backbone.Model.extend({

    url: 'http://localhost/iWish/restapi/wishlist',
    defaults: {
        user_name: null,
        user_password: null,
        list_name: null,
        list_description: null,
        list_owner: null
    }
});

//Backbone Collection
var UserCollection = Backbone.Collection.extend({
    url: 'http://localhost/iWish/homeController/user'
});

var users = new UserCollection();

var UserLoginView = Backbone.View.extend({
    el: '#view-loader',
    template: _.template($('.login-view-template').html()),
    initialize: function () {
        this.render();
    },
    render: function () {
        this.$el.html(this.template());
        return this;
    }
});

var userLoginView = new UserLoginView();

var UserRegisterView = Backbone.View.extend({
    model: new UserDetailModel(),
    el: '#view-loader',
    template: _.template($('.register-view-template').html()),
    initialize: function () {
        this.render();
    },
    events: {
        'click #registerButton': 'register',
        'click #backButton': 'back'
    },
    register: function () {
        console.log("register");

        var userName = $('#userName').val();
        var userPassword = $('#userPassword').val();
        var userPasswordConfirm = $('#userPasswordConfirm').val();
        var wishListName = $('#wishListName').val();
        var wishListDescription = $('#wishListDescription').val();
        var list_owner = userName;


        if (userName && userPassword && userPasswordConfirm && wishListName && wishListDescription && list_owner) {
            if (userPassword == userPasswordConfirm) {
                this.model.set('user_name', userName);
                this.model.set('user_password', userPassword);
                this.model.set('list_name', wishListName);
                this.model.set('list_description', wishListDescription);
                this.model.set('list_owner', list_owner);

                this.model.save(null, {
                    success: function (response) {
                        console.log(response.toJSON());

                        alert("Registered log in to continue");
                            window.location.reload();
                    },
                    error: function (response) {
                        console.log("ERROR did not registered");
                        alert("User name already taken");
                    }
                });

            } else {
                alert("Password Mismatch");
            }
        } else {
            alert("Missing Field values");
        }
    },
    back: function () {
        console.log("back");
        var userLoginView2 = new UserLoginView();
    },
    render: function () {
        this.$el.html(this.template());
        return this;
    }
});


function login() {

    var user = new UserModel({
        user_name: $('#userName').val(),
        user_password: $('#userPassword').val()
    });
    console.log(user.toJSON());
    user.fetch({
        success: function (response) {
            console.log(response.toJSON());
            window.location.href = "http://localhost/iWish/BaseController";
        },
        error: function () {
            console.log("ERROR");
        }
    });
}

$(document).ready(function () {
    $('.loginButton').on('click', function () {
        login();
    });
    $('#registerViewButton').on('click', function () {
        var userRegisterView = new UserRegisterView();
    });
});