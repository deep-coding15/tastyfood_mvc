<section class="bg-gray-100 flex items-center justify-center h-screen">
  <div class="bg-white shadow-lg rounded-2xl p-8 w-96">
    <h2 class="text-2xl font-bold mb-6 text-center text-indigo-600">Connexion</h2>
    <form method="POST" action="/php/tastyfood_mvc/public/login/traitement" class="space-y-4">
      <!-- Email -->
      <div>
        <label class="block text-gray-700">Email</label>
        <input type="email" name="email" required
          class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-400">
      </div>

      <!-- Mot de passe -->
      <div>
        <label class="block text-gray-700">Mot de passe</label>
        <input type="password" name="password" required
          class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-400">
      </div>

      <!-- Bouton -->
      <button type="submit"
        class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700">
        Se connecter
      </button>
    </form>

    <p class="text-sm text-center mt-4">
      Pas encore de compte ?
      <a href="/php/tastyfood_mvc/public/signup" class="text-indigo-600 hover:underline">Inscription</a>
    </p>
  </div>
</section>