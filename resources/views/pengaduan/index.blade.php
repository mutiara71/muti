@extends('adminlte::page')
@section('title','Halaman Pengaduan')
@section('content')
<div class="card">
    <div class="card-header">{{__('Pengaduan')}}</div>
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{session('status')}}
            </div>
        @endif
        <br/><br/>
        <div class="table-responsive">
            <table id="tabel_pengaduan" class="table table-striped table-hover table-condensed table-bordered">
                <thead>
                    <tr style="background-color: darkgrey">
                        <th class="text-center">No</th>
                        <th class="text-center">Tanggal Pengaduan</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Isi Laporan</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($pengaduan as $pengaduan)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{date('d-m-y',strtotime($pengaduan->created_at))}}</td>
                        <td>{{$pengaduan->user->nama}}</td>
                        <td>{{$pengaduan->isi_laporan}}</td>
                        <td>{{$pengaduan->status}}</td>
                        <td class="text-center">
                        <a href="{{route('create.tanggapan',$pengaduan->id)}}" class="btn btn-md btn-primary">
                        <i class="far fa-edit"></i>Update</a> 
                                   <x-adminlte-button label="Delete" data-toggle="modal" data-target="#hapuspengaduan{{$loop->iteration}}" class="bg-danger btn-md"
                                       icon="fas fa-trash"/>
                               {{-- Custom --}}
                                   <x-adminlte-modal id="hapuspengaduan{{$loop->iteration}}" title="Hapus Pengaduan" size="md" theme="orange"
                                   icon="fas fa-bell" v-centered staticbackdrop scrollable>
                                   <div style="height:50px;">
                                       <form action="{{route('pengaduan.delete',$pengaduan->id)}}" method="POST">
                                           @csrf
                                           @method('DELETE')
                                             Apakah anda yakin akan menghapus pengaduan ini?</div>
                                   <x-slot name="footerSlot">
                                       <x-adminlte-button type="submit" class="mr-auto" theme="primary" label="Hapus"/>
                                       <x-adminlte-button theme="danger" label="Batal" data-dismiss="modal"/>
                                       </form>
                                   </x-slot>
                                   </x-adminlte-modal>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop