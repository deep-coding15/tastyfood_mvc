<h1 class="text-2xl font-bold mt-12 mb-1 text-gray-800">
    Liste des utilisateurs - Page <?= htmlspecialchars($page) ?>
</h1>

<div class="overflow-x-auto bg-white shadow-md rounded-lg ">
    <table class="min-w-full border border-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-2 border-b text-left text-sm font-medium text-gray-700">ID</th>
                <th class="px-6 py-2 border-b text-left text-sm font-medium text-gray-700">Nom</th>
                <th class="px-6 py-2 border-b text-left text-sm font-medium text-gray-700">Email</th>
                <th class="px-6 py-2 border-b text-left text-sm font-medium text-gray-700">Téléphone</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($utilisateurs)): ?>
                <?php foreach ($utilisateurs as $user): ?>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-3 border-b text-sm text-gray-900"><?= htmlspecialchars($user->getId()) ?></td>
                        <td class="px-6 py-3 border-b text-sm text-gray-900"><?= htmlspecialchars($user->getNom()) ?></td>
                        <td class="px-6 py-3 border-b text-sm text-gray-900"><?= htmlspecialchars($user->getEmail()) ?></td>
                        <td class="px-6 py-3 border-b text-sm text-gray-900"><?= htmlspecialchars($user->getTelephone()) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="px-6 py-3 text-center text-gray-500">Aucun utilisateur trouvé.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Pagination -->
<div class="flex justify-center space-x-4 mt-2 mb-2">
    <a href="?page=<?= max(0, $page - 1) ?>" 
       class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition">
        Précédent
    </a>
    <a href="?page=<?= $page + 1 ?>" 
       class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
        Suivant
    </a>
</div>
