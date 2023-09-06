<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Tailwind Blog Template</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="Learn about us, our mission, and our team.">

    <!-- Tailwind CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }
    </style>

    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</head>
<body class="bg-white font-family-karla">

    <x-top-bar/>

    <!-- Text Header -->
    <x-text-header/>

    <!-- About Us Section -->
    <section class="w-full container mx-auto flex flex-col items-center px-3">
        <article class="flex flex-col shadow my-4">
            <div class="bg-white flex flex-col justify-start p-6">
                <p class="text-3xl font-bold pb-4">About Us</p>
                <p class="text-sm pb-8">
                    Welcome to our blog! Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas mattis est eu odio sagittis tristique. Vestibulum ut finibus leo. In hac habitasse platea dictumst.
                </p>
                <h1 class="text-2xl font-bold pb-3">Our Mission</h1>
                <p class="pb-3">Our mission is to provide valuable content and insights to our readers. We aim to keep you informed and entertained with our articles covering a wide range of topics.</p>
                <h1 class="text-2xl font-bold pb-3">Our Team</h1>
                <p class="pb-3">We are a dedicated team of writers and enthusiasts who are passionate about sharing our knowledge and experiences with you. Meet our team members:</p>
                <!-- Team Member -->
                <div class="flex flex-col md:flex-row shadow bg-white mt-4 p-6">
                    <div class="w-full md:w-1/5 flex justify-center md:justify-start pb-4">
                        <img src="https://source.unsplash.com/collection/1346951/150x150?sig=1" class="rounded-full shadow h-32 w-32">
                    </div>
                    <div class="flex-1 flex flex-col justify-center md:justify-start">
                        <p class="font-semibold text-2xl">David</p>
                        <p class="pt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel neque non libero suscipit suscipit eu eu urna.</p>
                        <div class="flex items-center justify-center md:justify-start text-2xl no-underline text-blue-800 pt-4">
                            <a class="" href="#">
                                <i class="fab fa-facebook"></i>
                            </a>
                            <a class="pl-4" href="#">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a class="pl-4" href="#">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="pl-4" href="#">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Add more team members as needed -->
            </div>
        </article>
    </section>

    <!-- Footer Section -->
    <x-footer/>

    <!-- AlpineJS for the image carousel -->
    <x-sidebar/>


</body>
</html>
