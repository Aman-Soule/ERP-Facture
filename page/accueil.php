<!-- Styles supplémentaires pour le dashboard étudiant -->
<style>
    :root {
        --primary-color: #4361ee;
        --secondary-color: #3a0ca3;
        --success-color: #4cc9f0;
        --warning-color: #f72585;
        --danger-color: #7209b7;
        --light-color: #f8f9fa;
        --dark-color: #212529;
        --accent-color: #4895ef;
    }

    .dashboard-header {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        color: white;
        padding: 2rem 0;
        border-radius: 15px;
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
    }

    .dashboard-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 400px;
        height: 400px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
    }

    .stat-card {
        transition: transform 0.3s, box-shadow 0.3s;
        border: none;
        border-radius: 15px;
        overflow: hidden;
        cursor: pointer;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }

    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        margin-bottom: 15px;
    }

    .stat-value {
        font-size: 2.2rem;
        font-weight: 700;
        line-height: 1;
    }

    .stat-label {
        color: #6c757d;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .quick-action-card {
        background: var(--light-color);
        border-radius: 12px;
        padding: 1.5rem;
        height: 100%;
        transition: all 0.3s;
        border: 2px solid transparent;
    }

    .quick-action-card:hover {
        border-color: var(--primary-color);
        background: white;
        transform: scale(1.05);
    }

    .quick-action-icon {
        width: 50px;
        height: 50px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        margin-bottom: 1rem;
    }

    .recent-activity {
        max-height: 400px;
        overflow-y: auto;
    }

    .activity-item {
        padding: 1rem;
        border-left: 4px solid var(--primary-color);
        background: var(--light-color);
        margin-bottom: 10px;
        border-radius: 8px;
    }

    .activity-time {
        font-size: 0.8rem;
        color: #6c757d;
    }

    .chart-container {
        background: white;
        border-radius: 15px;
        padding: 1.5rem;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }

    .welcome-badge {
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        border-radius: 50px;
        padding: 0.5rem 1.5rem;
        display: inline-block;
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    /* Styles pour le quiz */
    .quiz-container {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        border-radius: 15px;
        padding: 2rem;
    }

    .quiz-question {
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
    }

    .quiz-option {
        padding: 1rem;
        margin-bottom: 0.5rem;
        border-radius: 10px;
        background: white;
        cursor: pointer;
        transition: all 0.3s;
        border: 2px solid transparent;
    }

    .quiz-option:hover {
        border-color: var(--primary-color);
        transform: translateX(5px);
    }

    .quiz-option.selected {
        border-color: var(--success-color);
        background: rgba(76, 201, 240, 0.1);
    }

    .quiz-progress {
        height: 8px;
        border-radius: 4px;
        margin: 1rem 0;
    }

    .motivation-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 15px;
        padding: 1.5rem;
        margin-bottom: 1rem;
    }

    .deadline-item {
        padding: 0.8rem;
        border-radius: 10px;
        background: rgba(248, 249, 250, 0.8);
        margin-bottom: 0.5rem;
        border-left: 4px solid var(--warning-color);
    }

    .deadline-urgent {
        border-left-color: var(--danger-color);
        background: rgba(247, 37, 133, 0.1);
    }

    .course-progress {
        height: 8px;
        border-radius: 4px;
        margin: 0.5rem 0;
    }

    .iq-score {
        font-size: 3rem;
        font-weight: 800;
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    @media (max-width: 768px) {
        .stat-value {
            font-size: 1.8rem;
        }
        .dashboard-header {
            padding: 1.5rem 0;
        }
        .iq-score {
            font-size: 2rem;
        }
    }
</style>

<!-- Header du Dashboard (gardé tel quel) -->
<div class="dashboard-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <span class="welcome-badge mb-3">
                    <i class="fas fa-calendar-day me-2"></i><?php echo date('d/m/Y'); ?>
                </span>
                <h1 class="display-5 fw-bold mb-3">
                    Bonjour, <?php echo htmlspecialchars($_SESSION['nom']); ?> !
                    <i class="fas fa-graduation-cap ms-2"></i>
                </h1>
                <p class="lead mb-0 opacity-75">
                    Votre succès académique commence ici. Suivez votre progression !
                </p>
            </div>
            <div class="col-md-4 text-end">
                <div class="avatar-container">
                    <div class="position-relative d-inline-block">
                        <div class="bg-white rounded-circle p-3">
                            <i class="fas fa-user-graduate text-primary fa-3x"></i>
                        </div>
                        <span class="position-absolute top-0 start-100 translate-middle p-2 bg-success border border-light rounded-circle">
                            <span class="visually-hidden">En ligne</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section Statistiques Étudiant -->
<div class="container mb-5">
    <div class="row g-4">
        <!-- Moyenne Générale -->
        <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="stat-card card border-0 shadow-sm" onclick="showGradeDetails()">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon bg-primary bg-opacity-10 text-primary me-3">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div>
                            <div class="stat-label">Moyenne Générale</div>
                            <div class="stat-value" id="moyenneGenerale">0.0</div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="progress course-progress">
                            <div class="progress-bar bg-primary" style="width: 0%" id="moyenneProgress"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cours en cours -->
        <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="stat-card card border-0 shadow-sm" onclick="window.location.href='?page=cours'">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon bg-success bg-opacity-10 text-success me-3">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <div>
                            <div class="stat-label">Cours Actifs</div>
                            <div class="stat-value" id="coursActifs">0</div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="badge bg-success bg-opacity-10 text-success">
                            <i class="fas fa-clock me-1"></i> 5 ce semestre
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Heures d'étude -->
        <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="stat-card card border-0 shadow-sm" onclick="showStudyStats()">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon bg-warning bg-opacity-10 text-warning me-3">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div>
                            <div class="stat-label">Heures cette semaine</div>
                            <div class="stat-value" id="heuresEtude">0h</div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="badge bg-warning bg-opacity-10 text-warning">
                            <i class="fas fa-fire me-1"></i> +15%
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Score QI -->
        <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="stat-card card border-0 shadow-sm" onclick="startQuiz()">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon bg-danger bg-opacity-10 text-danger me-3">
                            <i class="fas fa-brain"></i>
                        </div>
                        <div>
                            <div class="stat-label">Score QI estimé</div>
                            <div class="iq-score" id="scoreQI">--</div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="badge bg-danger bg-opacity-10 text-danger">
                            <i class="fas fa-redo me-1"></i> Mettre à jour
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section Principale -->
<div class="container mb-5">
    <div class="row g-4">
        <!-- Quiz QI et Deadlines -->
        <div class="col-lg-8">
            <!-- Mini Quiz QI -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-0">
                    <h4 class="card-title mb-0">
                        <i class="fas fa-brain text-primary me-2"></i>Mini Test QI Rapide
                        <span class="badge bg-primary float-end" id="quizProgress">Question 1/5</span>
                    </h4>
                </div>
                <div class="card-body quiz-container">
                    <div class="quiz-question" id="quizQuestion">
                        Quelle est la prochaine lettre dans la séquence : A, C, E, G, ?
                    </div>

                    <div class="quiz-options">
                        <div class="quiz-option" data-answer="H" onclick="selectAnswer(this)">
                            A) H
                        </div>
                        <div class="quiz-option" data-answer="I" onclick="selectAnswer(this)">
                            B) I
                        </div>
                        <div class="quiz-option" data-answer="J" onclick="selectAnswer(this)">
                            C) J
                        </div>
                        <div class="quiz-option" data-answer="K" onclick="selectAnswer(this)">
                            D) K
                        </div>
                    </div>

                    <div class="quiz-progress progress">
                        <div class="progress-bar bg-success" id="quizProgressBar" style="width: 20%"></div>
                    </div>

                    <div class="text-center mt-3">
                        <button class="btn btn-primary" onclick="submitQuiz()" id="submitQuizBtn">
                            <i class="fas fa-paper-plane me-2"></i>Soumettre
                        </button>
                        <button class="btn btn-outline-secondary ms-2" onclick="nextQuestion()" id="nextQuizBtn">
                            <i class="fas fa-arrow-right me-2"></i>Suivant
                        </button>
                    </div>
                </div>
            </div>

            <!-- Deadlines et Progression -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-white border-0">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-calendar-times text-warning me-2"></i>Prochaines Échéances
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="deadline-item">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6 class="mb-1">Mathématiques</h6>
                                        <p class="mb-0 small">Devoir Maison #3</p>
                                    </div>
                                    <span class="badge bg-warning">Dans 2 jours</span>
                                </div>
                            </div>

                            <div class="deadline-item deadline-urgent">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6 class="mb-1">Physique</h6>
                                        <p class="mb-0 small">Projet de recherche</p>
                                    </div>
                                    <span class="badge bg-danger">Demain</span>
                                </div>
                            </div>

                            <div class="deadline-item">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6 class="mb-1">Anglais</h6>
                                        <p class="mb-0 small">Présentation orale</p>
                                    </div>
                                    <span class="badge bg-info">Dans 5 jours</span>
                                </div>
                            </div>

                            <div class="text-center mt-3">
                                <a href="?page=calendrier" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-calendar-alt me-1"></i> Voir calendrier complet
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-white border-0">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-trophy text-success me-2"></i>Progression
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="d-flex justify-content-between mb-1">
                                    <span>Mathématiques</span>
                                    <span>85%</span>
                                </div>
                                <div class="progress course-progress">
                                    <div class="progress-bar bg-primary" style="width: 85%"></div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="d-flex justify-content-between mb-1">
                                    <span>Physique</span>
                                    <span>72%</span>
                                </div>
                                <div class="progress course-progress">
                                    <div class="progress-bar bg-success" style="width: 72%"></div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="d-flex justify-content-between mb-1">
                                    <span>Anglais</span>
                                    <span>90%</span>
                                </div>
                                <div class="progress course-progress">
                                    <div class="progress-bar bg-warning" style="width: 90%"></div>
                                </div>
                            </div>

                            <div class="text-center mt-4">
                                <div class="motivation-card">
                                    <h6 class="mb-2"><i class="fas fa-quote-left me-2"></i>Citation du jour</h6>
                                    <p class="mb-0 small" id="dailyQuote">"Le succès n'est pas final, l'échec n'est pas fatal : c'est le courage de continuer qui compte."</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions Rapides & Activités -->
        <div class="col-lg-4">
            <!-- Actions Rapides -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-0">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-bolt text-warning me-2"></i>Actions Rapides
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row g-2">
                        <div class="col-6">
                            <a href="?page=cours" class="text-decoration-none">
                                <div class="quick-action-card text-center">
                                    <div class="quick-action-icon bg-primary bg-opacity-10 text-primary mx-auto">
                                        <i class="fas fa-book"></i>
                                    </div>
                                    <h6 class="mb-1">Mes Cours</h6>
                                </div>
                            </a>
                        </div>

                        <div class="col-6">
                            <a href="?page=devoirs" class="text-decoration-none">
                                <div class="quick-action-card text-center">
                                    <div class="quick-action-icon bg-success bg-opacity-10 text-success mx-auto">
                                        <i class="fas fa-tasks"></i>
                                    </div>
                                    <h6 class="mb-1">Devoirs</h6>
                                </div>
                            </a>
                        </div>

                        <div class="col-6">
                            <a href="?page=notes" class="text-decoration-none">
                                <div class="quick-action-card text-center">
                                    <div class="quick-action-icon bg-warning bg-opacity-10 text-warning mx-auto">
                                        <i class="fas fa-chart-bar"></i>
                                    </div>
                                    <h6 class="mb-1">Notes</h6>
                                </div>
                            </a>
                        </div>

                        <div class="col-6">
                            <a href="?page=ressources" class="text-decoration-none">
                                <div class="quick-action-card text-center">
                                    <div class="quick-action-icon bg-info bg-opacity-10 text-info mx-auto">
                                        <i class="fas fa-file-download"></i>
                                    </div>
                                    <h6 class="mb-1">Ressources</h6>
                                </div>
                            </a>
                        </div>

                        <div class="col-6">
                            <a href="?page=planning" class="text-decoration-none">
                                <div class="quick-action-card text-center">
                                    <div class="quick-action-icon bg-danger bg-opacity-10 text-danger mx-auto">
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>
                                    <h6 class="mb-1">Planning</h6>
                                </div>
                            </a>
                        </div>

                        <div class="col-6">
                            <a href="?page=forum" class="text-decoration-none">
                                <div class="quick-action-card text-center">
                                    <div class="quick-action-icon bg-secondary bg-opacity-10 text-secondary mx-auto">
                                        <i class="fas fa-comments"></i>
                                    </div>
                                    <h6 class="mb-1">Forum</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Activités Récentes -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-history text-info me-2"></i>Activités Récentes
                    </h5>
                </div>
                <div class="card-body recent-activity">
                    <div class="activity-item">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h6 class="mb-1">Devoir soumis</h6>
                                <p class="mb-0 text-muted small">Mathématiques - DM #2</p>
                            </div>
                            <span class="activity-time">Il y a 2h</span>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h6 class="mb-1">Note reçue</h6>
                                <p class="mb-0 text-muted small">Physique - 16/20</p>
                            </div>
                            <span class="activity-time">Hier</span>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h6 class="mb-1">Cours terminé</h6>
                                <p class="mb-0 text-muted small">Chapitre 3 - Algèbre</p>
                            </div>
                            <span class="activity-time">Il y a 2 jours</span>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h6 class="mb-1">Ressource ajoutée</h6>
                                <p class="mb-0 text-muted small">Fiches de révision</p>
                            </div>
                            <span class="activity-time">Il y a 3 jours</span>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h6 class="mb-1">Message forum</h6>
                                <p class="mb-0 text-muted small">Question sur l'exercice</p>
                            </div>
                            <span class="activity-time">Il y a 4 jours</span>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white border-0 text-center">
                    <a href="?page=activites" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-list me-1"></i> Voir toutes les activités
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section Objectifs d'Apprentissage -->
<div class="container mb-5">
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-0">
            <h4 class="card-title mb-0">
                <i class="fas fa-bullseye text-success me-2"></i>Objectifs de la Semaine
            </h4>
        </div>
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <i class="fas fa-check-circle text-success fa-2x"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">Révision quotidienne</h6>
                                    <div class="progress course-progress">
                                        <div class="progress-bar bg-success" style="width: 80%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <i class="fas fa-running text-warning fa-2x"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">Exercices pratiques</h6>
                                    <div class="progress course-progress">
                                        <div class="progress-bar bg-warning" style="width: 60%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <i class="fas fa-book-reader text-primary fa-2x"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">Lecture supplémentaire</h6>
                                    <div class="progress course-progress">
                                        <div class="progress-bar bg-primary" style="width: 40%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-end">
                    <div class="display-4 fw-bold text-success">60%</div>
                    <p class="text-muted small">Objectif global</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts pour la page étudiante -->
<script>
    // Données du quiz
    const quizData = [
        {
            question: "Quelle est la prochaine lettre dans la séquence : A, C, E, G, ?",
            options: ["H", "I", "J", "K"],
            correct: 1,
            explanation: "Il s'agit d'une séquence de lettres impaires : A(1), C(3), E(5), G(7), donc I(9)"
        },
        {
            question: "Si 3 personnes peuvent peindre 3 murs en 3 heures, combien de temps faut-il à 6 personnes pour peindre 6 murs ?",
            options: ["1 heure", "2 heures", "3 heures", "4 heures"],
            correct: 2,
            explanation: "Le même temps : 3 heures (productivité proportionnelle)"
        },
        {
            question: "Quel nombre complète la série : 2, 6, 12, 20, 30, ?",
            options: ["40", "42", "44", "46"],
            correct: 1,
            explanation: "+4, +6, +8, +10, donc +12 = 42"
        },
        {
            question: "Si tous les ZAPS sont ZIPS et tous les ZIPS sont ZOPS, alors tous les ZAPS sont-ils ZOPS ?",
            options: ["Vrai", "Faux", "Incertain", "Peut-être"],
            correct: 0,
            explanation: "Logique de transitivité : Si A ⊆ B et B ⊆ C, alors A ⊆ C"
        },
        {
            question: "Trouvez l'intrus : Carré, Cercle, Triangle, Rectangle, Hexagone",
            options: ["Cercle", "Triangle", "Rectangle", "Hexagone"],
            correct: 0,
            explanation: "Le cercle est la seule forme non polygonale"
        }
    ];

    let currentQuestion = 0;
    let score = 0;
    let userAnswers = [];
    let quizCompleted = false;

    // Données de l'étudiant
    const studentData = {
        moyenne: 14.5,
        coursActifs: 5,
        heuresEtude: 28,
        iqScore: 115
    };

    // Initialisation
    document.addEventListener('DOMContentLoaded', function() {
        // Animer les statistiques
        animateStats();

        // Initialiser le quiz
        loadQuestion();

        // Mettre à jour l'heure
        updateTime();
        setInterval(updateTime, 60000);

        // Changer la citation quotidienne
        updateDailyQuote();

        // Tooltips Bootstrap
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });

    // Animation des statistiques
    function animateStats() {
        animateValue(document.getElementById('moyenneGenerale'), 0, studentData.moyenne, 1500, 1);
        animateValue(document.getElementById('coursActifs'), 0, studentData.coursActifs, 1500);
        animateValue(document.getElementById('heuresEtude'), 0, studentData.heuresEtude, 1500, 0, 'h');
        document.getElementById('scoreQI').textContent = studentData.iqScore;

        // Animation de la barre de progression de la moyenne
        const progressPercentage = (studentData.moyenne / 20) * 100;
        animateProgressBar('moyenneProgress', progressPercentage);
    }

    // Fonction d'animation générique
    function animateValue(element, start, end, duration, decimals = 0, suffix = '') {
        let startTimestamp = null;
        const step = (timestamp) => {
            if (!startTimestamp) startTimestamp = timestamp;
            const progress = Math.min((timestamp - startTimestamp) / duration, 1);
            const value = progress * (end - start) + start;
            element.textContent = value.toFixed(decimals) + suffix;
            if (progress < 1) {
                window.requestAnimationFrame(step);
            }
        };
        window.requestAnimationFrame(step);
    }

    function animateProgressBar(elementId, targetWidth) {
        const progressBar = document.getElementById(elementId);
        let currentWidth = 0;
        const interval = setInterval(() => {
            if (currentWidth >= targetWidth) {
                clearInterval(interval);
                return;
            }
            currentWidth += 1;
            progressBar.style.width = currentWidth + '%';
        }, 20);
    }

    // Fonctions du quiz
    function loadQuestion() {
        if (currentQuestion >= quizData.length) {
            showQuizResults();
            return;
        }

        const question = quizData[currentQuestion];
        document.getElementById('quizQuestion').textContent = question.question;

        const options = document.querySelectorAll('.quiz-option');
        options.forEach((option, index) => {
            option.textContent = String.fromCharCode(65 + index) + ') ' + question.options[index];
            option.dataset.answer = question.options[index];
            option.classList.remove('selected');
        });

        document.getElementById('quizProgress').textContent = `Question ${currentQuestion + 1}/${quizData.length}`;
        document.getElementById('quizProgressBar').style.width = `${((currentQuestion + 1) / quizData.length) * 100}%`;
        document.getElementById('nextQuizBtn').style.display = 'none';
        document.getElementById('submitQuizBtn').style.display = 'inline-block';
    }

    function selectAnswer(element) {
        // Désélectionner toutes les options
        document.querySelectorAll('.quiz-option').forEach(opt => {
            opt.classList.remove('selected');
        });

        // Sélectionner l'option cliquée
        element.classList.add('selected');

        // Stocker la réponse
        userAnswers[currentQuestion] = element.dataset.answer;

        // Afficher le bouton suivant
        document.getElementById('nextQuizBtn').style.display = 'inline-block';
    }

    function nextQuestion() {
        currentQuestion++;
        if (currentQuestion < quizData.length) {
            loadQuestion();
        } else {
            showQuizResults();
        }
    }

    function submitQuiz() {
        const selectedOption = document.querySelector('.quiz-option.selected');
        if (!selectedOption && !quizCompleted) {
            alert('Veuillez sélectionner une réponse avant de continuer.');
            return;
        }

        if (!quizCompleted) {
            nextQuestion();
        } else {
            showQuizResults();
        }
    }

    function showQuizResults() {
        // Calculer le score
        score = 0;
        userAnswers.forEach((answer, index) => {
            if (answer === quizData[index].options[quizData[index].correct]) {
                score++;
            }
        });

        // Calculer le score QI approximatif
        const iqScore = 90 + (score * 8); // Base 90 + 8 points par bonne réponse
        studentData.iqScore = iqScore;

        // Mettre à jour l'affichage
        document.getElementById('quizQuestion').innerHTML = `
        <div class="text-center">
            <h3 class="mb-3">Résultats du Quiz</h3>
            <div class="iq-score mb-3">${iqScore}</div>
            <p>Votre score : <strong>${score}/${quizData.length}</strong></p>
            <p class="small text-muted">Votre score QI estimé a été mis à jour !</p>
        </div>
    `;

        document.querySelector('.quiz-options').style.display = 'none';
        document.getElementById('quizProgressBar').style.width = '100%';
        document.getElementById('submitQuizBtn').textContent = 'Recommencer';
        document.getElementById('submitQuizBtn').onclick = restartQuiz;
        document.getElementById('nextQuizBtn').style.display = 'none';

        // Mettre à jour le score QI affiché
        document.getElementById('scoreQI').textContent = iqScore;
        quizCompleted = true;
    }

    function restartQuiz() {
        currentQuestion = 0;
        score = 0;
        userAnswers = [];
        quizCompleted = false;

        document.querySelector('.quiz-options').style.display = 'block';
        document.getElementById('submitQuizBtn').textContent = 'Soumettre';
        document.getElementById('submitQuizBtn').onclick = submitQuiz;

        loadQuestion();
    }

    function startQuiz() {
        restartQuiz();
        // Faire défiler jusqu'au quiz
        document.querySelector('.quiz-container').scrollIntoView({ behavior: 'smooth' });
    }

    // Fonctions utilitaires
    function updateTime() {
        const now = new Date();
        const timeString = now.toLocaleTimeString('fr-FR', {
            hour: '2-digit',
            minute: '2-digit'
        });
        const dateString = now.toLocaleDateString('fr-FR', {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
        document.querySelector('.welcome-badge').innerHTML = `
        <i class="fas fa-calendar-day me-2"></i>${dateString} - ${timeString}
    `;
    }

    function updateDailyQuote() {
        const quotes = [
            "Le savoir est la seule chose qui s'accroît quand on le partage.",
            "L'éducation est l'arme la plus puissante pour changer le monde.",
            "Le succès, c'est d'aller d'échec en échec sans perdre son enthousiasme.",
            "La vie, c'est comme une bicyclette, il faut avancer pour ne pas perdre l'équilibre.",
            "La persévérance est la clé de toute réussite.",
            "Apprendre, c'est remettre en question ce que l'on sait déjà.",
            "La curiosité est le moteur de l'apprentissage."
        ];

        const randomQuote = quotes[Math.floor(Math.random() * quotes.length)];
        document.getElementById('dailyQuote').textContent = `"${randomQuote}"`;
    }

    function showGradeDetails() {
        alert('Détails des notes:\n\n' +
            'Mathématiques: 16/20\n' +
            'Physique: 14/20\n' +
            'Anglais: 18/20\n' +
            'Informatique: 15/20\n' +
            'Philosophie: 13/20\n\n' +
            'Moyenne générale: 14.5/20');
    }

    function showStudyStats() {
        alert('Statistiques d\'étude:\n\n' +
            'Cette semaine: 28 heures\n' +
            'Semaine dernière: 24 heures (+15%)\n' +
            'Moyenne quotidienne: 4 heures\n' +
            'Sujet le plus étudié: Mathématiques\n' +
            'Meilleur moment: 14h-16h');
    }
</script>