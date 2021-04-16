<div class="grid md:grid-cols-3 gap-8">
    <?php
    foreach ($details as $detail):
        ?>
        <div class="col-span-2 rounded overflow-hidden shadow-lg ">
            <img class="w-full h-1/2" src="<?php echo $detail['photo_produit'] ?>" alt="Mountain">
            <div class="px-6 py-4">
                <div class="flex items-center">
                    <img class="w-12 h-12 rounded-full border-2 border-blue-700 mr-4 mb-4"
                         src="<?php echo $detail['image_utilisateur'] ?>" alt="Avatar of Jonathan Reinink">
                    <div class="text-sm">
                        <p class="text-black leading-none "><?php echo $detail['prenom_utilisateur'] ?></p>
                        <p class="text-grey-dark">Aug 18</p>
                    </div>
                </div>
                <div class="font-bold text-blue-700 text-xl mb-2"><?php echo $detail['nom_produit'] ?></div>
                <div class="font-bold text-gray-500 text-xl mb-2">Prix: <?php echo $detail['prix_produit'] ?>€
                </div>
                <p class="text-gray-700 text-base">
                    <?php echo $detail['description_produit'] ?>.
                </p>
            </div>
            <hr class="mb-6 mt-6 w-10/12  mx-auto border-gray-700 "/>
            <div class="px-6 pt-4 pb-2 text-center">
                <span class="inline-flex bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"><svg
                            xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
  <path fill-rule="evenodd"
        d="M4 2a2 2 0 00-2 2v11a3 3 0 106 0V4a2 2 0 00-2-2H4zm1 14a1 1 0 100-2 1 1 0 000 2zm5-1.757l4.9-4.9a2 2 0 000-2.828L13.485 5.1a2 2 0 00-2.828 0L10 5.757v8.486zM16 18H9.071l6-6H16a2 2 0 012 2v2a2 2 0 01-2 2z"
        clip-rule="evenodd"/>
</svg><?php echo $detail['type_categorie'] ?></span>
                <span class="inline-flex bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 ml-2 mb-2"><svg
                            xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                            fill="currentColor">
  <path fill-rule="evenodd"
        d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
        clip-rule="evenodd"/>
</svg><?php echo $detail['nom_region'] ?></span>
                <?php

                $date_depot = new DateTime($detail['date_depot']);


                ?>

                <span class="inline-flex bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 ml-2 mb-2"><svg
                            xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                            fill="currentColor">
  <path fill-rule="evenodd"
        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
        clip-rule="evenodd"/>
</svg><?php echo $date_depot->format('d/m/Y' . ' ' . 'à' . ' ' . 'H:i') ?></span>
            </div>
            <hr class="mb-6 mt-6 w-10/12  mx-auto border-gray-700 "/>
            <div class="m-4">
                <iframe class="w-full h-96" allowfullscreen="" frameborder="0"
                        src="https://maps.google.com/maps?q=<?php echo $detail['nom_region'] ?>&output=embed"></iframe>
            </div>
        </div>

        <div class="">

            <div class="w-96 rounded overflow-hidden shadow-2xl ">
                <div class="px-6 py-4">
                    <img class="w-16 h-16 rounded-full border-2 border-blue-700 mr-6 mb-4"
                         src="<?php echo $detail['image_utilisateur'] ?>" alt="Avatar of Jonathan Reinink">
                    <div class="font-bold text-xl mb-2"><?php echo $detail['prenom_utilisateur'] ?></div>
                    <p class="text-gray-700 text-base">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et
                        perferendis eaque, exercitationem praesentium nihil.
                    </p>
                </div>
                <button
                        class="block w-80 mx-auto px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-blue-700 rounded shadow ripple hover:shadow-lg hover:bg-blue-800 focus:outline-none mb-3"
                >
                    Paiement sécurisé
                </button>
                <a href="contact_vendeur&id=<?php echo $detail['id_utilisateur'] ?>"
                   class="block w-80 mx-auto px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-blue-500 rounded shadow ripple hover:shadow-lg hover:bg-blue-800 focus:outline-none mb-3"
                >
                    Envoyer un message
                </a>

                <button
                        class="block w-80 mx-auto px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-pink-500 rounded shadow ripple hover:shadow-lg hover:bg-pink-800 focus:outline-none mb-3"
                >
                    Télécharger l’annonce
                </button>

                <!-- <div class="px-6 pt-4 pb-2">
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
                </div> -->
            </div>
        </div>

    <?php
    endforeach;
    ?>


    