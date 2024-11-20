<div class="modal fade" id="editContractModal" tabindex="-1" aria-labelledby="editContractModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editContractModalLabel">Chỉnh sửa hợp đồng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('cleaner.putEditContract') }}" method="POST" id="editContractForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="edit_cleaner_id" name="cleaner_id" value="">
                        <input type="hidden" id="edit_contract_id" name="contract_id" value="">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for=edit_"name" class="form-label">Tên hợp đồng</label>
                                <input type="text" class="form-control" id="edit_name" name="name" placeholder="Nhập tên hợp đồng">
                            </div>
                            <div class="col-md-6">
                                <label for="edit_commission" class="form-label">Hoa hồng (%)</label>
                                <input type="number" class="form-control" id="edit_commission" name="commission" placeholder="Nhập tỷ lệ hoa hồng" min="0" step="0.1">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="edit_start_date" class="form-label">Ngày bắt đầu</label>
                                <input type="date" class="form-control" id="edit_start_date" name="start_date">
                            </div>
                            <div class="col-md-6">
                                <label for="edit_end_date" class="form-label">Ngày kết thúc</label>
                                <input type="date" class="form-control" id="edit_end_date" name="end_date">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="edit_terms" class="form-label">Điều khoản</label>
                            <textarea class="form-control" id="edit_terms" name="terms" rows="4" placeholder="Nhập điều khoản hợp đồng"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="edit_attachment_file" class="form-label">File đính kèm</label>
                            <input type="file" class="form-control" id="edit_attachment_file" name="attachment_file" accept=".pdf,.doc,.docx">
                            <small class="text-muted" id="currentFile"></small>
                        </div>
                        <div class="mb-3">
                            <label for="edit_status" class="form-label">Trạng thái</label>
                            <select class="form-select" id="edit_status" name="status">
                                <option value="" selected disabled>Chọn trạng thái</option>
                                <option value="active">Đang hoạt động</option>
                                <option value="inactive">Đã kết thúc</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="submit" form="editContractForm" class="btn btn-primary">Lưu hợp đồng</button>
                </div>
            </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const editContractModal = document.getElementById('editContractModal');
        const cleanerIdInput = document.getElementById('edit_cleaner_id');
        const contractIdInput = document.getElementById('edit_contract_id');
        const nameInput = document.getElementById('edit_name');
        const commissionInput = document.getElementById('edit_commission');
        const startDateInput = document.getElementById('edit_start_date');
        const endDateInput = document.getElementById('edit_end_date');
        const termsInput = document.getElementById('edit_terms');
        const statusSelect = document.getElementById('edit_status');
        const currentFileText = document.getElementById('currentFile');

        editContractModal.addEventListener('show.bs.modal', (event) => {
            const button = event.relatedTarget;
            cleanerIdInput.value = button.getAttribute('data-cleaner-id');
            contractIdInput.value = button.getAttribute('data-contract-id');
            nameInput.value = button.getAttribute('data-name');
            commissionInput.value = button.getAttribute('data-commission');
            startDateInput.value = button.getAttribute('data-start-date');
            endDateInput.value = button.getAttribute('data-end-date');
            termsInput.value = button.getAttribute('data-terms');
            statusSelect.value = button.getAttribute('data-status');
            const attachmentFileValue = button.getAttribute('data-attachment-file');
            if (attachmentFileValue) {
                const fileName = attachmentFileValue.split('/').pop();
                currentFileText.textContent = "Tệp hiện tại: " + fileName;
            } else {
                currentFileText.textContent = "Chưa có tệp đính kèm.";
            }
        });
    });


</script>
