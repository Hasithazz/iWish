<div class="container">
    <br>
    <div class="row">
        <h1>Items</h1>
    </div>
    <br>
    <div class="row">
        <h4>Sharable URL :- &nbsp; </h4> <h4 id="demo"></h4>
    </div>
    <br>
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>URL</th>
            <th>Price</th>
            <th>Priority (0 - Low , 2 - High)</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (isset($items)) {
            foreach ($items as $item) {
                echo '<tr>';
                echo '<td>' . $item->item_name . '</td>';
                echo '<td>' . $item->item_description . '</td>';
                echo '<td>' . $item->item_url . '</td>';
                echo '<td> $' . $item->item_price . '</td>';
                echo '<td id="priority">' . $item->item_priority . '</td>';
                echo '</tr>';
            }
        } else {
            echo "No items";
        }
        ?>
        </tbody>

    </table>

</div>
<script>
    document.getElementById("demo").innerHTML = window.location.href;
    var priority = document.getElementById("priority").textContent;
    switch (priority) {
        case 0:
            document.getElementById("priority").innerHTML = 'Low';
            break;
        case 1:
            document.getElementById("priority").innerHTML = 'Medium';
            break;
        case 2:
            document.getElementById("priority").innerHTML = 'High';
            break;

    }
</script>

