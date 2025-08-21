<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Restaurant TastyFood</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white text-gray-900">

    <!-- HEADER -->
    <header class="bg-white shadow-lg sticky top-0 z-50">
        <div class="container mx-auto flex justify-center items-center justify-between p-4">
            <a href="/php/tastyfood_mvc/" class="text-2xl font-bold text-red-600">TastyFood</a>
            <nav class="space-x-6 hidden md:flex justify-center items-center">
                <a href="/php/tastyfood_mvc/public/client/menu" class="hover:text-red-600">Menu</a>
                <a href="#about" class="hover:text-red-600">À propos</a>
                <a href="#contact" class="hover:text-red-600">Contact</a>
                <a href="#order" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">Commander</a>
            </nav>
        </div>
    </header>

    <!-- HERO -->
    <section class="relative bg-[url('https://images.unsplash.com/photo-1600891964599-f61ba0e24092?auto=format&fit=crop&w=1470&q=80')] bg-cover bg-center h-[100vh] flex items-center justify-center text-center mb-12">
        <div class="bg-black/50 w-full h-full absolute"></div>
        <div class="relative z-10 text-white max-w-2xl">
            <h2 class="text-5xl font-bold mb-4">Savourez l’excellence</h2>
            <p class="text-lg mb-6">Des plats préparés avec passion, servis avec élégance, livrés chez vous en un clic.</p>
            <a href="#menu" class="bg-red-600 text-white px-6 py-3 rounded-lg text-lg font-semibold shadow-lg hover:bg-red-700 transition">Découvrez notre menu</a>
        </div>
    </section>
    <!-- Menu -->
    <section class="relative w-full max-w-4xl mx-auto overflow-hidden mb-12">
        <!-- Container des slides -->
        <div id="carousel" class="flex transition-transform duration-500 ease-in-out">
            <?php foreach ($menus as $key => $menu) : ?>
            <!-- Menu 1 -->
            <div class="min-w-full flex flex-col items-center bg-white shadow-lg rounded-2xl p-6">
                <img src="/images/menu1.jpg" alt="Menu 1" class="w-64 h-40 object-cover rounded-lg mb-4">
                <h2 class="text-2xl font-bold text-gray-800 mb-2"><?= $menu->nom?></h2>
                <p class="text-gray-600 text-center"> <?= $menu->description?></p>
                <p class="text-lg font-semibold text-red-600 mt-3">À partir de  <?= $menu->prix ?> MAD</p>
                <button class="mt-4 bg-red-600 text-white px-5 py-2 rounded-xl hover:bg-red-700">Commander</button>
            </div>
            <?php endforeach; ?>
            <!-- Menu 2 -->
            <div class="min-w-full flex flex-col items-center bg-white shadow-lg rounded-2xl p-6">
                <img src="/images/menu2.jpg" alt="Menu 2" class="w-64 h-40 object-cover rounded-lg mb-4">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Menu Famille</h2>
                <p class="text-gray-600 text-center">Conçu pour partager : de généreuses portions et des saveurs qui rassemblent.</p>
                <p class="text-lg font-semibold text-red-600 mt-3">À partir de 250 MAD</p>
                <button class="mt-4 bg-red-600 text-white px-5 py-2 rounded-xl hover:bg-red-700">Commander</button>
            </div>

            <!-- Menu 3 -->
            <div class="min-w-full flex flex-col items-center bg-white shadow-lg rounded-2xl p-6">
                <img src="/images/menu3.jpg" alt="Menu 3" class="w-64 h-40 object-cover rounded-lg mb-4">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Menu Express</h2>
                <p class="text-gray-600 text-center">Rapide, délicieux et parfait pour vos pauses déjeuner.</p>
                <p class="text-lg font-semibold text-red-600 mt-3">À partir de 90 MAD</p>
                <button class="mt-4 bg-red-600 text-white px-5 py-2 rounded-xl hover:bg-red-700">Commander</button>
            </div>
        </div>

        <!-- Boutons de navigation -->
        <button onclick="prevSlide()" class="absolute top-1/2 left-2 transform -translate-y-1/2 bg-gray-800 text-white p-3 rounded-full hover:bg-gray-600">
            &#10094;
        </button>
        <button onclick="nextSlide()" class="absolute top-1/2 right-2 transform -translate-y-1/2 bg-gray-800 text-white p-3 rounded-full hover:bg-gray-600">
            &#10095;
        </button>
    </section>

    <script>
        const carousel = document.getElementById("carousel");
        let index = 0;

        function showSlide() {
            carousel.style.transform = `translateX(${-index * 100}%)`;
        }

        function nextSlide() {
            if (index < carousel.children.length - 1) {
                index++;
            } else {
                index = 0; // revenir au premier menu
            }
            showSlide();
        }

        function prevSlide() {
            if (index > 0) {
                index--;
            } else {
                index = carousel.children.length - 1; // aller au dernier menu
            }
            showSlide();
        }
        setInterval( () => nextSlide(), 5000
        );
    </script>


    <!-- SECTION A PROPOS -->
    <section id="about" class="py-16 mb-12">
        <div class="container mx-auto flex flex-col md:flex-row items-center gap-10">
            <img src="https://images.unsplash.com/photo-1600891964903-7b3f30b7cb04?auto=format&fit=crop&w=900&q=80" class="w-full md:w-1/2 rounded-lg shadow-lg" alt="Restaurant">
            <div class="md:w-1/2">
                <h3 class="text-3xl font-bold mb-4">Pourquoi TastyFood ?</h3>
                <p class="text-gray-600 mb-4">Nous croyons que chaque repas doit être une expérience inoubliable. Chez <span class="font-semibold">TastyFood</span>, nous allions authenticité, fraîcheur et modernité pour satisfaire toutes vos envies.</p>
                <ul class="space-y-3 text-gray-700">
                    <li>✔️ Ingrédients frais et locaux</li>
                    <li>✔️ Livraison rapide et fiable</li>
                    <li>✔️ Service chaleureux et attentionné</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- SECTION CALL TO ACTION -->
    <section id="order" class="py-16 bg-red-600 text-white text-center ">
        <h3 class="text-3xl font-bold mb-4">Prêt à vous régaler ?</h3>
        <p class="mb-6">Commandez dès maintenant et profitez d’une expérience culinaire unique chez vous.</p>
        <a href="/php/tastyfood_mvc/public/plat/" class="bg-white text-red-600 px-6 py-3 rounded-lg text-lg font-semibold hover:bg-gray-200 transition">Je commande un plat</a>
        <a href="/php/tastyfood_mvc/public/menu" class="bg-white text-red-600 px-6 py-3 rounded-lg text-lg font-semibold hover:bg-gray-200 transition">Je commande un menu</a>
    </section>

    <!-- FOOTER -->
    <footer class="bg-gray-900 text-gray-400 py-6 text-center">
        <p>&copy; 2025 TastyFood. Tous droits réservés.</p>
    </footer>

</body>

</html>