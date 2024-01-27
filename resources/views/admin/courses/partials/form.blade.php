<div class="mb-4">
    {!! Form::label('title', 'Titulo del curso') !!}
    {!! Form::text('title', null, ['class' => 'form-input block w-full mt-1'.($errors->has('title') ? ' border-red-600' : '')]) !!}
    @error('title')
        <strong class="text-xs text-red-500">{{ $message }}</strong>
    @enderror
</div>
<div class="mb-4">
    {!! Form::label('slug', 'Slug del curso') !!}
    {!! Form::text('slug', null, ['readonly' => 'readonly','class' => 'form-input block w-full mt-1'.($errors->has('slug') ? ' border-red-600' : '')]) !!}
    @error('slug')
        <strong class="text-xs text-red-500">{{ $message }}</strong>
    @enderror
</div>
<div class="mb-4">
    {!! Form::label('subtitle', 'Subtitulo del curso') !!}
    {!! Form::text('subtitle', null, ['class' => 'form-input block w-full mt-1'.($errors->has('subtitle') ? ' border-red-600' : '')]) !!}
    @error('subtitle')
        <strong class="text-xs text-red-500">{{ $message }}</strong>
    @enderror
</div>
<div class="mb-4">
    {!! Form::label('description', 'Descripcion del curso') !!}
    {!! Form::textarea('description', null, ['class' => 'form-input block w-full mt-1'.($errors->has('description') ? ' border-red-600' : '')]) !!}
    @error('description')
        <strong class="text-xs text-red-500">{{ $message }}</strong>
    @enderror
</div>

<h1 class="text-2xl font-bold mt-8 mb-2">
    Imgen del Certificado
</h1>
<div class="grid grid-cols-2 gap-4">
    <figure>
        @isset($course->image)
        <img name="picture" id="picture" class="w-full h-64 object-cover object-center" src="{{ Storage::url($course->image->url) }}"> 
        @else           
        <img name="picture" id="picture" class="w-full h-64 object-cover object-center" src="https://media.istockphoto.com/id/1146532466/es/foto/fondo-digital-azul-abstracto.jpg?s=2048x2048&w=is&k=20&c=Fa-z_DwZb-gz2FSD63efzRFlW3wxfUwpjFXR-gq2jzc="> 
        @endisset
    </figure>
    <div>
        <p class="mb-2">Debe subir uma imagen en formato PNG para su mejor resolucion</p>
        {!! Form::file('file', ['class' => 'form-input w-full '.($errors->has('file') ? ' border-red-600' : ''), 'id' => 'file', 'accept' => 'image/*']) !!}
        @error('file')
        <strong class="text-xs text-red-500">{{ $message }}</strong>
        @enderror
    </div>
</div> 