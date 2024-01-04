<div class="col-8 mt-5">
    <div class="form-floating mb-3">
        <input wire:model.live.debounce.300ms="search" type="text" class="form-control" id="search"
            placeholder="Search">
        <label for="search">Search...</label>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col" style="cursor: pointer" wire:click="sortBy('name')">Name</th>
                <th scope="col" style="cursor: pointer" wire:click="sortBy('email')">Mail</th>
                <th scope="col" style="cursor: pointer" wire:click="sortBy('phone')">Phone</th>
                <th scope="col" style="cursor: pointer" wire:click="sortBy('comment')">Description</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $number = 10 * $data->currentPage() - 10 + 1;
            @endphp
            @forelse ($data as $i)
                <tr>
                    <th scope="row">{{ $number }}</th>
                    <td id="contact-name-{{ $i->id }}">{{ $i->name }}</td>
                    <td id="contact-email-{{ $i->id }}">{{ $i->email }}</td>
                    <td id="contact-phone-{{ $i->id }}">{{ $i->phone }}</td>
                    <td id="contact-comment-{{ $i->id }}">{{ $i->comment }}</td>
                    <td>
                        <a href={{ route('update-contact', $i->id) }} class="text-decoration-none text-warning"
                            wire:navigate><b>update</b></a>
                        |
                        <a href="#" class="text-decoration-none text-danger"
                            wire:click="deleteContact({{ $i->id }})"><b>delete</b></a>
                    </td>
                </tr>
                @php
                    $number++;
                @endphp
            @empty
                <tr>
                    <th scope="row" colspan="6" class="text-center">No data found!</th>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $data->links() }}
</div>
