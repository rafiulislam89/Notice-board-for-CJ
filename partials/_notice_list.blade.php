{{--<!-- Notice Board -->--}}
{{--<div class="notice-board">--}}
{{--    <div class="notice-content">--}}
{{--        @foreach(getLatestNotices() as $notice)--}}
{{--            <a href="#" class="notice-item" onclick="openModal(); return false;"--}}
{{--               style="color: {{ $notice->priority == 'important' ? 'orange' : 'black' }}">--}}
{{--                <span>{{ $notice->title }}</span>--}}
{{--            </a>--}}
{{--            <span class="text-black-50">|</span>--}}
{{--        @endforeach--}}
{{--    </div>--}}
{{--</div>--}}

<div class="modal" id="noticeModal" tabindex="-1" role="dialog" aria-labelledby="noticeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="noticeModalLabel">Notice List</h5>
                <button type="button" class="close" aria-label="Close" onclick="closeModal()">&times;</button>
            </div>
            <div class="modal-body" style="max-height: 400px; overflow-y: auto;">
                @foreach(getLatestNotices() as $notice)
                    <div class="card mb-3" style="background-color: {{ $loop->iteration % 2 == 0 ? '#f0f0f0' : '#ffffff' }};
                                border: 1px solid #dcdcdc; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                        <div class="card-body">
                            <h5 class="card-title" style="font-weight: bold; color: {{ strtolower($notice->priority) === 'important' ? 'red' : 'black' }}">
                                {{ $notice->title }}
                            </h5>
                            <p class="card-text" style="font-size: 14px; line-height: 1.5;">{{ $notice->description }}</p>
                            <p class="card-text" style="font-size: 12px; color: gray;">Last Updated: {{ changeDateTimeFormat($notice->updated_at, 'd-m-Y H:i:s') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="closeModal()">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Additional CSS -->
<style>
    body.modal-open { overflow: hidden !important; }
    .modal-body { max-height: 400px; overflow-y: auto; }
    .modal-body::-webkit-scrollbar { width: 8px; }
    .modal-body::-webkit-scrollbar-thumb { background-color: #888; border-radius: 4px; }
    .modal-body::-webkit-scrollbar-thumb:hover { background-color: #555; }
    .modal-body::-webkit-scrollbar-track { background-color: #f0f0f0; }
</style>

<!-- JavaScript -->
<script>
    function openModal() {
        document.getElementById('noticeModal').style.display = 'block';
        document.body.classList.add('modal-open');
    }

    function closeModal() {
        document.getElementById('noticeModal').style.display = 'none';
        document.body.classList.remove('modal-open');
    }

    window.onclick = function(event) {
        if (event.target === document.getElementById('noticeModal')) closeModal();
    }
</script>
