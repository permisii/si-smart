<?php include_once('../template/header.php') ?>

<div class="w-screen h-screen">
    <div class="flex justify-items-center items-center">
        <div class="hidden md:flex w-full h-screen bg-login-siswa bg-cover bg-center bg-no-repeat ">
        </div>
        <div class="w-full flex-col justify-items-center mt-16 md:m-0">
            <h3 class="text-center text-gray-400 dark:text-white">Login sebagai siswa</h3>
            <form class="max-w-md mx-auto my-5" action="../../api/auth/auth.php" method="post">
                <div class="mb-5">
                    <label for="email" class="form-label text-secondary text-gray-400 dark:text-white">Email</label>
                    <input type="email" class="border rounded w-full py-1.5 border-gray-400 mt-1" id="email" name="email" required>
                </div>
                <div class="mb-5">
                    <label for="password" class="form-label text-secondary text-gray-400 dark:text-white">Password</label>
                    <input type="password" class="border rounded w-full py-1.5 border-gray-400 mt-1" id="password" name="password" required>
                </div>

                <input type="hidden" name="role" value="siswa">
                <button type="submit" class="w-full bg-orange-500 rounded py-1.5 text-white" name="login">Login</button>
            </form>
            <p class="text-center text-gray-400 dark:text-white">Belum memiliki akun? <a class="text-orange-500" href="./register.php">Klik Disini</a></p>
        </div>
    </div>
</div>

<?php include_once('../template/footer.php') ?>