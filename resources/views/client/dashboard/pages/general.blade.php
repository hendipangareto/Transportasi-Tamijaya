<title>Tami Jaya Transport - General</title>

@extends('layouts.app-web')

@section('content')

<div class="section dashboard">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <x-dashboard.sidebar />
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-12">
                        <div class="card--user-info">
                            <div class="card--user-info__content">
                                <h4>
                                    <ion-icon name="folder-open-outline" class="icon"></ion-icon>Informasi General
                                </h4>
                                <table class="mt-4">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Nama Lengkap :</th>
                                            <td>Johanes Adhitya Hartanto</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">No.Telepon :</th>
                                            <td>+6281123456789</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Email :</th>
                                            <td>johanes.adhitya@exclolab.com</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Provinsi :</th>
                                            <td>Jawa Tengah</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Kota :</th>
                                            <td>Semarang</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Alamat :</th>
                                            <td>Jl.Ngesrep Timur 1 No.13 Semarang</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection