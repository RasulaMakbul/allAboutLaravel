@props(['title','id','name','dropItems', 'setItem'=>[]])

<label for="{{ $id }}">{{ $title }}</label>

<select class="btn dropdown-toggle col-6 m-3 btn-outline-secondary" name="{{$name}}">

    <div class="dropdown-menu dropdown-menu-right">
        <option value="">Select One</option>
        @foreach($dropItems as $key=>$item)
        <option class="dropdown-item" value="{{$key}}" @if ($setItem==$key) selected @endif>{{ $item }}</option>

        @endforeach
    </div>
</select>