@php
$label ??= ucsfirst($name);
$name ??= ' ';
$type ??='text';
$value ??= ' '; 
$class ??= ' ';
@endphp

<div @class(['form-group', 'class' =>$class])>
    @if ($type === 'textarea')
       <textarea class="form-control @error($name) is-invalid @enderror" type="{{$type}}" name="{{$name}}"  id="{{$name}}">{{old($name,$value)}}</textarea> 
     @else 
     <label for="{{$name}}">{{$label}}</label>
    <input class="form-control @error($name) is-invalid @enderror" type="{{$type}}"  name="{{$name}}" id="{{$name}}" value="{{old($name,$value)}}">
   @endif
</div>
<div>
    @if ($errors)
      <div class="invalid-feedback">
        {{$message ?? ''}}
      </div>
    @endif
</div>

