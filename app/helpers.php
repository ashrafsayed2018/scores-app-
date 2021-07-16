<?php

use App\Post;
use App\Score;

function current_user() {

    return auth()->user();
}

// arabic slug
function make_slug($string = null, $separator = "-") {
    if (is_null($string)) {
        return "";
    }

    // Remove spaces from the beginning and from the end of the string
    $string = trim($string);

    // Lower case everything
    // using mb_strtolower() function is important for non-Latin UTF-8 string | more info: https://www.php.net/manual/en/function.mb-strtolower.php
    $string = mb_strtolower($string, "UTF-8");;

    // Make alphanumeric (removes all other characters)
    // this makes the string safe especially when used as a part of a URL
    // this keeps latin characters and arabic charactrs as well
    $string = preg_replace("/[^a-z0-9_\s\-ءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]#u/", "", $string);

    // Remove multiple dashes or whitespaces
    $string = preg_replace("/[\s-]+/", " ", $string);

    // Convert whitespaces and underscore to the given separator
    $string = preg_replace("/[\s_]/", $separator, $string);

    return $string;
}

// the first image of the post
function firstPostImage ($post) {
    $allImages =  $post->firstPostImage->image;
    $firstImage = $allImages[0];
    return 'storage/post_images/'. $firstImage;
}

// post all images
function allPostImages ($post) {
    $allImages =  $post->firstPostImage->image;
    return $allImages;

}

// arbic date method
function ArabicDate() {
    $months = array("Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر");
    $your_date = date('y-m-d'); // The Current Date
    $en_month = date("M", strtotime($your_date));
    foreach ($months as $en => $ar) {
        if ($en == $en_month) { $ar_month = $ar; }
    }

    $find = array ("Sat", "Sun", "Mon", "Tue", "Wed" , "Thu", "Fri");
    $replace = array ("السبت", "الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة");
    $ar_day_format = date('D'); // The Current Day
    $ar_day = str_replace($find, $replace, $ar_day_format);

    header('Content-Type: text/html; charset=utf-8');
    $standard = array("0","1","2","3","4","5","6","7","8","9");
    $eastern_arabic_symbols = array("٠","١","٢","٣","٤","٥","٦","٧","٨","٩");
    $current_date = $ar_day.' '.date('d').' / '.$ar_month.' / '.date('Y');
    $arabic_date = str_replace($standard , $eastern_arabic_symbols , $current_date);

    return $arabic_date;
}

// show all the recommended posts
function recommendedPosts($post) {

    if($post->child_category_id) {
        $recommended = Post::where('child_category_id', $post->child_category_id)->get();
    }

    if($post->sub_category_id && ! $post->child_category_id) {

        $recommended = Post::where('sub_category_id', $post->sub_category_id )->get();
    }

    if($post->category_id && ! $post->sub_category_id) {

        $recommended = Post::where('category_id', $post->category_id )->get();
    }

    return $recommended;
}

// get the scores of the user
function getUserScore($user_id) {

    return  Score::where('user_id', $user_id)->sum('scores');
}

// the user can post

function UserCanPost($user_id) {

    // check if the user has points to submit post
    $postsCount = Post::where('user_id', $user_id)->count();
    $userScore =  getUserScore($user_id); // user scores
    $limit = 5;  // the limit per post
    // get the used pointz
    $usedPoints = $limit * $postsCount;
    $theReminderScores =  $userScore - $usedPoints;  // the reminder points

    if($theReminderScores >= 5) {
        return true;
    } else {
        return false;
    }
}
