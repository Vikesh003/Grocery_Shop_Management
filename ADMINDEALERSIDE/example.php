<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    </head>
    <body>
        <?php
        // put your code here
        ?>
        <input id="AccountText" type="text" name="AccountText" value="" class="form-control" placeholder="Name" required=''/>


<input class="button" type="submit" value="submit">
    </body>
</html>
<script>
    $(document).ready(function(){
   $('.button').click(function(){
        if ($('#AccountText').val() == ""){
            alert('Please complete the field');
        }
    });
});
</script>