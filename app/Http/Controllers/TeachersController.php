<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Services\TeacherService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Storage;
use Hash;

class TeachersController extends Controller
{
    /**
     * @var StudentService
     */
    private $teacherService;

    /**
     * StudentsController constructor.
     * @param StudentService $teacherService
     */
    public function __construct(TeacherService $teacherService)
    {
        $this->teacherService = $teacherService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort = $request->sort;
        $sort = explode('|', $sort);

        $sortBy = $sort[0];
        $sortDirection = $sort[1];

        $perPage = $request->per_page;

        $search = $request->search;

        $query = User::orderBy($sortBy, $sortDirection);

        if ($search) {
            $like = "%{$search}%";

            $query = $query->where('name', 'LIKE', $like)
                ->orWhere('email', 'LIKE', $like);
        }

        return $query->paginate($perPage);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateUserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $student = new User();

        if ($request->hasFile('avatar')) {
            $this->teacherService->uploadAvatar($request, $student);
        }

        $this->teacherService->saveUser($request, $student);

        return response(null, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest $request
     * @param  int $id
     * @return Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $student = User::findOrFail($id);

        if ($request->hasFile('avatar')) {
            $this->teacherService->deleteCurrentAvatar($student);

            $this->teacherService->uploadAvatar($request, $student);
        }

        $this->teacherService->saveUser($request, $student);

        return response(null, Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = User::findOrFail($id);

        $this->teacherService->deleteCurrentAvatar($student);

        User::destroy($id);
    }
}
