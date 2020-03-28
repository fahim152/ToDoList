@extends('layouts.master')

@section('content')
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-lg-12">
                <div class="card px-3">
                    <div class="card-body">
                
                        <h4 class="card-title">Awesome Todo list &#x270C</h4>
                        @livewire('to-do-list')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="/assets/js/todo-list.js"></script>     
@endsection

