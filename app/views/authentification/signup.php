<section class="bg-gray-100 flex items-center justify-center h-screen m-12">
  <div class="bg-white shadow-lg rounded-2xl p-8 w-96">
    <h2 class="text-2xl font-bold mb-6 text-center text-green-600">Inscription</h2>
    
    <form method="POST" action="traitement_signup.php" class="space-y-4">
      <!-- Nom -->
      <div>
        <label class="block text-gray-700">Nom</label>
        <input type="text" name="nom" required
               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400">
      </div>
      <div>
        <label class="block text-gray-700">Prénom</label>
        <input type="text" name="prenom" required
               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400">
      </div>

      <!-- Email -->
      <div>
        <label class="block text-gray-700">Email</label>
        <input type="email" name="email" required
               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400">
      </div>

      <!-- Mot de passe -->
      <div>
        <label class="block text-gray-700">Mot de passe</label>
        <input type="password" name="password" required
               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400">
      </div>

      <!-- Confirmation -->
      <div>
        <label class="block text-gray-700">Confirmer mot de passe</label>
        <input type="password" name="password_confirm" required
               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400">
      </div>

      <!-- Bouton -->
      <button type="submit"
              class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700">
        S’inscrire
      </button>
    </form>

    <p class="text-sm text-center mt-4">
      Déjà inscrit ? 
      <a href="login.php" class="text-green-600 hover:underline">Se connecter</a>
    </p>
  </div>
</section>

