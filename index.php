<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Address Finder</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/main.js"></script>
</head>

<body>
    <h1>Address Finder</h1>

    <div id="content">
        <form action="" method="post">
            <div class="container">
                <div id="title">User Details</div>

                <div>
                    <input type="text" name="name" id="name" placeholder=" First Name" required>
                    <input type="text" name="lastname" id="lastname" placeholder=" Last Name" required>
                </div>

                <div>
                    <input type="text" name="street" id="street" placeholder=" Street / Number" required>
                </div>

                <div>
                    <input type="text" name="city" id="city" placeholder=" City" required>
                </div>

                <div>
                    <input type="text" name="country" id="country" placeholder=" Country" required>
                </div>

                <div>
                    <button id="addUserButton">Add User</button>
                </div>
            </div>

        </form>
    </div>
</body>

</html>