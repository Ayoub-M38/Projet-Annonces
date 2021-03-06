<?php
if (isset($_POST['contact_btn'])){

    $to      = $getUserId['email_utilisateur'];
    $subject = 'Demande de prix';
    $message = $_POST['message'];
    $headers = 'From: a.mchichi@laposte.net' . "\r\n" .
        'Reply-To: a.mchichi@laposte.net' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);
    echo '<div class="flex w-96 mx-auto mb-12 items-center bg-green-500 text-white text-sm font-bold px-4 py-3" role="alert">
  <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
  <p>Votre message à bien été envoyer</p>
</div>';
}
?>

<form method="post" id="contact-me" class="w-full mx-auto max-w-3xl bg-white shadow p-8 text-gray-700">
    <h2 class="w-full my-2 text-3xl font-bold leading-tight my-5">Contacter <?php echo $getUserId['prenom_utilisateur'] ?></h2>
    <!-- name field -->
    <div class="flex flex-wrap mb-6">
        <div class="relative w-full appearance-none label-floating">
            <input class="tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                   id="name" type="text" placeholder="Votre Nom" name="name" required>
            <label for="name"
                   class="absolute tracking-wide py-2 px-4 mb-4 opacity-0 leading-tight block top-0 left-0 cursor-text">
                Votre Nom
            </label>
        </div>
    </div>
    <!-- email field -->
    <div class="flex flex-wrap mb-6">
        <div class="relative w-full appearance-none label-floating">
            <input class="tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                   id="name" type="text" placeholder="Voter Email" name="email" required>
            <label for="name"
                   class="absolute tracking-wide py-2 px-4 mb-4 opacity-0 leading-tight block top-0 left-0 cursor-text">
                Voter Email
            </label>
        </div>
    </div>
    <!-- Message field -->
    <div class="flex flex-wrap mb-6">
        <div class="relative w-full appearance-none label-floating">
            <textarea
                    class="autoexpand tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                    id="message" type="text" placeholder="Message..." name="message"></textarea>
            <label for="message"
                   class="absolute tracking-wide py-2 px-4 mb-4 opacity-0 leading-tight block top-0 left-0 cursor-text">Message...
            </label>
        </div>
    </div>

    <div class="">
        <form method="post">
            <button class="w-full shadow bg-pink-500  focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                    type="submit" name="contact_btn">
                Envoyer
            </button>
        </form>
    </div>
</form>

