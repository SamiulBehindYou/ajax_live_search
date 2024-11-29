

    <div class="row mt-4">
        <div class="col-lg-6 m-auto">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="text-white text-center">Todo Create</h3>
                </div>
                <div class="card-body">
                    @if(Session::has('message'))
                    <p class="alert alert-info">{{ Session::get('message') }}</p>
                    @endif
                    <form action="#" wire:submit="save">
                        <div class="mb-3">
                            <input type="text" wire:model="todo" class="form-control">
                            @error('todo') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <button wire:loading.remove class="btn btn-primary m-0" type="submit">Save</button>
                            <button wire:loading class="btn border-0" type="button" disabled>
                                <span class="spinner-border text-primary spinner-border-sm" role="status" aria-hidden="true"></span>
                                Loading...
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-6 m-auto">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="text-white text-center">Todo List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Todo</th>
                                <th>Created_at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($todos as $sl=>$todo)
                            <tr>
                                <td>{{ $sl+1 }}</td>
                                <td>{{ $todo->todo }}</td>
                                <td>{{ $todo->created_at->diffForHumans() }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3"><h3 class="text-center">No data found</h3></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $todos->links() }}
                </div>
            </div>
        </div>
    </div>



