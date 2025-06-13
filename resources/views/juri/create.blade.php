 @extends('layouts.juri')
 @section('title', 'lomba')
 @section('content')

     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1>Input nilai</h1>
                     </div>
                 </div>
             </div><!-- /.container-fluid -->
         </section>

         <section class="content">
             <div class="container-fluid">
                 <div class="row">
                     <div class="col-12">

                         <div class="card">

                             <!-- /.card-header -->
                             <div class="card-body">

                                 <form action="{{ route('juri.store', [$lomba->id, $peserta->id]) }}" method="POST">
                                     @csrf
                                     <div class="mb-3">
                                         <label for="nilai" class="form-label">Nilai (0–100)</label>
                                         <input type="number" name="nilai" id="nilai" class="form-control" required
                                             min="0" max="100" value="{{ old('nilai') }}">
                                     </div>

                                     <div class="mb-3">
                                         <label for="komentar" class="form-label">Komentar (opsional)</label>
                                         <textarea name="komentar" id="komentar" class="form-control" rows="3">{{ old('komentar') }}</textarea>
                                     </div>

                                     <button type="submit" class="btn btn-success">Simpan Penilaian</button>
                                     <a href="{{ route('juri.index') }}" class="btn btn-secondary">Kembali</a>
                                 </form>
                             </div>
                             <!-- /.card-body -->
                         </div>
                         <!-- /.card -->
                     </div>
                     <!-- /.col -->
                 </div>
                 <!-- /.row -->
             </div>
             <!-- /.container-fluid -->
         </section>
     </div>

 @endsection
