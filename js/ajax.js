/**
 * UpLoader v1.00
 * 
 * PHP 5.6
 * 
 * @author Mohamed Yossef <engineer.mohamed.yossef@gmail.com>
 * @copyright UpLoader (C) 2018
 */

$(document).ready(function(){
    $(".form").on('submit', function(e){
        /**
         * @var object file_data hold file element content
         * @var object form_data hold upload form data
         */
        var file_data = $("#file").prop("files")[0];   
        var form_data = new FormData();       
        
        form_data.append('file_name', $("#file-name").val());
        form_data.append('uploaded-file', file_data);
        
        e.preventDefault();
        $.ajax({
            url: "inc/upload.inc.php",
            type: "POST",
            processData: false,
            contentType: false,
            data: form_data,
            success: function(res){
                /** Print suitable message for each error **/
                if (res == 'success') {
                    $(".upload-form").hide();
                    $(".success-msg").show();
                }
                else if (res == 'empty name') {
                    $("#error").html("Invalid File Name!").show();
                }
                else if (res == 'big file') {
                    $("#error").html("Big File Size!").show();
                }
                else if (res == 'database error') {
                    $("#error").html("Connection Error!").show();
                }
                else if (res == 'file error') {
                    $("#error").html("Invalid File!").show();
                }
            },
            error: function(e){
                $("#error").html("Unknown error, please try again later!").show();
            }          
        });    
    });
});
