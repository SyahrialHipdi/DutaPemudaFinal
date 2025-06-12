<form method="POST" action="{{ route('competition.register') }}">
    @csrf

    <input type="hidden" name="competition_id" value="{{ $competitionId }}">

    <div>
        <label>Email</label>
        <input type="email" name="email" required class="form-control">
    </div>

    <div>
        <label>Password</label>
        <input type="password" name="password" required class="form-control">
    </div>

    @foreach ($formSchema['fields'] as $field)
        <div>
            <label>{{ $field['label'] }}</label>

            @if ($field['type'] === 'textarea')
                <textarea name="extra_data[{{ $field['name'] }}]" 
                          class="form-control" 
                          {{ $field['required'] ? 'required' : '' }}></textarea>
            @else
                <input type="{{ $field['type'] }}" 
                       name="extra_data[{{ $field['name'] }}]" 
                       class="form-control"
                       {{ $field['required'] ? 'required' : '' }}>
            @endif
        </div>
    @endforeach

    <button type="submit">Daftar</button>
</form>
