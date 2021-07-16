{{ $texto }}
</br>
@if($checagem == true)

    checagem == true 

@else

    Checagem == false

@endif
</br>
@foreach($usuarios as $usuarios)
    {{ $usuarios }}
@endforeach