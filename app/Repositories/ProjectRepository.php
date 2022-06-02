<?php

namespace App\Repositories;

use App\Exceptions\GeneralException;
use App\Models\Project;
use Illuminate\Support\Facades\DB;

class ProjectRepository extends BaseRepository
{
    public function model()
    {
        return Project::class;
    }

    public function store(array $data = []): Project
    {
        DB::beginTransaction();
        try {
            $project = $this->model::create([
                'name' => $data['name'] ?? null,
            ]);
        }
        catch (Exception $e) {
            DB::rollBack();
            throw new GeneralException(__('There was a problem creating the Project. '));
        }
        DB::commit();
        return $project;
    }
}
