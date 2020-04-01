<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <title>Get @ and #</title>
</head>
<body>

<input type="text" name="inputText" id="inputTxt">
<button>Submit</button>

<script>
$(document).ready(function(){
    $("button").click(function inputContain(@){
        var inputTxt = document.getElementById("inputTxt").value == "@";
        if (inputTxt) {
            alert(inputTxt);
        } else{
            alert('It doesnt has');
        }
    });
});
</script>
    
</body>
</html>