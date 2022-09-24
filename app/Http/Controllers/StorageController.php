<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStorageRequest;
use App\Http\Requests\UpdateStorageRequest;
use App\Repositories\StorageRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class StorageController extends AppBaseController
{
    /** @var StorageRepository $storageRepository*/
    private $storageRepository;

    public function __construct(StorageRepository $storageRepo)
    {
        $this->storageRepository = $storageRepo;
    }

    /**
     * Display a listing of the Storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $storages = $this->storageRepository->paginate(10);

        return view('storages.index')
            ->with('storages', $storages);
    }

    /**
     * Show the form for creating a new Storage.
     *
     * @return Response
     */
    public function create()
    {
        return view('storages.create');
    }

    /**
     * Store a newly created Storage in storage.
     *
     * @param CreateStorageRequest $request
     *
     * @return Response
     */
    public function store(CreateStorageRequest $request)
    {
        $input = $request->all();

        $storage = $this->storageRepository->create($input);

        Flash::success('Storage saved successfully.');

        return redirect(route('storages.index'));
    }

    /**
     * Display the specified Storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $storage = $this->storageRepository->find($id);

        if (empty($storage)) {
            Flash::error('Storage not found');

            return redirect(route('storages.index'));
        }

        return view('storages.show')->with('storage', $storage);
    }

    /**
     * Show the form for editing the specified Storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $storage = $this->storageRepository->find($id);

        if (empty($storage)) {
            Flash::error('Storage not found');

            return redirect(route('storages.index'));
        }

        return view('storages.edit')->with('storage', $storage);
    }

    /**
     * Update the specified Storage in storage.
     *
     * @param int $id
     * @param UpdateStorageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStorageRequest $request)
    {
        $storage = $this->storageRepository->find($id);

        if (empty($storage)) {
            Flash::error('Storage not found');

            return redirect(route('storages.index'));
        }

        $storage = $this->storageRepository->update($request->all(), $id);

        Flash::success('Storage updated successfully.');

        return redirect(route('storages.index'));
    }

    /**
     * Remove the specified Storage from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $storage = $this->storageRepository->find($id);

        if (empty($storage)) {
            Flash::error('Storage not found');

            return redirect(route('storages.index'));
        }

        $this->storageRepository->delete($id);

        Flash::success('Storage deleted successfully.');

        return redirect(route('storages.index'));
    }
}
