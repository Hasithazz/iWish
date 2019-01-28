//Backbone model
var ItemListModel = Backbone.Model.extend({
    url: 'http://localhost/iWish/restapi/itemList',
    defaults: {
        id: null,
        item_name: '',
        item_description: '',
        item_url: '',
        item_price: 0.00,
        item_priority: 0,
        parent_wish_list_id:0

    }
});

var WishListModel = Backbone.Model.extend({
    url: 'http://localhost/iWish/restapi/wishList',
    defaults: {
        id: null,
        list_name: null,
        list_description: null,
        list_owner: null
    }
});

var parentListId = 0;

//Backbone collection
var ItemListCollection = Backbone.Collection.extend({
    url: 'http://localhost/iWish/restapi/itemList'
});

var itemListCollection = new ItemListCollection([]);

//Backbone Views


//for one item
var ItemListView = Backbone.View.extend({
    model: new ItemListModel(),
    tagName: 'tr',
    initialize: function () {
        this.template = _.template($('.item-list-template').html());
    },
    events: {
        'click .edit-item-list': 'edit',
        'click .update-item-list': 'update',
        'click .cancel': 'cancel',
        'click .delete-item-list': 'delete'

    },
    edit: function () {
        this.$('.edit-item-list').hide();
        this.$('.delete-item-list').hide();
        this.$('.update-item-list').show();
        this.$('.cancel').show();

        var itemName = this.$('.item-name').html();
        var itemDescription = this.$('.item-description').html();
        var itemUrl = this.$('.item-url').html();
        var itemPrice = this.$('.item-price').html();
        var itemPriority = this.$('.item-priority').html();

        this.$('.item-name').html('<input type="text" class="form-control item-name-update" value="' + itemName + '" >')
        this.$('.item-description').html('<input type="text" class="form-control item-description-update" value="' + itemDescription + '" >')
        this.$('.item-url').html('<input type="text" class="form-control item-url-update" value="' + itemUrl + '" >')
        this.$('.item-price').html('<input type="text" class="form-control item-price-update" value="' + itemPrice + '" >')
        this.$('.item-priority').html('<select class="form-control item-priority-update" value="' + itemPriority + '">' +
            '<option value=2>High</option>' +
            '<option value=1>Medium</option>' +
            '<option value=0>Low</option>' +
            '</select>')


    },
    update: function () {
        this.model.set('item_name', $('.item-name-update').val());
        this.model.set('item_description', $('.item-description-update').val());
        this.model.set('item_url', $('.item-url-update').val());
        this.model.set('item_price', $('.item-price-update').val());
        this.model.set('item_priority', $('.item-priority-update').val());

        this.model.save(null, {
            success: function (response) {
                console.log(response.toJSON());
            },
            error: function () {
                console.log("ERROR did not updated")
            }
        })

    },
    cancel: function () {
        itemListsView.render();
    },
    delete: function () {
        this.model.destroy();
    },
    render: function () {
        this.$el.html(this.template(this.model.toJSON()));
        return this;
    }

});

//for blogs
var ItemListsView = Backbone.View.extend({
    model: itemListCollection,
    el: $('.item-list'),
    initialize: function () {
        var self = this;
        this.model.on('add', this.render, this);
        this.model.on('change', function () {

            setTimeout(function () {
                console.log('changed');
                self.render();
            }, 30);
        }, this);
        this.model.on('remove', function () {
            setTimeout(function () {
                self.render();
            }, 30);
        }, this);
        this.model.fetch({
            success: function (response) {
                _.each(response.toJSON(), function (item) {
                    console.log(item);
                    parentListId = item.parent_wish_list_id;
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
        _.each(this.model.toArray(), function (blog) {
            self.$el.append((new ItemListView({
                model: blog
            })).render().$el);
        });
        return this;
    }
});

var itemListsView = new ItemListsView();

$(document).ready(function () {

    $('.add-item').on('click', function () {

        var itemListModel = new ItemListModel({
            item_name: $('.item-name-input').val(),
            item_description: $('.item-description-input').val(),
            item_url: $('.item-url-input').val(),
            item_price: $('.item-price-input').val(),
            item_priority: $('.item-priority-select').val()
        });
        console.log(itemListModel.toJSON());
        itemListCollection.add(itemListModel);

        itemListModel.save(null, {
            success: function (response) {

                console.log(response.toJSON());

                console.log('Successfully Saved');
            },
            error: function () {
                console.log("failed to save")
            }
        });
    });

    $('#logout-btn').on('click', function () {
        window.location.href = "http://localhost/iWish/BaseController/logOut";
    });
    $('#share-btn').on('click', function () {
        window.location.href = "http://localhost/iWish/BaseController/share/"+parentListId;
    });

});