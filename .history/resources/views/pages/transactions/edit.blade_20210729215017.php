@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Ubah Transaksi</strong>
            <small>{{ $item->uuid }}</small>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('transactions.update', $item->id) }}" method="post">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="name" class="form-control-label">Nama Pemesan</label>
                    <input type="text" name="name" value="{{ old('name') ? odl('name') : $item->name }}" class="form-control @error('name') is-invalid @enderror" />
                    @error('name') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="email" class="form-control-label">Tipe Barang</label>
                    <input type="email" name="email" value="{{ old('email') ? odl('email') : $item->email }}" class="form-control @error('email') is-invalid @enderror" />
                    @error('email') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="number" class="form-control-label">No Hp</label>
                    <input type="text" name="number" value="{{ old('number') ? odl('number') : $item->number }}" class="form-control @error('number') is-invalid @enderror" />
                    @error('number') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="quantity" class="form-control-label">Kuantitas Barang</label>
                    <input type="number" name="quantity" value="{{ old('quantity') ? odl('quantity') : $item->quantity }}" class="form-control @error('quantity') is-invalid @enderror" />
                    @error('quantity') <div class="text-muted">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Ubah Barang</button>
                </div>
            </form>
        </div>
    </div>
@endsection