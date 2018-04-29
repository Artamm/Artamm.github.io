<?php

if (isset($_POST['submit'])){


    require_once "crypt.php";
}
?>

<!DOCTYPE HTML>
<html>
<header>
<title>"Encrypt and decrypt text</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="design.css">
</header>
<body style="margin-top: 100px;">

<div class="container-fluid">

    <div class="row self-align-center justify-content-center">
        <div class="col-md-6 main justify-content-center self-align-center">
            <form method="POST" >
            <div class="form-group text-center "  style="padding: 10px 15px">
                <label for="TextForEncryption">Paste or write your text here</label>
                <textarea type="text" id="encText" class="form-control" id="TextForEncryption" name="encText"
                          placeholder="Enter text" required style= "margin-bottom:10px" style="padding: 10px 15px" ></textarea>

                <label for="EncrDecr">Choose what you need to do with this text:<br> </label>
                <div id="EncrDecr">
                    <input type="radio" id="encr"  name="choice1" value="encrypt">
                    <label for="contactChoice1">Encrypt</label>

                    <input type="radio" id="decr"
                           name="choice1" value="decrypt">
                    <label for="decr">Decrypt</label>
                </div>
<label for="EncryptStyle">Choose what kind of encryption you want to use:</label>
<div id="EncryptStyle">
        <input type="radio" id="caesar" onclick="caesar_key()"
               name="choice2" value="caesar">
     <label for="caesar">Caesar</label>
</div>


    <input type="number" min="0" class="self-align-center" max="26" name="key_caesar" id="key_caesar" placeholder="Key" style="display: none">





<input type="submit" name="submit" onclick="clearContents(output_text); Enter()" class="btn submit" value="Get text">

            </div>

            </form>

            <textarea name="output_text" id="output" rows="10" placeholder="Your output will be here"><?php if (isset($_POST['submit'])){echo $result; } ?></textarea>
            <button onclick="CopyTextfromOutput()" class="btn">Insert text from output</button>

        </div>

    </div>


</div>


</body>
</html>
<script>
    function caesar_key() {
        if (document.getElementById('caesar').checked) {
            document.getElementById('key_caesar').style.display = "block";
        }
        if (!(document.getElementById('caesar').checked)) {
            document.getElementById('key_caesar').style.display = "none";
        }

    }
    function clearContents(element) {
        document.getElementById(element).value = '';
        if (!$("input[name='choice1']:checked").val()) {
            alert('Nothing is checked!');
        }

    }
    function CopyTextfromOutput(){

        document.getElementById('encText').value = document.getElementById('output').value;
    }


</script>
<script>
    function Enter() {

            var xmlhttp = new XMLHttpRequest();

            xmlhttp.open("POST", "crypt.php?q=", true);
            xmlhttp.send();
        }

</script>