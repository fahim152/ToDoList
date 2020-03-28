@extends('layouts.master')

@section('content')
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-lg-12">
                <div class="card px-3">
                    <div class="card-body">
                
                        <h4 class="card-title">Awesome Todo list</h4>
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
    <script>
        // $( document ).ready(function() {
            
        //     $('#fullname').click(function(){
        //         var name = $(this).text();
        //         $(this).html('');
        //         $('<input></input>')
        //             .attr({
        //                 'type': 'text',
        //                 'name': 'fname',
        //                 'id': 'txt_fullname',
        //                 'size': '30',
        //                 'value': name
        //             })
        //             .appendTo('#fullname');
        //         $('#txt_fullname').focus();
        //     });
            
        //     $(document).on('blur','#txt_fullname', function(){
        //         var name = $(this).val();
        //         $.ajax({
        //         type: 'post',
        //         url: 'change-name.xhr?name=' + name,
        //         success: function(){
        //             $('#fullname').text(name);
        //         }
        //         });
        //     });
        // });
    </script>
        
@endsection

