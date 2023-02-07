<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskDocumentRequest;
use App\Http\Requests\UpdateTaskDocumentRequest;
use App\Repositories\TaskDocumentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TaskDocumentController extends AppBaseController
{
    /** @var TaskDocumentRepository $taskDocumentRepository*/
    private $taskDocumentRepository;

    public function __construct(TaskDocumentRepository $taskDocumentRepo)
    {
        $this->taskDocumentRepository = $taskDocumentRepo;
    }

    /**
     * Display a listing of the TaskDocument.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $taskDocuments = $this->taskDocumentRepository->paginate(10);

        return view('task_documents.index')
            ->with('taskDocuments', $taskDocuments);
    }

    /**
     * Show the form for creating a new TaskDocument.
     *
     * @return Response
     */
    public function create()
    {
        return view('task_documents.create');
    }

    /**
     * Store a newly created TaskDocument in storage.
     *
     * @param CreateTaskDocumentRequest $request
     *
     * @return Response
     */
    public function store(CreateTaskDocumentRequest $request)
    {
        $input = $request->all();

        $taskDocument = $this->taskDocumentRepository->create($input);

        Flash::success('Task Document saved successfully.');

        return redirect(route('taskDocuments.index'));
    }

    /**
     * Display the specified TaskDocument.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $taskDocument = $this->taskDocumentRepository->find($id);

        if (empty($taskDocument)) {
            Flash::error('Task Document not found');

            return redirect(route('taskDocuments.index'));
        }

        return view('task_documents.show')->with('taskDocument', $taskDocument);
    }

    /**
     * Show the form for editing the specified TaskDocument.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $taskDocument = $this->taskDocumentRepository->find($id);

        if (empty($taskDocument)) {
            Flash::error('Task Document not found');

            return redirect(route('taskDocuments.index'));
        }

        return view('task_documents.edit')->with('taskDocument', $taskDocument);
    }

    /**
     * Update the specified TaskDocument in storage.
     *
     * @param int $id
     * @param UpdateTaskDocumentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTaskDocumentRequest $request)
    {
        $taskDocument = $this->taskDocumentRepository->find($id);

        if (empty($taskDocument)) {
            Flash::error('Task Document not found');

            return redirect(route('taskDocuments.index'));
        }

        $taskDocument = $this->taskDocumentRepository->update($request->all(), $id);

        Flash::success('Task Document updated successfully.');

        return redirect(route('taskDocuments.index'));
    }

    /**
     * Remove the specified TaskDocument from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $taskDocument = $this->taskDocumentRepository->find($id);

        if (empty($taskDocument)) {
            Flash::error('Task Document not found');

            return redirect(route('taskDocuments.index'));
        }

        $this->taskDocumentRepository->delete($id);

        Flash::success('Task Document deleted successfully.');

        return redirect(route('taskDocuments.index'));
    }
}
