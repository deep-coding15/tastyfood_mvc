<?php

use App\Utils\Constante;
?>
</main>


<footer class="bg-gray-800 text-white py-4 h-auto md:h-[8vh] fixed bottom-0 left-0 w-full shadow-inner border-t border-gray-700 z-50">
    <div class="max-w-6xl mx-auto px-4 flex flex-col md:flex-row items-center justify-between text-sm gap-y-4 h-full">

        <!-- Bloc 1 : Logo -->
        <div class="w-full md:w-1/3 text-center md:text-left font-semibold">
            Tasty Food
        </div>

        <!-- Bloc 2 : Copyright -->
        <div class="w-full md:w-1/3 text-center text-gray-400">
            © 2025 Merveille Tsafack. Tous droits réservés.
        </div>

        <!-- Bloc 3 : Liens -->
        <div class="w-full md:w-1/3 text-center md:text-right space-x-6">
            <a href="<?= Constante::base_url_vues_client() ?>/accueil.php" class="hover:text-gray-300 transition">Accueil</a>
            <a href="<?= Constante::base_url_vues_client() ?>/a_propos.php" class="hover:text-gray-300 transition">À propos</a>
            <a href="<?= Constante::base_url_vues_client() ?>/contact.php" class="hover:text-gray-300 transition">Contact</a>
            <a href="<?= Constante::base_url_vues_client() ?>/faq.php" class="hover:text-gray-300 transition">FAQ</a>
        </div>

    </div>
</footer>

<script src="https://cdn.tailwindcss.com"></script>
<script>
    // Toggle le menu mobile
    const toggleButton = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    toggleButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>
</body>



</html>