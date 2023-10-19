<x-layouts.layout>
    <x-layouts.navs.first_nav/>
    <x-modal.my_modal />
    <div class="my-users-form-cont">
        <div class="col-10 my-users-form">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Post</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>

                @foreach($posts as $post)
                <tbody>
                    <th scope="row">{{$post->created_at->format('d M y')}}</th>
                    <td>{{$post->title}}</td>
                    <td><a class="text-info" href="/posts/{{$post->id}}/update">Update</a></td>
                    <td><a href="#" class="text-danger" onclick="modal_is_on({{$post->id}})">Delete</a></td>
                </tbody>
                @endforeach
            </table>


        </div>
    </div>

</x-layouts.layout>
