<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendataan Kerja Sama</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <script>
        tailwind.config = {
            theme: {
                fontFamily: {
                    poppins: ['Poppins', 'sans-serif'],
                }
            }
        }
    </script>
</head>

<body class="font-poppins min-h-screen bg-gradient-to-r from-[#70CAD4] to-[#9BF8F4] flex items-center justify-center p-4">

    <div class="flex flex-col md:flex-row items-center justify-center gap-x-24 gap-y-12 w-full">

        <!-- Login Form -->
        <div class="w-full md:w-[500px] text-white">
            <h1 class="text-5xl font-extrabold text-center mt-10">LOGIN</h1>
            <p class="text-center mb-16">Sistem Pendataan Kerja Sama</p>

            <!-- Form -->
            <div class="space-y-5">
                <div>
                    <label class="block mb-1 pl-2">Username</label>
                    <input type="text"
                        class="w-full h-[54px] rounded-xl border-2 border-white bg-white/10 px-4 text-white outline-none">
                </div>

                <div>
                    <label class="block mb-1 pl-2">Password</label>
                    <input type="password"
                        class="w-full h-[54px] rounded-xl border-2 border-white bg-white/10 px-4 text-white outline-none">
                </div>
            </div>

            <!-- Checkbox -->
            <div class="flex items-center gap-2 mt-4">
                <input type="checkbox" class="w-5 h-5 accent-white">
                <p>Remember me</p>
            </div>

            <!-- Button -->
            <button
                class="mt-10 w-full h-[54px] bg-[#17304B]/70 rounded-xl text-2xl font-bold hover:bg-[#17304B] transition">
                LOGIN
            </button>

            <!-- Signup -->
            <p class="mt-4">
                Don't have an account?
                <a href="#" class="underline font-semibold">Sign Up</a>
            </p>
        </div>

        <!-- Image -->
        <div class="hidden md:flex md:justify-center border-2 border-white rounded-xl p-5">
            <img src="img/gambar login.png" alt="Login Image" class="max-h-[500px]">
        </div>

    </div>

</body>

</html>
