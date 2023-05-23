<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>Document</title>
</head>

<body>
    <h1>Image Upload Database to Mysql</h1>
    <br>
    <center>
        <form action="" method="post" id="uploadform" class="formstyle" enctype="multipart/form-data">

            <div class="contentbox">
                <label for="">Name:</label>
                <input type="text" name="name" id="name" value="" placeholder="enter produt name" />
                <br>
            </div>

            <div class="contentbox">
                <label for="">Image:</label>
                <input type="file" name="image" id="image" value="" />
                <br>
            </div>

            <div class="contentbox">
                <input type="submit" name="submit" value="upload" />
            </div>
        </form>

        <div id="targetlayer">---</div>
    </center>

    <center>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
            </tr>
            <tbody id="data">

            </tbody>
        </table>
    </center>
    <img id="img" height=200px; width=150px; />
    <button id="btn">submit</button>

    <script src="jquery.js"></script>
    <script>

    //  image convert blob type
    var simple = ""

    function readFile() {

        if (!this.files || !this.files[0]) return;

        var FR = new FileReader();

        FR.addEventListener("load", function(evt) {
            document.querySelector("#img").src = evt.target.result;
            document.querySelector("#targetlayer").textContent = evt.target.result;
            simple = evt.target.result;
        });

        FR.readAsDataURL(this.files[0]);


    }

    document.querySelector("#image").addEventListener("change", readFile);



    //   image upload url path

    $(document).ready(function() {

        $("#uploadform").on('submit', function(e) {
            console.log(simple);
            e.preventDefault();
            var name = $("#name").val();


            $.ajax({
                url: "upload.php",
                type: "POST",
                data: {
                    name: name,
                    image: simple,
                },
                cache: false,
                success: function(data) {
                    alert(data);
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                }
            });
          
       })
    });

 </script>

 <script>
    $(document).ready(function(){
           getdata();
           })
        function getdata(){
            $.ajax({
            type: "GET",
            url: "view.php",
            dataType: "html",
            success: function(data) {
                $("#data").html(data);
            },
            error:function(xhr, status, error) {
                    console.error(xhr);
                }
        });
        }
 </script>
 







</body>

</html>