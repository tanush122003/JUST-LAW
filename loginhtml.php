<?php
$server= "localhost";
$user= "root";
$password="";
$db="signuppage";

$conn = mysqli_connect($server,$user,$password,$db);

session_start();

if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM login WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if($result->num_rows > 0)
    {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        ?>
        <script>
          alert("Logged in successfully");
          window.location.href="law.html"
        </script>
        <?php
    }
    else
    {
      ?>
      <script>
        alert("email or password incorrect");
      </script>
      <?php
    }
}
?>



<!DOCTYPE html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>login</title>
    <link
      href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css"
      rel="stylesheet"
    />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
</head>
<body class="bg-gray-900">
    <header class="text-gray-400 bg-gray-900 body-font">
        <div
        class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center"
      >
        <a class="flex title-font font-medium items-center text-white mb-4 md:mb-0">
        <img alt="testimonial" class="w-20 h-20 mb-1 object-cover object-center rounded-full inline-block bg-opacity-10" src="assets/images/lady_justice01.png">
        <span class="ml-3 text-3xl">Just Law</span>
        </a>
        <button onclick="window.location.href='law.html';"
          class="md:ml-auto flex flex-wrap items-center text-base justify-center bg-gray-800 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0"
        >
           HOME
          <svg
            fill="none"
            stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            class="w-4 h-4 ml-1"
            viewBox="0 0 24 24"
          >
            <path d="M5 12h14M12 5l7 7-7 7"></path>
          </svg>
        </button>
      </div>
      </header>
      <form action="" method="post">
      <section class="text-gray-600 bg-gray-900 body-font">
        <div class="container px-5 py-24 mx-auto">
          <div class="flex flex-col text-center w-full mb-12">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-400">Welcome Back!</h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Please login with your credentials to continue.</p>
          </div>
          <div class="flex lg:w-2/3 w-full sm:flex-row flex-col mx-auto px-8 sm:space-x-4 sm:space-y-0 space-y-4 sm:px-0 items-end">
            <div class="relative flex-grow w-full">
              <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
              <input type="text" id="email" name="email" class="w-full bg-gray-500 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-transparent focus:ring-2 focus:ring-gray-300 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" placeholder="Registered Email" required>
            </div>
            <div class="relative flex-grow w-full" x-data="{ show: true }">
                <label for="password">Password</label>
                <input :type="show ? 'password' : 'text'" name="password" class="w-full bg-gray-500 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-transparent focus:ring-2 focus:ring-gray-300 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" placeholder="Password"  required>
                <div class=" absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5 ">
                    <p class=" mt-5" @click="show=! show" x-text=" show ? 'Show' : 'Hide' "></p>
                </div>
            </div>
            <button type="submit" name="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Continue</button>
          </div>
        </div>
      </section>
      </form>
      
</body>
</html>