<section class="destination-list">
    <h1>Nos Destinations</h1>

    <?php if (empty($destinations)): ?>
        <p>Aucune destination disponible.</p>
    <?php else: ?>
        <div class="cards-grid">
            <?php foreach ($destinations as $destination): ?>
                <article class="card">
                    <h2><?= htmlspecialchars($destination['nom']) ?></h2>
                    <p class="country">📍 <?= htmlspecialchars($destination['pays']) ?></p>
                    <p class="card-desc"><?= htmlspecialchars(substr($destination['description'], 0, 100)) ?>...</p>
                    <div class="card-links">
                        <a href="/destination/show/<?= $destination['id'] ?>">Voir la destination</a>
                        <a href="/destination/delete/<?= $destination['id'] ?>" onclick="return confirm('Supprimer ?')">🗑 Supprimer</a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <a href="/destination/create" class="btn-add">+ Ajouter une destination</a>
</section>