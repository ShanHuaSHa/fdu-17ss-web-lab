<?php

function generateLink($url, $label, $class) {
   $link = '<a href="' . $url . '" class="' . $class . '">';
   $link .= $label;
   $link .= '</a>';
   return $link;
}


function outputPostRow($number)  {
    include("travel-data.inc.php");


    $postId = 'postId'.$number;
    $userId = 'userId'.$number;

    $img = 'thumb'.$number;
    $title ='title'.$number;
    $name = 'userName'.$number;
    $date = 'date'.$number;
    $excerpt = 'excerpt'.$number;
    $reviewsNum ='reviewsNum'.$number;
    $reviewsRating = 'reviewsRating'.$number;

    $div = '<div class="row">';

    $div .= '<img class="col-md-4 pull-left" style ="margin:0"'.'src ="images/'.$$img.'"/>';
    $div .= '<section class="pull-right col-md-8">';
    $div .= '<h2>'.$$title.'</h2>';
    $div .= '<p><span class="pull-left details">POSTED BY '.generateLink("",$$name,"").'</span><span class="pull-right">'.$$date.'</span></p>';
    $div .= '<br/>';
    $div .= '<p class="ratings">'.constructRating($$reviewsRating).' '.$$reviewsNum.' REVIEWS</p>';
    $div .= '<p class="excerpt">'.$$excerpt."</p>";

    $div .= '<button class="btn btn-warning btn-sm">Read more</button>';
    $div .= '</section>';

    $div .= '</div>';

    $div .= '<hr class="col-md-12"/>';
    echo $div;
}

/*
  Function constructs a string containing the <img> tags necessary to display
  star images that reflect a rating out of 5
*/
function constructRating($rating) {
    $imgTags = "";
    
    // first output the gold stars
    for ($i=0; $i < $rating; $i++) {
        $imgTags .= '<img src="images/star-gold.svg" width="16" />';
    }
    
    // then fill remainder with white stars
    for ($i=$rating; $i < 5; $i++) {
        $imgTags .= '<img src="images/star-white.svg" width="16" />';
    }    
    
    return $imgTags;    
}

?>