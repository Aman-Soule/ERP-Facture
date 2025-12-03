

<section class="container py-5">
    <div class="row">
        <div class="col-lg-8 col-sm mb-5 mx-auto">
            <h1 class="fs-4 text-center lead text-primary">CRUD PHP POO AJAX ET BOOTSTRAP BY AMAN</h1>
        </div>
    </div>
    <!--    permet de diviser les deux row-->
    <div class="dropdown-divider border-warning"></div>
    <div class="row">
        <div class="col-md-6">
            <h5 class="fw-bold m-0">Liste des factures</h5>
        </div>
        <div class="col-md-6">
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary btn-sm me-3" data-bs-toggle="modal" data-bs-target="#createModal"><i class="fas fa-folder-plus"></i>Nouveau</button>
                <a href="process/process.php?action=export" class="btn btn-success btn-sm" id="exporter"><i class="fas fa-table"></i>Exporter</a>
            </div>
        </div>
    </div>
    <div class="dropdown-divider border-warning"></div>
    <!--    Dernier row pour le tableau responsive-->
    <div class="row">
        <div class="table-responsive" id="orderTable">
            <table class="table table-striped table-hover" id="factureTable">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Client</th>
                    <th scope="col">Caissier</th>
                    <th scope="col">Montant</th>
                    <th scope="col">Perçu</th>
                    <th scope="col">Retourné</th>
                    <th scope="col">Etat</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>

                <tbody>
                <!--                    DataTables va remplir lui meme ce champ -->
                </tbody>
            </table>
        </div>
    </div>
</section>




<!-- Modal Ajout Facture -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Nouvelle Facture</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="formOrder">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="customer" name="customer">
                        <label for="customer">Nouveau client</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="cashier" name="cashier">
                        <label for="cashier">Caissier</label>
                    </div>
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="amount" name="amount">
                                <label for="amount">Montant</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="received" name="received">
                                <label for="received">Montant percu</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <select class="form-select" aria-label="state" name="status" id="status">
                                    <option value="Facturée">Facturée</option>
                                    <option value="Payée">Payée</option>
                                    <option value="Annulée">Annulée</option>
                                </select>
                                <label for="status">Etat</label>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" id="create" name="create">Ajouter <i class="fas fa-plus"></i></button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Confirmation Suppression -->
<!--inert rend un élément et ses descendants non focusables et les retire du cycle d’accessibilité.-->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">ji
                <h5 class="modal-title" id="confirmDeleteLabel">Confirmation de suppression</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
                Voulez-vous vraiment supprimer cette facture ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Oui, supprimer</button>
            </div>
        </div>
    </div>
</div>









