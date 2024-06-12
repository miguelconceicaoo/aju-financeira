<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Document</title>
</head>

<body>







    <form id="my-form" action="" method="post">
        <div id="input-container">
            <div class="input-group">
                <input type="text" name="fields[]">
                <select name="fields[]">
                    <option value="option1">Option 1</option>
                    <option value="option2">Option 2</option>
                    <option value="option3">Option 3</option>
                </select>
                <button class="remove-button">Remove</button>
            </div>
        </div>
        <button id="add-button">Add</button>
        <input type="submit" value="Submit">
    </form>

    <script>
        $(document).ready(function() {
            $("#add-button").click(function(event) {
                event.preventDefault();
                $("#my-form").append(` <div class = "input-group" >
                                    <input type = "text"name = "fields[]" >
                                    <select name = "fields[]" >
                                    <option value = "option1" > Option 1 </option> 
                                    <option value = "option2" > Option 2 </option>
                                    <option value = "option3" > Option 3 </option>
                                    </select> 
                                    <button class = "remove-button" > Remove </button> 
                                    </div>`);
            });
            $(document).on("click", ".remove-button", function() {
                $(this).closest(".input-group").remove();
            });
        });
    </script>

</body>

</html>