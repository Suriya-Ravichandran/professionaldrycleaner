<?php

class template{

    // Template Loading function
    function load_template($folder,$name){
        include $_SERVER['DOCUMENT_ROOT']."/professionaldrycleaner/htdocs/$folder/$name.php";
    }

}