<!-- Modal -->
@foreach ($users as $user)    
    <div class="modal fade modal-lg" id="modalPublish{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ $user->actived ? 'Suspend' : 'Active' }} User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.user.active.suspend', $user) }}" method="POST">
                        @method('PUT')
                        @csrf
                        
                        <p> Apakah Yakin User <strong>{{ $user->name }}</strong> Akan di {{ $user->actived ? 'Suspend' : 'Active kan' }} ? </p>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">{{ $user->actived ? 'Suspend' : 'Active' }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach