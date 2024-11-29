<div class="row mt-4">
    <div class="col-lg-6 m-auto">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white text-center">Todo List</h3>
            </div>
            <div class="card-body">
                <div>

                        {{-- <input wire:model="text" type="text" name="search" placeholder="Search posts by title..."> --}}

                        <form method="get">
                            <input class="border-solid border border-gray-300 p-2 w-full md:w-1/4" type="text" placeholder="Search Accounts" name="search" wire:model="search"/>
                        </form>


                    <h1>Search Results:</h1>

                    <ul>
                        @foreach($todos as $post)
                            <li>{{ $post->todo }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


