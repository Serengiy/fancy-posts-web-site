<x-layouts.admin-layout>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section>
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 450px;">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                        <tr>
                            <th><a href="{{url('/admin/all-authors/?sort=first_name')}}">Authors</a></th>
                            <th><a href="{{url('/admin/all-authors/?sort=posts')}}">Role</a></th>
                            <th><a href="{{url('/admin/all-authors/?sort=posts')}}">Posts</a></th>
                            <th><a href="{{url('/admin/all-authors/?sort=likes_count')}}">Likes</a></th>
                            <th><a href="{{url('/admin/all-authors/?sort=comments_count')}}">Comments</a></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->first_name}}</td>
                                <td><x-select :options="$roles" :user="$user"></x-select></td>
                                <td><a href="#">{{$user->posts()->count()}}</a></td>
                                <td>{{$user->likes_count}}</td>
                                <td>{{$user->comments_count}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </section>
    </div>
</x-layouts.admin-layout>
