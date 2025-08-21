    </main>
    <footer class="bg-gray-800 text-white py-4 fixed bottom-0 inset-x-0 z-50">
      <div class="max-w-6xl mx-auto px-4 flex flex-col md:flex-row items-center justify-between text-sm">
        <div class="font-semibold">Tasty Food</div>
        <div class="text-gray-400">© 2025 Merveille Tsafack. Tous droits réservés.</div>
        <div class="space-x-4">
          <a href="..." class="hover:text-gray-300 transition">Accueil</a>
          <a href="..." class="hover:text-gray-300 transition">À propos</a>
          <a href="..." class="hover:text-gray-300 transition">Contact</a>
          <a href="..." class="hover:text-gray-300 transition">FAQ</a>
        </div>
      </div>
    </footer>
    <script>
      const toggleButton = document.getElementById('menu-toggle');
      const mobileMenu = document.getElementById('mobile-menu');

      toggleButton?.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
      });
    </script>

    </body>
    
</html>