@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Penilaian') }}</h1>

    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="row mb-4">
        <div class="col text-right">
            <a class="btn btn-primary" href="{{ route('penilaian.create') }}">Create Penilaian</a>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Alternatif</th>
                            <th>Nama Alternatif</th>
                            @foreach ($kriterias as $kriteria)
                                <th>{{ $kriteria->nama_kriteria }}</th>
                            @endforeach
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach ($alternatifs as $alternatif)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $alternatif->kode_alternatif }}</td>
                                <td>{{ $alternatif->nama_alternatif }}</td>
                                @foreach ($kriterias as $kriteria)
                                    @php
                                        $penilaian = $penilaians->where('alternatif_id', $alternatif->id)->where('kriteria_id', $kriteria->id)->first();
                                    @endphp
                                    <td>{{ $penilaian ? $penilaian->nilai : '-' }}</td>
                                @endforeach
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ route('penilaian.edit', $alternatif->id) }}">Edit</a>
                                    <form action="{{ route('penilaian.destroy', $alternatif->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- New Table -->
    
    <table class="table table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Harga</th>
                <th>Bobot Harga</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td>4-5,5 jt</td>
                <td>5</td>
            </tr>
            <tr>
                <td>5,5-7 jt</td>
                <td>4</td>
            </tr>
            <tr>
                <td>7-8,5 jt</td>
                <td>3</td>
            </tr>
            <tr>
                <td>8,5-12 jt</td>
                <td>2</td>
            </tr>
            <tr>
                <td>>12 jt</td>
                <td>1</td>
            </tr>
            
        </tbody>
    </table>

    <table class="table table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>RAM</th>
                <th>Bobot RAM</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td>16</td>
                <td>5</td>
            </tr>
            <tr>
                <td>8</td>
                <td>4</td>
            </tr>
            <tr>
                <td>4</td>
                <td>3</td>
            </tr>
            <tr>
                <td>3</td>
                <td>2</td>
            </tr>
            <tr>
                <td>2</td>
                <td>1</td>
            </tr>
            
        </tbody>
    </table>

    <table class="table table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Storage</th>
                <th>Bobot Storage</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1 TB</td>
                <td>5</td>
            </tr>
            <tr>
                <td>512 GB</td>
                <td>4</td>
            </tr>
            <tr>
                <td>256</td>
                <td>3</td>
            </tr>
            <tr>
                <td>128</td>
                <td>2</td>
            </tr>
            <tr>
                <td>64</td>
                <td>1</td>
            </tr>
            
        </tbody>
    </table>

    <table class="table table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Prosesor</th>
                <th>Bobot Prosesor</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Intel i9</td>
                <td>5</td>
            </tr>
            <tr>
                <td>Intel i7</td>
                <td>4</td>
            </tr>
            <tr>
                <td>Intel i5</td>
                <td>3</td>
            </tr>
            <tr>
                <td>Intel i3</td>
                <td>2</td>
            </tr>
            <tr>
                <td>Intel Celeron</td>
                <td>1</td>
            </tr>
            
        </tbody>
    </table>

    <table class="table table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Ukuran Layar</th>
                <th>Bobot Ukuran Layar</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td>16"</td>
                <td>5</td>
            </tr>
            <tr>
                <td>14"</td>
                <td>3</td>
            </tr>
            
            
        </tbody>
    </table>
@endsection