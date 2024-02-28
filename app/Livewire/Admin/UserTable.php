<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

use Illuminate\Support\Facades\Auth;

class UserTable extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $search = "";

    public $sortColumn = 'created_at';
    public $sortDirection = 'desc';

    public function sort($columnName)
    {
        $this->sortColumn = $columnName;
        $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
    }

    public function resetSearch()
    {
        $this->reset('search');
    }

    public function delete(User $user)
    {
        $this->dispatch(
            'delete:confirm',
            userId: $user->id,
            userName: $user->name,
        );
    }

    public function deleteUser(User $user)
    {
        User::where('id', $user->id)->delete();
    }

    public function render()
    {
        $users = User::with('region')->where(function ($search) {
            $search->where('name', 'like', '%' . $this->search . '%');
        })->where('id', '!=', Auth::user()->id)
            ->orderBy($this->sortColumn, $this->sortDirection)
            ->paginate(10);

        return view('livewire.admin.user-table', [
            'users' => $users
        ]);
    }
}
