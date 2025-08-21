<div class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white shadow-lg rounded-2xl p-6 max-w-md text-center">
        <h1 class="text-2xl font-bold text-green-600 mb-4">✅ Succès !</h1>
        <p class="text-gray-700 mb-6">
            <?= htmlspecialchars($message ?? "L’action a été réalisée avec succès.") ?>
        </p>
        <a href="/php/tastyfood_mvc/public/admin/plat" 
           class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition">
            Retour à la page d'accueil
        </a>
    </div>
</div>