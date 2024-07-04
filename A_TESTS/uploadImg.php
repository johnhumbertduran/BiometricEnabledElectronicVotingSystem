<style>
    /* Add your styling here */
    .custom_file_upload {
        display: inline-block;
        padding: 6px 12px;
        cursor: pointer;
        /* background-color: #297c2c; this is green */
        background-color: #004ba6;
        color: #fff;
        border: none;
        /* border-radius: 4px; */
        margin-top: 10px;
    }

    .custom_file_upload #post_image {
        display: none;
    }

    .post-image-preview-cursor {
        cursor: pointer;
    }

    #preview {
        position: relative;
        /* background-color: #f1f1f1; this is gray */
        background-color: #d8e6f8;
        width: 100px;
        height: 100px;
        overflow: hidden;
        border-radius: 10px;
    }

    #preview img {
        width: 100%;
        /* Make the image cover the entire width of the container */
        height: 100%;
        /* Make the image cover the entire height of the container */
        object-fit: cover;
        /* Maintain aspect ratio while covering the container */
        display: block;
    }

    /* Centering container */
    .center-container {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        /* Adjust as needed */
    }

    #preview .close-upload-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        color: transparent !important;
        background: transparent url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23ff0000'%3e%3cpath d='M.293.293a1 1 0 011.414 0L8 6.586 14.293.293a1 1 0 111.414 1.414L9.414 8l6.293 6.293a1 1 0 01-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 01-1.414-1.414L6.586 8 .293 1.707a1 1 0 010-1.414z'/%3e%3c/svg%3e") center/1em auto no-repeat;
        border: none !important;
        /* Override Bootstrap styles */
        background-color: #363636;
        display: none;
    }

    .btn-close {
        color: #c025c0 !important;
    }
</style>


<div class="col-md-4 form-group">
    <label for="post_image" class="post-image-preview-cursor">
        <div id="preview" class="center-container">
            <i class="fa-solid fa-camera-retro fa-2xl" id="camera-icon" style="color: #82b0eb; font-size:5em;"></i>
            <button type="button" class="btn-close close-upload-btn" id="close-upload-btn" onclick="removePreview();"></button>
        </div>
    </label>
    <label for="post_image" class="custom_file_upload button-blue">
        <i class="fa-solid fa-file-image" style="color: #ffffff;"></i>
        <span>Add Photo</span>
        <input type="file" name="post_image" class="btn btn-info" id="post_image" onchange="displayPreview(this.files);" accept="image/*">
    </label>
</div>

<script>
    var _URL = window.URL || window.webkitURL;
    var prev = document.getElementById("preview");
    var img = new Image();

    // display the preview here
    function displayPreview(files) {

        var file = files[0];
        var sizeKB = file.size / 1024;

        if (prev == "") {

        } else {

            img.onload = function() {
                $('#preview').append(img);
                $("#close-upload-btn").css("display", "block");
                $("#camera-icon").css("display", "none");
            }
            img.classList.add("post_img");
            img.src = _URL.createObjectURL(file);
        }
    }


    // remove the preview here with the close button
    function removePreview() {
        // Remove the dynamically appended image
        $('#preview').find('img').remove();
        // Optionally hide the close button
        $("#close-upload-btn").css("display", "none");
        $("#camera-icon").css("display", "block");
    }
</script>