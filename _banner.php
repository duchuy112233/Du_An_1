<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  
</head>

<body>
    <div class="banner">
        <img id="banner" src="assets/image/anh1.jpg" >
        <button class="pre" onclick="pre()">&#10094;</button>
        <button class="next" onclick="next()">&#10095;</button>
    </div>
    <script>
        var album = [];
        for (var i = 1; i < 5; i++) {
            album[i] = new Image();
            album[i].src = "assets/image/anh" + i + ".jpg";
        }
        var interval = setInterval(slideshow, 1500);
        index = 0;
        function slideshow() {
            index++;
            if (index > 3) {
                index = 0;
            }
            document.getElementById("banner").src = album[index].src;
        }

        function next() {
            index++;
            if (index > 3) {
                index = 0;
            }
            document.getElementById("banner").src = album[index].src;
        }
        function pre() {
            index--;
            if (index < 0) {
                index = 3;
            }
            document.getElementById("banner").src = album[index].src;

        }
    </script>
</body>
</html>