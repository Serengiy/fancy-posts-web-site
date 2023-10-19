<x-layouts.layout>
    <x-layouts.navs.first_nav/>
    <x-modal.my_modal />
    <div class="my-users-form-cont">
        <div class="col-10 my-users-form">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Liked</th>
                    <th scope="col">Post</th>
                    <th scope="col">Unlike</th>
                </tr>
                </thead>

                @foreach($posts as $post)
                <tbody>
                    <th scope="row">{{$post->created_at->format('d M y')}}</th>
                    <td>{{$post->post()->get()[0]->title}}</td>
                    <td>
                        <form action="{{url('/unlike')}}" method="POST">
                        @csrf
                            <input type="hidden" name="post_id" value="{{$post->post()->get()[0]->id}}">
                            <button class="btn btn-danger">Unlike</button>
                        </form>
                    </td>
                </tbody>
                @endforeach
            </table>


        </div>
    </div>

</x-layouts.layout>
