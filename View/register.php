<?php


?>
<div class="container mx-auto">
    <div class="flex justify-center px-6 my-12">
        <!-- Row -->
        <div class="w-full xl:w-3/4 lg:w-11/12 flex">
            <!-- Col -->
            <div
                    class="w-full h-auto bg-gray-400 hidden lg:block lg:w-5/12 bg-cover rounded-l-lg"
                    style="background-image: url('https://source.unsplash.com/Mv9hjnEUHR4/600x800')"
            ></div>
            <!-- Col -->
            <div class="w-full lg:w-7/12 bg-white p-5 rounded-lg lg:rounded-l-none">
                <h3 class="pt-4 text-2xl text-center font-bold">Créer un compte!</h3>

                <form class="px-8 pt-6 pb-8 mb-4 bg-white rounded" method="post" enctype="multipart/form-data">
                    <!-- profile user image upload -->
                    <?php if (!empty($errors)): ?>
                        <!-- errors alert -->
                        <div role="alert">
                            <?php foreach ($errors as $error): ?>
                                <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2 my-0.5 ">
                                    Erreur !
                                </div>
                                <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                                    <div><?php echo $error ?></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <div class="rounded-full flex w-full items-center justify-center bg-grey-lighter my-5">
                        <label class="rounded-full flex flex-col items-center h-24 w-24 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue-500 cursor-pointer hover:bg-blue-500 hover:text-white">
                            <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 20 20">
                                <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z"/>
                            </svg>
                            <span class="text-center leading-normal">Photo de profile </span>
                            <input type='file' name="image" class="hidden"/>
                        </label>
                    </div>


                    <div class="mb-4 md:flex md:justify-between">
                        <div class="mb-4 md:mr-2 md:mb-0">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="firstName">
                                Prénom
                            </label>
                            <input
                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="firstName"
                                    type="text"
                                    placeholder="Nom"
                                    name="username"
                                    value="<?php echo $username ?>"
                            />
                        </div>

                        <div class="md:ml-2">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="lastName">
                                Nom de famille
                            </label>
                            <input
                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="lastName"
                                    type="text"
                                    placeholder="Nom de famille"
                                    name="user_last_name"
                                    value="<?php echo $user_last_name ?>"
                            />
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                            Email
                        </label>
                        <input
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="email"
                                type="email"
                                placeholder="Email"
                                name="user_email"
                                value="<?php echo $user_email ?>"
                        />
                    </div>
                    <div class="mb-4 md:flex md:justify-between">
                        <div class="mb-4 md:mr-2 md:mb-0">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
                                Mot de passe
                            </label>
                            <input
                                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="password"
                                    type="password"
                                    placeholder="******************"
                                    name="user_password"
                            />
                        </div>
                        <div class="md:ml-2">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="c_password">
                                Confirmez le mot de passe
                            </label>
                            <input
                                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="c_password"
                                    type="password"
                                    placeholder="******************"
                                    name="password_confirm"
                            />
                        </div>
                    </div>

                    <!-- fet the role for user -->
                    <input
                            class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            id="email"
                            type="hidden"
                            placeholder="user"
                            name="role"
                            value="utilisateur"
                    />
                    <div class="mb-6 text-center">
                        <button
                                class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                                type="submit" name="submit_registration"
                        >
                            Créer un compte
                        </button>
                    </div>
                    <hr class="mb-6 border-t"/>
                    <div class="text-center">
                        <a
                                class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
                                href="register"
                        >
                            Mot de passe oublié?
                        </a>
                    </div>
                    <div class="text-center">
                        <a
                                class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
                                href="connexion"
                        >
                            Vous avez déjà un compte? Connexion!
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- </body> -->
