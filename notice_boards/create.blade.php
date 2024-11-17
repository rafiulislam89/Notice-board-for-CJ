@extends('layout.default')

@section('content')
    <div class="card card-custom">
        <div class="card-header">
            <h3 class="card-title">
                {{$formTitle}}
            </h3>
        </div>
        <!--begin::Form-->
        <form method="POST" action="{{route('notice_boards.store')}}">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        @include('partials.form.text', ['label' => 'Title', 'name' => 'title', 'placeHolder' => 'Enter title', 'value' => old('title'), 'required'=>'required'])
                        @include('partials.form.textarea', ['label' => 'Description', 'name' => 'description', 'placeHolder' => '', 'value' => old('description')])
                        @include('partials.form.select', ['label' => 'Status', 'name' => 'status', 'options'=> $noticeStatus, 'value' => old('status'), 'required'=>'required'])
                    </div>
                    <div class="col-md-6">
                        @include('partials.form.select', ['label' => 'Priority', 'name' => 'priority', 'options'=> $noticePriority, 'value' => old('priority'), 'required'=>'required'])
                        @include('partials.form.text', ['label' => 'Start date', 'name' => 'start_date', 'id' => 'start_date', 'placeHolder' => 'Enter start date', 'value' => old('start_date'),'required'=>'required'])
                        @include('partials.form.text', ['label' => 'End date', 'name' => 'end_date', 'id' => 'end_date', 'placeHolder' => 'Enter end date', 'value' => old('end_date'),'required'=>'required'])
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-pill btn-primary">Submit</button>
                <button type="reset" class="btn btn-pill btn-warning">Reset</button>
                <a class="btn btn-pill btn-secondary" href="{{route('notice_boards.index')}}">Cancel</a>
            </div>
        </form>
        <!--end::Form-->
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#start_date').datepicker({
                autoclose: true,
                todayHighlight: true,
                format: 'yyyy-mm-dd',
            });
            $('#end_date').datepicker({
                autoclose: true,
                todayHighlight: true,
                format: 'yyyy-mm-dd',
            });
        });
    </script>
@endsection
