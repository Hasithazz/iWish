<!--
/**
 * Created by PhpStorm.
 * User: hsedi
 * Date: 1/24/2019
 * Time: 1:30 PM
 */ -->

<div class="container">
    <br>
    <div class="row col-md-12">
        <div class="col-md-8">
            <h1>iWish</h1>
        </div>
        <div class="col-md-2">
            <div class="btn btn-primary" id="share-btn"> Share &nbsp;<i class="fas fa-share-alt"></i></div>
        </div>
        <div class="col-md-2">
            <div class="btn btn-danger" id="logout-btn"> logout <i class="fas fa-sign-out-alt"></i></div>
        </div>

    </div>
    <br>
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>URL</th>
            <th>Price</th>

            <th>Priority</th>
        </tr>
        <tr>
            <td><input class="form-control item-name-input"></td>
            <td><input class="form-control item-description-input"></td>
            <td><input class="form-control item-url-input"></td>
            <td><input class="form-control item-price-input"></td>
            <td>
                <select class="form-control item-priority-select">
                    <option value=2>High</option>
                    <option value=1>Medium</option>
                    <option value=0>Low</option>
                </select>
            <td>
                <button class="btn btn-primary btn-sm add-item">Add <i class="fas fa-plus-circle"></i></button>
            </td>
        </tr>
        </thead>
        <tbody class="item-list"></tbody>
    </table>
</div>

<script type="text/template" class="item-list-template">
    <td><span class="item-name"><%= item_name %></span></td>
    <td><span class="item-description"><%= item_description %></span></td>
    <td><span class="item-url"><%= item_url %></span></td>
    <td><span class="item-price">$<%= item_price %></span></td>
    <td><span class="item-priority"><%= item_priority %></span></td>
    <td>
        <button class="btn btn-warning btn-sm edit-item-list" style="margin-bottom: 5px;">Edit <i
                    class="fas fa-edit"></i></button>
        <button class="btn btn-danger btn-sm delete-item-list">Delete <i class="fas fa-minus-circle"></i></button>
        <button class="btn btn-warning btn-sm update-item-list" style="display:none; margin-bottom: 5px;">Update <i
                    class="fas fa-edit"></i></button>
        <button class="btn btn-danger btn-sm cancel" style="display:none">Cancel <i class="fas fa-ban"></i></button>
    </td>
</script>

<script src="<?php echo base_url('assets/js/homeTwo.js') ?>"></script>
