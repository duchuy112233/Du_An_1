<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">

    <style>
        .banner {
            width: 100%;
            min-width: 300px;
            text-align: center;
            position: relative;
            margin-bottom: 30px;
        }
        .banner img {
            width: 100%;
            height: 400px;
        }
        .pre,
        .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease-in-out;
            border-radius: 0 3px 3px 0;
            border: none;
        }
        .pre:hover,
        .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }
        .pre {
            left: 0;
            border-radius: 0 3px 3px 0;
        }
    </style>
</head>

<body>
    <div class="banner">
        <img id="banner" src="image/anh1.jpg">
        <button class="pre" onclick="pre()">&#10094;</button>
        <button class="next" onclick="next()">&#10095;</button>
    </div>
    <script>
        var album = [];
        for (var i = 1; i < 4; i++) {
            album[i] = new Image();
            album[i].src = "image/anh" + i + ".jpg";
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