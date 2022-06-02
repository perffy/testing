<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\Project\StoreRequest;
use App\Repositories\ProjectRepository;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Resources\ProjectResource;

class ProjectController extends Controller
{

    protected ProjectRepository $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function store(StoreRequest $request)
    {
        $project = $this->projectRepository->store($request->validated());
        return new ProjectResource($project);
    }

    public function index()
    {
        $projects = Project::with('todos')->get();
        return ProjectResource::collection($projects);
    }

    public function show(int $project)
    {
        $project = Project::with('todos')->findOrFail($project);
        return new ProjectResource($project);
    }
}
