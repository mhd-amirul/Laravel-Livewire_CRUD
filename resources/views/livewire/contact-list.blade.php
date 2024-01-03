<div class="col-8 mt-5">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Mail</th>
                <th scope="col">Phone</th>
                <th scope="col">Comment</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($contact as $i)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
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
            @empty
                <tr>
                    <th scope="row" colspan="5" class="text-center">No data found!</th>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
