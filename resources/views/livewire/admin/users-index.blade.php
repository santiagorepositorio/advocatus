<div>
    @if (session('info'))
    <div class="alert alert-primary" role="alert">
        <strong>Exito!</strong> {{ session('info') }}
    </div>
        
    @endif
    <div class="card">
        <div class="card-header">
            <input wire:keydowm="limpiar_page" wire:model="search" class="form-control w-100" placeholder="Escribe un Nombre..."></input>
                        
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td width="10px"><a class="btn btn-primary" href="{{ route('admin.users.edit', $user) }}">Edit</a></td>
                            
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">
                                No hay ningun User Registrado
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
                {{ $users->links() }}
        </div>
    </div>
</div>
