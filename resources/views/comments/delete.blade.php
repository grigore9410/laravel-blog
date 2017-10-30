@extends ('main')

@section('title', '| DELETE COMMENT?')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>DELETE THIS COMMENT?</h1>
            <P>
                <strong>Name:</strong> {{$comment->name}} <br>
                <strong>Email:</strong> {{$comment->email}}<br>
                <strong>Comment:</strong> {{$comment->comment}}
            </P>
            {{Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE'])}}
                {{ Form::submit('YES DELETE THIS COMMENT', ['class' => 'btn btn-lg btn-block btn-danger']) }}
            {{Form::close()}}
            {{--{{ Form::button('Cancel', array('class' => 'btn btn-lg btn-block btn-primary')) }}--}}
            <button onclick="location.href='/posts'" class="btn btn-lg btn-block btn-primary">Back</button>


        </div>
    </div>


    @endsection