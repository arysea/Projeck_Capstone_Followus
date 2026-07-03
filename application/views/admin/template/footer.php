        </div>
        <!-- End Area Konten Utama -->
    </div>
    <!-- End Bagian Kanan -->
</div>

<!-- Memanggil Javascript Bootstrap 5 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Modal Konfirmasi Penghapusan -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content modal-confirm">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body text-center">
                <div class="modal-icon">
                    <i class="fas fa-question"></i>
                </div>
                <p class="mb-4" id="confirmDeleteModalMessage">Apakah Anda yakin ingin melanjutkan aksi ini?</p>
                <button type="button" class="btn btn-secondary btn-sm me-2" data-bs-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-danger btn-sm confirm-delete-btn">Ya</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var deleteModalEl = document.getElementById('confirmDeleteModal');
        if (!deleteModalEl) return;
        var confirmDeleteBtn = deleteModalEl.querySelector('.confirm-delete-btn');
        var deleteMessage = document.getElementById('confirmDeleteModalMessage');
        var deleteModal = new bootstrap.Modal(deleteModalEl);

        document.querySelectorAll('a.delete-confirm').forEach(function (link) {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                var message = link.dataset.message || 'Apakah Anda yakin ingin melanjutkan aksi ini?';
                deleteMessage.textContent = message;
                confirmDeleteBtn.dataset.href = link.href;
                deleteModal.show();
            });
        });

        confirmDeleteBtn.addEventListener('click', function () {
            var href = confirmDeleteBtn.dataset.href;
            if (href) {
                window.location.href = href;
            }
        });
    });
</script>
</body>
</html>
