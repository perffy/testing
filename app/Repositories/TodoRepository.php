<?php

namespace App\Repositories;

use App\Models\Todo;
use Illuminate\Support\Facades\DB;

class TodoRepository extends BaseRepository
{
    public function model()
    {
        return Todo::class;
    }

    public function store(array $data = []): Todo
    {
        DB::beginTransaction();
        try {
            $todo = $this->model::create([
                'user_id' => $data['user_id'],
                'project_id' => $data['project_id'],
                'description' => $data['description'] ?? null,
                'status' => $data['status'] ?? Todo::DEFAULT_STATUS,
                'views' => $data['views'] ?? 0,
            ]);
        }
        catch (Exception $e) {
            DB::rollBack();
            throw new GeneralException(__('There was a problem creating the Todo. '));
        }
        DB::commit();
        return $todo;
    }

    public function mark(Todo $todo): Todo
    {
        DB::beginTransaction();
        try {
            $todo->update([
                'status' => Todo::DEFAULT_DONE,
            ]);
        }
        catch (Exception $e) {
            DB::rollBack();
            throw new GeneralException(__('There was a problem updating this Todo. '));
        }
        DB::commit();
        return $todo;
    }

    public function view(Todo $todo): Todo
    {
        DB::beginTransaction();
        try {
            $todo->increment('views', 1);
        }
        catch (Exception $e) {
            DB::rollBack();
            throw new GeneralException(__('There was a problem updating this Todo. '));
        }
        DB::commit();
        return $todo;
    }
}
