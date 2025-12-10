<div class="container mt-5">
    <div class="card border-0 shadow-lg">
        <div class="card-body text-center py-5">
            <i class="fas fa-chart-line fa-4x text-success mb-4"></i>
            <h1 class="display-4 fw-bold text-success mb-3">
                <i class="fas fa-trophy"></i>Progression de <?= $_SESSION['nom'] ?>
            </h1>
            <p class="lead text-muted mb-4">
                Votre progression sera suivie ici.
            </p>
            <div class="alert alert-warning" role="alert">
                <i class="fas fa-clock me-2"></i>
                Fonctionnalité en cours de développement.
            </div>
            <div class="progress mb-4" style="height: 20px;">
                <div class="progress-bar bg-success progress-bar-striped progress-bar-animated"
                     style="width: 30%">30%</div>
            </div>
            <a href="?page=accueil" class="btn btn-success btn-lg mt-3">
                <i class="fas fa-arrow-left me-2"></i> Retour au tableau de bord
            </a>
        </div>
    </div>
</div>