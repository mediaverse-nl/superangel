@foreach($errors->get('success') as $msg)
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <strong>Gelukt!</strong> {{$msg}}.
    </div>
@endforeach
@foreach($errors->get('warning') as $msg)
    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <strong>Oeps!</strong> {{$msg}}.
    </div>
@endforeach