<div class="col-4 mt-5">
    <div class="container">
        <form wire:submit.prevent="submitForm" action="/contact" method="post">
            @csrf
            @method('PUT')
            <div class="form-floating mb-3">
                <input wire:model.live="name" type="text" class="form-control @error('name') border-danger @enderror"
                    id="name" placeholder="Name">
                <label for="name">Name</label>

                @error('name')
                    <div id="name-error" class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input wire:model.live="email" type="email"
                    class="form-control @error('email') border-danger @enderror" id="email" placeholder="Email">
                <label for="email">Email</label>

                @error('email')
                    <div id="email-error" class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input wire:model.live="phone" type="number"
                    class="form-control @error('phone') border-danger @enderror" id="phone" placeholder="Phone">
                <label for="phone">Phone</label>

                @error('phone')
                    <div id="phone-error" class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <textarea wire:model.live="comment" class="form-control @error('comment') border-danger @enderror"
                    placeholder="Leave a comment here" id="comment" style="height: 100px"></textarea>
                <label for="comment">Comments</label>

                @error('comment')
                    <div id="comment-error" class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
