<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <style>
        .parentDiv{
            padding: 15px;
        }
        #form{
            border: 1px solid;
        }
        #table{
            border: 1px solid;
            width: 100%;
            text-align: left;
        }
    </style>
</head>
<body>
    
<h2>Form</h2>
    <form id="form">
        @csrf
        <div class="parentDiv">
        <label>Product Name:</label>
        <br>
        <input type="text" name="productName">
        </div>
        <div class="parentDiv">
        <label>Quantity in Stock:</label>
        <br>
        <input type="number" name="quantity">
        </div>
        <div class="parentDiv">
        <label>Price per item:</label>
        <br>
        <input type="number" name="price">
        </div>
        <div class="parentDiv">
        <button>Submit</button>
    </div>
    </form>
    <h2>Data Submitted</h2>
    <table id="table">
        <tr>
            <th>Product Name</th>
            <th>Quantity in Stock</th>
            <th>Price Per Item</th>
            <th>Datetime submitted</th>
            <th>Total Value Number</th>
        </tr>
    </table>
<script type="text/javascript" src="{{ URL::asset('js/script.js') }}"></script>
</body>
</html>