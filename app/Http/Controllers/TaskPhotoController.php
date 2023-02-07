<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskPhotoRequest;
use App\Http\Requests\UpdateTaskPhotoRequest;
use App\Repositories\TaskPhotoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TaskPhotoController extends AppBaseController
{
    /** @var TaskPhotoRepository $taskPhotoRepository*/
    private $taskPhotoRepository;

    public function __construct(TaskPhotoRepository $taskPhotoRepo)
    {
        $this->taskPhotoRepository = $taskPhotoRepo;
    }

    /**
     * Display a listing of the TaskPhoto.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $taskPhotos = $this->taskPhotoRepository->paginate(10);

        return view('task_photos.index')
            ->with('taskPhotos', $taskPhotos);
    }

    /**
     * Show the form for creating a new TaskPhoto.
     *
     * @return Response
     */
    public function create()
    {
        return view('task_photos.create');
    }

    /**
     * Store a newly created TaskPhoto in storage.
     *
     * @param CreateTaskPhotoRequest $request
     *
     * @return Response
     */
    public function store(CreateTaskPhotoRequest $request)
    {
        $input = $request->all();

        $taskPhoto = $this->taskPhotoRepository->create($input);

        Flash::success('Task Photo saved successfully.');

        return redirect(route('taskPhotos.index'));
    }

    /**
     * Display the specified TaskPhoto.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $taskPhoto = $this->taskPhotoRepository->find($id);

        if (empty($taskPhoto)) {
            Flash::error('Task Photo not found');

            return redirect(route('taskPhotos.index'));
        }

        return view('task_photos.show')->with('taskPhoto', $taskPhoto);
    }

    /**
     * Show the form for editing the specified TaskPhoto.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $taskPhoto = $this->taskPhotoRepository->find($id);

        if (empty($taskPhoto)) {
            Flash::error('Task Photo not found');

            return redirect(route('taskPhotos.index'));
        }

        return view('task_photos.edit')->with('taskPhoto', $taskPhoto);
    }

    /**
     * Update the specified TaskPhoto in storage.
     *
     * @param int $id
     * @param UpdateTaskPhotoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTaskPhotoRequest $request)
    {
        $taskPhoto = $this->taskPhotoRepository->find($id);

        if (empty($taskPhoto)) {
            Flash::error('Task Photo not found');

            return redirect(route('taskPhotos.index'));
        }

        $taskPhoto = $this->taskPhotoRepository->update($request->all(), $id);

        Flash::success('Task Photo updated successfully.');

        return redirect(route('taskPhotos.index'));
    }

    /**
     * Remove the specified TaskPhoto from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $taskPhoto = $this->taskPhotoRepository->find($id);

        if (empty($taskPhoto)) {
            Flash::error('Task Photo not found');

            return redirect(route('taskPhotos.index'));
        }

        $this->taskPhotoRepository->delete($id);

        Flash::success('Task Photo deleted successfully.');

        return redirect(route('taskPhotos.index'));
    }
}
