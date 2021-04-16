<?php
if (isset($_SESSION['user_connexion']) && $_SESSION['user_connexion'] === true) {
    //var_dump($_SESSION['id_user']);
    //var_dump($_SESSION['email_user']);
    //var_dump($_SESSION['id_user']);
    //var_dump($_SESSION['image']);
    //var_dump($_SESSION['username']);
    //var_dump($_SESSION['role']);
    ?>


    <!--Card 1-->
    <h1 class="text-4xl text-blue-500 tracking-tight text-center font-bold ml-6 mb-8">GESTION DES ANNONCES</h1>
    <a href="table_utilisateurs"
        class="inline-block px-6 py-2 text-xl font-medium leading-6 text-center text-white uppercase transition bg-pink-500 rounded shadow ripple hover:shadow-lg hover:bg-blue-600 focus:outline-none ml-14 "
    >
        GESTION DES UTILISATEURS
    </a>


    <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">
        <?php foreach ($rows as $row): ?>
            <div class="rounded overflow-hidden shadow-lg">
                <img class="w-full" src="<?php echo $row['photo_produit'] ?>" alt="Mountain">
                <div class="px-6 py-4">
                    <div class="flex items-center">
                        <img class="w-12 h-12 rounded-full border-2 border-blue-700 mr-4 mb-4"
                             src="<?php echo $row['image_utilisateur'] ?>" alt="Avatar of Jonathan Reinink">
                        <div class="text-sm">
                            <p class="text-black leading-none "><?php echo $row['prenom_utilisateur'] ?></p>
                            <!-- <p class="text-grey-dark">Aug 18</p> -->
                        </div>
                    </div>
                    <div class="font-bold text-blue-700 text-xl mb-2"><?php echo $row['nom_produit']?></div>
                    <div class="font-bold text-gray-500 text-xl mb-2">Prix: <?php echo $row['prix_produit'] ?> €</div>
                    <p class="text-gray-700 text-base">
                        <?php echo $row['description_produit'] ?>.
                    </p>
                </div>
                <div class="px-6 pt-4 pb-2">

                <span class="inline-flex bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"><svg
                        xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
  <path fill-rule="evenodd"
        d="M4 2a2 2 0 00-2 2v11a3 3 0 106 0V4a2 2 0 00-2-2H4zm1 14a1 1 0 100-2 1 1 0 000 2zm5-1.757l4.9-4.9a2 2 0 000-2.828L13.485 5.1a2 2 0 00-2.828 0L10 5.757v8.486zM16 18H9.071l6-6H16a2 2 0 012 2v2a2 2 0 01-2 2z"
        clip-rule="evenodd"/>
</svg><?php echo $row['type_categorie'] ?></span>
                    <span class="inline-flex bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 ml-2 mb-2"><svg
                            xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
  <path fill-rule="evenodd"
        d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
        clip-rule="evenodd"/>
</svg><?php echo $row['nom_region'] ?></span>
                    <?php

                    $date_depot = new DateTime($row['date_depot']);


                    ?>

                    <span class="inline-flex bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 ml-2 mb-2"><svg
                            xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
  <path fill-rule="evenodd"
        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
        clip-rule="evenodd"/>
</svg><?php echo $date_depot->format('d/m/Y') ?></span>


                </div>


                <!--   <button
                    class="block mx-auto w-96 px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-blue-700 rounded shadow ripple hover:shadow-lg hover:bg-blue-800 focus:outline-none m-4"
                >
                    Modifier
                </button>-->
                <a href="supprimer_announce&delete_id=<?php echo $row['id_produit'] ?>"
                    class="block mx-auto w-96 px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-pink-500 rounded shadow ripple hover:shadow-lg hover:bg-pink-600 focus:outline-none m-4"
                >
                    Supprimer
                </a>


                <!--
                 <button
                        class="inline-block p-3 text-center text-white transition bg-red-500 rounded-full shadow ripple hover:shadow-lg hover:bg-red-600 focus:outline-none"
                >
                    <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                         fill="currentColor">
                        <path
                                fill-rule="evenodd"
                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                clip-rule="evenodd"
                        />
                    </svg>
                </button>
                <button
                        class="inline-block p-3 text-center transition bg-yellow-500 rounded-full shadow ripple hover:shadow-lg hover:bg-yellow-600 focus:outline-none ml-1.5"
                >
                    <svg  height="20" viewBox="0 0 512.042 512.042" width="20" xmlns="http://www.w3.org/2000/svg"><g><g><path d="m499.261 84.264c-2.809-7.233-8.899-12.48-16.291-14.036-7.555-1.595-15.448.841-21.112 6.506l-52.817 52.816-25.79-25.79 56.174-56.174c5.848-5.848 8.358-13.992 6.718-21.786-1.604-7.62-7.017-13.898-14.477-16.795-49.024-19.044-104.726-7.321-141.908 29.86-19.577 19.577-32.359 44.296-36.976 71.5-.987 4.627-1.943 9.541-2.954 14.738-5.906 30.358-13.256 68.14-34.807 89.689l-192.957 192.958c-23.826 23.826-23.826 62.596 0 86.423 11.914 11.913 27.563 17.869 43.212 17.869 15.648 0 31.298-5.956 43.211-17.869l192.956-192.957c21.551-21.551 59.332-28.9 89.69-34.807 5.198-1.011 10.111-1.967 14.739-2.954 27.204-4.617 51.923-17.399 71.5-36.976 5.776-5.777 7.448-13.618 5.056-20.589 26.215-34.726 32.74-80.67 16.833-121.626zm-23.261 6.611c.881-.88 1.92-1.274 2.851-1.076.799.168 1.393.742 1.768 1.705 12.785 32.919 8.366 69.667-11.27 98.354l-46.166-46.166zm-12.771 121.463c-16.67 16.67-37.727 27.538-60.893 31.432-.146.024-.29.052-.435.083-4.508.964-9.404 1.916-14.588 2.925-33.031 6.426-74.141 14.423-100.014 40.296l-192.954 192.956c-16.027 16.029-42.108 16.028-58.138-.001-16.028-16.028-16.028-42.108 0-58.137l192.957-192.957c25.873-25.872 33.87-66.981 40.296-100.013 1.009-5.184 1.961-10.08 2.925-14.588.031-.145.059-.289.084-.436 3.891-23.164 14.76-44.221 31.432-60.892 21.53-21.531 50.367-33.007 79.74-33.007 13.707 0 27.536 2.501 40.785 7.647 1.205.468 1.927 1.232 2.146 2.271.247 1.173-.223 2.458-1.289 3.523l-63.245 63.245c-3.905 3.905-3.905 10.237 0 14.143l101.246 101.246c.036.035.067.068.094.099-.039.051-.088.104-.149.165z"/></g></g></svg>
                </button>
                 -->
            </div>
        <?php endforeach; ?>
    </div>


    <?php


} else {
    header('Location: connexion');
}


