@extends('welcome')
@section('title', 'Siswa')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row mb-3">
    <div class="card">
				<form action="{{ route('siswa.tambah') }}" method="post">
          @csrf
					<div class="card-header">
						<h4 class="card-title"><strong>Tambah Siswa</strong></h4>
          </div>

					<div class="card-body border-top my-2">
						<div class="row mt-2">
							<div class="col-xs-12 col-sm-3">
								<div class="form-group">
									<label for="name">name : </label>
									<input type="text" name="name" id="name" class="form-control" placeholder="Masukan nama">
								</div>
							</div>

							<div class="col-xs-12 col-sm-3">
								<div class="form-group">
									<label for="email">Email : </label>
									<input type="text" name="email" id="email" class="form-control" placeholder="Masukan Email">
								</div>
							</div>

							<div class="col-xs-12 col-sm-3">
								<div class="form-group">
									<label for="password">Password : </label>
									<input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password">
								</div>
							</div>

							<div class="col-xs-12 col-sm-3">
                <div class="form-group">
									<label for="nisn">NISN : </label>
									<input type="text" name="nisn" id="nisn" class="form-control" placeholder="Masukan NISN">
								</div>
							</div>

							<div class="col-xs-12 col-sm-3 mt-1">
                <div class="form-group">
									<label for="nis">NIS : </label>
									<input type="text" name="nis" id="nis" class="form-control" placeholder="Masukan NIS">
								</div>
							</div>

							<div class="col-xs-12 col-sm-2 mt-1">
                <div class="form-group">
                  <label for="id_kelas">Options :</label>
                  <select class="form-select" name="id_kelas" id="id_kelas">
                    <option selected class="text-center">-- Pilih Kelas --</option>
                    @foreach ($kelas as $kelas)
                      <option value="{{ $kelas->id }}">{{ $kelas->kelas }}</option>
                    @endforeach
                  </select>
								</div>
							</div>

              <div class="col-xs-12 col-sm-3 mt-1">
                <div class="form-group">
									<label for="no_telp">No. Telpon : </label>
									<input type="number" name="no_telp" id="no_telp" class="form-control" placeholder="Masukan No. Telp">
								</div>
							</div>

							<div class="col-xs-12 col-sm-3 mt-1">
                <br>
                <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Tambah </button>
							</div>
						</div>
					</div>
				</form>
			</div>
    </div>

    <div class="row">
      <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <h5 class="card-header">Siswa</h5>
            <div class="table-responsive text-nowrap">
              <table class="table">
                <thead class="table-light">
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NISN</th>
                    <th>NIS</th>
                    <th>kelas</th>
                    <th>No. Telepon</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  @foreach ($siswa as $key => $get)
                    <tr>
                      <td>{{ $key +1 }}</td>
                      <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $get->name }}</strong></td>
                      <td>{{ !is_null($get->siswa) ? $get->siswa->nisn : '' }}</td>
                      <td>{{ !is_null($get->siswa) ? $get->siswa->nis : ''}}</td>
                      <td>{{ !is_null($get->siswa) ? $get->siswa->kelas->kelas : ''  }}</td>
                      <td><span class="badge bg-label-primary me-1">{{ !is_null($get->siswa) ? $get->siswa->no_telp : '' }}</span></td>
                      <td>
                          <a data-bs-toggle="modal" data-bs-target="#editModal{{ $get->id }}" data-toggle="modal" data-target="#editSppModal"><i class="text-primary bx bx-edit-alt me-1"></i></a>
                          <a href="{{ route('siswa.delete', $get->id) }}"><i class="text-danger bx bx-trash me-1"></i> </a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
      </div>
    </div>
</div>

<!-- Button trigger modal -->


<!-- Modal -->
@foreach ($siswa as $item)
<div class="modal fade" id="editModal{{ $item->id }}"  aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit item</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('siswa.update', $item->id) }}" method="post">
          @csrf

          <div class="form-group">
            <label for="name">name : </label>
            <input type="text" name="name" id="name" class="form-control" value="{{ !is_null($item->siswa) ? $item->siswa->name : "" }}" placeholder="Masukan nama">
          </div>

          <div class="form-group">
            <label for="email">Email : </label>
            <input type="text" name="email" id="email" class="form-control" value="{{ $item->email }}" placeholder="Masukan Email">
          </div>

          <div class="form-group">
            <label for="password">Password : </label>
            <input type="password" name="password" id="password" class="form-control" value="{{ $item->password }}" placeholder="Masukan Password">
          </div>


          <div class="form-group my-1">
            <label for="nisn">Nisn :</label>
            <input type="text" class="form-control" id="nisn" name="nisn" value="{{ !is_null($item->siswa) ? $item->siswa->nisn : "" }}" required placeholder="Masukan Nisn">
          </div>

          <div class="form-group my-1">
            <label for="nis">Nis :</label>
            <input type="text" class="form-control" id="nis" name="nis" value="{{ !is_null($item->siswa) ? $item->siswa->nis : "" }}" required placeholder="Masukan Nis">
          </div>

          <div class="form-group my-1">
            <label for="id_kelas">Options :</label>
            <select class="form-select" name="id_kelas" id="id_kelas">
              <option selected value="{{ !is_null($item->siswa) ? $item->siswa->kelas->id : "" }}">{{ !is_null($item->siswa) ? $item->siswa->kelas->kelas : "" }}</option>
              @foreach ($kelas as $get)
                <option value="{{ $kelas->id }}">{{ $kelas->kelas }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group my-1">
            <label for="no_telp">No Telepon :</label>
            <input type="number" class="form-control" id="no_telp" value="{{ !is_null($item->siswa) ? $item->siswa->no_telp : "" }}" name="no_telp" required placeholder="Masukan Nomor Telepon">
          </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
        </form>
    </div>
  </div>
</div>
@endforeach



@endsection