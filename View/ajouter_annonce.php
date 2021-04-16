<?php

if (isset($_SESSION['user_connexion']) && $_SESSION['user_connexion'] === true) {



    ?>
    <h1 class="text-4xl text-blue-500 tracking-tight text-center font-bold ml-6 mb-8 font-sans">Ajouter une annonce</h1>
    <form class="w-full mx-auto max-w-lg m-4" method="post" enctype="multipart/form-data">
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Titre
                </label>
                <input name="nom_produit" class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                       id="grid-first-name" type="text" placeholder="Titre de votre annonce"
                       required>
            </div>

        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                    Description
                </label>
                <textarea name="description_produit"
                          class="w-full h-36 px-3 py-2 text-base bg-gray-200 text-gray-700 leading-tight focus:outline-none focus:bg-white"
                          placeholder="Description de votre annonce" required></textarea>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-2">
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                    Prix
                </label>
                <input name="prix_produit"
                       class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                       id="grid-city" type="number" step="any" placeholder="Prix de votre produit ou service" required>
            </div>
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                    Catégories
                </label>
                <div class="relative">
                    <select name="categorie_id"
                            class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-state" required>
                        <option value="">Catégories</option>
                        <?php fetchCategories(); ?>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <input type="hidden" value="<?= $_SESSION['id_user'] ?>" name="id_user">

            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                    Régions
                </label>
                <div class="relative">
                    <select name="region_id"
                            class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-state" required>
                        <option value="">Régions</option>
                        <?php fetchRegions(); ?>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <input type="date" name="date_depot" value="">
        <div>
            <label class="block text-sm font-medium text-gray-700">
                Photos
            </label>
            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md bg-gray-200">
                <div class="space-y-1 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48"
                         aria-hidden="true">
                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                              stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <div class="flex text-sm text-gray-600">
                        <label for="file-upload"
                               class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                            <span>Télécharger un fichier</span>
                            <input id="file-upload" name="photo_produit" type="file" class="sr-only" required>
                        </label>
                        <p class="pl-1">or drag and drop ici</p>
                    </div>
                    <p class="text-xs text-gray-500">
                        PNG, JPG, GIF up to 10MB
                    </p>
                </div>
            </div>
            <div class="px-4 float-left py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit" name="btn_addAnnonce"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Publier votre annonce
                </button>
            </div>
    </form>

    <?php


    if (isset($_FILES['photo_produit'])) {
        $uplaoddir = 'C:\xampp\htdocs\annonces\images\\';
        $name = $_FILES['photo_produit']['name'];
        $_POST['photo_produit'] = 'images/' . $name;

        if (is_uploaded_file($_FILES['photo_produit']['tmp_name'])) {

            move_uploaded_file($_FILES['photo_produit']['tmp_name'], $uplaoddir . $name);
        }

    }
} else {
    header('Location: http://localhost/annonces/connexion');
}


