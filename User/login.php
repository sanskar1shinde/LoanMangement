<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In and Sign Up Form - Easy Tutorials</title>
    <link rel="stylesheet" href="css/signincss.css">
</head>

<body>
    <div class="container right-panel-active">
        <!-- Sign Up -->
        <div class="container__form container--signup">
            <form action="userinsert.php" class="form" id="form1" method="post" onsubmit="return validateSignUp()">
                <h2 class="form__title">Sign Up</h2>
                <input type="text" placeholder="Name" name="name" class="input">
                <input type="email" placeholder="Email" name="email" class="input">
                <input type="password" placeholder="Password" name="password" class="input">
                <input type="submit" class="btn" value="Sign Up">
            </form>
        </div>

        <!-- Sign In -->
        <div class="container__form container--signin">
            <form action="userlogin.php" class="form" id="form2" method="post" onsubmit="return validateSignIn()">
                <h2 class="form__title">Sign In</h2>
                <input type="email" placeholder="Email" name="email" class="input" />
                <input type="password" placeholder="Password" name="password" class="input" />
                <a href="#" class="link">Forgot your password?</a>
                <button class="btn">Sign In</button>
            </form>
        </div>

        <!-- Overlay -->
        <div class="container__overlay">
            <div class="overlay">
                <div class="overlay__panel overlay--left">
                    <button class="btn" id="signIn">Sign In</button>
                </div>
                <div class="overlay__panel overlay--right">
                    <button class="btn" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const signInBtn = document.getElementById("signIn");
        const signUpBtn = document.getElementById("signUp");
        const fistForm = document.getElementById("form1");
        const secondForm = document.getElementById("form2");
        const container = document.querySelector(".container");

        signInBtn.addEventListener("click", () => {
            container.classList.remove("right-panel-active");
        });

        signUpBtn.addEventListener("click", () => {
            container.classList.add("right-panel-active");
        });
    </script>

    <script>
        function validateSignUp() {
            var name = document.getElementById("form1").elements.namedItem("name").value;
            var email = document.getElementById("form1").elements.namedItem("email").value;

            if (name === "" || name === null) {
                alert("Name can't be blank");
                return false;
            } else if (email === "" || email === null) {
                alert("Email can't be blank");
                return false;
            } 
        }
    </script>

    <script>
        function validateSignIn() {
            var email = document.getElementById("form2").elements.namedItem("email").value;
            var password = document.getElementById("form2").elements.namedItem("password").value;

            if (email === "" || email === null) {
                alert("Email can't be blank");
                return false;
            } else if (password === "" || password === null) {
                alert("Password can't be blank");
                return false;
            } 
        }
    </script>
</body>

</html>
