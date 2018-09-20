/**
 * UpLoader v1.00
 * 
 * PHP 5.6
 * 
 * @author Mohamed Yossef <engineer.mohamed.yossef@gmail.com>
 * @copyright UpLoader (C) 2018
 */

$(document).ready(function(){
    /**
     * Show main block and hide other parts.
     */
    $(".main").show();
    $(".upload-form").hide();
    $(".success-msg").hide();
    $("#error").hide();

    /**
     * On click "#open-form" button close main and open upload form.
     */
    $("#open-form").click(function(){
        $(".main").hide();
        $(".upload-form").show();
    });
});