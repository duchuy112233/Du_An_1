<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gợi ý tìm kiếm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        #search-box {
            width: 300px;
            padding: 10px;
            font-size: 16px;
        }

        #suggestion-list {
            list-style-type: none;
            padding: 0;
            margin: 0;
            border: 1px solid #ccc;
            max-height: 200px;
            overflow-y: auto;
        }

        .suggestion-item {
            padding: 10px;
            cursor: pointer;
            border-bottom: 1px solid #ccc;
        }

        .suggestion-item:last-child {
            border-bottom: none;
        }
    </style>
</head>
<body>

    <h2>Tìm kiếm với gợi ý</h2>

    <input type="text" id="search-box" placeholder="Nhập từ khóa">

    <ul id="suggestion-list"></ul>

    <script>
        // Danh sách gợi ý
        const suggestions = [
            "HTML",
            "CSS",
            "JavaScript",
            "React",
            "Node.js",
            "Python",
            "Java",
            "C#",
            "Git",
            "GitHub"
        ];

        // Lấy các phần tử DOM
        const searchBox = document.getElementById("search-box");
        const suggestionList = document.getElementById("suggestion-list");

        // Xử lý sự kiện khi nhập vào ô tìm kiếm
        searchBox.addEventListener("input", function () {
            const searchText = searchBox.value.toLowerCase();
            const filteredSuggestions = suggestions.filter(suggestion =>
                suggestion.toLowerCase().includes(searchText)
            );

            // Hiển thị danh sách gợi ý
            renderSuggestions(filteredSuggestions);
        });

        // Hiển thị danh sách gợi ý
        function renderSuggestions(suggestions) {
            suggestionList.innerHTML = "";

            if (suggestions.length === 0) {
                suggestionList.style.display = "none";
                return;
            }

            suggestions.forEach(suggestion => {
                const listItem = document.createElement("li");
                listItem.className = "suggestion-item";
                listItem.textContent = suggestion;

                listItem.addEventListener("click", function () {
                    // Xử lý khi người dùng chọn một gợi ý
                    searchBox.value = suggestion;
                    suggestionList.style.display = "none";
                });

                suggestionList.appendChild(listItem);
            });

            suggestionList.style.display = "block";
        }
    </script>

</body>
</html>
