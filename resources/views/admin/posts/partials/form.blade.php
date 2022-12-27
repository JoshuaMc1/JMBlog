<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, [
        'class' => 'form-control',
        'placeholder' => 'Ingrese el nombre del post',
    ]) !!}

    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, [
        'class' => 'form-control',
        'placeholder' => 'Ingrese el slug del post',
        'readonly',
    ]) !!}
    @error('slug')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <p class="font-weight-bold">Color del texto del titulo</p>
    <label class="mr-3">
        {!! Form::radio('text_color', 'text-dark', true) !!}
        Negro
    </label>

    <label>
        {!! Form::radio('text_color', 'text-white') !!}
        Blanco
    </label>
</div>

<div class="form-group">
    {!! Form::label('category_id', 'Categoria') !!}
    {!! Form::select('category_id', $categories, null, [
        'class' => 'form-control',
    ]) !!}

    @error('category_id')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <p class="font-weight-bold">Etiquetas</p>
    @foreach ($tags as $tag)
        <label class="mr-3">
            {!! Form::checkbox('tags[]', $tag->id, null) !!}
            {{ $tag->name }}
        </label>
    @endforeach

    @error('tags')
        <br>
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <p class="font-weight-bold">Estado</p>
    <label class="mr-3">
        {!! Form::radio('status', 1, true) !!}
        Borrador
    </label>

    <label>
        {!! Form::radio('status', 2) !!}
        Publicado
    </label>

    @error('status')
        <br>
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="row">
    <div class="col mb-3">
        <div class="image-wrapper">
            @isset($post->image)
                <img class="img-fluid" src="{{ Storage::url($post->image->url) }}" alt="Imagen por defecto" id="picture">
            @else
                <img class="img-fluid" src="https://cdn.pixabay.com/photo/2020/11/28/06/15/cold-5783718_960_720.jpg"
                    alt="Imagen por defecto" id="picture">
            @endisset
        </div>
    </div>
    <div class="col mb-3">
        <div class="form-group">
            {!! Form::label('file', 'Imagen que se mostrara en el post') !!}
            {!! Form::file('file', [
                'class' => 'form-control-file',
                'type' => 'file',
                'accept' => 'image/*',
            ]) !!}

            @error('file')
                <small class="text-danger">{{ $message }}</small>
            @enderror

            <p class="mt-2">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur voluptatibus doloremque
                porro nemo placeat nulla nam iure suscipit tempore provident cupiditate quaerat hic earum
                recusandae doloribus, magnam beatae dolor fugiat!
            </p>
        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::label('extract', 'Extracto') !!}
    {!! Form::textarea('extract', null, [
        'class' => 'form-control',
    ]) !!}

    @error('extract')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('body', 'Cuerpo del post') !!}
    {!! Form::textarea('body', null, [
        'class' => 'form-control',
    ]) !!}

    @error('body')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
