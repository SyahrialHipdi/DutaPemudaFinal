<h2>Edit Lomba</h2>
<form method="POST" action="{{ route('admin.lomba.update', $lomba->id) }}">
    @method('PUT')
    @include('admin.lomba.form')
</form>
