<?php

$q = $_POST["q"];

if($q == 1){
    $location = $_POST["location"];
    //after every letter, after every vowel, before every vowel, every other letter
    
    $text = $_POST["text"];
    $key = $_POST["key"];
    $type = $_POST["type"];
    $keys = explode(", ", $key);
    $key_choice = 0;
    $footer = "";//"KEY: ".$key;
    $vowels = array("a", "A", "e", "E", "i", "I", "o", "O", "u", "U", "y", "Y");
    $vowels2 = array("oba", "obA", "obe", "obE", "obi", "obI", "obo", "obO", "obu", "obU");
    if($location == "every_letter"){
        if($type=="translate"){
            $footer = $footer;// . "\nAfter every letter";
            $nobreak_text = str_replace("\n\n", "", $text);
            $nobreak_text = str_replace("\r\r", "", $nobreak_text);
            $nobreak_text = str_replace("\r\n\r\n", "", $nobreak_text);
            $text_exploded = str_split(str_replace($footer, "", $nobreak_text));
            $length = count($text_exploded);
            
            for($i = 0; $i < $length; $i+=1){
                if($key_choice > count($keys)-1){
                    $key_choice = 0;
                }
                if($text_exploded[$i] != " " && $text_exploded[$i] != "\n" && $text_exploded[$i] != "\r" && $text_exploded[$i] != "\r\n" && $text_exploded[$i] != "." && $text_exploded[$i] != "?" && $text_exploded[$i] != "!" && $text_exploded[$i] != ","){
                    $text_exploded[$i] = $text_exploded[$i] . $keys[$key_choice];
                }
                $key_choice += 1;
            }
            $final_text = implode($text_exploded);
        }
        if($type=="decrypt"){
            //$text_exploded = explode($key, $text);
            $final_text = str_replace("\n\n", "", $text);
            $final_text = str_replace("\r\r", "", $final_text);
            $final_text = str_replace("\r\n\r\n", "", $final_text);
            $final_text = str_replace($footer, "", $final_text);
            //$final_text = $text;
            
            for($j = 0; $j < count($keys) ; $j+=1){
                $final_text = str_replace($keys[$j], "", $final_text);
            }
            
            $final_text = $final_text;
        }
    }else if($location == "after_vowels"){
        if($type=="translate"){
            $footer = $footer;// . "\nAfter every vowel";
            $nobreak_text = str_replace("\n\n", "", $text);
            $nobreak_text = str_replace("\r\r", "", $nobreak_text);
            $nobreak_text = str_replace("\r\n\r\n", "", $nobreak_text);
            $text_exploded = str_split(str_replace($footer, "", $nobreak_text));
            $length = count($text_exploded);
            
            for($i = 0; $i < $length; $i+=1){
                if($key_choice > count($keys)-1){
                    $key_choice = 0;
                }
                $isVowel = false;
                if(in_array($text_exploded[$i], $vowels)){
                    $isVowel = true;
                }
                if($text_exploded[$i] != " " && $text_exploded[$i] != "\n" && $text_exploded[$i] != "\r" && $text_exploded[$i] != "\r\n" && $text_exploded[$i] != "." && $text_exploded[$i] != "?" && $text_exploded[$i] != "!" && $text_exploded[$i] != "," && $isVowel == true){
                    $text_exploded[$i] = $text_exploded[$i] . $keys[$key_choice];
                }
                $key_choice += 1;
            }
            $final_text = implode($text_exploded);
        }
        if($type=="decrypt"){
            //$text_exploded = explode($key, $text);
            $final_text = str_replace("\n\n", "", $text);
            $final_text = str_replace("\r\r", "", $final_text);
            $final_text = str_replace("\r\n\r\n", "", $final_text);
            $final_text = str_replace($footer, "", $final_text);
            //$final_text = $text;
            
            for($j = 0; $j < count($keys) ; $j+=1){
                $final_text = str_replace($keys[$j], "", $final_text);
            }
            
            $final_text = $final_text;
        }
    }else if($location == "before_vowels"){
        if($type=="translate"){
            $footer = "";//$footer;// . "\nBefore every vowel";
            $nobreak_text = str_replace("\n\n", "", $text);
            $nobreak_text = str_replace("\r\r", "", $nobreak_text);
            $nobreak_text = str_replace("\r\n\r\n", "", $nobreak_text);
            $text_exploded = str_split(str_replace($footer, "", $nobreak_text));
            $length = count($text_exploded);
            
            for($i = 0; $i < $length; $i+=1){
                
                $i2 = $i - 1;
                $isVowel = false;
                if($key_choice > count($keys)-1){
                    $key_choice = 0;
                }
                if(in_array($text_exploded[$i], $vowels)){
                    $isVowel = true;
                }
                if(in_array($text_exploded[$i2], $vowels2)){
                    $isVowel = false;
                }
                if($text_exploded[$i] == 'Y' && $text_exploded[$i2] == ' ' || $text_exploded[$i] == 'Y' && $text_exploded[$i2] == '' || $text_exploded[$i] == 'y' && $text_exploded[$i2] == ' ' || $text_exploded[$i] == 'y' && $text_exploded[$i2] == '' || $text_exploded[$i] == 'u' && $text_exploded[$i+1] == 'a' || $text_exploded[$i] == 'u' && $text_exploded[$i+1] == 'i'){
                        $isVowel = false;
                }
                if($text_exploded[$i] != " " && $text_exploded[$i] != "\n" && $text_exploded[$i] != "\r" && $text_exploded[$i] != "\r\n" && $text_exploded[$i] != "." && $text_exploded[$i] != "?" && $text_exploded[$i] != "!" && $text_exploded[$i] != "," && $isVowel == true){
                    $text_exploded[$i] = $keys[$key_choice] . $text_exploded[$i];
                }
                $key_choice += 1;
                
            }
            $final_text = implode($text_exploded);
        }
        if($type=="decrypt"){
            //$text_exploded = explode($key, $text);
            $final_text = str_replace("\n\n", "", $text);
            $final_text = str_replace("\r\r", "", $final_text);
            $final_text = str_replace("\r\n\r\n", "", $final_text);
            $final_text = str_replace($footer, "", $final_text);
            //$final_text = $text;
            
            for($j = 0; $j < count($keys) ; $j+=1){
                $final_text = str_replace($keys[$j], "", $final_text);
            }
            
            $final_text = $final_text;
        }
    }else if($location == "every_other"){
        if($type=="translate"){
            $footer = $footer;// . "\nAfter every other letter";
            $nobreak_text = str_replace("\n\n", "", $text);
            $nobreak_text = str_replace("\r\r", "", $nobreak_text);
            $nobreak_text = str_replace("\r\n\r\n", "", $nobreak_text);
            $text_exploded = str_split(str_replace($footer, "", $nobreak_text));
            $length = count($text_exploded);
            
            for($i = 1; $i < $length; $i+=2){
                if($key_choice > count($keys)-1){
                    $key_choice = 0;
                }
                if($text_exploded[$i] != " " && $text_exploded[$i] != "\n" && $text_exploded[$i] != "\r" && $text_exploded[$i] != "\r\n" && $text_exploded[$i] != "." && $text_exploded[$i] != "?" && $text_exploded[$i] != "!" && $text_exploded[$i] != ","){
                    $text_exploded[$i] = $text_exploded[$i] . $keys[$key_choice];
                }
                $key_choice += 1;
            }
            $final_text = implode($text_exploded);
        }
        if($type=="decrypt"){
            //$text_exploded = explode($key, $text);
            $final_text = str_replace("\n\n", "", $text);
            $final_text = str_replace("\r\r", "", $final_text);
            $final_text = str_replace("\r\n\r\n", "", $final_text);
            $final_text = str_replace($footer, "", $final_text);
            //$final_text = $text;
            
            for($j = 0; $j < count($keys) ; $j+=1){
                $final_text = str_replace($keys[$j], "", $final_text);
            }
            
            $final_text = $final_text;
        }
    }
} else{
    $final_text = "Enter Text...";
    $key = "";
}

?>
<head>
    <title>Decoder</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
    <style>
        body{
            background: #E6E6E6;
            font-family: 'Open Sans', sans-serif;
            text-align: center;
        }
        a{
            color: black;
            border-bottom: 2px dotted black;
            
            text-decoration: none;
            
            transition: all 0.4s;
            -webkit-transition: all 0.4s;
        }
        a:hover{
            color: gray;
            border-bottom: 2px dotted gray;
        }
    </style>
</head>
<form action="index.php" method="post" style="text-align:center;font-size:20px;font-family:'sans-serif';margin:100px;">
    Key(s) List: <input type="input" name="key" value="<?php echo $key; ?>" style="font-size:20px;font-family:'sans-serif';">
    <select name="location">
        <?php
            if($location == "before_vowels"){
                echo '<option value="before_vowels">Key Before Every Vowel</option><option value="every_letter">Key Every Letter</option><option value="after_vowels">Key After Every Vowel</option><option value="every_other">Key Every Other Letter</option>';
            } else if($location == "every_letter"){
                echo '<option value="every_letter">Key Every Letter</option><option value="before_vowels">Key Before Every Vowel</option><option value="after_vowels">Key After Every Vowel</option><option value="every_other">Key Every Other Letter</option>';
            } else if($location == "after_vowels"){
                echo '<option value="after_vowels">Key After Every Vowel</option><option value="every_letter">Key Every Letter</option><option value="before_vowels">Key Before Every Vowel</option><option value="every_other">Key Every Other Letter</option>';
            } else if($location == "every_other"){
                echo '<option value="every_other">Key Every Other Letter</option><option value="every_letter">Key Every Letter</option><option value="before_vowels">Key Before Every Vowel</option><option value="after_vowels">Key After Every Vowel</option>';
            } else {
                echo '<option value="before_vowels">Key Before Every Vowel</option><option value="every_letter">Key Every Letter</option><option value="after_vowels">Key After Every Vowel</option><option value="every_other">Key Every Other Letter</option>';
            }
        ?>
    </select><br><br>
    <textarea name="text" rows=10 cols=40 style="font-size:20px;font-family:'sans-serif';padding:10px;"><?php echo $final_text; ?></textarea><br><br>
    <?php
        if($type == "translate"){
            echo 'Encrypt: <input type="radio" name="type" value="translate"><br>Decrypt: <input type="radio" name="type" value="decrypt" checked><br><br>';
        } else if($type == "decrypt"){
            echo 'Encrypt: <input type="radio" name="type" value="translate" checked><br>Decrypt: <input type="radio" name="type" value="decrypt"><br><br>';
        } else {
            echo 'Encrypt: <input type="radio" name="type" value="translate" checked><br>Decrypt: <input type="radio" name="type" value="decrypt"><br><br>';
        }
    ?>
    <input type="hidden" name="q" value=1>
    <input type="submit" value="Submit">&nbsp&nbsp&nbsp<input type="button" value="Reset" onclick='window.open("index.php", "_self")'>
</form>
<h4>Developed By <a href="http://lucademian.com/" title="Check Out My Website" target="_blank">Luca Demian</a></h4>