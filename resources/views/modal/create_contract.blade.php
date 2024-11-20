<div class="modal fade" id="createContractModal" tabindex="-1" aria-labelledby="createContractModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createContractModalLabel">Tạo mới hợp đồng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('cleaner.postCreateContract') }}" method="POST" id="createContractForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="cleaner_id" name="cleaner_id" value="">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Tên hợp đồng</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên hợp đồng" required>
                            </div>
                            <div class="col-md-6">
                                <label for="commission" class="form-label">Hoa hồng (%)</label>
                                <input type="number" class="form-control" id="commission" name="commission" placeholder="Nhập tỷ lệ hoa hồng" min="0" step="0.1" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="start_date" class="form-label">Ngày bắt đầu</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" required>
                            </div>
                            <div class="col-md-6">
                                <label for="end_date" class="form-label">Ngày kết thúc</label>
                                <input type="date" class="form-control" id="end_date" name="end_date" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="terms" class="form-label">Điều khoản</label>
                            <textarea class="form-control" id="terms" name="terms" rows="4" placeholder="Nhập điều khoản hợp đồng" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="attachment_file" class="form-label">File đính kèm</label>
                            <input type="file" class="form-control" id="attachment_file" name="attachment_file" accept=".pdf,.doc,.docx" required>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Trạng thái</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="" selected disabled>Chọn trạng thái</option>
                                <option value="active">Đang hoạt động</option>
                                <option value="inactive">Đã kết thúc</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="submit" form="createContractForm" class="btn btn-primary">Lưu hợp đồng</button>
                </div>
            </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const createContractModal = document.getElementById('createContractModal');
        const cleanerIdInput = document.getElementById('cleaner_id');

        createContractModal.addEventListener('show.bs.modal', (event) => {
            console.log(111)
            const button = event.relatedTarget;
            console.log(button.getAttribute('data-cleaner-id'))
            cleanerIdInput.value = button.getAttribute('data-cleaner-id');
        });
    });

</script>
