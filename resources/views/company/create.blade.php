<x-app-layout >
    <div class="container">
        <form  method="post" action="{{route('company.store')}}">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name company</label>
                <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</x-app-layout>
