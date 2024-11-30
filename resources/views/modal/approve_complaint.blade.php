@php use App\Models\User; @endphp
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="confirmModalLabel">Xác nhận Khiếu Nại</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('order.confirmComplaint', $complaint->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <p>Bạn có chắc chắn muốn xác nhận khiếu nại này?</p>
                    <div class="mb-3">
                        <label for="adminDecision" class="form-label">Quyết Định của Admin:</label>
                        <textarea name="admin_decision" id="adminDecision" class="form-control" rows="4"
                                  placeholder="Nhập quyết định của bạn..."></textarea>
                    </div>
                    <div class="mb-3">
                        <div class="form-inline">
                            @if( $complaintBy->role_type === User::ROLE_CUSTOMER)
                                <label for="timeType" class="mr-2">Điểm bị trừ của nhân viên:</label>
                                <input type="number" name="point" id="point" class="form-control" value="0">
                            @endif

                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                </div>
            </form>
        </div>
    </div>
</div>
