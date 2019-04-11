<?php
    function cutParagraph($paragraph, $final_length){
        if( strlen($paragraph) > $final_length ){
            $paragraph = substr($paragraph, 0, $final_length);
            $paragraph = $paragraph."...";
        }
        return $paragraph;
    }
?>
