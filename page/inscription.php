<?php
if (isset($_GET['error'])) {
    $error_message = htmlspecialchars($_GET['error']);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - ETU-PRO</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .register-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            overflow: hidden;
            width: 100%;
            max-width: 500px;
        }
        .register-header {
            background: #4c6ef5;
            color: white;
            padding: 25px;
            text-align: center;
        }
        .register-header i {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }
        .register-body {
            padding: 30px;
        }
        .form-control:focus {
            border-color: #4c6ef5;
            box-shadow: 0 0 0 0.25rem rgba(76, 110, 245, 0.25);
        }
        .btn-register {
            background: #4c6ef5;
            color: white;
            width: 100%;
            padding: 12px;
            font-weight: 600;
        }
        .btn-register:hover {
            background: #3b5bdb;
            color: white;
        }
        .btn-login {
            color: #4c6ef5;
            text-decoration: none;
        }
        .btn-login:hover {
            color: #3b5bdb;
        }
        .error-message {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 5px;
        }
        .password-requirements {
            font-size: 0.75rem;
            color: #6c757d;
            margin-top: 5px;
        }
    </style>
</head>
<body>
<div class="register-container">
    <div class="register-header">
        <i class="fas fa-user-plus"></i>
        <h2 class="mb-0">ETU-PRO</h2>
        <p class="mb-0">Créer un compte</p>
    </div>

    <div class="register-body">
        <form action="../process/inscription.php" method="POST" id="registerForm">
            <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo htmlspecialchars($_GET['error']); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?php if (isset($_GET['success'])): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Compte créé avec succès ! Vous pouvez maintenant vous connecter.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="fullname" class="form-label">Nom complet <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input type="text" class="form-control" id="fullname" name="nom"
                               placeholder="Ex: Jean Dupont" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input type="email" class="form-control" id="email" name="email"
                               placeholder="exemple@email.com" required>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="telephone" class="form-label">Téléphone</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        <input type="tel" class="form-control" id="tel" name="tel"
                               placeholder="+221 77 ** ** ** 00">
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Adresse</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-home"></i></span>
                    <input type="text" class="form-control" id="adresse" name="adresse"
                           placeholder="Rue, Ville, Code postal">
                </div>
            </div>

            <div class="mb-3">
                <label for="etablissement" class="form-label">Établissement</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-university"></i></span>
                    <input type="text" class="form-control" id="etablissement" name="etablissement"
                           placeholder="Nom de votre établissement">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="password" class="form-label">Mot de passe <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control" id="password" name="password"
                               placeholder="Mot de passe" required>
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    <div class="password-requirements">
                        <small>Minimum 8 caractères avec majuscule, minuscule et chiffre</small>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="confirm_password" class="form-label">Confirmer le mot de passe <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                               placeholder="Confirmez le mot de passe" required>
                        <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Champ caché pour le rôle par défaut -->
            <input type="hidden" name="idrolef" value=2>

            <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                <label class="form-check-label" for="terms">
                    J'accepte les <a href="#" class="text-decoration-none">conditions d'utilisation</a>
                </label>
            </div>

            <div class="d-grid gap-2 mb-3">
                <button type="submit" class="btn btn-register" id="submitBtn">
                    <i class="fas fa-user-plus me-2"></i>S'inscrire
                </button>
            </div>

            <div class="text-center">
                <small class="text-muted">Déjà un compte ?</small>
                <a href="../page/login.php" class="btn btn-link btn-login">Se connecter</a>
            </div>

            <div class="text-center mt-3">
                <small class="text-muted">Version 1.1 - Développé par AMAN</small>
            </div>
        </form>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Toggle password visibility
    document.getElementById('togglePassword').addEventListener('click', function() {
        const password = document.getElementById('password');
        const icon = this.querySelector('i');
        if (password.type === 'password') {
            password.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            password.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });

    document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
        const confirmPassword = document.getElementById('confirm_password');
        const icon = this.querySelector('i');
        if (confirmPassword.type === 'password') {
            confirmPassword.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            confirmPassword.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });

    // Validation du formulaire
    document.getElementById('registerForm').addEventListener('submit', function(e) {
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirm_password').value;
        const submitBtn = document.getElementById('submitBtn');

        // Vérifier si les mots de passe correspondent
        if (password !== confirmPassword) {
            e.preventDefault();
            alert('Les mots de passe ne correspondent pas !');
            return;
        }

        // Validation de la force du mot de passe (optionnel)
        if (password.length < 8) {
            e.preventDefault();
            alert('Le mot de passe doit contenir au moins 8 caractères !');
            return;
        }

        // Animation du bouton
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Création du compte...';
        submitBtn.disabled = true;

        // Le formulaire sera soumis normalement
    });

    // Validation en temps réel des mots de passe
    document.getElementById('confirm_password').addEventListener('input', function() {
        const password = document.getElementById('password').value;
        const confirmPassword = this.value;

        if (confirmPassword && password !== confirmPassword) {
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
        } else if (confirmPassword) {
            this.classList.remove('is-invalid');
            this.classList.add('is-valid');
        }
    });

    document.getElementById('password').addEventListener('input', function() {
        const confirmPassword = document.getElementById('confirm_password').value;

        if (confirmPassword && this.value !== confirmPassword) {
            document.getElementById('confirm_password').classList.add('is-invalid');
            document.getElementById('confirm_password').classList.remove('is-valid');
        } else if (confirmPassword) {
            document.getElementById('confirm_password').classList.remove('is-invalid');
            document.getElementById('confirm_password').classList.add('is-valid');
        }
    });
</script>
</body>
</html>