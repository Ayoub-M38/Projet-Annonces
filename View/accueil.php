
<form method="post">
    <div class="font-sans text-black flex items-center justify-center">
        <div class="border rounded overflow-hidden flex">
            <input name="search" type="text" class="px-4 py-2" placeholder="Search...">
            <button type="submit" class="flex items-center justify-center px-4 border-l">
                <svg class="h-4 w-4 text-grey-dark" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M16.32 14.9l5.39 5.4a1 1 0 0 1-1.42 1.4l-5.38-5.38a8 8 0 1 1 1.41-1.41zM10 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12z"/></svg>
            </button>
        </div>
    </div>
</form>

<div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">
    <?php foreach ($resultS as $row): ?>
        <a href="details&product_id=<?= $row['id_produit'] ?>" class="rounded overflow-hidden shadow-lg">
            <img class="w-full" src="<?php echo $row['photo_produit'] ?>" alt="Mountain">
            <div class="px-6 py-4">
                <div class="flex items-center">
                    <img class="w-12 h-12 rounded-full border-2 border-blue-700 mr-4 mb-4"
                         src="<?php echo $row['image_utilisateur'] ?>" alt="Avatar of Jonathan Reinink">
                    <div class="text-sm">
                        <p class="text-black leading-none "><?php echo $row['prenom_utilisateur'] ?></p>
                        <p class="text-grey-dark">Aug 18</p>
                    </div>
                </div>
                <div class="font-bold text-blue-700 text-xl mb-2"><?php echo $row['nom_produit'] ?></div>
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
        </a>

    <?php endforeach; ?>
</div>

