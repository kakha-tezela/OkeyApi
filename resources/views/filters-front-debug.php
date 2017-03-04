<!DOCTYPE html>
<html>
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product filter debug</title>

    <link rel="stylesheet" type="text/css" href="https://dl.dropboxusercontent.com/u/174720494/Trash/europa/ion.rangeSlider.css">
    <link rel="stylesheet" type="text/css" href="https://dl.dropboxusercontent.com/u/174720494/Trash/europa/ion.rangeSlider.skinHTML5.css">
</head>
<body>

    <div id="app">
        
        <div v-for="item in productsData" track-by="$index">
            <h2>{{item.name}}</h2>
        </div>

        <hr>

        <div class="slider1">
            <br><br>
            <input type="text" id="example_id" name="example_name" value="" />
            <br><br>
        </div>

        <hr>

        <ul v-for="(specNameTitle, row) in filterData">
            <li>
                {{specNameTitle}}
                <ul>
                    <li v-for="item in row">
                        <label>
                            <input type="checkbox" @click="checkFilter($event, specNameTitle, item.specNameValue)"> {{item.specNameValue + item.unit}}
                        </label>
                    </li>
                </ul>
            </li>
        </ul>

    </div>


<script src="build/vendorFiltersDebug.bundle.js"></script>
<script src="https://dl.dropboxusercontent.com/u/174720494/Trash/europa/ion.rangeSlider.min.js"></script>
<script src="build/mainFiltersDebug.bundle.js"></script>

</body>
</html>