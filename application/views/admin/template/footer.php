        </div>
        <!-- End Area Konten Utama -->
    </div>
    <!-- End Bagian Kanan -->
</div>

<!-- Memanggil Javascript Bootstrap 5 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Modal Konfirmasi Global -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Konfirmasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body" id="confirmModalMessage">
                Apakah Anda yakin?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a href="#" id="confirmModalYes" class="btn btn-danger">Ya, lanjutkan</a>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const confirmModal = new bootstrap.Modal(document.getElementById('confirmModal'));
        const confirmMessage = document.getElementById('confirmModalMessage');
        const confirmYes = document.getElementById('confirmModalYes');
        const confirmTitle = document.getElementById('confirmModalLabel');

        document.querySelectorAll('.confirm-action').forEach(function(element) {
            element.addEventListener('click', function(event) {
                event.preventDefault();
                const href = element.getAttribute('href');
                const title = element.getAttribute('data-confirm-title') || 'Konfirmasi';
                const message = element.getAttribute('data-confirm-message') || 'Apakah Anda yakin ingin melanjutkan tindakan ini?';

                confirmTitle.textContent = title;
                confirmMessage.textContent = message;
                confirmYes.setAttribute('href', href);
                confirmModal.show();
            });
        });
    });
</script>
</body>
</html>
