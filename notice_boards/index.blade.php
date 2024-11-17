@extends('layout.default')
{{-- Content --}}
@section('content')
    <div class="card card-custom">
        <div class="card-header">
            <h3 class="card-title">
                {{ $formTitle }}
            </h3>
            <div class="card-toolbar">
                <a class="btn btn-outline-primary" href="{{ route('notice_boards.create') }}">
                    <span class="fa fa-plus"></span> Create New Notice
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive-lg">
                <table id="data_table" class="table table-bordered table-striped dataTable">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Priority</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($notice_boards as $notice)
                        <tr>
                            <!-- Display title in red if priority is 'important' -->
                            <td class="{{ strtolower($notice->priority) === 'important' ? 'text-danger' : 'text-black' }}">
                                {{ $notice->title }}
                            </td>
                            <td>{{ $notice->description }}</td>
                            <td>{{ ucfirst($notice->status) }}</td>
                            <td>{{ ucfirst($notice->priority) }}</td>
                            <td>{{ $notice->start_date }}</td>
                            <td>{{ $notice->end_date }}</td>
                            <td class="text-center">
                                <a title="Edit" class="btn btn-icon btn-sm btn-outline-primary"
                                   href="{{ route('notice_boards.edit', $notice->id) }}">
                                    <i class="far fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}">
@endsection

@section('scripts')
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#data_table').DataTable({
                "order": [[0, "asc"]],
                "pageLength": 25,
                "columnDefs": [{ orderable: false, targets: [5] }],
                "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                "pagingType": "full_numbers",
                language: {
                    oPaginate: {
                        sNext: '<i class="fa fa-angle-right fa-lg"></i>',
                        sPrevious: '<i class="fa fa-angle-left fa-lg"></i>',
                        sFirst: '<i class="fa fa-angle-double-left fa-lg"></i>',
                        sLast: '<i class="fa fa-angle-double-right fa-lg"></i>'
                    }
                }
            });
        });
    </script>
@endsection
