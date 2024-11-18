<!-- Modal to display the notice list -->
<div class="modal fade" id="noticeModal" tabindex="-1" role="dialog" aria-labelledby="noticeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="noticeModalLabel">Notice List</h5>
                <!-- Close button using Bootstrap's built-in functionality -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Table to display notices -->
                <div class="table-responsive-lg">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Priority</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(getLatestNotices() as $notice)
                            <tr>
                                <td class="{{ strtolower($notice->priority) === 'important' ? 'text-danger' : 'text-black' }}">
                                    {{ $notice->title }}
                                </td>
                                <td>{{ $notice->description }}</td>
                                <td>{{ ucfirst($notice->status) }}</td>
                                <td>{{ ucfirst($notice->priority) }}</td>
                                <td>{{ changeDateTimeFormat($notice->start_date, 'd-m-Y') }}</td>
                                <td>{{ changeDateTimeFormat($notice->end_date, 'd-m-Y') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <!-- Close button using Bootstrap's default modal closing functionality -->
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
