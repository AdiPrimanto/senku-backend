@extends('layouts.default')

@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Daftar Transaksi Masuk</h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Nomor</th>
                                        <th>Total Transaksi</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($items as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->number }}</td>
                                            <td>Rp. {{ $item->transaction_total }}</td>
                                            <td>
                                                @if($item->transaction_status == 'PENDING')
                                                    <span class="badge badge-info">
                                                @elseif($item->transaction_status == 'SUCCESS')
                                                    <span class="badge badge-success">
                                                @elseif($item->transaction_status == 'FAILED')
                                                    <span class="badge badge-danger">
                                                @else
                                                    <span>
                                                @endif
                                                    {{$item->transaction_status}}
                                                    </span>
                                            </td>
                                            <td>
                                                @if($item->transaction_status == 'PENDING')
                                                    <a href="#myModal" data-remote="{{ route('transactions.show', $item->id) }}" data-toggle="modal" data-target="#mymodal" data-title="Detail Transaksi {{ $item->uuid}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                                    {{-- <a href="{{ route('transactions.status', $item->id) }}?status=FAILED" class="btn btn-warning btn-sm"><i class="fa fa-times"></i></a> --}}
                                                @endif

                                                <a href="{{ route('transactions.edit', $item->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                                                <form action="{{ route('transactions.destroy', $item->id) }}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center p-5">Data tidak tersedia</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script>
    jQuery(document).ready(function($) {
        $('#myModal').on('show.bs.modal', function(e){
            var button = $(e.relatedTarget);
            var modal = $(this);
            modal.find('.modal-body').load(button.data("remote"));
            modal.find('.modal-title').html(button.data("title"));
        });
    });
</script>

<div class="modal" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <i class="fa fa-spinner fa-spin"></i>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> --}}
        </div>
    </div>
</div>