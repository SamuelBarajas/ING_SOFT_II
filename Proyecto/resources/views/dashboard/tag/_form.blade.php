    @csrf

    <div class="form-group">
        <label for="title">Titulo</label>
        <input class="form-control" type="text" name="title" id="title" value="{{ old('title',$tag->title)}}">
        @error('title')
            <small class="text-danger">{{ $message}}</small>
        @enderror
    </div>

    <input type="submit" value="Enviar" class="btn btn-primary">