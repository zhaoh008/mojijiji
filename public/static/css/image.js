
$(function() {
    $("#file_upload").uploadify({
        'swf'           : '__PUBLIC__/css/uploadify.swf',
        'uploader'      : '__PUBLIC__/css/uploadify.php',
        'buttonText' : 'BROWSE...',
        'onUploadStart' : function(file) {
            alert('Starting to upload ' + file.name);
        }
    });
});