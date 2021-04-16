<!-- component -->
<nav
        class="flex items-center justify-between flex-wrap bg-white py-4 lg:px-12 shadow border-solid border-t-2 border-blue-700">
    <div class="flex justify-between lg:w-auto w-full lg:border-b-0 pl-6 pr-2 border-solid border-b-2 border-gray-300 pb-5 lg:pb-0">
        <div class="flex items-center flex-shrink-0 text-gray-800 mr-16">
            <a href="accueil"><span class="text-2xl tracking-tight font-bold text-pink-500">Leboncoin</span></a>
        </div>
        <div class="block lg:hidden">
            <button
                    id="nav"
                    class="flex items-center px-3 py-2 border-2 rounded text-blue-700 border-blue-700 hover:text-blue-700 hover:border-blue-700">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>
                        Menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
                </svg>
            </button>
        </div>
    </div>

    <div class="menu w-full lg:block flex-grow lg:flex lg:items-center lg:w-auto lg:px-3 px-8">
        <div class="text-md font-bold text-blue-700 lg:flex-grow">
            <a href="#responsive-header"
               class="block mt-4 lg:inline-block lg:mt-0 hover:text-white px-4 py-2 rounded hover:bg-blue-700 mr-2">
                Véhicules
            </a>
            <a href="#responsive-header"
               class=" block mt-4 lg:inline-block lg:mt-0 hover:text-white px-4 py-2 rounded hover:bg-blue-700 mr-2">
                Immobilier
            </a>
            <a href="#responsive-header"
               class="block mt-4 lg:inline-block lg:mt-0 hover:text-white px-4 py-2 rounded hover:bg-blue-700 mr-2">
                Multimedédia
            </a>
        </div>
        <form class="flex">
            <?php
            if (isset($_SESSION['user_connexion']) && $_SESSION['user_connexion'] === true) {
                ?>
                <div class="flex">
                    <img alt="avatar" class="w-12 h-12 rounded-full border-2 border-blue-700"
                         src="<?= $_SESSION['image'] ?>"/>
                    <p class="ml-6 font-bold text-blue-700 mt-2"><?= $_SESSION['username'] . ' ' . '(' . $_SESSION['role'] . ')' ?></p>
                </div>

                <a href="utilisateur"
                   class=" block text-md px-4 ml-2 py-2 rounded text-blue-700 font-bold hover:text-white mt-4 hover:bg-blue-700 md:mt-0">Mes
                    annonces</a>
                <?php
                if (isset($_SESSION['user_connexion']) && $_SESSION['user_connexion'] === true && $_SESSION['role'] == "admin") {
                    ?>
                    <a href="admin"
                       class=" block text-md px-4 ml-2 py-2 rounded text-blue-700 font-bold hover:text-white mt-4 hover:bg-blue-700 md:mt-0">Gestion des
                        annonces</a>
                <?php } ?>
                <a href="deconnexion"
                   class=" block text-md px-4 ml-2 py-2 rounded text-blue-700 font-bold hover:text-white mt-4 hover:bg-blue-700 md:mt-0">Deconnexion</a>
                <?php
            } else {
                ?>
                <a href="connexion"
                   class=" block text-md px-4  ml-2 py-2 rounded text-blue-700 font-bold hover:text-white mt-4 hover:bg-blue-700 lg:mt-0">Connexion</a>
                <a href="register"
                   class="block text-md px-4 py-2 rounded text-blue-700 ml-2 font-bold hover:text-white mt-4 hover:bg-blue-700 lg:mt-0">Inscription</a>
                <?php
            }
            ?>
        </form>
    </div>
</nav>