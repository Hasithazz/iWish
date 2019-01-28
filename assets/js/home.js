//Backbone Model
var WishListModel = Backbone.Model.extend({
    defaults: {
        id: 0,
        list_name: '',
        list_description: '',
        list_owner: ''
    }
});

var WishListCollection = Backbone.Collection.extend({
    url: 'http://localhost/iWish/restapi/wishList'
});

var wishListCollection = new WishListCollection();

var WishListView = Backbone.View.extend({
    //el: '.content',
    model: new WishListModel(),
    tagName: 'div',
    initialize: function () {
        this.template = _.template($('#wish-list-template').html());
    },
    events: {},
    render: function () {

        // this.$el.html(this.template());
        // console.log("Lets do this shit");
        // return this;

        this.$el.html(this.template(this.model.toJSON()));
        return this;
    }
});

var WishListsView = Backbone.View.extend({
    model: wishListCollection,
    el: $('#wish-list-template-items'),
    initialize: function () {
        var self = this;
        this.model.on('add', this.render, this);
        this.model.on('change', function () {
            setTimeout(function () {
                self.render();
            }, 30);
        }, this);
        this.model.on('remove', this.render, this);
        this.model.fetch({
            success: function (response) {
                _.each(response.toJSON(), function (wl) {
                    console.log(wl);
                });
            },
            error: function () {
                console.log("ERROR");
            }
        })
    },
    render: function () {
        var self = this;
        this.$el.html('');
        _.each(this.model.toArray(), function (wishList) {
            self.$el.append((new WishListView({
                model: wishList
            })).render().$el);
        });
        return this;
    }
});

var WishListContentView = Backbone.View.extend({
    el: $('#content'),
    template: $("#wish-list-content-load-template").html(),
    initialize: function () {
        this.render();
    },
    render: function () {
        var template = _.template(this.template);
        this.$el.html(template());
        return this;
    }

});

var wishListsView = new WishListsView();

$(document).ready(function () {
   // var wishListContent = new WishListContentView();

    $("#add-wishList-btn").on('click', function () {
        console.log("add wishlist clicked");
        var wishListContent = new WishListContentView();
    })


});