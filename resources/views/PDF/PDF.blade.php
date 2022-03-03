<div style="text-align: center;">
    <h1 style="padding: .5rem; margin: 0;">
        Name: {{ $name }}
    </h1>
    <h3 style="padding: .5rem; margin: 0;">
        Cientific name: {{ $cientificName }}
    </h3>
    <div style="padding: .5rem; margin: 0;">
        Family: {{ $family }}
    </div>
    <div style="padding: .5rem; margin: 0;">
        Description: {{ $description }}
    </div>
    @if(count($contributions) > 0)
    <ul style="padding: 0; margin: 0;">
        Contributers:
        @foreach($contributions as $contributer)
        <li >{{ $contributer->contribution->name }}</li>
        @endforeach
    </ul>
    @endif
</div>
@if($image != '')
<div style="text-align: center; margin-top: 2rem;">
    <img src="{{ $image }}" alt="Imagen">        
</div>
@endif

<div style="position: fixed; bottom: 1rem; left: 45%; text-align: center;">
    {{ $date }}
</div>