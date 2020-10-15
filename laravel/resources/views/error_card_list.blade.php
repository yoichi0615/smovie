@if($errors->any())
dd($errors);
@foreach($errors as $error)
<div class="card text-left alert alert-danger">
    <ul class="mb-0">
        <li>{{$error}}</li>
    </ul>
</div>
@endforeach
@endif
