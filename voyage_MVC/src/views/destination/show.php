<section class="destination-detail">
    <a href="/destination/list" class="btn-back">Retour aux destinations</a>

    <div class="detail-card">
        <h1><?php echo htmlspecialchars($destination['nom']); ?></h1>
        <p class="country"><?php echo htmlspecialchars($destination['pays']); ?></p>
        <p><?php echo htmlspecialchars($destination['description']); ?></p>
    </div>
</section>