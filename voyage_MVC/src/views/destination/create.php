<section class="destination-list">
    <h1>Ajouter une destination</h1>
    <form method="POST" action="/destination/create">
        <label>Nom</label>
        <input type="text" name="nom" required>

        <label>Pays</label>
        <input type="text" name="pays" required>

        <label>Description</label>
        <textarea name="description" required></textarea>

        <button type="submit">Ajouter</button>
    </form>
    <a href="/destination/list" class="btn-back">← Retour</a>
</section>