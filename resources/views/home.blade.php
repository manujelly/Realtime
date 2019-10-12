@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title">
                    <h1 class="text-center">Learn Real Time Pusher with Laravel</h1>
                </div>
            </div>
            <div class="col-12">
                <p class="alert alert-primary messageAlert" hidden>Vous avez un nouveau message</p>
                <div class="myform">
                    <form action="{{route('post-message')}}" method="post" id="form">
                        @csrf
                        <label for="exampleFormControlTextarea1">Chat form</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"  name="message"></textarea>
                        <button class="btn btn-primary mt-2">Soumettre</button>
                    </form>
                </div>
            </div>
            <div class="col-12">
                <div class="chat-messages">

                </div>
            </div>
        </div>
    </div>
    <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
    <script>
        $('#form').submit(function (e) {
            e.preventDefault();

            let message=$('#exampleFormControlTextarea1').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            if(message.length>0){
                $.ajax({
                    url:'/post/message',
                    type:'post',
                    data:{message:message},
                    success:function () {
                        $('#exampleFormControlTextarea1').val('');
                    },
                    error:function () {

                    }
                })
            }

        })
    </script>
    <script src="{{asset('js/real-time.js')}}"></script>
@endsection
